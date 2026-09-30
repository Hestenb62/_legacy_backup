/**
 * assets/js/manipulatives-lab.js
 * Interactive Digital Math & Science Manipulatives Lab Engine
 * Covers:
 * 1. Fraction Bars & Slices Equivalency
 * 2. Place Value & Base-10 Blocks
 * 3. Dynamic Cartesian Function Grapher
 * 
 * 100% Offline, Zero external framework dependencies, MathJax integrated.
 */

(function () {
  'use strict';

  // --- Math Helpers ---
  function gcd(a, b) {
    a = Math.abs(a);
    b = Math.abs(b);
    while (b) {
      const t = b;
      b = a % b;
      a = t;
    }
    return a;
  }

  function lcm(a, b) {
    if (!a || !b) return 0;
    return Math.abs((a * b) / gcd(a, b));
  }

  function safeTypeset(el) {
    if (!el || !window.ensureMathJax) return;
    try {
      if (window.MathJax && window.MathJax.typesetClear) {
        window.MathJax.typesetClear([el]);
      }
      window.ensureMathJax(el);
    } catch (e) {
      console.warn('MathJax typeset notice:', e);
    }
  }

  function copyToScratchpad(text, bannerMsg) {
    if (window.HLScratchpad && (typeof window.HLScratchpad.insertAtCursor === 'function' || typeof window.HLScratchpad.appendContent === 'function')) {
      if (typeof window.HLScratchpad.open === 'function') {
        window.HLScratchpad.open('notes');
      }
      setTimeout(() => {
        if (typeof window.HLScratchpad.insertAtCursor === 'function') {
          window.HLScratchpad.insertAtCursor('\n\n' + text + '\n\n');
        } else if (typeof window.HLScratchpad.appendContent === 'function') {
          window.HLScratchpad.appendContent(text);
        }
        alert(bannerMsg || 'Equation successfully copied to Scratchpad notes!');
      }, 150);
    } else if (navigator.clipboard && navigator.clipboard.writeText) {
      navigator.clipboard.writeText(text).then(() => {
        alert((bannerMsg || 'Equation copied to clipboard!') + ' (Tip: Open Scratchpad with Alt+S to paste).');
      }).catch(() => {
        alert('Could not copy automatically. Here is the equation:\n\n' + text);
      });
    } else {
      alert('Here is the equation to copy:\n\n' + text);
    }
  }

  // ========================================================
  // 1. LAB TABS NAVIGATION
  // ========================================================
  function initTabs() {
    const tabs = document.querySelectorAll('.manip-tab-btn');
    const panes = document.querySelectorAll('.manip-lab-pane');

    function switchTab(targetTab) {
      tabs.forEach(t => {
        const isActive = t.getAttribute('data-tab') === targetTab;
        t.classList.toggle('active', isActive);
        t.setAttribute('aria-selected', isActive ? 'true' : 'false');
      });

      panes.forEach(p => {
        const isMatch = p.id === 'pane-' + targetTab;
        p.classList.toggle('active', isMatch);
        if (isMatch) {
          p.removeAttribute('hidden');
        } else {
          p.setAttribute('hidden', 'true');
        }
      });

      if (targetTab === 'grapher' && window.GrapherLab) {
        window.GrapherLab.render();
      }
    }

    tabs.forEach(btn => {
      btn.addEventListener('click', () => {
        const tab = btn.getAttribute('data-tab');
        switchTab(tab);
        try { history.replaceState(null, '', '#' + tab); } catch (e) {}
      });
    });

    // Check URL Hash on load
    const hash = (window.location.hash || '').replace('#', '');
    if (['fractions', 'base10', 'grapher'].includes(hash)) {
      switchTab(hash);
    }
  }

  // ========================================================
  // 2. FRACTION BARS & EQUIVALENCY LAB
  // ========================================================
  const FractionsLab = {
    state: {
      a: { num: 1, den: 4 },
      b: { num: 1, den: 2 }
    },

    init() {
      const selectA = document.getElementById('frac-a-denom');
      const selectB = document.getElementById('frac-b-denom');
      const resetBtn = document.getElementById('frac-reset-btn');
      const copyBtn = document.getElementById('frac-copy-scratchpad-btn');

      if (!selectA || !selectB) return;

      selectA.addEventListener('change', (e) => {
        this.state.a.den = parseInt(e.target.value, 10);
        if (this.state.a.num > this.state.a.den) this.state.a.num = this.state.a.den;
        this.render();
      });

      selectB.addEventListener('change', (e) => {
        this.state.b.den = parseInt(e.target.value, 10);
        if (this.state.b.num > this.state.b.den) this.state.b.num = this.state.b.den;
        this.render();
      });

      if (resetBtn) {
        resetBtn.addEventListener('click', () => {
          this.state.a = { num: 1, den: 4 };
          this.state.b = { num: 1, den: 2 };
          selectA.value = '4';
          selectB.value = '2';
          this.render();
        });
      }

      if (copyBtn) {
        copyBtn.addEventListener('click', () => {
          const comp = this.getComparisonLatex();
          const add = this.getAdditionLatex();
          const text = `### Fraction Manipulatives Exploration\n- **Comparison:** $${comp}$\n- **Sum:** $${add}$`;
          copyToScratchpad(text, 'Fraction equations copied to Scratchpad notes!');
        });
      }

      this.render();
    },

    setPart(which, idx) {
      if (which === 'a') {
        this.state.a.num = (this.state.a.num === idx) ? idx - 1 : idx;
      } else {
        this.state.b.num = (this.state.b.num === idx) ? idx - 1 : idx;
      }
      this.render();
    },

    render() {
      this.renderStrip('a', this.state.a);
      this.renderStrip('b', this.state.b);
      this.renderSynthesis();
    },

    renderStrip(which, frac) {
      const container = document.getElementById('frac-' + which + '-strip');
      const numDisplay = document.getElementById('frac-' + which + '-numerator');
      const denDisplay = document.getElementById('frac-' + which + '-denom-text');
      const decDisplay = document.getElementById('frac-' + which + '-decimal');

      if (!container) return;

      container.innerHTML = '';
      for (let i = 1; i <= frac.den; i++) {
        const seg = document.createElement('button');
        seg.type = 'button';
        seg.className = `frac-segment ${i <= frac.num ? 'shaded-' + which : ''}`;
        seg.setAttribute('aria-label', `Part ${i} of ${frac.den}`);
        seg.textContent = `1/${frac.den}`;
        seg.addEventListener('click', () => this.setPart(which, i));
        container.appendChild(seg);
      }

      if (numDisplay) numDisplay.textContent = frac.num;
      if (denDisplay) denDisplay.textContent = frac.den;

      const dec = frac.den > 0 ? frac.num / frac.den : 0;
      if (decDisplay) {
        decDisplay.textContent = `${dec.toFixed(2)} (${Math.round(dec * 100)}%)`;
      }
    },

    getComparisonLatex() {
      const { a, b } = this.state;
      const valA = a.num / a.den;
      const valB = b.num / b.den;
      let symbol = '=';
      if (valA < valB) symbol = '<';
      else if (valA > valB) symbol = '>';

      return `\\frac{${a.num}}{${a.den}} ${symbol} \\frac{${b.num}}{${b.den}}`;
    },

    getAdditionLatex() {
      const { a, b } = this.state;
      const commonDen = lcm(a.den, b.den);
      const multA = commonDen / a.den;
      const multB = commonDen / b.den;
      const newNumA = a.num * multA;
      const newNumB = b.num * multB;
      const sumNum = newNumA + newNumB;
      const div = gcd(sumNum, commonDen);
      const simpNum = sumNum / div;
      const simpDen = commonDen / div;

      let result = `\\frac{${a.num}}{${a.den}} + \\frac{${b.num}}{${b.den}}`;
      if (a.den !== commonDen || b.den !== commonDen) {
        result += ` = \\frac{${newNumA}}{${commonDen}} + \\frac{${newNumB}}{${commonDen}}`;
      }
      result += ` = \\frac{${sumNum}}{${commonDen}}`;
      if (div > 1) {
        result += ` = \\frac{${simpNum}}{${simpDen}}`;
      }
      return result;
    },

    renderSynthesis() {
      const compBox = document.getElementById('frac-math-comparison');
      const addBox = document.getElementById('frac-math-addition');

      if (compBox) {
        compBox.innerHTML = `$$${this.getComparisonLatex()}$$`;
        safeTypeset(compBox);
      }
      if (addBox) {
        addBox.innerHTML = `$$${this.getAdditionLatex()}$$`;
        safeTypeset(addBox);
      }
    }
  };

  // ========================================================
  // 3. PLACE VALUE & BASE-10 BLOCKS LAB
  // ========================================================
  const Base10Lab = {
    counts: {
      thousands: 1,
      hundreds: 2,
      tens: 4,
      ones: 5
    },

    init() {
      const stepBtns = document.querySelectorAll('.btn-step');
      const resetBtn = document.getElementById('base10-reset-btn');
      const copyBtn = document.getElementById('base10-copy-scratchpad-btn');

      stepBtns.forEach(btn => {
        btn.addEventListener('click', () => {
          const unit = btn.getAttribute('data-unit');
          const act = btn.getAttribute('data-action');
          if (act === 'inc') {
            if (this.counts[unit] < 9) this.counts[unit]++;
          } else {
            if (this.counts[unit] > 0) this.counts[unit]--;
          }
          this.render();
        });
      });

      if (resetBtn) {
        resetBtn.addEventListener('click', () => {
          this.counts = { thousands: 0, hundreds: 0, tens: 0, ones: 0 };
          this.render();
        });
      }

      if (copyBtn) {
        copyBtn.addEventListener('click', () => {
          const total = this.getTotal();
          const exp = this.getExpandedForm();
          const text = `### Place Value Exploration\n- **Standard Form:** ${total.toLocaleString()}\n- **Expanded Form:** ${exp}`;
          copyToScratchpad(text, 'Place-value data copied to Scratchpad notes!');
        });
      }

      this.render();
    },

    getTotal() {
      return (
        this.counts.thousands * 1000 +
        this.counts.hundreds * 100 +
        this.counts.tens * 10 +
        this.counts.ones * 1
      );
    },

    getExpandedForm() {
      const parts = [];
      if (this.counts.thousands > 0) parts.push((this.counts.thousands * 1000).toLocaleString());
      if (this.counts.hundreds > 0) parts.push((this.counts.hundreds * 100).toLocaleString());
      if (this.counts.tens > 0) parts.push((this.counts.tens * 10).toLocaleString());
      if (this.counts.ones > 0) parts.push(this.counts.ones.toString());
      return parts.length > 0 ? parts.join(' + ') : '0';
    },

    render() {
      // Update badges
      document.getElementById('count-thousands').textContent = this.counts.thousands;
      document.getElementById('count-hundreds').textContent = this.counts.hundreds;
      document.getElementById('count-tens').textContent = this.counts.tens;
      document.getElementById('count-ones').textContent = this.counts.ones;

      // Update HUD
      const total = this.getTotal();
      const totalEl = document.getElementById('base10-total-val');
      const expEl = document.getElementById('base10-expanded-text');
      if (totalEl) totalEl.textContent = total.toLocaleString();
      if (expEl) expEl.textContent = this.getExpandedForm();

      // Render Stages
      this.populateStage('thousands', this.counts.thousands, 'block-cube', '1,000');
      this.populateStage('hundreds', this.counts.hundreds, 'block-flat', '');
      this.populateStage('tens', this.counts.tens, 'block-rod', '');
      this.populateStage('ones', this.counts.ones, 'block-unit', '');
    },

    populateStage(unit, count, className, label) {
      const stage = document.getElementById('stage-' + unit);
      if (!stage) return;
      stage.innerHTML = '';
      for (let i = 0; i < count; i++) {
        const div = document.createElement('div');
        div.className = className;
        if (label) div.textContent = label;
        div.setAttribute('aria-label', `${unit} block ${i + 1}`);
        stage.appendChild(div);
      }
    }
  };

  // ========================================================
  // 4. DYNAMIC CARTESIAN FUNCTION GRAPHER
  // ========================================================
  const GrapherLab = {
    family: 'linear',
    params: {
      m: 1,
      b: 0,
      a: 1,
      h: 0,
      k: 0,
      c: 0
    },

    init() {
      const select = document.getElementById('graph-family-select');
      const resetBtn = document.getElementById('graph-reset-btn');
      const copyBtn = document.getElementById('graph-copy-scratchpad-btn');

      if (!select) return;

      select.addEventListener('change', (e) => {
        this.family = e.target.value;
        this.resetParams();
        this.buildSliders();
        this.render();
      });

      if (resetBtn) {
        resetBtn.addEventListener('click', () => {
          this.resetParams();
          this.buildSliders();
          this.render();
        });
      }

      if (copyBtn) {
        copyBtn.addEventListener('click', () => {
          const eq = this.getLatexEquation();
          const text = `### Dynamic Function Grapher\n- **Function:** $${eq}$`;
          copyToScratchpad(text, 'Function equation copied to Scratchpad notes!');
        });
      }

      this.buildSliders();
      this.render();
    },

    resetParams() {
      if (this.family === 'linear') {
        this.params.m = 1;
        this.params.b = 0;
      } else if (this.family === 'quadratic') {
        this.params.a = 1;
        this.params.b = 0;
        this.params.c = 0;
      } else if (this.family === 'absolute') {
        this.params.a = 1;
        this.params.h = 0;
        this.params.k = 0;
      }
    },

    buildSliders() {
      const container = document.getElementById('graph-sliders-box');
      if (!container) return;
      container.innerHTML = '';

      let config = [];
      if (this.family === 'linear') {
        config = [
          { key: 'm', label: 'Slope (m)', min: -5, max: 5, step: 0.5, val: this.params.m },
          { key: 'b', label: 'Y-Intercept (b)', min: -8, max: 8, step: 1, val: this.params.b }
        ];
      } else if (this.family === 'quadratic') {
        config = [
          { key: 'a', label: 'Quadratic Curvature (a)', min: -3, max: 3, step: 0.25, val: this.params.a },
          { key: 'b', label: 'Linear Coefficient (b)', min: -6, max: 6, step: 0.5, val: this.params.b },
          { key: 'c', label: 'Constant (c)', min: -8, max: 8, step: 1, val: this.params.c }
        ];
      } else if (this.family === 'absolute') {
        config = [
          { key: 'a', label: 'Vertical Stretch (a)', min: -3, max: 3, step: 0.5, val: this.params.a },
          { key: 'h', label: 'Horizontal Shift (h)', min: -6, max: 6, step: 1, val: this.params.h },
          { key: 'k', label: 'Vertical Shift (k)', min: -6, max: 6, step: 1, val: this.params.k }
        ];
      }

      config.forEach(cfg => {
        const row = document.createElement('div');
        row.className = 'graph-slider-row';

        const header = document.createElement('div');
        header.className = 'graph-slider-header';
        header.innerHTML = `<span>${cfg.label}</span><span class="graph-slider-val" id="val-${cfg.key}">${cfg.val}</span>`;

        const input = document.createElement('input');
        input.type = 'range';
        input.className = 'graph-range-input';
        input.min = cfg.min;
        input.max = cfg.max;
        input.step = cfg.step;
        input.value = cfg.val;
        input.setAttribute('aria-label', cfg.label);

        input.addEventListener('input', (e) => {
          const num = parseFloat(e.target.value);
          this.params[cfg.key] = num;
          const valEl = document.getElementById('val-' + cfg.key);
          if (valEl) valEl.textContent = num;
          this.render();
        });

        row.appendChild(header);
        row.appendChild(input);
        container.appendChild(row);
      });
    },

    getLatexEquation() {
      if (this.family === 'linear') {
        const m = this.params.m;
        const b = this.params.b;
        let str = `y = `;
        if (m === 0) str += `${b}`;
        else {
          if (m === 1) str += `x`;
          else if (m === -1) str += `-x`;
          else str += `${m}x`;

          if (b > 0) str += ` + ${b}`;
          else if (b < 0) str += ` - ${Math.abs(b)}`;
        }
        return str;
      } else if (this.family === 'quadratic') {
        const { a, b, c } = this.params;
        let str = `y = `;
        if (a === 1) str += `x^2`;
        else if (a === -1) str += `-x^2`;
        else str += `${a}x^2`;

        if (b > 0) str += ` + ${b === 1 ? '' : b}x`;
        else if (b < 0) str += ` - ${Math.abs(b) === 1 ? '' : Math.abs(b)}x`;

        if (c > 0) str += ` + ${c}`;
        else if (c < 0) str += ` - ${Math.abs(c)}`;
        return str;
      } else if (this.family === 'absolute') {
        const { a, h, k } = this.params;
        let str = `y = `;
        if (a === -1) str += `-`;
        else if (a !== 1) str += `${a}`;

        str += `|x`;
        if (h > 0) str += ` - ${h}`;
        else if (h < 0) str += ` + ${Math.abs(h)}`;
        str += `|`;

        if (k > 0) str += ` + ${k}`;
        else if (k < 0) str += ` - ${Math.abs(k)}`;
        return str;
      }
      return 'y = x';
    },

    computeFunction(x) {
      if (this.family === 'linear') {
        return this.params.m * x + this.params.b;
      } else if (this.family === 'quadratic') {
        return this.params.a * x * x + this.params.b * x + this.params.c;
      } else if (this.family === 'absolute') {
        return this.params.a * Math.abs(x - this.params.h) + this.params.k;
      }
      return x;
    },

    render() {
      // 1. Update LaTeX
      const eqEl = document.getElementById('graph-equation-mathjax');
      if (eqEl) {
        eqEl.innerHTML = `$$${this.getLatexEquation()}$$`;
        safeTypeset(eqEl);
      }

      // 2. Render SVG Grid & Curve
      const svg = document.getElementById('coordinate-plane-svg');
      if (!svg) return;

      const size = 500;
      const center = size / 2;
      const scale = 25; // 25px = 1 unit (-10 to +10)

      let svgHtml = `
        <defs>
          <marker id="arrow" viewBox="0 0 10 10" refX="5" refY="5" markerWidth="6" markerHeight="6" orient="auto-start-reverse">
            <path d="M 0 0 L 10 5 L 0 10 z" fill="#94a3b8"/>
          </marker>
        </defs>
      `;

      // Draw Grid Lines
      for (let i = -10; i <= 10; i++) {
        const pos = center + i * scale;
        // Minor grid line
        svgHtml += `<line x1="${pos}" y1="0" x2="${pos}" y2="${size}" stroke="#1e293b" stroke-width="1" />`;
        svgHtml += `<line x1="0" y1="${pos}" x2="${size}" y2="${pos}" stroke="#1e293b" stroke-width="1" />`;
      }

      // Draw Axes
      svgHtml += `<line x1="10" y1="${center}" x2="${size - 10}" y2="${center}" stroke="#64748b" stroke-width="2" marker-end="url(#arrow)" />`;
      svgHtml += `<line x1="${center}" y1="${size - 10}" x2="${center}" y2="10" stroke="#64748b" stroke-width="2" marker-end="url(#arrow)" />`;

      // Labels on axes
      svgHtml += `<text x="${size - 20}" y="${center - 8}" fill="#94a3b8" font-size="12" font-weight="700">x</text>`;
      svgHtml += `<text x="${center + 8}" y="20" fill="#94a3b8" font-size="12" font-weight="700">y</text>`;

      // Compute Path Points
      const points = [];
      const step = 0.1;
      for (let x = -10; x <= 10; x += step) {
        const y = this.computeFunction(x);
        if (isFinite(y)) {
          const svgX = center + x * scale;
          const svgY = center - y * scale;
          points.push(`${svgX.toFixed(1)},${svgY.toFixed(1)}`);
        }
      }

      if (points.length > 0) {
        svgHtml += `<polyline points="${points.join(' ')}" fill="none" stroke="#6366f1" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />`;
      }

      // Y-intercept point
      const yInt = this.computeFunction(0);
      if (yInt >= -10 && yInt <= 10) {
        const ptX = center;
        const ptY = center - yInt * scale;
        svgHtml += `<circle cx="${ptX}" cy="${ptY}" r="5.5" fill="#f59e0b" stroke="#ffffff" stroke-width="1.5" />`;
      }

      svg.innerHTML = svgHtml;

      // Update Key Features readout
      this.updateFeaturesList(yInt);
    },

    updateFeaturesList(yInt) {
      const featContainer = document.getElementById('graph-features-list');
      if (!featContainer) return;

      let html = `<div class="feature-item"><span>Y-Intercept:</span><span class="feature-val">(0, ${yInt.toFixed(2)})</span></div>`;

      if (this.family === 'linear') {
        const root = this.params.m !== 0 ? (-this.params.b / this.params.m) : null;
        html += `<div class="feature-item"><span>Root (X-Intercept):</span><span class="feature-val">${root !== null ? `(${root.toFixed(2)}, 0)` : 'None'}</span></div>`;
        html += `<div class="feature-item"><span>Slope (Rate of Change):</span><span class="feature-val">${this.params.m}</span></div>`;
      } else if (this.family === 'quadratic') {
        const { a, b, c } = this.params;
        const vx = -b / (2 * a);
        const vy = this.computeFunction(vx);
        html += `<div class="feature-item"><span>Vertex (${a > 0 ? 'Minimum' : 'Maximum'}):</span><span class="feature-val">(${vx.toFixed(2)}, ${vy.toFixed(2)})</span></div>`;
        const disc = b * b - 4 * a * c;
        if (disc > 0) {
          const r1 = (-b + Math.sqrt(disc)) / (2 * a);
          const r2 = (-b - Math.sqrt(disc)) / (2 * a);
          html += `<div class="feature-item"><span>Real Roots:</span><span class="feature-val">x ≈ ${r1.toFixed(2)}, ${r2.toFixed(2)}</span></div>`;
        } else if (disc === 0) {
          html += `<div class="feature-item"><span>Double Root:</span><span class="feature-val">x = ${(-b / (2 * a)).toFixed(2)}</span></div>`;
        } else {
          html += `<div class="feature-item"><span>Real Roots:</span><span class="feature-val">None (Complex)</span></div>`;
        }
      } else if (this.family === 'absolute') {
        const { h, k, a } = this.params;
        html += `<div class="feature-item"><span>Vertex:</span><span class="feature-val">(${h}, ${k})</span></div>`;
        html += `<div class="feature-item"><span>Opens:</span><span class="feature-val">${a > 0 ? 'Upward' : 'Downward'}</span></div>`;
      }

      featContainer.innerHTML = html;
    }
  };

  // Expose Globally
  window.GrapherLab = GrapherLab;

  // Init on DOM ready
  document.addEventListener('DOMContentLoaded', () => {
    initTabs();
    FractionsLab.init();
    Base10Lab.init();
    GrapherLab.init();
  });

})();
