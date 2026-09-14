const fs = require('fs');

const phpFile = fs.readFileSync('pages/math.php', 'utf8');

const startMarker = '$mathTerms = [';
const startIdx = phpFile.indexOf(startMarker);
const endMarker = "\n];\n\n// Sort terms";
const endIdx = phpFile.indexOf(endMarker);

if (startIdx === -1 || endIdx === -1) {
    console.error('Could not find slice markers');
    process.exit(1);
}

const rawSlice = phpFile.substring(startIdx + '$mathTerms = ['.length, endIdx).trim();

// Tokenize and parse PHP array into JS data structures preserving LaTeX backslashes
function parsePhpArray(code) {
    let pos = 0;

    function skipWhitespaceAndComments() {
        while (pos < code.length) {
            if (/\s/.test(code[pos])) {
                pos++;
            } else if (code[pos] === '/' && code[pos + 1] === '/') {
                while (pos < code.length && code[pos] !== '\n') pos++;
            } else if (code[pos] === '/' && code[pos + 1] === '*') {
                pos += 2;
                while (pos < code.length && !(code[pos] === '*' && code[pos + 1] === '/')) pos++;
                pos += 2;
            } else {
                break;
            }
        }
    }

    function parseString() {
        const quote = code[pos];
        pos++;
        let str = '';
        while (pos < code.length) {
            if (code[pos] === '\\') {
                const next = code[pos + 1];
                if (quote === "'") {
                    // In PHP single-quoted strings, only \' and \\ are escape sequences
                    if (next === "'" || next === '\\') {
                        str += next;
                        pos += 2;
                    } else {
                        str += '\\';
                        pos++;
                    }
                } else {
                    // Double-quoted
                    if (next === '"' || next === '\\') {
                        str += next;
                        pos += 2;
                    } else if (next === 'n') {
                        str += '\n';
                        pos += 2;
                    } else if (next === 't') {
                        str += '\t';
                        pos += 2;
                    } else {
                        str += '\\';
                        pos++;
                    }
                }
            } else if (code[pos] === quote) {
                pos++;
                break;
            } else {
                str += code[pos];
                pos++;
            }
        }
        return str;
    }

    function parseNumber() {
        let numStr = '';
        while (pos < code.length && /[\d.-]/.test(code[pos])) {
            numStr += code[pos];
            pos++;
        }
        return Number(numStr);
    }

    function parseValue() {
        skipWhitespaceAndComments();
        if (pos >= code.length) return null;

        const ch = code[pos];
        if (ch === "'" || ch === '"') {
            return parseString();
        }
        if (/[\d-]/.test(ch)) {
            return parseNumber();
        }
        if (code.startsWith('true', pos)) {
            pos += 4;
            return true;
        }
        if (code.startsWith('false', pos)) {
            pos += 5;
            return false;
        }
        if (code.startsWith('null', pos)) {
            pos += 4;
            return null;
        }
        if (ch === '[') {
            return parseArrayOrObject();
        }
        throw new Error(`Unexpected token at position ${pos}: ${code.slice(pos, pos + 25)}`);
    }

    function parseArrayOrObject() {
        pos++; // skip '['
        skipWhitespaceAndComments();

        // Check if empty
        if (code[pos] === ']') {
            pos++;
            return [];
        }

        // Peek ahead to determine if associative object or indexed array
        let isObject = false;
        let savePos = pos;
        let val = parseValue();
        skipWhitespaceAndComments();
        if (code.slice(pos, pos + 2) === '=>') {
            isObject = true;
        }
        pos = savePos; // rewind

        if (isObject) {
            const obj = {};
            while (pos < code.length) {
                skipWhitespaceAndComments();
                if (code[pos] === ']') {
                    pos++;
                    break;
                }
                const key = parseValue();
                skipWhitespaceAndComments();
                if (code.slice(pos, pos + 2) !== '=>') {
                    throw new Error(`Expected => at position ${pos}, got ${code.slice(pos, pos + 10)}`);
                }
                pos += 2; // skip '=>'
                const val = parseValue();
                obj[key] = val;
                skipWhitespaceAndComments();
                if (code[pos] === ',') {
                    pos++;
                } else if (code[pos] === ']') {
                    pos++;
                    break;
                }
            }
            return obj;
        } else {
            const arr = [];
            while (pos < code.length) {
                skipWhitespaceAndComments();
                if (code[pos] === ']') {
                    pos++;
                    break;
                }
                const val = parseValue();
                arr.push(val);
                skipWhitespaceAndComments();
                if (code[pos] === ',') {
                    pos++;
                } else if (code[pos] === ']') {
                    pos++;
                    break;
                }
            }
            return arr;
        }
    }

    return parseArrayOrObject();
}

const terms = parsePhpArray('[' + rawSlice + ']');
console.log(`Parsed ${terms.length} terms successfully!`);

// Validate some properties
terms.forEach(t => {
    if (!t.id || !t.name || typeof t.grade !== 'number') {
        throw new Error(`Invalid term structure: ${JSON.stringify(t)}`);
    }
});

fs.writeFileSync('assets/data/math-php.json', JSON.stringify(terms, null, 4), 'utf8');
console.log('Saved assets/data/math-php.json successfully with LaTeX escapes preserved!');
