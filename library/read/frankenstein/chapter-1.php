<?php
$pageTitle = 'Frankenstein Chapter 1 | Hesten\'s Learning';
$pageDescription = 'Chapter 1 of Frankenstein; or, The Modern Prometheus by Mary Wollstonecraft Shelley with multi-tier Lexile adaptation.';
$pageKeywords = 'frankenstein, chapter 1, mary shelley, gothic fiction, lexile, basic english, accessible reader';
$pageAuthor = 'Mary Wollstonecraft Shelley';

include '../../../src/header.php';
?>

<link rel="stylesheet" href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/reader-main.css') : '/assets/css/reader-main.css' ?>">
<link rel="stylesheet" href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/reader/read-comparative-view.css') : '/assets/css/reader/read-comparative-view.css' ?>">

<style>
  .reader-chapter-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
    margin: 2.5rem auto 0 auto;
    max-width: 56rem;
    flex-wrap: wrap;
  }

  .reader-chapter-nav-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.85rem 1.5rem;
    border-radius: 9999px;
    background-color: var(--color-content-bg);
    border: 1px solid var(--color-border);
    color: var(--color-text-default);
    font-weight: 700;
    font-size: 0.9rem;
    text-decoration: none;
    transition: all 0.2s ease;
    box-shadow: var(--shadow-sm);
  }

  .reader-chapter-nav-btn:hover:not(.disabled) {
    background-color: var(--color-primary);
    color: #ffffff;
    border-color: var(--color-primary);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
  }

  .reader-chapter-nav-btn.disabled {
    opacity: 0.5;
    cursor: not-allowed;
  }
</style>

<?php 
$barTitle = 'Frankenstein';
$barSubtitle = 'Chapter 1';
$barBackUrl = '/library/read/index.php?book=frankenstein';
include_once __DIR__ . '/../../../src/partials/sticky-reading-bar.php'; 
?>

