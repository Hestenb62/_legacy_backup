/**
 * assets/js/global-study-tools.js
 * Global Study Companion Tools:
 * - Dynamic Year updater & Global Message Box & Confetti triggers
 * - Accessible Flyout Panel & Floating Action Button (FAB) toggles
 * - Pomodoro Study Timer (Work/Break cycles & Assessment mode)
 * - Precision Stopwatch with Lap recording
 * - Quick Alarms & Notification Chime Synthesizer
 * - Multi-Template Scratchpad Notes (Autosaving to localStorage)
 * - Academic Citation Generator (APA, MLA, Chicago, Harvard)
 * - Smooth Scroll-to-Top trigger
 * - PWA Service Worker Registration
 * - External Research Accessibility Warning Modal & Focus Trap
 */

// Global Message Box
window.showMessageBox = function(msg) {
    const b = document.getElementById("message-box");
    if (b) {
        const textEl = document.getElementById("message-text");
        if (textEl) textEl.textContent = msg;
        b.classList.remove("hidden");
        b.style.display = 'flex';
        const okBtn = document.getElementById("message-ok-button");
        if (okBtn) {
            okBtn.onclick = () => {
                b.classList.add("hidden");
                b.style.display = 'none';
            };
        }
    } else {
        console.log(msg); // Fallback
    }
};

// Global Confetti
window.triggerConfetti = function(origin) {
    if (typeof confetti === 'function') {
        confetti({ particleCount: 100, spread: 70, origin: origin || { y: 0.6 } });
    } else {
        const s = document.createElement('script');
        s.src = 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js';
        s.onload = () => confetti({ particleCount: 100, spread: 70, origin: origin || { y: 0.6 } });
        document.body.appendChild(s);
    }
};

// Accessibility Warning Modal for External Links
let lastActiveElement = null;

window.showA11yWarningModal = function(event, linkEl) {
    if (event && event.preventDefault) event.preventDefault();
    lastActiveElement = document.activeElement;

    const modal = document.getElementById("a11y-warning-modal");
    if (modal) {
        modal.style.display = "flex";
        modal.removeAttribute("aria-hidden");
        
        const cancelBtn = document.getElementById("a11y-modal-cancel");
        if (cancelBtn) cancelBtn.focus();
        
        document.addEventListener("keydown", handleA11yModalKeydown);
    }
    return false;
};

window.closeA11yWarningModal = function() {
    const modal = document.getElementById("a11y-warning-modal");
    if (modal) {
        modal.style.display = "none";
        modal.setAttribute("aria-hidden", "true");
        
        document.removeEventListener("keydown", handleA11yModalKeydown);
        
        if (lastActiveElement) lastActiveElement.focus();
    }
};

function handleA11yModalKeydown(e) {
    if (e.key === "Escape") {
        window.closeA11yWarningModal();
        return;
    }

    if (e.key === "Tab") {
        const modal = document.getElementById("a11y-warning-modal");
        if (!modal) return;
        const focusables = modal.querySelectorAll('button, a');
        if (!focusables || focusables.length === 0) return;
        const first = focusables[0];
        const last = focusables[focusables.length - 1];

        if (e.shiftKey) {
            if (document.activeElement === first) {
                last.focus();
                e.preventDefault();
            }
        } else {
            if (document.activeElement === last) {
                first.focus();
                e.preventDefault();
            }
        }
    }
}

// Alarms Helper exposed globally for inline onclick
let activeAlarms = [];
let alarmsInterval = null;

window.removeAlarm = function(index) {
    activeAlarms.splice(index, 1);
    if (typeof window._updateAlarmsList === 'function') {
        window._updateAlarmsList();
    }
};

