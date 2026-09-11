<?php
// Set variables for header.php
$pageTitle = "Teacher Observation Rubrics & Performance Assessments - Hesten's Learning";
$pageDescription = "Standard-aligned diagnostic observation rubrics and scoring instruments for early childhood and foundational grade teachers.";
$pageAuthor = "Hesten's Learning Platform";

include __DIR__ . '/../src/header.php';
?>

<div class="container" style="max-width: 1100px; margin: 2rem auto; padding: 0 1.5rem 5rem 1.5rem;">
    <!-- Header Hero Banner -->
    <div style="background: linear-gradient(135deg, color-mix(in srgb, var(--color-primary) 15%, var(--color-bg-surface)), var(--color-bg-surface)); border: 1px solid var(--color-border); border-radius: var(--radius-2xl, 1.5rem); padding: 2.5rem; margin-bottom: 3rem; position: relative; overflow: hidden; box-shadow: var(--shadow-sm);">
        <div style="max-width: 700px; position: relative; z-index: 2;">
            <div style="display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.25rem 0.75rem; border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-primary) 15%, transparent); color: var(--color-primary); font-size: 0.75rem; font-weight: 800; text-transform: uppercase; margin-bottom: 0.75rem;">
                <i class="fas fa-clipboard-list"></i> Educator Assessment Instrument Suite
            </div>
            <h1 style="font-size: 2.25rem; font-weight: 850; color: var(--color-text-main); margin: 0 0 0.75rem 0; line-height: 1.25;">
                Teacher Observation Rubrics
            </h1>
            <p style="color: var(--color-text-muted); font-size: 1rem; line-height: 1.6; margin: 0 0 1.5rem 0;">
                One-on-one observation protocols, manipulatives-based knowledge checks, and 4-step performance rubrics designed for formative assessment, IEP documentation, and parent-teacher conference portfolios.
            </p>
            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                <a href="/assessment/" class="hero-nav-btn hero-nav-btn-primary" style="padding: 0.65rem 1.25rem; font-size: 0.875rem; border-radius: var(--radius-lg); text-decoration: none;">
                    <i class="fas fa-tasks"></i> Student Online Tests
                </a>
                <a href="/assessment/diagnostic.php" class="hero-nav-btn hero-nav-btn-outline" style="padding: 0.65rem 1.25rem; font-size: 0.875rem; border-radius: var(--radius-lg); text-decoration: none;">
                    <i class="fas fa-brain"></i> Adaptive Diagnostic
                </a>
            </div>
        </div>
        <div style="position: absolute; right: 2rem; bottom: 1rem; opacity: 0.06; pointer-events: none;">
            <i class="fas fa-chalkboard-teacher" style="font-size: 14rem; color: var(--color-primary);"></i>
        </div>
    </div>

    <!-- Rubrics Directory Grid -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 1.75rem;">
        
        <!-- Pre-K Module 1 Rubric Card -->
        <div class="card-surface" style="background: var(--color-bg-surface); border: 1px solid var(--color-border); border-radius: var(--radius-xl); padding: 2rem; display: flex; flex-direction: column; justify-content: space-between; transition: transform 0.2s, box-shadow 0.2s; box-shadow: var(--shadow-sm);">
            <div>
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                    <span style="display: inline-flex; align-items: center; gap: 0.35rem; padding: 0.2rem 0.6rem; border-radius: var(--radius-full); background: rgba(20, 184, 166, 0.15); color: #0d9488; font-size: 0.75rem; font-weight: 800; text-transform: uppercase;">
                        Pre-K Readiness
                    </span>
                    <span style="font-size: 0.75rem; font-weight: 700; color: var(--color-text-muted);">4 Performance Steps</span>
                </div>
                <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--color-text-main); margin: 0 0 0.5rem 0;">
                    Pre-K Module 1 Mathematics
                </h3>
                <p style="font-size: 0.875rem; color: var(--color-text-muted); line-height: 1.6; margin: 0 0 1.25rem 0;">
                    Evaluating counting to 5, one-to-one matching, numeral identification, adding one more, and counting backward using linking cube manipulatives.
                </p>
                <div style="display: flex; flex-direction: column; gap: 0.4rem; margin-bottom: 1.5rem; font-size: 0.8125rem; color: var(--color-text-muted);">
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check text-green-500" style="color: #10b981;"></i> <strong>Standard:</strong> NYS Common Core / Eureka PK.CC.1–4
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check text-green-500" style="color: #10b981;"></i> <strong>Materials:</strong> 5 linking cubes, numeral cards 1–5
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check text-green-500" style="color: #10b981;"></i> <strong>Format:</strong> 1-on-1 interview with live auto-score
                    </div>
                </div>
            </div>
            <div>
                <a href="/assessment/GPK-MID-M1.php" class="hero-nav-btn hero-nav-btn-primary" style="width: 100%; justify-content: center; padding: 0.75rem 1.25rem; border-radius: var(--radius-lg); text-decoration: none; font-weight: 800;">
                    <i class="fas fa-edit" style="margin-right: 0.4rem;"></i> Open Pre-K Observation Form
                </a>
            </div>
        </div>

        <!-- Kindergarten Cardinality & Operations Rubric Card -->
        <div class="card-surface" style="background: var(--color-bg-surface); border: 1px solid var(--color-border); border-radius: var(--radius-xl); padding: 2rem; display: flex; flex-direction: column; justify-content: space-between; transition: transform 0.2s, box-shadow 0.2s; box-shadow: var(--shadow-sm);">
            <div>
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                    <span style="display: inline-flex; align-items: center; gap: 0.35rem; padding: 0.2rem 0.6rem; border-radius: var(--radius-full); background: rgba(59, 130, 246, 0.15); color: #2563eb; font-size: 0.75rem; font-weight: 800; text-transform: uppercase;">
                        Kindergarten
                    </span>
                    <span style="font-size: 0.75rem; font-weight: 700; color: var(--color-text-muted);">CCSS Aligned</span>
                </div>
                <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--color-text-main); margin: 0 0 0.5rem 0;">
                    Kindergarten Mid-Year Math Check
                </h3>
                <p style="font-size: 0.875rem; color: var(--color-text-muted); line-height: 1.6; margin: 0 0 1.25rem 0;">
                    Interactive observation framework measuring number names, counting forward from a given number, and decomposing numbers up to 10.
                </p>
                <div style="display: flex; flex-direction: column; gap: 0.4rem; margin-bottom: 1.5rem; font-size: 0.8125rem; color: var(--color-text-muted);">
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check text-green-500" style="color: #10b981;"></i> <strong>Standard:</strong> CCSS.MATH.K.CC.A.2 &amp; K.OA.A.3
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check text-green-500" style="color: #10b981;"></i> <strong>Materials:</strong> Two-color counters, 10-frames
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check text-green-500" style="color: #10b981;"></i> <strong>Online Check:</strong> Direct curriculum connection
                    </div>
                </div>
            </div>
            <div>
                <a href="/levels/b.php?subject=math" class="hero-nav-btn hero-nav-btn-outline" style="width: 100%; justify-content: center; padding: 0.75rem 1.25rem; border-radius: var(--radius-lg); text-decoration: none; font-weight: 800;">
                    <i class="fas fa-book-open" style="margin-right: 0.4rem;"></i> Review Kindergarten Curriculum
                </a>
            </div>
        </div>

        <!-- Early Literacy & Phonemic Awareness Card -->
        <div class="card-surface" style="background: var(--color-bg-surface); border: 1px solid var(--color-border); border-radius: var(--radius-xl); padding: 2rem; display: flex; flex-direction: column; justify-content: space-between; transition: transform 0.2s, box-shadow 0.2s; box-shadow: var(--shadow-sm);">
            <div>
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                    <span style="display: inline-flex; align-items: center; gap: 0.35rem; padding: 0.2rem 0.6rem; border-radius: var(--radius-full); background: rgba(236, 72, 153, 0.15); color: #ec4899; font-size: 0.75rem; font-weight: 800; text-transform: uppercase;">
                        Foundational ELA
                    </span>
                    <span style="font-size: 0.75rem; font-weight: 700; color: var(--color-text-muted);">Phonics &amp; Fluency</span>
                </div>
                <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--color-text-main); margin: 0 0 0.5rem 0;">
                    Early Phonological Awareness Record
                </h3>
                <p style="font-size: 0.875rem; color: var(--color-text-muted); line-height: 1.6; margin: 0 0 1.25rem 0;">
                    Oral reading inventory assessing letter-sound correspondences, rhyming recognition, syllable segmenting, and initial consonant blending.
                </p>
                <div style="display: flex; flex-direction: column; gap: 0.4rem; margin-bottom: 1.5rem; font-size: 0.8125rem; color: var(--color-text-muted);">
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check text-green-500" style="color: #10b981;"></i> <strong>Standard:</strong> CCSS.ELA.RF.K.2, RF.1.2 &amp; RF.1.3
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check text-green-500" style="color: #10b981;"></i> <strong>Focus:</strong> Blending, segmenting, onset-rime
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check text-green-500" style="color: #10b981;"></i> <strong>Accommodations:</strong> Multi-sensory tactile support
                    </div>
                </div>
            </div>
            <div>
                <a href="/assessment/index.php?grade=k" class="hero-nav-btn hero-nav-btn-outline" style="width: 100%; justify-content: center; padding: 0.75rem 1.25rem; border-radius: var(--radius-lg); text-decoration: none; font-weight: 800;">
                    <i class="fas fa-headphones" style="margin-right: 0.4rem;"></i> Launch Audio Phonics Check
                </a>
            </div>
        </div>

    </div>

    <!-- Feature Callout for Teachers -->
    <div style="margin-top: 3rem; background: var(--color-bg-surface); border: 1px solid var(--color-border); border-radius: var(--radius-xl); padding: 2rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1.5rem;">
        <div>
            <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--color-text-main); margin: 0 0 0.5rem 0;">
                <i class="fas fa-print" style="color: var(--color-primary); margin-right: 0.5rem;"></i> Need Offline Printable Worksheets?
            </h3>
            <p style="color: var(--color-text-muted); font-size: 0.9rem; margin: 0; max-width: 650px; line-height: 1.5;">
                Generate customized paper tests with bubble response grids, Common Core standard codes, and an educator answer key for any grade level.
            </p>
        </div>
        <a href="/assessment/" class="hero-nav-btn hero-nav-btn-primary" style="padding: 0.75rem 1.5rem; border-radius: var(--radius-lg); text-decoration: none; font-weight: 700;">
            <i class="fas fa-file-alt"></i> Generator in Assessment Portal
        </a>
    </div>
</div>

<?php include __DIR__ . '/../src/footer.php'; ?>
