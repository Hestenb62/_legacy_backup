<?php
/**
 * Component: Teacher Concepts
 * Renders deep-dive conceptual breakdown for educators.
 */
$title = $blockData['title'] ?? 'Teacher Guide Concepts: Deepen Your Understanding';
$concepts = $blockData['concepts'] ?? [];
?>

<section class="lesson-overview-section lesson-teacher-only">
    <h3 class="lesson-section-title"><?php echo htmlspecialchars($title); ?></h3>

    <div class="lesson-teacher-concepts">
        <?php foreach ($concepts as $concept): ?>
            <div class="lesson-concept-card">
                <h4 class="lesson-concept-title"><?php echo htmlspecialchars($concept['title'] ?? ''); ?></h4>
                <?php if (!empty($concept['text'])): ?>
                    <p class="lesson-concept-text"><?php echo $concept['text']; ?></p>
                <?php endif; ?>

                <?php if (!empty($concept['formula'])): ?>
                    <div class="lesson-math-box" style="margin: 0.75rem 0; padding: 0.75rem 1rem; background: color-mix(in srgb, var(--color-primary) 8%, transparent); border-radius: 8px; border: 1px solid color-mix(in srgb, var(--color-primary) 15%, transparent); text-align: center;">
                        $$<?php echo $concept['formula']; ?>$$
                    </div>
                <?php endif; ?>

                <?php if (!empty($concept['example'])): ?>
                    <p class="lesson-concept-text"><?php echo $concept['example']; ?></p>
                <?php endif; ?>

                <?php if (!empty($concept['intervals']) && is_array($concept['intervals'])): ?>
                    <div class="lesson-interval-grid">
                        <?php foreach ($concept['intervals'] as $interval): ?>
                            <div class="lesson-interval-item"><?php echo htmlspecialchars($interval); ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
