/**
 * Science Topic Lessons Dataset (assets/js/pages/science-lessons.js)
 * Dual-lexile definitions, breakdown cards, worked examples, pro-tips/pitfalls,
 * scientific equations/laws, handcrafted SVG diagrams, curated academic references, and quizzes.
 */

var scienceLessons = window.scienceLessons = {
    // --- BIOLOGY RESOURCES ---
    "Cell Biology": {
        "category": "Biology Resources",
        "definition": "Cell biology (cytology) is the study of cellular structure, metabolic energetics, and physiological compartmentalization as the fundamental unit of life. Formulated by Schleiden, Schwann, and Virchow, Cell Theory establishes that all organisms are composed of cells, the cell is the universal structural unit of biological organization, and all cells arise from pre-existing cellular division. Eukaryotic cells feature specialized membrane-bound organelles—including the nucleus containing chromatin DNA, mitochondria generating ATP via oxidative phosphorylation, the endoplasmic reticulum synthesizing macromolecules, and the Golgi apparatus sorting proteins.",
        "basicDefinition": "Cells are the tiny microscopic building blocks that make up all living things on Earth. Inside a cell are tiny parts called organelles that do specific jobs, like the nucleus that acts as the control center and the mitochondria that make energy from food.",
        "breakdown": [
            {
                "label": "The Three Pillars of Cell Theory",
                "text": "1) All living organisms are made of cells; 2) The cell is the fundamental unit of life; 3) All cells arise from pre-existing cells."
            },
            {
                "label": "Prokaryotic vs. Eukaryotic Cells",
                "text": "Prokaryotes (bacteria) lack membrane-bound nuclei; Eukaryotes (plants, animals, fungi) possess organized organelles and linear DNA."
            },
            {
                "label": "Organelle Division of Labor",
                "text": "Nucleus stores genetic blueprints; Mitochondria generate ATP; Ribosomes translate proteins; Plant Chloroplasts harness solar photons."
            }
        ],
        "example": "Standard Analysis: 'In active human skeletal myocytes, high mitochondrial density accommodates rapid ATP hydrolysis during muscular contraction. In plant palisade mesophyll cells, chloroplasts utilize thylakoid membrane chlorophyll to convert photons, H2O, and CO2 into glucose and oxygen through the Calvin cycle.'",
        "basicExample": "Simple Sentence: 'A cell works like a tiny city: the nucleus is City Hall giving instructions, the mitochondria are the power plants making electricity, and the cell membrane is the security gate.'",
        "proTip": "Remember Plant Cell Armor! Plant cells have two special structures that animal cells NEVER have: a rigid outer Cell Wall (made of cellulose) for physical support, and green Chloroplasts for making food via photosynthesis!",
        "question": "Which organelle is responsible for generating the majority of chemical energy (ATP) in eukaryotic cells?",
        "choices": [
            "Ribosome",
            "Mitochondrion",
            "Endoplasmic Reticulum"
        ],
        "correctIndex": 1,
        "explanation": "Mitochondria are the powerhouses of eukaryotic cells, synthesizing ATP through the citric acid cycle and oxidative phosphorylation.",
        "equations": [
            {
                "title": "Aerobic Cellular Respiration Stoichiometry",
                "latex": "\\text{C}_6\\text{H}_{12}\\text{O}_6 + 6\\text{O}_2 \\xrightarrow{\\text{Enzymes}} 6\\text{CO}_2 + 6\\text{H}_2\\text{O} + 36\\text{--}38\\,\\text{ATP}",
                "note": "Catabolic breakdown of glucose into cellular ATP currency with water and carbon dioxide byproducts."
            },
            {
                "title": "Oxygenic Photosynthesis Net Reaction",
                "latex": "6\\text{CO}_2 + 6\\text{H}_2\\text{O} + h\\nu \\xrightarrow{\\text{Chlorophyll}} \\text{C}_6\\text{H}_{12}\\text{O}_6 + 6\\text{O}_2",
                "note": "Anabolic solar photon transduction synthesizing carbohydrate glucose within plant chloroplast stroma."
            },
            {
                "title": "Fick's First Law of Transmembrane Diffusion",
                "latex": "J = -D \\frac{d\\phi}{dx} \\quad (\\text{Passive Flux Across Semi-Permeable Lipid Bilayer})",
                "note": "Rate of passive solute transport across the phospholipid bilayer proportional to the concentration gradient."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Animal vs Plant Cell Anatomy and Organelle Architecture Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='20' y='25' width='195' height='145' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='117' y='46' fill='#1e40af' font-size='11' font-weight='bold' text-anchor='middle'>ANIMAL CELL</text><ellipse cx='117' cy='105' rx='75' ry='45' fill='#ffffff' stroke='#3b82f6' stroke-width='1.5'/><circle cx='117' cy='105' r='20' fill='#93c5fd'/><text x='117' y='108' fill='#1e3a8a' font-size='8' font-weight='bold' text-anchor='middle'>Nucleus</text><ellipse cx='80' cy='95' rx='8' ry='4' fill='#ef4444'/><ellipse cx='155' cy='115' rx='8' ry='4' fill='#ef4444'/><text x='117' y='160' fill='#1e40af' font-size='8' text-anchor='middle'>Flexible Membrane &bull; Mitochondria</text><rect x='245' y='25' width='195' height='145' rx='6' fill='#dcfce7' stroke='#166534' stroke-width='1.5'/><text x='342' y='46' fill='#166534' font-size='11' font-weight='bold' text-anchor='middle'>PLANT CELL</text><rect x='270' y='65' width='145' height='80' rx='4' fill='#ffffff' stroke='#16a34a' stroke-width='3'/><circle cx='342' cy='105' r='18' fill='#86efac'/><text x='342' y='108' fill='#14532d' font-size='8' font-weight='bold' text-anchor='middle'>Nucleus</text><ellipse cx='300' cy='85' rx='10' ry='5' fill='#22c55e'/><ellipse cx='385' cy='125' rx='10' ry='5' fill='#22c55e'/><rect x='330' y='75' width='25' height='18' rx='2' fill='#e0f2fe' stroke='#0284c7'/><text x='342' y='160' fill='#166534' font-size='8' text-anchor='middle'>Rigid Cell Wall &bull; Chloroplasts &bull; Vacuole</text><text x='230' y='188' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Compartmentalized Eukaryotic Cellular Architecture &#x2713;</text></svg>",
        "diagramLabel": "Animal vs plant cell anatomy and organelle architecture diagram",
        "diagramCaption": "Cellular Compartmentalization: Eukaryotic animal vs. plant cell architectures highlighting the nucleus, mitochondria, rigid cellulose cell wall, and chloroplasts.",
        "references": [
            {"title": "NGSS Standard HS-LS1-2 (Organization of Cells)", "desc": "Develop and use a model to illustrate the hierarchical organization of interacting systems in multicellular organisms.", "url": "/pages/standards.php?domain=SCIENCE-LS", "icon": "fas fa-award"},
            {"title": "Molecular Biology of the Cell (Alberts, NIH NCBI Bookshelf)", "desc": "Definitive authoritative text on eukaryotic organelle biochemistry and membrane dynamics.", "url": "https://www.ncbi.nlm.nih.gov/books/NBK21054/", "icon": "fas fa-university"},
            {"title": "NIH National Human Genome Research Institute: Cell Organelles", "desc": "Comprehensive interactive glossary of cell structures and metabolic functions.", "url": "https://www.genome.gov/genetics-glossary/Organelle", "icon": "fas fa-dna"}
        ]
    },
    "Genetics & Heredity": {
        "category": "Biology Resources",
        "definition": "Genetics is the scientific study of heredity, gene expression, and variation across generations. Governed by Gregor Mendel's Laws of Segregation and Independent Assortment, inheritance tracks the transmission of alleles (variant forms of a gene located at identical chromosomal loci). The molecular foundation of heredity resides in DNA (deoxyribonucleic acid), structured as an antiparallel double helix featuring Watson-Crick-Franklin complementary base-pairing (Adenine with Thymine; Guanine with Cytosine). Gene expression flows through the central dogma of molecular biology: transcription of genomic DNA into messenger RNA (mRNA), followed by ribosomal translation into functional catalytic proteins.",
        "basicDefinition": "Genetics is the study of how physical traits—like eye color, hair texture, and height—are passed down from parents to children through DNA. DNA acts like a recipe book inside every cell, with genes giving instructions for how the body grows and works.",
        "breakdown": [
            {
                "label": "Genotype vs. Phenotype",
                "text": "Genotype is the exact genetic allele combination (e.g., Bb or bb); Phenotype is the observable physical trait (e.g., brown eyes vs. blue eyes)."
            },
            {
                "label": "Dominant vs. Recessive Alleles",
                "text": "Dominant alleles (B) mask the expression of recessive alleles (b) in heterozygous individuals (Bb)."
            },
            {
                "label": "The Molecular Central Dogma",
                "text": "Genetic information flows unidirectionally from DNA instructions &rarr; mRNA messenger &rarr; folded Protein machinery."
            }
        ],
        "example": "Standard Analysis: 'In a classic Mendelian monohybrid cross between two heterozygous purple-flowered pea plants (Pp x Pp), meiosis segregates alleles into equal gamete frequencies (50% P, 50% p). A Punnett square calculates a genotypic ratio of 1 PP : 2 Pp : 1 pp and a phenotypic ratio of 3 purple flowers (75%) to 1 white flower (25%).'",
        "basicExample": "Simple Sentence: 'If both parents have brown eyes but carry a hidden blue-eye gene (Bb), a Punnett square shows there is a 1 out of 4 (25%) chance their baby will inherit two blue genes (bb) and have blue eyes.'",
        "proTip": "Remember the Base Pairing Rule: 'Apples in Trees' (A pairs with T) and 'Cars in Garages' (C pairs with G)! In RNA, Uracil (U) takes the place of Thymine (T)!",
        "question": "In a standard Mendelian monohybrid cross between two heterozygous parents (Bb x Bb), what percentage of offspring are expected to show the dominant phenotype?",
        "choices": [
            "25%",
            "50%",
            "75%"
        ],
        "correctIndex": 2,
        "explanation": "A heterozygous cross (Bb x Bb) produces 1 BB, 2 Bb, and 1 bb. Because BB and Bb both express the dominant phenotype, 3 out of 4 offspring (75%) show the dominant trait.",
        "equations": [
            {
                "title": "Hardy-Weinberg Population Genetic Equilibrium",
                "latex": "p^2 + 2pq + q^2 = 1 \\quad \\text{and} \\quad p + q = 1",
                "note": "Mathematical baseline predicting allele frequencies (p, q) and genotype frequencies (p^2, 2pq, q^2) in non-evolving populations."
            },
            {
                "title": "Chargaff's Base-Pairing Equivalence Rules",
                "latex": "\\%A = \\%T \\quad \\text{and} \\quad \\%G = \\%C \\implies \\frac{A + G}{T + C} = 1.0",
                "note": "Double-stranded DNA purines (A+G) always equal pyrimidines (T+C) in stoichiometric 1:1 balance."
            },
            {
                "title": "Molecular Central Dogma Kinetic Flow",
                "latex": "\\text{DNA} \\xrightarrow{\\text{RNA Polymerase}} \\text{mRNA} \\xrightarrow{\\text{Ribosome / tRNA}} \\text{Polypeptide Protein}",
                "note": "The canonical pathway of gene expression from nuclear genomic code to functional cytoplasmic enzymes."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Mendelian Punnett Square Cross and DNA Double Helix Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='185' height='145' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='117' y='46' fill='#1e40af' font-size='11' font-weight='bold' text-anchor='middle'>PUNNETT SQUARE (Bb &times; Bb)</text><text x='92' y='70' fill='#1e3a8a' font-size='10' font-weight='bold'>B</text><text x='142' y='70' fill='#1e3a8a' font-size='10' font-weight='bold'>b</text><text x='60' y='102' fill='#1e3a8a' font-size='10' font-weight='bold'>B</text><text x='60' y='138' fill='#1e3a8a' font-size='10' font-weight='bold'>b</text><rect x='75' y='80' width='38' height='30' fill='#ffffff' stroke='#3b82f6'/><text x='94' y='100' fill='#1e40af' font-size='9' font-weight='bold' text-anchor='middle'>BB</text><rect x='125' y='80' width='38' height='30' fill='#ffffff' stroke='#3b82f6'/><text x='144' y='100' fill='#1e40af' font-size='9' font-weight='bold' text-anchor='middle'>Bb</text><rect x='75' y='118' width='38' height='30' fill='#ffffff' stroke='#3b82f6'/><text x='94' y='138' fill='#1e40af' font-size='9' font-weight='bold' text-anchor='middle'>Bb</text><rect x='125' y='118' width='38' height='30' fill='#fee2e2' stroke='#ef4444'/><text x='144' y='138' fill='#991b1b' font-size='9' font-weight='bold' text-anchor='middle'>bb</text><text x='117' y='160' fill='#166534' font-size='9' font-weight='bold' text-anchor='middle'>75% Dominant &bull; 25% Recessive &#x2713;</text><rect x='245' y='25' width='190' height='145' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='340' y='46' fill='#92400e' font-size='11' font-weight='bold' text-anchor='middle'>DNA BASE PAIRING</text><line x1='285' y1='70' x2='395' y2='70' stroke='#d97706' stroke-width='2'/><circle cx='305' cy='70' r='10' fill='#dbeafe'/><text x='305' y='73' fill='#1e40af' font-size='8' font-weight='bold' text-anchor='middle'>A</text><circle cx='375' cy='70' r='10' fill='#fee2e2'/><text x='375' y='73' fill='#991b1b' font-size='8' font-weight='bold' text-anchor='middle'>T</text><text x='340' y='73' fill='#64748b' font-size='8' text-anchor='middle'>==</text><line x1='285' y1='105' x2='395' y2='105' stroke='#d97706' stroke-width='2'/><circle cx='305' cy='105' r='10' fill='#dcfce7'/><text x='305' y='108' fill='#166534' font-size='8' font-weight='bold' text-anchor='middle'>G</text><circle cx='375' cy='105' r='10' fill='#f3e8ff'/><text x='375' y='108' fill='#7e22ce' font-size='8' font-weight='bold' text-anchor='middle'>C</text><text x='340' y='108' fill='#64748b' font-size='8' text-anchor='middle'>&equiv;</text><line x1='285' y1='140' x2='395' y2='140' stroke='#d97706' stroke-width='2'/><circle cx='305' cy='140' r='10' fill='#fee2e2'/><text x='305' y='143' fill='#991b1b' font-size='8' font-weight='bold' text-anchor='middle'>T</text><circle cx='375' cy='140' r='10' fill='#dbeafe'/><text x='375' y='143' fill='#1e40af' font-size='8' font-weight='bold' text-anchor='middle'>A</text><text x='340' y='143' fill='#64748b' font-size='8' text-anchor='middle'>==</text><text x='340' y='160' fill='#92400e' font-size='8' font-weight='bold' text-anchor='middle'>A-T (2 H-Bonds) &bull; G-C (3 H-Bonds)</text><text x='230' y='188' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Mendelian Inheritance and Molecular DNA Architecture &#x2713;</text></svg>",
        "diagramLabel": "Mendelian Punnett square cross and DNA double helix diagram",
        "diagramCaption": "Heredity & Molecular Genetics: A monohybrid heterozygous cross (Bb x Bb) producing a 3:1 dominant-to-recessive phenotypic ratio alongside Watson-Crick DNA base pairing.",
        "references": [
            {"title": "NGSS Standard HS-LS3-3 (Inheritance of Traits)", "desc": "Apply concepts of statistics and probability to explain the variation and distribution of expressed traits in a population.", "url": "/pages/standards.php?domain=SCIENCE-LS", "icon": "fas fa-award"},
            {"title": "Learn.Genetics: Genetic Science Learning Center", "desc": "University of Utah's world-renowned interactive explorations of DNA, heredity, and chromosomes.", "url": "https://learn.genetics.utah.edu/", "icon": "fas fa-university"},
            {"title": "Nature Education Scitable: Mendelian Genetics & Molecular Biology", "desc": "Peer-reviewed library detailing genetic recombination, transcription, and translation.", "url": "https://www.nature.com/scitable/topic/genetics-5/", "icon": "fas fa-dna"}
        ]
    },
    "Ecology & Environment": {
        "category": "Biology Resources",
        "definition": "Ecology is the scientific discipline examining complex reciprocal interactions between biological organisms and their abiotic (non-living) environment across biosphere hierarchies: individual &rarr; population &rarr; community &rarr; ecosystem &rarr; biome. Governed by thermodynamic principles, energy flows unidirectionally through trophic food webs, with approximately 90% of thermal energy dissipated per trophic transfer (Lindeman's 10% efficiency law). In contrast, chemical matter (carbon, nitrogen, phosphorus, water) cycles indefinitely through closed biogeochemical loops. Ecosystem dynamics are stabilized through biodiversity, ecological niches, and feedback mechanisms that regulate carrying capacity (K).",
        "basicDefinition": "Ecology is the study of how living plants and animals connect with each other and their surroundings (like soil, sunlight, and water). Energy from the sun flows up the food chain from green plants to herbivores to top predators, while nutrients cycle endlessly through nature.",
        "breakdown": [
            {
                "label": "The 10% Trophic Energy Rule",
                "text": "Only about 10% of chemical energy transfers up from one feeding level to the next; 90% is lost as metabolic heat."
            },
            {
                "label": "Biogeochemical Cycles",
                "text": "Unlike energy (which flows one-way from the sun), nutrients like carbon, nitrogen, and water are recycled endlessly."
            },
            {
                "label": "Symbiotic Relationships",
                "text": "Mutualism (both benefit), Commensalism (one benefits, one unaffected), and Parasitism (one benefits at the other's expense)."
            }
        ],
        "example": "Standard Analysis: 'In a temperate grassland ecosystem, 10,000 J of solar energy fixed by primary producers (prairie grasses) supports approximately 1,000 J of primary consumers (locusts), 100 J of secondary consumers (field mice), and only 10 J of tertiary apex predators (red-tailed hawks), illustrating Lindeman's trophic decay.'",
        "basicExample": "Simple Sentence: 'A food chain starts with the sun feeding grass, a rabbit eating the grass, and a fox eating the rabbit. When the fox dies, decomposers return nutrients back to the soil for new grass to grow.'",
        "proTip": "Remember the 10% Rule! Because 90% of energy is lost as body heat at each step, there are always millions of green plants, fewer herbivores, and very few top carnivores in any healthy wild habitat!",
        "question": "According to the ecological 10% rule, if primary producers contain 10,000 Joules of energy, approximately how much energy is transferred to secondary consumers?",
        "choices": [
            "1,000 Joules",
            "100 Joules",
            "10 Joules"
        ],
        "correctIndex": 1,
        "explanation": "Primary producers (10,000 J) transfer 10% to primary consumers (1,000 J), which in turn transfer 10% to secondary consumers (100 J).",
        "equations": [
            {
                "title": "Lindeman's Trophic Energy Efficiency Law",
                "latex": "E_{\\text{trophic}} = \\frac{P_n}{P_{n-1}} \\approx 0.10 \\quad (10\\% \\text{ Energy Transfer Rule})",
                "note": "Efficiency of energy transfer between successive trophic levels (n-1 to n), with ~90% lost to metabolic respiration and entropy."
            },
            {
                "title": "Verhulst Logistic Population Growth Dynamic",
                "latex": "\\frac{dN}{dt} = rN \\left(1 - \\frac{N}{K}\\right) \\quad (K = \\text{Carrying Capacity}, \\, r = \\text{Intrinsic Rate})",
                "note": "Mathematical curve describing exponential growth transitioning into plateau equilibrium as resources limit population size."
            },
            {
                "title": "Net Primary Ecosystem Productivity Balance",
                "latex": "\\text{NPP} = \\text{GPP} - R_{\\text{autotrophic}} \\quad (\\text{Net Biomass Harvested by Herbivores})",
                "note": "Net primary production equals total gross photosynthetic solar capture minus cellular respiration expenditure."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Trophic Energy Pyramid and Ecosystem Biomass Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><polygon points='230,25 290,65 170,65' fill='#fee2e2' stroke='#ef4444' stroke-width='1.5'/><text x='230' y='50' fill='#991b1b' font-size='9' font-weight='bold' text-anchor='middle'>APEX: 10 J</text><polygon points='170,65 290,65 330,105 130,105' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='230' y='90' fill='#92400e' font-size='9' font-weight='bold' text-anchor='middle'>SECONDARY CONSUMERS: 100 J</text><polygon points='130,105 330,105 370,145 90,145' fill='#e0f2fe' stroke='#0284c7' stroke-width='1.5'/><text x='230' y='130' fill='#0369a1' font-size='9' font-weight='bold' text-anchor='middle'>PRIMARY CONSUMERS: 1,000 J</text><polygon points='90,145 370,145 410,180 50,180' fill='#dcfce7' stroke='#166534' stroke-width='1.5'/><text x='230' y='167' fill='#166534' font-size='10' font-weight='bold' text-anchor='middle'>PRIMARY PRODUCERS (PLANTS): 10,000 J</text><path d='M 390 145 Q 430 100 390 55' fill='none' stroke='#ef4444' stroke-width='2' stroke-dasharray='3 3'/><text x='435' y='105' fill='#dc2626' font-size='8' font-weight='bold'>90% Heat Loss &rarr;</text><text x='230' y='193' fill='#475569' font-size='8' font-weight='bold' text-anchor='middle'>Lindeman's 10% Trophic Transfer Law in Ecosystem Energetics &#x2713;</text></svg>",
        "diagramLabel": "Trophic energy pyramid and ecosystem biomass diagram",
        "diagramCaption": "The 10% Trophic Energy Pyramid: Only approximately 10% of chemical energy transfers up from primary producers to apex predators, with 90% lost to metabolic respiration and entropy.",
        "references": [
            {"title": "NGSS Standard HS-LS2-4 (Biomass and Energy Transfer)", "desc": "Use mathematical representations to support claims for the cycling of matter and flow of energy among organisms in an ecosystem.", "url": "/pages/standards.php?domain=SCIENCE-LS", "icon": "fas fa-award"},
            {"title": "Ecological Society of America (ESA): Ecosystem Energetics", "desc": "Authoritative research guidelines on trophic cascades, biodiversity, and energy budgets.", "url": "https://www.esa.org/", "icon": "fas fa-university"},
            {"title": "National Geographic Education: Trophic Levels & Food Webs", "desc": "Interactive guides to ecological succession, keystone species, and energy conservation.", "url": "https://education.nationalgeographic.org/resource/trophic-levels/", "icon": "fas fa-seedling"}
        ]
    },
    "Human Body Systems": {
        "category": "Biology Resources",
        "definition": "Human anatomy and physiology explores the hierarchical organization and homeostatic coordination of organ systems ensuring organismal survival. Homeostasis operates primarily via negative feedback loops that monitor physiological variables (arterial blood pressure, thermoregulatory core temperature, blood glucose concentration, and plasma osmolarity) through sensory receptors, integrate signals in control centers (e.g., hypothalamus), and activate effectors to restore target setpoints. Key interacting organ systems include the Circulatory (double-circuit cardiac hemodynamics), Respiratory (alveolar-capillary gas exchange), Nervous (action potential bioelectricity), Endocrine (hormonal feedback), Digestive (hydrolysis and absorption), and Renal/Immune systems.",
        "basicDefinition": "The human body is an amazing network of organ systems working as a unified team. The heart pumps oxygenated blood, the lungs breathe in fresh oxygen and remove carbon dioxide, the stomach digests food into energy, and the brain coordinates everything to keep your body stable and healthy.",
        "breakdown": [
            {
                "label": "Homeostasis via Negative Feedback",
                "text": "The body self-corrects: when temperature rises, you sweat to cool down; when blood sugar rises, insulin lowers it back to normal."
            },
            {
                "label": "Circulatory & Respiratory Teamwork",
                "text": "Lungs absorb oxygen into red blood cells (hemoglobin); the heart pumps oxygenated blood to millions of cells and returns waste CO2."
            },
            {
                "label": "Nervous & Endocrine Control",
                "text": "The nervous system fires fast electrical nerve signals in milliseconds; the endocrine system releases hormones for slower, long-lasting adjustments."
            }
        ],
        "example": "Standard Analysis: 'During aerobic exercise, active skeletal muscle metabolism consumes O2 and generates excess CO2 and lactic acid, lowering arterial blood pH. Peripheral and central chemoreceptors detect hypercapnia, signaling the medulla oblongata to increase respiratory rate and tidal volume while sympathetic stimulation accelerates cardiac output, rapidly restoring arterial blood gas homeostasis.'",
        "basicExample": "Simple Sentence: 'When you play outside on a hot day, your brain's internal thermostat detects heat and triggers sweat glands so that evaporating moisture cools your skin back to a healthy 98.6&deg;F.'",
        "proTip": "Think of Homeostasis like a Home Thermostat! When a room gets too warm, the AC turns on to bring the temperature down. When your body gets too hot, you sweat to cool down. Negative feedback ALWAYS reverses a change to keep you balanced!",
        "question": "Which physiological control mechanism continuously works to reverse deviations from a normal set point to maintain internal stability?",
        "choices": [
            "Positive feedback",
            "Negative feedback",
            "Digestive peristalsis"
        ],
        "correctIndex": 1,
        "explanation": "Negative feedback loops counteract physiological deviations, returning variables (like body temperature and blood sugar) back to their target homeostatic setpoint.",
        "equations": [
            {
                "title": "Fick's Principle of Cardiac Output Hemodynamics",
                "latex": "Q = \\text{HR} \\times \\text{SV} = \\frac{\\dot{V}_{\\text{O}_2}}{C_a\\text{O}_2 - C_v\\text{O}_2} \\quad (\\text{Cardiac Output} = \\text{Rate} \\times \\text{Volume})",
                "note": "Total systemic blood flow equals heart rate times stroke volume, verified by oxygen consumption over arteriovenous difference."
            },
            {
                "title": "Ideal Alveolar Gas Equation for Partial Oxygen Pressure",
                "latex": "P_A\\text{O}_2 = F_I\\text{O}_2 (P_{\\text{atm}} - P_{\\text{H}_2\\text{O}}) - \\frac{P_a\\text{CO}_2}{R}",
                "note": "Calculates partial pressure of alveolar oxygen determining diffusion gradient across pulmonary capillary membranes."
            },
            {
                "title": "Negative Feedback Homeostatic Attenuation Equation",
                "latex": "\\text{Error}_{\\text{regulated}} = \\frac{\\Delta \\text{Perturbation}}{1 + G_{\\text{loop}}} \\to 0 \\quad (\\text{High Gain Closed Loop})",
                "note": "Mathematical representation of physiological feedback minimizing deviation from homeostatic setpoints."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Human Physiological Homeostasis and Negative Feedback Loop Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='185' height='145' rx='6' fill='#fee2e2' stroke='#ef4444' stroke-width='1.5'/><text x='117' y='46' fill='#991b1b' font-size='11' font-weight='bold' text-anchor='middle'>ORGAN SYSTEM TEAMWORK</text><circle cx='117' cy='80' r='20' fill='#ffffff' stroke='#ef4444' stroke-width='1.5'/><text x='117' y='83' fill='#991b1b' font-size='8' font-weight='bold' text-anchor='middle'>HEART</text><circle cx='65' cy='130' r='18' fill='#ffffff' stroke='#3b82f6' stroke-width='1.5'/><text x='65' y='133' fill='#1e40af' font-size='8' font-weight='bold' text-anchor='middle'>LUNGS</text><circle cx='169' cy='130' r='18' fill='#ffffff' stroke='#10b981' stroke-width='1.5'/><text x='169' y='133' fill='#065f46' font-size='8' font-weight='bold' text-anchor='middle'>BRAIN</text><line x1='100' y1='95' x2='75' y2='115' stroke='#94a3b8' stroke-width='1.5'/><line x1='134' y1='95' x2='159' y2='115' stroke='#94a3b8' stroke-width='1.5'/><text x='117' y='160' fill='#475569' font-size='8' font-weight='bold' text-anchor='middle'>Oxygen &bull; Blood &bull; Nerve Signals</text><rect x='245' y='25' width='190' height='145' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='340' y='46' fill='#1e40af' font-size='11' font-weight='bold' text-anchor='middle'>NEGATIVE FEEDBACK LOOP</text><rect x='260' y='65' width='70' height='30' rx='4' fill='#ffffff' stroke='#3b82f6'/><text x='295' y='83' fill='#1e40af' font-size='8' font-weight='bold' text-anchor='middle'>1. STIMULUS</text><text x='355' y='83' fill='#64748b' font-size='10' font-weight='bold'>&rarr;</text><rect x='370' y='65' width='55' height='30' rx='4' fill='#ffffff' stroke='#3b82f6'/><text x='397' y='83' fill='#1e40af' font-size='8' font-weight='bold' text-anchor='middle'>2. SENSOR</text><path d='M 397 100 L 397 115 L 320 115' stroke='#1e40af' stroke-width='1.5' marker-end='url(#arrow)' fill='none'/><rect x='260' y='125' width='150' height='30' rx='4' fill='#dcfce7' stroke='#166534'/><text x='335' y='144' fill='#166534' font-size='9' font-weight='bold' text-anchor='middle'>3. RESPONSE RESTORES NORMAL</text><text x='230' y='188' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Homeostatic Equilibrium Maintained by Coordinated Systems &#x2713;</text></svg>",
        "diagramLabel": "Human physiological homeostasis and negative feedback loop diagram",
        "diagramCaption": "Homeostasis and Negative Feedback: The coordinated actions of the circulatory, respiratory, and nervous systems restoring physiological setpoints through negative feedback loops.",
        "references": [
            {"title": "NGSS Standard HS-LS1-3 (Feedback Mechanisms & Homeostasis)", "desc": "Plan and conduct an investigation to provide evidence that feedback mechanisms maintain homeostasis.", "url": "/pages/standards.php?domain=SCIENCE-LS", "icon": "fas fa-award"},
            {"title": "American Physiological Society: Understanding Human Physiology", "desc": "Authoritative research compendium on cardiovascular, neural, and endocrine regulation.", "url": "https://www.physiology.org/", "icon": "fas fa-university"},
            {"title": "NIH MedlinePlus: Human Organ Systems & Health", "desc": "National Institutes of Health guide to body system interactions and clinical physiology.", "url": "https://medlineplus.gov/", "icon": "fas fa-heartbeat"}
        ]
    }
,
    // --- CHEMISTRY RESOURCES ---
    "Periodic Table": {
        "category": "Chemistry Resources",
        "definition": "The Periodic Table of Elements is the foundational organizing architecture of chemistry, formulated by Dmitri Mendeleev and refined by Henry Moseley. Elements are arranged in ascending atomic number (nuclear proton count) and organized into periods (horizontal rows corresponding to principal quantum electron shells n) and groups (vertical columns sharing identical valence shell electron configurations). Periodic trends—including electronegativity, first ionization energy, electron affinity, and atomic/ionic radii—emerge predictably from the balance between effective nuclear charge (Zeff) and electron shielding.",
        "basicDefinition": "The periodic table is an organized chart showing all 118 chemical elements in the universe. Elements are grouped by how their atoms behave: shiny reactive metals are on the left, non-metals are on the right, and unreactive noble gases are on the far right.",
        "breakdown": [
            {
                "label": "Atomic Number & Mass",
                "text": "Atomic number = number of protons in the nucleus (defines the element). Atomic mass = average protons plus neutrons."
            },
            {
                "label": "Periodic Trends (The Fluorine Rule)",
                "text": "Electronegativity and ionization energy increase UP and to the RIGHT toward Fluorine; Atomic radius increases DOWN and to the LEFT."
            },
            {
                "label": "Groups & Valence Electrons",
                "text": "Elements in the same column (group) have the same number of outer valence electrons and form similar chemical bonds."
            }
        ],
        "example": "Standard Analysis: 'Sodium (Na, Group 1, [Ne] 3s1) has a low first ionization energy (496 kJ/mol) and easily sheds its single valence electron to achieve an octet. Chlorine (Cl, Group 17, [Ne] 3s2 3p5) has high electronegativity (3.16) and avidly gains that electron, forming an electrostatic ionic lattice of NaCl.'",
        "basicExample": "Simple Sentence: 'Gold (Au), Oxygen (O), and Carbon (C) are all on the periodic table. Carbon has atomic number 6, which means every carbon atom has exactly 6 protons.'",
        "proTip": "Remember the Fluorine Rule! Fluorine (F) is the most electron-hungry element on the entire periodic table. As you move toward Fluorine (up and right), atoms pull harder on electrons; as you move away from Fluorine (down and left), atoms get larger and lose electrons more easily!",
        "question": "Which periodic trend describes an atom's ability to attract shared electrons within a chemical bond?",
        "choices": [
            "Atomic Radius",
            "Electronegativity",
            "Nuclear Fission"
        ],
        "correctIndex": 1,
        "explanation": "Electronegativity measures an atom's relative pull on shared electrons within a covalent chemical bond, peaking at Fluorine (3.98).",
        "equations": [
            {
                "title": "Effective Nuclear Charge Approximation (Slater's Law)",
                "latex": "Z_{\\text{eff}} = Z - S \\quad (Z = \\text{Protons}, \\, S = \\text{Core Electron Shielding})",
                "note": "Net positive nuclear attraction experienced by valence electrons, driving periodic contraction across periods."
            },
            {
                "title": "Bohr-Rydberg First Ionization Energy Relation",
                "latex": "E_{\\text{IE}} = -E_n = \\frac{R_H Z_{\\text{eff}}^2}{n^2} \\quad (\\text{Energy Required to Remove Outermost Electron})",
                "note": "Quantifies the electrostatic energy required to detach an electron from an isolated gaseous atom."
            },
            {
                "title": "Mulliken Electronegativity Scale Definition",
                "latex": "\\chi = \\frac{\\text{IE} + \\text{EA}}{2} \\quad (\\text{Average of Ionization Energy and Electron Affinity})",
                "note": "Robert Mulliken's absolute scale defining electronegativity from fundamental atomic properties."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Periodic Table Periodic Trends and Shell Architecture Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='210' height='145' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='130' y='46' fill='#1e40af' font-size='11' font-weight='bold' text-anchor='middle'>PERIODIC TABLE TRENDS</text><path d='M 45 135 L 215 135' stroke='#ef4444' stroke-width='2.5' marker-end='url(#arrow)'/><text x='130' y='128' fill='#b91c1c' font-size='9' font-weight='bold' text-anchor='middle'>&rarr; Electronegativity &amp; Ionization Energy Increase</text><path d='M 45 135 L 45 60' stroke='#3b82f6' stroke-width='2.5' marker-end='url(#arrow)'/><text x='55' y='95' fill='#1e40af' font-size='8' font-weight='bold' transform='rotate(-90 55 95)'>&uarr; Ionization Energy</text><path d='M 215 60 L 45 145' stroke='#10b981' stroke-width='2' stroke-dasharray='3 3'/><text x='150' y='80' fill='#047857' font-size='8' font-weight='bold'>&swarr; Atomic Radius Increases</text><circle cx='215' cy='60' r='8' fill='#ef4444'/><text x='215' y='63' fill='#ffffff' font-size='8' font-weight='bold' text-anchor='middle'>F</text><rect x='255' y='25' width='180' height='145' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='345' y='46' fill='#92400e' font-size='11' font-weight='bold' text-anchor='middle'>ATOMIC STRUCTURE (Na)</text><circle cx='345' cy='95' r='14' fill='#fcd34d' stroke='#b45309'/><text x='345' y='98' fill='#78350f' font-size='8' font-weight='bold' text-anchor='middle'>11p 12n</text><circle cx='345' cy='95' r='26' fill='none' stroke='#94a3b8' stroke-width='1'/><circle cx='345' cy='95' r='38' fill='none' stroke='#94a3b8' stroke-width='1'/><circle cx='345' cy='95' r='50' fill='none' stroke='#3b82f6' stroke-width='1.5' stroke-dasharray='3 3'/><circle cx='395' cy='95' r='4' fill='#ef4444'/><text x='345' y='160' fill='#92400e' font-size='9' font-weight='bold' text-anchor='middle'>Valence: 1 Outer Electron (Group 1) &#x2713;</text><text x='230' y='188' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Periodic Law Governed by Nuclear Charge and Electron Shells &#x2713;</text></svg>",
        "diagramLabel": "Periodic table periodic trends and shell architecture diagram",
        "diagramCaption": "The Periodic Landscape: Periodic trends in electronegativity, ionization energy, and atomic radius governed by valence electron configurations.",
        "references": [
            {"title": "NGSS Standard HS-PS1-1 (Periodic Table & Properties)", "desc": "Use the periodic table as a model to predict the relative properties of elements based on valence electron patterns.", "url": "/pages/standards.php?domain=SCIENCE-PS", "icon": "fas fa-award"},
            {"title": "IUPAC Periodic Table of the Elements", "desc": "International Union of Pure and Applied Chemistry definitive atomic weights and isotopic data.", "url": "https://iupac.org/what-we-do/periodic-table-of-elements/", "icon": "fas fa-university"},
            {"title": "Royal Society of Chemistry (RSC): Interactive Periodic Table", "desc": "Comprehensive visual database of electronic configurations, history, and physical properties.", "url": "https://www.rsc.org/periodic-table", "icon": "fas fa-atom"}
        ]
    },
    "Chemical Reactions": {
        "category": "Chemistry Resources",
        "definition": "A chemical reaction is a dynamic thermodynamic process in which reactant chemical bonds break and re-form into distinct product molecular configurations, accompanied by energy transformation. Governed strictly by Antoine Lavoisier's Law of Conservation of Mass, the total quantity of each atomic element is invariant between reactants and products. Reactions divide into five fundamental classes: Synthesis (combination), Decomposition, Single Replacement, Double Replacement (precipitation/neutralization), and Combustion. Reaction kinetics depend upon temperature, concentration, and catalysts, which accelerate rates by providing alternate pathways with lower activation energies (Ea).",
        "basicDefinition": "A chemical reaction happens when atoms break apart and reconnect in new ways to create completely new substances (like wood burning into ash and smoke, or iron rusting). Mass is never created or destroyed—every single atom must be accounted for on both sides.",
        "breakdown": [
            {
                "label": "Conservation of Mass & Balancing",
                "text": "Matter cannot be created or destroyed in chemical reactions; equations must have identical atom counts on both sides."
            },
            {
                "label": "The 5 Core Reaction Types",
                "text": "Synthesis (A+B &rarr; AB), Decomposition (AB &rarr; A+B), Single Replacement, Double Replacement, and Combustion."
            },
            {
                "label": "Activation Energy & Catalysts",
                "text": "Reactions need an initial spark of energy (Ea) to start; catalysts speed up reactions by lowering this energy hill."
            }
        ],
        "example": "Standard Analysis: 'The complete combustion of methane (CH4 + 2O2 &rarr; CO2 + 2H2O) releases &Delta;H = -890 kJ/mol of exothermic heat. The strong C=O and O-H bonds formed in the products store less potential energy than the reactant bonds, driving the reaction forward spontaneously with negative Gibbs free energy (&Delta;G < 0).'",
        "basicExample": "Simple Sentence: 'When you mix baking soda (a solid powder) and vinegar (a liquid), bubbles of carbon dioxide gas shoot up instantly, proving a chemical reaction took place.'",
        "proTip": "Watch for the 4 Clues of a Chemical Change: 1) Color change; 2) Gas bubbles forming; 3) Temperature change (getting hot or cold); 4) A solid powder (precipitate) settling out of clear liquids!",
        "question": "What must always be conserved and equal on both sides of a balanced chemical equation?",
        "choices": [
            "The total number of molecules",
            "The total number of atoms of each element",
            "The physical state (solid/liquid/gas)"
        ],
        "correctIndex": 1,
        "explanation": "The Law of Conservation of Mass requires that the number of atoms of each element be identical before and after the reaction.",
        "equations": [
            {
                "title": "Arrhenius Chemical Kinetic Rate Law",
                "latex": "k = A e^{-\\frac{E_a}{RT}} \\quad (E_a = \\text{Activation Energy}, \\, T = \\text{Absolute Temperature})",
                "note": "Relates chemical reaction rate constant k to temperature and the exponential activation energy barrier."
            },
            {
                "title": "Hess's Law of Standard Reaction Enthalpy",
                "latex": "\\Delta H^\\circ_{\\text{rxn}} = \\sum n \\Delta H^\\circ_f(\\text{Products}) - \\sum m \\Delta H^\\circ_f(\\text{Reactants})",
                "note": "Net thermal enthalpy change during bond breaking (endothermic) and bond formation (exothermic)."
            },
            {
                "title": "Gibbs Free Energy Reaction Spontaneity Criterion",
                "latex": "\\Delta G = \\Delta H - T\\Delta S \\implies \\begin{cases} < 0 & \\text{Spontaneous (Exergonic)} \\ > 0 & \\text{Non-Spontaneous (Endergonic)} \\end{cases}",
                "note": "Thermodynamic potential governing whether a chemical transformation proceeds without external work."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Chemical Reaction Activation Energy and Catalysis Coordinate Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><line x1='50' y1='165' x2='420' y2='165' stroke='#64748b' stroke-width='2' stroke-linecap='round'/><line x1='50' y1='165' x2='50' y2='30' stroke='#64748b' stroke-width='2' stroke-linecap='round'/><text x='45' y='25' fill='#475569' font-size='9' font-weight='bold'>Potential Energy (kJ) &rarr;</text><text x='380' y='180' fill='#475569' font-size='9' font-weight='bold'>Reaction Progress &rarr;</text><path d='M 60 110 L 120 110 C 170 110, 190 40, 230 40 C 270 40, 290 145, 340 145 L 410 145' fill='none' stroke='#ef4444' stroke-width='2.5'/><text x='90' y='100' fill='#1e40af' font-size='10' font-weight='bold'>Reactants</text><text x='375' y='135' fill='#047857' font-size='10' font-weight='bold'>Products</text><path d='M 120 110 C 170 110, 190 75, 230 75 C 270 75, 290 145, 340 145' fill='none' stroke='#10b981' stroke-width='2.5' stroke-dasharray='4 4'/><text x='230' y='30' fill='#b91c1c' font-size='9' font-weight='bold' text-anchor='middle'>Uncatalyzed Ea Peak</text><text x='230' y='92' fill='#047857' font-size='9' font-weight='bold' text-anchor='middle'>Catalyzed Pathway (Lower Ea)</text><line x1='410' y1='110' x2='410' y2='145' stroke='#3b82f6' stroke-width='2'/><text x='415' y='130' fill='#1e40af' font-size='9' font-weight='bold'>&Delta;H &lt; 0 (Exothermic)</text><text x='230' y='193' fill='#475569' font-size='8' font-weight='bold' text-anchor='middle'>Catalysts Accelerate Kinetics by Lowering Activation Energy &#x2713;</text></svg>",
        "diagramLabel": "Chemical reaction activation energy and catalysis coordinate diagram",
        "diagramCaption": "Reaction Energy Profile: An exothermic reaction coordinate showing how catalysts lower the activation energy barrier (Ea) without altering net enthalpy (&Delta;H).",
        "references": [
            {"title": "NGSS Standard HS-PS1-7 (Conservation of Mass in Reactions)", "desc": "Use mathematical representations to support the claim that atoms, and therefore mass, are conserved during a chemical reaction.", "url": "/pages/standards.php?domain=SCIENCE-PS", "icon": "fas fa-award"},
            {"title": "American Chemical Society (ACS): Chemistry in Context", "desc": "Authoritative educational resources on stoichiometry, kinetics, and chemical transformations.", "url": "https://www.acs.org/", "icon": "fas fa-university"},
            {"title": "ChemGuide UK: Reaction Kinetics and Catalysis", "desc": "In-depth guide to collision theory, activation energy barriers, and Maxwell-Boltzmann distributions.", "url": "https://www.chemguide.co.uk/", "icon": "fas fa-fire"}
        ]
    },
    "Acids and Bases": {
        "category": "Chemistry Resources",
        "definition": "Acid-base chemistry describes chemical equilibria governing proton (H+) and electron-pair exchange across aqueous solutions. Theoretical frameworks encompass: Arrhenius (acids yield aqueous H+; bases yield OH-); Brønsted-Lowry (acids are proton donors; bases are proton acceptors, forming conjugate pairs); and Lewis (acids are electron-pair acceptors; bases are electron-pair donors). The concentration of hydronium ions is quantified along the logarithmic pH scale (pH = -log[H3O+]). Strong acids and bases dissociate completely in water, whereas weak species establish reversible equilibrium governed by acid dissociation constants (Ka), stabilized in living organisms via buffer systems.",
        "basicDefinition": "Acids and bases are two opposite chemical groups. Acids taste sour, turn litmus paper red, and have a pH below 7 (like lemon juice and stomach acid). Bases taste bitter, feel slippery, and have a pH above 7 (like soap and bleach). Pure water is completely neutral at pH 7.",
        "breakdown": [
            {
                "label": "The Logarithmic pH Scale",
                "text": "Ranges from 0 to 14. pH 7 is neutral; pH < 7 is acidic; pH > 7 is basic. Every whole unit is a 10-fold change in acidity!"
            },
            {
                "label": "Brønsted-Lowry Proton Transfer",
                "text": "Acids donate hydrogen ions (H+); Bases accept hydrogen ions. Mixing an acid and base neutralizes them into salt and water."
            },
            {
                "label": "Biological Buffer Systems",
                "text": "Buffers resist rapid changes in pH (e.g., the bicarbonate buffer in human blood holding pH steady at 7.4)."
            }
        ],
        "example": "Standard Analysis: 'Mixing equimolar hydrochloric acid (HCl, strong acid) and sodium hydroxide (NaOH, strong base) results in a stoichiometric neutralization reaction: HCl + NaOH &rarr; NaCl + H2O. The hydronium (H3O+) and hydroxide (OH-) ions combine to produce neutral water with pH = 7.0 at 25&deg;C.'",
        "basicExample": "Simple Sentence: 'Stomach acid has a very low pH around 1.5 to digest food, but taking an antacid (a mild base) neutralizes the acid to relieve heartburn.'",
        "proTip": "Remember the 10x Power of pH! Because pH is logarithmic, a solution with pH 3 is NOT twice as acidic as pH 5—it is 10 &times; 10 = 100 times more acidic! That is why even small pH changes in nature can be dangerous for aquatic life.",
        "question": "What is the pH of a completely neutral aqueous solution at 25°C?",
        "choices": [
            "pH 0",
            "pH 7",
            "pH 14"
        ],
        "correctIndex": 1,
        "explanation": "At 25°C, neutral pure water has equal hydronium and hydroxide concentrations ([H3O+] = [OH-] = 1.0 x 10^-7 M), corresponding to pH = 7.0.",
        "equations": [
            {
                "title": "Logarithmic Hydronium pH Definition",
                "latex": "\\text{pH} = -\\log_{10}[\\text{H}_3\\text{O}^+] \\quad \\text{and} \\quad \\text{pOH} = -\\log_{10}[\\text{OH}^-]",
                "note": "Quantifies aqueous hydrogen ion activity on a logarithmic scale spanning 14 orders of magnitude."
            },
            {
                "title": "Water Self-Ionization Ion-Product Constant",
                "latex": "K_w = [\\text{H}_3\\text{O}^+][\\text{OH}^-] = 1.0 \\times 10^{-14} \\implies \\text{pH} + \\text{pOH} = 14.0 \\quad (25^\\circ\\text{C})",
                "note": "Fundamental autoionization thermodynamic equilibrium governing all aqueous chemistry."
            },
            {
                "title": "Henderson-Hasselbalch Buffer Equation",
                "latex": "\\text{pH} = \\text{p}K_a + \\log_{10}\\left(\\frac{[\\text{A}^-]}{[\\text{HA}]}\\right) \\quad (\\text{Conjugate Base / Weak Acid Buffer})",
                "note": "Calculates buffer solution pH and buffering capacity against incoming acidic or alkaline stress."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='The 0 to 14 Logarithmic pH Spectrum Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='65' width='410' height='40' rx='6' fill='url(#phGrad)' stroke='#64748b' stroke-width='1.5'/><defs><linearGradient id='phGrad' x1='0%' y1='0%' x2='100%' y2='0%'><stop offset='0%' stop-color='#ef4444'/><stop offset='25%' stop-color='#f59e0b'/><stop offset='50%' stop-color='#10b981'/><stop offset='75%' stop-color='#3b82f6'/><stop offset='100%' stop-color='#8b5cf6'/></linearGradient></defs><line x1='25' y1='65' x2='25' y2='115' stroke='#1e293b' stroke-width='2'/><text x='25' y='55' fill='#b91c1c' font-size='10' font-weight='bold' text-anchor='middle'>pH 0</text><line x1='127' y1='65' x2='127' y2='115' stroke='#1e293b' stroke-width='1.5'/><text x='127' y='55' fill='#b45309' font-size='10' font-weight='bold' text-anchor='middle'>pH 3.5</text><line x1='230' y1='60' x2='230' y2='120' stroke='#065f46' stroke-width='3'/><text x='230' y='50' fill='#065f46' font-size='11' font-weight='bold' text-anchor='middle'>pH 7.0 (NEUTRAL)</text><line x1='332' y1='65' x2='332' y2='115' stroke='#1e293b' stroke-width='1.5'/><text x='332' y='55' fill='#1d4ed8' font-size='10' font-weight='bold' text-anchor='middle'>pH 10.5</text><line x1='435' y1='65' x2='435' y2='115' stroke='#1e293b' stroke-width='2'/><text x='435' y='55' fill='#6d28d9' font-size='10' font-weight='bold' text-anchor='middle'>pH 14</text><text x='65' y='140' fill='#b91c1c' font-size='9' font-weight='bold'>Battery Acid &bull; Lemon Juice</text><text x='230' y='140' fill='#065f46' font-size='9' font-weight='bold' text-anchor='middle'>Pure Water &bull; Blood (7.4)</text><text x='390' y='140' fill='#6d28d9' font-size='9' font-weight='bold' text-anchor='middle'>Soap &bull; Bleach</text><text x='25' y='175' fill='#b91c1c' font-size='10' font-weight='bold'>&larr; HIGHLY ACIDIC [H+]</text><text x='435' y='175' fill='#6d28d9' font-size='10' font-weight='bold' text-anchor='end'>HIGHLY BASIC [OH-] &rarr;</text><text x='230' y='193' fill='#475569' font-size='8' font-weight='bold' text-anchor='middle'>Logarithmic pH Scale: 10-Fold Change in Hydronium per Integer Unit &#x2713;</text></svg>",
        "diagramLabel": "The 0 to 14 logarithmic pH spectrum diagram",
        "diagramCaption": "The Logarithmic pH Scale: Visualizing acidic, neutral, and alkaline solutions with color-coded universal chemical indicators.",
        "references": [
            {"title": "NGSS Standard HS-PS1-5 (Chemical Equilibrium and pH)", "desc": "Apply scientific principles and evidence to provide an explanation about the effects of changing conditions on chemical equilibrium.", "url": "/pages/standards.php?domain=SCIENCE-PS", "icon": "fas fa-award"},
            {"title": "American Chemical Society (ACS): Acids & Bases Chemistry", "desc": "Educational explorations of proton transfer, pH calculations, and neutralization reactions.", "url": "https://www.acs.org/", "icon": "fas fa-university"},
            {"title": "ChemTube3D: Interactive Acid-Base Titrations", "desc": "Visual 3D molecular structures and simulation models of acid-base buffer mechanisms.", "url": "https://www.chemtube3d.com/", "icon": "fas fa-vial"}
        ]
    },
    "Organic Chemistry Basics": {
        "category": "Chemistry Resources",
        "definition": "Organic chemistry is the scientific discipline dedicated to the structure, properties, and reactions of carbon-based covalent compounds. Carbon's singular capacity for catenation (forming stable chains and rings) arises from its tetravalent electronic configuration (2s2 2p2), facilitating sp3, sp2, and sp orbital hybridization. Core structural classes include aliphatic hydrocarbons: Alkanes (single C-C bonds, saturated), Alkenes (double C=C bonds, unsaturated), and Alkynes (triple C&equiv;C bonds). Biochemical functionality is determined by functional groups: Hydroxyl (-OH, alcohols), Carbonyl (C=O, aldehydes/ketones), Carboxyl (-COOH, organic acids), and Amino (-NH2, amines).",
        "basicDefinition": "Organic chemistry is the study of carbon molecules. Because carbon can form four strong bonds at once, it can build endless shapes—like long chains and rings—that make up all living plants and animals, vitamins, fuels, and medicines.",
        "breakdown": [
            {
                "label": "Carbon's Tetravalent Superpower",
                "text": "Carbon has 4 outer valence electrons, allowing it to form 4 strong covalent bonds with other atoms in 3D tetrahedral shapes."
            },
            {
                "label": "Hydrocarbon Families",
                "text": "Alkanes have single bonds (methane, propane); Alkenes have double bonds (ethylene); Alkynes have triple bonds (acetylene)."
            },
            {
                "label": "Biological Functional Groups",
                "text": "Hydroxyl (-OH) in sugars; Carboxyl (-COOH) and Amino (-NH2) in amino acids that fold into life-sustaining proteins."
            }
        ],
        "example": "Standard Analysis: 'In biochemistry, amino acids combine through condensation polymerization: the nucleophilic amino group (-NH2) attacks the carbonyl carbon of a carboxyl group (-COOH), releasing water and forming a planar, resonant peptide bond (-CO-NH-) that builds protein primary structures.'",
        "basicExample": "Simple Sentence: 'Methane (CH4) is the simplest organic molecule, made of one carbon atom holding hands with four hydrogen atoms. It is the natural gas used to cook food on gas stoves.'",
        "proTip": "Remember the HONC Rule for Organic Bonds: H needs 1 bond, O needs 2 bonds, N needs 3 bonds, and C needs 4 bonds! Memorizing 'H-O-N-C = 1-2-3-4' helps you check any organic Lewis structure instantly!",
        "question": "How many covalent bonds does a neutral carbon atom form in stable organic molecules?",
        "choices": [
            "2 bonds",
            "4 bonds",
            "6 bonds"
        ],
        "correctIndex": 1,
        "explanation": "Carbon is tetravalent, possessing 4 valence electrons and requiring 4 shared electron pairs to complete its stable octet.",
        "equations": [
            {
                "title": "Aliphatic Hydrocarbon Homologous Series Formula",
                "latex": "\\begin{cases} \\text{Alkane (Single Bonds)} & \\text{C}_n\\text{H}_{2n+2} \\ \\text{Alkene (Double Bond)} & \\text{C}_n\\text{H}_{2n} \\ \\text{Alkyne (Triple Bond)} & \\text{C}_n\\text{H}_{2n-2} \\end{cases}",
                "note": "General stoichiometric molecular formulas for straight-chain aliphatic hydrocarbon families."
            },
            {
                "title": "Methane Tetrahedral Valence Bond Angle",
                "latex": "\\theta_{\\text{sp}^3} = 109.5^\\circ \\quad (\\text{Tetrahedral VSEPR Minimum Electron Repulsion})",
                "note": "Optimal geometric bond angle in sp3-hybridized carbon minimizing inter-orbital electron repulsion."
            },
            {
                "title": "Peptide Condensation Polymerization Reaction",
                "latex": "\\text{R}_1\\text{--COOH} + \\text{H}_2\\text{N--R}_2 \\xrightarrow{-\\text{H}_2\\text{O}} \\text{R}_1\\text{--CO--NH--R}_2 \\quad (\\text{Peptide Amide Linkage})",
                "note": "Dehydration synthesis linking amino acid monomers into macroscopic protein polypeptide chains."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Organic Chemistry Tetrahedral Carbon and Functional Groups Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='190' height='145' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='120' y='46' fill='#1e40af' font-size='11' font-weight='bold' text-anchor='middle'>TETRAHEDRAL CARBON (CH4)</text><circle cx='120' cy='95' r='14' fill='#334155'/><text x='120' y='99' fill='#ffffff' font-size='10' font-weight='bold' text-anchor='middle'>C</text><line x1='120' y1='81' x2='120' y2='58' stroke='#1e40af' stroke-width='2'/><circle cx='120' cy='55' r='8' fill='#ffffff' stroke='#1e40af'/><text x='120' y='58' fill='#1e40af' font-size='8' font-weight='bold' text-anchor='middle'>H</text><line x1='108' y1='102' x2='85' y2='125' stroke='#1e40af' stroke-width='2'/><circle cx='80' cy='128' r='8' fill='#ffffff' stroke='#1e40af'/><text x='80' y='131' fill='#1e40af' font-size='8' font-weight='bold' text-anchor='middle'>H</text><line x1='132' y1='102' x2='155' y2='125' stroke='#1e40af' stroke-width='2'/><circle cx='160' cy='128' r='8' fill='#ffffff' stroke='#1e40af'/><text x='160' y='131' fill='#1e40af' font-size='8' font-weight='bold' text-anchor='middle'>H</text><line x1='120' y1='109' x2='120' y2='135' stroke='#1e40af' stroke-width='3' stroke-dasharray='2 2'/><circle cx='120' cy='140' r='8' fill='#ffffff' stroke='#1e40af'/><text x='120' y='143' fill='#1e40af' font-size='8' font-weight='bold' text-anchor='middle'>H</text><text x='120' y='160' fill='#1e3a8a' font-size='9' font-weight='bold' text-anchor='middle'>sp3 Hybridized &bull; 109.5&deg; Angles</text><rect x='245' y='25' width='190' height='145' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='340' y='46' fill='#92400e' font-size='11' font-weight='bold' text-anchor='middle'>CORE FUNCTIONAL GROUPS</text><rect x='260' y='60' width='160' height='26' rx='4' fill='#ffffff' stroke='#d97706'/><text x='340' y='77' fill='#b45309' font-size='9' font-weight='bold' text-anchor='middle'>Hydroxyl: &minus;OH (Alcohols / Sugars)</text><rect x='260' y='92' width='160' height='26' rx='4' fill='#ffffff' stroke='#d97706'/><text x='340' y='109' fill='#b45309' font-size='9' font-weight='bold' text-anchor='middle'>Carboxyl: &minus;COOH (Organic Acids)</text><rect x='260' y='124' width='160' height='26' rx='4' fill='#ffffff' stroke='#d97706'/><text x='340' y='141' fill='#b45309' font-size='9' font-weight='bold' text-anchor='middle'>Amino: &minus;NH2 (Protein Monomers)</text><text x='340' y='160' fill='#166534' font-size='8' font-weight='bold' text-anchor='middle'>HONC Rule: H-1, O-2, N-3, C-4 &#x2713;</text><text x='230' y='188' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Tetravalent Carbon Forms the Backbone of All Organic Chemistry &#x2713;</text></svg>",
        "diagramLabel": "Organic chemistry tetrahedral carbon and functional groups diagram",
        "diagramCaption": "Organic Chemistry Fundamentals: The tetravalent sp3 carbon atom (109.5° angles) and key functional groups (hydroxyl, carboxyl, amino) forming biomacromolecules.",
        "references": [
            {"title": "NGSS Standard HS-PS1-2 (Carbon Chemistry and Bonding)", "desc": "Construct and revise an explanation for the outcome of a simple chemical reaction based on the outermost electron states of atoms.", "url": "/pages/standards.php?domain=SCIENCE-PS", "icon": "fas fa-award"},
            {"title": "American Chemical Society (ACS): Organic Chemistry Division", "desc": "Authoritative taxonomy of organic reaction mechanisms, synthesis, and molecular geometry.", "url": "https://www.acs.org/", "icon": "fas fa-university"},
            {"title": "Master Organic Chemistry: Visual Reaction Roadmaps", "desc": "Comprehensive functional group tutorials, resonance structures, and reaction mechanisms.", "url": "https://www.masterorganicchemistry.com/", "icon": "fas fa-flask"}
        ]
    }

,
    // --- PHYSICS RESOURCES ---
    "Mechanics": {
        "category": "Physics Resources",
        "definition": "Classical Newtonian mechanics is the branch of physics examining the kinematics and dynamics of macroscopic physical bodies subjected to forces. Formulated in Isaac Newton's 1687 Principia Mathematica, mechanics is governed by Three Laws: 1) Law of Inertia (objects maintain velocity unless acted upon by a net external force); 2) Fundamental Dynamic Law (&Sigma;F = ma = dp/dt); and 3) Action-Reaction Law (FAB = -FBA). Mechanical energy is partitioned into kinetic energy of motion (KE = 1/2 mv^2) and potential energy of field position (PE = mgh). In isolated conservative systems, total mechanical energy and linear/angular momentum remain invariant.",
        "basicDefinition": "Mechanics is the physics of how things move and why they move. It explains how forces like gravity, friction, and pushes make objects speed up, slow down, turn, or stay completely still, governed by Sir Isaac Newton's three famous laws of motion.",
        "breakdown": [
            {
                "label": "Newton's 3 Laws of Motion",
                "text": "1st: Inertia (rest stays at rest); 2nd: Force equals mass &times; acceleration (F = ma); 3rd: Equal and opposite reaction forces."
            },
            {
                "label": "Work-Energy Theorem",
                "text": "Work done by net forces equals the change in kinetic energy (W = &Delta;KE). Energy cannot be created or destroyed, only transformed."
            },
            {
                "label": "Mass vs. Weight",
                "text": "Mass (kg) is the constant measure of matter/inertia; Weight (N) is the gravitational force pulling downward (W = mg)."
            }
        ],
        "example": "Standard Analysis: 'A 1,200 kg vehicle braking from 20 m/s to a full stop over 40 m undergoes uniform acceleration a = -5.0 m/s^2. By Newton's Second Law, the tires and brakes generate a net frictional retarding force of F = ma = (1,200 kg)(-5.0 m/s^2) = -6,000 N, dissipating 240 kJ of kinetic energy as thermal friction.'",
        "basicExample": "Simple Sentence: 'If you push an empty shopping cart, it speeds up easily because it has small mass; but if you fill it with heavy groceries, you must push much harder to get the same acceleration (F = ma).'",
        "proTip": "Remember: Mass is NOT Weight! Your mass is the actual physical stuff in your body (in kilograms) and is identical on Earth, the Moon, or in deep space. Your weight is the downward pull of gravity and changes depending on what planet you are standing on!",
        "question": "According to Newton's Second Law of Motion, what happens to the acceleration of an object if the net applied force is doubled while mass remains constant?",
        "choices": [
            "Acceleration is halved",
            "Acceleration is doubled",
            "Acceleration remains unchanged"
        ],
        "correctIndex": 1,
        "explanation": "Because a = F / m, acceleration is directly proportional to net force; doubling the force doubles the acceleration.",
        "equations": [
            {
                "title": "Newton's Second Law of Translational Dynamics",
                "latex": "\\Sigma \\vec{F} = m\\vec{a} = \\frac{d\\vec{p}}{dt} \\quad (\\text{Net Force} = \\text{Mass} \\times \\text{Acceleration})",
                "note": "Net unbalanced force accelerates mass in the direction of the vector sum of all applied forces."
            },
            {
                "title": "Constant-Acceleration Kinematic Invariant",
                "latex": "v_f^2 = v_i^2 + 2a\\Delta x \\quad (\\text{Velocity-Displacement Relation without Time Parameter})",
                "note": "Derived from work-energy integration under uniform gravitational or frictional acceleration."
            },
            {
                "title": "Conservation of Mechanical Energy Theorem",
                "latex": "E_{\\text{total}} = KE + PE = \\frac{1}{2}mv^2 + mgh = \\text{constant} \\quad (\\text{Conservative Field})",
                "note": "In the absence of non-conservative friction, gravitational potential converts losslessly into kinetic velocity."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Newtonian Mechanics Free Body Diagram and Energy Curve'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='190' height='145' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='120' y='46' fill='#1e40af' font-size='11' font-weight='bold' text-anchor='middle'>FREE BODY FORCE DIAGRAM</text><line x1='40' y1='120' x2='200' y2='120' stroke='#64748b' stroke-width='2'/><rect x='95' y='80' width='50' height='40' fill='#ffffff' stroke='#1e40af' stroke-width='2'/><text x='120' y='105' fill='#1e40af' font-size='10' font-weight='bold' text-anchor='middle'>Mass</text><path d='M 120 80 L 120 50' stroke='#10b981' stroke-width='2' marker-end='url(#arrow)'/><text x='130' y='55' fill='#047857' font-size='8' font-weight='bold'>Normal FN</text><path d='M 120 120 L 120 155' stroke='#ef4444' stroke-width='2' marker-end='url(#arrow)'/><text x='130' y='150' fill='#b91c1c' font-size='8' font-weight='bold'>Weight mg</text><path d='M 145 100 L 180 100' stroke='#3b82f6' stroke-width='2' marker-end='url(#arrow)'/><text x='165' y='92' fill='#1d4ed8' font-size='8' font-weight='bold'>Fapplied</text><path d='M 95 100 L 65 100' stroke='#d97706' stroke-width='2' marker-end='url(#arrow)'/><text x='70' y='92' fill='#b45309' font-size='8' font-weight='bold'>Ffriction</text><rect x='245' y='25' width='190' height='145' rx='6' fill='#dcfce7' stroke='#166534' stroke-width='1.5'/><text x='340' y='46' fill='#166534' font-size='11' font-weight='bold' text-anchor='middle'>CONSERVATION OF ENERGY</text><path d='M 265 65 Q 340 160 415 65' fill='none' stroke='#16a34a' stroke-width='3'/><circle cx='265' cy='65' r='8' fill='#ef4444'/><text x='265' y='52' fill='#b91c1c' font-size='8' font-weight='bold' text-anchor='middle'>Max PE (mgh)</text><circle cx='340' cy='135' r='8' fill='#3b82f6'/><text x='340' y='155' fill='#1e40af' font-size='8' font-weight='bold' text-anchor='middle'>Max KE (1/2 mv&sup2;)</text><circle cx='415' cy='65' r='8' fill='#ef4444'/><text x='415' y='52' fill='#b91c1c' font-size='8' font-weight='bold' text-anchor='middle'>PE Restored</text><text x='230' y='188' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Classical Newtonian Mechanics and Gravitational Energy Conservation &#x2713;</text></svg>",
        "diagramLabel": "Newtonian mechanics free body diagram and energy curve",
        "diagramCaption": "Classical Mechanics: Free-body force vectors (&Sigma;F = ma) and gravitational potential to kinetic energy conversion on a conservative track.",
        "references": [
            {"title": "NGSS Standard HS-PS2-1 (Newton's Laws & Forces)", "desc": "Analyze data to support the claim that Newton's second law of motion describes the mathematical relationship among net force, mass, and acceleration.", "url": "/pages/standards.php?domain=SCIENCE-PS", "icon": "fas fa-award"},
            {"title": "The Physics Classroom: Classical Mechanics", "desc": "Interactive tutorials on 1D/2D kinematics, Newton's laws, vectors, and work-energy theorem.", "url": "https://www.physicsclassroom.com/class/newtlaws", "icon": "fas fa-university"},
            {"title": "MIT OpenCourseWare: Classical Mechanics (Physics 8.01)", "desc": "Foundational university lecture series on translational momentum, rotational inertia, and gravitation.", "url": "https://ocw.mit.edu/courses/8-01sc-classical-mechanics-fall-2016/", "icon": "fas fa-atom"}
        ]
    },
    "Electricity & Magnetism": {
        "category": "Physics Resources",
        "definition": "Electromagnetism is the fundamental physical force governing interactions between electrically charged particles, unified by James Clerk Maxwell in classical field theory. Stationary charges produce electrostatic fields governed by Coulomb's Law, while moving charges (currents I) establish magnetic fields (B) described by the Biot-Savart Law. In electric circuits, Ohm's Law (V = IR) and Kirchhoff's loop/junction rules determine electrical flow. Faraday's Law of Induction demonstrates that time-varying magnetic flux induces electromotive force (EMF) and electric currents, providing the physical foundation for electric motors, transformers, and dynamos.",
        "basicDefinition": "Electricity is the flow of electric charges through wires to power our lights, phones, and computers. Magnetism is the invisible force around magnets that pushes or pulls metals. Together, they create electromagnetism, which turns spinning generators into electrical power.",
        "breakdown": [
            {
                "label": "Ohm's Law (V = IR)",
                "text": "Voltage (V, volts) is electrical pressure; Current (I, amps) is the flow rate of charge; Resistance (R, ohms) opposes flow."
            },
            {
                "label": "Series vs. Parallel Circuits",
                "text": "Series circuits have 1 shared loop (1 bulb breaks, all go out); Parallel circuits have independent branches (household wiring)."
            },
            {
                "label": "Faraday Electromagnetic Induction",
                "text": "Moving a magnet through a copper coil pushes electrons, turning mechanical motion into electricity."
            }
        ],
        "example": "Standard Analysis: 'A 120 V household parallel circuit powering a 1,200 W microwave draws an electric current of I = P / V = 1,200 W / 120 V = 10 A. By Ohm's Law, the internal operating resistance of the appliance is R = V / I = 120 V / 10 A = 12 &Omega;, dissipating energy as Joule heating.'",
        "basicExample": "Simple Sentence: 'A 9-volt battery pushes electric current through a wire to light a small lightbulb. If you flip the switch open, the circuit breaks and the light turns off.'",
        "proTip": "Think of Electricity like Water in a Garden Hose! Voltage is the water pressure from the faucet; Current is the gallons of water spraying per minute; Resistance is putting your thumb over the hose to squeeze the stream!",
        "question": "If a circuit with a power source of 12 Volts has an electric current of 3 Amperes flowing through it, what is its electrical resistance?",
        "choices": [
            "4 Ohms",
            "36 Ohms",
            "0.25 Ohms"
        ],
        "correctIndex": 0,
        "explanation": "Applying Ohm's Law (R = V / I), Resistance = 12 V / 3 A = 4 Ohms.",
        "equations": [
            {
                "title": "Ohm's Law and Joule Heating Dissipation",
                "latex": "V = IR \\quad \\text{and} \\quad P = IV = I^2 R = \\frac{V^2}{R} \\quad (\\text{Electrical Potential, Current, Power})",
                "note": "Empirical constitutive relation governing current density and thermal power loss in ohmic conductors."
            },
            {
                "title": "Coulomb's Law of Electrostatic Force",
                "latex": "F_e = k_e \\frac{|q_1 q_2|}{r^2} \\quad (k_e = 8.99 \\times 10^9 \\,\\text{N}\\cdot\\text{m}^2/\\text{C}^2)",
                "note": "Inverse-square electrostatic force vector between two localized point charges in vacuum."
            },
            {
                "title": "Faraday-Lenz Law of Electromagnetic Induction",
                "latex": "\\mathcal{E} = -\\frac{d\\Phi_B}{dt} = -N \\frac{d(B A \\cos\\theta)}{dt} \\quad (\\text{Induced Electromotive Force})",
                "note": "A changing magnetic flux through a conducting loop induces an opposing electromotive force."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Electric Circuit Schematics and Magnetic Field Induction Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='190' height='145' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='120' y='46' fill='#1e40af' font-size='11' font-weight='bold' text-anchor='middle'>PARALLEL CIRCUIT (12V)</text><line x1='50' y1='75' x2='190' y2='75' stroke='#3b82f6' stroke-width='2'/><line x1='50' y1='145' x2='190' y2='145' stroke='#3b82f6' stroke-width='2'/><line x1='50' y1='75' x2='50' y2='145' stroke='#3b82f6' stroke-width='2'/><line x1='190' y1='75' x2='190' y2='145' stroke='#3b82f6' stroke-width='2'/><line x1='50' y1='105' x2='50' y2='115' stroke='#ef4444' stroke-width='4'/><text x='42' y='113' fill='#b91c1c' font-size='9' font-weight='bold'>12V</text><line x1='110' y1='75' x2='110' y2='145' stroke='#10b981' stroke-width='2'/><circle cx='110' cy='110' r='12' fill='#ffffff' stroke='#10b981' stroke-width='2'/><text x='110' y='114' fill='#047857' font-size='8' font-weight='bold' text-anchor='middle'>Bulb 1</text><circle cx='190' cy='110' r='12' fill='#ffffff' stroke='#10b981' stroke-width='2'/><text x='190' y='114' fill='#047857' font-size='8' font-weight='bold' text-anchor='middle'>Bulb 2</text><text x='120' y='160' fill='#1e3a8a' font-size='8' font-weight='bold' text-anchor='middle'>Parallel: Independent Current Branches &#x2713;</text><rect x='245' y='25' width='190' height='145' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='340' y='46' fill='#92400e' font-size='11' font-weight='bold' text-anchor='middle'>FARADAY INDUCTION</text><rect x='265' y='95' width='55' height='25' fill='#ef4444'/><text x='292' y='111' fill='#ffffff' font-size='9' font-weight='bold' text-anchor='middle'>N (Magnet)</text><rect x='320' y='95' width='35' height='25' fill='#3b82f6'/><text x='337' y='111' fill='#ffffff' font-size='9' font-weight='bold' text-anchor='middle'>S</text><path d='M 355 107 L 390 107' stroke='#d97706' stroke-width='2' marker-end='url(#arrow)'/><ellipse cx='390' cy='107' rx='15' ry='30' fill='none' stroke='#b45309' stroke-width='2.5'/><ellipse cx='405' cy='107' rx='15' ry='30' fill='none' stroke='#b45309' stroke-width='2.5'/><text x='340' y='155' fill='#92400e' font-size='8' font-weight='bold' text-anchor='middle'>Moving Magnet Induces Current in Coil &rarr;</text><text x='230' y='188' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Ohmic Circuit Dynamics and Electromagnetic Field Induction &#x2713;</text></svg>",
        "diagramLabel": "Electric circuit schematics and magnetic field induction diagram",
        "diagramCaption": "Electromagnetism: Parallel electrical circuits featuring independent current branches alongside Faraday induction generating EMF from magnetic flux changes.",
        "references": [
            {"title": "NGSS Standard HS-PS3-5 (Electric & Magnetic Fields)", "desc": "Develop and use a model of two objects interacting through electric or magnetic fields to illustrate forces and energy.", "url": "/pages/standards.php?domain=SCIENCE-PS", "icon": "fas fa-award"},
            {"title": "PhET Interactive Simulations: Circuit Construction Kit", "desc": "University of Colorado Boulder's virtual lab for exploring Ohm's Law, circuits, and induction.", "url": "https://phet.colorado.edu/en/simulations/circuit-construction-kit-dc", "icon": "fas fa-university"},
            {"title": "IEEE Educational Activities: Electricity & Magnetism", "desc": "Institute of Electrical and Electronics Engineers resources on transformers, motors, and circuits.", "url": "https://www.ieee.org/education/", "icon": "fas fa-bolt"}
        ]
    },
    "Waves & Optics": {
        "category": "Physics Resources",
        "definition": "Waves and optics examine the propagation of disturbance and energy transport through physical media and vacuum without mass translation. Waves classify as Mechanical (requiring matter, e.g., acoustic compressions) or Electromagnetic (self-propagating orthogonal E and B oscillations traveling at c = 3.0 x 10^8 m/s in vacuum). Wave parameters follow the fundamental relation v = f&lambda;. Key boundary and interference phenomena include Reflection (angle of incidence equals angle of reflection), Refraction (Snell's Law: n1 sin&theta;1 = n2 sin&theta;2), Diffraction, Constructive/Destructive Interference, and the Doppler frequency shift.",
        "basicDefinition": "Waves carry energy from one spot to another. Sound waves are vibrations traveling through air that our ears hear, while light waves are fast electromagnetic waves that allow our eyes to see colors. When light enters glass or water, it slows down and bends—a trick called refraction.",
        "breakdown": [
            {
                "label": "The Wave Equation (v = f&lambda;)",
                "text": "Wave speed (v) equals frequency (f, vibrations per second in Hertz) multiplied by wavelength (&lambda;, peak-to-peak distance)."
            },
            {
                "label": "Transverse vs. Longitudinal Waves",
                "text": "Transverse waves wiggle up-and-down perpendicular to travel (light, water ripples); Longitudinal waves push back-and-forth (sound)."
            },
            {
                "label": "Reflection & Refraction",
                "text": "Reflection bounces waves off mirrors; Refraction bends light waves as they change speed entering glass or water (Snell's Law)."
            }
        ],
        "example": "Standard Analysis: 'Yellow laser light (&lambda; = 589 nm) incident from air (n1 = 1.00) into flint glass (n2 = 1.62) at an angle of 30&deg; slows from 3.0 x 10^8 m/s to 1.85 x 10^8 m/s. By Snell's Law, the angle of refraction bends toward the normal: &theta;2 = arcsin[(1.00 / 1.62) sin(30&deg;)] = 18.0&deg;.'",
        "basicExample": "Simple Sentence: 'When you put a drinking straw into a clear glass of water, the straw looks cut in half or bent because light waves slow down and bend when passing through water.'",
        "proTip": "Remember the Inverse Frequency-Wavelength Rule! Because the speed of light is fixed (c = 300,000 km/s), high-frequency waves (like ultraviolet and X-rays) have ultra-short wavelengths and high energy, while low-frequency waves (like radio waves) have long wavelengths!",
        "question": "What happens to the wavelength of a light wave if its frequency doubles while traveling through the same medium at constant wave speed?",
        "choices": [
            "Wavelength is halved",
            "Wavelength is doubled",
            "Wavelength remains unchanged"
        ],
        "correctIndex": 0,
        "explanation": "Because v = f &lambda;, wave speed is constant in a given medium; doubling frequency cuts the wavelength in half.",
        "equations": [
            {
                "title": "Fundamental Wave Propagation Equation",
                "latex": "v = f\\lambda = \\frac{\\lambda}{T} \\quad (v = \\text{Wave Speed}, \\, f = \\text{Frequency}, \\, \\lambda = \\text{Wavelength})",
                "note": "Universal kinematic relation linking phase velocity, temporal frequency, and spatial wavelength."
            },
            {
                "title": "Snell's Law of Optical Refraction",
                "latex": "n_1 \\sin\\theta_1 = n_2 \\sin\\theta_2 \\quad \\left(n = \\frac{c}{v} = \\text{Refractive Index}\\right)",
                "note": "Determines angular ray deviation at optical dielectric interfaces from Fermat's principle of least time."
            },
            {
                "title": "Acoustic and Optical Doppler Frequency Shift",
                "latex": "f' = f \\left( \\frac{v \\pm v_{\\text{detector}}}{v \\mp v_{\\text{source}}} \\right) \\quad (\\text{Apparent Frequency Modulation})",
                "note": "Perceived pitch or chromatic shift caused by relative motion between wave emitter and observer."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Transverse Wave Anatomy and Snell Law Refraction Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='190' height='145' rx='6' fill='#dbeafe' stroke='#1e40af' stroke-width='1.5'/><text x='120' y='46' fill='#1e40af' font-size='11' font-weight='bold' text-anchor='middle'>TRANSVERSE WAVE ANATOMY</text><line x1='35' y1='105' x2='205' y2='105' stroke='#94a3b8' stroke-width='1' stroke-dasharray='3 3'/><path d='M 35 105 Q 60 45 85 105 T 135 105 T 185 105' fill='none' stroke='#0284c7' stroke-width='2.5'/><text x='60' y='52' fill='#0369a1' font-size='8' font-weight='bold' text-anchor='middle'>Crest</text><text x='110' y='145' fill='#0369a1' font-size='8' font-weight='bold' text-anchor='middle'>Trough</text><line x1='60' y1='55' x2='160' y2='55' stroke='#ef4444' stroke-width='1.5'/><text x='110' y='50' fill='#b91c1c' font-size='8' font-weight='bold' text-anchor='middle'>Wavelength (&lambda;)</text><line x1='85' y1='105' x2='85' y2='65' stroke='#10b981' stroke-width='1.5'/><text x='95' y='85' fill='#047857' font-size='8' font-weight='bold'>Amp (A)</text><text x='120' y='160' fill='#1e3a8a' font-size='8' font-weight='bold' text-anchor='middle'>v = f &times; &lambda; &#x2713;</text><rect x='245' y='25' width='190' height='145' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='340' y='46' fill='#92400e' font-size='11' font-weight='bold' text-anchor='middle'>SNELL'S LAW REFRACTION</text><rect x='255' y='105' width='170' height='55' fill='#dbeafe' fill-opacity='0.6'/><line x1='255' y1='105' x2='425' y2='105' stroke='#0284c7' stroke-width='1.5'/><text x='400' y='95' fill='#64748b' font-size='8'>Air (n1)</text><text x='400' y='125' fill='#0284c7' font-size='8'>Water (n2)</text><line x1='340' y1='60' x2='340' y2='155' stroke='#94a3b8' stroke-width='1' stroke-dasharray='2 2'/><line x1='295' y1='65' x2='340' y2='105' stroke='#ef4444' stroke-width='2.5'/><line x1='340' y1='105' x2='365' y2='150' stroke='#ef4444' stroke-width='2.5'/><text x='315' y='85' fill='#b91c1c' font-size='8' font-weight='bold'>&theta;1</text><text x='355' y='125' fill='#b91c1c' font-size='8' font-weight='bold'>&theta;2 (Bends &darr;)</text><text x='340' y='160' fill='#92400e' font-size='8' font-weight='bold' text-anchor='middle'>n1 sin(&theta;1) = n2 sin(&theta;2) &#x2713;</text><text x='230' y='188' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Wave Metrics and Optical Ray Refraction Dynamics &#x2713;</text></svg>",
        "diagramLabel": "Transverse wave anatomy and Snell law refraction diagram",
        "diagramCaption": "Waves & Optics: Anatomy of a periodic transverse wave (crest, trough, amplitude, wavelength) alongside Snell's Law optical refraction ray bending.",
        "references": [
            {"title": "NGSS Standard HS-PS4-1 (Wave Properties & Modeling)", "desc": "Use mathematical representations to support a claim regarding relationships among the frequency, wavelength, and speed of waves.", "url": "/pages/standards.php?domain=SCIENCE-PS", "icon": "fas fa-award"},
            {"title": "Optica (formerly Optical Society of America): Optics for Kids", "desc": "Educational physics explorations of reflection, refraction, lenses, and lasers.", "url": "https://www.optica.org/", "icon": "fas fa-university"},
            {"title": "The Physics Classroom: Light Waves and Color Refraction", "desc": "Visual interactive lessons on Snell's Law, dispersion, and electromagnetic spectrum frequencies.", "url": "https://www.physicsclassroom.com/class/refrn", "icon": "fas fa-wave-square"}
        ]
    },
    "Thermodynamics": {
        "category": "Physics Resources",
        "definition": "Thermodynamics is the branch of physics investigating heat, work, temperature, and statistical mechanical energy transformations. Formalized across Four Fundamental Laws: Zeroth Law (thermal equilibrium transitivity defining temperature); First Law (conservation of internal energy: &Delta;U = Q - W); Second Law (the entropy S of an isolated system increases irreversibly over time, &Delta;S &ge; 0); and Third Law (entropy approaches zero as temperature reaches absolute zero 0 K). Thermal energy transfers through three distinct physical mechanisms: Conduction (molecular collisions in solids), Convection (buoyant bulk fluid circulation), and Radiation (electromagnetic photon emission governed by the Stefan-Boltzmann law).",
        "basicDefinition": "Thermodynamics is the science of heat, temperature, and mechanical energy. Heat is thermal energy that naturally flows from warmer objects to cooler objects (like hot cocoa cooling down in a mug). Energy can never be created or destroyed, but disorder (entropy) always increases.",
        "breakdown": [
            {
                "label": "The 3 Heat Transfer Methods",
                "text": "Conduction (direct contact through solids); Convection (currents circulating in liquids/gases); Radiation (infrared electromagnetic waves through space)."
            },
            {
                "label": "First Law (Energy Conservation)",
                "text": "Heat added to a system equals the increase in internal energy plus the mechanical work done (&Delta;U = Q - W)."
            },
            {
                "label": "Second Law & Entropy",
                "text": "Heat naturally flows ONLY from hot to cold; entropy (disorder) in an isolated system always increases over time."
            }
        ],
        "example": "Standard Analysis: 'An ideal Carnot heat engine operating between a steam boiler reservoir (TH = 600 K) and a river heat sink (TC = 300 K) has a maximum theoretical thermal efficiency of &eta; = 1 - (TC / TH) = 1 - (300 / 600) = 50%. The remaining 50% of thermal energy must inevitably be rejected as waste heat to satisfy the Second Law of Thermodynamics.'",
        "basicExample": "Simple Sentence: 'When you drop an ice cube into warm soup, heat flows out of the soup into the ice cube until both reach the exact same warm temperature (thermal equilibrium).'",
        "proTip": "Remember: Cold is NOT a real physical substance! In physics, 'cold' is simply the absence of thermal energy. An ice cube doesn't push cold into your drink; your warm drink transfers heat into the ice to melt it!",
        "question": "What does the Second Law of Thermodynamics state about the natural direction of spontaneous heat transfer?",
        "choices": [
            "Heat spontaneously flows from colder objects to hotter objects",
            "Heat spontaneously flows from hotter objects to colder objects",
            "Heat never transfers between objects of different temperatures"
        ],
        "correctIndex": 1,
        "explanation": "Spontaneous thermal energy transfer always flows irreversibly from regions of higher temperature to regions of lower temperature.",
        "equations": [
            {
                "title": "First Law of Thermodynamics (Energy Conservation)",
                "latex": "\\Delta U = Q - W \\quad (\\Delta U = \\text{Internal Energy}, \\, Q = \\text{Heat Added}, \\, W = \\text{Work Done})",
                "note": "Mathematical formulation of energy conservation in closed thermodynamic systems."
            },
            {
                "title": "Carnot Maximum Theoretical Thermal Efficiency",
                "latex": "\\eta_{\\text{Carnot}} = 1 - \\frac{T_C}{T_H} \\quad (T_C = \\text{Cold Sink}, \\, T_H = \\text{Hot Reservoir in Kelvin})",
                "note": "Upper theoretical thermodynamic efficiency bound for any heat engine operating between two temperatures."
            },
            {
                "title": "Stefan-Boltzmann Thermal Radiation Law",
                "latex": "P = \\epsilon \\sigma A T^4 \\quad (\\sigma = 5.67 \\times 10^{-8} \\,\\text{W}/\\text{m}^2\\text{K}^4)",
                "note": "Net radiant electromagnetic power emitted by a blackbody proportional to the fourth power of absolute temperature."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Carnot Heat Engine and Heat Transfer Modes Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='190' height='145' rx='6' fill='#fee2e2' stroke='#ef4444' stroke-width='1.5'/><text x='120' y='46' fill='#991b1b' font-size='11' font-weight='bold' text-anchor='middle'>CARNOT HEAT ENGINE</text><rect x='65' y='60' width='110' height='25' rx='4' fill='#ef4444'/><text x='120' y='76' fill='#ffffff' font-size='9' font-weight='bold' text-anchor='middle'>Hot Reservoir (TH)</text><path d='M 120 85 L 120 100' stroke='#ef4444' stroke-width='2' marker-end='url(#arrow)'/><circle cx='120' cy='115' r='16' fill='#ffffff' stroke='#3b82f6' stroke-width='2'/><text x='120' y='119' fill='#1e40af' font-size='9' font-weight='bold' text-anchor='middle'>Engine</text><path d='M 136 115 L 165 115' stroke='#10b981' stroke-width='2' marker-end='url(#arrow)'/><text x='170' y='110' fill='#047857' font-size='8' font-weight='bold'>Work W</text><path d='M 120 131 L 120 145' stroke='#3b82f6' stroke-width='2' marker-end='url(#arrow)'/><rect x='65' y='145' width='110' height='20' rx='4' fill='#3b82f6'/><text x='120' y='159' fill='#ffffff' font-size='8' font-weight='bold' text-anchor='middle'>Cold Sink (TC)</text><rect x='245' y='25' width='190' height='145' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='340' y='46' fill='#92400e' font-size='11' font-weight='bold' text-anchor='middle'>HEAT TRANSFER MODES</text><rect x='260' y='60' width='160' height='26' rx='4' fill='#ffffff' stroke='#d97706'/><text x='340' y='77' fill='#b45309' font-size='9' font-weight='bold' text-anchor='middle'>1. Conduction (Direct Contact)</text><rect x='260' y='92' width='160' height='26' rx='4' fill='#ffffff' stroke='#d97706'/><text x='340' y='109' fill='#b45309' font-size='9' font-weight='bold' text-anchor='middle'>2. Convection (Fluid Circulation)</text><rect x='260' y='124' width='160' height='26' rx='4' fill='#ffffff' stroke='#d97706'/><text x='340' y='141' fill='#b45309' font-size='9' font-weight='bold' text-anchor='middle'>3. Radiation (Infrared Light Waves)</text><text x='340' y='160' fill='#166534' font-size='8' font-weight='bold' text-anchor='middle'>Heat Flows: Hot &rarr; Cold Spontaneously &#x2713;</text><text x='230' y='188' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Thermal Energy Transformation and Entropy Conservation &#x2713;</text></svg>",
        "diagramLabel": "Carnot heat engine and heat transfer modes diagram",
        "diagramCaption": "Thermodynamics & Energetics: A cyclic Carnot heat engine converting thermal energy into useful work alongside the three modes of heat transfer (conduction, convection, radiation).",
        "references": [
            {"title": "NGSS Standard HS-PS3-2 (Thermal Energy Conservation)", "desc": "Develop and use models to illustrate that energy at the macroscopic scale can be accounted for as fields and thermal particle motion.", "url": "/pages/standards.php?domain=SCIENCE-PS", "icon": "fas fa-award"},
            {"title": "NIST Thermodynamics Research Center", "desc": "National Institute of Standards and Technology official thermophysical and chemical equilibrium data.", "url": "https://www.nist.gov/mml/applied-chemicals-and-materials-division/thermodynamics-research-center", "icon": "fas fa-university"},
            {"title": "HyperPhysics: Thermal Physics and Heat Engines", "desc": "Georgia State University comprehensive conceptual map of thermodynamic laws, entropy, and PV cycles.", "url": "http://hyperphysics.phy-astr.gsu.edu/hbase/heacon.html", "icon": "fas fa-temperature-high"}
        ]
    }
,

    "Geology & Rocks": {
        "title": "Geology & Rocks",
        "category": "Earth Science Resources",
        "definition": "Geology is the foundational Earth science investigating planetary composition, internal dynamic structure, evolutionary history, and the physicochemical processes driving tectonic and geomorphic change. Earth is stratified into a solid nickel-iron inner core, liquid outer core, convective silicate mantle, and rigid lithospheric crust. The lithosphere is segmented into tectonic plates that diverge, converge, and slide along transform boundaries, driven by mantle convection and slab pull. Minerals are naturally occurring, inorganic, crystalline solids that aggregate into three primary rock classes via the cyclical dynamic Rock Cycle: Igneous rocks (crystallized from molten magma or extrusive lava), Sedimentary rocks (lithified through weathering, erosion, deposition, and diagenetic compaction), and Metamorphic rocks (transformed by intense subsurface temperature and differential stress without complete melting).",
        "basicDefinition": "Geology is the study of Planet Earth, rocks, and minerals. Earth has layers: a hot core inside, a thick mantle, and a solid outer crust. Rocks continuously change over millions of years through the Rock Cycle: melting into magma, cooling into igneous rocks, breaking into sediment to form sedimentary rocks, or baking under heat and pressure into metamorphic rocks.",
        "breakdown": [
            {
                "label": "The 3 Major Rock Types",
                "text": "Igneous (cooled from molten lava/magma like basalt and granite); Sedimentary (compressed layers of sand/mud like sandstone and limestone); Metamorphic (baked by intense heat and pressure like marble and slate)."
            },
            {
                "label": "Plate Tectonics",
                "text": "Rigid crustal plates floating on Earth's semi-molten mantle collide (mountains/subduction), pull apart (rift valleys/mid-ocean ridges), or slide past each other (fault-line earthquakes)."
            },
            {
                "label": "Geologic Time & Radiometric Dating",
                "text": "Using the radioactive decay half-lives of unstable parent isotopes (like Carbon-14 or Uranium-Lead) to measure the absolute age of rocks and fossils."
            }
        ],
        "example": "Standard Analysis: 'Basalt samples collected along the Mid-Atlantic Ridge yield an absolute age of 10 million years at a distance of 250 km from the spreading center. Calculating plate velocity yields v = d / t = 250 km / 10 Ma = 2.5 cm/year, corroborating sea-floor spreading driven by mantle convection currents.'",
        "basicExample": "Simple Sentence: 'Granite is an igneous rock formed deep underground from slowly cooled magma, while sandstone is a sedimentary rock made of glued-together grains of beach sand.'",
        "proTip": "Remember the Rock Cycle shortcut: ANY rock type can transform into ANY other rock type given enough time! Sedimentary can melt into igneous; igneous can get squeezed into metamorphic; metamorphic can weather into sedimentary!",
        "question": "Which rock type forms when existing rocks are subjected to high underground temperatures and crushing pressures without completely melting?",
        "choices": [
            "Igneous rocks",
            "Sedimentary rocks",
            "Metamorphic rocks"
        ],
        "correctIndex": 2,
        "explanation": "Metamorphic rocks form when preexisting parent rocks undergo solid-state recrystallization under extreme geothermal heat and lithostatic pressure.",
        "equations": [
            {
                "title": "Radiometric Decay Law (Geochronology)",
                "latex": "N(t) = N_0 e^{-\\lambda t} = N_0 \\left(\\frac{1}{2}\\right)^{t/t_{1/2}} \\quad (t_{1/2} = \\text{Half-Life})",
                "note": "Determines the absolute chronological age of rocks based on radioactive parent isotope decay."
            },
            {
                "title": "Tectonic Plate Spreading Rate",
                "latex": "v_{\\text{plate}} = \\frac{d_{\\text{ridge}}}{t_{\\text{crust}}} \\quad (d = \\text{Distance from Spreading Axis}, \\, t = \\text{Basalt Age})",
                "note": "Calculates linear spreading velocity of divergent oceanic crust across geologic epochs."
            },
            {
                "title": "Mineral Specific Gravity & Density",
                "latex": "SG = \\frac{\\rho_{\\text{mineral}}}{\\rho_{\\text{H}_2\\text{O}}} = \\frac{m_{\\text{air}}}{m_{\\text{air}} - m_{\\text{submerged}}}",
                "note": "Standard diagnostic physical property used to identify crystalline mineral specimens."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='The Dynamic Rock Cycle Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><circle cx='80' cy='65' r='38' fill='#fee2e2' stroke='#ef4444' stroke-width='2'/><text x='80' y='60' fill='#991b1b' font-size='10' font-weight='bold' text-anchor='middle'>IGNEOUS</text><text x='80' y='74' fill='#b91c1c' font-size='8' text-anchor='middle'>Lava / Magma</text><circle cx='380' cy='65' r='38' fill='#fef3c7' stroke='#d97706' stroke-width='2'/><text x='380' y='60' fill='#92400e' font-size='9' font-weight='bold' text-anchor='middle'>SEDIMENTARY</text><text x='380' y='74' fill='#b45309' font-size='8' text-anchor='middle'>Erosion &amp; Layers</text><circle cx='230' cy='150' r='38' fill='#ede9fe' stroke='#8b5cf6' stroke-width='2'/><text x='230' y='145' fill='#5b21b6' font-size='9' font-weight='bold' text-anchor='middle'>METAMORPHIC</text><text x='230' y='159' fill='#6d28d9' font-size='8' text-anchor='middle'>Heat &amp; Pressure</text><path d='M 120 50 L 340 50' stroke='#d97706' stroke-width='1.8' stroke-dasharray='4' marker-end='url(#arrow)'/><text x='230' y='42' fill='#b45309' font-size='8' font-weight='bold' text-anchor='middle'>Weathering &amp; Erosion &rarr;</text><path d='M 370 100 L 265 140' stroke='#8b5cf6' stroke-width='1.8' marker-end='url(#arrow)'/><text x='330' y='132' fill='#6d28d9' font-size='8' font-weight='bold' text-anchor='middle'>Heat &amp; Pressure &rarr;</text><path d='M 195 140 L 90 100' stroke='#ef4444' stroke-width='1.8' marker-end='url(#arrow)'/><text x='130' y='132' fill='#b91c1c' font-size='8' font-weight='bold' text-anchor='middle'>&larr; Melting into Magma</text><path d='M 80 105 Q 120 170 190 155' stroke='#8b5cf6' stroke-width='1.5' stroke-dasharray='3'/><path d='M 380 105 Q 340 170 270 155' stroke='#d97706' stroke-width='1.5' stroke-dasharray='3'/><text x='230' y='190' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Continuous Geological Transformation: Igneous &harr; Sedimentary &harr; Metamorphic</text></svg>",
        "diagramLabel": "The dynamic rock cycle and plate tectonic transformation diagram",
        "diagramCaption": "The Geological Rock Cycle: Cyclic pathways through which igneous, sedimentary, and metamorphic rocks continuously transform via thermal melting, tectonic pressure, and surficial weathering.",
        "references": [
            {"title": "NGSS Standard HS-ESS2-1 (Earth's Internal & Surface Processes)", "desc": "Develop a model to illustrate how Earth's internal and surface processes operate across spatial and temporal scales to form continental and ocean-floor features.", "url": "/pages/standards.php?domain=SCIENCE-ESS", "icon": "fas fa-award"},
            {"title": "USGS National Geoscience & Mineral Information", "desc": "United States Geological Survey authoritative real-time planetary seismic, volcanic, and rock classification database.", "url": "https://www.usgs.gov/science/science-explorer/geology", "icon": "fas fa-mountain"},
            {"title": "EarthScope Consortium (Plate Boundary Observatory)", "desc": "Geophysical observatory monitoring North American plate tectonic motions and crustal deformation.", "url": "https://www.earthscope.org", "icon": "fas fa-globe-americas"}
        ]
    },

    "Weather & Climate": {
        "title": "Weather & Climate",
        "category": "Earth Science Resources",
        "definition": "Atmospheric science differentiates between weather (the instantaneous day-to-day state of the atmosphere regarding temperature, barometric pressure, humidity, wind velocity, and precipitation) and climate (the statistical long-term meteorological pattern over decades, typically 30+ year climatological normals). Global atmospheric circulation is governed by solar insolation gradients between the equator and poles, establishing three primary circulation cells per hemisphere: Hadley Cells (equatorial convective rising at the Intertropical Convergence Zone to 30&deg; latitude subtropics), Ferrel Cells (mid-latitude prevailing westerlies), and Polar Cells (high-latitude polar easterlies). The Coriolis force, caused by Earth's planetary rotation, deflects winds to the right in the Northern Hemisphere and to the left in the Southern Hemisphere, steering major storm systems, hurricanes, and jet stream meanders.",
        "basicDefinition": "Weather is what the sky and air feel like today (rainy, sunny, snowy, windy). Climate is the average weather of a place measured over 30 or more years (like how deserts are naturally dry and the Arctic is cold). The Sun heats the equator more than the poles, creating wind currents and jet streams.",
        "breakdown": [
            {
                "label": "Weather vs. Climate",
                "text": "Weather is temporary (an afternoon thunderstorm); Climate is long-term average (tropical rainforests receive over 80 inches of rain every year)."
            },
            {
                "label": "Atmospheric Circulation Cells",
                "text": "Hadley (warm air rises at equator, sinks at 30&deg;); Ferrel (mid-latitudes); Polar (cold air sinks at the poles)."
            },
            {
                "label": "The Coriolis Effect",
                "text": "Earth's rotation curves wind paths to the right in the Northern Hemisphere and to the left in the Southern Hemisphere."
            }
        ],
        "example": "Standard Analysis: 'A severe mid-latitude cyclone develops as warm, moist maritime tropical (mT) air collides with dense continental polar (cP) air along a cold front. As the colder air wedges beneath the warm air, barometric pressure plunges rapidly, forcing rapid condensation and severe convective squall lines.'",
        "basicExample": "Simple Sentence: 'Today's weather in Chicago is a cold blizzard with 25 mph winds, but Chicago's summer climate is usually hot and humid.'",
        "proTip": "Remember the quick memory rule: 'Climate is what you expect (like needing a winter coat in December); Weather is what you actually get (like a freak sunny 65-degree day in December)!'",
        "question": "Which planetary phenomenon deflects moving air masses to the right in the Northern Hemisphere due to Earth's axial rotation?",
        "choices": [
            "The Greenhouse Effect",
            "The Coriolis Effect",
            "The Rain Shadow Effect"
        ],
        "correctIndex": 1,
        "explanation": "The Coriolis effect is the apparent deflection of moving fluid and air currents resulting from Earth's eastward axial rotation.",
        "equations": [
            {
                "title": "Atmospheric Hydrostatic Pressure Balance",
                "latex": "\\frac{dP}{dz} = -\\rho g \\implies P(z) = P_0 e^{-z/H} \\quad (H = \\text{Scale Height} \\approx 8.5 \\,\\text{km})",
                "note": "Governs the exponential decrease of atmospheric air pressure with increasing altitude."
            },
            {
                "title": "Coriolis Acceleration Formula",
                "latex": "a_{\\text{Coriolis}} = 2 v \\Omega \\sin\\phi \\quad (\\Omega = \\text{Earth Angular Velocity}, \\, \\phi = \\text{Latitude})",
                "note": "Quantifies inertial wind deflection across differing planetary latitudes."
            },
            {
                "title": "Relative Humidity (Vapor Pressure Ratio)",
                "latex": "RH = \\left(\\frac{e}{e_s(T)}\\right) \\times 100\\% \\quad (e = \\text{Actual Vapor Pressure}, \\, e_s = \\text{Saturation Pressure})",
                "note": "Calculates moisture saturation percentage of an air parcel at ambient temperature."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Global Atmospheric Circulation Cells Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='20' y='25' width='420' height='145' rx='6' fill='#eff6ff' stroke='#3b82f6' stroke-width='1.5'/><line x1='20' y1='145' x2='440' y2='145' stroke='#3b82f6' stroke-width='2'/><text x='35' y='160' fill='#1e40af' font-size='9' font-weight='bold'>Equator (0&deg; ITCZ)</text><text x='160' y='160' fill='#1e40af' font-size='9' font-weight='bold'>30&deg; N (Horse Latitudes)</text><text x='300' y='160' fill='#1e40af' font-size='9' font-weight='bold'>60&deg; N (Polar Front)</text><text x='400' y='160' fill='#1e40af' font-size='9' font-weight='bold'>90&deg; N</text><rect x='40' y='45' width='95' height='85' rx='4' fill='#fee2e2' stroke='#ef4444'/><text x='87' y='65' fill='#991b1b' font-size='10' font-weight='bold' text-anchor='middle'>HADLEY CELL</text><text x='87' y='82' fill='#b91c1c' font-size='8' text-anchor='middle'>Warm Air Rises &uarr;</text><text x='87' y='96' fill='#b91c1c' font-size='8' text-anchor='middle'>Sinks at 30&deg; &darr;</text><text x='87' y='114' fill='#047857' font-size='8' font-weight='bold' text-anchor='middle'>Trade Winds &larr;</text><rect x='160' y='45' width='95' height='85' rx='4' fill='#fef3c7' stroke='#d97706'/><text x='207' y='65' fill='#92400e' font-size='10' font-weight='bold' text-anchor='middle'>FERREL CELL</text><text x='207' y='82' fill='#b45309' font-size='8' text-anchor='middle'>Indirect Circulation</text><text x='207' y='96' fill='#b45309' font-size='8' text-anchor='middle'>Rises at 60&deg; &uarr;</text><text x='207' y='114' fill='#047857' font-size='8' font-weight='bold' text-anchor='middle'>Westerlies &rarr;</text><rect x='280' y='45' width='95' height='85' rx='4' fill='#ede9fe' stroke='#8b5cf6'/><text x='327' y='65' fill='#5b21b6' font-size='10' font-weight='bold' text-anchor='middle'>POLAR CELL</text><text x='327' y='82' fill='#6d28d9' font-size='8' text-anchor='middle'>Cold Air Sinks &darr;</text><text x='327' y='96' fill='#6d28d9' font-size='8' text-anchor='middle'>Dense &amp; High Pressure</text><text x='327' y='114' fill='#047857' font-size='8' font-weight='bold' text-anchor='middle'>Polar Easterlies &larr;</text><text x='230' y='188' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Solar Differential Heating + Coriolis Planetary Wind Deflection &#x2713;</text></svg>",
        "diagramLabel": "Global atmospheric circulation and wind belts diagram",
        "diagramCaption": "Planetary Meteorology: The tri-cellular atmospheric model (Hadley, Ferrel, and Polar cells) driven by equatorial solar heating and Coriolis deflection producing global wind belts.",
        "references": [
            {"title": "NGSS Standard HS-ESS2-4 (Energy Flow & Global Climate)", "desc": "Use a model to describe how variations in the flow of energy into and out of Earth's systems result in changes in climate.", "url": "/pages/standards.php?domain=SCIENCE-ESS", "icon": "fas fa-award"},
            {"title": "NOAA National Weather Service Education", "desc": "National Oceanic and Atmospheric Administration official jet stream and satellite meteorological portal.", "url": "https://www.weather.gov/jetstream", "icon": "fas fa-cloud-sun-rain"},
            {"title": "NCAR & UCAR Center for Science Education", "desc": "National Center for Atmospheric Research interactive models of planetary weather systems and carbon cycles.", "url": "https://scied.ucar.edu", "icon": "fas fa-wind"}
        ]
    },

    "Oceanography": {
        "title": "Oceanography",
        "category": "Earth Science Resources",
        "definition": "Oceanography is the multidisciplinary physical, chemical, biological, and geological study of Earth's global ocean covering 71% of the planetary surface. Marine water columns are vertically stratified by density into distinct layers: the Epipelagic Zone (sunlit surface layer, 0-200 m, hosting over 90% of marine life and phytoplankton photosynthesis), Mesopelagic Twilight Zone (200-1,000 m), Bathypelagic Midnight Zone (1,000-4,000 m), and the Abyssopelagic Zone (4,000+ m down to ocean trenches). Global ocean circulation occurs along two interconnected pathways: wind-driven surface currents organized into clockwise subtropical gyres in the Northern Hemisphere (Ekman transport), and the deep-water Thermohaline Circulation ('Global Ocean Conveyor Belt'), driven by water density gradients produced by differences in temperature (thermo) and salinity (haline). Cold, hypersaline water sinks in the North Atlantic and circulates across global basins over a 1,000-year cycle, regulating planetary heat distribution.",
        "basicDefinition": "Oceanography is the science of Earth's oceans. The ocean has layers: a bright sunny top where fish and coral live, and cold, pitch-black deep waters at the bottom. Water moves around the globe like a giant roller-coaster called the Great Ocean Conveyor Belt, driven by cold salty water sinking at the poles and carrying heat around the planet.",
        "breakdown": [
            {
                "label": "Vertical Ocean Zones",
                "text": "Sunlit Zone (0-200m, photosynthesis occurs); Twilight Zone (200-1,000m, faint dim light); Midnight Zone (1,000-4,000m, freezing cold and pitch black); Abyssal Trenches (extreme crushing pressure)."
            },
            {
                "label": "Thermohaline Circulation",
                "text": "The global ocean conveyor belt driven by water density: cold, high-salinity water sinks near Greenland and flows through ocean basins worldwide."
            },
            {
                "label": "Salinity & Hydrostatic Pressure",
                "text": "Average seawater salinity is 35 parts per thousand (ppt). Hydrostatic pressure increases by approximately 1 atmosphere for every 10 meters of depth."
            }
        ],
        "example": "Standard Analysis: 'In the North Atlantic near Greenland, freezing winter winds cause surface evaporation and sea-ice formation, expelling salt (brine rejection). The resulting water is extremely cold and dense (&rho; &approx; 1.028 g/cm&sup3;), causing it to sink to the ocean floor as North Atlantic Deep Water (NADW), powering the thermohaline conveyor belt.'",
        "basicExample": "Simple Sentence: 'Deep sea submarines must have super-thick titanium hulls because water pressure increases by one full atmosphere every 10 meters down into the ocean.'",
        "proTip": "Remember why deep ocean water sinks: Cold water is DENSER than warm water, and salty water is DENSER than fresh water! So the coldest, saltiest water always plunges to the ocean floor!",
        "question": "What two physical properties of seawater primarily drive the deep-water Thermohaline Circulation ('Global Conveyor Belt')?",
        "choices": [
            "Wave height and lunar tides",
            "Water temperature and salinity",
            "Wind speed and ocean pH"
        ],
        "correctIndex": 1,
        "explanation": "Thermohaline circulation is driven by density differences created by seawater temperature ('thermo') and salinity ('haline').",
        "equations": [
            {
                "title": "Ocean Hydrostatic Pressure Equation",
                "latex": "P(z) = P_{\\text{atm}} + \\rho g z \\quad (\\text{Every } 10\\,\\text{m} \\text{ depth adds } \\approx 1\\,\\text{atm})",
                "note": "Quantifies the linear accumulation of hydrostatic crushing pressure with ocean depth."
            },
            {
                "title": "Oceanic Equation of State (Density Function)",
                "latex": "\\rho = f(S, T, P) \\quad (S = \\text{Salinity in PSU}, \\, T = \\text{Temperature}, \\, P = \\text{Pressure})",
                "note": "Defines seawater density stratification driving thermohaline buoyancy and downwelling."
            },
            {
                "title": "Deep-Water Wave Celerity (Phase Speed)",
                "latex": "c = \\sqrt{\\frac{g \\lambda}{2\\pi}} = \\frac{g T}{2\\pi} \\quad (\\lambda = \\text{Wavelength}, \\, T = \\text{Wave Period})",
                "note": "Calculates open-ocean surface wave propagation velocity in deep water."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Ocean Vertical Stratification and Thermohaline Circulation Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='190' height='145' rx='6' fill='#eff6ff' stroke='#3b82f6' stroke-width='1.5'/><text x='120' y='44' fill='#1e40af' font-size='10' font-weight='bold' text-anchor='middle'>OCEAN DEPTH ZONES</text><rect x='35' y='55' width='170' height='22' fill='#93c5fd'/><text x='120' y='70' fill='#1e3a8a' font-size='8' font-weight='bold' text-anchor='middle'>Sunlit Zone (0-200m) Photosynthesis</text><rect x='35' y='80' width='170' height='26' fill='#3b82f6'/><text x='120' y='96' fill='#ffffff' font-size='8' font-weight='bold' text-anchor='middle'>Twilight Zone (200-1000m) Faint Light</text><rect x='35' y='109' width='170' height='28' fill='#1d4ed8'/><text x='120' y='126' fill='#ffffff' font-size='8' font-weight='bold' text-anchor='middle'>Midnight Zone (1000-4000m) Dark &amp; Cold</text><rect x='35' y='140' width='170' height='20' fill='#0f172a'/><text x='120' y='154' fill='#94a3b8' font-size='7.5' font-weight='bold' text-anchor='middle'>Abyss (4000m+) High Pressure</text><rect x='245' y='25' width='190' height='145' rx='6' fill='#e0f2fe' stroke='#0284c7' stroke-width='1.5'/><text x='340' y='44' fill='#0369a1' font-size='10' font-weight='bold' text-anchor='middle'>GLOBAL CONVEYOR BELT</text><path d='M 260 65 Q 340 50 420 65' stroke='#ef4444' stroke-width='3' fill='none'/><text x='340' y='60' fill='#b91c1c' font-size='8' font-weight='bold' text-anchor='middle'>Warm Shallow Currents (Gulf Stream) &rarr;</text><path d='M 410 75 Q 425 110 410 135' stroke='#3b82f6' stroke-width='2.5' fill='none'/><text x='400' y='110' fill='#1d4ed8' font-size='7' font-weight='bold'>Cooling &amp; Sinking &darr;</text><path d='M 410 145 Q 340 160 260 145' stroke='#1d4ed8' stroke-width='3' fill='none'/><text x='340' y='140' fill='#1e3a8a' font-size='8' font-weight='bold' text-anchor='middle'>&larr; Cold Salty Deep Water Current</text><path d='M 265 135 Q 250 100 265 75' stroke='#ef4444' stroke-width='2.5' fill='none'/><text x='270' y='110' fill='#b91c1c' font-size='7' font-weight='bold'>&uarr; Upwelling</text><text x='230' y='188' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Density Stratification + Thermohaline Ocean Basin Circulation &#x2713;</text></svg>",
        "diagramLabel": "Ocean depth zones and global thermohaline conveyor belt diagram",
        "diagramCaption": "Marine Oceanography: Pelagic depth stratification from the sunlit epipelagic to the abyssal plain alongside the planetary thermohaline conveyor belt.",
        "references": [
            {"title": "NGSS Standard MS-ESS2-6 (Ocean & Atmospheric Heat Circulation)", "desc": "Develop and use a model to describe how unequal heating and planetary rotation determine regional climates via atmospheric and ocean currents.", "url": "/pages/standards.php?domain=SCIENCE-ESS", "icon": "fas fa-award"},
            {"title": "Woods Hole Oceanographic Institution (WHOI)", "desc": "World-leading marine research institute providing autonomous ocean glider and deep-submersible exploratory findings.", "url": "https://www.whoi.edu", "icon": "fas fa-water"},
            {"title": "NOAA National Ocean Service Ocean Education", "desc": "Comprehensive educational primers on tides, ocean acidification, coral reefs, and benthic ecosystems.", "url": "https://oceanservice.noaa.gov/education/", "icon": "fas fa-ship"}
        ]
    },

    "Astronomy & Space": {
        "title": "Astronomy & Space",
        "category": "Earth Science Resources",
        "definition": "Astronomy and astrophysics investigate celestial bodies, cosmological evolution, orbital mechanics, and the fundamental structure of the universe. Planetary motion is governed by Johannes Kepler's Three Laws: orbits are ellipses with the Sun at one focal point (First Law); an orbiting body sweeps out equal areas in equal time intervals, moving fastest at perihelion and slowest at aphelion (Second Law); and the square of an orbital period is directly proportional to the cube of the semimajor axis (Kepler's Third Law: T&sup2; &prop; a&sup3;), mathematically derived from Newton's Law of Universal Gravitation. Stars produce energy through nuclear fusion (converting hydrogen into helium via the proton-proton chain in main sequence stars). On cosmic scales, galaxies accelerate away from each other according to Edwin Hubble's Law (v = H&sub0;d), serving as primary observational evidence for the Big Bang and expanding cosmological spacetime.",
        "basicDefinition": "Astronomy is the study of stars, planets, moons, and the universe. Planets orbit stars in stretched-out circles called ellipses, moving faster when they are closer to their star. Stars like our Sun are giant balls of burning gas that make light through nuclear fusion. The universe has billions of galaxies and is expanding outwards every second.",
        "breakdown": [
            {
                "label": "Kepler's Laws of Planetary Motion",
                "text": "1. Orbits are ellipses with the Sun at one focus; 2. Planets sweep equal orbital areas in equal times (fast at perihelion); 3. Farther planets take much longer to orbit (T&sup2; = a&sup3;)."
            },
            {
                "label": "Gravity & Stellar Fusion",
                "text": "Newton's gravity holds planets in orbit; the Sun's core fuses 600 million tons of hydrogen into helium every second."
            },
            {
                "label": "Hubble's Law & The Big Bang",
                "text": "Distant galaxies are moving away from us at speeds proportional to their distance, proving the universe is expanding."
            }
        ],
        "example": "Standard Analysis: 'Mars orbits the Sun at an average semimajor axis of a = 1.524 AU. Applying Kepler's Third Law (T&sup2; = a&sup3;) yields T&sup2; = (1.524)&sup3; = 3.54, so T = &radic;3.54 &approx; 1.88 Earth years (687 Earth days), precisely matching observational orbital tracking.'",
        "basicExample": "Simple Sentence: 'Because Jupiter is five times farther from the Sun than Earth is, it takes Jupiter twelve Earth years to finish just one orbit around the Sun.'",
        "proTip": "Remember Kepler's speed trick: A planet zooms fastest when it is closest to the Sun ('Perihelion' - P for Pretty Close) and slowest when it is farthest away ('Aphelion' - A for Away)!",
        "question": "According to Kepler's Second Law of Planetary Motion, when does an orbiting planet travel at its maximum orbital speed?",
        "choices": [
            "When it is farthest from the Sun at aphelion",
            "When it is closest to the Sun at perihelion",
            "It always travels at an exact constant speed all year"
        ],
        "correctIndex": 1,
        "explanation": "A planet sweeps equal areas in equal time intervals, requiring it to travel at its highest orbital velocity when closest to the star at perihelion.",
        "equations": [
            {
                "title": "Kepler's Third Harmonic Law of Planetary Motion",
                "latex": "T^2 = \\left(\\frac{4\\pi^2}{G(M_1 + M_2)}\\right) a^3 \\implies T^2 = a^3 \\quad (T = \\text{Years}, \\, a = \\text{AU})",
                "note": "Relates planetary orbital period directly to the semimajor axis of its elliptical orbit."
            },
            {
                "title": "Newton's Law of Universal Gravitation",
                "latex": "F_g = G \\frac{m_1 m_2}{r^2} \\quad (G = 6.674 \\times 10^{-11} \\,\\text{N}\\cdot\\text{m}^2/\\text{kg}^2)",
                "note": "Fundamental attractive gravitational force between any two masses across space."
            },
            {
                "title": "Hubble-Lemaître Cosmological Expansion Law",
                "latex": "v = H_0 \\cdot d \\quad (H_0 \\approx 70 \\,\\text{km/s/Mpc}, \\, v = \\text{Recession Velocity})",
                "note": "Empirical cosmological relationship demonstrating the accelerating expansion of the universe."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Kepler Elliptical Orbit and Equal Area Law Diagram'><rect width='100%' height='100%' fill='#0f172a' rx='8'/><ellipse cx='220' cy='100' rx='170' ry='75' fill='none' stroke='#475569' stroke-width='1.5' stroke-dasharray='4'/><circle cx='150' cy='100' r='14' fill='#f59e0b' stroke='#fbbf24' stroke-width='2'/><text x='150' y='126' fill='#fef3c7' font-size='9' font-weight='bold' text-anchor='middle'>Sun (Focus 1)</text><circle cx='290' cy='100' r='3' fill='#64748b'/><text x='290' y='115' fill='#94a3b8' font-size='7' text-anchor='middle'>Empty Focus 2</text><polygon points='150,100 50,100 55,75' fill='#38bdf8' opacity='0.35'/><text x='75' y='92' fill='#7dd3fc' font-size='8' font-weight='bold'>Area A1</text><circle cx='50' cy='100' r='8' fill='#38bdf8'/><text x='50' y='122' fill='#38bdf8' font-size='8' font-weight='bold' text-anchor='middle'>Perihelion (Fast!)</text><polygon points='150,100 390,100 388,112' fill='#a855f7' opacity='0.35'/><text x='340' y='108' fill='#d8b4fe' font-size='8' font-weight='bold'>Area A2</text><circle cx='390' cy='100' r='8' fill='#c084fc'/><text x='390' y='122' fill='#c084fc' font-size='8' font-weight='bold' text-anchor='middle'>Aphelion (Slow)</text><text x='230' y='32' fill='#38bdf8' font-size='11' font-weight='bold' text-anchor='middle'>KEPLER'S SECOND LAW: EQUAL AREAS IN EQUAL TIME</text><text x='230' y='185' fill='#94a3b8' font-size='9' font-weight='bold' text-anchor='middle'>Planetary Orbit is an Ellipse &bull; Area A1 = Area A2 in Time &Delta;t &#x2713;</text></svg>",
        "diagramLabel": "Kepler's elliptical orbit and equal area law diagram",
        "diagramCaption": "Astrophysics & Orbital Mechanics: An elliptical Keplerian orbit with the Sun at one focus; orbital velocity accelerates at perihelion to sweep equal areas in equal time intervals.",
        "references": [
            {"title": "NGSS Standard HS-ESS1-4 (Kepler's Laws & Orbital Mechanics)", "desc": "Use mathematical or computational representations to predict the motion of orbiting objects in the solar system.", "url": "/pages/standards.php?domain=SCIENCE-ESS", "icon": "fas fa-award"},
            {"title": "NASA Jet Propulsion Laboratory (JPL Solar System Dynamics)", "desc": "Official NASA ephemeris computing orbital trajectories, asteroids, and planetary flybys.", "url": "https://ssd.jpl.nasa.gov", "icon": "fas fa-satellite"},
            {"title": "European Space Agency (ESA Science & Technology)", "desc": "ESA planetary missions, James Webb Space Telescope observations, and stellar astrophysics archives.", "url": "https://www.esa.int/Science_Exploration/Space_Science", "icon": "fas fa-rocket"}
        ]
    }
,

    "Biology Labs": {
        "title": "Biology Labs",
        "category": "Science Experiments",
        "definition": "Biology laboratories provide empirical hands-on inquiry into living systems, cellular physiological dynamics, enzymatic biochemical kinetics, and microscopic anatomy. Core laboratory protocols utilize compound light microscopes to resolve cellular morphology at 40x to 1000x total magnification via the optical magnification equation: M_total = M_ocular * M_objective. Key experimental investigations include: spectrophotometric quantification of enzyme kinetics governed by the Beer-Lambert law (A = &epsilon;cl) observing catalase decomposition of H2O2; cellular osmosis and plasmolysis in plant epidermis (Elodea or Allium cepa) quantified through water potential equilibrium (&Psi; = &Psi;s + &Psi;p where solute potential &Psi;s = -iCRT); and gel electrophoresis resolving DNA fragment migration through porous agarose matrices driven by negative phosphate backbone charge.",
        "basicDefinition": "Biology labs are hands-on science activities where students explore living things under microscopes, test how plant and animal cells drink water (osmosis), and watch biological helpers called enzymes speed up chemical reactions. Proper lab technique requires measuring carefully, wearing eye protection, and keeping test variables controlled.",
        "breakdown": [
            {
                "label": "Compound Light Microscopy",
                "text": "Total magnification equals ocular lens power (usually 10x) multiplied by objective lens power (4x, 10x, 40x, or 100x oil immersion)."
            },
            {
                "label": "Cellular Osmosis & Water Potential",
                "text": "Water moves across semipermeable cell membranes from hypotonic solutions (high water concentration) into hypertonic solutions (high solute concentration)."
            },
            {
                "label": "Enzyme Catalysis Labs",
                "text": "Investigating how temperature, pH, and substrate concentration affect the reaction rate of enzymes like catalase, lactase, and amylase."
            }
        ],
        "example": "Standard Analysis: 'In an osmosis lab using dialysis tubing filled with 20% sucrose placed in a beaker of pure distilled water, the dialysis bag gains mass over 30 minutes. Water potential inside the bag is lower than the pure water outside (&Psi;_inside < &Psi;_outside = 0 MPa), driving net endosmotic water flux across the semipermeable barrier.'",
        "basicExample": "Simple Sentence: 'When you place a slice of potato into salty water, water rushes out of the potato cells, making the potato limp and bendy.'",
        "proTip": "Microscope Focusing Rule: Always start on the LOWEST power objective lens (4x) and use the coarse focus knob first! Never use the coarse focus knob on high power (40x or 100x), or you risk cracking the glass slide!",
        "question": "If a student uses a 10x ocular eyepiece lens and rotates the revolving nosepiece to the 40x high-power objective lens, what is the total magnification of the specimen?",
        "choices": [
            "50x total magnification",
            "400x total magnification",
            "4000x total magnification"
        ],
        "correctIndex": 1,
        "explanation": "Total magnification is calculated by multiplying ocular magnification by objective magnification: 10x * 40x = 400x.",
        "equations": [
            {
                "title": "Total Optical Microscope Magnification",
                "latex": "M_{\\text{total}} = M_{\\text{ocular}} \\times M_{\\text{objective}} \\quad (10\\times \\times 40\\times = 400\\times)",
                "note": "Multiplicative product of eyepiece and revolving objective lens optical powers."
            },
            {
                "title": "Water Potential Equilibrium Equation",
                "latex": "\\Psi = \\Psi_s + \\Psi_p \\quad (\\Psi_s = -iCRT \\, [\\text{Solute Potential}])",
                "note": "Quantifies thermodynamic free energy driving osmotic water movement across cell membranes."
            },
            {
                "title": "Beer-Lambert Law (Spectrophotometry)",
                "latex": "A = \\epsilon \\cdot c \\cdot l \\quad (A = \\text{Absorbance}, \\, \\epsilon = \\text{Molar Extinction}, \\, c = \\text{Concentration}, \\, l = \\text{Path Length})",
                "note": "Relates optical light absorbance directly to analyte concentration in enzyme kinetics assays."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Compound Light Microscope and Optics Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='185' height='145' rx='6' fill='#eff6ff' stroke='#3b82f6' stroke-width='1.5'/><text x='117' y='44' fill='#1e40af' font-size='10' font-weight='bold' text-anchor='middle'>COMPOUND MICROSCOPE</text><rect x='105' y='55' width='24' height='20' rx='2' fill='#64748b'/><text x='117' y='68' fill='#ffffff' font-size='7' font-weight='bold' text-anchor='middle'>Eyepiece (10x)</text><rect x='112' y='75' width='10' height='22' fill='#94a3b8'/><circle cx='117' cy='102' r='10' fill='#cbd5e1'/><rect x='112' y='107' width='10' height='18' rx='2' fill='#3b82f6'/><text x='117' y='119' fill='#ffffff' font-size='6.5' font-weight='bold' text-anchor='middle'>Obj (40x)</text><rect x='65' y='126' width='105' height='6' rx='2' fill='#334155'/><text x='117' y='142' fill='#0f172a' font-size='8' font-weight='bold' text-anchor='middle'>Mechanical Stage &amp; Slide</text><circle cx='117' cy='155' r='6' fill='#f59e0b'/><text x='117' y='168' fill='#b45309' font-size='7' text-anchor='middle'>Light Source</text><rect x='235' y='25' width='200' height='145' rx='6' fill='#f0fdf4' stroke='#16a34a' stroke-width='1.5'/><text x='335' y='44' fill='#166534' font-size='10' font-weight='bold' text-anchor='middle'>OSMOSIS IN CELL MEMBRANES</text><rect x='250' y='60' width='80' height='75' rx='4' fill='#ffffff' stroke='#16a34a'/><text x='290' y='75' fill='#15803d' font-size='8' font-weight='bold' text-anchor='middle'>HYPOTONIC</text><circle cx='290' cy='105' r='22' fill='#bbf7d0' stroke='#16a34a' stroke-width='1.5'/><text x='290' y='108' fill='#166534' font-size='7.5' font-weight='bold' text-anchor='middle'>Turgid Cell &uarr;</text><text x='290' y='125' fill='#047857' font-size='7' text-anchor='middle'>Water Enters</text><rect x='345' y='60' width='80' height='75' rx='4' fill='#ffffff' stroke='#dc2626'/><text x='385' y='75' fill='#b91c1c' font-size='8' font-weight='bold' text-anchor='middle'>HYPERTONIC</text><circle cx='385' cy='105' r='14' fill='#fecaca' stroke='#ef4444' stroke-width='1.5'/><text x='385' y='108' fill='#991b1b' font-size='7.5' font-weight='bold' text-anchor='middle'>Plasmolyzed</text><text x='385' y='125' fill='#b91c1c' font-size='7' text-anchor='middle'>Water Exits &darr;</text><text x='335' y='152' fill='#166534' font-size='8' font-weight='bold' text-anchor='middle'>&Delta;Mass = Net Osmotic Water Flux</text><text x='230' y='188' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Optical Magnification (10x &times; 40x = 400x) &amp; Cellular Osmotic Dynamics &#x2713;</text></svg>",
        "diagramLabel": "Compound light microscope optics and cellular osmosis diagram",
        "diagramCaption": "Biological Laboratory Methods: Compound optical microscope magnification pathway alongside cellular osmotic responses across hypotonic and hypertonic solute environments.",
        "references": [
            {"title": "NGSS Standard HS-LS1-2 (Cellular Organization & System Function)", "desc": "Develop and use a model to illustrate the hierarchical organization of interacting systems that provide specific functions within multicellular organisms.", "url": "/pages/standards.php?domain=SCIENCE-LS", "icon": "fas fa-award"},
            {"title": "HHMI BioInteractive Virtual Lab Modules", "desc": "Howard Hughes Medical Institute interactive simulated biology labs on bacterial identification and immunology.", "url": "https://www.biointeractive.org/classroom-resources", "icon": "fas fa-flask"},
            {"title": "Carolina Biological Laboratory Safety & Standards", "desc": "National science education protocol guides for laboratory microscopy, microbiology aseptic technique, and specimen handling.", "url": "https://www.carolina.com/teacher-resources", "icon": "fas fa-microscope"}
        ]
    },

    "Chemistry Demos": {
        "title": "Chemistry Demos",
        "category": "Science Experiments",
        "definition": "Chemistry demonstrations and analytical laboratory investigations provide quantitative empirical confirmation of chemical stoichiometry, thermodynamics, and kinetics. High-impact laboratory procedures include: Volumetric Acid-Base Titration to determine unknown analyte concentrations using standardized titrants, burets, and colorimetric pH indicators (such as phenolphthalein reaching its stoichiometric equivalence endpoint); Constant-Pressure Coffee-Cup Calorimetry quantifying enthalpy changes of reaction (&Delta;H_rxn = q_rxn / n) via the specific heat capacity formula q = mc&Delta;T; and Gravimetric Precipitation Analysis validating solubility rules through the stoichiometry of double displacement reactions and calculated percentage yield.",
        "basicDefinition": "Chemistry demos are experiments where chemicals react right in front of your eyes! You can see color changes, bubbling gases, and heat changes. One classic lab is titration, where scientists drip one liquid into another with a dropper until an indicator suddenly turns pink, telling them the exact strength of the liquid.",
        "breakdown": [
            {
                "label": "Volumetric Titration",
                "text": "Using a calibrated glass buret to drop an acid or base until the indicator changes color at the precise neutralization equivalence point (MaVa = MbVb)."
            },
            {
                "label": "Calorimetry & Enthalpy",
                "text": "Measuring temperature changes in an insulated calorimeter to determine how much heat is absorbed (endothermic) or released (exothermic) during a reaction (q = mc&Delta;T)."
            },
            {
                "label": "Stoichiometric Percent Yield",
                "text": "Comparing the actual mass of product collected in the lab against the theoretical maximum predicted by balanced chemical equations."
            }
        ],
        "example": "Standard Analysis: 'A student titrates 25.0 mL of unknown HCl solution to its phenolphthalein endpoint using exactly 18.5 mL of 0.100 M standardized NaOH. Calculating molarity: M_A = (M_B * V_B) / V_A = (0.100 M * 18.5 mL) / 25.0 mL = 0.0740 M HCl, demonstrating stoichiometric neutralization.'",
        "basicExample": "Simple Sentence: 'In a titration demo, adding just one tiny final drop of base makes clear vinegar turn bright magenta pink!'",
        "proTip": "Reading a Buret or Graduated Cylinder: Always read the liquid level at the BOTTOM of the curved meniscus with your eyes positioned directly level to the graduation mark to prevent parallax error!",
        "question": "In an acid-base titration, what is the term for the precise experimental moment when an added chemical indicator permanently changes color?",
        "choices": [
            "The boiling point",
            "The endpoint",
            "The freezing point"
        ],
        "correctIndex": 1,
        "explanation": "The endpoint is the experimental point in a titration indicated by a visual color transition of the chemical indicator, closely approximating the theoretical equivalence point.",
        "equations": [
            {
                "title": "Volumetric Titration Equivalence Formula",
                "latex": "M_A V_A n_A = M_B V_B n_B \\implies M_A = \\frac{M_B V_B}{V_A} \\quad (\\text{for } 1:1 \\text{ stoichiometry})",
                "note": "Calculates concentration of unknown acid or base analyte from titrant volume consumed."
            },
            {
                "title": "Specific Heat & Calorimetric Heat Transfer",
                "latex": "q = m \\cdot c \\cdot \\Delta T \\quad (q = \\text{Heat in Joules}, \\, c = \\text{Specific Heat}, \\, \\Delta T = T_f - T_i)",
                "note": "Quantifies enthalpy exchange absorbed or released during chemical dissolution or neutralization."
            },
            {
                "title": "Percent Yield Stoichiometric Efficiency",
                "latex": "\\text{Percent Yield} = \\left(\\frac{\\text{Actual Mass Recovered}}{\\text{Theoretical Calculated Maximum}}\\right) \\times 100\\%",
                "note": "Measures reaction efficiency and recovery completeness in synthetic chemistry laboratory demos."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Volumetric Acid-Base Titration Setup Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='190' height='145' rx='6' fill='#fef2f2' stroke='#ef4444' stroke-width='1.5'/><text x='120' y='44' fill='#991b1b' font-size='10' font-weight='bold' text-anchor='middle'>TITRATION APPARATUS</text><rect x='112' y='55' width='16' height='70' fill='#ffffff' stroke='#334155'/><line x1='112' y1='65' x2='120' y2='65' stroke='#ef4444' stroke-width='1'/><line x1='112' y1='80' x2='120' y2='80' stroke='#ef4444' stroke-width='1'/><line x1='112' y1='95' x2='120' y2='95' stroke='#ef4444' stroke-width='1'/><text x='95' y='90' fill='#64748b' font-size='7'>Buret</text><circle cx='120' cy='128' r='4' fill='#334155'/><text x='140' y='130' fill='#475569' font-size='7'>Stopcock</text><path d='M 105 138 L 135 138 L 150 160 L 90 160 Z' fill='#ffffff' stroke='#334155'/><path d='M 95 152 L 145 152 L 148 160 L 92 160 Z' fill='#f472b6'/><text x='120' y='158' fill='#831843' font-size='6.5' font-weight='bold' text-anchor='middle'>Analyte + Indicator</text><rect x='245' y='25' width='190' height='145' rx='6' fill='#eff6ff' stroke='#3b82f6' stroke-width='1.5'/><text x='340' y='44' fill='#1e40af' font-size='10' font-weight='bold' text-anchor='middle'>TITRATION CURVE &amp; PH</text><line x1='265' y1='145' x2='415' y2='145' stroke='#334155' stroke-width='1.5'/><line x1='265' y1='145' x2='265' y2='55' stroke='#334155' stroke-width='1.5'/><text x='255' y='65' fill='#1e40af' font-size='7' font-weight='bold'>pH 14</text><text x='255' y='103' fill='#1e40af' font-size='7' font-weight='bold'>pH 7</text><text x='255' y='142' fill='#1e40af' font-size='7' font-weight='bold'>pH 0</text><path d='M 268 138 C 310 138 325 130 335 100 C 345 70 360 65 410 63' stroke='#ec4899' stroke-width='2.5' fill='none'/><circle cx='335' cy='100' r='4' fill='#db2777'/><text x='370' y='102' fill='#be185d' font-size='7.5' font-weight='bold'>Equivalence (pH 7.0)</text><text x='340' y='160' fill='#475569' font-size='7.5' text-anchor='middle'>Volume of Titrant Added (mL) &rarr;</text><text x='230' y='188' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Precision Volumetric Quantitative Chemical Analysis (MaVa = MbVb) &#x2713;</text></svg>",
        "diagramLabel": "Volumetric acid-base titration setup and titration curve diagram",
        "diagramCaption": "Analytical Chemistry Laboratory: Volumetric buret titration apparatus beside the characteristic sigmoidal pH neutralization curve marking stoichiometric equivalence.",
        "references": [
            {"title": "NGSS Standard HS-PS1-7 (Conservation of Atoms & Stoichiometry)", "desc": "Use mathematical representations to support the claim that atoms, and therefore mass, are conserved during a chemical reaction.", "url": "/pages/standards.php?domain=SCIENCE-PS", "icon": "fas fa-award"},
            {"title": "American Chemical Society (ACS Education & ChemMatters)", "desc": "Official ACS guidelines for safe secondary laboratory experiments, green chemistry demos, and chemical storage.", "url": "https://www.acs.org/education.html", "icon": "fas fa-flask"},
            {"title": "Royal Society of Chemistry Classic Chemistry Demos", "desc": "Curated compendium of demonstration protocols illustrating chemical principles, thermodynamics, and kinetics.", "url": "https://edu.rsc.org/resources/collections/classic-chemistry-demonstrations", "icon": "fas fa-vial"}
        ]
    },

    "Physics Simulations": {
        "title": "Physics Simulations",
        "category": "Science Experiments",
        "definition": "Interactive physics simulations and digital laboratories provide virtual environments to model physical phenomena where friction, drag, and air resistance can be isolated or systematically dialed in. Foundational simulation archetypes include: 2D Projectile Motion computing parabolic ballistic trajectories split into independent orthogonal kinematics vectors (x(t) = v_0 cos&theta; * t and y(t) = v_0 sin&theta; * t - 0.5gt&sup2;); Simple Harmonic Motion investigating gravitational pendulum oscillations where period depends strictly on pendulum string length (T = 2&pi;&radic;(L/g)) independent of bob mass; and Circuit Breadboard Simulations verifying Ohm's Law (V = IR) and Kirchhoff's loop and junction conservation laws across series and parallel electrical networks.",
        "basicDefinition": "Physics simulations are digital lab experiments on computers where you can launch cannonballs, swing pendulums, or build electrical circuits! Because it is a computer simulation, you can turn off air resistance, change the gravity to match the Moon or Mars, and test what happens safely and instantly.",
        "breakdown": [
            {
                "label": "2D Projectile Trajectory",
                "text": "Horizontal speed stays constant while gravity pulls downward at 9.8 m/s&sup2;, creating a smooth parabolic trajectory curve."
            },
            {
                "label": "Pendulum Oscillations",
                "text": "A pendulum's swing time (period) depends ONLY on its string length and gravity (T = 2&pi;&radic;(L/g)) - NOT on how heavy the pendulum weight is!"
            },
            {
                "label": "Virtual Circuit Construction",
                "text": "Connecting batteries, resistors, and light bulbs to observe how current divides in parallel branches and voltage drops across resistors."
            }
        ],
        "example": "Standard Analysis: 'In a PhET projectile simulation firing a soccer ball at v0 = 20 m/s at an angle of &theta; = 45&deg; without air resistance, the ball achieves a theoretical horizontal range of R = (v0&sup2; * sin(2&theta;)) / g = (400 * 1) / 9.8 = 40.82 meters, which matches the virtual digital measuring tape exactly.'",
        "basicExample": "Simple Sentence: 'In a virtual space simulation, you can see that a pendulum swings much more slowly on the Moon because the Moon's gravity is six times weaker than Earth's!'",
        "proTip": "Remember the 45-degree angle rule: For any projectile launched across flat level ground without air resistance, an angle of exactly 45 degrees always produces the MAXIMUM horizontal launch distance!",
        "question": "What is the only factor among the following that determines the period (swing time) of a simple pendulum under constant gravity?",
        "choices": [
            "The mass of the hanging bob",
            "The length of the pendulum string",
            "The color of the hanging bob"
        ],
        "correctIndex": 1,
        "explanation": "The period of a simple pendulum is T = 2&pi;&radic;(L/g); it depends strictly on pendulum length L and gravitational field g, independent of bob mass.",
        "equations": [
            {
                "title": "Ideal Pendulum Period Formula (Simple Harmonic Motion)",
                "latex": "T = 2\\pi \\sqrt{\\frac{L}{g}} \\quad (T = \\text{Period in Seconds}, \\, L = \\text{String Length}, \\, g = 9.8\\,\\text{m/s}^2)",
                "note": "Demonstrates period is strictly proportional to the square root of string length."
            },
            {
                "title": "2D Parabolic Projectile Range Equation",
                "latex": "R = \\frac{v_0^2 \\sin(2\\theta)}{g} \\quad (\\text{Maximum range occurs at launch angle } \\theta = 45^\\circ)",
                "note": "Calculates horizontal distance traversed by a ballistic projectile launched over level terrain."
            },
            {
                "title": "Ohm's Law & Circuit Equivalent Resistance",
                "latex": "V = IR, \\quad R_{\\text{series}} = \\sum R_i, \\quad \\frac{1}{R_{\\text{parallel}}} = \\sum \\frac{1}{R_i}",
                "note": "Governs virtual circuit current flow, electrical potential differences, and component resistance."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='2D Projectile Motion Trajectory Simulation Diagram'><rect width='100%' height='100%' fill='#0f172a' rx='8'/><line x1='35' y1='155' x2='425' y2='155' stroke='#475569' stroke-width='2'/><path d='M 50 155 Q 235 30 410 155' stroke='#38bdf8' stroke-width='2.5' fill='none' stroke-dasharray='5'/><circle cx='50' cy='155' r='6' fill='#f59e0b'/><path d='M 50 155 L 95 110' stroke='#10b981' stroke-width='2' marker-end='url(#arrow)'/><text x='85' y='105' fill='#34d399' font-size='9' font-weight='bold'>v0 (Launch Vector)</text><path d='M 70 155 A 20 20 0 0 0 65 140' stroke='#fbbf24' stroke-width='1.5' fill='none'/><text x='78' y='148' fill='#fbbf24' font-size='8' font-weight='bold'>&theta; = 45&deg;</text><circle cx='230' cy='92' r='6' fill='#38bdf8'/><path d='M 230 92 L 230 120' stroke='#ef4444' stroke-width='2'/><text x='238' y='115' fill='#f87171' font-size='8' font-weight='bold'>g = -9.8 m/s&sup2;</text><text x='230' y='75' fill='#7dd3fc' font-size='8' font-weight='bold' text-anchor='middle'>Peak Height (vy = 0)</text><circle cx='410' cy='155' r='6' fill='#ec4899'/><line x1='50' y1='168' x2='410' y2='168' stroke='#94a3b8' stroke-width='1.5'/><text x='230' y='180' fill='#94a3b8' font-size='8.5' font-weight='bold' text-anchor='middle'>Total Range R = (v0&sup2; * sin(2&theta;)) / g</text><text x='230' y='28' fill='#38bdf8' font-size='10' font-weight='bold' text-anchor='middle'>PROJECTILE TRAJECTORY KINEMATICS SIMULATION</text></svg>",
        "diagramLabel": "2D Projectile kinematics ballistic simulation diagram",
        "diagramCaption": "Simulated Physics Mechanics: Parabolic ballistic projectile trajectory illustrating initial launch velocity vector v0, apex deceleration, and total horizontal range under Earth gravity.",
        "references": [
            {"title": "NGSS Standard HS-PS2-1 (Newton's Second Law & Kinematics)", "desc": "Analyze data to support the claim that Newton's second law of motion describes the mathematical relationship among net force, mass, and acceleration.", "url": "/pages/standards.php?domain=SCIENCE-PS", "icon": "fas fa-award"},
            {"title": "PhET Interactive Simulations (University of Colorado Boulder)", "desc": "Award-winning research-backed physics simulations for projectile motion, pendulums, Faraday electromagnetic labs, and circuit construction kits.", "url": "https://phet.colorado.edu", "icon": "fas fa-laptop-code"},
            {"title": "American Association of Physics Teachers (AAPT ComPADRE)", "desc": "Physics education computational modeling resources, Open Source Physics simulations, and digital curricula.", "url": "https://www.compadre.org", "icon": "fas fa-atom"}
        ]
    },

    "At-Home Experiments": {
        "title": "At-Home Experiments",
        "category": "Science Experiments",
        "definition": "At-home scientific investigations empower self-directed empirical discovery using accessible household materials while adhering rigorously to the scientific method and laboratory safety principles. A rigorous experimental design requires: formulating a testable falsifiable hypothesis; establishing an experimental control group; manipulating exactly one Independent Variable (IV) at a time while keeping all Controlled Variables strictly invariant; systematically measuring the quantitative Dependent Variable (DV); and performing replicate trials (n &ge; 3) to compute statistical means (&mu;) and percentage error. Classic safe kitchen science investigations include: DIY red cabbage anthocyanin pH indicators; paper chromatography separating ink pigments; baking soda and vinegar gas production stoichiometry; and capillary action fluid transport in celery stalks.",
        "basicDefinition": "At-home experiments are fun, safe science investigations you can do right in your kitchen! You can make a homemade pH test using purple cabbage juice, separate colors in markers using water and coffee filters, or build a baking soda volcano. The most important rule of real science is to change only ONE thing at a time so you know what caused your result!",
        "breakdown": [
            {
                "label": "The 3 Experimental Variables",
                "text": "Independent Variable (the ONE factor you choose to change); Dependent Variable (the result you measure); Controlled Variables (everything kept strictly the same)."
            },
            {
                "label": "Red Cabbage pH Indicator",
                "text": "Boiled red cabbage juice contains natural anthocyanin dye that turns red/pink in acids (lemon juice), purple in neutral water, and green/yellow in bases (baking soda)."
            },
            {
                "label": "Replication & Percentage Error",
                "text": "Always repeat an experiment at least three times to ensure results are reliable, consistent, and not just accidental flukes."
            }
        ],
        "example": "Standard Analysis: 'In an at-home yeast fermentation experiment testing sugar concentration (IV) against carbon dioxide balloon inflation volume (DV), keeping water temperature constant at 37&deg;C (Controlled Variable) ensures that any observed rate acceleration is solely attributable to substrate availability.'",
        "basicExample": "Simple Sentence: 'If you want to test which fertilizer makes plants grow tallest, you must give every plant the exact same amount of sunlight and water, changing only the brand of plant food.'",
        "proTip": "The Golden Rule of Science: 'Fair Testing!' If you change two things at once (like giving one plant more fertilizer AND more water), you will never know which factor actually made it grow taller! Always isolate a single variable!",
        "question": "In a controlled experiment testing how temperature affects how fast sugar dissolves in water, what is the Independent Variable?",
        "choices": [
            "The temperature of the water",
            "The time it takes for sugar to dissolve",
            "The type and amount of sugar used"
        ],
        "correctIndex": 0,
        "explanation": "The Independent Variable is the condition deliberately changed by the experimenter (the water temperature); the dissolution time is the Dependent Variable.",
        "equations": [
            {
                "title": "The Empirical Scientific Method Sequence",
                "latex": "\\text{Observation} \\to \\text{Hypothesis} \\to \\text{Controlled Experiment} \\to \\text{Data Analysis} \\to \\text{Conclusion}",
                "note": "The universal iterative cycle of empirical inquiry and hypothesis testing."
            },
            {
                "title": "Experimental Percentage Error Formula",
                "latex": "\\text{Percent Error} = \\left| \\frac{\\text{Experimental Value} - \\text{Theoretical Value}}{\\text{Theoretical Value}} \\right| \\times 100\\%",
                "note": "Quantifies experimental measurement accuracy relative to established accepted values."
            },
            {
                "title": "Sample Mean of Replicate Experimental Trials",
                "latex": "\\bar{x} = \\frac{\\sum_{i=1}^n x_i}{n} \\quad (n = \\text{Number of Replicate Trials})",
                "note": "Calculates central tendency to minimize random experimental measurement errors."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Controlled Scientific Experiment Variable Matrix Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='120' height='145' rx='6' fill='#eff6ff' stroke='#3b82f6' stroke-width='1.5'/><text x='85' y='46' fill='#1e40af' font-size='9' font-weight='bold' text-anchor='middle'>INDEPENDENT (IV)</text><rect x='35' y='60' width='100' height='40' rx='4' fill='#3b82f6'/><text x='85' y='77' fill='#ffffff' font-size='8' font-weight='bold' text-anchor='middle'>WHAT I CHANGE</text><text x='85' y='92' fill='#dbeafe' font-size='7' text-anchor='middle'>(Only 1 Factor!)</text><text x='85' y='120' fill='#1e3a8a' font-size='7.5' text-anchor='middle'>e.g., Water Temp,</text><text x='85' y='132' fill='#1e3a8a' font-size='7.5' text-anchor='middle'>Light Color, Fertilizer</text><path d='M 148 100 L 168 100' stroke='#3b82f6' stroke-width='2' marker-end='url(#arrow)'/><rect x='170' y='25' width='120' height='145' rx='6' fill='#f0fdf4' stroke='#16a34a' stroke-width='1.5'/><text x='230' y='46' fill='#166534' font-size='9' font-weight='bold' text-anchor='middle'>DEPENDENT (DV)</text><rect x='180' y='60' width='100' height='40' rx='4' fill='#16a34a'/><text x='230' y='77' fill='#ffffff' font-size='8' font-weight='bold' text-anchor='middle'>WHAT I MEASURE</text><text x='230' y='92' fill='#dcfce7' font-size='7' text-anchor='middle'>(The Result / Data)</text><text x='230' y='120' fill='#14532d' font-size='7.5' text-anchor='middle'>e.g., Plant Height,</text><text x='230' y='132' fill='#14532d' font-size='7.5' text-anchor='middle'>Dissolving Time</text><path d='M 293 100 L 313 100' stroke='#16a34a' stroke-width='2' marker-end='url(#arrow)'/><rect x='315' y='25' width='120' height='145' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='375' y='46' fill='#92400e' font-size='9' font-weight='bold' text-anchor='middle'>CONTROLLED</text><rect x='325' y='60' width='100' height='40' rx='4' fill='#d97706'/><text x='375' y='77' fill='#ffffff' font-size='8' font-weight='bold' text-anchor='middle'>KEPT CONSTANT</text><text x='375' y='92' fill='#fef3c7' font-size='7' text-anchor='middle'>(All Other Things)</text><text x='375' y='120' fill='#78350f' font-size='7.5' text-anchor='middle'>e.g., Same Pot Size,</text><text x='375' y='132' fill='#78350f' font-size='7.5' text-anchor='middle'>Same Soil, Same Room</text><text x='230' y='188' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Controlled Empirical Testing: Change 1 Factor &rarr; Measure Output &rarr; Keep Others Constant &#x2713;</text></svg>",
        "diagramLabel": "Scientific method experimental variable matrix diagram",
        "diagramCaption": "The Scientific Inquiry Matrix: Isolating a single Independent Variable (IV) to measure its effect on the Dependent Variable (DV) while holding Controlled Variables constant.",
        "references": [
            {"title": "NGSS Standard MS-ETS1-2 (Engineering & Scientific Design)", "desc": "Evaluate competing design solutions using a systematic process to determine how well they meet the criteria and constraints of the problem.", "url": "/pages/standards.php?domain=SCIENCE-ETS", "icon": "fas fa-award"},
            {"title": "Science Buddies (Hands-On STEM Project Guides)", "desc": "Nonprofit science fair project compendium, experimental variable tutorials, and kitchen science protocols.", "url": "https://www.sciencebuddies.org", "icon": "fas fa-lightbulb"},
            {"title": "National Science Teaching Association (NSTA Safe Inquiry)", "desc": "Official NSTA safety portal and inquiry standards for classroom and home-based STEM investigations.", "url": "https://www.nsta.org/safety-science-classroom", "icon": "fas fa-shield-alt"}
        ]
    }
,

    "Latest Discoveries": {
        "title": "Latest Discoveries",
        "category": "Science Articles & News",
        "definition": "Modern scientific discovery advances through rigorous peer-reviewed empirical research, interdisciplinary collaboration, and technological breakthroughs across genomics, quantum information science, and astrophysics. Recent paradigm-shifting milestones include: CRISPR-Cas9 programmable endonuclease gene editing; quantum computational advantage utilizing quantum superposition (|&psi;&rang; = &alpha;|0&rang; + &beta;|1&rang;) and entanglement; James Webb Space Telescope (JWST) infrared observations detecting early cosmological galaxies forming within 300 million years of the Big Bang; and room-temperature superconducting material investigations. Before any novel finding is accepted by the scientific community, it must undergo peer review: rigorous critical examination by independent domain experts, replication by independent laboratories, and verification of statistical significance (p < 0.05).",
        "basicDefinition": "Latest Discoveries are the newest breakthroughs in science! Scientists from around the world work together using giant space telescopes, supercomputers, and genetic tools like CRISPR to cure diseases and explore distant galaxies. Before a discovery is believed, other scientists must test it carefully to make sure the evidence is 100% real and repeatable.",
        "breakdown": [
            {
                "label": "The Peer-Review Process",
                "text": "Before research is published in academic journals like Nature or Science, independent expert scientists review data, methodology, and statistical validity to eliminate bias and errors."
            },
            {
                "label": "CRISPR & Gene Editing",
                "text": "Molecular scissors derived from bacterial immune systems that allow scientists to precisely rewrite DNA sequences to treat genetic illnesses like sickle cell anemia."
            },
            {
                "label": "Deep Space JWST Discoveries",
                "text": "Infrared space astronomy looking billions of years back in time to reveal the earliest stars, galaxies, and atmospheric chemical signatures of habitable exoplanets."
            }
        ],
        "example": "Standard Analysis: 'Astronomers analyzing JWST transmission spectroscopy data discovered atmospheric methane (CH4) and carbon dioxide (CO2) on exoplanet K2-18b, with a statistical confidence level exceeding 5-sigma (p < 3 &times; 10^-7), indicating high empirical reliability.'",
        "basicExample": "Simple Sentence: 'Astronomers used the James Webb Space Telescope to take photos of galaxies that formed when the universe was just a baby!'",
        "proTip": "Critical Reading Tip: When reading science news headlines, always look for the original peer-reviewed source! Headlines that say 'Scientists Just Discovered...' often exaggerate preliminary lab trials that haven't been confirmed in human trials yet!",
        "question": "Why must scientific research papers undergo blind peer review before being published in respected academic journals?",
        "choices": [
            "To ensure the paper is translated into all foreign languages",
            "To verify experimental methods, statistical accuracy, and eliminate bias",
            "To let politicians vote on whether the facts are acceptable"
        ],
        "correctIndex": 1,
        "explanation": "Peer review ensures that independent experts evaluate research design, statistical methodology, and conclusions to maintain rigorous scientific standards.",
        "equations": [
            {
                "title": "Statistical Significance & Replicability Threshold",
                "latex": "p\\text{-value} < \\alpha \\quad (\\alpha = 0.05 \\implies 95\\% \\text{ confidence that results are not random fluke})",
                "note": "Standard quantitative criterion for rejecting the null hypothesis in scientific trials."
            },
            {
                "title": "Quantum State Superposition Principle",
                "latex": "|\\psi\\rangle = \\alpha |0\\rangle + \\beta |1\\rangle \\quad (|\\alpha|^2 + |\\beta|^2 = 1)",
                "note": "Mathematical state representation powering quantum computational processing power."
            },
            {
                "title": "Michaelis-Menten Enzymatic Cleavage Rate",
                "latex": "v = \\frac{V_{\\max} [S]}{K_m + [S]} \\quad (\\text{Governs CRISPR-Cas9 Target Binding & Cutting})",
                "note": "Enzyme kinetic equation modeling targeted DNA strand cleavage velocity."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='The Scientific Peer-Review and Publication Workflow Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='15' y='45' width='90' height='100' rx='6' fill='#eff6ff' stroke='#3b82f6' stroke-width='1.5'/><text x='60' y='68' fill='#1e40af' font-size='9' font-weight='bold' text-anchor='middle'>1. RESEARCH</text><circle cx='60' cy='95' r='16' fill='#3b82f6'/><text x='60' y='99' fill='#ffffff' font-size='10' font-weight='bold' text-anchor='middle'>Lab</text><text x='60' y='125' fill='#1e3a8a' font-size='7.5' text-anchor='middle'>Hypothesis &amp;</text><text x='60' y='136' fill='#1e3a8a' font-size='7.5' text-anchor='middle'>Data Collection</text><path d='M 108 95 L 122 95' stroke='#3b82f6' stroke-width='2' marker-end='url(#arrow)'/><rect x='125' y='45' width='95' height='100' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='172' y='68' fill='#92400e' font-size='9' font-weight='bold' text-anchor='middle'>2. SUBMISSION</text><rect x='147' y='82' width='50' height='26' rx='3' fill='#d97706'/><text x='172' y='98' fill='#ffffff' font-size='8' font-weight='bold' text-anchor='middle'>Manuscript</text><text x='172' y='125' fill='#78350f' font-size='7.5' text-anchor='middle'>Sent to Journal</text><text x='172' y='136' fill='#78350f' font-size='7.5' text-anchor='middle'>Academic Editors</text><path d='M 223 95 L 237 95' stroke='#d97706' stroke-width='2' marker-end='url(#arrow)'/><rect x='240' y='45' width='95' height='100' rx='6' fill='#fee2e2' stroke='#ef4444' stroke-width='1.5'/><text x='287' y='68' fill='#991b1b' font-size='9' font-weight='bold' text-anchor='middle'>3. PEER REVIEW</text><rect x='262' y='82' width='50' height='26' rx='3' fill='#ef4444'/><text x='287' y='98' fill='#ffffff' font-size='8' font-weight='bold' text-anchor='middle'>3 Experts</text><text x='287' y='125' fill='#991b1b' font-size='7.5' text-anchor='middle'>Fact-Check &amp;</text><text x='287' y='136' fill='#991b1b' font-size='7.5' text-anchor='middle'>Verify Stats</text><path d='M 338 95 L 352 95' stroke='#ef4444' stroke-width='2' marker-end='url(#arrow)'/><rect x='355' y='45' width='90' height='100' rx='6' fill='#f0fdf4' stroke='#16a34a' stroke-width='1.5'/><text x='400' y='68' fill='#166534' font-size='9' font-weight='bold' text-anchor='middle'>4. PUBLISH</text><circle cx='400' cy='95' r='16' fill='#16a34a'/><text x='400' y='99' fill='#ffffff' font-size='9' font-weight='bold' text-anchor='middle'>&#x2713;</text><text x='400' y='125' fill='#14532d' font-size='7.5' text-anchor='middle'>Accepted into</text><text x='400' y='136' fill='#14532d' font-size='7.5' text-anchor='middle'>Global Archives</text><text x='230' y='25' fill='#1e293b' font-size='11' font-weight='bold' text-anchor='middle'>THE PEER-REVIEWED SCIENTIFIC PUBLISHING PATHWAY</text><text x='230' y='180' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Independent Verification &bull; Replicable Data &bull; Falsifiable Hypotheses &#x2713;</text></svg>",
        "diagramLabel": "The peer-reviewed scientific discovery and publishing pathway diagram",
        "diagramCaption": "The Scientific Method in Action: The step-by-step peer-review publication pipeline ensuring empirical rigor, independent replication, and statistical integrity before public archiving.",
        "references": [
            {"title": "American Association for the Advancement of Science (AAAS / Science)", "desc": "Leading global scientific publisher and policy organization promoting scientific discovery and education.", "url": "https://www.science.org", "icon": "fas fa-newspaper"},
            {"title": "Nature International Journal of Science", "desc": "Premieres peer-reviewed primary research across molecular biology, astronomy, quantum physics, and climate.", "url": "https://www.nature.com", "icon": "fas fa-book-open"},
            {"title": "Science News & Science News Explores", "desc": "Journalistic resource providing accessible, verified scientific journalism for students and educators.", "url": "https://www.sciencenews.org", "icon": "fas fa-graduation-cap"}
        ]
    },

    "Environmental Science News": {
        "title": "Environmental Science News",
        "category": "Science Articles & News",
        "definition": "Environmental science integrates ecology, atmospheric chemistry, oceanography, and resource economics to evaluate planetary biosphere health and anthropogenically driven global changes. Current empirical focal points include: Atmospheric Greenhouse Gas Radiative Forcing (&Delta;F = 5.35 ln(C / C_0) W/m&sup2;) driven by carbon dioxide (exceeding 420 ppm) and methane emissions trapping outgoing infrared radiation; Ocean Acidification, where dissolved CO2 reacts with seawater forming carbonic acid (H2CO3) that reduces pH and depletes carbonate ions (CO3^2-) essential for calcifying marine organisms like coral reefs; and Renewable Energy Transitions scaling photovoltaic solar power generation (P = &eta;AG) and wind turbine kinetic capture to decouple global energy from fossil fuels.",
        "basicDefinition": "Environmental Science News explores how our planet is changing and how scientists are working to protect it. Burning fuels adds carbon dioxide gas to the air, which traps heat like a cozy winter blanket (the Greenhouse Effect) and makes ocean water slightly more acidic. Scientists are inventing better solar panels, electric batteries, and clean wind power to protect Earth.",
        "breakdown": [
            {
                "label": "The Greenhouse Effect",
                "text": "Solar light enters Earth's atmosphere, heats the surface, and is re-emitted as infrared heat, which greenhouse gases (CO2, CH4, H2O) trap in the troposphere."
            },
            {
                "label": "Ocean Acidification",
                "text": "Oceans absorb 30% of human-made carbon dioxide, forming carbonic acid that lowers ocean pH and dissolves the calcium carbonate shells of oysters, clams, and corals."
            },
            {
                "label": "Clean Renewable Energy",
                "text": "Transitioning power grids to solar photovoltaics, wind energy, and geothermal power to eliminate carbon emissions."
            }
        ],
        "example": "Standard Analysis: 'Pre-industrial atmospheric CO2 was C0 = 280 ppm. At current levels of C = 422 ppm, the radiative forcing is &Delta;F = 5.35 * ln(422 / 280) = 5.35 * ln(1.507) = 5.35 * 0.410 = +2.19 W/m&sup2;, causing net thermodynamic energy accumulation across the planetary climate system.'",
        "basicExample": "Simple Sentence: 'Just like a car parked in the sun with closed windows gets blazing hot inside, greenhouse gases trap heat in Earth's atmosphere.'",
        "proTip": "The Difference Between 'Ozone Layer' and 'Global Warming': Many students mix these up! The ozone hole was caused by CFCs letting in ultraviolet UV light. Global warming is caused by greenhouse gases trapping INFRARED heat. They are two totally different atmospheric issues!",
        "question": "What happens to the chemistry of ocean seawater when it absorbs excess carbon dioxide (CO2) from the atmosphere?",
        "choices": [
            "The seawater becomes more basic and pH rises",
            "The seawater forms carbonic acid, causing pH to decrease (ocean acidification)",
            "The seawater completely evaporates into space"
        ],
        "correctIndex": 1,
        "explanation": "Dissolved CO2 reacts with seawater to form carbonic acid (H2CO3), releasing hydrogen ions that lower ocean pH and reduce carbonate available for shellfish.",
        "equations": [
            {
                "title": "Greenhouse Gas Radiative Forcing Equation",
                "latex": "\\Delta F = 5.35 \\ln\\left(\\frac{C}{C_0}\\right) \\,\\text{W/m}^2 \\quad (C = \\text{Current CO}_2, \\, C_0 = \\text{Pre-Industrial 280 ppm})",
                "note": "Quantifies net thermal energy trapped per square meter of Earth's surface."
            },
            {
                "title": "Ocean Acidification Equilibrium Reaction",
                "latex": "\\text{CO}_2 + \\text{H}_2\\text{O} \\rightleftharpoons \\text{H}_2\\text{CO}_3 \\rightleftharpoons \\text{H}^+ + \\text{HCO}_3^- \\rightleftharpoons 2\\text{H}^+ + \\text{CO}_3^{2-}",
                "note": "Demonstrates the cascade that increases acidity [H+] and depletes carbonate ions [CO3^2-]."
            },
            {
                "title": "Photovoltaic Solar Power Conversion Efficiency",
                "latex": "P_{\\text{solar}} = \\eta \\cdot A \\cdot G \\quad (\\eta = \\text{Efficiency}, \\, A = \\text{Area in m}^2, \\, G = \\text{Irradiance W/m}^2)",
                "note": "Calculates electrical wattage produced by solar panels under ambient sunlight."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='The Greenhouse Effect and Ocean Acidification Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='25' width='190' height='145' rx='6' fill='#eff6ff' stroke='#3b82f6' stroke-width='1.5'/><text x='120' y='44' fill='#1e40af' font-size='10' font-weight='bold' text-anchor='middle'>THE GREENHOUSE EFFECT</text><circle cx='50' cy='65' r='12' fill='#f59e0b'/><path d='M 58 72 L 95 110' stroke='#f59e0b' stroke-width='2' marker-end='url(#arrow)'/><text x='85' y='92' fill='#b45309' font-size='7'>Solar Radiation</text><rect x='35' y='140' width='170' height='20' fill='#16a34a'/><text x='120' y='154' fill='#ffffff' font-size='8' font-weight='bold' text-anchor='middle'>Earth Surface Absorbs &amp; Warms</text><path d='M 120 138 Q 145 95 125 70' stroke='#ef4444' stroke-width='2' stroke-dasharray='3'/><text x='140' y='85' fill='#dc2626' font-size='7' font-weight='bold'>Infrared Heat</text><path d='M 125 70 Q 155 75 160 115' stroke='#ef4444' stroke-width='2' marker-end='url(#arrow)'/><text x='168' y='105' fill='#b91c1c' font-size='6.5' font-weight='bold'>Trapped by CO2</text><rect x='245' y='25' width='190' height='145' rx='6' fill='#e0f2fe' stroke='#0284c7' stroke-width='1.5'/><text x='340' y='44' fill='#0369a1' font-size='10' font-weight='bold' text-anchor='middle'>OCEAN ACIDIFICATION</text><text x='340' y='65' fill='#475569' font-size='8' text-anchor='middle'>Atmospheric CO2 Gas &darr;</text><rect x='255' y='75' width='170' height='85' fill='#0284c7' opacity='0.2'/><text x='340' y='92' fill='#0369a1' font-size='8' font-weight='bold' text-anchor='middle'>CO2 + H2O &rarr; H2CO3 (Carbonic Acid)</text><text x='340' y='110' fill='#dc2626' font-size='8' font-weight='bold' text-anchor='middle'>pH Drops (More Acidic H+)</text><text x='340' y='130' fill='#78350f' font-size='7.5' text-anchor='middle'>Shells &amp; Corals Lose Carbonate &darr;</text><text x='340' y='148' fill='#b91c1c' font-size='7.5' font-weight='bold' text-anchor='middle'>Coral Bleaching &amp; Shell Thinning</text><text x='230' y='188' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Atmospheric Radiative Forcing (&Delta;F) &amp; Oceanic Carbon Equilibrium &#x2713;</text></svg>",
        "diagramLabel": "The greenhouse effect and ocean acidification environmental diagram",
        "diagramCaption": "Environmental Earth Systems: Solar infrared heat entrapment by tropospheric greenhouse gases coupled with ocean carbonic acid equilibrium driving marine acidification.",
        "references": [
            {"title": "Intergovernmental Panel on Climate Change (IPCC Assessment Reports)", "desc": "UN authoritative body evaluating scientific, technical, and socio-economic evidence of global climate change.", "url": "https://www.ipcc.ch", "icon": "fas fa-globe"},
            {"title": "NOAA Climate.gov Educational Resources", "desc": "National Oceanic and Atmospheric Administration official climate data maps, global temperature indices, and sea ice records.", "url": "https://www.climate.gov", "icon": "fas fa-temperature-high"},
            {"title": "EPA Environmental Protection Agency Climate Science", "desc": "US EPA comprehensive guidelines on greenhouse gas inventories, clean water standards, and renewable transitions.", "url": "https://www.epa.gov/climate-change", "icon": "fas fa-leaf"}
        ]
    },

    "Space Exploration Articles": {
        "title": "Space Exploration Articles",
        "category": "Science Articles & News",
        "definition": "Space exploration harnesses aerospace rocketry, orbital mechanics, remote sensing astrobiology, and robotic planetary surface mobility to explore the solar system and beyond. Foundational propulsion dynamics are governed by Konstantin Tsiolkovsky's Rocket Equation: &Delta;v = v_e * ln(m_0 / m_f) = I_sp * g_0 * ln(m_0 / m_f), establishing the maximum delta-v achievable based on rocket mass ratio and propellant specific impulse. To overcome a planet's gravitational well, spacecraft must attain escape velocity (v_esc = &radic;(2GM / R), requiring 11.2 km/s on Earth). Contemporary space milestones include: NASA's Artemis program returning humans to the lunar south pole; Mars Perseverance rover collecting core samples in Jezero Crater to search for ancient biosignatures; and Kepler/TESS/JWST discovering thousands of exoplanets via transit photometry (&Delta;F / F = (R_p / R_*)^2).",
        "basicDefinition": "Space Exploration Articles cover humanity's journey to the Moon, Mars, and beyond! Rockets need enormous speed (over 25,000 miles per hour, called escape velocity) to break free from Earth's gravity. Robot rovers explore Martian craters for ancient fossil signs of water, while space telescopes hunt for Earth-like planets orbiting distant stars.",
        "breakdown": [
            {
                "label": "The Rocket Equation & Escape Velocity",
                "text": "Rockets accelerate by blasting mass out of nozzles; breaking free of Earth's gravity requires achieving an escape velocity of 11.2 km/s (over 25,000 mph)."
            },
            {
                "label": "Mars Robotic Rovers (Perseverance & Curiosity)",
                "text": "Automated laboratories searching for biosignatures, analyzing rock geology, and testing oxygen production from Martian carbon dioxide (MOXIE)."
            },
            {
                "label": "Transit Photometry for Exoplanets",
                "text": "Detecting planets outside our solar system when they cross directly in front of their host star, causing a tiny dip in the star's measured brightness."
            }
        ],
        "example": "Standard Analysis: 'An exoplanet with radius Rp = 1.0 Earth radius transits a solar-type star with radius R* = 1.0 Solar radius. The fractional photometric transit dip depth is &Delta;F / F = (Rp / R*)&sup2; = (6,371 km / 696,340 km)&sup2; &approx; (0.00915)&sup2; &approx; 0.000084, or an 84 parts-per-million dip detectable by high-precision space photometers.'",
        "basicExample": "Simple Sentence: 'When an alien planet passes between its star and our telescope, it blocks a tiny bit of starlight like a mosquito flying past a bright lamp!'",
        "proTip": "Why Rockets Stage: Rockets discard empty fuel tanks as they fly because carrying empty metal deadweight wastes valuable fuel! The Tsiolkovsky equation proves staging is the only practical way to reach orbit!",
        "question": "What is the minimum speed required for an object to overcome Earth's gravitational pull and fly into open space without further propulsion?",
        "choices": [
            "Sound velocity (approx 343 m/s)",
            "Earth escape velocity (approx 11.2 km/s)",
            "Light speed (approx 300,000 km/s)"
        ],
        "correctIndex": 1,
        "explanation": "Earth's escape velocity is v = &radic;(2GM/R) &approx; 11.2 km/s (approx 25,000 mph); any unpowered object moving slower will fall back or enter closed orbit.",
        "equations": [
            {
                "title": "Tsiolkovsky Ideal Rocket Equation",
                "latex": "\\Delta v = v_e \\ln\\left(\\frac{m_0}{m_f}\\right) = I_{\\text{sp}} g_0 \\ln\\left(\\frac{m_0}{m_f}\\right) \\quad (m_0 = \\text{Initial Wet Mass}, \\, m_f = \\text{Dry Mass})",
                "note": "Fundamental governing equation for spacecraft orbital delta-v propulsion."
            },
            {
                "title": "Gravitational Escape Velocity Formula",
                "latex": "v_{\\text{escape}} = \\sqrt{\\frac{2GM}{R}} \\quad (\\text{Earth } v_{\\text{esc}} \\approx 11.2 \\,\\text{km/s})",
                "note": "Minimum parabolic escape velocity required to break free from a gravitational well."
            },
            {
                "title": "Exoplanet Transit Photometric Flux Dip",
                "latex": "\\frac{\\Delta F}{F} = \\left(\\frac{R_{\\text{planet}}}{R_{\\text{star}}}\\right)^2 \\quad (\\Delta F/F = \\text{Transit Depth Percentage})",
                "note": "Relates the fraction of blocked starlight directly to planet-to-star area ratio."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Exoplanet Transit Photometry and Rocket Escape Diagram'><rect width='100%' height='100%' fill='#0f172a' rx='8'/><circle cx='80' cy='85' r='32' fill='#f59e0b' stroke='#fbbf24' stroke-width='2'/><text x='80' y='90' fill='#78350f' font-size='9' font-weight='bold' text-anchor='middle'>Host Star</text><path d='M 120 85 L 180 85' stroke='#38bdf8' stroke-width='1.5' stroke-dasharray='3'/><circle cx='140' cy='85' r='7' fill='#0284c7' stroke='#38bdf8' stroke-width='1.5'/><text x='140' y='105' fill='#7dd3fc' font-size='7.5' font-weight='bold' text-anchor='middle'>Exoplanet</text><rect x='225' y='35' width='210' height='120' rx='6' fill='#1e293b' stroke='#475569'/><text x='330' y='55' fill='#38bdf8' font-size='9' font-weight='bold' text-anchor='middle'>TRANSIT PHOTOMETRY LIGHT CURVE</text><line x1='245' y1='130' x2='415' y2='130' stroke='#64748b' stroke-width='1.5'/><line x1='245' y1='130' x2='245' y2='65' stroke='#64748b' stroke-width='1.5'/><text x='240' y='75' fill='#94a3b8' font-size='7'>100%</text><text x='240' y='105' fill='#94a3b8' font-size='7'>99.9%</text><path d='M 255 75 L 305 75 L 320 105 L 340 105 L 355 75 L 405 75' stroke='#38bdf8' stroke-width='2' fill='none'/><text x='330' y='120' fill='#f472b6' font-size='7.5' font-weight='bold' text-anchor='middle'>Transit Dip &Delta;F/F = (Rp/R*)&sup2;</text><text x='330' y='145' fill='#94a3b8' font-size='7' text-anchor='middle'>Observation Time (Hours) &rarr;</text><text x='230' y='185' fill='#94a3b8' font-size='9' font-weight='bold' text-anchor='middle'>Orbital Rocket Propulsion &amp; Exoplanetary Transit Photometry &#x2713;</text></svg>",
        "diagramLabel": "Exoplanet transit photometry and rocket propulsion diagram",
        "diagramCaption": "Astrophysical Space Exploration: The geometric transit photometry method detecting exoplanets alongside orbital delta-v rocket principles.",
        "references": [
            {"title": "NASA Space Exploration & Artemis Program", "desc": "Official NASA portal for Artemis lunar expeditions, Space Launch System (SLS), and Orion spacecraft.", "url": "https://www.nasa.gov/artemisprogram", "icon": "fas fa-rocket"},
            {"title": "James Webb Space Telescope (JWST STScI)", "desc": "Space Telescope Science Institute portal providing early universe imagery and exoplanet transmission spectra.", "url": "https://webbtelescope.org", "icon": "fas fa-satellite"},
            {"title": "The Planetary Society (Space Science & Advocacy)", "desc": "World's largest non-governmental space organization advancing robotic exploration and planetary defense.", "url": "https://www.planetary.org", "icon": "fas fa-globe"}
        ]
    },

    "Health & Medicine Updates": {
        "title": "Health & Medicine Updates",
        "category": "Science Articles & News",
        "definition": "Biomedical science and modern clinical medicine investigate cellular disease etiology, immunology, pharmacology, and public health epidemiology. Critical recent advances include: Messenger RNA (mRNA) Vaccine Biotechnology, utilizing synthetic lipid nanoparticles (LNPs) to deliver encoded instructions directly to host ribosomes to synthesize viral spike antigens without live virus; Cancer Immunotherapy harnessing CAR-T cell engineering and immune checkpoint inhibitors (anti-PD-1 / CTLA-4) to empower cytotoxic T-lymphocytes; and Quantitative Infectious Disease Epidemiology modeled via Kermack-McKendrick Susceptible-Infected-Recovered (SIR) differential equations governed by the basic reproduction number R_0 = &beta; / &gamma;.",
        "basicDefinition": "Health & Medicine Updates explain how doctors and medical researchers invent new ways to keep people healthy! New mRNA vaccines act like a harmless 'wanted poster' taught to your immune system so your body learns to fight off germs before you ever get sick. Doctors are also training our own immune cells to seek out and destroy cancer cells.",
        "breakdown": [
            {
                "label": "mRNA Vaccine Biotechnology",
                "text": "Delivers temporary genetic instructions inside tiny fat bubbles (lipid nanoparticles) so our cells make harmless copies of viral proteins to train memory antibodies."
            },
            {
                "label": "Cancer Immunotherapy",
                "text": "Reprogramming or releasing the molecular brakes on patient T-cells so the body's natural immune defenses target and eliminate malignant tumors."
            },
            {
                "label": "Epidemiology & R0 (R-Naught)",
                "text": "The basic reproduction number R0 represents how many people one sick individual infects; if R0 is kept below 1.0, an outbreak naturally dies out."
            }
        ],
        "example": "Standard Analysis: 'In an epidemiological outbreak model with transmission rate &beta; = 0.40 contacts/day and recovery rate &gamma; = 0.10 days^-1, the basic reproduction number is R0 = &beta; / &gamma; = 0.40 / 0.10 = 4.0. To achieve community herd immunity threshold (HIT), the minimum immune fraction required is HIT = 1 - (1 / R0) = 1 - (1 / 4) = 75%.'",
        "basicExample": "Simple Sentence: 'An mRNA vaccine doesn't contain a live virus; it just hands your immune cells a recipe card to build protective antibodies.'",
        "proTip": "Understanding Herd Immunity: Herd immunity doesn't mean no one ever gets exposed; it means enough people are vaccinated or immune that the pathogen cannot find new hosts to keep spreading!",
        "question": "What is the critical threshold value for the basic reproduction number (R0) below which an infectious disease outbreak naturally declines and fades away?",
        "choices": [
            "R0 must be less than 1.0",
            "R0 must be greater than 5.0",
            "R0 must be exactly equal to 10.0"
        ],
        "correctIndex": 0,
        "explanation": "When R0 < 1.0, each infected individual transmits the pathogen to fewer than one other person on average, causing the chain of transmission to decline and terminate.",
        "equations": [
            {
                "title": "Epidemiological Basic Reproduction Number (R0)",
                "latex": "R_0 = \\frac{\\beta}{\\gamma} \\quad (\\beta = \\text{Transmission Rate}, \\, \\gamma = \\text{Recovery Rate}; \\, R_0 < 1 \\implies \\text{Outbreak Declines})",
                "note": "Fundamental index governing contagious outbreak spread across a vulnerable population."
            },
            {
                "title": "Herd Immunity Population Threshold (HIT)",
                "latex": "\\text{HIT} = 1 - \\frac{1}{R_0} \\quad (\\text{Fraction of immune population required to halt transmission})",
                "note": "Calculates required vaccination coverage to prevent community epidemic propagation."
            },
            {
                "title": "Michaelis-Menten Pharmacokinetic Drug Clearance",
                "latex": "v_{\\text{elimination}} = \\frac{V_{\\max} [C]}{K_m + [C]} \\quad ([C] = \\text{Plasma Drug Concentration})",
                "note": "Models saturation enzyme kinetics governing hepatic and renal therapeutic metabolism."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='mRNA Vaccine Mechanism and Immune Response Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='15' y='35' width='95' height='120' rx='6' fill='#eff6ff' stroke='#3b82f6' stroke-width='1.5'/><text x='62' y='55' fill='#1e40af' font-size='8.5' font-weight='bold' text-anchor='middle'>1. LIPID PARTICLE</text><circle cx='62' cy='85' r='20' fill='#bfdbfe' stroke='#3b82f6' stroke-width='1.5'/><path d='M 52 85 Q 62 75 72 85' stroke='#1d4ed8' stroke-width='2' fill='none'/><text x='62' y='115' fill='#1e40af' font-size='7.5' font-weight='bold' text-anchor='middle'>mRNA Sequence</text><text x='62' y='130' fill='#64748b' font-size='7' text-anchor='middle'>Enters Human Cell</text><path d='M 112 95 L 126 95' stroke='#3b82f6' stroke-width='2' marker-end='url(#arrow)'/><rect x='128' y='35' width='95' height='120' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='175' y='55' fill='#92400e' font-size='8.5' font-weight='bold' text-anchor='middle'>2. TRANSLATION</text><circle cx='175' cy='85' r='18' fill='#fde68a'/><text x='175' y='88' fill='#92400e' font-size='7.5' font-weight='bold' text-anchor='middle'>Ribosome</text><text x='175' y='115' fill='#92400e' font-size='7.5' font-weight='bold' text-anchor='middle'>Spike Protein</text><text x='175' y='130' fill='#78350f' font-size='7' text-anchor='middle'>Created by Cell</text><path d='M 225 95 L 239 95' stroke='#d97706' stroke-width='2' marker-end='url(#arrow)'/><rect x='241' y='35' width='95' height='120' rx='6' fill='#fee2e2' stroke='#ef4444' stroke-width='1.5'/><text x='288' y='55' fill='#991b1b' font-size='8.5' font-weight='bold' text-anchor='middle'>3. ANTIGEN</text><circle cx='288' cy='85' r='18' fill='#fecaca'/><text x='288' y='88' fill='#991b1b' font-size='7.5' font-weight='bold' text-anchor='middle'>T-Cell</text><text x='288' y='115' fill='#991b1b' font-size='7.5' font-weight='bold' text-anchor='middle'>Recognition</text><text x='288' y='130' fill='#7f1d1d' font-size='7' text-anchor='middle'>Immune Alerted</text><path d='M 338 95 L 352 95' stroke='#ef4444' stroke-width='2' marker-end='url(#arrow)'/><rect x='354' y='35' width='95' height='120' rx='6' fill='#f0fdf4' stroke='#16a34a' stroke-width='1.5'/><text x='401' y='55' fill='#166534' font-size='8.5' font-weight='bold' text-anchor='middle'>4. IMMUNITY</text><circle cx='401' cy='85' r='18' fill='#bbf7d0'/><text x='401' y='88' fill='#166534' font-size='8' font-weight='bold' text-anchor='middle'>B-Cells</text><text x='401' y='115' fill='#166534' font-size='7.5' font-weight='bold' text-anchor='middle'>Antibodies Made</text><text x='401' y='130' fill='#14532d' font-size='7' text-anchor='middle'>Long-Term Memory</text><text x='230' y='22' fill='#1e293b' font-size='10.5' font-weight='bold' text-anchor='middle'>mRNA VACCINE MECHANISM &amp; ADAPTIVE IMMUNE RESPONSE</text><text x='230' y='180' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Target Antigen Translation &bull; Memory B-Cells &bull; Epidemic R0 Control &#x2713;</text></svg>",
        "diagramLabel": "mRNA vaccine mechanism and adaptive immune response diagram",
        "diagramCaption": "Biomedical Immunology: The step-by-step molecular pathway from lipid nanoparticle mRNA delivery and ribosomal translation to B-cell antibody memory production.",
        "references": [
            {"title": "National Institutes of Health (NIH Health Information)", "desc": "Official US medical research agency providing evidence-based updates on biomedical breakthroughs and clinical trials.", "url": "https://www.nih.gov/health-information", "icon": "fas fa-heartbeat"},
            {"title": "World Health Organization (WHO Global Health Observatory)", "desc": "International public health data repository, pandemic monitoring, and immunization guidelines.", "url": "https://www.who.gov/data/gho", "icon": "fas fa-shield-virus"},
            {"title": "Centers for Disease Control and Prevention (CDC Science)", "desc": "Official CDC epidemiological guidelines, infectious disease monitoring, and laboratory protocols.", "url": "https://www.cdc.gov", "icon": "fas fa-hospital"}
        ]
    }

};