<main id="main-content" class="library-main reader-main-layout">
    <div class="reader-back-nav">
        <a href="index.php?book=frankenstein" class="reader-back-btn">
            <i class="fas fa-arrow-left"></i> Back to Book
        </a>
    </div>

    <article class="cdn-book-reader-container animate-reveal">
        <header class="reader-header">
            <span class="reader-meta-badge"><i class="fas fa-book-open"></i> CHAPTER VIEW</span>
            <h1 class="reader-title">Frankenstein - Chapter 1</h1>
            <p class="reader-author">by Mary Wollstonecraft Shelley</p>
        </header>

        <!-- Lexile Reading Level Selection Bar (Standalone View) -->
        <div class="lexile-switcher-wrap" id="lexile-switcher-wrap" style="display: none; align-items: center; justify-content: flex-end; gap: 0.6rem; margin-bottom: 1.5rem; padding: 0.6rem 1rem; background-color: var(--color-content-bg); border: 1px solid var(--color-border); border-radius: 9999px; width: fit-content; margin-left: auto;">
            <label for="lexile-switcher-select" style="font-size: 0.85rem; font-weight: 700; color: var(--color-text-secondary); display: inline-flex; align-items: center; gap: 0.4rem;">
                <i class="fas fa-layer-group" aria-hidden="true" style="color: var(--color-primary);"></i> Reading Level:
            </label>
            <select id="lexile-switcher-select" class="lexile-switcher-select" style="padding: 0.35rem 0.85rem; border-radius: 9999px; border: 1px solid var(--color-border); background-color: var(--color-bg); color: var(--color-text-default); font-weight: 600; font-size: 0.85rem; cursor: pointer;" title="Select Reading Level" aria-label="Select Reading Level">
            </select>
        </div>

        <div class="cdn-book-reader-content">
            <!-- ORIGINAL LEXILE VERSION (1170L) -->
            <div class="lexile-version active" data-lexile="original" data-lexile-label="Original (1170L)">
                <p>I am by birth a Genevese, and my family is one of the most distinguished of that republic. My ancestors had been for many years counsellors and syndics, and my father had filled several public situations with honour and reputation. He was respected by all who knew him for his integrity and indefatigable attention to public business. He passed his younger days perpetually occupied by the affairs of his country; nor was it until the decline of life that he thought of marrying, and bestowing on the state sons who might carry his virtues and his name down to posterity.</p>
                <p>As the circumstances of his marriage illustrate his character, I cannot refrain from relating them. One of his most intimate friends was a merchant who, from a flourishing state, fell, through numerous mischances, into poverty. This man, whose name was Beaufort, was of a proud and unbending disposition and could not bear to live in poverty and oblivion in the same country where he had once been distinguished for his rank and magnificence. Having paid his debts, therefore, in the most honourable manner, he retreated with his daughter to the town of Lucerne, where he lived unknown and in wretchedness. My father loved Beaufort with the truest friendship and was deeply grieved by his retreat in these unfortunate circumstances. He bitterly deplored the false pride which led his friend to a conduct so little worthy of the affection that united them. He lost no time in endeavouring to seek him out, with the hope of persuading him to begin the world again through his credit and assistance.</p>
                <p>Beaufort had taken effectual measures to conceal himself, and it was ten months before my father discovered his abode. Overjoyed at this discovery, he hastened to the house, which was situated in a mean street near the Reuss. But when he entered, misery and despair alone welcomed him. Beaufort had saved but a very small sum of money from the wreck of his fortunes, but it was sufficient to provide him with sustenance for some months, and in the meantime he hoped to procure some respectable employment in a merchant's house. The interval was, consequently, spent in inaction; his grief only became more deep and rankling when he had leisure for reflection, and at length it took so fast hold of his mind that at the end of three months he lay on a bed of sickness, incapable of any exertion.</p>
                <p>His daughter attended him with the greatest tenderness, but she saw with despair that their little fund was rapidly decreasing and that there was no other prospect of support. But Caroline Beaufort possessed a mind of an uncommon mould, and her courage rose to support her in her adversity. She procured plain work; she plaited straw and by various means contrived to earn a pittance scarcely sufficient to support life.</p>
                <p>Several months passed in this manner. Her father grew worse; her time was more entirely occupied in attending him; her means of subsistence decreased; and in the tenth month her father died in her arms, leaving her an orphan and a beggar. This last blow overcame her, and she knelt by Beaufort’s coffin weeping bitterly, when my father entered the chamber. He came like a protecting spirit to the poor girl, who committed herself to his care; and after the interment of his friend, he conducted her to Geneva and placed her under the protection of a relation. Two years after this event Caroline became his wife.</p>
                <p>There was a considerable difference between the ages of my parents, but this circumstance seemed only to unite them more closely in bonds of devoted affection. There was a show of gratitude and worship in his attachment to my mother, differing wholly from the doting fondness of age, for it was inspired by reverence for her virtues and a desire to be the means of, in some degree, recompensing her for the sorrows she had endured, but which gave inexpressible grace to his behaviour to her. Everything was made to yield to her wishes and her convenience. He strove to shelter her, as a fair exotic is sheltered by the gardener, from every rougher wind and to surround her with all that could tend to excite pleasurable emotion in her soft and benevolent mind.</p>
                <p>During a journey in Italy, when I was about four years old, my parents visited the pleasant shores of Lake Como. One day, when my father had gone by himself to Milan, my mother, accompanied by me, visited some cottages of the poor. In one of these she found a peasant and his wife, hard working and bent down by care and labor, distributing a scanty meal to five hungry babes. Among these there was one which attracted my mother far above all the rest. She appeared of a different stock. The four others were dark-eyed, hardy little vagrants; this child was thin and very fair. Her hair was the brightest living gold, and despite the poverty of her clothing, seemed to set a crown of distinction on her head. Her brow was clear and ample, her blue eyes cloudless, and her lips and the molding of her face so expressive of sensibility and sweetness that none could behold her without looking on her as of a distinct species, a being heaven-sent, and bearing a celestial stamp in all her features.</p>
                <p>The peasant woman, perceiving that my mother fixed eyes of wonder and admiration on this lovely girl, eagerly communicated her history. She was not her child, but the daughter of a Milanese nobleman. Her mother was a German and had died on giving her birth. The infant had been placed with these good people to nurse: they were better off then. They had not been long married, and their eldest child was but just born. The father of their charge was one of those Italians who harboured a warm love of liberty and had exerted himself for the liberation of his country. He had become obnoxious to the government, and on hearing that he was dead in an Austrian prison, his property was confiscated. His child became an orphan and an outcast. She continued with her foster parents and bloomed in their rude abode, fairer than a garden rose among dark-leaved brambles.</p>
                <p>When my father returned from Milan, he found playing with me in the hall of our villa a child fairer than pictured cherub—a creature who seemed to shed radiance from her looks and whose form and motions were lighter than the chamois of the hills. With his permission my mother had decided to adopt her. Elizabeth Lavenza became the inmate of my parents' house—my more than sister—the beautiful and adored companion of all my sports and my studies. Everyone loved Elizabeth. The passionate and almost reverential attachment with which all regarded her became in my eyes an affection for something of my own. I, with childish seriousness, interpreted her promise to be my very own: mine—mine to protect, love, and cherish; and she—mine only—was to be mine till death should shake her from my grasp.</p>
            </div>

            <!-- ADAPTED LEXILE VERSION (850L) -->
            <div class="lexile-version" data-lexile="adapted" data-lexile-label="Adapted (850L)" style="display: none;">
                <p>I was born in Geneva, Switzerland, into one of the most respected families in the republic. For generations, my ancestors served as respected judges and public officials. My father dedicated his youth to serving our country with deep honesty and tireless energy. Because he was so busy helping the state, he did not consider marriage until later in life, hoping to raise children who would carry on his virtues and good name.</p>
                <p>The story of my parents' marriage shows my father's true character. One of his closest friends was a merchant named Beaufort. Through terrible financial bad luck, Beaufort lost all his wealth and fell into deep poverty. Beaufort was a proud man who could not stand being pitied in the city where he had once lived like a prince. After paying every single cent of his debts honestly, Beaufort moved secretly with his daughter Caroline to the quiet town of Lucerne to live in seclusion.</p>
                <p>My father loved Beaufort dearly and was heartbroken when his friend disappeared. He spent ten months searching across the country, hoping to help Beaufort restart his career. When he finally found Beaufort’s tiny home by the river, he discovered a scene of total tragedy. Beaufort was bedridden with severe illness and exhaustion. Caroline, his courageous young daughter, had been working long hours weaving straw and taking sewing jobs to buy food and medicine. But their money ran out, and on the very day my father arrived, Beaufort died in Caroline’s arms, leaving her penniless and alone.</p>
                <p>My father stepped forward as her guardian. He arranged Beaufort’s funeral with great honor, brought Caroline safely to Geneva, and placed her with trusted relatives. Two years later, Caroline and my father were married. Despite their difference in age, they loved each other with unmatched tenderness and respect. My father treated my mother like a rare and delicate flower, doing everything possible to bring joy and comfort to her gentle heart.</p>
                <p>When I was about four years old, my family traveled to Lake Como in Italy. My mother loved visiting the poorest cottages to help families in need. In one tiny cottage, she met a struggling family with five hungry children. Four of the children were dark-haired and hardy, but one little girl stood out completely. She had bright golden hair, radiant blue eyes, and an expression so sweet and celestial that she looked like an angel.</p>
                <p>The peasant mother explained that this girl was named Elizabeth Lavenza. Elizabeth’s father was a noble Italian patriot who had died in an Austrian prison, and her German mother had died in childbirth. The peasant family had fostered Elizabeth with love, but could no longer afford to feed her. My mother immediately fell in love with Elizabeth and, with my father’s full blessing, adopted her into our family.</p>
                <p>From that day on, Elizabeth became my constant companion, my playmate, and my beloved sister. Everyone adored Elizabeth, but to me, she was something sacred. I took my mother’s words to heart when she presented Elizabeth to me as a special gift: she was mine to protect, to love, and to cherish forever.</p>
            </div>

            <!-- BASIC ENGLISH LEXILE VERSION (OGDEN 850 / ~480L) -->
            <div class="lexile-version" data-lexile="basic" data-lexile-label="Basic English (480L)" style="display: none;">
                <p>My name is Victor Frankenstein. I was born in the town of Geneva in Switzerland. My family was one of the most respected in that land. For many years, my family worked for the government. My father was a good man who worked hard for his people. He was old before he chose to take a wife and have children.</p>
                <p>The story of how my father married my mother shows his kind heart. He had a great friend who was a trader named Beaufort. Beaufort lost all his money and became very poor. He had much pride and was sad. He did not want his old friends to see him with no money, so he went far away to a small town with his young daughter, Caroline. My father searched for ten months to find his friend and give him help.</p>
                <p>When my father found the small house, he found great sadness. Beaufort was very ill in bed. His daughter Caroline was working day and night making straw mats and sewing clothes to buy food. But their money was gone. On the tenth month, the father died in Caroline's arms, leaving her alone in the world with no money. My father took care of Caroline like a father. He paid for the burial and took her to Geneva. Two years later, they were married.</p>
                <p>My parents loved each other very much. My father took great care of my mother. He made sure she had everything she needed to be happy.</p>
                <p>When I was four years old, we went to Italy near Lake Como. My mother liked to visit poor homes to give food and help to the poor. In one small home, she saw five children who were very hungry. Four of the children had dark hair. But one girl was very different. She had hair like gold and blue eyes like the sky. She looked like a sweet angel in a poor home.</p>
                <p>The poor woman in the home said the girl's name was Elizabeth Lavenza. Her father was an Italian nobleman who died in prison, and her mother was dead. The poor family could not feed her anymore. My mother loved this girl at once. My father agreed to take her into our home. We adopted Elizabeth as our own child.</p>
                <p>Elizabeth became my dear sister and friend. We played and read books together every day. All people loved Elizabeth, but I loved her most of all. I said to myself that she was mine to love and protect forever.</p>
            </div>
        </div>

        <nav class="reader-chapter-nav" aria-label="Chapter navigation">
            <span class="reader-chapter-nav-btn reader-chapter-nav-prev disabled" aria-disabled="true">
                <i class="fas fa-chevron-left"></i> Start of Book
            </span>
            <a href="index.php?book=frankenstein" class="reader-chapter-nav-btn" aria-label="Book contents">
                <i class="fas fa-list"></i> All Chapters
            </a>
            <span class="reader-chapter-nav-btn reader-chapter-nav-next disabled" aria-disabled="true">
                End of Book <i class="fas fa-chevron-right"></i>
            </span>
        </nav>
    </article>
</main>

<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-reader-lexile.js') : '/assets/js/library/lib-reader-lexile.js' ?>" defer></script>
<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/reader/read-comparative-view.js') : '/assets/js/reader/read-comparative-view.js' ?>" defer></script>

<?php include '../../../src/footer.php'; ?>
