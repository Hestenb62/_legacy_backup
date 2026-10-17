/**
 * Hesten's Learning - Social Studies Interactive Study Resources
 * Master Historical Principles, Chronological Models, Handcrafted SVG System Maps, and Dual-Lexile Instruction
 * Version: v2.23.0
 */

var socialStudiesLessons = window.socialStudiesLessons = {
    "Ancient Civilizations": {
        "title": "Ancient Civilizations",
        "category": "History Resources",
        "definition": "The study of ancient civilizations explores the emergence of urbanized sedentary societies, complex state institutions, centralized legal frameworks, and monument building during the Bronze and Iron Ages (c. 4000 BCE - 500 CE). The earliest civilizations developed independently in fertile river valleys: the Tigris and Euphrates (Mesopotamia - Sumer, Akkad, Babylon), the Nile (Ancient Egypt), the Indus River (Harappan civilization), and the Yellow River / Huang He (Ancient China). These 'hydraulic civilizations' engineered extensive irrigation networks, codified statutory law (such as the Babylonian Code of Hammurabi, instituting the Lex Talionis proportionality principle), invented writing systems (cuneiform, hieroglyphs, oracle bone script), and organized specialized labor hierarchies supported by agrarian surpluses.",
        "basicDefinition": "Ancient Civilizations were the world's very first great cities and empires, built thousands of years ago near big rivers like the Nile and Euphrates. People learned how to farm using river irrigation, invented the first alphabets and writing, built gigantic stone pyramids and temples, and wrote down the first laws to keep communities safe and fair.",
        "breakdown": [
            {
                "label": "The 4 River Valley Cradles",
                "text": "Mesopotamia (Tigris-Euphrates), Ancient Egypt (Nile), Indus Valley (Harappa & Mohenjo-Daro), and Ancient China (Yellow River) provided fresh silt and water for agrarian surpluses."
            },
            {
                "label": "Codified Law & Governance",
                "text": "The Code of Hammurabi (c. 1750 BCE) carved 282 legal rulings in stone, establishing public accountability and standardized penalties across social strata."
            },
            {
                "label": "Invention of Writing & Record-Keeping",
                "text": "Sumerian cuneiform on clay tablets, Egyptian hieroglyphs on papyrus, and Chinese oracle bones allowed trade accounting, literature, and imperial administrative continuity."
            }
        ],
        "example": "Standard Analysis: 'The annual predictable inundation of the Nile River deposited nutrient-dense black silt across the floodplain, generating an agricultural surplus that enabled the Old Kingdom (c. 2686-2181 BCE) to mobilize hundreds of thousands of seasonal agrarian laborers to construct the Great Pyramids of Giza without slave reliance.'",
        "basicExample": "Simple Sentence: 'Ancient Sumerians in Mesopotamia pressed reed wedges into damp clay tablets to record sheep, grain harvests, and the Epic of Gilgamesh!'",
        "proTip": "The Irrigation Secret: Why were all first civilizations near rivers? Rivers provided three life-or-death advantages: 1) fresh drinking water, 2) seasonal flood silt that naturally fertilized crops, and 3) natural water highways for boats to trade goods!",
        "question": "Which ancient Babylonian legal code carved 282 laws into a giant black diorite stele, establishing the famous 'eye for an eye' proportionality principle?",
        "choices": [
            "The Justinian Code",
            "The Code of Hammurabi",
            "The Magna Carta"
        ],
        "correctIndex": 1,
        "explanation": "King Hammurabi of Babylon codified 282 legal statutes around 1750 BCE, formalizing public law and the Lex Talionis principle.",
        "equations": [
            {
                "title": "Lex Talionis Legal Proportionality Principle",
                "latex": "\\text{Penalty}(x) \\propto \\text{Harm}(x) \\quad (\\text{Code of Hammurabi: Law 196: 'An eye for an eye'})",
                "note": "Early constitutional principle bounding retributive legal punishment to proportional injury."
            },
            {
                "title": "Hydraulic Irrigation Agrarian Mass Balance",
                "latex": "Q_{\\text{inundation}} = A \\cdot v = \\sum q_{\\text{furrows}} \\implies \\text{Surplus Yield} > \\text{Subsistence Consumption}",
                "note": "Quantifies the volumetric fluid diversion enabling specialized labor divisions."
            },
            {
                "title": "Radiocarbon Archaeological Decay Dating",
                "latex": "t = -\\frac{1}{\\lambda} \\ln\\left(\\frac{^{14}\\text{C}_{\\text{sample}}}{^{14}\\text{C}_{\\text{modern}}}\\right) \\quad (t_{1/2} = 5730 \\,\\text{Years})",
                "note": "Geochronological standard used by historians and archaeologists to date ancient organic artifacts."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='The Four River Valley Civilizations Comparative Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='15' y='40' width='95' height='115' rx='6' fill='#eff6ff' stroke='#3b82f6' stroke-width='1.5'/><text x='62' y='60' fill='#1e40af' font-size='9' font-weight='bold' text-anchor='middle'>MESOPOTAMIA</text><circle cx='62' cy='85' r='16' fill='#bfdbfe'/><text x='62' y='89' fill='#1d4ed8' font-size='7' font-weight='bold' text-anchor='middle'>Tigris-Euph.</text><text x='62' y='115' fill='#1e40af' font-size='7.5' font-weight='bold' text-anchor='middle'>Cuneiform</text><text x='62' y='128' fill='#64748b' font-size='7' text-anchor='middle'>Hammurabi Code</text><text x='62' y='140' fill='#64748b' font-size='7' text-anchor='middle'>Ziggurats</text><rect x='125' y='40' width='95' height='115' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='172' y='60' fill='#92400e' font-size='9' font-weight='bold' text-anchor='middle'>ANCIENT EGYPT</text><circle cx='172' cy='85' r='16' fill='#fde68a'/><text x='172' y='89' fill='#b45309' font-size='7' font-weight='bold' text-anchor='middle'>Nile River</text><text x='172' y='115' fill='#92400e' font-size='7.5' font-weight='bold' text-anchor='middle'>Hieroglyphs</text><text x='172' y='128' fill='#78350f' font-size='7' text-anchor='middle'>Pyramid Builders</text><text x='172' y='140' fill='#78350f' font-size='7' text-anchor='middle'>Pharaonic Rule</text><rect x='235' y='40' width='95' height='115' rx='6' fill='#f0fdf4' stroke='#16a34a' stroke-width='1.5'/><text x='282' y='60' fill='#166534' font-size='9' font-weight='bold' text-anchor='middle'>INDUS VALLEY</text><circle cx='282' cy='85' r='16' fill='#bbf7d0'/><text x='282' y='89' fill='#15803d' font-size='7' font-weight='bold' text-anchor='middle'>Indus River</text><text x='282' y='115' fill='#166534' font-size='7.5' font-weight='bold' text-anchor='middle'>Grid Cities</text><text x='282' y='128' fill='#14532d' font-size='7' text-anchor='middle'>Harappa Urban</text><text x='282' y='140' fill='#14532d' font-size='7' text-anchor='middle'>Sewer Drainage</text><rect x='345' y='40' width='95' height='115' rx='6' fill='#fee2e2' stroke='#ef4444' stroke-width='1.5'/><text x='392' y='60' fill='#991b1b' font-size='9' font-weight='bold' text-anchor='middle'>ANCIENT CHINA</text><circle cx='392' cy='85' r='16' fill='#fecaca'/><text x='392' y='89' fill='#b91c1c' font-size='7' font-weight='bold' text-anchor='middle'>Yellow River</text><text x='392' y='115' fill='#991b1b' font-size='7.5' font-weight='bold' text-anchor='middle'>Oracle Bones</text><text x='392' y='128' fill='#7f1d1d' font-size='7' text-anchor='middle'>Shang Dynasty</text><text x='392' y='140' fill='#7f1d1d' font-size='7' text-anchor='middle'>Bronze Metall.</text><text x='230' y='22' fill='#1e293b' font-size='10.5' font-weight='bold' text-anchor='middle'>THE FOUR GREAT RIVER VALLEY CRADLES OF CIVILIZATION</text><text x='230' y='180' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Hydraulic Agriculture &bull; Codified Laws &bull; Monumental Architecture &#x2713;</text></svg>",
        "diagramLabel": "The four river valley civilizations comparative diagram",
        "diagramCaption": "The Cradles of Civilization: Comparative analysis of the four primary river valley civilizations demonstrating irrigation reliance, writing systems, and institutional governance.",
        "references": [
            {"title": "The British Museum World Antiquities Collection", "desc": "Curated artifacts including the Cyrus Cylinder, Rosetta Stone, and Royal Game of Ur.", "url": "https://www.britishmuseum.org/collection", "icon": "fas fa-landmark"},
            {"title": "Library of Congress World Digital Library", "desc": "High-resolution historical manuscripts, maps, and primary sources from ancient world civilizations.", "url": "https://www.loc.gov/collections/world-digital-library/", "icon": "fas fa-book-open"},
            {"title": "National Geographic Ancient Civilizations Archive", "desc": "Archaeological reports on excavations, urban ruins, and agricultural adaptations in antiquity.", "url": "https://www.nationalgeographic.com/history/topic/ancient-civilizations", "icon": "fas fa-globe-africa"}
        ]
    },

    "World History Timelines": {
        "title": "World History Timelines",
        "category": "History Resources",
        "definition": "World History Timelines establish chronological, thematic, and historiographical frameworks that map humanity's developmental trajectory across successive historical epochs: Ancient World (c. 3500 BCE - 500 CE); Classical Antiquity (Greco-Roman, Mauryan, Han empires); Post-Classical / Medieval Era (c. 500 - 1500 CE, featuring the Islamic Golden Age, feudal Europe, and the Silk Roads); Early Modern Era (c. 1500 - 1750 CE, encompassing the Renaissance, Columbian Exchange, and Scientific Revolution); Modern Industrial Era (c. 1750 - 1945 CE, driven by steam power, imperialism, and World Wars); and the Contemporary Post-WWII Digital Era (1945 - Present). Analyzing world history requires chronological calculations accounting for the absence of a Year Zero in Gregorian dating, as well as recognizing cyclical patterns of civilizational rise, golden age consolidation, and fragmentation.",
        "basicDefinition": "World History Timelines put the story of humans in order from beginning to end! Time is divided into big eras: Ancient times (pyramids and pharaohs), Middle Ages (castles and knights), the Age of Exploration (sailing ships discovering new lands), the Industrial Age (factories and trains), and Modern times (space travel and the internet).",
        "breakdown": [
            {
                "label": "BCE vs. CE Dating Mechanics",
                "text": "BCE (Before Common Era) counts backward toward zero; CE (Common Era) counts upward from 1 CE. There is NO Year Zero between 1 BCE and 1 CE!"
            },
            {
                "label": "The 6 Global Epochs",
                "text": "Ancient World &rarr; Classical Empires &rarr; Medieval Global Silk Roads &rarr; Early Modern Renaissance &rarr; Industrial Age &rarr; Contemporary World."
            },
            {
                "label": "Cause, Effect & Turning Points",
                "text": "Historical turning points (like the invention of the printing press in 1440 or the steam engine in 1769) radically accelerate economic, political, and cultural change."
            }
        ],
        "example": "Standard Analysis: 'Julius Caesar was assassinated in 44 BCE, and the Roman Emperor Augustus died in 14 CE. Calculating elapsed years without a Year Zero requires: t = BCE + CE - 1 = 44 + 14 - 1 = 57 years between the two landmark political transitions.'",
        "basicExample": "Simple Sentence: 'Counting backwards in BCE is like descending into a basement: 500 BCE happened BEFORE 200 BCE, just like -5 is lower down than -2!'",
        "proTip": "The Calendar Math Trap: Whenever you calculate elapsed time between a BCE date and a CE date, ALWAYS subtract 1! Because when the calendar switched from December 31, 1 BCE to January 1, 1 CE, not a single second of 'Year Zero' ever existed!",
        "question": "How many total calendar years elapsed between an event in 50 BCE and an event in 50 CE?",
        "choices": [
            "100 years",
            "99 years",
            "101 years"
        ],
        "correctIndex": 1,
        "explanation": "Because there is no Year Zero in the Gregorian calendar system, 50 BCE to 50 CE is: 50 + 50 - 1 = 99 elapsed years.",
        "equations": [
            {
                "title": "Gregorian Chronological Elapsed Time Formula",
                "latex": "t_{\\text{elapsed}} = \\text{Year}_{\\text{BCE}} + \\text{Year}_{\\text{CE}} - 1 \\quad (\\text{Accounts for absence of Year Zero})",
                "note": "Essential calendar computation for measuring intervals spanning the antiquity-modernity boundary."
            },
            {
                "title": "Exponential Human Knowledge Accumulation",
                "latex": "K(t) = K_0 e^{rt} \\quad (r = \\text{Technological / Informational Innovation Rate})",
                "note": "Mathematical model of accelerating technological milestones across civilizational eras."
            },
            {
                "title": "Historical Structural-Demographic Secular Cycle",
                "latex": "T_{\\text{secular}} \\approx 100\\text{--}150 \\,\\text{Years} \\quad (\\text{Integrative Phase} \\to \\text{Disintegrative Crisis})",
                "note": "Historiographical quantitative model mapping imperial population and fiscal cycles."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Six Global Epochs of World History Timeline Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><path d='M 25 65 L 85 65 L 100 85 L 85 105 L 25 105 Z' fill='#3b82f6'/><text x='58' y='82' fill='#ffffff' font-size='7.5' font-weight='bold' text-anchor='middle'>ANCIENT</text><text x='58' y='94' fill='#dbeafe' font-size='6.5' text-anchor='middle'>3500 BCE</text><path d='M 95 65 L 155 65 L 170 85 L 155 105 L 95 105 L 110 85 Z' fill='#0284c7'/><text x='132' y='82' fill='#ffffff' font-size='7.5' font-weight='bold' text-anchor='middle'>CLASSICAL</text><text x='132' y='94' fill='#e0f2fe' font-size='6.5' text-anchor='middle'>500 BCE-500 CE</text><path d='M 165 65 L 225 65 L 240 85 L 225 105 L 165 105 L 180 85 Z' fill='#10b981'/><text x='202' y='82' fill='#ffffff' font-size='7.5' font-weight='bold' text-anchor='middle'>MEDIEVAL</text><text x='202' y='94' fill='#d1fae5' font-size='6.5' text-anchor='middle'>500-1500 CE</text><path d='M 235 65 L 295 65 L 310 85 L 295 105 L 235 105 L 250 85 Z' fill='#f59e0b'/><text x='272' y='82' fill='#ffffff' font-size='7.5' font-weight='bold' text-anchor='middle'>EARLY MOD.</text><text x='272' y='94' fill='#fef3c7' font-size='6.5' text-anchor='middle'>1500-1750 CE</text><path d='M 305 65 L 365 65 L 380 85 L 365 105 L 305 105 L 320 85 Z' fill='#ef4444'/><text x='342' y='82' fill='#ffffff' font-size='7.5' font-weight='bold' text-anchor='middle'>INDUSTRIAL</text><text x='342' y='94' fill='#fee2e2' font-size='6.5' text-anchor='middle'>1750-1945 CE</text><path d='M 375 65 L 435 65 L 435 105 L 375 105 L 390 85 Z' fill='#8b5cf6'/><text x='408' y='82' fill='#ffffff' font-size='7.5' font-weight='bold' text-anchor='middle'>MODERN</text><text x='408' y='94' fill='#ede9fe' font-size='6.5' text-anchor='middle'>1945-Present</text><rect x='30' y='125' width='400' height='30' rx='4' fill='#ffffff' stroke='#cbd5e1'/><text x='60' y='143' fill='#1e40af' font-size='7' font-weight='bold'>Bronze Age</text><text x='132' y='143' fill='#0369a1' font-size='7' font-weight='bold'>Greece/Rome</text><text x='202' y='143' fill='#047857' font-size='7' font-weight='bold'>Silk Roads</text><text x='272' y='143' fill='#b45309' font-size='7' font-weight='bold'>Renaissance</text><text x='342' y='143' fill='#b91c1c' font-size='7' font-weight='bold'>Steam Power</text><text x='408' y='143' fill='#6d28d9' font-size='7' font-weight='bold'>Digital Era</text><text x='230' y='32' fill='#1e293b' font-size='10.5' font-weight='bold' text-anchor='middle'>THE SIX MAJOR EPOCHS OF GLOBAL WORLD HISTORY</text><text x='230' y='180' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Chronological Continuity &bull; Turning Points &bull; Global Interconnectedness &#x2713;</text></svg>",
        "diagramLabel": "Six global epochs of world history timeline diagram",
        "diagramCaption": "World History Chronological Matrix: Sequential progression through the six major global epochs from the dawn of agriculture to the contemporary digital age.",
        "references": [
            {"title": "Smithsonian National Museum of American & World History", "desc": "Curated primary source timelines, material artifacts, and interactive historical exhibits.", "url": "https://americanhistory.si.edu", "icon": "fas fa-landmark"},
            {"title": "Fordham Internet History Sourcebooks Project", "desc": "Comprehensive repository of translated primary source texts from ancient, medieval, and modern eras.", "url": "https://sourcebooks.fordham.edu", "icon": "fas fa-scroll"},
            {"title": "UNESCO World Heritage Centre Archives", "desc": "Official cultural documentation of historical landmarks, monuments, and civilizational heritage sites.", "url": "https://whc.unesco.org", "icon": "fas fa-globe"}
        ]
    },

    "US History Documents": {
        "title": "US History Documents",
        "category": "History Resources",
        "definition": "The canonical primary documents of United States history delineate the philosophical evolution of constitutional self-governance, democratic republicanism, and individual civil rights. Foundational texts include: the Mayflower Compact (1620), establishing social compact self-governance; the Declaration of Independence (1776), authored by Thomas Jefferson and rooted in John Locke's natural rights philosophy asserting unalienable rights to 'Life, Liberty and the pursuit of Happiness' and government by consent of the governed; the Articles of Confederation (1781), demonstrating the structural weaknesses of a unicameral confederation lacking taxing authority; the United States Constitution (1787), establishing federalism, bicameralism, and tripartite separation of powers; the Bill of Rights (1791), codifying essential procedural and substantive liberties; and the Gettysburg Address (1863), re-dedicating the nation to 'a new birth of freedom' under a government of the people, by the people, for the people.",
        "basicDefinition": "US History Documents are the most famous written papers that built America! They include the Declaration of Independence (declaring freedom from the British King), the United States Constitution (the supreme law explaining how the government works), and the Bill of Rights (guaranteeing freedom of speech, freedom of religion, and fair trials for all citizens).",
        "breakdown": [
            {
                "label": "Declaration of Independence (1776)",
                "text": "Stated that all people have natural rights to life, liberty, and happiness, and that citizens have the right to change a government that becomes tyrannical."
            },
            {
                "label": "US Constitution (1787)",
                "text": "Created three separate branches with checks and balances: Legislative (makes laws), Executive (enforces laws), and Judicial (interprets laws)."
            },
            {
                "label": "The Bill of Rights (1791)",
                "text": "The first 10 amendments protecting freedom of speech, press, religion, assembly, protection against unlawful searches, and due process of law."
            }
        ],
        "example": "Standard Analysis: 'In Federalist No. 51, James Madison defended the Constitution's separation of powers by famously arguing: \"If men were angels, no government would be necessary... Ambition must be made to counteract ambition.\" This mathematical balancing ensures that no single branch dominates federal sovereignty.'",
        "basicExample": "Simple Sentence: 'The Bill of Rights protects your right to speak your mind, practice your religion peacefully, and read any book you choose!'",
        "proTip": "Primary vs. Secondary Sources: An original document written during the event (like George Washington's actual handwritten letter or the original signed Constitution) is a PRIMARY source. A modern textbook or article written about the Constitution today is a SECONDARY source!",
        "question": "Which foundational US historical document serves as the supreme law of the land, establishing the three branches of the federal government?",
        "choices": [
            "The Mayflower Compact",
            "The United States Constitution",
            "The Articles of Confederation"
        ],
        "correctIndex": 1,
        "explanation": "The United States Constitution, ratified in 1788, is the supreme legal framework defining the powers and boundaries of the federal government.",
        "equations": [
            {
                "title": "Lockean Social Contract Sovereign Authority Axiom",
                "latex": "\\text{Legitimate Authority} = f(\\text{Consent of the Governed}) \\implies \\text{Right to } \\{\\text{Life}, \\text{Liberty}, \\text{Property}\\}",
                "note": "Philosophical foundation of the Declaration of Independence derived from John Locke's Two Treatises."
            },
            {
                "title": "Tripartite Separation of Powers Equilibrium",
                "latex": "\\text{Sovereignty} = \\text{Legislative (Art. I)} \\cap \\text{Executive (Art. II)} \\cap \\text{Judicial (Art. III)}",
                "note": "Constitutional equilibrium ensuring checks and balances prevent autocratic concentration of power."
            },
            {
                "title": "Constitutional Judicial Review Balancing Test",
                "latex": "\\text{State Action Valid} \\iff \\text{Compelling Government Interest} \\land \\text{Narrowly Tailored Means}",
                "note": "Strict scrutiny legal standard applied by the Supreme Court to protect fundamental Bill of Rights liberties."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Evolution of Foundational US Constitutional Documents Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='20' y='35' width='120' height='50' rx='6' fill='#eff6ff' stroke='#3b82f6' stroke-width='1.5'/><text x='80' y='52' fill='#1e40af' font-size='8.5' font-weight='bold' text-anchor='middle'>MAYFLOWER (1620)</text><text x='80' y='67' fill='#1e3a8a' font-size='7' text-anchor='middle'>Self-Government Pact</text><text x='80' y='78' fill='#64748b' font-size='6.5' text-anchor='middle'>Rule of Law Consent</text><path d='M 140 60 L 160 60' stroke='#3b82f6' stroke-width='2' marker-end='url(#arrow)'/><rect x='165' y='35' width='130' height='50' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='230' y='52' fill='#92400e' font-size='8.5' font-weight='bold' text-anchor='middle'>DECLARATION (1776)</text><text x='230' y='67' fill='#78350f' font-size='7' text-anchor='middle'>Unalienable Rights</text><text x='230' y='78' fill='#b45309' font-size='6.5' text-anchor='middle'>Natural Equality</text><path d='M 295 60 L 315 60' stroke='#d97706' stroke-width='2' marker-end='url(#arrow)'/><rect x='320' y='35' width='120' height='50' rx='6' fill='#fee2e2' stroke='#ef4444' stroke-width='1.5'/><text x='380' y='52' fill='#991b1b' font-size='8.5' font-weight='bold' text-anchor='middle'>ARTICLES (1781)</text><text x='380' y='67' fill='#7f1d1d' font-size='7' text-anchor='middle'>Weak Confederation</text><text x='380' y='78' fill='#991b1b' font-size='6.5' text-anchor='middle'>No Federal Tax Power</text><path d='M 380 85 L 380 105' stroke='#ef4444' stroke-width='2'/><path d='M 380 105 L 295 105' stroke='#16a34a' stroke-width='2' marker-end='url(#arrow)'/><rect x='165' y='95' width='130' height='50' rx='6' fill='#f0fdf4' stroke='#16a34a' stroke-width='1.5'/><text x='230' y='112' fill='#166534' font-size='8.5' font-weight='bold' text-anchor='middle'>US CONSTITUTION (1787)</text><text x='230' y='127' fill='#14532d' font-size='7' text-anchor='middle'>Supreme Law of the Land</text><text x='230' y='138' fill='#15803d' font-size='6.5' text-anchor='middle'>3 Branches &amp; Federalism</text><path d='M 165 120 L 145 120' stroke='#16a34a' stroke-width='2' marker-end='url(#arrow)'/><rect x='20' y='95' width='120' height='50' rx='6' fill='#ede9fe' stroke='#8b5cf6' stroke-width='1.5'/><text x='80' y='112' fill='#5b21b6' font-size='8.5' font-weight='bold' text-anchor='middle'>BILL OF RIGHTS (1791)</text><text x='80' y='127' fill='#6d28d9' font-size='7' text-anchor='middle'>10 Amendments</text><text x='80' y='138' fill='#7c3aed' font-size='6.5' text-anchor='middle'>Speech, Press, Due Process</text><text x='230' y='22' fill='#1e293b' font-size='10.5' font-weight='bold' text-anchor='middle'>THE ORGANIC EVOLUTION OF AMERICAN CONSTITUTIONAL LAW</text><text x='230' y='180' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Consent of Governed &bull; Checks and Balances &bull; Fundamental Human Rights &#x2713;</text></svg>",
        "diagramLabel": "Evolution of foundational US constitutional documents diagram",
        "diagramCaption": "American Constitutional Genealogy: The evolutionary legal progression from the Mayflower Compact and Declaration of Independence to the Constitution and Bill of Rights.",
        "references": [
            {"title": "National Archives (America's Founding Documents / Charters of Freedom)", "desc": "Official high-resolution scans and historical commentaries on the Declaration, Constitution, and Bill of Rights.", "url": "https://www.archives.gov/founding-docs", "icon": "fas fa-scroll"},
            {"title": "Library of Congress (American Memory Primary Sources)", "desc": "Extensive digitized collections of early American colonial papers, broadsides, and presidential letters.", "url": "https://www.loc.gov", "icon": "fas fa-landmark"},
            {"title": "National Constitution Center (Interactive Constitution)", "desc": "Bipartisan legal scholarship exploring the text, history, and Supreme Court precedent for every constitutional clause.", "url": "https://constitutioncenter.org/interactive-constitution", "icon": "fas fa-balance-scale"}
        ]
    },

    "Historical Figures": {
        "title": "Historical Figures",
        "category": "History Resources",
        "definition": "Historiography investigates the dialectical interaction between individual human agency and broader socioeconomic material forces ('Great Man Theory' vs. Historical Materialism). Significant historical figures across human civilization exemplify varied modalities of leadership, moral resistance, intellectual innovation, and statecraft: Revolutionary Philosophers (Socrates, John Locke, Voltaire) formulating foundational civic ethics; Constitutional Architects (James Madison, Alexander Hamilton) drafting resilient institutional frameworks; Moral Liberators (Harriet Tubman, Frederick Douglass, Mahatma Gandhi, Dr. Martin Luther King Jr., Nelson Mandela) wielding nonviolent civil disobedience (Satyagraha) and moral suasion against systemic oppression; and Scientific & Technological Visionaries (Galileo Galilei, Marie Curie, Albert Einstein) disrupting established epistemological models.",
        "basicDefinition": "Historical Figures are the courageous leaders, thinkers, scientists, and heroes whose actions transformed our world. Some were philosophers who invented ideas about freedom; some were leaders who fought to end slavery and injustice through nonviolent protests; and some were inventors who discovered life-saving medicines and new technologies.",
        "breakdown": [
            {
                "label": "Individual Agency vs. Social Context",
                "text": "Great historical figures are shaped by the challenges of their time, but their bold choices, speeches, and courage help bend history toward justice."
            },
            {
                "label": "Moral Leadership & Civil Disobedience",
                "text": "Leaders like Dr. King and Gandhi demonstrated that disciplined, nonviolent boycotts and marches can defeat powerful empires and racist laws."
            },
            {
                "label": "Analyzing Historical Primary Quotes",
                "text": "Examining a historical figure's speeches (like Lincoln's Gettysburg Address or Sojourner Truth's 'Ain't I a Woman?') reveals their core values and strategies."
            }
        ],
        "example": "Standard Analysis: 'Dr. Martin Luther King Jr.'s 1963 \"Letter from Birmingham Jail\" synthesized natural law philosophy with Christian ethics, arguing that \"an unjust law is no law at all.\" By willingly enduring imprisonment, King activated the moral force equation to awaken national consciousness against Jim Crow segregation.'",
        "basicExample": "Simple Sentence: 'Harriet Tubman bravely escaped slavery and then risked her life nineteen more times to guide hundreds of enslaved people to freedom on the Underground Railroad.'",
        "proTip": "Context Matters: Always judge historical figures in the context of their time while examining how their ideas contributed to progress! Ask yourself: What challenges did they face? Who opposed them? What lasting change did they leave behind?",
        "question": "Which historic civil rights leader authored the famous 1963 'Letter from Birmingham Jail' defending nonviolent direct action against racial injustice?",
        "choices": [
            "Malcolm X",
            "Dr. Martin Luther King Jr.",
            "Thurgood Marshall"
        ],
        "correctIndex": 1,
        "explanation": "Dr. Martin Luther King Jr. wrote the landmark essay in 1963 while incarcerated, articulating the moral imperative of nonviolent resistance to unjust laws.",
        "equations": [
            {
                "title": "Historiographical Agency-Structure Dynamic Equation",
                "latex": "\\Delta \\text{History} = f(\\text{Individual Agency}) + g(\\text{Socioeconomic Material Conditions})",
                "note": "Historiographical model balancing individual leadership impact against environmental structural constraints."
            },
            {
                "title": "Kingian-Gandhian Moral Force Formulation (Satyagraha)",
                "latex": "\\text{Moral Leverage} = \\text{Truth} \\times \\text{Willingness to Endure Self-Suffering} \\times \\text{Public Conscience}",
                "note": "Mathematical formulation of nonviolent civil resistance overcoming authoritarian power."
            },
            {
                "title": "Institutional Transformation Velocity",
                "latex": "V_{\\text{reform}} = \\frac{\\Delta \\text{Civil Rights}}{\\Delta t} = \\frac{\\text{Grassroots Civic Mobilization}}{\\text{Systemic Inertia}}",
                "note": "Models the rate at which democratic social movements enact enduring statutory and cultural change."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Four Archetypes of Transformative Historical Figures Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='35' width='190' height='60' rx='6' fill='#eff6ff' stroke='#3b82f6' stroke-width='1.5'/><text x='120' y='54' fill='#1e40af' font-size='9' font-weight='bold' text-anchor='middle'>1. PHILOSOPHERS &amp; THINKERS</text><text x='120' y='70' fill='#1e3a8a' font-size='7.5' text-anchor='middle'>Socrates &bull; Locke &bull; Voltaire</text><text x='120' y='82' fill='#64748b' font-size='7' text-anchor='middle'>Inventing ideas of liberty &amp; reason</text><rect x='245' y='35' width='190' height='60' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='340' y='54' fill='#92400e' font-size='9' font-weight='bold' text-anchor='middle'>2. CONSTITUTIONAL BUILDERS</text><text x='340' y='70' fill='#78350f' font-size='7.5' text-anchor='middle'>Madison &bull; Hamilton &bull; Washington</text><text x='340' y='82' fill='#b45309' font-size='7' text-anchor='middle'>Constructing stable legal republics</text><rect x='25' y='105' width='190' height='60' rx='6' fill='#f0fdf4' stroke='#16a34a' stroke-width='1.5'/><text x='120' y='124' fill='#166534' font-size='9' font-weight='bold' text-anchor='middle'>3. MORAL LIBERATORS</text><text x='120' y='140' fill='#14532d' font-size='7.5' text-anchor='middle'>Tubman &bull; King &bull; Gandhi &bull; Mandela</text><text x='120' y='152' fill='#15803d' font-size='7' text-anchor='middle'>Overcoming injustice with moral force</text><rect x='245' y='105' width='190' height='60' rx='6' fill='#ede9fe' stroke='#8b5cf6' stroke-width='1.5'/><text x='340' y='124' fill='#5b21b6' font-size='9' font-weight='bold' text-anchor='middle'>4. SCIENTIFIC PIONEERS</text><text x='340' y='140' fill='#6d28d9' font-size='7.5' text-anchor='middle'>Galileo &bull; Curie &bull; Einstein</text><text x='340' y='152' fill='#7c3aed' font-size='7' text-anchor='middle'>Expanding human knowledge frontiers</text><text x='230' y='22' fill='#1e293b' font-size='10.5' font-weight='bold' text-anchor='middle'>THE FOUR ARCHETYPES OF TRANSFORMATIVE HISTORICAL FIGURES</text><text x='230' y='182' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Moral Courage &bull; Civic Vision &bull; Intellectual Breakthroughs &#x2713;</text></svg>",
        "diagramLabel": "Four archetypes of transformative historical figures diagram",
        "diagramCaption": "Historiographical Leadership Taxonomy: Categorization of transformative historical agents into intellectual philosophers, constitutional framers, moral liberators, and scientific innovators.",
        "references": [
            {"title": "The Martin Luther King, Jr., Research & Education Institute (Stanford)", "desc": "Authoritative digitized primary papers, speeches, and correspondence of Dr. Martin Luther King Jr.", "url": "https://kinginstitute.stanford.edu", "icon": "fas fa-university"},
            {"title": "Nobel Peace Prize Historical Archive", "desc": "Biographical dossiers and lecture manuscripts of historical laureates advocating human rights and peace.", "url": "https://www.nobelprize.org/prizes/peace/", "icon": "fas fa-medal"},
            {"title": "Harvard Kennedy School Center for Public Leadership", "desc": "Historical leadership case studies examining decision-making under crisis and moral suasion.", "url": "https://www.hks.harvard.edu/centers/cpl", "icon": "fas fa-user-graduate"}
        ]
    }
,

    "World Maps & Atlases": {
        "title": "World Maps & Atlases",
        "category": "Geography Resources",
        "definition": "World maps, globes, and atlases represent Earth's three-dimensional oblate spheroid surface onto two-dimensional planar media through mathematical cartographic projections. Because projecting a sphere onto a plane geometrically induces distortion (governed by Carl Friedrich Gauss's Theorema Egregium and quantified via Tissot's indicatrix), cartographers must balance trade-offs among shape (conformality), area (equivalence), distance (equidistance), and direction (azimuthality). The Mercator projection preserves rhumb-line navigational angles while severely distorting high-latitude landmass areas (rendering Greenland as large as Africa, when Africa is actually 14 times larger); equivalent projections (such as the Peters projection) preserve true surface area; and compromise projections (such as Robinson and Winkel Tripel) balance distortions for global thematic atlases. Coordinate referencing relies on the global graticule: Parallels of Latitude (0&deg; Equator to 90&deg; Poles) measuring north-south angular distance, and Meridians of Longitude (0&deg; Prime Meridian in Greenwich, UK to 180&deg; International Date Line) measuring east-west angular distance.",
        "basicDefinition": "World Maps and Atlases are drawings that show what our planet Earth looks like! Because Earth is shaped like a round ball, flattening it out into a flat paper map always stretches some parts out of shape. Flat maps use a grid of invisible lines: Latitude lines run sideways around the globe like belt loops, and Longitude lines run up and down from the North Pole to the South Pole.",
        "breakdown": [
            {
                "label": "Map Projections & Distortion",
                "text": "Every flat map distorts either size, shape, distance, or direction. Mercator preserves travel directions but inflates polar sizes; Robinson balances all distortions."
            },
            {
                "label": "Latitude & Longitude Grid (Graticule)",
                "text": "Latitude lines (parallels) measure degrees North and South of the Equator (0&deg;); Longitude lines (meridians) measure degrees East and West of the Prime Meridian (0&deg;)."
            },
            {
                "label": "Map Scale & Representative Fraction",
                "text": "A ratio (like 1:50,000) showing how many real-world inches, miles, or kilometers are represented by one unit of measurement on the printed map."
            }
        ],
        "example": "Standard Analysis: 'On a topographic quadrangle map with a scale of 1:24,000, two mountain peaks measure exactly 5.0 cm apart. Real-world distance is: d = 5.0 cm * 24,000 = 120,000 cm = 1,200 meters (1.2 km), converting cartographic distance into field navigation metrics.'",
        "basicExample": "Simple Sentence: 'If you want to find your exact location on GPS, your phone calculates your latitude and longitude coordinates!'",
        "proTip": "Remember the Latitude vs. Longitude Trick: Latitude lines are 'flat-itude' (horizontal rungs of a ladder, parallel like tracks). Longitude lines are 'long' lines running all the way from pole to pole!",
        "question": "Which line of latitude circles the exact middle of the Earth at zero degrees, dividing the planet into Northern and Southern Hemispheres?",
        "choices": [
            "The Prime Meridian",
            "The Equator",
            "The Tropic of Cancer"
        ],
        "correctIndex": 1,
        "explanation": "The Equator is the fundamental parallel of latitude at 0 degrees, dividing the Earth into the Northern and Southern Hemispheres.",
        "equations": [
            {
                "title": "Representative Fraction Map Scale Ratio",
                "latex": "\\text{Ground Distance} = \\text{Map Distance} \\times \\text{Scale Factor} \\quad (1:100{,}000 \\implies 1\\,\\text{cm on map} = 1\\,\\text{km on ground})",
                "note": "Linear cartographic scale formula converting map measurements to real planetary distances."
            },
            {
                "title": "Haversine Great Circle Navigation Distance Formula",
                "latex": "d = 2R \\arcsin\\left(\\sqrt{\\sin^2\\left(\\frac{\\Delta \\phi}{2}\\right) + \\cos\\phi_1 \\cos\\phi_2 \\sin^2\\left(\\frac{\\Delta \\lambda}{2}\\right)}\\right)",
                "note": "Calculates shortest spherical flight distance between two coordinate pairs across Earth's surface."
            },
            {
                "title": "Tissot's Indicatrix Cartographic Distortion Metric",
                "latex": "s = a \\cdot b \\quad (a = \\text{Major Axis}, \\, b = \\text{Minor Axis of projected infinitesimal circle})",
                "note": "Mathematical measure evaluating local areal and angular preservation in map projections."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Earth Geographic Coordinate Grid Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><circle cx='150' cy='100' r='65' fill='#eff6ff' stroke='#3b82f6' stroke-width='2'/><ellipse cx='150' cy='100' rx='65' ry='22' fill='none' stroke='#ef4444' stroke-width='2'/><text x='150' y='104' fill='#dc2626' font-size='8' font-weight='bold' text-anchor='middle'>Equator (0&deg; Latitude)</text><ellipse cx='150' cy='65' rx='56' ry='16' fill='none' stroke='#93c5fd' stroke-width='1.5' stroke-dasharray='3'/><text x='150' y='60' fill='#1e40af' font-size='7' text-anchor='middle'>Tropic of Cancer (23.5&deg; N)</text><ellipse cx='150' cy='135' rx='56' ry='16' fill='none' stroke='#93c5fd' stroke-width='1.5' stroke-dasharray='3'/><text x='150' y='145' fill='#1e40af' font-size='7' text-anchor='middle'>Tropic of Capricorn (23.5&deg; S)</text><line x1='150' y1='35' x2='150' y2='165' stroke='#10b981' stroke-width='2'/><text x='150' y='28' fill='#047857' font-size='8' font-weight='bold' text-anchor='middle'>Prime Meridian (0&deg;)</text><circle cx='150' cy='35' r='3' fill='#10b981'/><text x='150' y='46' fill='#047857' font-size='6.5' text-anchor='middle'>North Pole (90&deg; N)</text><rect x='250' y='35' width='185' height='130' rx='6' fill='#ffffff' stroke='#cbd5e1'/><text x='342' y='54' fill='#1e293b' font-size='9' font-weight='bold' text-anchor='middle'>MAP PROJECTION TRADE-OFFS</text><rect x='260' y='65' width='165' height='26' rx='4' fill='#fee2e2'/><text x='342' y='77' fill='#991b1b' font-size='7.5' font-weight='bold' text-anchor='middle'>Mercator (Conformal)</text><text x='342' y='87' fill='#b91c1c' font-size='6.5' text-anchor='middle'>True directions; severely inflates polar area</text><rect x='260' y='96' width='165' height='26' rx='4' fill='#fef3c7'/><text x='342' y='108' fill='#92400e' font-size='7.5' font-weight='bold' text-anchor='middle'>Peters (Equal-Area)</text><text x='342' y='118' fill='#b45309' font-size='6.5' text-anchor='middle'>True continent area; distorts equator shapes</text><rect x='260' y='127' width='165' height='26' rx='4' fill='#ede9fe'/><text x='342' y='139' fill='#5b21b6' font-size='7.5' font-weight='bold' text-anchor='middle'>Robinson (Compromise)</text><text x='342' y='149' fill='#6d28d9' font-size='6.5' text-anchor='middle'>Visually pleasing balance for global atlases</text><text x='230' y='185' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Global Graticule &bull; Latitude Parallels &bull; Longitude Meridians &#x2713;</text></svg>",
        "diagramLabel": "Earth geographic coordinate grid and projection trade-offs diagram",
        "diagramCaption": "Cartographic Graticule & Projections: Earth's spherical coordinate grid (latitude parallels and longitude meridians) alongside fundamental map projection trade-offs.",
        "references": [
            {"title": "USGS National Map Cartographic Viewer", "desc": "United States Geological Survey authoritative topographic maps, digital elevation models, and GIS layers.", "url": "https://www.usgs.gov/programs/national-geospatial-program/national-map", "icon": "fas fa-map"},
            {"title": "National Geographic MapMaker Interactive", "desc": "Interactive thematic mapping tool visualizing climate, biomes, population density, and environmental hazards.", "url": "https://education.nationalgeographic.org/resource/mapmaker-interactive/", "icon": "fas fa-globe-americas"},
            {"title": "Library of Congress Geography and Map Division", "desc": "World's largest cartographic collection containing over 5.5 million historical maps and nautical charts.", "url": "https://www.loc.gov/rr/geogmap/", "icon": "fas fa-compass"}
        ]
    },

    "Physical Geography": {
        "title": "Physical Geography",
        "category": "Geography Resources",
        "definition": "Physical geography investigates Earth's natural spatial systems, landforms, hydrology, pedology, and atmospheric-biospheric dynamics. Key geomorphic and climatological mechanisms include: Plate Tectonics creating alpine fold mountains at convergent boundaries (e.g. the Himalayas formed by the Indo-Australian and Eurasian plate collision) and rift valleys at divergent boundaries; Fluvial and Glacial Erosion sculpting U-shaped glacial valleys, alluvial fans, and river deltas via stream power and sediment transport; Orographic Precipitation and the Rain Shadow Effect, wherein humid air parcels ascend windward mountain slopes, cooling adiabatically at the saturated lapse rate (&Gamma;_moist &approx; 5&deg;C/km) and releasing precipitation, before descending leeward slopes where adiabatic compression (&Gamma;_dry &approx; 10&deg;C/km) produces hyper-arid rain shadow deserts (e.g. the Great Basin or Atacama Desert); and the global distribution of Biomes defined by temperature-precipitation climographs.",
        "basicDefinition": "Physical Geography is the study of natural landforms, weather patterns, oceans, and environments on Earth. It explains how giant tectonic plates push up mountain ranges, how rivers carve deep canyons, and why one side of a mountain can be a lush rainforest while the other side is a bone-dry desert (the rain shadow effect).",
        "breakdown": [
            {
                "label": "Tectonic Landforms",
                "text": "Colliding continental plates push up mountain ranges (Himalayas); separating plates form rift valleys and ocean ridges; subduction zones spawn volcanic arcs."
            },
            {
                "label": "The Rain Shadow Effect",
                "text": "Warm moist air rises up a mountain, cools, and drops rain on the windward side. As dry air sinks down the leeward side, it warms up and creates dry deserts."
            },
            {
                "label": "Global Biomes & Climates",
                "text": "Major ecosystems (tropical rainforests, savannas, temperate forests, taiga, tundra, deserts) determined primarily by annual temperature and rainfall patterns."
            }
        ],
        "example": "Standard Analysis: 'Pacific maritime air at 20&deg;C hits the Sierra Nevada mountains. As it rises from sea level to 3,000 meters, it cools to 5&deg;C, reaching dew-point condensation and dropping heavy snowfall on the windward slope. Descending into Death Valley, the dried air warms to over 35&deg;C, creating one of the driest rain shadow deserts on Earth.'",
        "basicExample": "Simple Sentence: 'Wind pushes clouds up the mountains in California where it rains heavily, leaving Nevada on the other side dry and desert-like!'",
        "proTip": "Remember the Windward vs. Leeward Rule: 'Windward' gets the Wind and the Water (lush and green)! 'Leeward' is in the 'Lee' (sheltered, dry, and desert-like)!",
        "question": "What is the dry, arid region called that forms on the sheltered, leeward side of a mountain range due to sinking, warming air?",
        "choices": [
            "An alluvial delta",
            "A rain shadow desert",
            "A continental shelf"
        ],
        "correctIndex": 1,
        "explanation": "A rain shadow desert forms on the leeward side of high mountain ranges where sinking air warms adiabatically and prevents cloud formation.",
        "equations": [
            {
                "title": "Adiabatic Atmospheric Lapse Rate Equation",
                "latex": "\\Gamma = -\\frac{dT}{dz} \\quad (\\Gamma_{\\text{dry}} \\approx 9.8^\\circ\\text{C/km}, \\, \\Gamma_{\\text{moist}} \\approx 5.0^\\circ\\text{C/km})",
                "note": "Governs temperature drop and condensation in rising orographic air masses."
            },
            {
                "title": "Stream Power Fluvial Erosion Formula",
                "latex": "\\Omega = \\gamma \\cdot Q \\cdot S \\quad (\\gamma = \\text{Water Density}, \\, Q = \\text{Discharge Volume}, \\, S = \\text{Slope Gradient})",
                "note": "Quantifies kinetic hydraulic energy available to carve canyons and transport river sediment."
            },
            {
                "title": "K&ouml;ppen Climate Moisture-Thermal Index",
                "latex": "I_{\\text{climate}} = \\frac{P_{\\text{annual}}}{T_{\\text{mean}} + 10} \\quad (P = \\text{Precipitation in cm}, \\, T = \\text{Temperature in } ^\\circ\\text{C})",
                "note": "Climatological formula determining boundary thresholds between arid, temperate, and tropical biomes."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Orographic Precipitation and Rain Shadow Effect Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='20' y='140' width='90' height='30' fill='#0284c7'/><text x='65' y='158' fill='#ffffff' font-size='8' font-weight='bold' text-anchor='middle'>Ocean (Moisture)</text><path d='M 110 170 L 230 50 L 350 170 Z' fill='#94a3b8' stroke='#475569' stroke-width='2'/><path d='M 210 70 L 230 50 L 250 70 Z' fill='#ffffff'/><path d='M 45 130 Q 90 90 150 85' stroke='#0284c7' stroke-width='2.5' fill='none'/><text x='100' y='90' fill='#0369a1' font-size='7.5' font-weight='bold'>Moist Air Rises &uarr;</text><circle cx='180' cy='65' r='12' fill='#cbd5e1' opacity='0.7'/><circle cx='195' cy='60' r='16' fill='#cbd5e1' opacity='0.8'/><line x1='180' y1='80' x2='175' y2='95' stroke='#0284c7' stroke-width='1.5' stroke-dasharray='2'/><line x1='195' y1='80' x2='190' y2='95' stroke='#0284c7' stroke-width='1.5' stroke-dasharray='2'/><text x='155' y='130' fill='#166534' font-size='8' font-weight='bold'>WINDWARD SLOPE</text><text x='155' y='142' fill='#15803d' font-size='7'>Lush Forests &amp; Rain</text><path d='M 250 85 Q 290 95 330 135' stroke='#ef4444' stroke-width='2.5' fill='none'/><text x='310' y='95' fill='#b91c1c' font-size='7.5' font-weight='bold'>Dry Air Sinks &darr;</text><rect x='330' y='140' width='110' height='30' fill='#fef3c7' stroke='#d97706'/><text x='385' y='153' fill='#92400e' font-size='8' font-weight='bold' text-anchor='middle'>LEEWARD SIDE</text><text x='385' y='164' fill='#b45309' font-size='7' text-anchor='middle'>Rain Shadow Desert</text><text x='230' y='25' fill='#1e293b' font-size='10.5' font-weight='bold' text-anchor='middle'>OROGRAPHIC PRECIPITATION &amp; THE RAIN SHADOW EFFECT</text><text x='230' y='188' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Adiabatic Cooling &rarr; Condensation &bull; Adiabatic Warming &rarr; Desertification &#x2713;</text></svg>",
        "diagramLabel": "Orographic precipitation and rain shadow landform diagram",
        "diagramCaption": "Geomorphology & Microclimates: The orographic precipitation mechanism illustrating adiabatic expansion and rainfall on the windward slope alongside leeward rain shadow desertification.",
        "references": [
            {"title": "USGS Geology, Geomorphology and Landforms", "desc": "United States Geological Survey planetary physical landform studies, fault zones, and topographic change.", "url": "https://www.usgs.gov/science/science-explorer/geology", "icon": "fas fa-mountain"},
            {"title": "NASA Earth Observatory (Global Land & Climate Monitoring)", "desc": "Satellite imagery and spatial datasets documenting global vegetation indices, precipitation, and thermal dynamics.", "url": "https://earthobservatory.nasa.gov", "icon": "fas fa-satellite"},
            {"title": "American Association of Geographers (AAG Educational Resources)", "desc": "Curated scholarly primers on biomes, watershed hydrology, and geomorphological modeling.", "url": "https://www.aag.org", "icon": "fas fa-globe"}
        ]
    },

    "Human Geography": {
        "title": "Human Geography",
        "category": "Geography Resources",
        "definition": "Human geography analyzes the spatial distribution of human populations, cultural practices, economic activities, and urbanization across landscapes. Central theoretical models include: the Demographic Transition Model (DTM), tracing the historical transition from high crude birth rates (CBR) and crude death rates (CDR) in pre-industrial societies (Stage 1), through plummeting death rates and population explosion during industrialization (Stage 2 & 3), to low fertility and aging demographics in post-industrial states (Stage 4 & 5); the Rate of Natural Increase (RNI = (CBR - CDR) / 10 %); Thomas Malthus's population theory contrasted with Esther Boserup's agricultural intensification model; E.G. Ravenstein's Laws of Migration analyzing Push Factors (war, poverty, drought) and Pull Factors (economic opportunity, political stability); and Christaller's Central Place Theory modeling urban settlement hierarchies based on threshold population and market range.",
        "basicDefinition": "Human Geography is the study of people and where they live on Planet Earth. It explores how populations grow, why families migrate from one country to another (looking for better jobs or escaping danger), how languages and religions spread, and why big cities grow around harbors and train stations.",
        "breakdown": [
            {
                "label": "Demographic Transition Model (DTM)",
                "text": "Shows how countries develop: Stage 1 (high birth & death); Stage 2 (medicine lowers death rates; population booms); Stage 3 (birth rates fall); Stage 4 (stable low rates)."
            },
            {
                "label": "Push and Pull Migration Factors",
                "text": "Push factors drive people AWAY from home (famine, warfare, persecution); Pull factors attract people TO a new destination (jobs, peace, education)."
            },
            {
                "label": "Population Density & Urbanization",
                "text": "Arithmetic density measures total people per square mile; physiological density measures people per square mile of farmland, revealing food pressure."
            }
        ],
        "example": "Standard Analysis: 'A nation possesses a Crude Birth Rate of CBR = 32 per 1,000 and a Crude Death Rate of CDR = 7 per 1,000 due to improved medical sanitation. Its Rate of Natural Increase is RNI = (32 - 7) / 10 = +2.5% per year, placing it in Stage 2 of the DTM with a rapid population doubling time of t = 70 / 2.5 = 28 years.'",
        "basicExample": "Simple Sentence: 'People moved to California during the 1849 Gold Rush because the promise of gold was a powerful pull factor!'",
        "proTip": "The Rule of 70 (Doubling Time): To quickly calculate how many years it will take for a population to double in size, divide 70 by the annual growth rate percentage! For instance, a country growing at 2% doubles its population in 70 / 2 = 35 years!",
        "question": "In the Demographic Transition Model (DTM), what primary medical and sanitation change causes a society to enter Stage 2 (rapid population growth)?",
        "choices": [
            "The crude death rate drops sharply while birth rates remain high",
            "The birth rate immediately drops to zero",
            "Both birth and death rates simultaneously increase"
        ],
        "correctIndex": 0,
        "explanation": "Stage 2 is characterized by a rapid drop in crude death rates due to clean water, food security, and medicine, while birth rates remain elevated, driving rapid population growth.",
        "equations": [
            {
                "title": "Rate of Natural Increase (RNI) Percentage",
                "latex": "\\text{RNI} = \\frac{\\text{CBR} - \\text{CDR}}{10} \\, \\% \\quad (\\text{CBR} = \\text{Births per 1,000}, \\, \\text{CDR} = \\text{Deaths per 1,000})",
                "note": "Standard demographic formula computing natural annual population growth excluding net migration."
            },
            {
                "title": "The Rule of 70 Population Doubling Time",
                "latex": "t_{\\text{doubling}} \\approx \\frac{70}{\\text{Growth Rate } (\\%)} \\quad (\\text{e.g. at } 3.5\\% \\text{ growth}, \\, t = 70 / 3.5 = 20 \\,\\text{years})",
                "note": "Mathematical logarithmic approximation calculating elapsed time required for population duplication."
            },
            {
                "title": "Gravity Model of Inter-Urban Migration",
                "latex": "I_{ij} = G \\frac{P_i \\cdot P_j}{d_{ij}^2} \\quad (P = \\text{City Populations}, \\, d = \\text{Distance between cities})",
                "note": "Spatial interaction model predicting migration and economic trade volume between urban centers."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='The Demographic Transition Model DTM Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='30' y='35' width='95' height='120' rx='4' fill='#eff6ff'/><text x='77' y='50' fill='#1e40af' font-size='8' font-weight='bold' text-anchor='middle'>STAGE 1</text><text x='77' y='62' fill='#64748b' font-size='7' text-anchor='middle'>High Stationary</text><rect x='130' y='35' width='95' height='120' rx='4' fill='#fef3c7'/><text x='177' y='50' fill='#92400e' font-size='8' font-weight='bold' text-anchor='middle'>STAGE 2</text><text x='177' y='62' fill='#b45309' font-size='7' text-anchor='middle'>Early Expanding</text><rect x='230' y='35' width='95' height='120' rx='4' fill='#fee2e2'/><text x='277' y='50' fill='#991b1b' font-size='8' font-weight='bold' text-anchor='middle'>STAGE 3</text><text x='277' y='62' fill='#b91c1c' font-size='7' text-anchor='middle'>Late Expanding</text><rect x='330' y='35' width='95' height='120' rx='4' fill='#f0fdf4'/><text x='377' y='50' fill='#166534' font-size='8' font-weight='bold' text-anchor='middle'>STAGE 4</text><text x='377' y='62' fill='#15803d' font-size='7' text-anchor='middle'>Low Stationary</text><path d='M 35 75 Q 120 75 140 75 Q 220 75 250 110 Q 320 135 420 138' stroke='#3b82f6' stroke-width='2.5' fill='none'/><text x='55' y='72' fill='#1d4ed8' font-size='7.5' font-weight='bold'>Birth Rate</text><path d='M 35 80 Q 115 80 145 105 Q 185 130 240 135 Q 320 138 420 140' stroke='#ef4444' stroke-width='2.5' fill='none'/><text x='55' y='92' fill='#b91c1c' font-size='7.5' font-weight='bold'>Death Rate</text><path d='M 35 145 Q 130 145 200 120 Q 280 85 350 70 Q 400 65 420 65' stroke='#10b981' stroke-width='2' stroke-dasharray='4' fill='none'/><text x='355' y='62' fill='#047857' font-size='7.5' font-weight='bold'>Total Population &uarr;</text><text x='230' y='22' fill='#1e293b' font-size='10.5' font-weight='bold' text-anchor='middle'>THE DEMOGRAPHIC TRANSITION MODEL (DTM)</text><text x='230' y='180' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Birth &amp; Death Dynamics &bull; Population Booms &bull; Stage Transitions &#x2713;</text></svg>",
        "diagramLabel": "The demographic transition model DTM diagram",
        "diagramCaption": "Demographic Transition Theory: Historical shift from high birth and death rates in pre-industrial societies to low mortality and fertility in modernized economies.",
        "references": [
            {"title": "United Nations Population Division (World Population Prospects)", "desc": "Official UN demographic datasets, fertility rates, mortality tables, and global migration reports.", "url": "https://www.un.org/development/desa/pd/", "icon": "fas fa-users"},
            {"title": "US Census Bureau International Database (IDB)", "desc": "Demographic measures, age-sex population pyramids, and spatial projections for over 200 countries.", "url": "https://www.census.gov/programs-surveys/international-programs.html", "icon": "fas fa-chart-pie"},
            {"title": "Population Reference Bureau (PRB Human Geography)", "desc": "Nonpartisan research clarifying global demographic trends, public health, and human spatial dynamics.", "url": "https://www.prb.org", "icon": "fas fa-graduation-cap"}
        ]
    },

    "Geographic Data Analysis": {
        "title": "Geographic Data Analysis",
        "category": "Geography Resources",
        "definition": "Geographic Data Analysis and Geographic Information Systems (GIS) combine spatial informatics, cartographic visualization, and quantitative statistical spatial modeling to examine patterns across terrestrial space. Core GIS architecture separates spatial information into discrete thematic layers: Vector Data (discrete features stored as points [trees/wells], lines [roads/rivers], and polygons [city boundaries/parcels]) and Raster Data (continuous pixel grid surfaces storing elevation DEMs, satellite imagery, and temperature arrays). Quantitative spatial methodologies include: Multi-Criteria Spatial Overlay modeling suitable habitations or conservation zones through map algebra (Suitability = &sum; w_k * R_k); Spatial Autocorrelation testing Waldo Tobler's First Law of Geography ('Everything is related to everything else, but near things are more related than distant things') via Moran's I coefficient; and Nearest Neighbor Analysis evaluating point clustering vs. dispersion.",
        "basicDefinition": "Geographic Data Analysis uses modern computer technology like GIS and satellite GPS to create smart maps! Computers stack maps on top of each other like transparent sandwich layers: one layer shows roads, another shows rivers, another shows hills, and another shows where people live. This helps city planners decide where to build new schools, parks, and hospitals.",
        "breakdown": [
            {
                "label": "Vector vs. Raster Data",
                "text": "Vector represents points (dots), lines (roads), and polygons (borders); Raster represents continuous pixel grids (satellite photos, elevation maps)."
            },
            {
                "label": "GIS Spatial Layer Stacking",
                "text": "Combining terrain elevation, water bodies, zoning laws, and census demographics into a single interactive layered computer map."
            },
            {
                "label": "Tobler's First Law & Spatial Clustering",
                "text": "Objects close to each other are more similar than distant objects. Spatial statistics test whether features cluster together or spread randomly."
            }
        ],
        "example": "Standard Analysis: 'An urban planning department performs a multi-criteria GIS overlay to site a new hospital. By intersecting four vector/raster layers (1. within 1 mile of highway; 2. outside 100-year flood zone; 3. slope < 5%; 4. census tract poverty > 20%), map algebra pinpoints optimal candidate parcels with zero human bias.'",
        "basicExample": "Simple Sentence: 'When you open an app to order food and track the delivery driver moving in real time on a road map, you are using geographic data analysis!'",
        "proTip": "The GIS Layer Cake: Think of GIS like a multi-layer birthday cake! The bottom cake layer is the physical ground/terrain; the frosting is the road network; the sprinkles on top are houses and stores; and the candles are the people! You can turn any layer on or off with a mouse click!",
        "question": "In Geographic Information Systems (GIS), what is the data format called that represents real-world imagery as a grid of colored pixel cells (like satellite photos)?",
        "choices": [
            "Vector data",
            "Raster data",
            "Linear attribute data"
        ],
        "correctIndex": 1,
        "explanation": "Raster data consists of a matrix of square pixel cells organized into rows and columns, typical of digital satellite images and elevation grids.",
        "equations": [
            {
                "title": "Multi-Criteria GIS Spatial Overlay Map Algebra",
                "latex": "\\text{Suitability}(x,y) = \\sum_{k=1}^n w_k \\cdot R_k(x,y) \\quad \\left(\\sum_{k=1}^n w_k = 1\\right)",
                "note": "Mathematical overlay model combining weighted raster suitability criteria across geographic space."
            },
            {
                "title": "Moran's I Spatial Autocorrelation Metric",
                "latex": "I = \\frac{N}{S_0} \\frac{\\sum_{i=1}^N \\sum_{j=1}^N w_{ij}(x_i - \\bar{x})(x_j - \\bar{x})}{\\sum_{i=1}^N (x_i - \\bar{x})^2} \\quad (I > 0 \\implies \\text{Clustered})",
                "note": "Quantifies spatial clustering or dispersion to evaluate Tobler's First Law of Geography."
            },
            {
                "title": "Nearest Neighbor Spatial Pattern Index",
                "latex": "R = \\frac{\\bar{d}_{\\text{observed}}}{0.5 / \\sqrt{\\rho}} \\quad (R < 1 \\implies \\text{Clustered}, \\, R = 1 \\implies \\text{Random}, \\, R > 1 \\implies \\text{Dispersed})",
                "note": "Statistical ratio assessing point distribution patterns against theoretical random Poisson processes."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='GIS Multi-Layer Spatial Data Stack Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><polygon points='160,50 300,50 250,75 110,75' fill='#ede9fe' stroke='#8b5cf6' stroke-width='1.5'/><circle cx='180' cy='62' r='4' fill='#7c3aed'/><circle cx='210' cy='65' r='4' fill='#7c3aed'/><text x='315' y='65' fill='#5b21b6' font-size='8' font-weight='bold'>Layer 4: Customers / Points (Vector)</text><polygon points='160,80 300,80 250,105 110,105' fill='#fee2e2' stroke='#ef4444' stroke-width='1.5'/><line x1='130' y1='92' x2='270' y2='92' stroke='#dc2626' stroke-width='2'/><text x='315' y='95' fill='#991b1b' font-size='8' font-weight='bold'>Layer 3: Road Network (Lines)</text><polygon points='160,110 300,110 250,135 110,135' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><rect x='150' y='118' width='35' height='12' fill='#f59e0b' opacity='0.6'/><text x='315' y='125' fill='#92400e' font-size='8' font-weight='bold'>Layer 2: Zoning / Parcels (Polygons)</text><polygon points='160,140 300,140 250,165 110,165' fill='#eff6ff' stroke='#3b82f6' stroke-width='1.5'/><path d='M 140 152 Q 180 145 220 152 T 260 152' stroke='#2563eb' stroke-width='1.5' fill='none'/><text x='315' y='155' fill='#1e40af' font-size='8' font-weight='bold'>Layer 1: Elevation Terrain (Raster)</text><line x1='90' y1='50' x2='90' y2='165' stroke='#64748b' stroke-width='2' stroke-dasharray='3'/><text x='85' y='110' fill='#475569' font-size='8' font-weight='bold' text-anchor='end'>Spatial Stack &uarr;</text><text x='230' y='25' fill='#1e293b' font-size='10.5' font-weight='bold' text-anchor='middle'>GEOGRAPHIC INFORMATION SYSTEMS (GIS) DATA LAYERS</text><text x='230' y='185' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Vector (Points, Lines, Polygons) + Raster Grids &bull; Multi-Criteria Overlay &#x2713;</text></svg>",
        "diagramLabel": "GIS multi-layer spatial data stack diagram",
        "diagramCaption": "Spatial Informatics: The multi-tier GIS data architecture stacking elevation rasters, parcel polygons, road networks, and point datasets for spatial analytics.",
        "references": [
            {"title": "ESRI ArcGIS Education & Spatial Analytics", "desc": "Industry-standard GIS platform providing interactive spatial mapping, storymaps, and raster analysis curricula.", "url": "https://www.esri.com/en-us/industries/education/schools", "icon": "fas fa-layer-group"},
            {"title": "Harvard Center for Geographic Analysis (CGA)", "desc": "Academic spatial research lab developing spatial algorithms, open-source geospatial tools, and big-data cartography.", "url": "https://gis.harvard.edu", "icon": "fas fa-university"},
            {"title": "USGS National Geospatial Program", "desc": "United States Geospatial Data Gateway delivering satellite lidar, digital orthophotos, and hydrographic datasets.", "url": "https://www.usgs.gov/programs/national-geospatial-program", "icon": "fas fa-satellite-dish"}
        ]
    }
,

    "Branches of Government": {
        "title": "Branches of Government",
        "category": "Civics & Government",
        "definition": "The United States Constitution establishes a constitutional federal democratic republic structured upon Baron de Montesquieu's tripartite doctrine of separation of powers and James Madison's system of institutional checks and balances. Power is divided across three co-equal branches: the Legislative Branch (Article I - bicameral Congress consisting of the House of Representatives apportioned by population and the Senate with two senators per state, vested with all lawmaking and budgetary taxation authority); the Executive Branch (Article II - the President, Vice President, and Cabinet departments, responsible for executing federal statutes, directing foreign diplomacy, and commanding the armed forces); and the Judicial Branch (Article III - the Supreme Court and inferior federal courts, vested with interpreting statutory law and exercising judicial review). To prevent tyrannical consolidation, each branch possesses constitutional checks: the President can veto Congressional bills; Congress can override a veto with a two-thirds supermajority in both chambers; and the Supreme Court can declare unconstitutional any law or executive action.",
        "basicDefinition": "The United States government is split into three separate teams called branches so that no single person or group can have total control. The Legislative branch (Congress) writes the laws; the Executive branch (the President) carries out and enforces the laws; and the Judicial branch (the Supreme Court) decides what the laws mean and makes sure they follow the Constitution.",
        "breakdown": [
            {
                "label": "Legislative Branch (Congress)",
                "text": "Bicameral: House of Representatives (435 members based on state population) and Senate (100 members, 2 per state). Writes laws, approves budgets, and declares war."
            },
            {
                "label": "Executive Branch (The President)",
                "text": "The President, Vice President, and Cabinet agencies. Enforces federal laws, acts as Commander-in-Chief of the military, and conducts foreign treaties."
            },
            {
                "label": "Judicial Branch (Supreme Court)",
                "text": "Nine Supreme Court Justices appointed for lifetime tenure. Interprets the Constitution, resolves interstate disputes, and exercises judicial review."
            }
        ],
        "example": "Standard Analysis: 'When Congress passes a statutory environmental bill, the President can exercise executive veto power under Article I, Section 7. Congress can counter this check by marshaling a two-thirds supermajority vote in both the House and Senate to override the presidential veto, enacting the statute into federal law without presidential approval.'",
        "basicExample": "Simple Sentence: 'If Congress passes a bad law, the President can say \"veto!\" (I forbid it), but if two-thirds of Congress still votes for it, the bill becomes law anyway!'",
        "proTip": "The Quick Memory Shortcut: Think of the 3 branches as: Legislative = LAW-makers; Executive = ENFORCERS; Judicial = JUDGES of fairness!",
        "question": "What supermajority vote fraction is required in both the House of Representatives and the Senate to override a presidential veto?",
        "choices": [
            "A simple majority of 51%",
            "A two-thirds (2/3) supermajority",
            "A unanimous 100% vote"
        ],
        "correctIndex": 1,
        "explanation": "Article I, Section 7 of the US Constitution mandates a two-thirds affirmative vote in both chambers of Congress to override a presidential veto.",
        "equations": [
            {
                "title": "Congressional Veto Override Supermajority Threshold",
                "latex": "\\text{Override Threshold} = \\frac{2}{3} \\cdot \\text{Chamber Quorum} \\quad (\\text{Requires } \\ge 290 \\text{ Reps} \\land \\ge 67 \\text{ Senators})",
                "note": "Constitutional arithmetic required to enact statutory law over presidential executive veto."
            },
            {
                "title": "Madisonian Separation of Powers Equilibrium",
                "latex": "\\text{Sovereignty} = \\text{Legislative (Art. I)} \\cap \\text{Executive (Art. II)} \\cap \\text{Judicial (Art. III)}",
                "note": "Mathematical structural model of inter-branch checks preventing autocratic hegemony."
            },
            {
                "title": "Senate Treaty Ratification & Confirmation Quorum",
                "latex": "\\text{Treaty Ratification} \\ge \\frac{2}{3} \\, \\text{Senate Approval}, \\quad \\text{Judicial Appointments} > 50\\% \\, \\text{Simple Majority}",
                "note": "Constitutional advice and consent quotas for executive foreign agreements and judicial confirmations."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Three Branches of US Federal Government Checks and Balances Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='20' y='35' width='120' height='75' rx='6' fill='#eff6ff' stroke='#3b82f6' stroke-width='1.5'/><text x='80' y='54' fill='#1e40af' font-size='9' font-weight='bold' text-anchor='middle'>LEGISLATIVE</text><text x='80' y='68' fill='#1e3a8a' font-size='8' font-weight='bold' text-anchor='middle'>U.S. Congress</text><text x='80' y='82' fill='#64748b' font-size='7' text-anchor='middle'>House &amp; Senate</text><text x='80' y='96' fill='#2563eb' font-size='7' font-weight='bold' text-anchor='middle'>Makes Laws</text><rect x='320' y='35' width='120' height='75' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='380' y='54' fill='#92400e' font-size='9' font-weight='bold' text-anchor='middle'>EXECUTIVE</text><text x='380' y='68' fill='#78350f' font-size='8' font-weight='bold' text-anchor='middle'>The President</text><text x='380' y='82' fill='#b45309' font-size='7' text-anchor='middle'>Cabinet &amp; Military</text><text x='380' y='96' fill='#d97706' font-size='7' font-weight='bold' text-anchor='middle'>Enforces Laws</text><rect x='170' y='115' width='120' height='70' rx='6' fill='#f0fdf4' stroke='#16a34a' stroke-width='1.5'/><text x='230' y='134' fill='#166534' font-size='9' font-weight='bold' text-anchor='middle'>JUDICIAL</text><text x='230' y='148' fill='#14532d' font-size='8' font-weight='bold' text-anchor='middle'>Supreme Court</text><text x='230' y='162' fill='#15803d' font-size='7' text-anchor='middle'>Federal Courts</text><text x='230' y='174' fill='#16a34a' font-size='7' font-weight='bold' text-anchor='middle'>Interprets Laws</text><path d='M 140 55 L 320 55' stroke='#3b82f6' stroke-width='1.8' marker-end='url(#arrow)'/><text x='230' y='48' fill='#1e40af' font-size='7' font-weight='bold' text-anchor='middle'>Veto Override / Impeachment &rarr;</text><path d='M 320 75 L 140 75' stroke='#d97706' stroke-width='1.8' marker-end='url(#arrow)'/><text x='230' y='85' fill='#92400e' font-size='7' font-weight='bold' text-anchor='middle'>&larr; Presidential Veto Power</text><path d='M 100 110 L 170 145' stroke='#16a34a' stroke-width='1.5' marker-end='url(#arrow)'/><text x='115' y='140' fill='#166534' font-size='6.5' font-weight='bold'>Judicial Review</text><path d='M 360 110 L 290 145' stroke='#16a34a' stroke-width='1.5' marker-end='url(#arrow)'/><text x='345' y='140' fill='#166534' font-size='6.5' font-weight='bold'>Review Acts</text><text x='230' y='22' fill='#1e293b' font-size='10.5' font-weight='bold' text-anchor='middle'>THE THREE BRANCHES &amp; CHECKS AND BALANCES</text></svg>",
        "diagramLabel": "Three branches of US federal government checks and balances diagram",
        "diagramCaption": "The Constitutional Separation of Powers: Tripartite distribution of legislative, executive, and judicial powers bound by interlocking checks and balances.",
        "references": [
            {"title": "United States Senate Historical Office (Art. I Powers)", "desc": "Official archival guides to bicameral legislation, Senate advice and consent, and constitutional precedent.", "url": "https://www.senate.gov/history/origins.htm", "icon": "fas fa-landmark"},
            {"title": "The White House (Executive Branch & Cabinet Organization)", "desc": "Official structural overview of presidential duties, executive orders, and federal executive agencies.", "url": "https://www.whitehouse.gov/about-the-white-house/our-government/the-executive-branch/", "icon": "fas fa-user-tie"},
            {"title": "Supreme Court of the United States (About the Court)", "desc": "Official SCOTUS jurisdiction guide, justice biographies, and landmark judicial review opinions.", "url": "https://www.supremecourt.gov/about/about.aspx", "icon": "fas fa-balance-scale"}
        ]
    },

    "Citizenship Rights & Duties": {
        "title": "Citizenship Rights & Duties",
        "category": "Civics & Government",
        "definition": "Citizenship defines the legal, constitutional, and social status of full membership within a political commonwealth. Under the Fourteenth Amendment of the US Constitution, citizenship is acquired through Jus Soli (birthright citizenship within US territorial boundaries), Jus Sanguinis (birth to citizen parents abroad), or naturalization under federal statutory law. In a democratic republic, citizenship entails a vital dual structure: Constitutional Rights guaranteed by the Bill of Rights (freedom of expression, religion, assembly, protection against unreasonable searches, due process, equal protection, and voting franchise protections under the 15th, 19th, 24th, and 26th Amendments) and Civic Obligations. Civic obligations are legally divided into Mandatory Duties enforced by legal penalties (obeying statutory laws, paying federal and state taxes, serving on juries under subpoena, and registering for the Selective Service) and Voluntary Responsibilities essential for democratic vitality (voting in elections, participating in community governance, volunteering, and respecting diverse viewpoints).",
        "basicDefinition": "Being a citizen of a country comes with wonderful freedoms called rights, but also important jobs called duties! Your rights protect your freedom to speak, worship, and vote. Your mandatory duties are things you MUST do by law (like paying taxes and serving on a jury if called). Your civic responsibilities are things you SHOULD do to be a great neighbor and citizen (like voting and helping your community).",
        "breakdown": [
            {
                "label": "Rights vs. Duties vs. Responsibilities",
                "text": "Rights (freedoms protected by the Constitution); Duties (actions required by law with penalties if skipped); Responsibilities (voluntary civic actions that strengthen democracy)."
            },
            {
                "label": "The 14th Amendment & Naturalization",
                "text": "Anyone born on US soil is automatically an American citizen. Immigrants can earn citizenship through naturalization (5 years residency, background check, English & civics exams, Oath of Allegiance)."
            },
            {
                "label": "Jury Duty & The Sixth Amendment",
                "text": "Serving on a jury is a fundamental civic duty ensuring that fellow citizens receive a fair trial by an impartial jury of their peers."
            }
        ],
        "example": "Standard Analysis: 'When an American citizen receives a summons for county court jury service, complying is a mandatory legal duty under the Sixth and Seventh Amendments. Failing to appear without an authorized judicial excuse can result in contempt of court citations, preserving the constitutional right to trial by peers.'",
        "basicExample": "Simple Sentence: 'Voting on election day is a civic responsibility that gives every citizen a direct voice in choosing leaders and passing local school budgets.'",
        "proTip": "Duty vs. Responsibility Trap: How to tell them apart on tests? Ask: 'Will you get fined or arrested if you don't do it?' If YES (like taxes or jury duty), it is a DUTY! If NO (like voting or volunteering), it is a RESPONSIBILITY!",
        "question": "Which of the following is a mandatory legal DUTY required of US citizens by law, rather than a voluntary responsibility?",
        "choices": [
            "Voting in presidential elections",
            "Serving on a jury when summoned by a court",
            "Volunteering at a local animal shelter"
        ],
        "correctIndex": 1,
        "explanation": "Serving on a jury when summoned is a legally enforceable duty vital to the Sixth and Seventh Amendment guarantees of fair trial by peers.",
        "equations": [
            {
                "title": "Fourteenth Amendment Citizenship Acquisition Identity",
                "latex": "\\text{US Citizen} = \\text{Birthright (Jus Soli / Jus Sanguinis)} \\lor \\text{Statutory Naturalization}",
                "note": "Constitutional definition of US citizenship codified in Section 1 of the 14th Amendment."
            },
            {
                "title": "Democratic Civic Health Function",
                "latex": "\\text{Civic Health} = f(\\text{Mandatory Duties}) + g(\\text{Voluntary Civic Engagement})",
                "note": "Sociological balance between legal compliance and active voluntary democratic participation."
            },
            {
                "title": "Naturalization Eligibility Formula",
                "latex": "\\text{Eligibility} \\iff \\text{LPR} \\ge 5\\,\\text{Years} \\land \\text{Good Moral Character} \\land \\text{Civics Exam} \\ge 60\\% \\land \\text{Oath}",
                "note": "Federal statutory requirements for immigrant lawful permanent residents acquiring citizenship."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Mandatory Civic Duties vs Voluntary Civic Responsibilities Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='25' y='35' width='190' height='130' rx='6' fill='#fee2e2' stroke='#ef4444' stroke-width='1.5'/><text x='120' y='55' fill='#991b1b' font-size='9' font-weight='bold' text-anchor='middle'>MANDATORY DUTIES</text><text x='120' y='68' fill='#b91c1c' font-size='7' text-anchor='middle'>(Required by Law &bull; Legal Penalties)</text><rect x='35' y='76' width='170' height='20' rx='3' fill='#ffffff' stroke='#ef4444'/><text x='120' y='90' fill='#991b1b' font-size='7.5' font-weight='bold' text-anchor='middle'>1. Obey Federal &amp; State Laws</text><rect x='35' y='100' width='170' height='20' rx='3' fill='#ffffff' stroke='#ef4444'/><text x='120' y='114' fill='#991b1b' font-size='7.5' font-weight='bold' text-anchor='middle'>2. Pay Taxes (Income, Sales, Property)</text><rect x='35' y='124' width='170' height='20' rx='3' fill='#ffffff' stroke='#ef4444'/><text x='120' y='138' fill='#991b1b' font-size='7.5' font-weight='bold' text-anchor='middle'>3. Serve on Jury when Summoned</text><text x='120' y='156' fill='#7f1d1d' font-size='6.5' text-anchor='middle'>4. Register for Selective Service (Males 18+)</text><rect x='245' y='35' width='190' height='130' rx='6' fill='#eff6ff' stroke='#3b82f6' stroke-width='1.5'/><text x='340' y='55' fill='#1e40af' font-size='9' font-weight='bold' text-anchor='middle'>VOLUNTARY RESPONSIBILITIES</text><text x='340' y='68' fill='#1e3a8a' font-size='7' text-anchor='middle'>(Encouraged &bull; Strengthens Democracy)</text><rect x='255' y='76' width='170' height='20' rx='3' fill='#ffffff' stroke='#3b82f6'/><text x='340' y='90' fill='#1e40af' font-size='7.5' font-weight='bold' text-anchor='middle'>1. Voting in Local &amp; National Elections</text><rect x='255' y='100' width='170' height='20' rx='3' fill='#ffffff' stroke='#3b82f6'/><text x='340' y='114' fill='#1e40af' font-size='7.5' font-weight='bold' text-anchor='middle'>2. Staying Informed on Public Issues</text><rect x='255' y='124' width='170' height='20' rx='3' fill='#ffffff' stroke='#3b82f6'/><text x='340' y='138' fill='#1e40af' font-size='7.5' font-weight='bold' text-anchor='middle'>3. Volunteering in Communities</text><text x='340' y='156' fill='#1e3a8a' font-size='6.5' text-anchor='middle'>4. Respecting Rights &amp; Opinions of Others</text><text x='230' y='22' fill='#1e293b' font-size='10.5' font-weight='bold' text-anchor='middle'>CITIZENSHIP OBLIGATIONS: DUTIES VS. RESPONSIBILITIES</text><text x='230' y='185' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Constitutional Rights Protected &bull; Active Civic Participation Sustained &#x2713;</text></svg>",
        "diagramLabel": "Mandatory civic duties vs voluntary civic responsibilities diagram",
        "diagramCaption": "The Civic Obligation Spectrum: Clear demarcation between mandatory legal duties (enforceable by statute) and voluntary civic responsibilities vital to self-governance.",
        "references": [
            {"title": "U.S. Citizenship and Immigration Services (Citizenship Rights & Responsibilities)", "desc": "Official federal guide to the rights, privileges, and duties of American citizenship and the Naturalization Oath.", "url": "https://www.uscis.gov/citizenship/learn-about-citizenship/rights-and-responsibilities", "icon": "fas fa-flag-usa"},
            {"title": "iCivics (Educational Civic Engagement Curriculum)", "desc": "Founded by Justice Sandra Day O'Connor, interactive educational simulations on constitutional rights and civic participation.", "url": "https://www.icivics.org", "icon": "fas fa-graduation-cap"},
            {"title": "National Archives (The Bill of Rights Full Text)", "desc": "Authoritative transcript and historical context of the first ten amendments protecting civil liberties.", "url": "https://www.archives.gov/founding-docs/bill-of-rights", "icon": "fas fa-file-contract"}
        ]
    },

    "Constitutional Law": {
        "title": "Constitutional Law",
        "category": "Civics & Government",
        "definition": "Constitutional Law encompasses the foundational legal jurisprudence, judicial interpretations, and doctrinal tests that define the scope and limits of governmental power under the United States Constitution. Rooted in the Supremacy Clause of Article VI ('This Constitution, and the Laws of the United States... shall be the supreme Law of the Land'), constitutional law resolves federal-state tensions through Federalism (Article I enumerated powers, Tenth Amendment reserved powers to states, and the Commerce Clause). In the landmark precedent Marbury v. Madison (1803), Chief Justice John Marshall established the doctrine of Judicial Review: the inherent power of the judiciary to review and invalidate legislative statutes and executive actions that conflict with the Constitution. In reviewing government actions that restrict rights or classify citizens, the Supreme Court applies three distinct tiers of constitutional scrutiny: Strict Scrutiny (requiring a compelling governmental interest and narrowly tailored means for fundamental rights and suspect classifications like race); Intermediate Scrutiny (important government interest for gender classifications); and Rational Basis Review (legitimate government purpose for general economic regulations).",
        "basicDefinition": "Constitutional Law is the study of how judges interpret the United States Constitution to solve big legal disagreements. The Constitution is the supreme boss over all other laws: if a city, state, or even Congress passes a law that breaks a rule in the Constitution, the Supreme Court can strike it down and declare it unconstitutional through judicial review.",
        "breakdown": [
            {
                "label": "The Supremacy Clause (Article VI)",
                "text": "The US Constitution, federal laws, and international treaties are the supreme law of the land; state constitutions and laws cannot contradict them."
            },
            {
                "label": "Judicial Review (Marbury v. Madison, 1803)",
                "text": "The landmark Supreme Court case that gave the federal judiciary the ultimate authority to declare acts of Congress and the President unconstitutional."
            },
            {
                "label": "Tiers of Judicial Scrutiny",
                "text": "Three legal tests used by judges: Strict Scrutiny (hardest test; used for race and free speech); Intermediate Scrutiny (gender); Rational Basis (easiest test; general laws)."
            }
        ],
        "example": "Standard Analysis: 'In Brown v. Board of Education (1954), the Supreme Court applied the Equal Protection Clause of the Fourteenth Amendment under strict scrutiny, ruling that state laws establishing \"separate but equal\" racial segregation in public schools were inherently unequal and unconstitutional, nullifying state segregation statutes nationwide.'",
        "basicExample": "Simple Sentence: 'If a town tries to pass a law banning people from peacefully protesting, the courts will strike down the law because the First Amendment protects free speech!'",
        "proTip": "The Legal Hierarchy Ladder: Think of laws like a pyramid! The US Constitution is at the very top. Federal laws are under it, then state constitutions, then state laws, and local city ordinances at the bottom. A lower level can NEVER contradict a higher level!",
        "question": "Which historic 1803 Supreme Court decision established the doctrine of judicial review, enabling courts to strike down unconstitutional federal laws?",
        "choices": [
            "McCulloch v. Maryland",
            "Marbury v. Madison",
            "Gibbons v. Ogden"
        ],
        "correctIndex": 1,
        "explanation": "In Marbury v. Madison (1803), Chief Justice John Marshall established the principle that the Supreme Court has the final authority to invalidate unconstitutional acts of Congress.",
        "equations": [
            {
                "title": "Article VI Supremacy Clause Legal Preemption Axiom",
                "latex": "\\text{US Constitution} > \\text{Federal Treaties} > \\text{Federal Statutes} > \\text{State Constitutions} > \\text{State Statutes}",
                "note": "Constitutional hierarchy dictating preemption whenever federal and state laws conflict."
            },
            {
                "title": "Strict Scrutiny Constitutional Test Formula",
                "latex": "\\text{Law Valid} \\iff \\text{Compelling State Interest} \\land \\text{Narrowly Tailored Means} \\land \\text{Least Restrictive Means}",
                "note": "Most rigorous judicial standard applied to government restrictions on fundamental civil liberties."
            },
            {
                "title": "Marshallian Judicial Review Precedent Axiom",
                "latex": "\\text{Statute } S \\cap \\text{Constitution } C = \\emptyset \\implies \\text{Statute } S \\equiv \\text{Null and Void}",
                "note": "The core holding of Marbury v. Madison (1803) nullifying statutes repugnant to the Constitution."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='The Hierarchy of Constitutional Law Pyramid Diagram'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><polygon points='230,35 150,80 310,80' fill='#ede9fe' stroke='#8b5cf6' stroke-width='1.5'/><text x='230' y='65' fill='#5b21b6' font-size='8.5' font-weight='bold' text-anchor='middle'>U.S. CONSTITUTION</text><text x='230' y='75' fill='#7c3aed' font-size='6.5' text-anchor='middle'>Supreme Law of the Land (Art. VI)</text><polygon points='150,80 110,115 350,115 310,80' fill='#eff6ff' stroke='#3b82f6' stroke-width='1.5'/><text x='230' y='98' fill='#1e40af' font-size='8.5' font-weight='bold' text-anchor='middle'>FEDERAL STATUTES &amp; TREATIES</text><text x='230' y='109' fill='#2563eb' font-size='6.5' text-anchor='middle'>Passed by Congress &bull; Signed by President</text><polygon points='110,115 70,145 390,145 350,115' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='230' y='130' fill='#92400e' font-size='8.5' font-weight='bold' text-anchor='middle'>STATE CONSTITUTIONS &amp; LAWS</text><text x='230' y='140' fill='#b45309' font-size='6.5' text-anchor='middle'>Tenth Amendment Reserved State Powers</text><polygon points='70,145 30,175 430,175 390,145' fill='#f0fdf4' stroke='#16a34a' stroke-width='1.5'/><text x='230' y='160' fill='#166534' font-size='8.5' font-weight='bold' text-anchor='middle'>LOCAL CITY &amp; COUNTY ORDINANCES</text><text x='230' y='170' fill='#15803d' font-size='6.5' text-anchor='middle'>City Councils, Municipal Codes, Zoning Regulations</text><text x='230' y='24' fill='#1e293b' font-size='10.5' font-weight='bold' text-anchor='middle'>THE HIERARCHY OF AMERICAN CONSTITUTIONAL LAW</text></svg>",
        "diagramLabel": "The hierarchy of American constitutional law pyramid diagram",
        "diagramCaption": "The Constitutional Hierarchy: Pyramidal structure illustrating legal supremacy from the federal Constitution down through federal statutes, state codes, and municipal ordinances.",
        "references": [
            {"title": "Oyez Supreme Court Multimedia Archive (Chicago-Kent / Cornell)", "desc": "Authoritative transcripts, audio recordings of oral arguments, and case summaries of all landmark SCOTUS precedents.", "url": "https://www.oyez.org", "icon": "fas fa-balance-scale"},
            {"title": "Legal Information Institute (Cornell Law School)", "desc": "Comprehensive open-access legal repository containing the annotated US Constitution, Supreme Court opinions, and US Code.", "url": "https://www.law.cornell.edu/constitution", "icon": "fas fa-university"},
            {"title": "National Constitution Center (Interactive Constitution Explorer)", "desc": "Clause-by-clause constitutional scholarship authored by leading liberal and conservative legal scholars.", "url": "https://constitutioncenter.org", "icon": "fas fa-landmark"}
        ]
    },

    "Electoral Process": {
        "title": "Electoral Process",
        "category": "Civics & Government",
        "definition": "The United States electoral process translates citizen political preferences into elected legislative and executive representation through multi-stage constitutional and statutory procedures. Presidential elections operate through the indirect constitutional mechanism of the Electoral College (Article II and the Twelfth Amendment): each state receives electoral votes equal to its total Congressional delegation (House seats apportioned by decennial Census population plus 2 Senators), plus 3 for Washington D.C. under the Twenty-Third Amendment, totaling 538 electoral votes. A candidate must secure a simple majority of 270 electoral votes to win the presidency. Most states allocate electors via a Winner-Take-All system, except Maine and Nebraska (district allocation). The broader electoral cycle progresses through: Candidate Filing & Primaries / Caucuses; National Nominating Conventions; General Election Campaigning; November General Election (popular voting on the Tuesday after the first Monday); December meeting of electors; and January Congressional Certification. Key electoral equity challenges include congressional redistricting, gerrymandering (measured by the Efficiency Gap formula), and Voting Rights Act protections.",
        "basicDefinition": "The Electoral Process is how Americans vote to choose their leaders, like the President, senators, and mayors! In presidential elections, voters don't just vote for the candidate directly; they vote for 'electors' from their home state in a system called the Electoral College. There are 538 total electors, and the candidate who wins at least 270 electoral votes becomes President.",
        "breakdown": [
            {
                "label": "The Electoral College (270 to Win)",
                "text": "Total electors: 538 (435 House + 100 Senate + 3 for DC). A candidate must win a majority of 270 electoral votes to win the White House."
            },
            {
                "label": "Primaries, Caucuses & Conventions",
                "text": "Political parties hold primary elections and caucuses in each state to choose delegates who vote for their party's nominee at national summer conventions."
            },
            {
                "label": "Voting Rights Amendments",
                "text": "15th (no racial denial); 19th (women's suffrage, 1920); 24th (banned poll taxes, 1964); 26th (lowered voting age to 18, 1971)."
            }
        ],
        "example": "Standard Analysis: 'California possesses 52 House districts and 2 Senators, giving it 54 electoral votes. Under California's winner-take-all statute, even if a presidential candidate wins the state popular vote by only 50.1% to 49.9%, they receive 100% of all 54 electoral votes, demonstrating the mathematical distortion between popular and electoral totals.'",
        "basicExample": "Simple Sentence: 'When you turn 18 years old, you earn the constitutional right to register and cast your vote in local and national elections!'",
        "proTip": "The Magic Number: Remember 270! Out of 538 total electoral votes in America, half is 269, so a candidate needs exactly ONE more than half (270) to win the White House!",
        "question": "How many total electoral votes must a presidential candidate win in the Electoral College to secure election to the presidency?",
        "choices": [
            "218 electoral votes",
            "270 electoral votes",
            "538 electoral votes"
        ],
        "correctIndex": 1,
        "explanation": "A candidate must win a simple majority of the 538 total electoral votes, which is exactly 270 electoral votes.",
        "equations": [
            {
                "title": "Electoral College Absolute Majority Victory Threshold",
                "latex": "\\text{Total Electors} = 435 \\,(\\text{House}) + 100 \\,(\\text{Senate}) + 3 \\,(\\text{DC}) = 538 \\implies \\text{Victory} \\ge 270",
                "note": "Mathematical threshold codified in the 12th and 23rd Amendments governing presidential elections."
            },
            {
                "title": "Huntington-Hill Method of Congressional Apportionment",
                "latex": "A = \\frac{P}{\\sqrt{n(n + 1)}} \\quad (P = \\text{State Population}, \\, n = \\text{Current Seats Allocated})",
                "note": "Federal algorithm dividing the 435 House seats among the 50 states following each decennial Census."
            },
            {
                "title": "Partisan Gerrymandering Efficiency Gap Metric",
                "latex": "EG = \\frac{W_A - W_B}{V_{\\text{total}}} \\quad (W = \\text{Wasted Votes: Lost votes} + \\text{Surplus votes over 50\\%})",
                "note": "Quantitative constitutional metric measuring partisan district drawing unfairness in federal courts."
            }
        ],
        "diagramSvg": "<svg viewBox='0 0 460 200' width='100%' height='200' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='The American Presidential Election Process Flowchart'><rect width='100%' height='100%' fill='#f8fafc' rx='8'/><rect x='15' y='45' width='90' height='100' rx='6' fill='#eff6ff' stroke='#3b82f6' stroke-width='1.5'/><text x='60' y='68' fill='#1e40af' font-size='9' font-weight='bold' text-anchor='middle'>1. PRIMARIES</text><circle cx='60' cy='95' r='16' fill='#3b82f6'/><text x='60' y='99' fill='#ffffff' font-size='9' font-weight='bold' text-anchor='middle'>Vote</text><text x='60' y='125' fill='#1e3a8a' font-size='7.5' text-anchor='middle'>State Primaries</text><text x='60' y='136' fill='#1e3a8a' font-size='7.5' text-anchor='middle'>&amp; Caucuses</text><path d='M 108 95 L 122 95' stroke='#3b82f6' stroke-width='2' marker-end='url(#arrow)'/><rect x='125' y='45' width='95' height='100' rx='6' fill='#fef3c7' stroke='#d97706' stroke-width='1.5'/><text x='172' y='68' fill='#92400e' font-size='9' font-weight='bold' text-anchor='middle'>2. CONVENTIONS</text><rect x='147' y='82' width='50' height='26' rx='3' fill='#d97706'/><text x='172' y='98' fill='#ffffff' font-size='8' font-weight='bold' text-anchor='middle'>Nominee</text><text x='172' y='125' fill='#78350f' font-size='7.5' text-anchor='middle'>Party Selects</text><text x='172' y='136' fill='#78350f' font-size='7.5' text-anchor='middle'>Official Nominee</text><path d='M 223 95 L 237 95' stroke='#d97706' stroke-width='2' marker-end='url(#arrow)'/><rect x='240' y='45' width='95' height='100' rx='6' fill='#fee2e2' stroke='#ef4444' stroke-width='1.5'/><text x='287' y='68' fill='#991b1b' font-size='9' font-weight='bold' text-anchor='middle'>3. GENERAL</text><rect x='262' y='82' width='50' height='26' rx='3' fill='#ef4444'/><text x='287' y='98' fill='#ffffff' font-size='8' font-weight='bold' text-anchor='middle'>Nov. Vote</text><text x='287' y='125' fill='#991b1b' font-size='7.5' text-anchor='middle'>Citizen Ballots</text><text x='287' y='136' fill='#991b1b' font-size='7.5' text-anchor='middle'>Across 50 States</text><path d='M 338 95 L 352 95' stroke='#ef4444' stroke-width='2' marker-end='url(#arrow)'/><rect x='355' y='45' width='90' height='100' rx='6' fill='#f0fdf4' stroke='#16a34a' stroke-width='1.5'/><text x='400' y='68' fill='#166534' font-size='9' font-weight='bold' text-anchor='middle'>4. ELECTORAL</text><circle cx='400' cy='95' r='16' fill='#16a34a'/><text x='400' y='99' fill='#ffffff' font-size='8.5' font-weight='bold' text-anchor='middle'>270</text><text x='400' y='125' fill='#14532d' font-size='7.5' text-anchor='middle'>538 Electors</text><text x='400' y='136' fill='#14532d' font-size='7.5' text-anchor='middle'>270 to Win!</text><text x='230' y='25' fill='#1e293b' font-size='10.5' font-weight='bold' text-anchor='middle'>THE PRESIDENTIAL ELECTORAL JOURNEY</text><text x='230' y='180' fill='#475569' font-size='9' font-weight='bold' text-anchor='middle'>Citizen Popular Voting &bull; State Electors Apportioned &bull; 270 Majority &#x2713;</text></svg>",
        "diagramLabel": "The American presidential election process flowchart diagram",
        "diagramCaption": "The American Electoral Cycle: Sequential progression from state primary elections and national nominating conventions to the November general election and 270-elector majority confirmation.",
        "references": [
            {"title": "Federal Election Commission (FEC Guide to Elections)", "desc": "Official regulatory agency administering federal campaign finance disclosure and presidential public funding.", "url": "https://www.fec.gov/introduction-campaign-finance/understanding-ways-support-federal-candidates/", "icon": "fas fa-vote-yea"},
            {"title": "National Archives (About the Electoral College)", "desc": "Official archival repository explaining the history, state elector allocation, and certification procedures.", "url": "https://www.archives.gov/electoral-college/about", "icon": "fas fa-university"},
            {"title": "Ballotpedia (The Encyclopedia of American Politics)", "desc": "Nonpartisan encyclopedia providing unbiased electoral race overviews, ballot measures, and voting laws.", "url": "https://ballotpedia.org/Electoral_College", "icon": "fas fa-check-double"}
        ]
    }

};
