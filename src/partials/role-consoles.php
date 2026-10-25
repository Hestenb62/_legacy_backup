<?php
// src/partials/role-consoles.php
// Contextual Role Action Consoles for Home Page (Teacher, Parent, Student)
?>
<!-- Teacher Mode Console -->
<div id="teacher-hero-console" class="role-console-wrapper role-teacher-only animate-reveal" role="region" aria-label="Educator Quick Actions">
    <div class="role-console-card teacher-console-card">
        <div class="role-console-header">
            <div class="role-console-badge teacher-badge">
                <i class="fas fa-chalkboard-teacher" aria-hidden="true"></i> Educator Quick Actions
            </div>
            <span class="role-console-sub">Direct classroom workflows, pacing guides &amp; assignment dispatchers</span>
        </div>
        <div class="role-console-grid">
            <a href="/pages/teachers.php#assignment-builder" class="role-action-card">
                <div class="role-action-icon teacher-icon"><i class="fas fa-link" aria-hidden="true"></i></div>
                <div class="role-action-info">
                    <span class="role-action-title">Assignment Builder</span>
                    <span class="role-action-desc">Generate direct student links with curriculum presets</span>
                </div>
                <i class="fas fa-arrow-right role-action-arrow" aria-hidden="true"></i>
            </a>
            <a href="/pages/teachers.php#pacing" class="role-action-card">
                <div class="role-action-icon teacher-icon"><i class="fas fa-calendar-alt" aria-hidden="true"></i></div>
                <div class="role-action-info">
                    <span class="role-action-title">36-Week Pacing Guide</span>
                    <span class="role-action-desc">Explore standards-aligned scope &amp; sequence</span>
                </div>
                <i class="fas fa-arrow-right role-action-arrow" aria-hidden="true"></i>
            </a>
            <a href="/pages/standards.php" class="role-action-card">
                <div class="role-action-icon teacher-icon"><i class="fas fa-chart-line" aria-hidden="true"></i></div>
                <div class="role-action-info">
                    <span class="role-action-title">Standards Heatmap</span>
                    <span class="role-action-desc">Browse CCSS, NGSS, and TEKS domain codes</span>
                </div>
                <i class="fas fa-arrow-right role-action-arrow" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>

<!-- Parent Mode Console -->
<div id="parent-hero-console" class="role-console-wrapper role-parent-only animate-reveal" role="region" aria-label="Homeschool Quick Actions">
    <div class="role-console-card parent-console-card">
        <div class="role-console-header">
            <div class="role-console-badge parent-badge">
                <i class="fas fa-heart" aria-hidden="true"></i> Homeschool &amp; Parent Console
            </div>
            <span class="role-console-sub">Essential guides, 50-state homeschool laws &amp; accommodations</span>
        </div>
        <div class="role-console-grid">
            <a href="/pages/parents.php#laws" class="role-action-card">
                <div class="role-action-icon parent-icon"><i class="fas fa-map-marked-alt" aria-hidden="true"></i></div>
                <div class="role-action-info">
                    <span class="role-action-title">Homeschool Law Guide</span>
                    <span class="role-action-desc">Interactive 50-state legal requirements &amp; subjects</span>
                </div>
                <i class="fas fa-arrow-right role-action-arrow" aria-hidden="true"></i>
            </a>
            <a href="/pages/parents.php#tools" class="role-action-card">
                <div class="role-action-icon parent-icon"><i class="fas fa-universal-access" aria-hidden="true"></i></div>
                <div class="role-action-info">
                    <span class="role-action-title">Accommodations Engine</span>
                    <span class="role-action-desc">Configure IEP/504 presets, dyslexia &amp; sensory modes</span>
                </div>
                <i class="fas fa-arrow-right role-action-arrow" aria-hidden="true"></i>
            </a>
            <a href="/pages/profile.php" class="role-action-card">
                <div class="role-action-icon parent-icon"><i class="fas fa-award" aria-hidden="true"></i></div>
                <div class="role-action-info">
                    <span class="role-action-title">Transcript &amp; Portfolio</span>
                    <span class="role-action-desc">View and print student academic mastery certificates</span>
                </div>
                <i class="fas fa-arrow-right role-action-arrow" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>

<!-- Student Mode Console -->
<div id="student-hero-console" class="role-console-wrapper role-student-only animate-reveal" role="region" aria-label="Scholar Learning Station">
    <div class="role-console-card student-console-card">
        <div class="role-console-header">
            <div class="role-console-badge student-badge">
                <i class="fas fa-graduation-cap" aria-hidden="true"></i> Scholar Learning Station
            </div>
            <span class="role-console-sub">Quick shortcuts to your daily study tools and reading rooms</span>
        </div>
        <div class="role-console-grid">
            <a href="/student/index.php" class="role-action-card">
                <div class="role-action-icon student-icon"><i class="fas fa-desktop" aria-hidden="true"></i></div>
                <div class="role-action-info">
                    <span class="role-action-title">Student Academic Hub</span>
                    <span class="role-action-desc">Practice modules, flashcard reviews &amp; quest progress</span>
                </div>
                <i class="fas fa-arrow-right role-action-arrow" aria-hidden="true"></i>
            </a>
            <a href="/library/index.php" class="role-action-card">
                <div class="role-action-icon student-icon"><i class="fas fa-book-reader" aria-hidden="true"></i></div>
                <div class="role-action-info">
                    <span class="role-action-title">Digital Library</span>
                    <span class="role-action-desc">Novels, history texts &amp; bionic speed reading</span>
                </div>
                <i class="fas fa-arrow-right role-action-arrow" aria-hidden="true"></i>
            </a>
            <a href="/student/interactive-labs.php" class="role-action-card">
                <div class="role-action-icon student-icon"><i class="fas fa-flask" aria-hidden="true"></i></div>
                <div class="role-action-info">
                    <span class="role-action-title">Interactive Labs</span>
                    <span class="role-action-desc">Multi-sensory science simulations &amp; manipulatives</span>
                </div>
                <i class="fas fa-arrow-right role-action-arrow" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>
