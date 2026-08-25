// State Management
let currentQuestions = [];
let currentQuestionIndex = 0;
let score = 0;
let streak = 0;
let userAnswers = [];

// Expanded Database of Questions
const questionBank = [
    // ==================== PRE-K ====================
    // Existing
    { grade: "Pre-K", subject: "Math", question: "Which number comes after 2?", options: ["1", "3", "4", "5"], answer: "3", hint: "Count: 1, 2, ..." },
    { grade: "Pre-K", subject: "Math", question: "Which shape is round?", options: ["Square", "Circle", "Triangle", "Star"], answer: "Circle", hint: "It looks like a ball." },
    { grade: "Pre-K", subject: "Math", question: "How many fingers do you have on one hand?", options: ["4", "5", "10", "2"], answer: "5", hint: "Count your fingers." },
    { grade: "Pre-K", subject: "Math", question: "Which one is bigger?", options: ["Mouse", "Elephant", "Ant", "Bee"], answer: "Elephant", hint: "It has a trunk." },
    { grade: "Pre-K", subject: "Math", question: "Count the dots: • • •", options: ["2", "3", "4", "5"], answer: "3", hint: "One, two, three." },
    { grade: "Pre-K", subject: "Math", question: "Which shape has 3 sides?", options: ["Circle", "Triangle", "Square", "Oval"], answer: "Triangle", hint: "Tri means three." },
    { grade: "Pre-K", subject: "Language Arts", question: "What letter does 'Apple' start with?", options: ["A", "B", "C", "D"], answer: "A", hint: "Ah-ah-apple." },
    { grade: "Pre-K", subject: "Language Arts", question: "Which word rhymes with 'Cat'?", options: ["Dog", "Bat", "Fish", "Ball"], answer: "Bat", hint: "They sound similar." },
    { grade: "Pre-K", subject: "Language Arts", question: "What sound does a cow make?", options: ["Moo", "Woof", "Meow", "Quack"], answer: "Moo", hint: "Found on a farm." },
    { grade: "Pre-K", subject: "Language Arts", question: "Which one is a color?", options: ["Car", "Blue", "Dog", "Run"], answer: "Blue", hint: "Like the sky." },
    { grade: "Pre-K", subject: "Language Arts", question: "What is your name written with?", options: ["Letters", "Numbers", "Shapes", "Colors"], answer: "Letters", hint: "A, B, C..." },
    { grade: "Pre-K", subject: "Science", question: "What shines in the sky during the day?", options: ["Moon", "Sun", "Stars", "Lamp"], answer: "Sun", hint: "It is very bright and hot." },
    { grade: "Pre-K", subject: "Science", question: "Which animal swims in water?", options: ["Bird", "Fish", "Cat", "Rabbit"], answer: "Fish", hint: "It has fins." },
    { grade: "Pre-K", subject: "Science", question: "What falls from the sky when it rains?", options: ["Candy", "Water", "Sand", "Toys"], answer: "Water", hint: "It gets you wet." },
    { grade: "Pre-K", subject: "Science", question: "Which animal can fly?", options: ["Dog", "Bird", "Cat", "Cow"], answer: "Bird", hint: "It has wings." },
    { grade: "Pre-K", subject: "Social Studies", question: "Who helps us when we are sick?", options: ["Firefighter", "Doctor", "Baker", "Farmer"], answer: "Doctor", hint: "They work at a hospital." },
    { grade: "Pre-K", subject: "Social Studies", question: "What color is a stop sign?", options: ["Green", "Red", "Blue", "Yellow"], answer: "Red", hint: "Means stop." },
    { grade: "Pre-K", subject: "Social Studies", question: "Where do you sleep?", options: ["Kitchen", "Bedroom", "Bathroom", "Garage"], answer: "Bedroom", hint: "It has a bed." },
    { grade: "Pre-K", subject: "Social Studies", question: "Who drives the school bus?", options: ["Bus Driver", "Pilot", "Chef", "Nurse"], answer: "Bus Driver", hint: "Drives the bus." },
    // New
    { grade: "Pre-K", subject: "Math", question: "Which number is smallest?", options: ["1", "5", "10", "3"], answer: "1", hint: "First number you count." },
    { grade: "Pre-K", subject: "Math", question: "What comes next: 1, 2, 3, _?", options: ["4", "5", "A", "Blue"], answer: "4", hint: "Keep counting." },
    { grade: "Pre-K", subject: "Math", question: "Which shape looks like a box?", options: ["Circle", "Square", "Star", "Heart"], answer: "Square", hint: "Four corners." },
    { grade: "Pre-K", subject: "Math", question: "How many eyes do you have?", options: ["1", "2", "3", "4"], answer: "2", hint: "Touch them gently." },
    { grade: "Pre-K", subject: "Math", question: "Which is heavy?", options: ["Feather", "Rock", "Paper", "Balloon"], answer: "Rock", hint: "Hard to lift." },
    { grade: "Pre-K", subject: "Language Arts", question: "First letter of 'Dog'?", options: ["D", "C", "B", "A"], answer: "D", hint: "Duh-duh-dog." },
    { grade: "Pre-K", subject: "Language Arts", question: "Opposite of 'Big'?", options: ["Huge", "Small", "Tall", "Fat"], answer: "Small", hint: "Tiny." },
    { grade: "Pre-K", subject: "Language Arts", question: "What do you read?", options: ["Book", "Shoe", "Apple", "Spoon"], answer: "Book", hint: "Has pages." },
    { grade: "Pre-K", subject: "Language Arts", question: "Which rhymes with 'Pan'?", options: ["Fan", "Pen", "Pin", "Pot"], answer: "Fan", hint: "Sounds like Pan." },
    { grade: "Pre-K", subject: "Language Arts", question: "What says 'Meow'?", options: ["Dog", "Cat", "Cow", "Pig"], answer: "Cat", hint: "Soft pet." },
    { grade: "Pre-K", subject: "Science", question: "What is cold?", options: ["Fire", "Sun", "Ice Cream", "Tea"], answer: "Ice Cream", hint: "Frozen treat." },
    { grade: "Pre-K", subject: "Science", question: "Where do birds live?", options: ["Nest", "Cave", "Water", "Car"], answer: "Nest", hint: "In trees." },
    { grade: "Pre-K", subject: "Science", question: "What color is grass?", options: ["Red", "Blue", "Green", "Purple"], answer: "Green", hint: "Outside color." },
    { grade: "Pre-K", subject: "Science", question: "How many legs does a dog have?", options: ["2", "4", "6", "8"], answer: "4", hint: "Count paws." },
    { grade: "Pre-K", subject: "Science", question: "What comes from a cloud?", options: ["Rain", "Dirt", "Rocks", "Sand"], answer: "Rain", hint: "Wet weather." },
    { grade: "Pre-K", subject: "Social Studies", question: "Who puts out fires?", options: ["Doctor", "Teacher", "Firefighter", "Baker"], answer: "Firefighter", hint: "Big red truck." },
    { grade: "Pre-K", subject: "Social Studies", question: "We say 'Thank you' when?", options: ["We get a gift", "We hit someone", "We sleep", "We run"], answer: "We get a gift", hint: "Being polite." },
    { grade: "Pre-K", subject: "Social Studies", question: "Who teaches you?", options: ["Teacher", "Cat", "Baby", "Tree"], answer: "Teacher", hint: "At school." },
    { grade: "Pre-K", subject: "Social Studies", question: "A friend is someone who?", options: ["Plays with you", "Yells at you", "Takes your toys", "Hits you"], answer: "Plays with you", hint: "Is nice." },
    { grade: "Pre-K", subject: "Social Studies", question: "What do we do in a library?", options: ["Yell", "Run", "Read quietly", "Eat dinner"], answer: "Read quietly", hint: "Shhh." },
    { grade: "Pre-K", subject: "Social Studies", question: "What do we do with trash?", options: ["Throw in trash can", "Eat it", "Put in pocket", "Throw on floor"], answer: "Throw in trash can", hint: "Clean up." },
    { grade: "Pre-K", subject: "Science", question: "Which animal says 'Quack'?", options: ["Duck", "Dog", "Cat", "Lion"], answer: "Duck", hint: "Swims in ponds." },
    { grade: "Pre-K", subject: "Math", question: "Which is a circle?", options: ["Coin", "Book", "Door", "Ruler"], answer: "Coin", hint: "Round." },
    { grade: "Pre-K", subject: "Math", question: "How many legs does a spider have?", options: ["2", "4", "8", "6"], answer: "8", hint: "Itsy bitsy." },
    { grade: "Pre-K", subject: "Math", question: "Which is number 5?", options: ["5", "2", "3", "1"], answer: "5", hint: "High five." },
    { grade: "Pre-K", subject: "Language Arts", question: "Apple starts with?", options: ["A", "B", "C", "D"], answer: "A", hint: "Ah-ah." },
    { grade: "Pre-K", subject: "Language Arts", question: "Rhyme with 'Hat'?", options: ["Cat", "Dog", "Pig", "Cow"], answer: "Cat", hint: "Meow." },
    { grade: "Pre-K", subject: "Science", question: "What is wet?", options: ["Water", "Sand", "Rock", "Wood"], answer: "Water", hint: "Rain." },
    { grade: "Pre-K", subject: "Science", question: "Where does a fish live?", options: ["Water", "Tree", "Nest", "House"], answer: "Water", hint: "Ocean or river." },
    { grade: "Pre-K", subject: "Social Studies", question: "Stop sign color?", options: ["Red", "Green", "Blue", "Black"], answer: "Red", hint: "Danger." },
    { grade: "Pre-K", subject: "Social Studies", question: "Police drive?", options: ["Police Car", "Bus", "Train", "Bike"], answer: "Police Car", hint: "Sirens." },

    // ==================== KINDERGARTEN ====================
    // Existing
    { grade: "Kindergarten", subject: "Math", question: "What is 2 + 3?", options: ["4", "5", "6", "1"], answer: "5", hint: "Count on your fingers." },
    { grade: "Kindergarten", subject: "Math", question: "Which number is ten?", options: ["1", "5", "10", "01"], answer: "10", hint: "It has a 1 and a 0." },
    { grade: "Kindergarten", subject: "Math", question: "Which object is heavier?", options: ["Feather", "Car", "Pencil", "Leaf"], answer: "Car", hint: "You can't lift it." },
    { grade: "Kindergarten", subject: "Math", question: "What comes after 9?", options: ["8", "10", "11", "7"], answer: "10", hint: "1, 2... 8, 9..." },
    { grade: "Kindergarten", subject: "Math", question: "Which shape has 4 equal sides?", options: ["Triangle", "Rectangle", "Square", "Circle"], answer: "Square", hint: "Like a box." },
    { grade: "Kindergarten", subject: "Language Arts", question: "What is the opposite of 'Up'?", options: ["Left", "Down", "Right", "Over"], answer: "Down", hint: "Look at the floor." },
    { grade: "Kindergarten", subject: "Language Arts", question: "Which letter is a vowel?", options: ["B", "T", "E", "Z"], answer: "E", hint: "A, E, I, O, U." },
    { grade: "Kindergarten", subject: "Language Arts", question: "Choose the rhyming word: 'Frog'", options: ["Log", "Pig", "Rug", "Pan"], answer: "Log", hint: "Ends with -og." },
    { grade: "Kindergarten", subject: "Language Arts", question: "Which word starts with 'B'?", options: ["Apple", "Ball", "Cat", "Dog"], answer: "Ball", hint: "B-b-ball." },
    { grade: "Kindergarten", subject: "Language Arts", question: "Find the lowercase letter: A", options: ["B", "a", "D", "E"], answer: "a", hint: "Small version of A." },
    { grade: "Kindergarten", subject: "Science", question: "What do plants need to grow?", options: ["Candy", "Water", "Toys", "Juice"], answer: "Water", hint: "Rain helps them." },
    { grade: "Kindergarten", subject: "Science", question: "Which season is snowy and cold?", options: ["Summer", "Winter", "Spring", "Fall"], answer: "Winter", hint: "You build snowmen." },
    { grade: "Kindergarten", subject: "Science", question: "What body part do you use to see?", options: ["Ears", "Nose", "Eyes", "Mouth"], answer: "Eyes", hint: "Look!" },
    { grade: "Kindergarten", subject: "Science", question: "Which animal lives on a farm?", options: ["Lion", "Cow", "Shark", "Whale"], answer: "Cow", hint: "Says Moo." },
    { grade: "Kindergarten", subject: "Social Studies", question: "Who delivers the mail?", options: ["Doctor", "Mail Carrier", "Police Officer", "Chef"], answer: "Mail Carrier", hint: "They bring letters." },
    { grade: "Kindergarten", subject: "Social Studies", question: "Where do students learn?", options: ["Park", "School", "Store", "Beach"], answer: "School", hint: "Has teachers." },
    { grade: "Kindergarten", subject: "Social Studies", question: "What country do we live in?", options: ["USA", "Mars", "Disney World", "The Moon"], answer: "USA", hint: "United States." },
    { grade: "Kindergarten", subject: "Social Studies", question: "Which day is part of the weekend?", options: ["Monday", "Wednesday", "Sunday", "Friday"], answer: "Sunday", hint: "No school." },
    // New
    { grade: "Kindergarten", subject: "Math", question: "Count back from 5: 5, 4, 3, _?", options: ["2", "6", "1", "0"], answer: "2", hint: "One less." },
    { grade: "Kindergarten", subject: "Math", question: "Which is a penny?", options: ["Brown coin", "Silver coin", "Paper money", "Gold bar"], answer: "Brown coin", hint: "1 cent." },
    { grade: "Kindergarten", subject: "Math", question: "How many corners in a triangle?", options: ["3", "4", "0", "5"], answer: "3", hint: "Pointy parts." },
    { grade: "Kindergarten", subject: "Math", question: "2 + 2 = ?", options: ["3", "4", "5", "22"], answer: "4", hint: "Double 2." },
    { grade: "Kindergarten", subject: "Math", question: "Which is longer?", options: ["Pencil", "Crayon", "Eraser", "Bus"], answer: "Bus", hint: "Very big." },
    { grade: "Kindergarten", subject: "Language Arts", question: "What ends a sentence?", options: ["Period", "Letter", "Number", "Space"], answer: "Period", hint: "Dot." },
    { grade: "Kindergarten", subject: "Language Arts", question: "Rhyme with 'Sun'?", options: ["Run", "Sit", "Sat", "Map"], answer: "Run", hint: "Go fast." },
    { grade: "Kindergarten", subject: "Language Arts", question: "Opposite of 'Hot'?", options: ["Cold", "Warm", "Fire", "Red"], answer: "Cold", hint: "Winter." },
    { grade: "Kindergarten", subject: "Language Arts", question: "First letter of your alphabet?", options: ["Z", "M", "A", "O"], answer: "A", hint: "Start." },
    { grade: "Kindergarten", subject: "Language Arts", question: "Which is a word?", options: ["cat", "xzq", "123", "$$$"], answer: "cat", hint: "Animal." },
    { grade: "Kindergarten", subject: "Science", question: "Is a rock alive?", options: ["Yes", "No", "Sometimes", "Maybe"], answer: "No", hint: "It doesn't grow." },
    { grade: "Kindergarten", subject: "Science", question: "What do you hear with?", options: ["Eyes", "Ears", "Nose", "Toes"], answer: "Ears", hint: "Listen." },
    { grade: "Kindergarten", subject: "Science", question: "Sun gives us?", options: ["Light and Heat", "Water", "Toys", "Snow"], answer: "Light and Heat", hint: "Warmth." },
    { grade: "Kindergarten", subject: "Science", question: "What floats in water?", options: ["Rock", "Key", "Leaf", "Brick"], answer: "Leaf", hint: "Light." },
    { grade: "Kindergarten", subject: "Science", question: "Baby dog is called?", options: ["Kitten", "Puppy", "Calf", "Chick"], answer: "Puppy", hint: "Woof." },
    { grade: "Kindergarten", subject: "Social Studies", question: "Red, White, and ___?", options: ["Blue", "Green", "Yellow", "Orange"], answer: "Blue", hint: "Flag colors." },
    { grade: "Kindergarten", subject: "Social Studies", question: "Who keeps us safe?", options: ["Police Officer", "Baker", "Clown", "Cat"], answer: "Police Officer", hint: "Badge." },
    { grade: "Kindergarten", subject: "Social Studies", question: "A globe is a map of?", options: ["Earth", "Mars", "School", "Town"], answer: "Earth", hint: "World." },
    { grade: "Kindergarten", subject: "Social Studies", question: "We buy food at?", options: ["Library", "Grocery Store", "Park", "School"], answer: "Grocery Store", hint: "Market." },
    { grade: "Kindergarten", subject: "Social Studies", question: "Birthday celebrates?", options: ["Age", "Height", "Weight", "School"], answer: "Age", hint: "Born day." },
    { grade: "Kindergarten", subject: "Language Arts", question: "Opposite of 'Happy'?", options: ["Sad", "Fun", "Fast", "Up"], answer: "Sad", hint: "Crying." },
    { grade: "Kindergarten", subject: "Math", question: "How many toes on one foot?", options: ["5", "10", "1", "2"], answer: "5", hint: "Count them." },
    { grade: "Kindergarten", subject: "Science", question: "What color is the sky on a sunny day?", options: ["Blue", "Green", "Purple", "Red"], answer: "Blue", hint: "Look up." },
    { grade: "Kindergarten", subject: "Math", question: "Which is a triangle?", options: ["Slice of pizza", "Box", "Ball", "Egg"], answer: "Slice of pizza", hint: "3 sides." },
    { grade: "Kindergarten", subject: "Math", question: "5 + 0 = ?", options: ["5", "0", "50", "10"], answer: "5", hint: "Adding nothing." },
    { grade: "Kindergarten", subject: "Language Arts", question: "First letter of 'Zebra'?", options: ["Z", "A", "B", "C"], answer: "Z", hint: "Last letter." },
    { grade: "Kindergarten", subject: "Language Arts", question: "Action word?", options: ["Jump", "Blue", "Cat", "Tree"], answer: "Jump", hint: "Move your body." },
    { grade: "Kindergarten", subject: "Science", question: "Snow is?", options: ["Cold", "Hot", "Warm", "Dry"], answer: "Cold", hint: "Winter." },
    { grade: "Kindergarten", subject: "Science", question: "Cows give us?", options: ["Milk", "Juice", "Soda", "Water"], answer: "Milk", hint: "White drink." },
    { grade: "Kindergarten", subject: "Social Studies", question: "Fire trucks are?", options: ["Red", "Blue", "Green", "Purple"], answer: "Red", hint: "Bright color." },
    { grade: "Kindergarten", subject: "Social Studies", question: "In school we?", options: ["Learn", "Sleep", "Fight", "Scream"], answer: "Learn", hint: "Study." },

    // ==================== 1ST GRADE ====================
    // Existing
    { grade: "First Grade", subject: "Math", question: "Which number is greater: 15 or 51?", options: ["15", "51", "Equal", "0"], answer: "51", hint: "Look at the tens place." },
    { grade: "First Grade", subject: "Math", question: "How many sides does a triangle have?", options: ["3", "4", "5", "2"], answer: "3", hint: "Tri means three." },
    { grade: "First Grade", subject: "Math", question: "What comes next: 2, 4, 6, _?", options: ["7", "8", "9", "10"], answer: "8", hint: "Skip counting by 2." },
    { grade: "First Grade", subject: "Math", question: "What is 10 + 5?", options: ["105", "15", "50", "5"], answer: "15", hint: "Ten and five more." },
    { grade: "First Grade", subject: "Math", question: "How many pennies in a nickel?", options: ["1", "5", "10", "25"], answer: "5", hint: "Copper coins." },
    { grade: "First Grade", subject: "Language Arts", question: "Identify the verb: 'The dog ran fast.'", options: ["Dog", "Ran", "Fast", "The"], answer: "Ran", hint: "It is the action word." },
    { grade: "First Grade", subject: "Language Arts", question: "Which word should be capitalized?", options: ["cat", "run", "sunday", "big"], answer: "sunday", hint: "Days of the week." },
    { grade: "First Grade", subject: "Language Arts", question: "What is the punctuation at the end of a question?", options: [".", "!", "?", ","], answer: "?", hint: "Question mark." },
    { grade: "First Grade", subject: "Language Arts", question: "Which word is a noun?", options: ["Run", "Blue", "Table", "Quickly"], answer: "Table", hint: "Person, place, or thing." },
    { grade: "First Grade", subject: "Language Arts", question: "Opposite of 'Hot'?", options: ["Warm", "Cold", "Sun", "Fire"], answer: "Cold", hint: "Winter weather." },
    { grade: "First Grade", subject: "Science", question: "Which animal lays eggs?", options: ["Dog", "Cat", "Chicken", "Cow"], answer: "Chicken", hint: "It is a bird." },
    { grade: "First Grade", subject: "Science", question: "What part of the plant grows underground?", options: ["Leaf", "Stem", "Root", "Flower"], answer: "Root", hint: "Holds the plant down." },
    { grade: "First Grade", subject: "Science", question: "What does a caterpillar become?", options: ["Worm", "Butterfly", "Spider", "Fly"], answer: "Butterfly", hint: "It builds a cocoon." },
    { grade: "First Grade", subject: "Science", question: "Which is a living thing?", options: ["Rock", "Tree", "Water", "Car"], answer: "Tree", hint: "It grows." },
    { grade: "First Grade", subject: "Social Studies", question: "What is a community?", options: ["A toy", "A place where people live", "A type of food", "A sport"], answer: "A place where people live", hint: "Like your town." },
    { grade: "First Grade", subject: "Social Studies", question: "Which is a rule?", options: ["Eat candy", "Raise your hand", "Run inside", "Sleep in class"], answer: "Raise your hand", hint: "Good classroom behavior." },
    { grade: "First Grade", subject: "Social Studies", question: "What does a map show?", options: ["Places", "Names", "Food", "Games"], answer: "Places", hint: "Help you find your way." },
    { grade: "First Grade", subject: "Social Studies", question: "Who leads the country?", options: ["Principal", "Mayor", "President", "Police"], answer: "President", hint: "Highest leader." },
    // New
    { grade: "First Grade", subject: "Math", question: "7 - 3 = ?", options: ["4", "5", "10", "3"], answer: "4", hint: "Take away." },
    { grade: "First Grade", subject: "Math", question: "What is 10 + 10?", options: ["100", "20", "0", "11"], answer: "20", hint: "Two tens." },
    { grade: "First Grade", subject: "Math", question: "Count by 5s: 5, 10, 15, _?", options: ["16", "20", "25", "30"], answer: "20", hint: "Add 5." },
    { grade: "First Grade", subject: "Math", question: "Which is a cylinder?", options: ["Ball", "Can", "Box", "Cone"], answer: "Can", hint: "Round and long." },
    { grade: "First Grade", subject: "Math", question: "Half of 4 is?", options: ["1", "2", "3", "8"], answer: "2", hint: "Split in two." },
    { grade: "First Grade", subject: "Language Arts", question: "Plural of 'Cat'?", options: ["Cates", "Cats", "Cat's", "Kitten"], answer: "Cats", hint: "More than one." },
    { grade: "First Grade", subject: "Language Arts", question: "Word for 'Run' in past?", options: ["Running", "Ran", "Runs", "Runned"], answer: "Ran", hint: "Did it yesterday." },
    { grade: "First Grade", subject: "Language Arts", question: "Is 'Blue' a noun or adjective?", options: ["Noun", "Adjective", "Verb", "Pronoun"], answer: "Adjective", hint: "Describes color." },
    { grade: "First Grade", subject: "Language Arts", question: "Compound word: Rain + Bow?", options: ["Rainy", "Bowrain", "Rainbow", "Cloud"], answer: "Rainbow", hint: "Colors in sky." },
    { grade: "First Grade", subject: "Language Arts", question: "Which word rhymes with 'Cake'?", options: ["Make", "Cat", "Cook", "Eat"], answer: "Make", hint: "Bake." },
    { grade: "First Grade", subject: "Science", question: "Sun rises in the?", options: ["West", "North", "East", "South"], answer: "East", hint: "Morning." },
    { grade: "First Grade", subject: "Science", question: "Fish breathe with?", options: ["Lungs", "Gills", "Nose", "Mouth"], answer: "Gills", hint: "Underwater." },
    { grade: "First Grade", subject: "Science", question: "Ice is water as a?", options: ["Gas", "Liquid", "Solid", "Plasma"], answer: "Solid", hint: "Hard." },
    { grade: "First Grade", subject: "Science", question: "Humans breath?", options: ["Water", "Air", "Dirt", "Food"], answer: "Air", hint: "Oxygen." },
    { grade: "First Grade", subject: "Science", question: "Magnets stick to?", options: ["Wood", "Plastic", "Metal", "Glass"], answer: "Metal", hint: "Iron." },
    { grade: "First Grade", subject: "Social Studies", question: "Bald Eagle is a symbol of?", options: ["USA", "UK", "China", "Mars"], answer: "USA", hint: "America." },
    { grade: "First Grade", subject: "Social Studies", question: "Wants vs Needs: Toy is a?", options: ["Need", "Want", "Food", "Job"], answer: "Want", hint: "Don't need to live." },
    { grade: "First Grade", subject: "Social Studies", question: "Past is?", options: ["Now", "Tomorrow", "Long ago", "Soon"], answer: "Long ago", hint: "History." },
    { grade: "First Grade", subject: "Social Studies", question: "Mayor leads a?", options: ["Country", "State", "City", "School"], answer: "City", hint: "Town." },
    { grade: "First Grade", subject: "Social Studies", question: "Globe shape?", options: ["Flat", "Square", "Round", "Triangle"], answer: "Round", hint: "Sphere." },
    { grade: "First Grade", subject: "Math", question: "10 - 5 = ?", options: ["5", "15", "10", "2"], answer: "5", hint: "Half of 10." },
    { grade: "First Grade", subject: "Social Studies", question: "Where does the President live?", options: ["White House", "School", "Library", "Space"], answer: "White House", hint: "Washington DC." },
    { grade: "First Grade", subject: "Science", question: "What comes after winter?", options: ["Spring", "Summer", "Fall", "Night"], answer: "Spring", hint: "Flowers bloom." },
    { grade: "First Grade", subject: "Math", question: "Clock shows?", options: ["Time", "Weight", "Length", "Speed"], answer: "Time", hint: "Tick tock." },
    { grade: "First Grade", subject: "Math", question: "Sides on a square?", options: ["4", "3", "5", "6"], answer: "4", hint: "Box." },
    { grade: "First Grade", subject: "Language Arts", question: "Verb in 'Birds fly'?", options: ["Fly", "Birds", "In", "On"], answer: "Fly", hint: "Action." },
    { grade: "First Grade", subject: "Language Arts", question: "Antonym for 'Fast'?", options: ["Slow", "Quick", "Run", "Go"], answer: "Slow", hint: "Turtle." },
    { grade: "First Grade", subject: "Science", question: "Humans need?", options: ["Food/Water", "Candy", "Toys", "TV"], answer: "Food/Water", hint: "Survival." },
    { grade: "First Grade", subject: "Science", question: "Which is a liquid?", options: ["Milk", "Ice", "Rock", "Wood"], answer: "Milk", hint: "Pour it." },
    { grade: "First Grade", subject: "Social Studies", question: "Traffic light 'Red' means?", options: ["Stop", "Go", "Fast", "Turn"], answer: "Stop", hint: "Danger." },
    { grade: "First Grade", subject: "Social Studies", question: "A neighborhood is?", options: ["Where people live", "A school", "A park", "A store"], answer: "Where people live", hint: "Houses." },

    // ==================== 2ND GRADE ====================
    // Existing
    { grade: "Second Grade", subject: "Math", question: "What is 100 - 10?", options: ["80", "90", "110", "95"], answer: "90", hint: "Count back by ten." },
    { grade: "Second Grade", subject: "Math", question: "How many cents are in a quarter?", options: ["10", "5", "25", "50"], answer: "25", hint: "Quarter dollar." },
    { grade: "Second Grade", subject: "Math", question: "What time is it when the big hand is on 12?", options: ["Half past", "O'clock", "Quarter past", "Midnight"], answer: "O'clock", hint: "Start of the hour." },
    { grade: "Second Grade", subject: "Math", question: "What is 20 + 30?", options: ["40", "50", "60", "2030"], answer: "50", hint: "2 tens + 3 tens." },
    { grade: "Second Grade", subject: "Math", question: "Which shape has 6 sides?", options: ["Pentagon", "Hexagon", "Octagon", "Square"], answer: "Hexagon", hint: "Hexa means 6." },
    { grade: "Second Grade", subject: "Language Arts", question: "What is the plural of 'Child'?", options: ["Childs", "Children", "Childrens", "Kids"], answer: "Children", hint: "Irregular plural." },
    { grade: "Second Grade", subject: "Language Arts", question: "Which word is a compound word?", options: ["Happy", "Sunflower", "Tree", "Fast"], answer: "Sunflower", hint: "Sun + Flower." },
    { grade: "Second Grade", subject: "Language Arts", question: "Identify the adjective: 'The red ball.'", options: ["The", "Red", "Ball", "Is"], answer: "Red", hint: "Describes the noun." },
    { grade: "Second Grade", subject: "Language Arts", question: "Past tense of 'Run'?", options: ["Runned", "Ran", "Running", "Runs"], answer: "Ran", hint: "Yesterday I..." },
    { grade: "Second Grade", subject: "Language Arts", question: "A synonym for 'Happy' is?", options: ["Sad", "Glad", "Mad", "Bad"], answer: "Glad", hint: "Means the same." },
    { grade: "Second Grade", subject: "Science", question: "What tool measures temperature?", options: ["Ruler", "Thermometer", "Scale", "Clock"], answer: "Thermometer", hint: "Thermo means heat." },
    { grade: "Second Grade", subject: "Science", question: "Water turning into ice is called?", options: ["Melting", "Freezing", "Boiling", "Gas"], answer: "Freezing", hint: "Getting very cold." },
    { grade: "Second Grade", subject: "Science", question: "Which animal is an amphibian?", options: ["Dog", "Frog", "Eagle", "Cat"], answer: "Frog", hint: "Land and water." },
    { grade: "Second Grade", subject: "Science", question: "What gives us light?", options: ["The Sun", "A Rock", "A Tree", "Water"], answer: "The Sun", hint: "Brightest star." },
    { grade: "Second Grade", subject: "Social Studies", question: "What shows us North, South, East, and West?", options: ["Compass", "Ruler", "Clock", "Scale"], answer: "Compass", hint: "Points North." },
    { grade: "Second Grade", subject: "Social Studies", question: "What represents a state on a map?", options: ["A Star", "A Dot", "A Line", "A Shape"], answer: "A Shape", hint: "Boundaries." },
    { grade: "Second Grade", subject: "Social Studies", question: "What is a suburban community?", options: ["City", "Farm", "Neighborhoods near a city", "Ocean"], answer: "Neighborhoods near a city", hint: "Houses with yards." },
    { grade: "Second Grade", subject: "Social Studies", question: "Who was a civil rights leader?", options: ["MLK Jr.", "Washington", "Columbus", "Einstein"], answer: "MLK Jr.", hint: "I have a dream." },
    // New
    { grade: "Second Grade", subject: "Math", question: "Value of 3 dimes?", options: ["30 cents", "15 cents", "3 cents", "75 cents"], answer: "30 cents", hint: "10+10+10." },
    { grade: "Second Grade", subject: "Math", question: "Even number?", options: ["1", "3", "4", "7"], answer: "4", hint: "Pairs." },
    { grade: "Second Grade", subject: "Math", question: "100 + 20 + 5?", options: ["125", "100205", "1205", "25"], answer: "125", hint: "Expanded form." },
    { grade: "Second Grade", subject: "Math", question: "Minutes in an hour?", options: ["100", "60", "30", "24"], answer: "60", hint: "Clock." },
    { grade: "Second Grade", subject: "Math", question: "Shape with 5 sides?", options: ["Pentagon", "Hexagon", "Square", "Triangle"], answer: "Pentagon", hint: "Penta=5." },
    { grade: "Second Grade", subject: "Language Arts", question: "Prefix 'Re-' means?", options: ["Again", "Not", "Before", "After"], answer: "Again", hint: "Redo." },
    { grade: "Second Grade", subject: "Language Arts", question: "Antonym for 'Fast'?", options: ["Quick", "Slow", "Run", "Speed"], answer: "Slow", hint: "Turtle." },
    { grade: "Second Grade", subject: "Language Arts", question: "Sentence type: 'Stop!'", options: ["Statement", "Question", "Exclamation", "Command"], answer: "Exclamation", hint: "Excitement." },
    { grade: "Second Grade", subject: "Language Arts", question: "Correct spelling?", options: ["Becuz", "Because", "Becuase", "Beclaws"], answer: "Because", hint: "Reason." },
    { grade: "Second Grade", subject: "Language Arts", question: "Noun type: 'New York'?", options: ["Common", "Proper", "Verb", "Pronoun"], answer: "Proper", hint: "Capital letters." },
    { grade: "Second Grade", subject: "Science", question: "State of matter: Steam?", options: ["Solid", "Liquid", "Gas", "Plasma"], answer: "Gas", hint: "Vapor." },
    { grade: "Second Grade", subject: "Science", question: "Seeds grow into?", options: ["Rocks", "Plants", "Animals", "Dirt"], answer: "Plants", hint: "Flowers." },
    { grade: "Second Grade", subject: "Science", question: "Moon shape change called?", options: ["Phases", "Faces", "Turns", "Steps"], answer: "Phases", hint: "Full, Half..." },
    { grade: "Second Grade", subject: "Science", question: "Earth spins on its?", options: ["Axis", "Top", "Side", "Wheels"], answer: "Axis", hint: "Invisible line." },
    { grade: "Second Grade", subject: "Science", question: "What magnet pulls?", options: ["Wood", "Paper", "Iron", "Plastic"], answer: "Iron", hint: "Metal." },
    { grade: "Second Grade", subject: "Social Studies", question: "Continent we live on?", options: ["Africa", "North America", "Asia", "Europe"], answer: "North America", hint: "USA is here." },
    { grade: "Second Grade", subject: "Social Studies", question: "Capital of USA?", options: ["New York", "Washington DC", "Texas", "California"], answer: "Washington DC", hint: "White House." },
    { grade: "Second Grade", subject: "Social Studies", question: "Goods are?", options: ["Things you buy", "Helping people", "Trash", "Air"], answer: "Things you buy", hint: "Toys, food." },
    { grade: "Second Grade", subject: "Social Studies", question: "Services are?", options: ["Things", "Jobs people do", "Food", "Toys"], answer: "Jobs people do", hint: "Haircut, doctor." },
    { grade: "Second Grade", subject: "Social Studies", question: "Statue of Liberty is in?", options: ["Paris", "New York", "London", "China"], answer: "New York", hint: "Harbor." },
    { grade: "Second Grade", subject: "Language Arts", question: "Plural of 'Mouse'?", options: ["Mice", "Mouses", "Mouse", "Meeses"], answer: "Mice", hint: "Irregular." },
    { grade: "Second Grade", subject: "Math", question: "Value of a quarter?", options: ["25 cents", "10 cents", "5 cents", "1 cent"], answer: "25 cents", hint: "Big coin." },
    { grade: "Second Grade", subject: "Science", question: "What do lungs do?", options: ["Breathe", "Pump blood", "Digest food", "Think"], answer: "Breathe", hint: "Air." },
    { grade: "Second Grade", subject: "Math", question: "1 hour = ? minutes", options: ["60", "30", "100", "10"], answer: "60", hint: "Clock." },
    { grade: "Second Grade", subject: "Math", question: "Identify cylinder", options: ["Soda Can", "Ball", "Box", "Cone"], answer: "Soda Can", hint: "Round tube." },
    { grade: "Second Grade", subject: "Language Arts", question: "Proper Noun?", options: ["Texas", "state", "city", "town"], answer: "Texas", hint: "Name of place." },
    { grade: "Second Grade", subject: "Language Arts", question: "Contraction for 'Do not'?", options: ["Don't", "Dont", "Do'nt", "Dnt"], answer: "Don't", hint: "Apostrophe." },
    { grade: "Second Grade", subject: "Science", question: "Predator eats?", options: ["Prey", "Plants", "Rocks", "Dirt"], answer: "Prey", hint: "Hunter." },
    { grade: "Second Grade", subject: "Science", question: "Wind is moving?", options: ["Air", "Water", "Dirt", "Fire"], answer: "Air", hint: "Breeze." },
    { grade: "Second Grade", subject: "Social Studies", question: "Vote means?", options: ["Choose", "Run", "Sleep", "Eat"], answer: "Choose", hint: "Election." },
    { grade: "Second Grade", subject: "Social Studies", question: "Taxes pay for?", options: ["Schools/Roads", "Candy", "Toys", "Movies"], answer: "Schools/Roads", hint: "Public things." },

    // ==================== 3RD GRADE ====================
    // Existing
    { grade: "Third Grade", subject: "Math", question: "What is 7 x 8?", options: ["54", "56", "64", "48"], answer: "56", hint: "5, 6, 7, 8... 56." },
    { grade: "Third Grade", subject: "Math", question: "Perimeter of a square with side 4?", options: ["8", "12", "16", "20"], answer: "16", hint: "Add all 4 sides." },
    { grade: "Third Grade", subject: "Math", question: "Which fraction is bigger: 1/2 or 1/4?", options: ["1/4", "1/2", "Equal", "Neither"], answer: "1/2", hint: "Half a pizza vs quarter pizza." },
    { grade: "Third Grade", subject: "Math", question: "Round 47 to the nearest 10.", options: ["40", "50", "45", "100"], answer: "50", hint: "7 is 5 or more." },
    { grade: "Third Grade", subject: "Math", question: "What is 24 divided by 6?", options: ["3", "4", "5", "6"], answer: "4", hint: "6 x ? = 24." },
    { grade: "Third Grade", subject: "Language Arts", question: "Which word is an adjective?", options: ["Run", "Beautiful", "Boy", "Quickly"], answer: "Beautiful", hint: "Describes a noun." },
    { grade: "Third Grade", subject: "Language Arts", question: "Choose the correct spelling.", options: ["Beleive", "Believe", "Beleiv", "Bileive"], answer: "Believe", hint: "I before E except after C." },
    { grade: "Third Grade", subject: "Language Arts", question: "What is a fable?", options: ["A true story", "Story with a lesson", "A poem", "News"], answer: "Story with a lesson", hint: "Tortoise and the Hare." },
    { grade: "Third Grade", subject: "Language Arts", question: "Antonym of 'Brave'?", options: ["Strong", "Cowardly", "Happy", "Bold"], answer: "Cowardly", hint: "Scared." },
    { grade: "Third Grade", subject: "Language Arts", question: "Which is a conjunction?", options: ["House", "Run", "And", "Blue"], answer: "And", hint: "Connects words." },
    { grade: "Third Grade", subject: "Science", question: "Center of our solar system?", options: ["Earth", "Mars", "The Sun", "The Moon"], answer: "The Sun", hint: "Planets orbit it." },
    { grade: "Third Grade", subject: "Science", question: "Animals that eat only plants are?", options: ["Carnivores", "Herbivores", "Omnivores", "Predators"], answer: "Herbivores", hint: "Herbs = plants." },
    { grade: "Third Grade", subject: "Science", question: "A magnet attracts?", options: ["Wood", "Iron", "Plastic", "Glass"], answer: "Iron", hint: "Metals." },
    { grade: "Third Grade", subject: "Science", question: "What is the hardest mineral?", options: ["Talc", "Diamond", "Quartz", "Gold"], answer: "Diamond", hint: "Used in rings." },
    { grade: "Third Grade", subject: "Social Studies", question: "What represents a country?", options: ["A Map", "A Flag", "A Tree", "A River"], answer: "A Flag", hint: "Colors and symbols." },
    { grade: "Third Grade", subject: "Social Studies", question: "Who is the leader of a city?", options: ["President", "Governor", "Mayor", "King"], answer: "Mayor", hint: "Local government." },
    { grade: "Third Grade", subject: "Social Studies", question: "Indigenous people of America?", options: ["Vikings", "Native Americans", "Romans", "Egyptians"], answer: "Native Americans", hint: "Here before Columbus." },
    { grade: "Third Grade", subject: "Social Studies", question: "What is a ballot?", options: ["A dance", "A vote paper", "A doll", "A map"], answer: "A vote paper", hint: "Used in elections." },
    // New
    { grade: "Third Grade", subject: "Math", question: "30 x 5 = ?", options: ["150", "35", "15", "305"], answer: "150", hint: "3x5 with a 0." },
    { grade: "Third Grade", subject: "Math", question: "Area of rectangle 3x5?", options: ["8", "15", "16", "35"], answer: "15", hint: "L x W." },
    { grade: "Third Grade", subject: "Math", question: "Top number of fraction?", options: ["Denominator", "Numerator", "Whole", "Half"], answer: "Numerator", hint: "North." },
    { grade: "Third Grade", subject: "Math", question: "How many cm in 1 meter?", options: ["10", "100", "1000", "50"], answer: "100", hint: "Cent = 100." },
    { grade: "Third Grade", subject: "Math", question: "Shape with 8 sides?", options: ["Hexagon", "Octagon", "Nonagon", "Square"], answer: "Octagon", hint: "Octopus." },
    { grade: "Third Grade", subject: "Language Arts", question: "Suffix '-ful' means?", options: ["Without", "Full of", "Before", "Action"], answer: "Full of", hint: "Joyful." },
    { grade: "Third Grade", subject: "Language Arts", question: "Book of word definitions?", options: ["Atlas", "Dictionary", "Thesaurus", "Diary"], answer: "Dictionary", hint: "Look it up." },
    { grade: "Third Grade", subject: "Language Arts", question: "Verb tense: 'Will play'?", options: ["Past", "Present", "Future", "None"], answer: "Future", hint: "Hasn't happened." },
    { grade: "Third Grade", subject: "Language Arts", question: "Genre: Fairy Tale?", options: ["Fiction", "Non-Fiction", "Science", "History"], answer: "Fiction", hint: "Magic." },
    { grade: "Third Grade", subject: "Language Arts", question: "Main character is?", options: ["Hero", "Villain", "Setting", "Plot"], answer: "Hero", hint: "Good guy." },
    { grade: "Third Grade", subject: "Science", question: "Earth takes 365 days to?", options: ["Rotate", "Orbit Sun", "Melt", "Spin"], answer: "Orbit Sun", hint: "1 year." },
    { grade: "Third Grade", subject: "Science", question: "Skeleton is made of?", options: ["Muscles", "Bones", "Skin", "Blood"], answer: "Bones", hint: "Hard frame." },
    { grade: "Third Grade", subject: "Science", question: "Force that stops motion?", options: ["Gravity", "Friction", "Speed", "Push"], answer: "Friction", hint: "Rubbing." },
    { grade: "Third Grade", subject: "Science", question: "Simple machine: Ramp?", options: ["Lever", "Inclined Plane", "Pulley", "Screw"], answer: "Inclined Plane", hint: "Slanted." },
    { grade: "Third Grade", subject: "Science", question: "Food chain starts with?", options: ["Sun/Plants", "Animals", "Humans", "Water"], answer: "Sun/Plants", hint: "Producer." },
    { grade: "Third Grade", subject: "Social Studies", question: "Government 'For the People'?", options: ["Monarchy", "Democracy", "Empire", "Kingdom"], answer: "Democracy", hint: "Voting." },
    { grade: "Third Grade", subject: "Social Studies", question: "3 Branches of Govt?", options: ["1", "2", "3", "4"], answer: "3", hint: "Leg, Exec, Jud." },
    { grade: "Third Grade", subject: "Social Studies", question: "Cardinal directions?", options: ["Up Down", "NSEW", "Left Right", "AB"], answer: "NSEW", hint: "Compass." },
    { grade: "Third Grade", subject: "Social Studies", question: "Money paid to government?", options: ["Taxes", "Tips", "Gifts", "Salary"], answer: "Taxes", hint: "Required." },
    { grade: "Third Grade", subject: "Social Studies", question: "Document with laws?", options: ["Constitution", "Letter", "Book", "Map"], answer: "Constitution", hint: "We the People." },
    { grade: "Third Grade", subject: "Math", question: "8 x 8 = ?", options: ["64", "56", "72", "60"], answer: "64", hint: "Square." },
    { grade: "Third Grade", subject: "Social Studies", question: "Who discovered America (traditionally)?", options: ["Columbus", "Washington", "Lincoln", "King"], answer: "Columbus", hint: "1492." },
    { grade: "Third Grade", subject: "Science", question: "Solid to Liquid is?", options: ["Melting", "Freezing", "Boiling", "Gas"], answer: "Melting", hint: "Ice to Water." },
    { grade: "Third Grade", subject: "Math", question: "9 x 3 = ?", options: ["27", "12", "18", "30"], answer: "27", hint: "Triple 9." },
    { grade: "Third Grade", subject: "Math", question: "Odd number?", options: ["9", "4", "2", "8"], answer: "9", hint: "Not divisible by 2." },
    { grade: "Third Grade", subject: "Language Arts", question: "Prefix 'Un-'?", options: ["Not", "Again", "Before", "After"], answer: "Not", hint: "Undo." },
    { grade: "Third Grade", subject: "Language Arts", question: "Root word of 'Walking'?", options: ["Walk", "King", "All", "Wall"], answer: "Walk", hint: "Action." },
    { grade: "Third Grade", subject: "Science", question: "Main source of energy?", options: ["Sun", "Moon", "Earth", "Mars"], answer: "Sun", hint: "Light." },
    { grade: "Third Grade", subject: "Science", question: "Habitat for fish?", options: ["Aquatic", "Desert", "Forest", "Tundra"], answer: "Aquatic", hint: "Water." },
    { grade: "Third Grade", subject: "Social Studies", question: "Liberty Bell location?", options: ["Philadelphia", "New York", "Boston", "DC"], answer: "Philadelphia", hint: "Crack." },
    { grade: "Third Grade", subject: "Social Studies", question: "Martin Luther King Jr?", options: ["Civil Rights", "President", "King", "Doctor"], answer: "Civil Rights", hint: "Equality." },

    // ==================== 4TH GRADE ====================
    // Existing
    { grade: "Fourth Grade", subject: "Math", question: "What is 1/2 + 1/4?", options: ["3/4", "2/6", "1/8", "2/4"], answer: "3/4", hint: "Convert 1/2 to 2/4." },
    { grade: "Fourth Grade", subject: "Math", question: "What angle is 90 degrees?", options: ["Acute", "Obtuse", "Right", "Straight"], answer: "Right", hint: "Like a square corner." },
    { grade: "Fourth Grade", subject: "Math", question: "What is 45 divided by 9?", options: ["4", "5", "6", "9"], answer: "5", hint: "Times table of 9." },
    { grade: "Fourth Grade", subject: "Math", question: "Value of the digit 5 in 5,432?", options: ["5", "50", "500", "5000"], answer: "5000", hint: "Thousands place." },
    { grade: "Fourth Grade", subject: "Math", question: "Factors of 10?", options: ["1, 2, 5, 10", "1, 10", "2, 5", "1, 2, 3, 10"], answer: "1, 2, 5, 10", hint: "Numbers that divide evenly." },
    { grade: "Fourth Grade", subject: "Language Arts", question: "Correct homophone: 'I ___ the ball.'", options: ["Threw", "Through", "True", "Thorough"], answer: "Threw", hint: "Past tense of throw." },
    { grade: "Fourth Grade", subject: "Language Arts", question: "What is a narrative?", options: ["A fact sheet", "A story", "A poem", "A list"], answer: "A story", hint: "It has a plot." },
    { grade: "Fourth Grade", subject: "Language Arts", question: "Identify the prefix in 'Unlucky'.", options: ["Un", "Luck", "Y", "Ly"], answer: "Un", hint: "At the start." },
    { grade: "Fourth Grade", subject: "Language Arts", question: "Which is a complete sentence?", options: ["The dog.", "Ran fast.", "The dog ran.", "Blue sky."], answer: "The dog ran.", hint: "Subject and predicate." },
    { grade: "Fourth Grade", subject: "Language Arts", question: "Meaning of 'Break a leg'?", options: ["Get hurt", "Good luck", "Fall down", "Dance"], answer: "Good luck", hint: "Idiom." },
    { grade: "Fourth Grade", subject: "Science", question: "State of matter of ice?", options: ["Liquid", "Gas", "Solid", "Plasma"], answer: "Solid", hint: "Hard and cold." },
    { grade: "Fourth Grade", subject: "Science", question: "What conducts electricity?", options: ["Rubber", "Plastic", "Copper", "Wood"], answer: "Copper", hint: "Metal wires." },
    { grade: "Fourth Grade", subject: "Science", question: "Force that pulls to Earth?", options: ["Magnetism", "Gravity", "Friction", "Push"], answer: "Gravity", hint: "Falling down." },
    { grade: "Fourth Grade", subject: "Science", question: "Animal with no backbone?", options: ["Vertebrate", "Invertebrate", "Mammal", "Bird"], answer: "Invertebrate", hint: "Worms, insects." },
    { grade: "Fourth Grade", subject: "Social Studies", question: "Branch that makes laws?", options: ["Executive", "Judicial", "Legislative", "Police"], answer: "Legislative", hint: "Congress." },
    { grade: "Fourth Grade", subject: "Social Studies", question: "What is an import?", options: ["Goods sent out", "Goods brought in", "A tax", "A law"], answer: "Goods brought in", hint: "In-port." },
    { grade: "Fourth Grade", subject: "Social Studies", question: "Famous canal in New York?", options: ["Panama", "Erie", "Suez", "Grand"], answer: "Erie", hint: "Built in 1800s." },
    { grade: "Fourth Grade", subject: "Social Studies", question: "Who signs bills into law?", options: ["Mayor", "President", "Judge", "General"], answer: "President", hint: "Executive branch." },
    // New
    { grade: "Fourth Grade", subject: "Math", question: "Equivalent to 1/2?", options: ["2/4", "1/3", "2/5", "3/8"], answer: "2/4", hint: "Same value." },
    { grade: "Fourth Grade", subject: "Math", question: "Lines that never cross?", options: ["Parallel", "Perpendicular", "Intersecting", "Bent"], answer: "Parallel", hint: "Train tracks." },
    { grade: "Fourth Grade", subject: "Math", question: "Product of 12 x 10?", options: ["120", "22", "1200", "1210"], answer: "120", hint: "Add a zero." },
    { grade: "Fourth Grade", subject: "Math", question: "Angle less than 90?", options: ["Obtuse", "Acute", "Right", "Straight"], answer: "Acute", hint: "Cute small." },
    { grade: "Fourth Grade", subject: "Math", question: "Decimal for 1/10?", options: ["0.1", "0.01", "1.0", "10"], answer: "0.1", hint: "Tenths place." },
    { grade: "Fourth Grade", subject: "Language Arts", question: "Pov: 'He walked away'?", options: ["1st Person", "3rd Person", "2nd Person", "None"], answer: "3rd Person", hint: "He/She." },
    { grade: "Fourth Grade", subject: "Language Arts", question: "Simile uses?", options: ["Like/As", "Is/Are", "Was/Were", "To/From"], answer: "Like/As", hint: "Comparison." },
    { grade: "Fourth Grade", subject: "Language Arts", question: "Theme is?", options: ["Message", "Topic", "Character", "Setting"], answer: "Message", hint: "Lesson learned." },
    { grade: "Fourth Grade", subject: "Language Arts", question: "There, Their, They're: ___ going home.", options: ["There", "Their", "They're", "Ther"], answer: "They're", hint: "They are." },
    { grade: "Fourth Grade", subject: "Language Arts", question: "Antonym for 'Create'?", options: ["Make", "Destroy", "Build", "Draw"], answer: "Destroy", hint: "Break." },
    { grade: "Fourth Grade", subject: "Science", question: "Energy of motion?", options: ["Potential", "Kinetic", "Chemical", "Thermal"], answer: "Kinetic", hint: "Moving." },
    { grade: "Fourth Grade", subject: "Science", question: "Rock made from heat?", options: ["Igneous", "Sedimentary", "Metamorphic", "Sand"], answer: "Igneous", hint: "Volcano." },
    { grade: "Fourth Grade", subject: "Science", question: "Water boiling point (C)?", options: ["100", "0", "32", "50"], answer: "100", hint: "Hot." },
    { grade: "Fourth Grade", subject: "Science", question: "Opaque means?", options: ["See through", "No light passes", "Blurry", "Clear"], answer: "No light passes", hint: "Wall." },
    { grade: "Fourth Grade", subject: "Science", question: "Conductor of heat?", options: ["Metal", "Wood", "Plastic", "Wool"], answer: "Metal", hint: "Pan." },
    { grade: "Fourth Grade", subject: "Social Studies", question: "Westward Expansion?", options: ["Moving West", "Moving East", "Staying put", "Flying North"], answer: "Moving West", hint: "Pioneers." },
    { grade: "Fourth Grade", subject: "Social Studies", question: "Gold Rush state?", options: ["Texas", "California", "Florida", "Maine"], answer: "California", hint: "1849." },
    { grade: "Fourth Grade", subject: "Social Studies", question: "National Anthem?", options: ["Star Spangled Banner", "America Beautiful", "Yankee Doodle", "Pop Song"], answer: "Star Spangled Banner", hint: "Oh say can you see." },
    { grade: "Fourth Grade", subject: "Social Studies", question: "Capital of state?", options: ["Main city of state", "Washington DC", "Biggest city", "Oldest city"], answer: "Main city of state", hint: "Govt seat." },
    { grade: "Fourth Grade", subject: "Social Studies", question: "Immigrant is?", options: ["Person moving to new country", "Tourist", "Soldier", "King"], answer: "Person moving to new country", hint: "Ellis Island." },
    { grade: "Fourth Grade", subject: "Language Arts", question: "What is a stanza?", options: ["Part of a poem", "A sentence", "A book", "A word"], answer: "Part of a poem", hint: "Group of lines." },
    { grade: "Fourth Grade", subject: "Math", question: "Perimeter of square with side 5?", options: ["20", "25", "10", "15"], answer: "20", hint: "4 sides." },
    { grade: "Fourth Grade", subject: "Science", question: "Planet closest to Sun?", options: ["Mercury", "Venus", "Earth", "Mars"], answer: "Mercury", hint: "Hot." },
    { grade: "Fourth Grade", subject: "Math", question: "Area of square (side 4)?", options: ["16", "8", "12", "20"], answer: "16", hint: "4x4." },
    { grade: "Fourth Grade", subject: "Math", question: "Degrees in circle?", options: ["360", "180", "90", "100"], answer: "360", hint: "Full turn." },
    { grade: "Fourth Grade", subject: "Language Arts", question: "Suffix '-less'?", options: ["Without", "Full", "More", "Not"], answer: "Without", hint: "Homeless." },
    { grade: "Fourth Grade", subject: "Language Arts", question: "Synonym for 'Big'?", options: ["Large", "Small", "Tiny", "Short"], answer: "Large", hint: "Huge." },
    { grade: "Fourth Grade", subject: "Science", question: "Precipitation types?", options: ["Rain/Snow", "Wind", "Cloud", "Sun"], answer: "Rain/Snow", hint: "Falls from sky." },
    { grade: "Fourth Grade", subject: "Science", question: "Friction creates?", options: ["Heat", "Cold", "Wind", "Water"], answer: "Heat", hint: "Rub hands." },
    { grade: "Fourth Grade", subject: "Social Studies", question: "Number of continents?", options: ["7", "5", "10", "4"], answer: "7", hint: "Big land masses." },
    { grade: "Fourth Grade", subject: "Social Studies", question: "Ocean on West Coast US?", options: ["Pacific", "Atlantic", "Indian", "Arctic"], answer: "Pacific", hint: "California." },

    // ==================== 5TH GRADE ====================
    // Existing
    { grade: "Fifth Grade", subject: "Math", question: "Volume of cube with side 3cm?", options: ["27 cm³", "9 cm³", "18 cm³", "81 cm³"], answer: "27 cm³", hint: "3 x 3 x 3." },
    { grade: "Fifth Grade", subject: "Math", question: "Order of Ops: 2 + 3 x 4 = ?", options: ["14", "20", "24", "10"], answer: "14", hint: "Multiply first." },
    { grade: "Fifth Grade", subject: "Math", question: "0.5 as a fraction?", options: ["1/5", "1/2", "5/100", "2/1"], answer: "1/2", hint: "Half." },
    { grade: "Fifth Grade", subject: "Math", question: "Sum of angles in a triangle?", options: ["90", "180", "360", "100"], answer: "180", hint: "Straight line." },
    { grade: "Fifth Grade", subject: "Math", question: "LCM of 3 and 4?", options: ["7", "12", "24", "1"], answer: "12", hint: "Multiples of 4: 4, 8, 12..." },
    { grade: "Fifth Grade", subject: "Language Arts", question: "Main idea of a story?", options: ["Theme", "Plot", "Setting", "Character"], answer: "Theme", hint: "The message." },
    { grade: "Fifth Grade", subject: "Language Arts", question: "What is a simile?", options: ["Comparison using like/as", "Exaggeration", "Sound words", "Comparison without like/as"], answer: "Comparison using like/as", hint: "As brave as a lion." },
    { grade: "Fifth Grade", subject: "Language Arts", question: "Correct pronoun: '___ went to the store.'", options: ["Me", "I", "Him", "Her"], answer: "I", hint: "Subject." },
    { grade: "Fifth Grade", subject: "Language Arts", question: "What is a stanza?", options: ["Paragraph in poem", "Sentence", "Chapter", "Title"], answer: "Paragraph in poem", hint: "Poetry group." },
    { grade: "Fifth Grade", subject: "Language Arts", question: "Who is the narrator?", options: ["Author", "Person telling story", "Main character", "Publisher"], answer: "Person telling story", hint: "Voice." },
    { grade: "Fifth Grade", subject: "Science", question: "Photosynthesis needs sunlight, water, and ___?", options: ["Carbon Dioxide", "Oxygen", "Sugar", "Nitrogen"], answer: "Carbon Dioxide", hint: "Plants breathe it in." },
    { grade: "Fifth Grade", subject: "Science", question: "What causes tides?", options: ["Wind", "Sun", "Moon's Gravity", "Earth's Spin"], answer: "Moon's Gravity", hint: "Pull of the moon." },
    { grade: "Fifth Grade", subject: "Science", question: " Mixture of salt and water is a?", options: ["Solution", "Solid", "Gas", "Compound"], answer: "Solution", hint: "Dissolved." },
    { grade: "Fifth Grade", subject: "Science", question: "Planet known as the Red Planet?", options: ["Venus", "Mars", "Jupiter", "Saturn"], answer: "Mars", hint: "4th planet." },
    { grade: "Fifth Grade", subject: "Social Studies", question: "First President of USA?", options: ["Washington", "Lincoln", "Jefferson", "Adams"], answer: "Washington", hint: "On the dollar bill." },
    { grade: "Fifth Grade", subject: "Social Studies", question: "The Bill of Rights is?", options: ["First 5 Amendments", "First 10 Amendments", "The Preamble", "The Declaration"], answer: "First 10 Amendments", hint: "Rights of citizens." },
    { grade: "Fifth Grade", subject: "Social Studies", question: "War between North and South US?", options: ["Civil War", "Revolutionary War", "WWI", "Cold War"], answer: "Civil War", hint: "1861-1865." },
    { grade: "Fifth Grade", subject: "Social Studies", question: "Capital of the USA?", options: ["New York", "Washington D.C.", "Philadelphia", "Boston"], answer: "Washington D.C.", hint: "District of Columbia." },
    // New
    { grade: "Fifth Grade", subject: "Math", question: "Formula for area of rectangle?", options: ["LxW", "L+W", "LxWxH", "S+S"], answer: "LxW", hint: "Flat space." },
    { grade: "Fifth Grade", subject: "Math", question: "Mixed number: 1.5?", options: ["1 1/2", "3/4", "1/5", "2/1"], answer: "1 1/2", hint: "Whole + half." },
    { grade: "Fifth Grade", subject: "Math", question: "X-axis is?", options: ["Horizontal", "Vertical", "Diagonal", "Round"], answer: "Horizontal", hint: "Left-Right." },
    { grade: "Fifth Grade", subject: "Math", question: "Prime number?", options: ["4", "7", "9", "10"], answer: "7", hint: "Only 1 and itself." },
    { grade: "Fifth Grade", subject: "Math", question: "Decimal 0.25 as fraction?", options: ["1/4", "1/2", "3/4", "1/5"], answer: "1/4", hint: "Quarter." },
    { grade: "Fifth Grade", subject: "Language Arts", question: "Metaphor is?", options: ["Direct comparison", "Like/As", "Sound", "Human traits"], answer: "Direct comparison", hint: "He is a rock." },
    { grade: "Fifth Grade", subject: "Language Arts", question: "Conflict is?", options: ["Problem", "Solution", "Setting", "Character"], answer: "Problem", hint: "Struggle." },
    { grade: "Fifth Grade", subject: "Language Arts", question: "Biography is?", options: ["Life story by another", "Life story by self", "Fake story", "Poem"], answer: "Life story by another", hint: "Bio." },
    { grade: "Fifth Grade", subject: "Language Arts", question: "Hyperbole is?", options: ["Exaggeration", "Truth", "Question", "Rhyme"], answer: "Exaggeration", hint: "Million times." },
    { grade: "Fifth Grade", subject: "Language Arts", question: "Prefix 'Pre-'?", options: ["Before", "After", "Not", "Again"], answer: "Before", hint: "Preview." },
    { grade: "Fifth Grade", subject: "Science", question: "Earth's atmosphere layer?", options: ["Troposphere", "Core", "Crust", "Magma"], answer: "Troposphere", hint: "Air we breathe." },
    { grade: "Fifth Grade", subject: "Science", question: "Chemical change?", options: ["Rusting", "Melting", "Cutting", "Freezing"], answer: "Rusting", hint: "New substance." },
    { grade: "Fifth Grade", subject: "Science", question: "Consumer eats?", options: ["Plants/Animals", "Sun", "Soil", "Air"], answer: "Plants/Animals", hint: "Not producer." },
    { grade: "Fifth Grade", subject: "Science", question: "Water cycle: Rain?", options: ["Precipitation", "Evaporation", "Condensation", "Runoff"], answer: "Precipitation", hint: "Falls down." },
    { grade: "Fifth Grade", subject: "Science", question: "Force of attraction?", options: ["Gravity", "Friction", "Push", "Speed"], answer: "Gravity", hint: "Pull." },
    { grade: "Fifth Grade", subject: "Social Studies", question: "13 Colonies owned by?", options: ["Britain", "France", "Spain", "Russia"], answer: "Britain", hint: "King George." },
    { grade: "Fifth Grade", subject: "Social Studies", question: "Declaration of Independence year?", options: ["1776", "1492", "1999", "1812"], answer: "1776", hint: "July 4." },
    { grade: "Fifth Grade", subject: "Social Studies", question: "Constitution replaced?", options: ["Articles of Confederation", "Bill of Rights", "Magna Carta", "Bible"], answer: "Articles of Confederation", hint: "First attempt." },
    { grade: "Fifth Grade", subject: "Social Studies", question: "Lewis and Clark explored?", options: ["West (Louisiana Purchase)", "North Pole", "South America", "Moon"], answer: "West (Louisiana Purchase)", hint: "Sacagawea." },
    { grade: "Fifth Grade", subject: "Social Studies", question: "Amendment banning slavery?", options: ["13th", "1st", "2nd", "10th"], answer: "13th", hint: "Civil War end." },
    { grade: "Fifth Grade", subject: "Math", question: "1/2 + 1/2 = ?", options: ["1", "1/4", "2", "0"], answer: "1", hint: "Whole." },
    { grade: "Fifth Grade", subject: "Social Studies", question: "First War of US?", options: ["Revolutionary War", "Civil War", "WWI", "WWII"], answer: "Revolutionary War", hint: "Against Britain." },
    { grade: "Fifth Grade", subject: "Science", question: "H2O is?", options: ["Water", "Air", "Salt", "Gold"], answer: "Water", hint: "Drink." },
    { grade: "Fifth Grade", subject: "Math", question: "Diameter is?", options: ["2 x Radius", "Radius", "Half Radius", "Circle"], answer: "2 x Radius", hint: "Across center." },
    { grade: "Fifth Grade", subject: "Math", question: "Coordinate Plane inputs?", options: ["(x,y)", "(y,x)", "x", "y"], answer: "(x,y)", hint: "Ordered pair." },
    { grade: "Fifth Grade", subject: "Language Arts", question: "Idiom example?", options: ["It's raining cats and dogs", "The sky is blue", "I am happy", "Dogs bark"], answer: "It's raining cats and dogs", hint: "Not literal." },
    { grade: "Fifth Grade", subject: "Language Arts", question: "First Person pronoun?", options: ["We", "They", "He", "She"], answer: "We", hint: "Us." },
    { grade: "Fifth Grade", subject: "Science", question: "Conducts Heat well?", options: ["Metal", "Foam", "Wood", "Plastic"], answer: "Metal", hint: "Pan." },
    { grade: "Fifth Grade", subject: "Science", question: "Solar System center?", options: ["Sun", "Earth", "Moon", "Mars"], answer: "Sun", hint: "Star." },
    { grade: "Fifth Grade", subject: "Social Studies", question: "Boston Tea Party?", options: ["Protest", "Party", "Dance", "Dinner"], answer: "Protest", hint: "Taxation without representation." },
    { grade: "Fifth Grade", subject: "Social Studies", question: "Checks and Balances?", options: ["Limits Govt Power", "Money", "Banking", "War"], answer: "Limits Govt Power", hint: "3 Branches." },

    // ==================== 6TH GRADE ====================
    // Existing
    { grade: "Sixth Grade", subject: "Math", question: "If the ratio of boys to girls is 2:3 and there are 12 girls, how many boys?", options: ["6", "8", "9", "10"], answer: "8", hint: "2/3 = x/12." },
    { grade: "Sixth Grade", subject: "Math", question: "What is the mean of 2, 4, and 9?", options: ["5", "4", "6", "15"], answer: "5", hint: "Sum divided by count." },
    { grade: "Sixth Grade", subject: "Math", question: "Solve for x: 3x = 15", options: ["3", "5", "12", "45"], answer: "5", hint: "Divide by 3." },
    { grade: "Sixth Grade", subject: "Math", question: "Absolute value of -7?", options: ["-7", "7", "0", "14"], answer: "7", hint: "Distance from zero." },
    { grade: "Sixth Grade", subject: "Math", question: "Area of a triangle with base 10, height 5?", options: ["25", "50", "15", "100"], answer: "25", hint: "1/2 * base * height." },
    { grade: "Sixth Grade", subject: "Math", question: "3 squared is?", options: ["6", "9", "33", "27"], answer: "9", hint: "3 x 3." },
    { grade: "Sixth Grade", subject: "Language Arts", question: "Which point of view uses 'I' and 'Me'?", options: ["First Person", "Second Person", "Third Person", "Omniscient"], answer: "First Person", hint: "The narrator is speaking." },
    { grade: "Sixth Grade", subject: "Language Arts", question: "What is the climax of a story?", options: ["The beginning", "The turning point", "The end", "The setting"], answer: "The turning point", hint: "Highest tension." },
    { grade: "Sixth Grade", subject: "Language Arts", question: "Personification means?", options: ["Acting like a person", "Giving human traits to non-humans", "Writing a biography", "Using loud words"], answer: "Giving human traits to non-humans", hint: "The wind howled." },
    { grade: "Sixth Grade", subject: "Language Arts", question: "Prefix 'Re-' means?", options: ["Again", "Before", "Not", "After"], answer: "Again", hint: "Redo." },
    { grade: "Sixth Grade", subject: "Language Arts", question: "Theme is?", options: ["Plot", "Lesson/Message", "Characters", "Setting"], answer: "Lesson/Message", hint: "Moral." },
    { grade: "Sixth Grade", subject: "Science", question: "What is the basic unit of life?", options: ["Atom", "Cell", "Tissue", "Organ"], answer: "Cell", hint: "Microscopic building block." },
    { grade: "Sixth Grade", subject: "Science", question: "Which layer of Earth is liquid metal?", options: ["Crust", "Mantle", "Outer Core", "Inner Core"], answer: "Outer Core", hint: "Generates magnetic field." },
    { grade: "Sixth Grade", subject: "Science", question: "Decomposers eat?", options: ["Plants", "Meat", "Dead matter", "Sunlight"], answer: "Dead matter", hint: "Fungi and bacteria." },
    { grade: "Sixth Grade", subject: "Science", question: "Water cycle stage: Gas to Liquid?", options: ["Evaporation", "Condensation", "Precipitation", "Runoff"], answer: "Condensation", hint: "Clouds forming." },
    { grade: "Sixth Grade", subject: "Science", question: "Force that resists motion?", options: ["Gravity", "Friction", "Magnetism", "Inertia"], answer: "Friction", hint: "Rubbing hands." },
    { grade: "Sixth Grade", subject: "Social Studies", question: "Which civilization built the pyramids?", options: ["Romans", "Greeks", "Egyptians", "Mayans"], answer: "Egyptians", hint: "Nile River valley." },
    { grade: "Sixth Grade", subject: "Social Studies", question: "What is a democracy?", options: ["Rule by one", "Rule by the people", "Rule by army", "Rule by rich"], answer: "Rule by the people", hint: "Demos means people." },
    { grade: "Sixth Grade", subject: "Social Studies", question: "Ancient Greek city-state?", options: ["Rome", "Athens", "Cairo", "Babylon"], answer: "Athens", hint: "Start of democracy." },
    { grade: "Sixth Grade", subject: "Social Studies", question: "River in Egypt?", options: ["Amazon", "Nile", "Mississippi", "Thames"], answer: "Nile", hint: "Longest in world." },
    { grade: "Sixth Grade", subject: "Social Studies", question: "Cradle of Civilization?", options: ["Mesopotamia", "Europe", "America", "Australia"], answer: "Mesopotamia", hint: "Between rivers." },
    // New
    { grade: "Sixth Grade", subject: "Math", question: "Range of 2, 5, 8?", options: ["6", "3", "5", "8"], answer: "6", hint: "High - Low." },
    { grade: "Sixth Grade", subject: "Math", question: "Median of 1, 3, 5?", options: ["3", "1", "5", "9"], answer: "3", hint: "Middle." },
    { grade: "Sixth Grade", subject: "Math", question: "Coefficient in 4x?", options: ["4", "x", "0", "1"], answer: "4", hint: "Number part." },
    { grade: "Sixth Grade", subject: "Math", question: "Perimeter of rectangle 4x5?", options: ["18", "20", "9", "10"], answer: "18", hint: "2L + 2W." },
    { grade: "Sixth Grade", subject: "Math", question: "Unit Rate: 100 miles / 2 hours?", options: ["50 mph", "200 mph", "10 mph", "100 mph"], answer: "50 mph", hint: "Divide." },
    { grade: "Sixth Grade", subject: "Language Arts", question: "Alliteration is?", options: ["Same start sound", "Rhyme", "Comparison", "Exaggeration"], answer: "Same start sound", hint: "Sally sells seashells." },
    { grade: "Sixth Grade", subject: "Language Arts", question: "Argumentative text purpose?", options: ["Persuade", "Entertain", "Inform", "Describe"], answer: "Persuade", hint: "Convince." },
    { grade: "Sixth Grade", subject: "Language Arts", question: "Protagonist is?", options: ["Main character", "Villain", "Setting", "Author"], answer: "Main character", hint: "Hero." },
    { grade: "Sixth Grade", subject: "Language Arts", question: "Antagonist is?", options: ["Villain/Opponent", "Hero", "Setting", "Theme"], answer: "Villain/Opponent", hint: "Bad guy." },
    { grade: "Sixth Grade", subject: "Language Arts", question: "Fact vs Opinion: 'Blue is best'?", options: ["Opinion", "Fact", "Rule", "Law"], answer: "Opinion", hint: "Preference." },
    { grade: "Sixth Grade", subject: "Science", question: "Plant cell outer layer?", options: ["Cell Wall", "Membrane", "Nucleus", "Cytoplasm"], answer: "Cell Wall", hint: "Rigid." },
    { grade: "Sixth Grade", subject: "Science", question: "Kinetic Energy is?", options: ["Movement", "Stored", "Heat", "Light"], answer: "Movement", hint: "Motion." },
    { grade: "Sixth Grade", subject: "Science", question: "Potential Energy is?", options: ["Stored", "Movement", "Sound", "Heat"], answer: "Stored", hint: "High up." },
    { grade: "Sixth Grade", subject: "Science", question: "Rock Cycle: Magma cools?", options: ["Igneous", "Sedimentary", "Metamorphic", "Dirt"], answer: "Igneous", hint: "Fire rock." },
    { grade: "Sixth Grade", subject: "Science", question: "Producer makes?", options: ["Food/Energy", "Heat", "Water", "Soil"], answer: "Food/Energy", hint: "Plants." },
    { grade: "Sixth Grade", subject: "Social Studies", question: "Hammurabi's Code?", options: ["Laws", "Map", "Food", "Religion"], answer: "Laws", hint: "Eye for an eye." },
    { grade: "Sixth Grade", subject: "Social Studies", question: "Hieroglyphics used by?", options: ["Egyptians", "Greeks", "Romans", "Mayans"], answer: "Egyptians", hint: "Pictures." },
    { grade: "Sixth Grade", subject: "Social Studies", question: "Confucius was from?", options: ["China", "India", "Greece", "Rome"], answer: "China", hint: "Philosopher." },
    { grade: "Sixth Grade", subject: "Social Studies", question: "Alexander the Great?", options: ["Greek Conqueror", "Roman Emperor", "Egyptian King", "US President"], answer: "Greek Conqueror", hint: "Empire." },
    { grade: "Sixth Grade", subject: "Social Studies", question: "Julius Caesar ruled?", options: ["Rome", "Greece", "Egypt", "China"], answer: "Rome", hint: "Et tu, Brute?" },
    { grade: "Sixth Grade", subject: "Math", question: "Solve 2x = 10", options: ["5", "20", "8", "6"], answer: "5", hint: "Divide." },
    { grade: "Sixth Grade", subject: "Language Arts", question: "Simile uses?", options: ["Like or As", "Is or Are", "Was", "None"], answer: "Like or As", hint: "Comparison." },
    { grade: "Sixth Grade", subject: "Science", question: "Center of atom?", options: ["Nucleus", "Electron", "Shell", "Orbit"], answer: "Nucleus", hint: "Protons here." },
    { grade: "Sixth Grade", subject: "Math", question: "GFC of 12 and 18?", options: ["6", "3", "2", "9"], answer: "6", hint: "Highest divider." },
    { grade: "Sixth Grade", subject: "Math", question: "Volume of rect prism?", options: ["L x W x H", "L x W", "L + W", "Base x Height"], answer: "L x W x H", hint: "3D space." },
    { grade: "Sixth Grade", subject: "Language Arts", question: "Tone is?", options: ["Author's attitude", "Reader's feeling", "Volume", "Sound"], answer: "Author's attitude", hint: "Writer's mood." },
    { grade: "Sixth Grade", subject: "Language Arts", question: "Dialogue uses?", options: ["Quotation marks", "Commas", "Periods", "Slashes"], answer: "Quotation marks", hint: "Talking." },
    { grade: "Sixth Grade", subject: "Science", question: "Abiotic factor?", options: ["Water", "Plant", "Animal", "Bacteria"], answer: "Water", hint: "Non-living." },
    { grade: "Sixth Grade", subject: "Science", question: "Herbivore eats?", options: ["Plants", "Meat", "Both", "Dirt"], answer: "Plants", hint: "Vegetarian." },
    { grade: "Sixth Grade", subject: "Social Studies", question: "Democracy means?", options: ["People rule", "King rules", "Army rules", "None"], answer: "People rule", hint: "Vote." },
    { grade: "Sixth Grade", subject: "Social Studies", question: "Great Wall of China built for?", options: ["Protection", "Decoration", "Housing", "Road"], answer: "Protection", hint: "Keep out invaders." },

    // ==================== 7TH GRADE ====================
    // Existing
    { grade: "Seventh Grade", subject: "Math", question: "What is -5 + 8?", options: ["3", "-3", "13", "-13"], answer: "3", hint: "Start at -5, go up 8." },
    { grade: "Seventh Grade", subject: "Math", question: "Area of a circle with radius 3? (π≈3.14)", options: ["9.42", "28.26", "18.84", "6"], answer: "28.26", hint: "πr²." },
    { grade: "Seventh Grade", subject: "Math", question: "Probability of flipping heads?", options: ["25%", "50%", "75%", "100%"], answer: "50%", hint: "1 out of 2." },
    { grade: "Seventh Grade", subject: "Math", question: "Simplify: 2(x + 3)", options: ["2x + 3", "2x + 6", "x + 6", "5x"], answer: "2x + 6", hint: "Distribute the 2." },
    { grade: "Seventh Grade", subject: "Math", question: "Solve: 2x + 1 = 9", options: ["2", "3", "4", "5"], answer: "4", hint: "Subtract 1, divide by 2." },
    { grade: "Seventh Grade", subject: "Math", question: "Complement of 40 degree angle?", options: ["40", "50", "140", "90"], answer: "50", hint: "Adds to 90." },
    { grade: "Seventh Grade", subject: "Language Arts", question: "What is a stanza?", options: ["A paragraph in a poem", "A type of rhyme", "A character", "A play"], answer: "A paragraph in a poem", hint: "Grouping of lines." },
    { grade: "Seventh Grade", subject: "Language Arts", question: "Identify the preposition: 'The cat is under the table.'", options: ["Cat", "Is", "Under", "Table"], answer: "Under", hint: "Shows relationship/position." },
    { grade: "Seventh Grade", subject: "Language Arts", question: "What is the conflict in a story?", options: ["The ending", "The problem", "The location", "The lesson"], answer: "The problem", hint: "Struggle between forces." },
    { grade: "Seventh Grade", subject: "Language Arts", question: "Metaphor means?", options: ["Using 'like'", "Direct comparison", "Exaggeration", "Sound"], answer: "Direct comparison", hint: "You are a star." },
    { grade: "Seventh Grade", subject: "Language Arts", question: "Alliteration uses?", options: ["Same starting sounds", "Rhyme", "Meanings", "Endings"], answer: "Same starting sounds", hint: "Sally sells seashells." },
    { grade: "Seventh Grade", subject: "Science", question: "Powerhouse of the cell?", options: ["Nucleus", "Mitochondria", "Ribosome", "Vacuole"], answer: "Mitochondria", hint: "Makes energy (ATP)." },
    { grade: "Seventh Grade", subject: "Science", question: "Water turning to gas?", options: ["Condensation", "Evaporation", "Precipitation", "Freezing"], answer: "Evaporation", hint: "Heat causes it." },
    { grade: "Seventh Grade", subject: "Science", question: "What organ pumps blood?", options: ["Brain", "Lungs", "Heart", "Liver"], answer: "Heart", hint: "Beats in chest." },
    { grade: "Seventh Grade", subject: "Science", question: "Control center of cell?", options: ["Nucleus", "Wall", "Membrane", "Cytoplasm"], answer: "Nucleus", hint: "Brain of cell." },
    { grade: "Seventh Grade", subject: "Science", question: "Photosynthesis occurs in?", options: ["Chloroplasts", "Mitochondria", "Nucleus", "Ribosomes"], answer: "Chloroplasts", hint: "Green part." },
    { grade: "Seventh Grade", subject: "Social Studies", question: "Which continent is the Sahara Desert in?", options: ["Asia", "Africa", "South America", "Australia"], answer: "Africa", hint: "The North part." },
    { grade: "Seventh Grade", subject: "Social Studies", question: "What was the Silk Road?", options: ["A paved highway", "Trade routes", "A silk factory", "A myth"], answer: "Trade routes", hint: "Connected East and West." },
    { grade: "Seventh Grade", subject: "Social Studies", question: "Religion founded by Muhammad?", options: ["Christianity", "Islam", "Buddhism", "Judaism"], answer: "Islam", hint: "Quran." },
    { grade: "Seventh Grade", subject: "Social Studies", question: "Feudalism was?", options: ["Social system", "Religion", "Type of food", "Art"], answer: "Social system", hint: "Lords and Serfs." },
    { grade: "Seventh Grade", subject: "Social Studies", question: "Renaissance means?", options: ["Rebirth", "War", "Death", "New Land"], answer: "Rebirth", hint: "Art and learning." },
    // New
    { grade: "Seventh Grade", subject: "Math", question: "Integer: -3 - 2 = ?", options: ["-5", "-1", "1", "5"], answer: "-5", hint: "More negative." },
    { grade: "Seventh Grade", subject: "Math", question: "Circumference formula?", options: ["πd", "πr²", "lw", "bh"], answer: "πd", hint: "Around circle." },
    { grade: "Seventh Grade", subject: "Math", question: "Solve: 3x = -12", options: ["-4", "4", "3", "-9"], answer: "-4", hint: "Divide by 3." },
    { grade: "Seventh Grade", subject: "Math", question: "Constant of proportionality?", options: ["k=y/x", "k=y+x", "k=xy", "k=x-y"], answer: "k=y/x", hint: "Unit rate." },
    { grade: "Seventh Grade", subject: "Math", question: "Supplementary angles sum?", options: ["90", "180", "360", "45"], answer: "180", hint: "Straight line." },
    { grade: "Seventh Grade", subject: "Language Arts", question: "Connotation is?", options: ["Feeling of a word", "Definition", "Spelling", "Rhyme"], answer: "Feeling of a word", hint: "Positive/Negative." },
    { grade: "Seventh Grade", subject: "Language Arts", question: "Denotation is?", options: ["Definition", "Feeling", "Opposite", "Rhyme"], answer: "Definition", hint: "Dictionary." },
    { grade: "Seventh Grade", subject: "Language Arts", question: "Imagery appeals to?", options: ["Senses", "Logic", "Math", "Fear"], answer: "Senses", hint: "Sight, Sound..." },
    { grade: "Seventh Grade", subject: "Language Arts", question: "Haiku syllables?", options: ["5-7-5", "2-4-2", "10-10-10", "1-2-3"], answer: "5-7-5", hint: "Nature poem." },
    { grade: "Seventh Grade", subject: "Language Arts", question: "Hyperbole uses?", options: ["Exaggeration", "Facts", "Lies", "Questions"], answer: "Exaggeration", hint: "Extreme." },
    { grade: "Seventh Grade", subject: "Science", question: "Heredity pass down?", options: ["Traits/Genes", "Money", "Food", "Clothes"], answer: "Traits/Genes", hint: "DNA." },
    { grade: "Seventh Grade", subject: "Science", question: "Punnett Square predicts?", options: ["Genetics", "Weather", "Motion", "Time"], answer: "Genetics", hint: "Offspring." },
    { grade: "Seventh Grade", subject: "Science", question: "Skeletal system does?", options: ["Support/Protect", "Digest", "Think", "Breathe"], answer: "Support/Protect", hint: "Bones." },
    { grade: "Seventh Grade", subject: "Science", question: "Respiratory system?", options: ["Breathing", "Eating", "Moving", "Sleeping"], answer: "Breathing", hint: "Lungs." },
    { grade: "Seventh Grade", subject: "Science", question: "Circulatory system?", options: ["Blood flow", "Thinking", "Digesting", "Walking"], answer: "Blood flow", hint: "Heart." },
    { grade: "Seventh Grade", subject: "Social Studies", question: "Magna Carta limited?", options: ["King's Power", "Peasants", "Church", "Trade"], answer: "King's Power", hint: "1215." },
    { grade: "Seventh Grade", subject: "Social Studies", question: "Black Death was?", options: ["Plague", "War", "Famine", "Flood"], answer: "Plague", hint: "Disease." },
    { grade: "Seventh Grade", subject: "Social Studies", question: "Reformation started by?", options: ["Martin Luther", "Pope", "King Henry", "Columbus"], answer: "Martin Luther", hint: "95 Theses." },
    { grade: "Seventh Grade", subject: "Social Studies", question: "Aztecs lived in?", options: ["Mexico", "Peru", "USA", "Canada"], answer: "Mexico", hint: "Tenochtitlan." },
    { grade: "Seventh Grade", subject: "Social Studies", question: "Incas lived in?", options: ["Andes/Peru", "Mexico", "Europe", "Asia"], answer: "Andes/Peru", hint: "Machu Picchu." },
    { grade: "Seventh Grade", subject: "Math", question: "-10 + 5 ?", options: ["-5", "5", "-15", "10"], answer: "-5", hint: "Negative." },
    { grade: "Seventh Grade", subject: "Social Studies", question: "Democracy starts in?", options: ["Greece", "Rome", "Egypt", "China"], answer: "Greece", hint: "Athens." },
    { grade: "Seventh Grade", subject: "Science", question: "Mitochondria is?", options: ["Powerhouse", "Brain", "Skin", "Wall"], answer: "Powerhouse", hint: "Energy." },
    { grade: "Seventh Grade", subject: "Math", question: "Vertical angles are?", options: ["Equal", "Complementary", "Supplementary", "Adjacment"], answer: "Equal", hint: "Opposite." },
    { grade: "Seventh Grade", subject: "Math", question: "-8 x -2 = ?", options: ["16", "-16", "-10", "6"], answer: "16", hint: "Negative x Negative = Positive." },
    { grade: "Seventh Grade", subject: "Language Arts", question: "Omniscient POV?", options: ["All-knowing", "Limited", "First Person", "Objective"], answer: "All-knowing", hint: "God-like." },
    { grade: "Seventh Grade", subject: "Language Arts", question: "Soliloquy?", options: ["Speech alone", "Dialogue", "Argument", "Song"], answer: "Speech alone", hint: "Solo." },
    { grade: "Seventh Grade", subject: "Science", question: "Atmosphere layer w/ weather?", options: ["Troposphere", "Stratosphere", "Mesosphere", "Exosphere"], answer: "Troposphere", hint: "Lowest." },
    { grade: "Seventh Grade", subject: "Science", question: "Newton's 1st Law?", options: ["Inertia", "Gravity", "Action", "Force"], answer: "Inertia", hint: "Rest stays rest." },
    { grade: "Seventh Grade", subject: "Social Studies", question: "Renaissance Art focused on?", options: ["Realism/Humanism", "Abstract", "Gods only", "Nature"], answer: "Realism/Humanism", hint: "Da Vinci." },
    { grade: "Seventh Grade", subject: "Social Studies", question: "Scientific Revolution?", options: ["Logic/Reason", "Church", "Magic", "War"], answer: "Logic/Reason", hint: "Galileo." },

    // ==================== 8TH GRADE ====================
    // Existing
    { grade: "Eighth Grade", subject: "Math", question: "Slope of y = 2x + 5?", options: ["2", "5", "x", "7"], answer: "2", hint: "y = mx + b." },
    { grade: "Eighth Grade", subject: "Math", question: "If a=3, b=4, what is c in a right triangle?", options: ["5", "6", "7", "25"], answer: "5", hint: "a² + b² = c²." },
    { grade: "Eighth Grade", subject: "Math", question: "Value of 3 squared?", options: ["6", "9", "3", "27"], answer: "9", hint: "3 x 3." },
    { grade: "Eighth Grade", subject: "Math", question: "Scientific notation of 500?", options: ["5 x 10²", "5 x 10³", "50 x 10", "0.5 x 1000"], answer: "5 x 10²", hint: "Move decimal 2 places." },
    { grade: "Eighth Grade", subject: "Math", question: "Square root of 64?", options: ["6", "8", "16", "32"], answer: "8", hint: "8 x 8." },
    { grade: "Eighth Grade", subject: "Math", question: "Volume of cylinder?", options: ["πr²h", "πr²", "2πr", "lbh"], answer: "πr²h", hint: "Circle area times height." },
    { grade: "Eighth Grade", subject: "Language Arts", question: "What is irony?", options: ["A metal", "The opposite of what is expected", "A comparison", "A rhyme"], answer: "The opposite of what is expected", hint: "Unexpected outcome." },
    { grade: "Eighth Grade", subject: "Language Arts", question: "Active voice sentence?", options: ["The cake was eaten by me.", "I ate the cake.", "The cake was tasty.", "Eating is fun."], answer: "I ate the cake.", hint: "Subject does the action." },
    { grade: "Eighth Grade", subject: "Language Arts", question: "What is an ellipsis?", options: ["...", "!!!", "???", ";"], answer: "...", hint: "Indicates omitted words." },
    { grade: "Eighth Grade", subject: "Language Arts", question: "Claim in an argument?", options: ["Evidence", "Main point", "Conclusion", "Hook"], answer: "Main point", hint: "What you defend." },
    { grade: "Eighth Grade", subject: "Language Arts", question: "Infinitive verb?", options: ["To run", "Running", "Ran", "Runs"], answer: "To run", hint: "To + verb." },
    { grade: "Eighth Grade", subject: "Science", question: "Newton's First Law is Law of ___?", options: ["Gravity", "Inertia", "Force", "Motion"], answer: "Inertia", hint: "Objects stay at rest." },
    { grade: "Eighth Grade", subject: "Science", question: "pH of a neutral substance?", options: ["1", "7", "14", "0"], answer: "7", hint: "Water is neutral." },
    { grade: "Eighth Grade", subject: "Science", question: "Protons have what charge?", options: ["Positive", "Negative", "Neutral", "Variable"], answer: "Positive", hint: "Pro = Plus." },
    { grade: "Eighth Grade", subject: "Science", question: "Atomic Mass is?", options: ["Protons + Neutrons", "Electrons", "Protons", "Neutrons"], answer: "Protons + Neutrons", hint: "Nucleus weight." },
    { grade: "Eighth Grade", subject: "Science", question: "Speed formula?", options: ["Distance/Time", "Time/Distance", "Mass*Accel", "Force*Dist"], answer: "Distance/Time", hint: "Miles per hour." },
    { grade: "Eighth Grade", subject: "Social Studies", question: "War that freed the slaves in the US?", options: ["Revolutionary War", "Civil War", "WWI", "War of 1812"], answer: "Civil War", hint: "North vs South." },
    { grade: "Eighth Grade", subject: "Social Studies", question: "Author of Declaration of Independence?", options: ["Washington", "Jefferson", "Hamilton", "Franklin"], answer: "Jefferson", hint: "3rd President." },
    { grade: "Eighth Grade", subject: "Social Studies", question: "Constitution written in?", options: ["1776", "1787", "1812", "1900"], answer: "1787", hint: "After revolution." },
    { grade: "Eighth Grade", subject: "Social Studies", question: "Louisiana Purchase bought from?", options: ["Spain", "France", "England", "Russia"], answer: "France", hint: "Napoleon." },
    { grade: "Eighth Grade", subject: "Social Studies", question: "Trail of Tears involved?", options: ["Cherokee", "Pilgrims", "Vikings", "French"], answer: "Cherokee", hint: "Forced removal." },
    // New
    { grade: "Eighth Grade", subject: "Math", question: "y-intercept in y=mx+b?", options: ["b", "m", "y", "x"], answer: "b", hint: "Start value." },
    { grade: "Eighth Grade", subject: "Math", question: "Slope formula?", options: ["Rise/Run", "Run/Rise", "y2+y1", "x2-x1"], answer: "Rise/Run", hint: "Change in y / Change in x." },
    { grade: "Eighth Grade", subject: "Math", question: "Scatter plot shows?", options: ["Relationship between variables", "Pie chart", "Bar graph", "List"], answer: "Relationship between variables", hint: "Dots." },
    { grade: "Eighth Grade", subject: "Math", question: "Solve system: x+y=5, x-y=1?", options: ["3,2", "2,3", "5,0", "4,1"], answer: "3,2", hint: "Add equations." },
    { grade: "Eighth Grade", subject: "Math", question: "Function check?", options: ["Vertical Line Test", "Horizontal Line Test", "Slope", "Area"], answer: "Vertical Line Test", hint: "One y for each x." },
    { grade: "Eighth Grade", subject: "Language Arts", question: "Dramatic Irony is?", options: ["Audience knows, character doesn't", "Sarcasm", "Unexpected end", "Sadness"], answer: "Audience knows, character doesn't", hint: "Horror movies." },
    { grade: "Eighth Grade", subject: "Language Arts", question: "Counterclaim is?", options: ["Opposing argument", "Support", "Conclusion", "Intro"], answer: "Opposing argument", hint: "Other side." },
    { grade: "Eighth Grade", subject: "Language Arts", question: "Ellipsis ... shows?", options: ["Pause/Omission", "End", "Excitement", "Question"], answer: "Pause/Omission", hint: "Missing words." },
    { grade: "Eighth Grade", subject: "Language Arts", question: "Verb Mood: Imperative?", options: ["Command", "Fact", "Question", "Wish"], answer: "Command", hint: "Do it." },
    { grade: "Eighth Grade", subject: "Language Arts", question: "Gerund ends in?", options: ["-ing", "-ed", "-s", "-ly"], answer: "-ing", hint: "Swimming is fun." },
    { grade: "Eighth Grade", subject: "Science", question: "Newton's 2nd Law?", options: ["F=ma", "Inertia", "Action/Reaction", "Gravity"], answer: "F=ma", hint: "Force." },
    { grade: "Eighth Grade", subject: "Science", question: "Newton's 3rd Law?", options: ["Action/Reaction", "Inertia", "F=ma", "Gravity"], answer: "Action/Reaction", hint: "Equal/Opposite." },
    { grade: "Eighth Grade", subject: "Science", question: "Electron charge?", options: ["Negative", "Positive", "Neutral", "None"], answer: "Negative", hint: "Shock." },
    { grade: "Eighth Grade", subject: "Science", question: "Periodic Table ordered by?", options: ["Atomic Number", "Mass", "Name", "Date"], answer: "Atomic Number", hint: "Protons." },
    { grade: "Eighth Grade", subject: "Science", question: "Chemical Reaction sign?", options: ["Bubbles/Heat", "Melting", "Breaking", "Moving"], answer: "Bubbles/Heat", hint: "Change." },
    { grade: "Eighth Grade", subject: "Social Studies", question: "Manifest Destiny?", options: ["Expand West", "Stay East", "No War", "Trade"], answer: "Expand West", hint: "Sea to shining sea." },
    { grade: "Eighth Grade", subject: "Social Studies", question: "Underground Railroad?", options: ["Escape route for slaves", "Subway", "Train", "Mine"], answer: "Escape route for slaves", hint: "Harriet Tubman." },
    { grade: "Eighth Grade", subject: "Social Studies", question: "Gettysburg Address by?", options: ["Lincoln", "Washington", "Grant", "Lee"], answer: "Lincoln", hint: "Civil War speech." },
    { grade: "Eighth Grade", subject: "Social Studies", question: "Emancipation Proclamation?", options: ["Freed slaves in South", "Ended war", "Taxed tea", "Bought land"], answer: "Freed slaves in South", hint: "Lincoln." },
    { grade: "Eighth Grade", subject: "Social Studies", question: "Reconstruction was?", options: ["Rebuilding after Civil War", "Building walls", "War", "New laws"], answer: "Rebuilding after Civil War", hint: "Post-1865." },
    { grade: "Eighth Grade", subject: "Math", question: "Slope of horizontal line?", options: ["0", "Undefined", "1", "Infinity"], answer: "0", hint: "Flat." },
    { grade: "Eighth Grade", subject: "Language Arts", question: "Irony?", options: ["Unexpected", "Funny", "Sad", "Rhyme"], answer: "Unexpected", hint: "Opposite." },
    { grade: "Eighth Grade", subject: "Science", question: "Newton's 1st Law?", options: ["Inertia", "Gravity", "Action", "Force"], answer: "Inertia", hint: "Rest stays at rest." },
    { grade: "Eighth Grade", subject: "Math", question: "Pythagorean Theorem?", options: ["a²+b²=c²", "E=mc²", "y=mx+b", "F=ma"], answer: "a²+b²=c²", hint: "Right Triangle." },
    { grade: "Eighth Grade", subject: "Math", question: "Irrational Number?", options: ["π", "4", "1/2", "0"], answer: "π", hint: "Non-repeating decimal." },
    { grade: "Eighth Grade", subject: "Language Arts", question: "Active Voice?", options: ["Subject acts", "Subject receives", "Passive", "None"], answer: "Subject acts", hint: "I did it." },
    { grade: "Eighth Grade", subject: "Language Arts", question: "Hook in essay?", options: ["Grabs attention", "Conclusion", "Thesis", "Evidence"], answer: "Grabs attention", hint: "Start." },
    { grade: "Eighth Grade", subject: "Science", question: "Density formula?", options: ["Mass/Volume", "Mass x Volume", "Volume/Mass", "Weight"], answer: "Mass/Volume", hint: "Float or sink." },
    { grade: "Eighth Grade", subject: "Science", question: "Potential Energy max at?", options: ["Highest point", "Lowest point", "Middle", "End"], answer: "Highest point", hint: "Height." },
    { grade: "Eighth Grade", subject: "Social Studies", question: "Articles of Confederation?", options: ["Weak/First Govt", "Strong", "King", "British"], answer: "Weak/First Govt", hint: "Before Constitution." },
    { grade: "Eighth Grade", subject: "Social Studies", question: "Industrial Revolution effect?", options: ["Urbanization", "Farming", "War", "Peace"], answer: "Urbanization", hint: "Factories." },

    // ==================== 9TH GRADE ====================
    // Existing
    { grade: "Ninth Grade", subject: "Math", question: "Factor: x² - 9", options: ["(x-3)(x-3)", "(x+3)(x-3)", "(x+9)(x-9)", "(x-9)(x+1)"], answer: "(x+3)(x-3)", hint: "Difference of squares." },
    { grade: "Ninth Grade", subject: "Math", question: "Quadratic formula?", options: ["-b ± √(b²-4ac) / 2a", "a² + b² = c²", "y = mx + b", "E = mc²"], answer: "-b ± √(b²-4ac) / 2a", hint: "Solves ax² + bx + c = 0." },
    { grade: "Ninth Grade", subject: "Math", question: "What is the y-intercept of y=3x-4?", options: ["3", "-4", "4", "0"], answer: "-4", hint: "Where x=0." },
    { grade: "Ninth Grade", subject: "Math", question: "Simplify √50", options: ["5√2", "2√5", "25", "10"], answer: "5√2", hint: "25 * 2." },
    { grade: "Ninth Grade", subject: "Math", question: "Domain of a function?", options: ["All x values", "All y values", "The graph", "The equation"], answer: "All x values", hint: "Inputs." },
    { grade: "Ninth Grade", subject: "Math", question: "Slope of horizontal line?", options: ["0", "1", "Undefined", "Infinity"], answer: "0", hint: "Flat." },
    { grade: "Ninth Grade", subject: "Language Arts", question: "Author of 'Romeo and Juliet'?", options: ["Dickens", "Shakespeare", "Twain", "Hemingway"], answer: "Shakespeare", hint: "The Bard." },
    { grade: "Ninth Grade", subject: "Language Arts", question: "What is a hyperbole?", options: ["An extreme exaggeration", "A geometric shape", "A type of poem", "A question"], answer: "An extreme exaggeration", hint: "I'm so hungry I could eat a horse." },
    { grade: "Ninth Grade", subject: "Language Arts", question: "Protagonist is?", options: ["The main character", "The villain", "The setting", "The author"], answer: "The main character", hint: "Hero of the story." },
    { grade: "Ninth Grade", subject: "Language Arts", question: "Soliloquy is?", options: ["Speech alone on stage", "Dialogue", "Song", "Argument"], answer: "Speech alone on stage", hint: "Solo." },
    { grade: "Ninth Grade", subject: "Language Arts", question: "Imagery appeals to?", options: ["The 5 senses", "Logic", "Ethics", "Fear"], answer: "The 5 senses", hint: "Sight, sound..." },
    { grade: "Ninth Grade", subject: "Science", question: "Molecule carrying genetic info?", options: ["RNA", "DNA", "Protein", "Lipid"], answer: "DNA", hint: "Double helix." },
    { grade: "Ninth Grade", subject: "Science", question: "Cell division is called?", options: ["Meiosis", "Mitosis", "Osmosis", "Diffusion"], answer: "Mitosis", hint: "Creates identical cells." },
    { grade: "Ninth Grade", subject: "Science", question: "Atomic number equals number of?", options: ["Protons", "Neutrons", "Electrons", "Isotopes"], answer: "Protons", hint: "Defines the element." },
    { grade: "Ninth Grade", subject: "Science", question: "Natural Selection proposed by?", options: ["Darwin", "Newton", "Einstein", "Galileo"], answer: "Darwin", hint: "Evolution." },
    { grade: "Ninth Grade", subject: "Science", question: "Kingdom of humans?", options: ["Animalia", "Plantae", "Fungi", "Protista"], answer: "Animalia", hint: "Animals." },
    { grade: "Ninth Grade", subject: "Social Studies", question: "Longest river in the world?", options: ["Amazon", "Nile", "Mississippi", "Yangtze"], answer: "Nile", hint: "In Egypt." },
    { grade: "Ninth Grade", subject: "Social Studies", question: "Study of human populations?", options: ["Geography", "Demography", "Cartography", "Geology"], answer: "Demography", hint: "Demo means people." },
    { grade: "Ninth Grade", subject: "Social Studies", question: "Imperialism is?", options: ["Extending power over others", "Voting", "Trading", "Isolation"], answer: "Extending power over others", hint: "Colonies." },
    { grade: "Ninth Grade", subject: "Social Studies", question: "Industrial Revolution began in?", options: ["USA", "Britain", "France", "China"], answer: "Britain", hint: "Factories." },
    { grade: "Ninth Grade", subject: "Social Studies", question: "Monotheism means?", options: ["One God", "Many Gods", "No God", "Nature"], answer: "One God", hint: "Mono = one." },
    // New
    { grade: "Ninth Grade", subject: "Math", question: "FOIL stands for?", options: ["First Outer Inner Last", "Math term", "Cooking", "Variables"], answer: "First Outer Inner Last", hint: "Multiplying binomials." },
    { grade: "Ninth Grade", subject: "Math", question: "Vertex of parabola?", options: ["Turning point", "Intercept", "Slope", "Root"], answer: "Turning point", hint: "Max or Min." },
    { grade: "Ninth Grade", subject: "Math", question: "Zero exponent rule: x^0?", options: ["1", "0", "x", "Undefined"], answer: "1", hint: "Anything to 0 is 1." },
    { grade: "Ninth Grade", subject: "Math", question: "Negative exponent: x^-1?", options: ["1/x", "-x", "x", "0"], answer: "1/x", hint: "Flip fraction." },
    { grade: "Ninth Grade", subject: "Math", question: "Range of function?", options: ["y values", "x values", "slope", "intercepts"], answer: "y values", hint: "Outputs." },
    { grade: "Ninth Grade", subject: "Language Arts", question: "Epic Poem example?", options: ["Odyssey", "Haiku", "Limerick", "Sonnet"], answer: "Odyssey", hint: "Homer." },
    { grade: "Ninth Grade", subject: "Language Arts", question: "Rhetoric is?", options: ["Art of persuasion", "Poetry", "Grammar", "Spelling"], answer: "Art of persuasion", hint: "Argue well." },
    { grade: "Ninth Grade", subject: "Language Arts", question: "Foreshadowing?", options: ["Hints at future", "Flashback", "Description", "Ending"], answer: "Hints at future", hint: "Warning." },
    { grade: "Ninth Grade", subject: "Language Arts", question: "Symbolism?", options: ["Object represents idea", "Sound", "Rhyme", "Fact"], answer: "Object represents idea", hint: "Flag = Country." },
    { grade: "Ninth Grade", subject: "Language Arts", question: "Genre: Tragedy?", options: ["Sad ending", "Happy ending", "Funny", "Facts"], answer: "Sad ending", hint: "Shakespeare." },
    { grade: "Ninth Grade", subject: "Science", question: "Meiosis creates?", options: ["Gametes (Sex cells)", "Skin cells", "Muscle", "Bone"], answer: "Gametes (Sex cells)", hint: "Reproduction." },
    { grade: "Ninth Grade", subject: "Science", question: "Enzyme is a?", options: ["Catalyst", "Sugar", "Fat", "Acid"], answer: "Catalyst", hint: "Speed up reaction." },
    { grade: "Ninth Grade", subject: "Science", question: "Osmosis is movement of?", options: ["Water", "Sugar", "Salt", "Air"], answer: "Water", hint: "Through membrane." },
    { grade: "Ninth Grade", subject: "Science", question: "Homozygous means?", options: ["Same alleles (BB)", "Different (Bb)", "None", "Lost"], answer: "Same alleles (BB)", hint: "Purebred." },
    { grade: "Ninth Grade", subject: "Science", question: "Heterozygous means?", options: ["Different alleles (Bb)", "Same (BB)", "None", "Lost"], answer: "Different alleles (Bb)", hint: "Hybrid." },
    { grade: "Ninth Grade", subject: "Social Studies", question: "Urbanization?", options: ["Moving to cities", "Farming", "War", "Voting"], answer: "Moving to cities", hint: "City growth." },
    { grade: "Ninth Grade", subject: "Social Studies", question: "Culture diffusion?", options: ["Spread of culture", "War", "Isolation", "Economy"], answer: "Spread of culture", hint: "Ideas moving." },
    { grade: "Ninth Grade", subject: "Social Studies", question: "Latitude lines run?", options: ["East-West", "North-South", "Up-Down", "Diagonal"], answer: "East-West", hint: "Ladder." },
    { grade: "Ninth Grade", subject: "Social Studies", question: "Longitude lines run?", options: ["North-South", "East-West", "Flat", "Round"], answer: "North-South", hint: "Pole to Pole." },
    { grade: "Ninth Grade", subject: "Social Studies", question: "Push Factor?", options: ["Reason to leave", "Reason to stay", "Gravity", "Wind"], answer: "Reason to leave", hint: "Migration." },
    { grade: "Ninth Grade", subject: "Math", question: "Quadratic Formula starts?", options: ["-b", "b", "2a", "c"], answer: "-b", hint: "Negative boy." },
    { grade: "Ninth Grade", subject: "Social Studies", question: "Cold War?", options: ["USA vs USSR", "USA vs UK", "North vs South", "East vs West"], answer: "USA vs USSR", hint: "Communism." },
    { grade: "Ninth Grade", subject: "Science", question: "DNA shape?", options: ["Double Helix", "Circle", "Line", "Square"], answer: "Double Helix", hint: "Twisted ladder." },
    { grade: "Ninth Grade", subject: "Math", question: "Line of Symmetry?", options: ["Mirrors graph", "Cuts x-axis", "Touch y-axis", "Slope"], answer: "Mirrors graph", hint: "Parabola middle." },
    { grade: "Ninth Grade", subject: "Math", question: "Inequality flip sign when?", options: ["Mult/Div by negative", "Add", "Subtract", "Never"], answer: "Mult/Div by negative", hint: "Opposite." },
    { grade: "Ninth Grade", subject: "Language Arts", question: "Iambic Pentameter?", options: ["10 syllables", "Rhyme", "Prose", "Story"], answer: "10 syllables", hint: "Shakespeare." },
    { grade: "Ninth Grade", subject: "Language Arts", question: "Sonnet lines?", options: ["14", "12", "10", "8"], answer: "14", hint: "Poem length." },
    { grade: "Ninth Grade", subject: "Science", question: "Mitosis results in?", options: ["2 Identical Cells", "4 Different", "1 Cell", "Dead Cell"], answer: "2 Identical Cells", hint: "Clones." },
    { grade: "Ninth Grade", subject: "Science", question: "Protein made by?", options: ["Ribosome", "Nucleus", "Mitochondria", "Wall"], answer: "Ribosome", hint: "Factory." },
    { grade: "Ninth Grade", subject: "Social Studies", question: "Triangular Trade?", options: ["Slaves/Goods route", "Triangle shape", "Asia", "Europe only"], answer: "Slaves/Goods route", hint: "Atlantic." },
    { grade: "Ninth Grade", subject: "Social Studies", question: "Enlightenment idea?", options: ["Reason/Rights", "Religion", "War", "King"], answer: "Reason/Rights", hint: "Locke/Rousseau." },

    // ==================== 10TH GRADE ====================
    // Existing
    { grade: "Tenth Grade", subject: "Math", question: "Sum of interior angles of a triangle?", options: ["90°", "180°", "360°", "270°"], answer: "180°", hint: "A straight line." },
    { grade: "Tenth Grade", subject: "Math", question: "Volume of a sphere (r=3)?", options: ["36π", "12π", "100", "27π"], answer: "36π", hint: "4/3 πr³." },
    { grade: "Tenth Grade", subject: "Math", question: "Congruent means?", options: ["Different", "Same shape and size", "Similar", "Parallel"], answer: "Same shape and size", hint: "Exact copy." },
    { grade: "Tenth Grade", subject: "Math", question: "Distance Formula?", options: ["√(x2-x1)²+(y2-y1)²", "mx+b", "1/2bh", "πr²"], answer: "√(x2-x1)²+(y2-y1)²", hint: "Pythagorean theorem." },
    { grade: "Tenth Grade", subject: "Math", question: "Midpoint of (2,4) and (4,8)?", options: ["(3,6)", "(2,2)", "(6,12)", "(3,4)"], answer: "(3,6)", hint: "Average of x and y." },
    { grade: "Tenth Grade", subject: "Math", question: "Sin(90)?", options: ["0", "1", "-1", "0.5"], answer: "1", hint: "Unit circle top." },
    { grade: "Tenth Grade", subject: "Language Arts", question: "Thesis of an essay?", options: ["The first sentence", "The main argument", "The conclusion", "The title"], answer: "The main argument", hint: "What you are proving." },
    { grade: "Tenth Grade", subject: "Language Arts", question: "Author of 'To Kill a Mockingbird'?", options: ["Harper Lee", "Mark Twain", "Steinbeck", "Orwell"], answer: "Harper Lee", hint: "Scout and Atticus." },
    { grade: "Tenth Grade", subject: "Language Arts", question: "Tone refers to?", options: ["Author's attitude", "Reader's feeling", "Volume", "Color"], answer: "Author's attitude", hint: "How the writer sounds." },
    { grade: "Tenth Grade", subject: "Language Arts", question: "Ethos appeals to?", options: ["Emotion", "Logic", "Credibility", "Time"], answer: "Credibility", hint: "Ethics/Trust." },
    { grade: "Tenth Grade", subject: "Language Arts", question: "Allegory is?", options: ["Story with hidden meaning", "True story", "Poem", "Joke"], answer: "Story with hidden meaning", hint: "Animal Farm." },
    { grade: "Tenth Grade", subject: "Science", question: "Chemical symbol for Gold?", options: ["Go", "Gd", "Au", "Ag"], answer: "Au", hint: "Aurum." },
    { grade: "Tenth Grade", subject: "Science", question: "Bond sharing electrons?", options: ["Ionic", "Covalent", "Hydrogen", "Metallic"], answer: "Covalent", hint: "Co-operation." },
    { grade: "Tenth Grade", subject: "Science", question: "pH less than 7 is?", options: ["Acidic", "Basic", "Neutral", "Salty"], answer: "Acidic", hint: "Lemon juice." },
    { grade: "Tenth Grade", subject: "Science", question: "Avogadro's number?", options: ["6.02 x 10²³", "3.14", "9.8", "100"], answer: "6.02 x 10²³", hint: "Mole." },
    { grade: "Tenth Grade", subject: "Science", question: "Most abundant gas in air?", options: ["Oxygen", "Nitrogen", "Carbon Dioxide", "Argon"], answer: "Nitrogen", hint: "78%." },
    { grade: "Tenth Grade", subject: "Social Studies", question: "Event that started WWI?", options: ["Invasion of Poland", "Assassination of Archduke Ferdinand", "Pearl Harbor", "Berlin Wall"], answer: "Assassination of Archduke Ferdinand", hint: "Sarajevo, 1914." },
    { grade: "Tenth Grade", subject: "Social Studies", question: "Leader of Nazi Germany?", options: ["Mussolini", "Hitler", "Stalin", "Churchill"], answer: "Hitler", hint: "WWII dictator." },
    { grade: "Tenth Grade", subject: "Social Studies", question: "Cold War was between?", options: ["US and UK", "US and USSR", "Germany and France", "China and Japan"], answer: "US and USSR", hint: "East vs West." },
    { grade: "Tenth Grade", subject: "Social Studies", question: "Treaty ending WWI?", options: ["Versailles", "Paris", "London", "Berlin"], answer: "Versailles", hint: "Punished Germany." },
    { grade: "Tenth Grade", subject: "Social Studies", question: "Apartheid was in?", options: ["USA", "South Africa", "India", "China"], answer: "South Africa", hint: "Segregation." },
    // New
    { grade: "Tenth Grade", subject: "Math", question: "Tangent ratio?", options: ["Opp/Adj", "Opp/Hyp", "Adj/Hyp", "Hyp/Adj"], answer: "Opp/Adj", hint: "TOA." },
    { grade: "Tenth Grade", subject: "Math", question: "Pythagorean Triples?", options: ["3-4-5", "1-2-3", "5-5-5", "2-3-4"], answer: "3-4-5", hint: "Whole numbers." },
    { grade: "Tenth Grade", subject: "Math", question: "Similar triangles have?", options: ["Same angles", "Same size", "Same area", "None"], answer: "Same angles", hint: "Proportional." },
    { grade: "Tenth Grade", subject: "Math", question: "Chords are in?", options: ["Circles", "Squares", "Triangles", "Lines"], answer: "Circles", hint: "Connect 2 points." },
    { grade: "Tenth Grade", subject: "Math", question: "Polygon with 10 sides?", options: ["Decagon", "Octagon", "Dodecagon", "Hexagon"], answer: "Decagon", hint: "Decade." },
    { grade: "Tenth Grade", subject: "Language Arts", question: "Logos appeals to?", options: ["Logic/Reason", "Emotion", "Trust", "Time"], answer: "Logic/Reason", hint: "Facts." },
    { grade: "Tenth Grade", subject: "Language Arts", question: "Pathos appeals to?", options: ["Emotion", "Logic", "Trust", "Time"], answer: "Emotion", hint: "Feelings." },
    { grade: "Tenth Grade", subject: "Language Arts", question: "Motif is?", options: ["Recurring element", "Theme", "Setting", "Character"], answer: "Recurring element", hint: "Pattern." },
    { grade: "Tenth Grade", subject: "Language Arts", question: "Diction is?", options: ["Word choice", "Spelling", "Grammar", "Plot"], answer: "Word choice", hint: "Vocabulary." },
    { grade: "Tenth Grade", subject: "Language Arts", question: "Paradox is?", options: ["Self-contradictory truth", "Lie", "Joke", "Story"], answer: "Self-contradictory truth", hint: "Less is more." },
    { grade: "Tenth Grade", subject: "Science", question: "Ionic bond transfer?", options: ["Electrons", "Protons", "Neutrons", "Atoms"], answer: "Electrons", hint: "Give/Take." },
    { grade: "Tenth Grade", subject: "Science", question: "Molar Mass unit?", options: ["g/mol", "kg", "lbs", "moles"], answer: "g/mol", hint: "Grams per..." },
    { grade: "Tenth Grade", subject: "Science", question: "Stoichiometry calculates?", options: ["Reactants/Products", "Speed", "Heat", "Color"], answer: "Reactants/Products", hint: "Amounts." },
    { grade: "Tenth Grade", subject: "Science", question: "Universal Solvent?", options: ["Water", "Acid", "Oil", "Alcohol"], answer: "Water", hint: "H2O." },
    { grade: "Tenth Grade", subject: "Science", question: "Gas Law PV=?", options: ["nRT", "mgh", "1/2mv", "ma"], answer: "nRT", hint: "Ideal." },
    { grade: "Tenth Grade", subject: "Social Studies", question: "League of Nations?", options: ["Failed peace org", "UN", "Army", "Team"], answer: "Failed peace org", hint: "Post WWI." },
    { grade: "Tenth Grade", subject: "Social Studies", question: "Bolshevik Revolution?", options: ["Russia", "France", "USA", "China"], answer: "Russia", hint: "Communism." },
    { grade: "Tenth Grade", subject: "Social Studies", question: "Fascism leader Italy?", options: ["Mussolini", "Hitler", "Stalin", "Franco"], answer: "Mussolini", hint: "Il Duce." },
    { grade: "Tenth Grade", subject: "Social Studies", question: "D-Day invasion?", options: ["Normandy", "Berlin", "Tokyo", "Rome"], answer: "Normandy", hint: "France 1944." },
    { grade: "Tenth Grade", subject: "Social Studies", question: "Gandhi used?", options: ["Non-violence", "War", "Money", "Fear"], answer: "Non-violence", hint: "India independence." },
    { grade: "Tenth Grade", subject: "Math", question: "SOH CAH TOA?", options: ["Trigonometry", "Algebra", "Calculus", "Geometry"], answer: "Trigonometry", hint: "Sin Cos Tan." },
    { grade: "Tenth Grade", subject: "Language Arts", question: "Romeo and Juliet city?", options: ["Verona", "Rome", "Paris", "London"], answer: "Verona", hint: "Italy." },
    { grade: "Tenth Grade", subject: "Science", question: "Au is?", options: ["Gold", "Silver", "Copper", "Iron"], answer: "Gold", hint: "Golden." },
    { grade: "Tenth Grade", subject: "Math", question: "Cosine ratio?", options: ["Adj/Hyp", "Opp/Hyp", "Opp/Adj", "Hyp/Adj"], answer: "Adj/Hyp", hint: "CAH." },
    { grade: "Tenth Grade", subject: "Math", question: "Circle Equation?", options: ["(x-h)²+(y-k)²=r²", "y=mx+b", "ax²+bx+c", "F=ma"], answer: "(x-h)²+(y-k)²=r²", hint: "Radius/Center." },
    { grade: "Tenth Grade", subject: "Language Arts", question: "Dante's Inferno about?", options: ["Hell", "Heaven", "Earth", "Space"], answer: "Hell", hint: "Circles." },
    { grade: "Tenth Grade", subject: "Language Arts", question: "Machiavelli wrote?", options: ["The Prince", "Bible", "Hamlet", "Odyssey"], answer: "The Prince", hint: "Power." },
    { grade: "Tenth Grade", subject: "Science", question: "Covalent Bond?", options: ["Shares electrons", "Steals", "Weak", "Magnetic"], answer: "Shares electrons", hint: "Co-operate." },
    { grade: "Tenth Grade", subject: "Science", question: "Endothermic reaction?", options: ["Absorbs heat", "Releases heat", "Explodes", "Freezes"], answer: "Absorbs heat", hint: "Gets cold." },
    { grade: "Tenth Grade", subject: "Social Studies", question: "French Revolution start?", options: ["1789", "1776", "1812", "1900"], answer: "1789", hint: "Bastille." },
    { grade: "Tenth Grade", subject: "Social Studies", question: "Napoleon was?", options: ["French Emperor", "English King", "German", "Russian"], answer: "French Emperor", hint: "Short?" },

    // ==================== 11TH GRADE ====================
    // Existing
    { grade: "Eleventh Grade", subject: "Math", question: "log(100) base 10?", options: ["1", "2", "10", "0"], answer: "2", hint: "10 to what power is 100?" },
    { grade: "Eleventh Grade", subject: "Math", question: "sin(30°)?", options: ["0", "0.5", "1", "√3/2"], answer: "0.5", hint: "1/2." },
    { grade: "Eleventh Grade", subject: "Math", question: "Imaginary unit i equals?", options: ["√-1", "-1", "1", "0"], answer: "√-1", hint: "Complex numbers." },
    { grade: "Eleventh Grade", subject: "Math", question: "Amplitude of y=2sin(x)?", options: ["1", "2", "0", "π"], answer: "2", hint: "Height from center." },
    { grade: "Eleventh Grade", subject: "Math", question: "Sum of infinite geometric series r=1/2?", options: ["1", "2", "0.5", "Infinity"], answer: "2", hint: "a/(1-r)." },
    { grade: "Eleventh Grade", subject: "Math", question: "Asymptote of 1/x?", options: ["y=0", "y=1", "y=x", "None"], answer: "y=0", hint: "Cannot divide by zero." },
    { grade: "Eleventh Grade", subject: "Language Arts", question: "Period emphasizing nature?", options: ["Realism", "Transcendentalism", "Modernism", "Puritanism"], answer: "Transcendentalism", hint: "Thoreau and Emerson." },
    { grade: "Eleventh Grade", subject: "Language Arts", question: "'The Great Gatsby' critiques?", options: ["The American Dream", "War", "Slavery", "Technology"], answer: "The American Dream", hint: "Jazz Age excess." },
    { grade: "Eleventh Grade", subject: "Language Arts", question: "Stream of consciousness is?", options: ["A river", "Writing thoughts as they occur", "A poem", "Editing"], answer: "Writing thoughts as they occur", hint: "Flow of mind." },
    { grade: "Eleventh Grade", subject: "Language Arts", question: "Arthur Miller wrote?", options: ["The Crucible", "Hamlet", "Gatsby", "Huck Finn"], answer: "The Crucible", hint: "Witch trials." },
    { grade: "Eleventh Grade", subject: "Language Arts", question: "Harlem Renaissance was?", options: ["Music/Art explosion", "War", "Depression", "Law"], answer: "Music/Art explosion", hint: "1920s Black culture." },
    { grade: "Eleventh Grade", subject: "Science", question: "Force equals Mass times?", options: ["Velocity", "Acceleration", "Gravity", "Energy"], answer: "Acceleration", hint: "F=ma." },
    { grade: "Eleventh Grade", subject: "Science", question: "Unit of energy?", options: ["Watt", "Joule", "Newton", "Volt"], answer: "Joule", hint: "J." },
    { grade: "Eleventh Grade", subject: "Science", question: "Kinetic energy depends on?", options: ["Height", "Motion", "Heat", "Sound"], answer: "Motion", hint: "Movement energy." },
    { grade: "Eleventh Grade", subject: "Science", question: "Acceleration due to gravity?", options: ["9.8 m/s²", "100 m/s²", "1 m/s²", "0"], answer: "9.8 m/s²", hint: "On Earth." },
    { grade: "Eleventh Grade", subject: "Science", question: "Ohm's Law?", options: ["V=IR", "F=ma", "E=mc²", "PV=nRT"], answer: "V=IR", hint: "Voltage." },
    { grade: "Eleventh Grade", subject: "Social Studies", question: "Cold War ideology?", options: ["Communism vs Capitalism", "Monarchy vs Republic", "Fascism vs Socialism", "Rich vs Poor"], answer: "Communism vs Capitalism", hint: "Red Scare." },
    { grade: "Eleventh Grade", subject: "Social Studies", question: "Amendment for women's vote?", options: ["13th", "19th", "21st", "1st"], answer: "19th", hint: "1920." },
    { grade: "Eleventh Grade", subject: "Social Studies", question: "Great Depression started in?", options: ["1919", "1929", "1939", "1945"], answer: "1929", hint: "Stock market crash." },
    { grade: "Eleventh Grade", subject: "Social Studies", question: "US President during Civil War?", options: ["Lincoln", "Washington", "FDR", "JFK"], answer: "Lincoln", hint: "Top hat." },
    { grade: "Eleventh Grade", subject: "Social Studies", question: "Prohibition banned?", options: ["Alcohol", "Guns", "Voting", "Cars"], answer: "Alcohol", hint: "18th Amendment." },
    // New
    { grade: "Eleventh Grade", subject: "Math", question: "ln(e) = ?", options: ["1", "0", "e", "10"], answer: "1", hint: "Natural log." },
    { grade: "Eleventh Grade", subject: "Math", question: "Unit Circle radius?", options: ["1", "2", "0", "10"], answer: "1", hint: "Unit." },
    { grade: "Eleventh Grade", subject: "Math", question: "Period of sin(x)?", options: ["2π", "π", "1", "360"], answer: "2π", hint: "Full cycle." },
    { grade: "Eleventh Grade", subject: "Math", question: "Conjugate of 1+i?", options: ["1-i", "-1-i", "1+i", "i"], answer: "1-i", hint: "Flip sign." },
    { grade: "Eleventh Grade", subject: "Math", question: "Inverse of log?", options: ["Exponential", "Linear", "Quadratic", "Root"], answer: "Exponential", hint: "Powers." },
    { grade: "Eleventh Grade", subject: "Language Arts", question: "Modernism focuses on?", options: ["Fragmentation/Chaos", "Nature", "God", "Logic"], answer: "Fragmentation/Chaos", hint: "Post WWI." },
    { grade: "Eleventh Grade", subject: "Language Arts", question: "Hemingway style?", options: ["Iceberg Theory", "Flowery", "Long", "Poetic"], answer: "Iceberg Theory", hint: "Simple surface." },
    { grade: "Eleventh Grade", subject: "Language Arts", question: "Southern Gothic author?", options: ["Faulkner", "Hemingway", "Whitman", "Thoreau"], answer: "Faulkner", hint: "The South." },
    { grade: "Eleventh Grade", subject: "Language Arts", question: "Beat Generation?", options: ["Kerouac/Ginsberg", "Twain", "Poe", "King"], answer: "Kerouac/Ginsberg", hint: "1950s Counterculture." },
    { grade: "Eleventh Grade", subject: "Language Arts", question: "Post-modernism?", options: ["Unreliable narrator", "True facts", "Simple plots", "Rhyme"], answer: "Unreliable narrator", hint: "Meta." },
    { grade: "Eleventh Grade", subject: "Science", question: "Vector has?", options: ["Magnitude & Direction", "Only Size", "Weight", "Color"], answer: "Magnitude & Direction", hint: "Arrow." },
    { grade: "Eleventh Grade", subject: "Science", question: "Velocity is?", options: ["Speed with direction", "Fast", "Distance", "Time"], answer: "Speed with direction", hint: "Vector." },
    { grade: "Eleventh Grade", subject: "Science", question: "Work formula?", options: ["Force x Distance", "Mass x Accel", "Speed x Time", "Heat"], answer: "Force x Distance", hint: "Moving object." },
    { grade: "Eleventh Grade", subject: "Science", question: "Power is rate of?", options: ["Work", "Speed", "Force", "Distance"], answer: "Work", hint: "Watts." },
    { grade: "Eleventh Grade", subject: "Science", question: "Momentum is?", options: ["Mass x Velocity", "Speed", "Force", "Energy"], answer: "Mass x Velocity", hint: "Inertia in motion." },
    { grade: "Eleventh Grade", subject: "Social Studies", question: "New Deal President?", options: ["FDR", "Hoover", "Truman", "Wilson"], answer: "FDR", hint: "Depression relief." },
    { grade: "Eleventh Grade", subject: "Social Studies", question: "Pearl Harbor date?", options: ["Dec 7 1941", "July 4 1776", "Sept 11 2001", "Nov 11 1918"], answer: "Dec 7 1941", hint: "Day of infamy." },
    { grade: "Eleventh Grade", subject: "Social Studies", question: "Brown v Board?", options: ["Ended segregation", "Ended slavery", "Abortion", "Guns"], answer: "Ended segregation", hint: "Schools." },
    { grade: "Eleventh Grade", subject: "Social Studies", question: "Cuban Missile Crisis?", options: ["JFK vs USSR", "WWI", "Civil War", "Vietnam"], answer: "JFK vs USSR", hint: "Nuclear brink." },
    { grade: "Eleventh Grade", subject: "Social Studies", question: "Watergate Scandal?", options: ["Nixon", "Clinton", "Bush", "Reagan"], answer: "Nixon", hint: "Resignation." },
    { grade: "Eleventh Grade", subject: "Math", question: "Log base 10 of 1000?", options: ["3", "2", "10", "100"], answer: "3", hint: "10x10x10." },
    { grade: "Eleventh Grade", subject: "Social Studies", question: "Stock Market Crash year?", options: ["1929", "1900", "2000", "1865"], answer: "1929", hint: "Depression." },
    { grade: "Eleventh Grade", subject: "Science", question: "Speed of Light symbol?", options: ["c", "v", "s", "l"], answer: "c", hint: "E=mc2." },
    { grade: "Eleventh Grade", subject: "Math", question: "Rad of 180 deg?", options: ["π", "2π", "π/2", "0"], answer: "π", hint: "Half circle." },
    { grade: "Eleventh Grade", subject: "Math", question: "log(xy) = ?", options: ["log(x)+log(y)", "log(x)-log(y)", "xlog(y)", "y"], answer: "log(x)+log(y)", hint: "Product rule." },
    { grade: "Eleventh Grade", subject: "Language Arts", question: "Great Gatsby narrator?", options: ["Nick", "Gatsby", "Daisy", "Tom"], answer: "Nick", hint: "Neighbor." },
    { grade: "Eleventh Grade", subject: "Language Arts", question: "Scarlet Letter symbol?", options: ["A", "B", "C", "D"], answer: "A", hint: "Adultery." },
    { grade: "Eleventh Grade", subject: "Science", question: "Newton (Unit) measures?", options: ["Force", "Mass", "Energy", "Time"], answer: "Force", hint: "N." },
    { grade: "Eleventh Grade", subject: "Science", question: "Refraction is?", options: ["Bending of light", "Bouncing", "Stopping", "Absorbing"], answer: "Bending of light", hint: "Lens." },
    { grade: "Eleventh Grade", subject: "Social Studies", question: "NATO purpose?", options: ["Defense Alliance", "Trade", "War", "Science"], answer: "Defense Alliance", hint: "North Atlantic." },
    { grade: "Eleventh Grade", subject: "Social Studies", question: "Vietnam War era?", options: ["1960s-70s", "1940s", "1990s", "1800s"], answer: "1960s-70s", hint: "Protests." },

    // ==================== 12TH GRADE ====================
    // Existing
    { grade: "Twelfth Grade", subject: "Math", question: "Derivative of x²?", options: ["x", "2x", "x²", "1"], answer: "2x", hint: "Power rule." },
    { grade: "Twelfth Grade", subject: "Math", question: "Mode in stats?", options: ["Average", "Middle value", "Most frequent", "Range"], answer: "Most frequent", hint: "Appears the most." },
    { grade: "Twelfth Grade", subject: "Math", question: "Integral of 2x dx?", options: ["x² + C", "2x²", "2", "x"], answer: "x² + C", hint: "Reverse power rule." },
    { grade: "Twelfth Grade", subject: "Math", question: "Limit as x→∞ of 1/x?", options: ["0", "1", "Infinity", "Undefined"], answer: "0", hint: "Gets smaller and smaller." },
    { grade: "Twelfth Grade", subject: "Math", question: "Derivative of sin(x)?", options: ["cos(x)", "-sin(x)", "tan(x)", "0"], answer: "cos(x)", hint: "Trig derivative." },
    { grade: "Twelfth Grade", subject: "Math", question: "Slope of tangent line is?", options: ["Derivative", "Integral", "Limit", "Area"], answer: "Derivative", hint: "Rate of change." },
    { grade: "Twelfth Grade", subject: "Language Arts", question: "Author of 'Hamlet'?", options: ["Chaucer", "Shakespeare", "Milton", "Austen"], answer: "Shakespeare", hint: "To be or not to be." },
    { grade: "Twelfth Grade", subject: "Language Arts", question: "What is a dystopia?", options: ["A perfect world", "A nightmare society", "A dream", "A comedy"], answer: "A nightmare society", hint: "Like '1984'." },
    { grade: "Twelfth Grade", subject: "Language Arts", question: "Author of '1984'?", options: ["Huxley", "Orwell", "Bradbury", "Golding"], answer: "Orwell", hint: "Big Brother." },
    { grade: "Twelfth Grade", subject: "Language Arts", question: "Satire uses?", options: ["Humor to criticize", "Sadness", "Facts", "Compliments"], answer: "Humor to criticize", hint: "Mockery." },
    { grade: "Twelfth Grade", subject: "Language Arts", question: "Iambic pentameter?", options: ["10 syllables/line", "Rhyme scheme", "Story structure", "Novel"], answer: "10 syllables/line", hint: "Shakespeare's rhythm." },
    { grade: "Twelfth Grade", subject: "Science", question: "Primary driver of climate change?", options: ["Oxygen", "Carbon Dioxide", "Nitrogen", "Argon"], answer: "Carbon Dioxide", hint: "Greenhouse gas." },
    { grade: "Twelfth Grade", subject: "Science", question: "Speed of light?", options: ["300 m/s", "3 x 10⁸ m/s", "Sound speed", "Infinite"], answer: "3 x 10⁸ m/s", hint: "c." },
    { grade: "Twelfth Grade", subject: "Science", question: "Entropy is a measure of?", options: ["Energy", "Disorder", "Heat", "Force"], answer: "Disorder", hint: "Chaos." },
    { grade: "Twelfth Grade", subject: "Science", question: "Catalyst does what?", options: ["Speeds up reaction", "Slows it down", "Stops it", "Explodes"], answer: "Speeds up reaction", hint: "Enzymes." },
    { grade: "Twelfth Grade", subject: "Science", question: "Heisenberg Principle?", options: ["Uncertainty", "Certainty", "Gravity", "Relativity"], answer: "Uncertainty", hint: "Position and momentum." },
    { grade: "Twelfth Grade", subject: "Social Studies", question: "Justices on Supreme Court?", options: ["7", "9", "12", "50"], answer: "9", hint: "Odd number." },
    { grade: "Twelfth Grade", subject: "Social Studies", question: "Supply exceeds demand?", options: ["Prices go up", "Prices go down", "Shortage", "Inflation"], answer: "Prices go down", hint: "Surplus." },
    { grade: "Twelfth Grade", subject: "Social Studies", question: "What is 'GDP'?", options: ["Gross Domestic Product", "General Daily Price", "Govt Debt Plan", "Global Dollar Power"], answer: "Gross Domestic Product", hint: "Total value of goods." },
    { grade: "Twelfth Grade", subject: "Social Studies", question: "Checks and balances?", options: ["Banking", "Limits on power", "Voting", "Taxes"], answer: "Limits on power", hint: "Prevents tyranny." },
    { grade: "Twelfth Grade", subject: "Social Studies", question: "Filibuster is?", options: ["Delaying a vote", "Signing a law", "Vetoing", "Voting"], answer: "Delaying a vote", hint: "Talking endlessly." },
    // New
    { grade: "Twelfth Grade", subject: "Math", question: "Chain rule used for?", options: ["Composite functions", "Adding", "Multiplying", "Dividing"], answer: "Composite functions", hint: "f(g(x))." },
    { grade: "Twelfth Grade", subject: "Math", question: "Area under curve?", options: ["Integral", "Derivative", "Slope", "Limit"], answer: "Integral", hint: "Summation." },
    { grade: "Twelfth Grade", subject: "Math", question: "Standard Deviation measures?", options: ["Spread/Variance", "Mean", "Total", "Mode"], answer: "Spread/Variance", hint: "Bell curve." },
    { grade: "Twelfth Grade", subject: "Math", question: "Matrix Identity?", options: ["Diagonals are 1", "All 0", "All 1", "Random"], answer: "Diagonals are 1", hint: "Like multiplying by 1." },
    { grade: "Twelfth Grade", subject: "Math", question: "e is approx?", options: ["2.718", "3.14", "1.618", "1.414"], answer: "2.718", hint: "Euler's number." },
    { grade: "Twelfth Grade", subject: "Language Arts", question: "Existentialism?", options: ["Existence precedes essence", "God rules", "Science is all", "Nature"], answer: "Existence precedes essence", hint: "Creating meaning." },
    { grade: "Twelfth Grade", subject: "Language Arts", question: "Magical Realism?", options: ["Magic in real world", "Fantasy", "Sci-Fi", "History"], answer: "Magic in real world", hint: "Marquez." },
    { grade: "Twelfth Grade", subject: "Language Arts", question: "Oedipus Complex?", options: ["Freud concept", "Play structure", "Poem", "Myth"], answer: "Freud concept", hint: "Mother/Son." },
    { grade: "Twelfth Grade", subject: "Language Arts", question: "Deus Ex Machina?", options: ["God from machine", "Bad ending", "Hero dies", "Villain wins"], answer: "God from machine", hint: "Sudden fix." },
    { grade: "Twelfth Grade", subject: "Language Arts", question: "Juxtaposition?", options: ["Contrast", "Same", "Rhyme", "Rhythm"], answer: "Contrast", hint: "Side by side." },
    { grade: "Twelfth Grade", subject: "Science", question: "Relativity Theory?", options: ["Einstein", "Newton", "Darwin", "Bohr"], answer: "Einstein", hint: "E=mc²." },
    { grade: "Twelfth Grade", subject: "Science", question: "Quantum Mechanics?", options: ["Subatomic particles", "Planets", "Cells", "Rocks"], answer: "Subatomic particles", hint: "Very small." },
    { grade: "Twelfth Grade", subject: "Science", question: "Thermodynamics 2nd Law?", options: ["Entropy increases", "Energy conserved", "Absolute zero", "None"], answer: "Entropy increases", hint: "Disorder." },
    { grade: "Twelfth Grade", subject: "Science", question: "Dark Matter is?", options: ["Invisible mass", "Black holes", "Coal", "Night"], answer: "Invisible mass", hint: "Gravity effect." },
    { grade: "Twelfth Grade", subject: "Science", question: "Supernova is?", options: ["Exploding star", "New planet", "Comet", "Black hole"], answer: "Exploding star", hint: "End of life." },
    { grade: "Twelfth Grade", subject: "Social Studies", question: "Opportunity Cost?", options: ["Value of next best choice", "Price", "Tax", "Debt"], answer: "Value of next best choice", hint: "Trade-off." },
    { grade: "Twelfth Grade", subject: "Social Studies", question: "Inflation is?", options: ["Rising prices", "Falling prices", "More jobs", "Less money"], answer: "Rising prices", hint: "Dollar buys less." },
    { grade: "Twelfth Grade", subject: "Math", question: "Derivative of constant?", options: ["0", "1", "Undefined", "Infinity"], answer: "0", hint: "No change." },
    { grade: "Twelfth Grade", subject: "Language Arts", question: "1984 Author?", options: ["Orwell", "Huxley", "Bradbury", "Twain"], answer: "Orwell", hint: "George." },
    { grade: "Twelfth Grade", subject: "Science", question: "Entropy?", options: ["Disorder", "Order", "Energy", "Heat"], answer: "Disorder", hint: "Mess." },
    { grade: "Twelfth Grade", subject: "Math", question: "Limit sinx/x -> 0?", options: ["1", "0", "infinity", "undefined"], answer: "1", hint: "Special limit." },
    { grade: "Twelfth Grade", subject: "Math", question: "d/dx e^x?", options: ["e^x", "xe^x-1", "lnx", "1"], answer: "e^x", hint: "Itself." },
    { grade: "Twelfth Grade", subject: "Language Arts", question: "Beowulf is?", options: ["Epic Poem", "Novel", "Song", "Play"], answer: "Epic Poem", hint: "Old English." },
    { grade: "Twelfth Grade", subject: "Language Arts", question: "Canterbury Tales author?", options: ["Chaucer", "Shakespeare", "Milton", "Homer"], answer: "Chaucer", hint: "Pilgrims." },
    { grade: "Twelfth Grade", subject: "Science", question: "Big Bang Theory?", options: ["Origin of Universe", "Black Hole", "Star Death", "Planet"], answer: "Origin of Universe", hint: "Expansion." },
    { grade: "Twelfth Grade", subject: "Science", question: "Half-life?", options: ["Decay time", "Life length", "Game", "Biology"], answer: "Decay time", hint: "Radioactive." },
    { grade: "Twelfth Grade", subject: "Social Studies", question: "Fiscal Policy?", options: ["Taxing/Spending", "Money Supply", "War", "Laws"], answer: "Taxing/Spending", hint: "Budget." },
    { grade: "Twelfth Grade", subject: "Social Studies", question: "Monetary Policy?", options: ["Interest Rates/Money", "Taxes", "Laws", "Trade"], answer: "Interest Rates/Money", hint: "Fed." },
];

