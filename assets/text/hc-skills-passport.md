## Cosmic Skill Tree & Gamified Mastery Passport

Embark on an epic educational odyssey! Hosted at `/pages/skills.php`, the Cosmic Skill Tree visualizes your academic journey across Common Core Mathematics and English Language Arts (CCSS) as an interactive galaxy of constellations.

### Key Capabilities & Views

- **1. Interactive Constellation Tree:**
  - Standard Nodes: Each node represents an academic learning standard with color-coded status rings:
    - **Gold Ring & Glow:** Mastered (Score $\ge 80\%$).
    - **Cyan Ring:** In Progress / Proficient (Score $60\% - 79\%$).
    - **Slate / Dim Ring:** Locked or Developing ($< 60\%$).
  - Standards Detail Modal: Click or press `Enter` on any standard star to inspect standard descriptions, grade levels, and live MathJax problem exemplars.
  - Quick Practice Launcher: Jump directly into targeted exercises or diagnostic challenges for that specific standard.

- **2. Daily Learning Quests:**
  - Three daily challenges updated automatically: Math Explorer, Literature Scholar, and Daily Game Challenge.
  - Dynamic progress bars tracking completion with +50 XP bonus payouts upon completion.

- **3. Heraldic Badges & Crests Showcase:**
  - Earn collectible heraldic crests across your academic career: "Math Wizard", "Wordsmith", "Speed Demon", "Cartesian Voyager", and "Grand Scholar".
  - Inspect unlock criteria, dates achieved, and badge tiers.

### Data Synchronization & Privacy
- **Tripartite Auto-Sync:** Progress saved in your skills passport immediately updates your student profile (`hesten_standards_mastery`, `hl_gamification_profile`), syncs with teacher roster dossiers (`hesten_teacher_roster`), and uploads to Google Drive when cloud auto-sync is enabled.
- **Offline Resiliency:** Practice offline anywhere; your scores, XP, and unlock states queue locally and synchronize seamlessly when you reconnect.
