/**
 * assets/js/teacher/mastery-heatmap.js
 * Visual Class Standards Mastery Heatmap Matrix for Hesten's Learning.
 */

(function () {
  'use strict';

  const STANDARDS_COLS = ['K.CC', '1.OA', '3.NF', '5.NBT', '8.EE', 'HSA-SSE', 'ELA.RL', 'SCI.LS'];

  function initHeatmap() {
    const root = document.getElementById('class-mastery-heatmap-root');
    if (!root) return;

    renderHeatmap(root);
  }

  function getRoster() {
    try {
      const stored = localStorage.getItem('hesten_teacher_roster');
      if (stored) return JSON.parse(stored);
    } catch (e) {}
    return [
      { id: 1, name: 'Alex Johnson', grade: '5', mastery: { '5.NBT': 95, '8.EE': 78, 'ELA.RL': 88 } },
      { id: 2, name: 'Maya Lin', grade: 'K', mastery: { 'K.CC': 100, '1.OA': 85 } },
      { id: 3, name: 'Jordan Hayes', grade: '8', mastery: { '8.EE': 62, 'HSA-SSE': 55, 'SCI.LS': 90 } },
      { id: 4, name: 'Taylor Swift', grade: '5', mastery: { '5.NBT': 82, '3.NF': 91, 'ELA.RL': 94 } }
    ];
  }

  function renderHeatmap(root) {
    const roster = getRoster();

    root.innerHTML = `
      <div class="mastery-heatmap-card">
        <div class="heatmap-header">
          <div>
            <h3><i class="fas fa-th" style="color:#2563eb"></i> Classroom Standards Mastery Heatmap</h3>
            <p>Real-time competency matrix across core Common Core & NGSS standard domains.</p>
          </div>
          <div class="heatmap-legend">
            <span class="legend-cell mastered">≥85% Mastered</span>
            <span class="legend-cell developing">70-84% Developing</span>
            <span class="legend-cell support">&lt;70% Support</span>
            <span class="legend-cell unassessed">Unassessed</span>
          </div>
        </div>

        <div class="heatmap-table-wrap">
          <table class="heatmap-table">
            <thead>
              <tr>
                <th class="col-student">Student Name</th>
                <th class="col-grade">Grade</th>
                ${STANDARDS_COLS.map(c => '<th>' + c + '</th>').join('')}
              </tr>
            </thead>
            <tbody>
              ${roster.map(st => `
                <tr>
                  <td class="student-cell"><strong>${st.name}</strong></td>
                  <td class="grade-cell">${st.grade}</td>
                  ${STANDARDS_COLS.map(c => {
                    const val = (st.mastery && st.mastery[c] !== undefined) ? st.mastery[c] : null;
                    let cls = 'unassessed';
                    let text = '-';
                    if (val !== null) {
                      text = val + '%';
                      if (val >= 85) cls = 'mastered';
                      else if (val >= 70) cls = 'developing';
                      else cls = 'support';
                    }
                    return '<td class="score-cell ' + cls + '" title="' + st.name + ' - ' + c + ': ' + text + '">' + text + '</td>';
                  }).join('')}
                </tr>
              `).join('')}
            </tbody>
          </table>
        </div>
      </div>
    `;
  }

  window.HLMasteryHeatmap = {
    render: initHeatmap
  };

  document.addEventListener('DOMContentLoaded', initHeatmap);
})();