/**
 * Initializes the quiz based on grade and subject filters
 * @param {string} gradeName - The grade level (e.g., 'Third Grade')
 * @param {string} subjectFilter - The subject (e.g., 'Math', 'All')
 */
function loadQuestions(gradeName, subjectFilter = 'All') {
    // Reset State
    currentQuestionIndex = 0;
    score = 0;
    userAnswers = [];

    // Normalize inputs
    const gName = gradeName.trim();

    // Filter logic
    currentQuestions = questionBank.filter(q => {
        const gradeMatch = q.grade === gName;
        const subjectMatch = subjectFilter === 'All' || q.subject === subjectFilter;
        return gradeMatch && subjectMatch;
    });

    // Shuffle questions for variety
    currentQuestions.sort(() => Math.random() - 0.5);

    // Initial UI Update
    updateProgressBar(0);
    document.getElementById('question-count').innerHTML = `1<span class="text-xl text-gray-400 font-medium">/${currentQuestions.length}</span>`;

    // Reset Feedback UI via inline observer triggers
    const feedbackEl = document.getElementById('feedback');
    if (feedbackEl) feedbackEl.textContent = "";

    document.getElementById('next-btn').classList.add('hidden');
    document.getElementById('hintText').classList.add('hidden');

    // Load first question
    if (currentQuestions.length > 0) {
        loadCurrentQuestion();
    } else {
        document.getElementById('question').textContent = "No questions found for this category yet!";
        document.getElementById('options').innerHTML = "";
    }
}

