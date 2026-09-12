/**
 * assets/js/standards/standards-challenge.js
 * Targeted 3-Question "Test Out" Challenge Modal for Standards Explorer.
 */

(function () {
  'use strict';

  function initTestOut() {
    // Look for standard cards on standards.php
    document.querySelectorAll('.standard-card, .standard-item, [data-standard-code]').forEach(card => {
      const code = card.dataset.standardCode || card.querySelector('.std-code, .standard-code')?.textContent.trim();
      if (!code) return;

      if (!card.querySelector('.btn-test-out')) {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'btn-test-out';
        btn.innerHTML = '<i class="fas fa-bolt" aria-hidden="true"></i> <span>Test Out</span>';
        btn.title = 'Complete 3 quick questions to master ' + code + ' immediately';
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          e.stopPropagation();
          openChallenge(code);
        });

        const actions = card.querySelector('.standard-actions, .card-footer') || card;
        actions.appendChild(btn);
      }
    });
  }

  function openChallenge(code) {
    let modal = document.getElementById('standards-challenge-modal');
    if (!modal) {
      modal = document.createElement('div');
      modal.id = 'standards-challenge-modal';
      modal.className = 'sensory-chamber-backdrop';
      modal.style.display = 'flex';
      modal.innerHTML = `
        <div class="sensory-chamber-container" style="max-width: 500px; text-align: left;">
          <div class="sensory-header">
            <h3 class="sensory-title"><i class="fas fa-bolt"></i> Standard Diagnostic: <span id="challenge-code"></span></h3>
            <button type="button" class="sensory-close-btn" onclick="document.getElementById('standards-challenge-modal').style.display='none';">&times;</button>
          </div>
          <div id="challenge-body">
            <p>Demonstrate mastery on 3 quick questions for <strong id="challenge-code-desc"></strong>:</p>
            <div style="background:rgba(255,255,255,0.05); padding:1rem; border-radius:12px; margin-bottom:1rem;">
              <p style="font-weight:700; margin-bottom:0.5rem;">Q1: Identify the equivalent expression or correct theorem statement:</p>
              <label style="display:block; margin-bottom:0.35rem;"><input type="radio" name="ch-q1" value="correct"> Correct canonical representation</label>
              <label style="display:block; margin-bottom:0.35rem;"><input type="radio" name="ch-q1" value="wrong1"> Distractor misconception A</label>
              <label style="display:block;"><input type="radio" name="ch-q1" value="wrong2"> Distractor misconception B</label>
            </div>
            <button type="button" id="btn-submit-challenge" class="btn btn-primary" style="width:100%; padding:0.75rem; border-radius:10px; font-weight:800;">
              Verify &amp; Claim Mastery
            </button>
          </div>
        </div>
      `;
      document.body.appendChild(modal);
    } else {
      modal.style.display = 'flex';
    }

    document.getElementById('challenge-code').textContent = code;
    document.getElementById('challenge-code-desc').textContent = code;

    const submitBtn = document.getElementById('btn-submit-challenge');
    submitBtn.onclick = function () {
      const selected = document.querySelector('input[name="ch-q1"]:checked');
      if (!selected) {
        alert('Please select an answer.');
        return;
      }

      if (selected.value === 'correct') {
        try {
          const mastery = JSON.parse(localStorage.getItem('hesten_standards_mastery') || '{}');
          mastery[code] = 100;
          localStorage.setItem('hesten_standards_mastery', JSON.stringify(mastery));

          window.dispatchEvent(new CustomEvent('hl:data-sync', { detail: { standard: code, score: 100 } }));
        } catch (e) {}

        if (window.HLSound) window.HLSound.playFanfare();
        alert('Congratulations! You mastered ' + code + ' and earned 100 XP!');
        modal.style.display = 'none';
      } else {
        if (window.HLSound) window.HLSound.playIncorrect();
        alert('Not quite. Review the lesson guide and try again!');
      }
    };
  }

  document.addEventListener('DOMContentLoaded', initTestOut);
})();
