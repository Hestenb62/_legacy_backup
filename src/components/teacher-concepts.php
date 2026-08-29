<?php
/**
 * Component: Teacher Concepts
 * Renders the deep-dive conceptual breakdown for educators.
 */
$concepts = $blockData['concepts'] ?? [];
?>

<section class="lesson-overview-section lesson-teacher-only">
    <h3 class="lesson-section-title">Teacher Guide Concepts: Deepen Your Understanding</h3>
    <div class="lesson-teacher-concepts">
        <?php foreach ($concepts as $concept): ?>
            <div class="lesson-concept-card">
                <h4 class="lesson-concept-title"><?php echo $concept['title']; ?></h4>
                <p class="lesson-concept-text"><?php echo $concept['text']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