/**
 * Renders the current question and options to the DOM
 */
function loadCurrentQuestion() {
    if (currentQuestionIndex >= currentQuestions.length) {
        finishQuiz();
        return;
    }

    const q = currentQuestions[currentQuestionIndex];

    // Update Question Text
    document.getElementById('question').textContent = q.question;

    // Update Counter
    document.getElementById('question-count').innerHTML = `${currentQuestionIndex + 1}<span class="text-xl text-gray-400 font-medium">/${currentQuestions.length}</span>`;

    // Setup Hint
    document.getElementById('hint-content').textContent = q.hint;
    document.getElementById('hintText').classList.add('hidden');

    // Reset Feedback/Next Button
    document.getElementById('feedback').textContent = "";
    document.getElementById('next-btn').classList.add('hidden');
    document.getElementById('next-btn').disabled = true;

    // Render Options
    const optionsContainer = document.getElementById('options');
    optionsContainer.innerHTML = ''; // Clear old options

    // Create buttons for each option
    q.options.forEach(opt => {
        const btn = document.createElement('button');
        btn.className = "w-full text-left p-4 rounded-xl border-2 border-gray-200 dark:border-gray-700 hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all font-medium text-lg text-gray-700 dark:text-gray-200 shadow-sm hover:shadow-md active:scale-[0.98]";
        btn.textContent = opt;
        btn.onclick = () => checkAnswer(opt, q.answer, btn);
        optionsContainer.appendChild(btn);
    });
}