// Main DOM Initializer
document.addEventListener('DOMContentLoaded', () => {
    // 1. Dynamic Footer Year
    const yearEl = document.getElementById("year");
    if (yearEl) yearEl.textContent = new Date().getFullYear();

    // 2. Initial Page Loader removal
    const loader = document.getElementById('initial-loader');
    if (loader) setTimeout(() => { loader.style.opacity = '0'; setTimeout(() => loader.remove(), 500); }, 300);

    // 3. Helper for Flyout Panel Toggles
    const setup = (tid, pid, cid) => {
        const t = document.getElementById(tid), p = document.getElementById(pid), c = document.getElementById(cid);
        if (!t || !p) return;
        const toggle = () => {
            const active = p.classList.toggle('active');
            if (window.announceA11y) {
                const label = pid.replace('-panel', '').replace('a11y-', 'accessibility ');
                window.announceA11y(active ? `${label} panel opened` : `${label} panel closed`);
            }
        };
        t.onclick = toggle;
        if (c) c.onclick = toggle;
    };

    setup('a11y-toggle-button', 'a11y-settings-panel', 'a11y-close-button');
    setup('timer-toggle', 'timer-panel', 'timer-close');
    setup('scratchpad-toggle', 'scratchpad-panel', 'scratchpad-close');
    setup('citation-toggle', 'citation-panel', 'citation-close');
    setup('recent-toggle', 'recent-pages-panel', 'recent-close');

    // 4. Floating Action Button (FAB) Toggle
    const fabMainToggle = document.getElementById('fab-main-toggle');
    const fabMenu = document.getElementById('fab-menu');
    const fabIcon = document.getElementById('fab-icon');
    if (fabMainToggle && fabMenu && fabIcon) {
        fabMainToggle.addEventListener('click', () => {
            const isExpanded = fabMainToggle.getAttribute('aria-expanded') === 'true';
            if (isExpanded) {
                fabMenu.classList.remove('active');
                fabIcon.classList.remove('active');
                fabMainToggle.setAttribute('aria-expanded', 'false');
            } else {
                fabMenu.classList.add('active');
                fabIcon.classList.add('active');
                fabMainToggle.setAttribute('aria-expanded', 'true');
            }
        });
    }

    // --- Study Companion (Timer, Stopwatch, Alarms) ---
    const timerBackdrop = document.getElementById('timer-backdrop-close');
    const timerCloseFooter = document.getElementById('timer-close-footer');

    // Tab Switching
    const tabSlider = document.getElementById('timer-tab-slider');
    const tabPomodoro = document.getElementById('tab-btn-pomodoro');
    const tabStopwatch = document.getElementById('tab-btn-stopwatch');
    const tabReminders = document.getElementById('tab-btn-reminders');
    const tabAmbient = document.getElementById('tab-btn-ambient');
    const panePomodoro = document.getElementById('pane-pomodoro');
    const paneStopwatch = document.getElementById('pane-stopwatch');
    const paneReminders = document.getElementById('pane-reminders');
    const paneAmbient = document.getElementById('pane-ambient');

    const switchTab = (tabName, index) => {
        if (tabSlider) {
            tabSlider.style.transform = `translateX(${index * 7}rem)`;
        }
        [tabPomodoro, tabStopwatch, tabReminders, tabAmbient].forEach((btn, idx) => {
            if (btn) btn.classList.toggle('active', idx === index);
        });
        if (panePomodoro) panePomodoro.style.display = tabName === 'pomodoro' ? 'block' : 'none';
        if (paneStopwatch) paneStopwatch.style.display = tabName === 'stopwatch' ? 'block' : 'none';
        if (paneReminders) paneReminders.style.display = tabName === 'reminders' ? 'block' : 'none';
        if (paneAmbient) paneAmbient.style.display = tabName === 'ambient' ? 'block' : 'none';
    };

    if (tabPomodoro) tabPomodoro.onclick = () => switchTab('pomodoro', 0);
    if (tabStopwatch) tabStopwatch.onclick = () => switchTab('stopwatch', 1);
    if (tabReminders) tabReminders.onclick = () => switchTab('reminders', 2);
    if (tabAmbient) tabAmbient.onclick = () => switchTab('ambient', 3);

    // Synthesized Sound Player (No external MP3 required)
    function playChime() {
        try {
            const AudioCtx = window.AudioContext || window.webkitAudioContext;
            if (!AudioCtx) return;
            const ctx = new AudioCtx();
            const osc = ctx.createOscillator();
            const gain = ctx.createGain();
            osc.connect(gain);
            gain.connect(ctx.destination);
            osc.type = 'sine';
            osc.frequency.setValueAtTime(587.33, ctx.currentTime);
            osc.frequency.setValueAtTime(880, ctx.currentTime + 0.15);
            gain.gain.setValueAtTime(0.5, ctx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.01, ctx.currentTime + 0.6);
            osc.start();
            osc.stop(ctx.currentTime + 0.6);
        } catch(e){}
    }

    // Pomodoro & Flowmodoro Study Timer Logic
    let pomodoroInterval = null;
    let studyTimeTotal = 1500; 
    let breakTimeTotal = 300;
    let pomodoroTimeLeft = studyTimeTotal;
    let isPomodoroRunning = false;
    let pomodoroCurrentMode = 'study'; // 'study' or 'break'
    let timerStyle = 'countdown'; // 'countdown' or 'flowmodoro'
    let flowmodoroSeconds = 0;

    const pomodoroDisplay = document.getElementById('pomodoro-display');
    const pomodoroState = document.getElementById('pomodoro-state');
    const pomodoroStartBtn = document.getElementById('pomodoro-start');
    const pomodoroResetBtn = document.getElementById('pomodoro-reset');
    const assessmentCheckbox = document.getElementById('timer-assessment-mode');
    const modeCountdownBtn = document.getElementById('timer-mode-countdown');
    const modeFlowmodoroBtn = document.getElementById('timer-mode-flowmodoro');
    const pomodoroPresets = document.getElementById('pomodoro-presets');
    const flowmodoroBreakCard = document.getElementById('flowmodoro-break-card');
    const flowmodoroEarnedBreak = document.getElementById('flowmodoro-earned-break');

    if (assessmentCheckbox) {
        if (window.location.pathname.includes('/assessment/') || document.getElementById('quiz-container')) {
            assessmentCheckbox.checked = true;
        }
    }

    const updatePomodoroDisplay = () => {
        if (!pomodoroDisplay) return;
        const total = timerStyle === 'flowmodoro' ? flowmodoroSeconds : pomodoroTimeLeft;
        const m = Math.floor(total / 60);
        const s = total % 60;
        pomodoroDisplay.textContent = `${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}`;
        
        if (timerStyle === 'flowmodoro' && flowmodoroEarnedBreak) {
            const earnedMins = Math.max(1, Math.round(flowmodoroSeconds / 300));
            flowmodoroEarnedBreak.textContent = `${earnedMins} mins`;
        }
    };

    if (modeCountdownBtn && modeFlowmodoroBtn) {
        modeCountdownBtn.onclick = () => {
            timerStyle = 'countdown';
            modeCountdownBtn.classList.add('active');
            modeFlowmodoroBtn.classList.remove('active');
            if (pomodoroPresets) pomodoroPresets.style.display = 'flex';
            if (flowmodoroBreakCard) flowmodoroBreakCard.style.display = 'none';
            resetPomodoro();
        };
        modeFlowmodoroBtn.onclick = () => {
            timerStyle = 'flowmodoro';
            modeFlowmodoroBtn.classList.add('active');
            modeCountdownBtn.classList.remove('active');
            if (pomodoroPresets) pomodoroPresets.style.display = 'none';
            if (flowmodoroBreakCard) flowmodoroBreakCard.style.display = 'block';
            resetPomodoro();
        };
    }

    const togglePomodoro = () => {
        if (isPomodoroRunning) {
            clearInterval(pomodoroInterval);
            isPomodoroRunning = false;
            if (pomodoroStartBtn) pomodoroStartBtn.textContent = 'Start';
        } else {
            isPomodoroRunning = true;
            if (pomodoroStartBtn) pomodoroStartBtn.textContent = 'Pause';
            pomodoroInterval = setInterval(() => {
                if (timerStyle === 'flowmodoro') {
                    flowmodoroSeconds++;
                    updatePomodoroDisplay();
                } else {
                    pomodoroTimeLeft--;
                    updatePomodoroDisplay();

                    if (pomodoroTimeLeft <= 0) {
                        clearInterval(pomodoroInterval);
                        isPomodoroRunning = false;
                        if (pomodoroStartBtn) pomodoroStartBtn.textContent = 'Start';
                        playChime();

                        if (pomodoroCurrentMode === 'study') {
                            const isTest = assessmentCheckbox && assessmentCheckbox.checked;
                            if (isTest) {
                                window.showMessageBox("Study session completed! Great job focusing during your assessment.");
                                resetPomodoro();
                            } else {
                                window.showMessageBox("Time for a break! Take a few minutes to stretch.");
                                pomodoroCurrentMode = 'break';
                                pomodoroTimeLeft = breakTimeTotal;
                                if (pomodoroState) pomodoroState.textContent = 'Break Session';
                                if (pomodoroState) pomodoroState.style.color = 'var(--color-success)';
                                togglePomodoro(); 
                            }
                        } else {
                            window.showMessageBox("Break ended! Ready to start studying again?");
                            pomodoroCurrentMode = 'study';
                            pomodoroTimeLeft = studyTimeTotal;
                            if (pomodoroState) pomodoroState.textContent = 'Study Session';
                            if (pomodoroState) pomodoroState.style.color = 'var(--color-primary)';
                            updatePomodoroDisplay();
                        }
                    }
                }
            }, 1000);
        }
    };

    const resetPomodoro = () => {
        clearInterval(pomodoroInterval);
        isPomodoroRunning = false;
        pomodoroCurrentMode = 'study';
        pomodoroTimeLeft = studyTimeTotal;
        flowmodoroSeconds = 0;
        if (pomodoroStartBtn) pomodoroStartBtn.textContent = 'Start';
        if (pomodoroState) pomodoroState.textContent = timerStyle === 'flowmodoro' ? 'Flow Session' : 'Study Session';
        if (pomodoroState) pomodoroState.style.color = 'var(--color-primary)';
        updatePomodoroDisplay();
    };

    if (pomodoroStartBtn) pomodoroStartBtn.onclick = togglePomodoro;
    if (pomodoroResetBtn) pomodoroResetBtn.onclick = resetPomodoro;

    document.querySelectorAll('.timer-preset-btn').forEach(btn => {
        btn.onclick = () => {
            document.querySelectorAll('.timer-preset-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            studyTimeTotal = parseInt(btn.getAttribute('data-time'), 10) || 1500;
            breakTimeTotal = parseInt(btn.getAttribute('data-break'), 10) || 300;
            resetPomodoro();
        };
    });

    // --- Ambient Noise Synthesizer (Web Audio API) ---
    let ambientAudioCtx = null;
    let ambientSourceNode = null;
    let ambientGainNode = null;
    let currentAmbientSound = 'brown';
    let isAmbientPlaying = false;

    function createNoiseBuffer(ctx, type) {
        const bufferSize = ctx.sampleRate * 2;
        const buffer = ctx.createBuffer(1, bufferSize, ctx.sampleRate);
        const data = buffer.getChannelData(0);

        if (type === 'white') {
            for (let i = 0; i < bufferSize; i++) {
                data[i] = Math.random() * 2 - 1;
            }
        } else if (type === 'pink') {
            let b0 = 0, b1 = 0, b2 = 0, b3 = 0, b4 = 0, b5 = 0, b6 = 0;
            for (let i = 0; i < bufferSize; i++) {
                const white = Math.random() * 2 - 1;
                b0 = 0.99886 * b0 + white * 0.0555179;
                b1 = 0.99332 * b1 + white * 0.0750759;
                b2 = 0.96900 * b2 + white * 0.1538520;
                b3 = 0.86650 * b3 + white * 0.3104856;
                b4 = 0.55000 * b4 + white * 0.5329522;
                b5 = -0.7616 * b5 - white * 0.0168980;
                data[i] = (b0 + b1 + b2 + b3 + b4 + b5 + b6 + white * 0.5362) * 0.11;
                b6 = white * 0.115926;
            }
        } else if (type === 'brown' || type === 'rain') {
            let lastOut = 0.0;
            for (let i = 0; i < bufferSize; i++) {
                const white = Math.random() * 2 - 1;
                data[i] = (lastOut + (0.02 * white)) / 1.02;
                lastOut = data[i];
                data[i] *= 3.5;
                if (type === 'rain' && Math.random() < 0.002) {
                    data[i] += (Math.random() * 0.4 - 0.2);
                }
            }
        }
        return buffer;
    }

    function startAmbientSound(type) {
        stopAmbientSound();
        try {
            const AudioCtx = window.AudioContext || window.webkitAudioContext;
            if (!AudioCtx) return;
            if (!ambientAudioCtx) ambientAudioCtx = new AudioCtx();
            if (ambientAudioCtx.state === 'suspended') ambientAudioCtx.resume();

            const buffer = createNoiseBuffer(ambientAudioCtx, type);
            ambientSourceNode = ambientAudioCtx.createBufferSource();
            ambientSourceNode.buffer = buffer;
            ambientSourceNode.loop = true;

            ambientGainNode = ambientAudioCtx.createGain();
            const volSlider = document.getElementById('ambient-volume');
            const vol = volSlider ? parseFloat(volSlider.value) : 0.3;
            ambientGainNode.gain.setValueAtTime(vol * 0.5, ambientAudioCtx.currentTime);

            ambientSourceNode.connect(ambientGainNode);
            ambientGainNode.connect(ambientAudioCtx.destination);
            ambientSourceNode.start(0);
            isAmbientPlaying = true;
            updateAmbientUI(true);
        } catch (e) {
            console.warn('Ambient noise error:', e);
        }
    }

    function stopAmbientSound() {
        if (ambientSourceNode) {
            try {
                ambientSourceNode.stop();
                ambientSourceNode.disconnect();
            } catch (e) {}
            ambientSourceNode = null;
        }
        isAmbientPlaying = false;
        updateAmbientUI(false);
    }

    function updateAmbientUI(playing) {
        const btn = document.getElementById('ambient-toggle');
        const icon = document.getElementById('ambient-toggle-icon');
        const text = document.getElementById('ambient-toggle-text');
        if (!btn || !icon || !text) return;
        if (playing) {
            btn.style.backgroundColor = 'var(--color-danger, #ef4444)';
            icon.className = 'fas fa-stop';
            text.textContent = 'Stop Sound';
            if (window.announceA11y) window.announceA11y(`Ambient sound playing: ${currentAmbientSound} noise`);
        } else {
            btn.style.backgroundColor = 'var(--color-primary)';
            icon.className = 'fas fa-play';
            text.textContent = 'Play Sound';
            if (window.announceA11y) window.announceA11y('Ambient sound stopped');
        }
    }

    const ambientToggleBtn = document.getElementById('ambient-toggle');
    if (ambientToggleBtn) {
        ambientToggleBtn.onclick = () => {
            if (isAmbientPlaying) {
                stopAmbientSound();
            } else {
                startAmbientSound(currentAmbientSound);
            }
        };
    }

    document.querySelectorAll('.ambient-btn').forEach(btn => {
        btn.onclick = () => {
            document.querySelectorAll('.ambient-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            currentAmbientSound = btn.getAttribute('data-sound') || 'brown';
            if (isAmbientPlaying) {
                startAmbientSound(currentAmbientSound);
            }
        };
    });

    const ambientVolSlider = document.getElementById('ambient-volume');
    if (ambientVolSlider) {
        ambientVolSlider.oninput = () => {
            if (ambientGainNode && ambientAudioCtx) {
                ambientGainNode.gain.setValueAtTime(parseFloat(ambientVolSlider.value) * 0.5, ambientAudioCtx.currentTime);
            }
        };
    }

    // Stopwatch Logic
    let stopwatchInterval = null;
    let stopwatchTime = 0; 
    let isStopwatchRunning = false;
    let lapCount = 0;

    const stopwatchDisplay = document.getElementById('stopwatch-display');
    const stopwatchStartBtn = document.getElementById('stopwatch-start');
    const stopwatchLapBtn = document.getElementById('stopwatch-lap');
    const stopwatchResetBtn = document.getElementById('stopwatch-reset');
    const lapsList = document.getElementById('stopwatch-laps');

    const updateStopwatchDisplay = () => {
        if (stopwatchDisplay) {
            const totalSec = Math.floor(stopwatchTime / 100);
            const ms = stopwatchTime % 100;
            const m = Math.floor(totalSec / 60);
            const s = totalSec % 60;
            stopwatchDisplay.textContent = `${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}.${ms.toString().padStart(2, '0')}`;
        }
    };

    const toggleStopwatch = () => {
        if (isStopwatchRunning) {
            clearInterval(stopwatchInterval);
            isStopwatchRunning = false;
            if (stopwatchStartBtn) stopwatchStartBtn.textContent = 'Start';
        } else {
            isStopwatchRunning = true;
            if (stopwatchStartBtn) stopwatchStartBtn.textContent = 'Pause';
            stopwatchInterval = setInterval(() => {
                stopwatchTime++;
                updateStopwatchDisplay();
            }, 10);
        }
    };

    const resetStopwatch = () => {
        clearInterval(stopwatchInterval);
        isStopwatchRunning = false;
        stopwatchTime = 0;
        lapCount = 0;
        if (stopwatchStartBtn) stopwatchStartBtn.textContent = 'Start';
        if (lapsList) lapsList.innerHTML = '<div style="color: var(--color-text-muted); text-align: center; padding: 0.5rem 0;">No laps recorded</div>';
        updateStopwatchDisplay();
    };

    const recordLap = () => {
        if (!isStopwatchRunning) return;
        lapCount++;
        if (lapsList) {
            if (lapCount === 1) lapsList.innerHTML = ''; 
            const lapEl = document.createElement('div');
            lapEl.style.display = 'flex';
            lapEl.style.justifyContent = 'space-between';
            lapEl.style.padding = '0.35rem 0';
            lapEl.style.borderBottom = '1px solid var(--color-border)';
            
            const totalSec = Math.floor(stopwatchTime / 100);
            const ms = stopwatchTime % 100;
            const m = Math.floor(totalSec / 60);
            const s = totalSec % 60;
            const timeStr = `${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}.${ms.toString().padStart(2, '0')}`;

            lapEl.innerHTML = `<strong>Lap ${lapCount}</strong> <span>${timeStr}</span>`;
            lapsList.insertBefore(lapEl, lapsList.firstChild);
        }
    };

    if (stopwatchStartBtn) stopwatchStartBtn.onclick = toggleStopwatch;
    if (stopwatchResetBtn) stopwatchResetBtn.onclick = resetStopwatch;
    if (stopwatchLapBtn) stopwatchLapBtn.onclick = recordLap;

    // Quick Alarms Logic
    const alarmMinsInput = document.getElementById('alarm-custom-mins');
    const alarmCustomSetBtn = document.getElementById('alarm-custom-set');
    const activeAlarmsList = document.getElementById('active-alarms-list');

    window._updateAlarmsList = () => {
        if (!activeAlarmsList) return;
        if (activeAlarms.length === 0) {
            activeAlarmsList.innerHTML = '<div style="color: var(--color-text-muted); text-align: center;">No active alarms set</div>';
            clearInterval(alarmsInterval);
            alarmsInterval = null;
            return;
        }

        activeAlarmsList.innerHTML = '';
        activeAlarms.forEach((alarm, index) => {
            const item = document.createElement('div');
            item.style.display = 'flex';
            item.style.justifyContent = 'space-between';
            item.style.alignItems = 'center';
            item.style.padding = '0.5rem 0';
            item.style.borderBottom = '1px solid var(--color-border)';

            const m = Math.floor(alarm.timeLeft / 60);
            const s = alarm.timeLeft % 60;
            const remStr = `${m}m ${s.toString().padStart(2, '0')}s left`;

            item.innerHTML = `<div><strong>Alarm (${Math.round(alarm.duration/60)}m)</strong> - <span style="color: var(--color-secondary); font-weight: 700;">${remStr}</span></div>
                              <button class="scratchpad-clear-btn" style="color: var(--color-error); padding: 0.25rem 0.5rem;" onclick="removeAlarm(${index})"><i class="fas fa-trash-alt"></i></button>`;
            activeAlarmsList.appendChild(item);
        });
    };

    const addAlarm = (seconds) => {
        activeAlarms.push({
            duration: seconds,
            timeLeft: seconds
        });
        window._updateAlarmsList();

        if (!alarmsInterval) {
            alarmsInterval = setInterval(() => {
                activeAlarms.forEach((alarm, index) => {
                    alarm.timeLeft--;
                    if (alarm.timeLeft <= 0) {
                        playChime();
                        window.showMessageBox(`Reminder! Your ${Math.round(alarm.duration/60)} minute timer has finished.`);
                        activeAlarms.splice(index, 1);
                    }
                });
                window._updateAlarmsList();
            }, 1000);
        }
    };

    document.querySelectorAll('.alarm-preset-btn').forEach(btn => {
        btn.onclick = () => {
            const sec = parseInt(btn.getAttribute('data-alarm'), 10);
            if (sec > 0) addAlarm(sec);
        };
    });

    if (alarmCustomSetBtn && alarmMinsInput) {
        alarmCustomSetBtn.onclick = () => {
            const mins = parseInt(alarmMinsInput.value, 10);
            if (mins > 0) {
                addAlarm(mins * 60);
                alarmMinsInput.value = '';
            }
        };
    }

    // Close Timer Panel
    const closeTimerPanel = () => {
        const panel = document.getElementById('timer-panel');
        if (panel) panel.classList.remove('active');
    };
    if (timerBackdrop) timerBackdrop.onclick = closeTimerPanel;
    if (timerCloseFooter) timerCloseFooter.onclick = closeTimerPanel;

    // Notes (Scratchpad with Educational Templates)
    const n = document.getElementById('quick-notes-area');
    const scratchpadStatus = document.getElementById('scratchpad-status');
    const clearNotesBtn = document.getElementById('clear-notes-btn');
    const scratchpadBackdrop = document.getElementById('scratchpad-backdrop-close');
    
    const templates = {
        blank: "",
        cornell: `Date: ${new Date().toLocaleDateString()}\n\n============================================================\n1. QUESTIONS & KEYWORDS (Left column keywords)\n------------------------------------------------------------\n- \n- \n\n============================================================\n2. NOTES & DETAILED IDEAS (Main column notes)\n------------------------------------------------------------\n- \n- \n\n============================================================\n3. SUMMARY (A brief 3-4 sentence wrap-up)\n------------------------------------------------------------\n- `,
        kwl: `Topic: \n\n============================================================\n[K] WHAT I KNOW\n------------------------------------------------------------\n- \n\n============================================================\n[W] WHAT I WANT TO KNOW\n------------------------------------------------------------\n- \n\n============================================================\n[L] WHAT I LEARNED (Fill this out after studying)\n------------------------------------------------------------\n- `,
        "study-guide": `Subject: \nExam Date: \n\n============================================================\n1. CORE CONCEPTS TO MASTER\n------------------------------------------------------------\n[ ] \n[ ] \n\n============================================================\n2. KEY DEFINITIONS & FORMULAS\n------------------------------------------------------------\n* \n* \n\n============================================================\n3. PRACTICE QUESTIONS\n------------------------------------------------------------\nQ1. \nA1. `,
        lecture: `Course: \nLecture Title: \nDate: ${new Date().toLocaleDateString()}\n\n============================================================\n1. LECTURE TOPICS & DISCUSSION POINTS\n------------------------------------------------------------\n* \n* \n\n============================================================\n2. IMPORTANT TAKEAWAYS & FORMULAS\n------------------------------------------------------------\n* \n\n============================================================\n3. ACTION ITEMS & ASSIGNED READING\n------------------------------------------------------------\n[ ] `,
        mla: `[Your Name]\n[Instructor's Name]\n[Course Title]\n[Date: ${new Date().toLocaleDateString()}]\n\n                      [Title of the Essay]\n\n    [Start typing your MLA formatted essay here. Use 1-inch margins and double-spacing. The first line of each paragraph should be indented 0.5 inches.]\n\n\n                          Works Cited\n\n[Author Last Name, First Name. "Title of Source." Title of Container, Other contributors, Version, Number, Publisher, Publication date, Location.]`,
        apa: `                               Running Head: [SHORT TITLE IN CAPS]\n\n[Title of the Essay]\n[Your Name]\n[Institutional Affiliation]\n\n\n                             Abstract\n[Write a brief summary of your essay here, typically between 150 and 250 words. Do not indent the first line of the abstract paragraph.]\n\n\n                       [Title of the Essay]\n    [Start typing your APA formatted essay here. The first line of each paragraph should be indented 0.5 inches.]\n\n\n                            References\n\n[Author, A. A., & Author, B. B. (Year). Title of the work. Publisher. DOI or URL]`,
        chicago: `                      [Title of the Essay]\n\n                            [Your Name]\n                           [Course Title]\n                         [Instructor Name]\n                      [Date: ${new Date().toLocaleDateString()}]\n\n\n    [Start typing your Chicago style essay here. Double space the main text. Footnotes should be single-spaced with a blank line between notes.]\n\n\n                          Bibliography\n\n[Author Last Name, First Name. Title of Book. Place of publication: Publisher, Year of publication.]`,
        harvard: `Title: [Title of the Essay]\nAuthor: [Your Name]\nCourse: [Course Title]\nDate: ${new Date().toLocaleDateString()}\n\n    [Start typing your essay here. Paragraphs should be double-spaced with standard indentations.]\n\n\n                           Reference List\n\n[Author Last Name, Initials. (Year of publication) Title of book. Place of publication: Publisher.]`
    };

    if (n) {
        // Load saved content
        try { n.value = localStorage.getItem('hl_scratchpad') || ''; } catch(e){}

        // Autosave with status indicator
        let saveTimeout;
        n.addEventListener('input', () => {
            if (scratchpadStatus) {
                scratchpadStatus.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
                scratchpadStatus.style.color = 'var(--color-primary)';
            }
            clearTimeout(saveTimeout);
            saveTimeout = setTimeout(() => {
                try {
                    localStorage.setItem('hl_scratchpad', n.value);
                    if (scratchpadStatus) {
                        scratchpadStatus.innerHTML = '<i class="fas fa-check-circle"></i> Saved locally';
                        scratchpadStatus.style.color = 'var(--color-success)';
                    }
                } catch(e){}
            }, 500);
        });

        // Download Notes
        const dlBtn = document.getElementById('download-notes');
        if (dlBtn) {
            dlBtn.onclick = () => {
                const a = document.createElement('a'); 
                a.href = URL.createObjectURL(new Blob([n.value], {type:'text/plain'})); 
                a.download = 'study_notes.txt'; 
                a.click();
            };
        }

        // Clear Notes
        if (clearNotesBtn) {
            clearNotesBtn.onclick = () => {
                if (n.value.trim() === "" || confirm("Are you sure you want to clear all your notes? This cannot be undone.")) {
                    n.value = "";
                    try { localStorage.setItem('hl_scratchpad', ''); } catch(e){}
                    if (scratchpadStatus) {
                        scratchpadStatus.innerHTML = '<i class="fas fa-trash-alt"></i> Notes cleared';
                        scratchpadStatus.style.color = 'var(--color-text-muted)';
                    }
                }
            };
        }

        // Backdrop Close
        if (scratchpadBackdrop) {
            scratchpadBackdrop.onclick = () => {
                const panel = document.getElementById('scratchpad-panel');
                if (panel) panel.classList.remove('active');
            };
        }

        // Templates Selector Action
        document.querySelectorAll('.scratchpad-templates-list .template-btn').forEach(btn => {
            btn.onclick = () => {
                const templateKey = btn.getAttribute('data-template');
                if (templates[templateKey] !== undefined) {
                    const confirmLoad = n.value.trim() === "" || 
                                       confirm("Loading a template will replace your current notes. Do you want to proceed?");
                    if (confirmLoad) {
                        document.querySelectorAll('.scratchpad-templates-list .template-btn').forEach(b => b.classList.remove('active'));
                        btn.classList.add('active');

                        n.value = templates[templateKey];
                        try { localStorage.setItem('hl_scratchpad', n.value); } catch(e){}
                        if (scratchpadStatus) {
                            scratchpadStatus.innerHTML = '<i class="fas fa-check-circle"></i> Saved locally';
                            scratchpadStatus.style.color = 'var(--color-success)';
                        }
                    }
                }
            };
        });
    }

    // Academic Citation Generator (Dynamic Page Metadata Extraction)
    const cb = document.getElementById('cite-gen');
    const citationBackdrop = document.getElementById('citation-backdrop-close');
    const citationCloseFooter = document.getElementById('citation-close-footer');
    const citationToggleBtn = document.getElementById('citation-toggle');

    window.populateAndGenerateCitations = function() {
        const titleInput = document.getElementById('cite-title');
        const authorInput = document.getElementById('cite-author');
        const publisherInput = document.getElementById('cite-publisher');
        const yearInput = document.getElementById('cite-year');

        // 1. Detect Page / Article Title
        let detectedTitle = "";
        if (window.CURRENT_PAPER_METADATA && window.CURRENT_PAPER_METADATA.title) {
            detectedTitle = window.CURRENT_PAPER_METADATA.title;
        } else if (window.BOOK_METADATA && window.BOOK_METADATA.title) {
            detectedTitle = window.BOOK_METADATA.title;
            if (window.BOOK_METADATA.chapterTitle) {
                detectedTitle += `: ${window.BOOK_METADATA.chapterTitle}`;
            } else if (window.BOOK_METADATA.chapterNum) {
                detectedTitle += ` (Chapter ${window.BOOK_METADATA.chapterNum})`;
            }
        } else {
            const modalTitle = document.getElementById('modalTitle');
            if (modalTitle && modalTitle.textContent.trim() && modalTitle.textContent.trim() !== 'Loading Paper...') {
                detectedTitle = modalTitle.textContent.trim();
            } else {
                const ogTitle = document.querySelector('meta[property="og:title"]')?.getAttribute('content');
                const mainH1 = document.querySelector('h1')?.innerText?.trim();
                const docTitleClean = document.title
                    .replace(/\s*\|\s*Hesten's Learning.*$/i, '')
                    .replace(/\s*-\s*Hesten's Learning.*$/i, '')
                    .trim();
                detectedTitle = ogTitle || mainH1 || docTitleClean || "Educational Resource";
            }
        }

        // 2. Detect Author
        let detectedAuthor = "";
        if (window.CURRENT_PAPER_METADATA && window.CURRENT_PAPER_METADATA.author) {
            detectedAuthor = window.CURRENT_PAPER_METADATA.author;
        } else if (window.BOOK_METADATA && window.BOOK_METADATA.author) {
            detectedAuthor = window.BOOK_METADATA.author;
        } else {
            const modalAuthor = document.getElementById('modalAuthor');
            if (modalAuthor && modalAuthor.textContent.trim()) {
                detectedAuthor = modalAuthor.textContent.trim();
            } else {
                const metaAuthor = document.querySelector('meta[name="author"]')?.getAttribute('content');
                detectedAuthor = metaAuthor || "Hesten Allison";
            }
        }

        // 3. Detect Section & Publisher
        let detectedPublisher = "Hesten's Learning Platform";
        if (window.CURRENT_PAPER_METADATA && window.CURRENT_PAPER_METADATA.publisher) {
            detectedPublisher = window.CURRENT_PAPER_METADATA.publisher;
        } else {
            const path = window.location.pathname;
            if (path.includes('/research/DLDR/')) {
                detectedPublisher = "Dyslexia & Learning Disabilities Research Journal (DLDR)";
            } else if (path.includes('/research/DSMS/')) {
                detectedPublisher = "STEM & Mathematics Specialization Journal (DSMS)";
            } else if (path.includes('/library/read/')) {
                detectedPublisher = "Hesten's Learning Digital Reader";
            } else if (path.includes('/library/')) {
                detectedPublisher = "Hesten's Learning Digital Library";
            } else if (path.includes('/assessment/')) {
                detectedPublisher = "Hesten's Learning Diagnostic Assessment Hub";
            } else if (path.includes('/student/')) {
                detectedPublisher = "Hesten's Learning Student Resource Wiki";
            } else if (path.includes('/pages/standards.php')) {
                detectedPublisher = "Hesten's Learning Curriculum & Standards Outlines";
            }
        }

        // 4. Detect Year
        let detectedYear = new Date().getFullYear().toString();
        if (window.CURRENT_PAPER_METADATA && window.CURRENT_PAPER_METADATA.date) {
            const match = window.CURRENT_PAPER_METADATA.date.match(/\b(20\d{2}|19\d{2})\b/);
            if (match) detectedYear = match[0];
        } else {
            const modalDate = document.getElementById('modalDate');
            if (modalDate && modalDate.textContent) {
                const match = modalDate.textContent.match(/\b(20\d{2}|19\d{2})\b/);
                if (match) detectedYear = match[0];
            } else {
                const metaDate = document.querySelector('meta[name="date"]')?.getAttribute('content');
                if (metaDate) {
                    const match = metaDate.match(/\b(20\d{2}|19\d{2})\b/);
                    if (match) detectedYear = match[0];
                }
            }
        }

        // Populate inputs if currently blank or matching defaults
        if (titleInput) titleInput.value = detectedTitle;
        if (authorInput) authorInput.value = detectedAuthor;
        if (publisherInput) publisherInput.value = detectedPublisher;
        if (yearInput) yearInput.value = detectedYear;

        // Immediately render citations
        const finalTitle = (titleInput && titleInput.value) || detectedTitle;
        const finalAuthor = (authorInput && authorInput.value) || detectedAuthor;
        const finalPublisher = (publisherInput && publisherInput.value) || detectedPublisher;
        const finalYear = (yearInput && yearInput.value) || detectedYear;
        const url = window.location.href.split('#')[0];
        const date = new Date();
        const dateString = date.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });

        const apa = `${finalAuthor}. (${finalYear}). *${finalTitle}*. ${finalPublisher}. Retrieved ${dateString}, from ${url}`;
        const mla = `"${finalTitle}." *${finalPublisher}*, ${finalAuthor}, ${finalYear}, ${url}. Accessed ${dateString}.`;
        const chicago = `"${finalTitle}." ${finalPublisher}. ${finalYear}. Accessed ${dateString}. ${url}.`;
        const harvard = `${finalAuthor}, ${finalYear}. *${finalTitle}*. Available at: &lt;${url}&gt; [Accessed ${dateString}].`;

        const elApa = document.getElementById('cite-apa-text');
        const elMla = document.getElementById('cite-mla-text');
        const elChi = document.getElementById('cite-chicago-text');
        const elHar = document.getElementById('cite-harvard-text');

        if (elApa) elApa.innerHTML = apa;
        if (elMla) elMla.innerHTML = mla;
        if (elChi) elChi.innerHTML = chicago;
        if (elHar) elHar.innerHTML = harvard;
    };

    if (cb) {
        cb.onclick = () => window.populateAndGenerateCitations();

        // Auto populate whenever panel toggle is clicked
        if (citationToggleBtn) {
            citationToggleBtn.addEventListener('click', () => {
                setTimeout(() => window.populateAndGenerateCitations(), 50);
            });
        }

        // Copy Citation Action
        document.querySelectorAll('.copy-cite-btn').forEach(btn => {
            btn.onclick = () => {
                const targetId = btn.getAttribute('data-target');
                const textBox = document.getElementById(targetId);
                if (textBox) {
                    navigator.clipboard.writeText(textBox.textContent).then(() => {
                        const origText = btn.innerHTML;
                        btn.innerHTML = '<i class="fas fa-check"></i> Copied!';
                        btn.style.color = 'var(--color-success)';
                        setTimeout(() => {
                            btn.innerHTML = origText;
                            btn.style.color = '';
                        }, 1500);
                    });
                }
            };
        });

        const closePanel = () => {
            const panel = document.getElementById('citation-panel');
            if (panel) panel.classList.remove('active');
        };
        if (citationBackdrop) citationBackdrop.onclick = closePanel;
        if (citationCloseFooter) citationCloseFooter.onclick = closePanel;
    }

    // Scroll to Top Button
    const sb = document.getElementById('scroll-to-top');
    if (sb) {
        window.addEventListener('scroll', () => sb.classList.toggle('visible', window.scrollY >= 300));
        sb.onclick = () => window.scrollTo({top:0, behavior:'smooth'});
    }

    // PWA Service Worker Registration
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/service-worker.js')
                .then(reg => console.log('[PWA] Service Worker Registered', reg))
                .catch(err => console.error('[PWA] Service Worker Registration Failed', err));
        });
    }

    // Sync Accessibility Settings if available
    if (typeof window.syncPanelInputs === 'function') {
        const s = window.loadSettings ? window.loadSettings() : (window.currentSettings || {});
        window.syncPanelInputs(s);
    }
});
