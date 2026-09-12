/**
 * scratch/test_accommodation_engine.js
 * Unit tests verifying accommodationEngine.setAccommodation fix and global-a11y defense.
 */

const assert = require('assert');

console.log("=== Testing AccommodationEngine & global-a11y Integration ===");

// Mock browser globals
global.window = global;
global.window.addEventListener = () => {};
global.window.removeEventListener = () => {};
global.document = {
    body: {
        appendChild: () => {},
        classList: { add: () => {}, remove: () => {} }
    },
    createElement: () => ({
        setAttribute: () => {},
        classList: { add: () => {}, remove: () => {} },
        style: {}
    }),
    getElementById: () => null,
    querySelectorAll: () => [],
    documentElement: {
        style: { setProperty: () => {} }
    },
    addEventListener: () => {},
    removeEventListener: () => {}
};
global.localStorage = {
    _data: {},
    getItem(k) { return this._data[k] || null; },
    setItem(k, v) { this._data[k] = String(v); }
};
global.CustomEvent = class CustomEvent {
    constructor(type, eventInitDict) {
        this.type = type;
        this.detail = eventInitDict ? eventInitDict.detail : null;
    }
};
global.dispatchEvent = () => {};

// Load accommodation-engine.js
require('../assets/js/accessibility/accommodation-engine.js');

const engine = global.window.accommodationEngine;
assert(engine, "window.accommodationEngine should be defined");
assert.strictEqual(typeof engine.setAccommodation, 'function', "setAccommodation should be a function");

// Test setAccommodation
engine.setAccommodation('rulerEnabled', true);
assert.strictEqual(engine.profile.rulerEnabled, true, "rulerEnabled should be true");

engine.setAccommodation('rulerHeight', 75);
assert.strictEqual(engine.profile.rulerHeight, 75, "rulerHeight should be 75");

engine.setAccommodation('rulerDimOpacity', 0.6);
assert.strictEqual(engine.profile.rulerDimOpacity, 0.6, "rulerDimOpacity should be 0.6");

// Test alias keys
engine.setAccommodation('readingRuler', false);
assert.strictEqual(engine.profile.rulerEnabled, false, "readingRuler alias should map to rulerEnabled");

console.log("✔ AccommodationEngine.setAccommodation tests passed.");

// Test global-a11y update logic defensively
function testGlobalA11yUpdate(key, value) {
    if (window.accommodationEngine) {
        if (typeof window.accommodationEngine.setAccommodation === 'function') {
            if (key === 'readingRuler') {
                window.accommodationEngine.setAccommodation('rulerEnabled', !!value);
            } else if (key === 'rulerHeight') {
                window.accommodationEngine.setAccommodation('rulerHeight', parseInt(value, 10));
            } else if (key === 'rulerDimOpacity') {
                window.accommodationEngine.setAccommodation('rulerDimOpacity', parseFloat(value));
            }
        } else if (window.accommodationEngine.profile) {
            if (key === 'readingRuler') {
                window.accommodationEngine.profile.rulerEnabled = !!value;
            } else if (key === 'rulerHeight') {
                window.accommodationEngine.profile.rulerHeight = parseInt(value, 10);
            } else if (key === 'rulerDimOpacity') {
                window.accommodationEngine.profile.rulerDimOpacity = parseFloat(value);
            }
            if (typeof window.accommodationEngine.saveProfile === 'function') {
                window.accommodationEngine.saveProfile();
            }
        }
    }
}

// Case 1: Standard engine with setAccommodation
testGlobalA11yUpdate('readingRuler', true);
assert.strictEqual(engine.profile.rulerEnabled, true);

testGlobalA11yUpdate('rulerHeight', 85);
assert.strictEqual(engine.profile.rulerHeight, 85);

testGlobalA11yUpdate('rulerDimOpacity', 0.5);
assert.strictEqual(engine.profile.rulerDimOpacity, 0.5);

// Case 2: Older engine without setAccommodation (fallback test)
const savedMethod = engine.setAccommodation;
delete engine.setAccommodation;
testGlobalA11yUpdate('rulerHeight', 90);
assert.strictEqual(engine.profile.rulerHeight, 90, "Fallback to profile should succeed even if setAccommodation missing");

// Case 3: window.accommodationEngine is undefined
window.accommodationEngine = null;
assert.doesNotThrow(() => {
    testGlobalA11yUpdate('readingRuler', true);
});

console.log("✔ All global-a11y integration and fallback tests passed!");
