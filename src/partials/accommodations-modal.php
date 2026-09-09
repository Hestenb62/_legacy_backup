<!-- Universal IEP/504 Accommodations & Focus Modal (Alt+O) -->
<div id="accommodations-modal" class="accommodations-modal-backdrop hidden" role="dialog" aria-modal="true" aria-labelledby="acc-modal-title">
    <div class="accommodations-modal-panel">
        <!-- Modal Header -->
        <div class="acc-modal-header">
            <div class="acc-header-title-wrap">
                <div class="acc-header-icon">
                    <i class="fas fa-universal-access" aria-hidden="true"></i>
                </div>
                <div class="acc-header-text">
                    <h2 id="acc-modal-title">
                        <span>Personalized Accommodations & Focus</span>
                        <span style="font-size: 0.75rem; font-weight: 800; padding: 0.2rem 0.5rem; border-radius: var(--radius-sm); background: color-mix(in srgb, var(--color-primary) 15%, transparent); color: var(--color-primary);">IEP / 504 Tools</span>
                    </h2>
                    <p>Tailor your visual reading flow, sensory environment, and cognitive focus tools.</p>
                </div>
            </div>
            <button type="button" class="acc-close-btn" id="acc-modal-close" onclick="window.toggleAccommodationsStudio()" aria-label="Close accommodations modal">
                <i class="fas fa-times" aria-hidden="true"></i>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="acc-modal-body">
            <!-- 1-Click Quick Accommodation Presets -->
            <div>
                <span class="acc-group-title"><i class="fas fa-magic"></i> Quick Accommodation Presets</span>
                <div class="acc-presets-grid" style="margin-top: 0.5rem;">
                    <button type="button" class="acc-preset-card" onclick="window.accommodationEngine.setPreset('dyslexia')">
                        <i class="fas fa-book-reader"></i>
                        <span class="acc-preset-name">Dyslexia Support</span>
                        <span class="acc-preset-desc">Bionic fixations, peach tint & reading ruler</span>
                    </button>
                    <button type="button" class="acc-preset-card" onclick="window.accommodationEngine.setPreset('adhd')">
                        <i class="fas fa-bolt"></i>
                        <span class="acc-preset-name">ADHD Focus</span>
                        <span class="acc-preset-desc">Reading ruler, dark shade & pink soundscape</span>
                    </button>
                    <button type="button" class="acc-preset-card" onclick="window.accommodationEngine.setPreset('dyscalculia')">
                        <i class="fas fa-calculator"></i>
                        <span class="acc-preset-name">Dyscalculia Math</span>
                        <span class="acc-preset-desc">Math operator colorizer & mint tint</span>
                    </button>
                    <button type="button" class="acc-preset-card" onclick="window.accommodationEngine.setPreset('reset')">
                        <i class="fas fa-undo"></i>
                        <span class="acc-preset-name">Default Settings</span>
                        <span class="acc-preset-desc">Reset all accommodation features</span>
                    </button>
                </div>
            </div>

            <!-- Reading & Visual Flow Tools -->
            <div class="acc-feature-group">
                <span class="acc-group-title"><i class="fas fa-glasses"></i> Visual Reading Flow</span>

                <!-- Reading Ruler -->
                <div class="acc-feature-row">
                    <div class="acc-feature-info">
                        <h4><i class="fas fa-ruler-horizontal" style="color: #3b82f6;"></i> Guided Reading Ruler <kbd style="font-size: 0.7rem; padding: 0.15rem 0.35rem; background: var(--color-bg-base); border: 1px solid var(--color-border); border-radius: 4px;">Alt+R</kbd></h4>
                        <p>Highlight the active line under the cursor while dimming surrounding page text.</p>
                    </div>
                    <label class="acc-switch">
                        <input type="checkbox" id="acc-toggle-ruler" onchange="window.accommodationEngine.toggleRuler()">
                        <span class="acc-slider"></span>
                    </label>
                </div>

                <!-- Bionic Reading -->
                <div class="acc-feature-row">
                    <div class="acc-feature-info">
                        <h4><i class="fas fa-font" style="color: #8b5cf6;"></i> Bionic Reading Mode</h4>
                        <p>Bold the first few letters of words to guide eye fixations and speed comprehension.</p>
                    </div>
                    <label class="acc-switch">
                        <input type="checkbox" id="acc-toggle-bionic" onchange="window.accommodationEngine.profile.bionicEnabled = this.checked; window.accommodationEngine.saveProfile();">
                        <span class="acc-slider"></span>
                    </label>
                </div>

                <!-- Color Tint Layer -->
                <div class="acc-feature-row" style="flex-direction: column; align-items: stretch; gap: 0.75rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="acc-feature-info">
                            <h4><i class="fas fa-palette" style="color: #f59e0b;"></i> Irlen Syndrome Color Tint Overlay</h4>
                            <p>Soft colored transparent overlay to reduce visual stress, glare, and distortion.</p>
                        </div>
                        <label class="acc-switch">
                            <input type="checkbox" id="acc-toggle-tint" onchange="window.accommodationEngine.profile.tintEnabled = this.checked; window.accommodationEngine.saveProfile();">
                            <span class="acc-slider"></span>
                        </label>
                    </div>
                    <!-- Swatches -->
                    <div class="tint-swatches-grid">
                        <button type="button" class="tint-swatch swatch-peach" data-tint="peach" title="Soft Peach" onclick="window.accommodationEngine.profile.tintColor='peach'; window.accommodationEngine.profile.tintEnabled=true; window.accommodationEngine.saveProfile();"></button>
                        <button type="button" class="tint-swatch swatch-aqua" data-tint="aqua" title="Aqua Marine" onclick="window.accommodationEngine.profile.tintColor='aqua'; window.accommodationEngine.profile.tintEnabled=true; window.accommodationEngine.saveProfile();"></button>
                        <button type="button" class="tint-swatch swatch-yellow" data-tint="yellow" title="Pastel Yellow" onclick="window.accommodationEngine.profile.tintColor='yellow'; window.accommodationEngine.profile.tintEnabled=true; window.accommodationEngine.saveProfile();"></button>
                        <button type="button" class="tint-swatch swatch-rose" data-tint="rose" title="Soft Rose" onclick="window.accommodationEngine.profile.tintColor='rose'; window.accommodationEngine.profile.tintEnabled=true; window.accommodationEngine.saveProfile();"></button>
                        <button type="button" class="tint-swatch swatch-mint" data-tint="mint" title="Mint Green" onclick="window.accommodationEngine.profile.tintColor='mint'; window.accommodationEngine.profile.tintEnabled=true; window.accommodationEngine.saveProfile();"></button>
                        <button type="button" class="tint-swatch swatch-lavender" data-tint="lavender" title="Lavender" onclick="window.accommodationEngine.profile.tintColor='lavender'; window.accommodationEngine.profile.tintEnabled=true; window.accommodationEngine.saveProfile();"></button>
                    </div>
                </div>
            </div>

            <!-- Cognitive & Sensory Focus Tools -->
            <div class="acc-feature-group">
                <span class="acc-group-title"><i class="fas fa-brain"></i> Sensory & Cognitive Focus</span>

                <!-- Dyscalculia Colorizer -->
                <div class="acc-feature-row">
                    <div class="acc-feature-info">
                        <h4><i class="fas fa-plus-minus" style="color: #10b981;"></i> Dyscalculia Math Operator Highlighting</h4>
                        <p>Colorize arithmetic operations ($+$, $-$, $\times$, $\div$, $=$) to prevent symbol confusion.</p>
                    </div>
                    <label class="acc-switch">
                        <input type="checkbox" id="acc-toggle-dyscalculia" onchange="window.accommodationEngine.profile.dyscalculiaEnabled = this.checked; window.accommodationEngine.saveProfile();">
                        <span class="acc-slider"></span>
                    </label>
                </div>

                <!-- Focus Soundscapes (Web Audio) -->
                <div class="acc-feature-row" style="flex-direction: column; align-items: stretch; gap: 0.75rem;">
                    <div class="acc-feature-info">
                        <h4><i class="fas fa-headphones-alt" style="color: #ec4899;"></i> Offline Focus Soundscapes</h4>
                        <p>100% offline synthetic audio masking background distractions (zero external streaming).</p>
                    </div>
                    <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
                        <select id="acc-sound-select" class="acc-select" onchange="window.accommodationEngine.setSoundscape(this.value)">
                            <option value="none">🔇 Soundscape Off</option>
                            <option value="pink">🌸 Synthesized Pink Noise</option>
                            <option value="rain">🌧️ Gentle Ambient Rain</option>
                            <option value="ocean">🌊 Deep Ocean Surf</option>
                        </select>
                        <div class="acc-subcontrol" style="flex-grow: 1; margin-top: 0;">
                            <span>Volume</span>
                            <input type="range" id="acc-sound-volume" class="acc-range-input" min="0.05" max="1.0" step="0.05" oninput="window.accommodationEngine.setSoundscapeVolume(this.value)">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
