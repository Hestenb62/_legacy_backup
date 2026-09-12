<!-- Sensory Chamber / Breathe & Reset Modal -->
<link rel=stylesheet href=/assets/css/sensory-chamber.css>

<div id=sensory-chamber-modal class=sensory-chamber-backdrop role=dialog aria-modal=true aria-labelledby=sensory-modal-title aria-describedby=sensory-instruction style=display: none;>
  <div class=sensory-chamber-container>
    <div class=sensory-header>
      <h2 id=sensory-modal-title class=sensory-title>
        <i class=fas fa-spa aria-hidden=true></i> Sensory Breathe &amp; Reset
      </h2>
      <button type=button id=sensory-close-btn class=sensory-close-btn aria-label=Close Sensory Chamber (Escape)>
        <i class=fas fa-times aria-hidden=true></i>
      </button>
    </div>

    <!-- Pacing Orb Stage -->
    <div class=sensory-orb-stage>
      <div class=sensory-orb-ring aria-hidden=true></div>
      <div id=sensory-breathing-orb class=sensory-orb aria-hidden=true></div>
    </div>

    <!-- Guidance text with ARIA live announcement -->
    <div class=sensory-phase-label id=sensory-phase-label aria-live=polite>Ready</div>
    <p class=sensory-instruction id=sensory-instruction aria-live=polite>Take a gentle breath to begin relaxing your mind.</p>

    <!-- Pacing & Timer info -->
    <div class=sensory-timer-badge>
      <i class=fas fa-hourglass-half aria-hidden=true></i>
      <span id=sensory-timer-display>2:00</span> Remaining
    </div>

    <!-- Controls Toolbar -->
    <div class=sensory-controls-toolbar>
      <label class=sensory-option>
        <input type=checkbox id=sensory-sound-toggle checked>
        <span><i class=fas fa-water aria-hidden=true></i> Ocean Ambience</span>
      </label>

      <label class=sensory-option>
        <span>Duration:</span>
        <select id=sensory-duration-select class=sensory-select aria-label=Session Duration>
          <option value=60>1 Minute</option>
          <option value=120 selected>2 Minutes</option>
          <option value=300>5 Minutes</option>
        </select>
      </label>
    </div>
  </div>
</div>
