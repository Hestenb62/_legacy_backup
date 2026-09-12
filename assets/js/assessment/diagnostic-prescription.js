/**
 * assets/js/assessment/diagnostic-prescription.js
 * Generates actionable, standards-aligned remediation cards upon assessment completion.
 */

(function () {
  'use strict';

  function initPrescriptionEngine() {
    window.addEventListener('hl:assessment-complete', function (e) {
      const results = e.detail || {};
      renderPrescription(results);
    });
  }

  function renderPrescription(results) {
    const targetContainer = document.getElementById('diagnostic-prescription-root') ||
                            document.querySelector('.assessment-results-container') ||
                            document.querySelector('.summary-card');
    if (!targetContainer) return;

    const missedStandards = results.missedStandards || ['5.NF.A.1', '5.NBT.B.7'];

    const prescriptionCard = document.createElement('div');
    prescriptionCard.className = 'prescription-path-card animate-reveal';
    prescriptionCard.innerHTML = `
      <div class="prescription-header">
        <div class="prescription-badge"><i class="fas fa-stethoscope"></i> Personalized Learning Prescription</div>
        <h3>Targeted Remediation Recommendations</h3>
        <p>Based on your diagnostic responses, master these core standards to boost your proficiency:</p>
      </div>

      <div class="prescription-grid">
        ${missedStandards.map(std => `
          <div class="prescription-item">
            <div class="prescription-item-top">
              <span class="std-code">${std}</span>
              <span class="std-urgency">Needs Practice</span>
            </div>
            <div class="prescription-actions">
              <a href="/student/math-practice.php?std=${std}" class="rx-btn rx-practice">
                <i class="fas fa-play-circle"></i> 5-Min Practice Drill
              </a>
              <a href="/student/interactive-labs.php?topic=${std}" class="rx-btn rx-lab">
                <i class="fas fa-flask"></i> Interactive Lab
              </a>
              <a href="/pages/standards.php?q=${std}" class="rx-btn rx-standard">
                <i class="fas fa-book"></i> Standard Details
              </a>
            </div>
          </div>
        `).join('')}
      </div>
    `;

    targetContainer.appendChild(prescriptionCard);

    if (window.HLSound) {
      window.HLSound.playCorrect();
    }
  }

  window.HLPrescription = {
    render: renderPrescription
  };

  document.addEventListener('DOMContentLoaded', initPrescriptionEngine);
})();
