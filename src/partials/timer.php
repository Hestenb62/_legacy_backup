<!-- src/partials/timer.php -->
<div id="timer-panel" class="timer-panel-overlay" aria-modal="true" role="dialog" aria-labelledby="timer-modal-title">
    <!-- Backdrop -->
    <div class="timer-backdrop" id="timer-backdrop-close"></div>

    <!-- Modal Content -->
    <div class="timer-content">
        <!-- Header -->
        <div class="scratchpad-header">
            <div class="scratchpad-title-group">
                <div class="scratchpad-icon-box" style="background-color: color-mix(in srgb, var(--color-primary) 10%, transparent); color: var(--color-primary);">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <h3 class="scratchpad-title" id="timer-modal-title">Study Companion</h3>
                    <p class="scratchpad-subtitle">Timer, Stopwatch, and Break Reminders</p>
                </div>
            </div>
            <button id="timer-close" class="scratchpad-close-btn" aria-label="Close Study Tools">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="scratchpad-body" style="flex-direction: column;">
            <!-- Tabs Navigation -->
            <div class="doc-modal-tab-container" style="margin: 1.5rem auto 0 auto; z-index: 10;">
                <div class="doc-modal-tab-slider" id="timer-tab-slider" style="width: 7rem; transform: translateX(0);"></div>
                <button class="modal-tab-pill active" id="tab-btn-pomodoro">Timer</button>
                <button class="modal-tab-pill" id="tab-btn-stopwatch">Stopwatch</button>
                <button class="modal-tab-pill" id="tab-btn-reminders">Alarms</button>
                <button class="modal-tab-pill" id="tab-btn-ambient"><i class="fas fa-headphones"></i> Sound</button>
            </div>

            <!-- Tab Content Area -->
            <div style="padding: 1.5rem 2rem; flex-grow: 1; overflow-y: auto; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 1.5rem;">
                
                <!-- Pane 1: Pomodoro / Flowmodoro Study Timer -->
                <div id="pane-pomodoro" class="timer-pane active" style="width: 100%; max-width: 32rem; text-align: center;">
                    <!-- Timer Mode Switcher -->
                    <div style="display: inline-flex; background: var(--color-bg-surface); padding: 0.25rem; border-radius: var(--radius-full); border: 1px solid var(--color-border); margin-bottom: 1rem;">
                        <button type="button" id="timer-mode-countdown" class="modal-tab-pill active" style="padding: 0.25rem 0.85rem; font-size: 0.75rem; border-radius: var(--radius-full);">Countdown</button>
                        <button type="button" id="timer-mode-flowmodoro" class="modal-tab-pill" style="padding: 0.25rem 0.85rem; font-size: 0.75rem; border-radius: var(--radius-full);">Flowmodoro (Count Up)</button>
                    </div>

                    <!-- Big Display -->
                    <div class="timer-large-display" id="pomodoro-display" style="font-size: 5rem; font-weight: 900; font-family: monospace; letter-spacing: 0.05em; color: var(--color-text-main); margin-bottom: 0.5rem; text-shadow: 0 0 10px color-mix(in srgb, var(--color-primary) 20%, transparent);">25:00</div>
                    <div id="pomodoro-state" style="font-size: 0.875rem; font-weight: 700; color: var(--color-primary); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 1.5rem;">Study Session</div>

                    <!-- Preset Options (Countdown) -->
                    <div id="pomodoro-presets" style="display: flex; justify-content: center; gap: 0.5rem; margin-bottom: 1.5rem; flex-wrap: wrap;">
                        <button class="template-btn active timer-preset-btn" data-time="1500" data-break="300" style="padding: 0.5rem 1rem;">25m Study / 5m Break</button>
                        <button class="template-btn timer-preset-btn" data-time="3000" data-break="600" style="padding: 0.5rem 1rem;">50m Study / 10m Break</button>
                        <button class="template-btn timer-preset-btn" data-time="900" data-break="180" style="padding: 0.5rem 1rem;">15m Study / 3m Break</button>
                    </div>

                    <!-- Flowmodoro Break Recommendation (Flowmodoro Mode) -->
                    <div id="flowmodoro-break-card" style="display: none; margin-bottom: 1.25rem; font-size: 0.85rem; color: var(--color-text-muted); background: var(--color-bg-surface); padding: 0.5rem 1rem; border-radius: var(--radius-md); border: 1px solid var(--color-border);">
                        Earned break: <strong id="flowmodoro-earned-break" style="color: var(--color-primary);">0 mins</strong> (calculated as 5m break per 25m focus)
                    </div>

                    <!-- Assessment Mode Toggle -->
                    <div style="display: flex; align-items: center; justify-content: center; gap: 0.75rem; margin-bottom: 1.5rem; background-color: var(--color-bg-surface); padding: 0.75rem 1.25rem; border-radius: var(--radius-lg); border: 1px solid var(--color-border);">
                        <input type="checkbox" id="timer-assessment-mode" style="width: 1.15rem; height: 1.15rem; cursor: pointer;">
                        <label for="timer-assessment-mode" style="font-size: 0.875rem; font-weight: 700; color: var(--color-text-main); cursor: pointer;">
                            Assessment Mode <span style="font-weight: 500; color: var(--color-text-muted);">(Disable break alerts for tests)</span>
                        </label>
                    </div>

                    <!-- Controls -->
                    <div style="display: flex; justify-content: center; gap: 1rem;">
                        <button id="pomodoro-start" class="scratchpad-download-btn" style="background-color: var(--color-primary); color: white; border-radius: var(--radius-md); padding: 0.75rem 2rem; font-weight: 700; min-width: 8rem; justify-content: center; text-decoration: none; border: none; cursor: pointer;">Start</button>
                        <button id="pomodoro-reset" class="scratchpad-clear-btn" style="border: 1px solid var(--color-border); padding: 0.75rem 2rem; border-radius: var(--radius-md); font-weight: 700; min-width: 8rem; justify-content: center; background: var(--color-bg-surface);">Reset</button>
                    </div>
                </div>

                <!-- Pane 2: Stopwatch -->
                <div id="pane-stopwatch" class="timer-pane" style="width: 100%; max-width: 32rem; text-align: center; display: none;">
                    <div class="timer-large-display" id="stopwatch-display" style="font-size: 5rem; font-weight: 900; font-family: monospace; letter-spacing: 0.05em; color: var(--color-text-main); margin-bottom: 1.5rem;">00:00.00</div>
                    
                    <div style="display: flex; justify-content: center; gap: 1rem; margin-bottom: 1.5rem;">
                        <button id="stopwatch-start" class="scratchpad-download-btn" style="background-color: var(--color-secondary); color: white; border-radius: var(--radius-md); padding: 0.75rem 2rem; font-weight: 700; min-width: 8rem; justify-content: center; text-decoration: none; border: none; cursor: pointer;">Start</button>
                        <button id="stopwatch-lap" class="scratchpad-clear-btn" style="border: 1px solid var(--color-border); padding: 0.75rem 2rem; border-radius: var(--radius-md); font-weight: 700; min-width: 8rem; justify-content: center; background: var(--color-bg-surface); color: var(--color-text-main);">Lap</button>
                        <button id="stopwatch-reset" class="scratchpad-clear-btn" style="border: 1px solid var(--color-border); padding: 0.75rem 2rem; border-radius: var(--radius-md); font-weight: 700; min-width: 8rem; justify-content: center; background: var(--color-bg-surface);">Reset</button>
                    </div>

                    <!-- Lap Times -->
                    <div id="stopwatch-laps" style="max-height: 8rem; overflow-y: auto; background-color: var(--color-bg-surface); border-radius: var(--radius-lg); border: 1px solid var(--color-border); padding: 0.5rem 1rem; text-align: left; font-size: 0.875rem;">
                        <div style="color: var(--color-text-muted); text-align: center; padding: 0.5rem 0;">No laps recorded</div>
                    </div>
                </div>

                <!-- Pane 3: Quick Alarms / Reminders -->
                <div id="pane-reminders" class="timer-pane" style="width: 100%; max-width: 32rem; text-align: center; display: none;">
                    <h4 class="sidebar-section-title" style="margin-bottom: 1rem;">Set Reminder Timer</h4>
                    <div style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 0.75rem; margin-bottom: 1.5rem;">
                        <button class="template-btn alarm-preset-btn" data-alarm="300">5 Mins</button>
                        <button class="template-btn alarm-preset-btn" data-alarm="600">10 Mins</button>
                        <button class="template-btn alarm-preset-btn" data-alarm="900">15 Mins</button>
                        <button class="template-btn alarm-preset-btn" data-alarm="1800">30 Mins</button>
                        <button class="template-btn alarm-preset-btn" data-alarm="2700">45 Mins</button>
                        <button class="template-btn alarm-preset-btn" data-alarm="3600">1 Hour</button>
                    </div>

                    <!-- Custom Alarm -->
                    <div style="display: flex; gap: 0.5rem; justify-content: center; align-items: center; margin-bottom: 1.5rem;">
                        <input type="number" id="alarm-custom-mins" placeholder="Mins" min="1" max="1440" class="citation-page-input" style="border-radius: var(--radius-md); padding: 0.5rem 1rem; width: 6rem; text-align: center;">
                        <button id="alarm-custom-set" class="scratchpad-download-btn" style="background-color: var(--color-primary); color: white; border-radius: var(--radius-md); padding: 0.65rem 1.5rem; font-weight: 700; text-decoration: none; border: none; cursor: pointer;">Set Custom</button>
                    </div>

                    <!-- Active Alarms -->
                    <div id="active-alarms-list" style="background-color: var(--color-bg-surface); border-radius: var(--radius-lg); border: 1px solid var(--color-border); padding: 1rem; text-align: left; font-size: 0.875rem;">
                        <div style="color: var(--color-text-muted); text-align: center;">No active alarms set</div>
                    </div>
                </div>

                <!-- Pane 4: Focus Sound (Web Audio Ambient Synthesizer) -->
                <div id="pane-ambient" class="timer-pane" style="width: 100%; max-width: 32rem; text-align: center; display: none;">
                    <h4 class="sidebar-section-title" style="margin-bottom: 0.5rem;">Sound Masking &amp; Focus Noise</h4>
                    <p style="font-size: 0.85rem; color: var(--color-text-muted); margin-bottom: 1.25rem;">Synthesized background audio frequencies to soothe ADHD restlessness and block background distractions.</p>

                    <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 0.75rem; margin-bottom: 1.5rem;">
                        <button type="button" class="template-btn ambient-btn active" data-sound="brown" style="padding: 0.75rem; text-align: center;">
                            <i class="fas fa-water" style="color: #f59e0b; display: block; font-size: 1.35rem; margin-bottom: 0.35rem;"></i>
                            <strong>Brown Noise</strong>
                            <span style="display: block; font-size: 0.75rem; opacity: 0.75;">Deep warm rumble (ADHD favorite)</span>
                        </button>
                        <button type="button" class="template-btn ambient-btn" data-sound="pink" style="padding: 0.75rem; text-align: center;">
                            <i class="fas fa-cloud-rain" style="color: #ec4899; display: block; font-size: 1.35rem; margin-bottom: 0.35rem;"></i>
                            <strong>Pink Noise</strong>
                            <span style="display: block; font-size: 0.75rem; opacity: 0.75;">Balanced gentle rainfall texture</span>
                        </button>
                        <button type="button" class="template-btn ambient-btn" data-sound="white" style="padding: 0.75rem; text-align: center;">
                            <i class="fas fa-wind" style="color: #38bdf8; display: block; font-size: 1.35rem; margin-bottom: 0.35rem;"></i>
                            <strong>White Noise</strong>
                            <span style="display: block; font-size: 0.75rem; opacity: 0.75;">Broadband static sound mask</span>
                        </button>
                        <button type="button" class="template-btn ambient-btn" data-sound="rain" style="padding: 0.75rem; text-align: center;">
                            <i class="fas fa-umbrella" style="color: #10b981; display: block; font-size: 1.35rem; margin-bottom: 0.35rem;"></i>
                            <strong>Gentle Rain</strong>
                            <span style="display: block; font-size: 0.75rem; opacity: 0.75;">Calming ambient drizzle</span>
                        </button>
                    </div>

                    <!-- Volume Slider -->
                    <div style="margin-bottom: 1.5rem; display: flex; align-items: center; justify-content: center; gap: 0.75rem;">
                        <i class="fas fa-volume-down" style="color: var(--color-text-muted);"></i>
                        <input type="range" id="ambient-volume" min="0" max="1" step="0.05" value="0.3" style="width: 12rem;">
                        <i class="fas fa-volume-up" style="color: var(--color-text-muted);"></i>
                    </div>

                    <!-- Play / Stop Button -->
                    <div style="display: flex; justify-content: center; gap: 1rem;">
                        <button type="button" id="ambient-toggle" class="scratchpad-download-btn" style="background-color: var(--color-primary); color: white; border-radius: var(--radius-md); padding: 0.75rem 2.5rem; font-weight: 700; min-width: 10rem; justify-content: center; border: none; cursor: pointer;">
                            <i class="fas fa-play" id="ambient-toggle-icon" style="margin-right: 0.5rem;"></i> <span id="ambient-toggle-text">Play Sound</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <div class="scratchpad-footer" style="justify-content: flex-end;">
            <button id="timer-close-footer" class="scratchpad-close-btn" style="background-color: var(--color-text-main); color: var(--color-bg-base); font-size: 0.875rem; padding: 0.75rem 2rem; width: auto; height: auto;">
                Close
            </button>
        </div>
    </div>
</div>