/**
 * Validates the user's selection
 * @param {string} selected - The option text clicked
 * @param {string} correct - The correct answer text
 * @param {HTMLElement} btnElement - The button element clicked
 */
function checkAnswer(selected, correct, btnElement) {
    const isCorrect = selected === correct;
    const optionsContainer = document.getElementById('options');
    const buttons = optionsContainer.getElementsByTagName('button');

    // Disable all buttons to prevent double answers
    for (let btn of buttons) {
        btn.disabled = true;
        btn.classList.add('opacity-70', 'cursor-not-allowed');
        if (btn.textContent === correct) {
            // Highlight correct answer Green
            btn.classList.remove('border-gray-200', 'hover:border-blue-500');
            btn.classList.add('bg-green-100', 'border-green-500', 'text-green-800', 'dark:bg-green-900', 'dark:text-green-200');
        }
    }

    if (isCorrect) {
        score++;
        streak++;
        updateStreak(streak);
        document.getElementById('feedback').textContent = "Correct! Great job."; // Trigger mutation observer
    } else {
        streak = 0;
        updateStreak(streak);
        document.getElementById('feedback').textContent = `Incorrect. The answer was ${correct}.`; // Trigger mutation observer

        // Highlight chosen wrong answer Red
        btnElement.classList.add('bg-red-100', 'border-red-500', 'text-red-800', 'dark:bg-red-900', 'dark:text-red-200');
    }

    // Update Progress
    currentQuestionIndex++;
    updateProgressBar((score / currentQuestions.length) * 100);

    // Show Next Button
    const nextBtn = document.getElementById('next-btn');
    nextBtn.classList.remove('hidden');
    nextBtn.disabled = false;

    // Focus next button for accessibility
    nextBtn.focus();
}

