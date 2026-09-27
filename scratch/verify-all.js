const fs = require('fs');
const path = require('path');

const dir = path.join(__dirname, '..', 'assets', 'data');
const grades = [
    'pre-k', 'kindergarten',
    'grade-1', 'grade-2', 'grade-3', 'grade-4', 'grade-5',
    'grade-6', 'grade-7', 'grade-8',
    'grade-9', 'grade-10', 'grade-11', 'grade-12'
];
const subjects = ['math', 'ela', 'science', 'social'];

let errors = [];
let totalTopicsChecked = 0;
let totalModulesChecked = 0;

for (const g of grades) {
    for (const s of subjects) {
        const fn = `curriculum-${g}-${s}.json`;
        const fp = path.join(dir, fn);

        if (!fs.existsSync(fp)) {
            errors.push(`Missing file: ${fn}`);
            continue;
        }

        try {
            const data = JSON.parse(fs.readFileSync(fp, 'utf8'));
            if (!data.grade || !data.subject || !data.title || !data.overview) {
                errors.push(`${fn}: Missing top-level fields (grade, subject, title, overview)`);
            }
            if (!Array.isArray(data.competencies) || data.competencies.length === 0) {
                errors.push(`${fn}: Missing competencies`);
            }
            if (!Array.isArray(data.modules) || data.modules.length === 0) {
                errors.push(`${fn}: Missing modules array`);
                continue;
            }

            data.modules.forEach(m => {
                totalModulesChecked++;
                if (!m.moduleNumber || !m.title || !m.description) {
                    errors.push(`${fn}: Module ${m.moduleNumber || '?'} missing moduleNumber/title/description`);
                }
                if (!Array.isArray(m.topics) || m.topics.length === 0) {
                    errors.push(`${fn}: Module ${m.moduleNumber} has no topics`);
                } else {
                    m.topics.forEach(t => {
                        totalTopicsChecked++;
                        if (!t.letter || !t.title || !t.description) {
                            errors.push(`${fn}: Mod ${m.moduleNumber} Topic ${t.letter || '?'} missing letter/title/description`);
                        }
                        if (t.lessons) {
                            errors.push(`${fn}: Mod ${m.moduleNumber} Topic ${t.letter} has forbidden 'lessons' array`);
                        }
                    });
                }
            });
        } catch (e) {
            errors.push(`${fn}: JSON error: ${e.message}`);
        }
    }
}

if (errors.length > 0) {
    console.error(`Validation Failed with ${errors.length} errors:`);
    errors.slice(0, 10).forEach(e => console.error(' - ' + e));
    process.exit(1);
} else {
    console.log(`ALL 56 files passed strict schema validation!`);
    console.log(`Verified ${totalModulesChecked} instructional modules across Pre-K to 12.`);
    console.log(`Verified ${totalTopicsChecked} topic descriptions with focus standards and zero lesson link clutter.`);
}
