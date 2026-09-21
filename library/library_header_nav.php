<?php
/**
 * library/library_header_nav.php - Reusable Library Sub-Navigation Bar
 * Provides seamless, accessible, glassmorphic navigation between Library hubs:
 * - Library Home (/library/)
 * - Master Catalog & Call Numbers (/library/cataloge.php)
 * - How-To & Documentation Hub (/library/how-to.php)
 * - About the Library (/library/about.php)
 */
$currentLibraryPage = $currentLibraryPage ?? 'home';
?>
<nav class="library-subnav-ribbon" aria-label="Library Navigation Hub">
    <div class="library-subnav-container">
        <div class="library-subnav-links" role="menubar">
            <a href="/library/" 
               class="library-subnav-link <?php echo $currentLibraryPage === 'home' ? 'active' : ''; ?>" 
               role="menuitem"
               <?php if ($currentLibraryPage === 'home') echo 'aria-current="page"'; ?>>
                <i class="fas fa-compass" aria-hidden="true"></i>
                <span>Library Explore</span>
            </a>
            <a href="/library/cataloge.php" 
               class="library-subnav-link <?php echo $currentLibraryPage === 'cataloge' ? 'active' : ''; ?>" 
               role="menuitem"
               <?php if ($currentLibraryPage === 'cataloge') echo 'aria-current="page"'; ?>>
                <i class="fas fa-barcode" aria-hidden="true"></i>
                <span>Master Catalog (Call #s)</span>
            </a>
            <a href="/library/how-to.php" 
               class="library-subnav-link <?php echo $currentLibraryPage === 'howto' ? 'active' : ''; ?>" 
               role="menuitem"
               <?php if ($currentLibraryPage === 'howto') echo 'aria-current="page"'; ?>>
                <i class="fas fa-circle-question" aria-hidden="true"></i>
                <span>How-To &amp; Docs</span>
            </a>
            <a href="/library/about.php" 
               class="library-subnav-link <?php echo $currentLibraryPage === 'about' ? 'active' : ''; ?>" 
               role="menuitem"
               <?php if ($currentLibraryPage === 'about') echo 'aria-current="page"'; ?>>
                <i class="fas fa-landmark" aria-hidden="true"></i>
                <span>About Library</span>
            </a>
        </div>
        <div class="library-subnav-utilities">
            <button type="button" 
                    class="library-subnav-util-btn" 
                    onclick="if(typeof openStudyNotebookModal === 'function') openStudyNotebookModal();" 
                    title="Open Study Notebook" 
                    aria-label="Open Study Notebook with highlights and notes">
                <i class="fas fa-highlighter" aria-hidden="true"></i>
                <span class="subnav-util-text">Notebook</span>
            </button>
            <button type="button" 
                    class="library-subnav-util-btn" 
                    onclick="if(typeof openGoalModal === 'function') openGoalModal();" 
                    title="View Daily Reading Goal" 
                    aria-label="Open Reading Goal Tracker">
                <i class="fas fa-fire" aria-hidden="true" style="color: #f59e0b;"></i>
                <span class="subnav-util-text">Streak</span>
            </button>
        </div>
    </div>
</nav>