/**
 * Reveals the hint
 */
function showHint() {
    const hintBox = document.getElementById('hintText');
    hintBox.classList.remove('hidden');
    hintBox.classList.add('animate-pulse');
    setTimeout(() => hintBox.classList.remove('animate-pulse'), 1000);
}

/**
 * Updates the visual progress bar
 */
function updateProgressBar(percent) {
    const bar = document.querySelector('.progress-bar-animated');
    const text = document.querySelector('.progress-bar-text');
    if (bar && text) {
        bar.style.width = `${percent}%`;
        text.textContent = `${Math.round(percent)}%`;
    }
}

/**
 * Updates the streak counter UI
 */
function updateStreak(count) {
    const streakEl = document.getElementById('streak-counter');
    if (count > 1) {
        streakEl.classList.remove('hidden');
        streakEl.textContent = `🔥 ${count} Streak!`;
    } else {
        streakEl.classList.add('hidden');
    }
}

/**
 * Handles End of Game State
 */
function finishQuiz() {
    const container = document.getElementById('options');
    document.getElementById('question').textContent = "Assessment Complete!";
    document.getElementById('question-count').classList.add('hidden');
    document.getElementById('next-btn').classList.add('hidden');

    const finalScore = Math.round((score / currentQuestions.length) * 100);

    let message = "";
    let icon = "";

    if (finalScore === 100) { message = "Perfect Score! You're a superstar!"; icon = "🏆"; }
    else if (finalScore >= 80) { message = "Great job! You know your stuff."; icon = "🌟"; }
    else if (finalScore >= 50) { message = "Good effort! Keep practicing."; icon = "📚"; }
    else { message = "Keep trying! Practice makes perfect."; icon = "💪"; }

    container.innerHTML = `
        <div class="text-center p-8 bg-blue-50 dark:bg-gray-700 rounded-xl">
            <div class="text-6xl mb-4">${icon}</div>
            <h3 class="text-2xl font-bold mb-2">You scored ${finalScore}%</h3>
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">${message}</p>
            <button onclick="location.reload()" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-700 transition">
                Try Again
            </button>
        </div>
    `;
}