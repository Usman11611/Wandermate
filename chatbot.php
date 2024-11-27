<?php
header("Content-Type: application/json");

// Retrieve and decode user input
$request = json_decode(file_get_contents("php://input"), true);

if (isset($request['userInput'])) {
    $userInput = strtolower(trim($request['userInput']));
    $response = "I'm sorry, I didn't quite understand that. Can you try rephrasing?";

    // Define keywords and responses
    $responses = [
        // Greetings and Small Talk
        "hi" => "Hello! Welcome to Wandermate. How can I assist you today?",
        "hello" => "Hi there! What can I do for you?",
        "hey" => "Hey! How can I help with your travel plans?",
        "good morning" => "Good morning! Ready to start planning your next adventure?",
        "good evening" => "Good evening! How can I make your travel easier?",
        "how are you" => "I'm just a chatbot, but I'm here to make your travel planning easier!",
        "who are you" => "I'm Wanderbot, your travel assistant here to help with all your Wandermate needs!",
        "how's it going" => "All good here! How can I assist you today?",
        "good afternoon" => "Good afternoon! Planning something exciting?",
        "what's up" => "Not much, just here to assist you with your travel needs!",
        "are you a bot" => "Yes, I’m Wanderbot, here to make your travel planning seamless.",
        "what can you do" => "I can help with travel plans, accommodations, destinations, and more.",
        "who built you" => "I was created by the Wandermate team to be your travel assistant.",
        "how are you doing" => "I’m great, thank you! How can I help with your travels?",
        "do you know me" => "I don't, but I'm here to make your travel experience unforgettable!",

        // Planning-related
        "plan" => "To create a personalized travel plan, visit our <a href='plan.php'>Make a Plan</a> page.",
        "how do i plan" => "Planning is simple! Start by visiting our <a href='plan.php'>Make a Plan</a> page.",
        "travel plan" => "Our <a href='plan.php'>Make a Plan</a> feature lets you build a detailed travel itinerary.",
        "customize" => "You can customize your travel plans to match your preferences on the <a href='plan.php'>Make a Plan</a> page.",
        "edit plan" => "Editing your plan is easy! Go to the <a href='plan.php'>Make a Plan</a> page and select 'Edit Plan.'",
        "save plan" => "Your plans are automatically saved to your account. You can also download them as a PDF for offline use.",

        // Accommodations
        "accommodation" => "Looking for a place to stay? Check out our <a href='accommodations.php'>Find Accommodations</a> page.",
        "hotel" => "Find the best hotels and stays at <a href='accommodations.php'>Find Accommodations</a>.",
        "where to stay" => "We can help you find the perfect place to stay on our <a href='accommodations.php'>Find Accommodations</a> page.",
        "budget accommodation" => "Use the filters on our <a href='accommodations.php'>Find Accommodations</a> page to find affordable options.",
        "luxury hotels" => "We have a range of luxury stays listed on our <a href='accommodations.php'>Find Accommodations</a> page.",

        // Destinations
        "destinations" => "Discover popular travel spots on our <a href='destinations.php'>Destinations</a> page.",
        "where to go" => "Need travel inspiration? Check out the <a href='destinations.php'>Destinations</a> page.",
        "popular destinations" => "We have a list of the most popular travel destinations on our <a href='destinations.php'>Destinations</a> page.",
        "explore" => "Explore amazing locations on our <a href='destinations.php'>Destinations</a> page.",
        "family destinations" => "Looking for family-friendly locations? Explore options on the <a href='destinations.php'>Destinations</a> page.",
        "adventure trips" => "Check out our adventure travel recommendations on the <a href='destinations.php'>Destinations</a> page.",
        "europe itinerary" => "Plan multi-country trips in Europe using our Travel Planner.",
        "best places in asia" => "Check out Thailand, Japan, and India on our Destinations page.",

        // Tips and Help
        "tips" => "Visit our <a href='help.php'>Help Center</a> for travel tips and tricks.",
        "help" => "You can find detailed guides and FAQs on our <a href='help.php'>Help Center</a>.",
        "how to use wandermate" => "Check out our <a href='help.php'>Help Center</a> for instructions on using Wandermate effectively.",
        "travel safety" => "For safety tips, check the travel advice section on the <a href='help.php'>Help Center</a> page.",
        "packing tips" => "Check out our packing advice in the <a href='help.php'>Help Center</a>.",
        "budget travel tips" => "Learn how to save on your next trip in our <a href='help.php'>Help Center</a>.",
        "what should I pack" => "It depends on the destination. We recommend essentials like clothing, toiletries, and documents.",
        "packing list" => "Check out our detailed packing guide in the Help Center.",
        "essentials for a trip" => "Don't forget your passport, charger, and any medications you need!",

        // Features
        "weather" => "You can track weather conditions for your destination on the homepage dashboard.",
        "share plan" => "Use the 'Share Plan' feature on the <a href='plan.php'>Make a Plan</a> page to collaborate with friends.",
        "eco-friendly" => "Look for green travel badges to find sustainable options on our <a href='destinations.php'>Destinations</a> and <a href='accommodations.php'>Find Accommodations</a> pages.",
        "real-time updates" => "Enable notifications to receive updates on your travel plans and weather conditions.",
        "download plan" => "You can download your travel plans as a PDF for easy sharing or offline use.",

        // Account and Login
        "register" => "New here? Create an account on our <a href='register.php'>Register</a> page.",
        "login" => "Already have an account? Log in at our <a href='login.php'>Login</a> page.",
        "forgot password" => "Reset your password using the 'Forgot Password' option on the <a href='login.php'>Login</a> page.",
        "my account" => "Access your profile and settings on the <a href='profile.php'>My Account</a> page.",

        // Contact Support
        "contact" => "You can reach us through the <a href='contact.php'>Contact Us</a> page.",
        "support" => "Need help? Contact our team on the <a href='contact.php'>Contact Us</a> page.",
        "feedback" => "We value your feedback! Share your thoughts on the <a href='contact.php'>Contact Us</a> page.",
        "complaint" => "Have an issue? Please reach out to our support team on the <a href='contact.php'>Contact Us</a> page.",

        // Fun and Miscellaneous
        "what’s your favorite destination" => "I love all destinations equally!",
        "can you travel" => "I wish I could! But I’m here to help you plan your journeys.",
        "tell me a travel fact" => "Did you know? Traveling can boost your creativity and happiness.",
        "travel joke" => "Why did the plane get grounded? It had too much baggage!",
        "you’re amazing" => "Thank you! You're amazing too!",
        "are you real" => "I’m as real as your next adventure!",
        
        // New Features
        "help with planning" => "I can help you find the best destinations, accommodations, and travel plans on our <a href='plan.php'>Make a Plan</a> page.",
        "travel advice" => "Check out the travel advice section on our <a href='help.php'>Help Center</a> for some expert tips.",
        "want to travel to europe" => "Check out our <a href='destinations.php'>Destinations</a> page for top spots in Europe!",
        "how do I save on travel" => "Look for budget-friendly destinations and affordable accommodations on our <a href='accommodations.php'>Find Accommodations</a> page.",
        "solo travel" => "Looking for solo travel tips? Check out our solo travel guide on the <a href='help.php'>Help Center</a>.",
        "is there a chatbot" => "Yes, I'm your chatbot assistant here to help with all your travel needs. Just ask away!",
        "book a trip" => "I can help you get started with booking your trip! Head over to the <a href='plan.php'>Make a Plan</a> page to begin.",
        "can you help me book a flight" => "While I can't book a flight, I can guide you to the best options on our <a href='accommodations.php'>Find Accommodations</a> page.",
        "what's the weather today" => "Check the weather for your destination on the homepage dashboard.",

        // New Travel Information
        "best time to visit" => "The best time to visit a destination depends on the weather and your preferences. Do you have a specific place in mind?",
        "how to get a visa" => "Visa requirements vary by country. Check our <a href='visa.php'>Visa Guide</a> for more information on your destination.",
        "how much does a trip cost" => "The cost of a trip varies greatly depending on your destination, accommodations, and activities. Do you have a destination in mind?",
        "travel insurance" => "Travel insurance is a good idea for covering emergencies. You can get more information from our <a href='insurance.php'>Travel Insurance</a> page.",
        "best budget destinations" => "For budget-friendly options, check out Southeast Asia, Central America, and parts of Eastern Europe. Visit our <a href='destinations.php'>Destinations</a> page for more details.",
        "is it safe to travel to" => "Safety is a top concern. Check the latest travel advisories on our <a href='safety.php'>Safety Tips</a> page.",
        
        // New Travel Features
        "join group trip" => "Interested in group travel? We offer group trips that can be found on the <a href='group-travel.php'>Group Travel</a> page.",
        "how to book a hotel" => "You can easily book a hotel on our <a href='accommodations.php'>Find Accommodations</a> page, where you can filter by price, location, and amenities.",
        "plan a last-minute trip" => "For last-minute trips, check out our <a href='last-minute.php'>Last Minute Deals</a> page for discounts and availability.",
        "best all-inclusive resorts" => "All-inclusive resorts are a great way to relax. Check our list of the best options on the <a href='resorts.php'>All-Inclusive Resorts</a> page.",
        "solo travel guide" => "For tips on solo travel, visit our <a href='solo-travel.php'>Solo Travel Guide</a> to ensure a safe and memorable journey.",
        
        // Travel Tips and Advice
        "how to avoid jet lag" => "Jet lag can be tough. Here are some tips: stay hydrated, adjust to your destination's time zone, and get some sunlight. Learn more in our <a href='jetlag.php'>Jet Lag Tips</a>.",
        "how to stay healthy while traveling" => "Staying healthy while traveling is important! Make sure to eat well, exercise, and get enough sleep. For more tips, visit our <a href='health.php'>Travel Health</a> page.",
        "what to do if I lose my passport" => "Losing your passport can be stressful. Visit your embassy immediately to report the loss. Check out our <a href='passport.php'>Lost Passport Guide</a> for more details.",
        "how to deal with culture shock" => "Culture shock is common when traveling to a new place. Learn to embrace the differences, stay patient, and give yourself time to adjust. For more advice, visit our <a href='culture-shock.php'>Culture Shock Tips</a> page.",
        "how to stay connected abroad" => "Staying connected abroad is easy with global SIM cards or portable WiFi hotspots. Check out options on our <a href='connectivity.php'>Connectivity Guide</a>.",
        
        // Miscellaneous Fun and Entertainment
        "what's a hidden gem destination" => "A hidden gem is a destination not well-known but offers a unique experience. Check out our list of hidden gems on the <a href='hidden-gems.php'>Hidden Gems</a> page.",
        "what's a good travel book" => "If you're into reading, we recommend 'The Geography of Bliss' by Eric Weiner for an inspiring travel read. Check out our <a href='books.php'>Travel Books</a> page for more recommendations.",
        "travel photography tips" => "For the best travel photos, make sure to capture moments, not just sights. Use natural lighting and experiment with angles. For more tips, visit our <a href='photography.php'>Photography Tips</a> page.",
        "how to pack light" => "Packing light makes your travels much easier! Focus on versatile clothing and travel-sized toiletries. Learn more on our <a href='packing.php'>Packing Tips</a> page.",
        "what are the best travel apps" => "Some of the best travel apps include Google Maps, Skyscanner, and TripIt for organizing your trips. Check out our list of recommended apps on the <a href='apps.php'>Travel Apps</a> page.",
        
        // Flight-related Queries
        "how to get cheap flights" => "To get cheap flights, be flexible with your travel dates, use comparison tools, and book in advance. Find more tips on our <a href='flights.php'>Cheap Flights</a> page.",
        "what’s the best time to book a flight" => "The best time to book a flight is usually 6-8 weeks before your departure. Check out our <a href='flights.php'>Flights Guide</a> for more details.",
        "how to choose the best seat on a plane" => "To get the best seat, choose early check-in, or use apps that allow you to select your seat in advance. Learn more about seat selection on our <a href='flights.php'>Flight Seats</a> page.",
        
        // Special Travel Queries
        "how to volunteer abroad" => "Volunteering abroad is a great way to give back while exploring. Check our <a href='volunteer.php'>Volunteer Abroad</a> page for opportunities.",
        "what's the best way to travel sustainably" => "Sustainable travel includes using eco-friendly transportation, supporting local businesses, and reducing waste. Learn more on our <a href='sustainable.php'>Sustainable Travel</a> page.",
        "can I rent a car" => "Yes, renting a car is easy! Visit our <a href='car-rentals.php'>Car Rentals</a> page to book a vehicle for your trip.",
        "how do I get around in a foreign city" => "Public transportation, walking, and ride-sharing apps are great options for getting around. Check out our <a href='transportation.php'>Getting Around</a> guide for more details.",
        "how to travel during the holidays" => "Holiday travel can be tricky, but planning ahead and booking early can help. Check out our <a href='holiday-travel.php'>Holiday Travel Tips</a> page.",
        
        // Miscellaneous Commands
        "what's the meaning of wanderlust" => "Wanderlust means a strong desire to travel and explore the world. It’s a perfect term for travel enthusiasts!",
        "tell me a joke" => "Why don’t skeletons fight each other? They don’t have the guts!",
        "what’s your favorite travel destination" => "I love all destinations equally, but I’d say Bali is always a good idea!",
        "what's the best travel quote" => "One of my favorite travel quotes is: 'The world is a book and those who do not travel read only one page.' - Saint Augustine",

        // Travel Information and Tips
        "how to get a tourist visa" => "Tourist visa requirements vary by country. Visit the <a href='visa.php'>Visa Guide</a> page for more information on how to apply.",
        "how do I get a travel permit" => "A travel permit is required for specific regions or activities. Check with local authorities or visit our <a href='permit.php'>Travel Permits</a> page for detailed information.",
        "what are the top travel hacks" => "Top travel hacks include packing light, using travel credit cards for rewards, and booking flights during off-peak times. Visit our <a href='hacks.php'>Travel Hacks</a> page for more tips.",
        "how do I travel with a pet" => "Traveling with pets requires planning. Make sure to check the airline’s pet policies and find pet-friendly accommodations on our <a href='pets.php'>Traveling with Pets</a> page.",
        "what is the cost of a visa" => "Visa costs depend on the country you’re visiting. Visit our <a href='visa.php'>Visa Guide</a> for specific cost information based on your destination.",
        "travel vaccination requirements" => "Vaccination requirements vary by country. Visit the <a href='vaccinations.php'>Vaccination Guide</a> to learn more about which vaccinations you may need.",
        "how to travel with children" => "When traveling with children, pack extra snacks, entertainment, and make sure you’re familiar with child-friendly travel options. Check our <a href='children.php'>Traveling with Children</a> guide for more tips.",

        // Fun Facts and Entertainment
        "tell me a fun fact" => "Did you know? Paris is the most visited city in the world!",
        "can you recommend a movie for travel lovers" => "Sure! I recommend 'The Secret Life of Walter Mitty,' a movie that beautifully captures the spirit of adventure and exploration.",
        "what are the best travel podcasts" => "Some of the best travel podcasts include 'The Travel Diaries,' 'Zero To Travel,' and 'The Nomadic Matt Podcast.' Check out our <a href='podcasts.php'>Travel Podcasts</a> page for more recommendations.",
        "give me a travel quote" => "Here's a great travel quote: 'Not all those who wander are lost.' - J.R.R. Tolkien.",
        "tell me a funny travel story" => "Sure! A guy once booked a flight to the wrong city, but he decided to make the best of it and turned it into an impromptu adventure across two countries!",
        "what are the best travel documentaries" => "Some must-watch documentaries include 'Anthony Bourdain: Parts Unknown,' 'Our Planet,' and 'Long Way Down.' Check out our <a href='docs.php'>Travel Documentaries</a> page for more ideas.",
        "do you know any good travel apps" => "Yes! I recommend Google Maps, TripIt, and Skyscanner for booking flights and managing your itinerary. Explore more in our <a href='apps.php'>Travel Apps</a> section.",

        // Travel Services and Features
        "how can I find eco-friendly travel options" => "We provide a range of sustainable travel options. Look for green travel badges on our <a href='destinations.php'>Destinations</a> and <a href='accommodations.php'>Accommodations</a> pages for eco-friendly choices.",
        "how do I get a last-minute deal" => "Last-minute deals can be found on our <a href='last-minute.php'>Last Minute Deals</a> page. Stay flexible with your travel dates to get the best prices!",
        "how do I book a guided tour" => "Check out our <a href='tours.php'>Guided Tours</a> page to book tours to popular destinations.",
        "can I share my travel plans with others" => "Yes, you can easily share your travel plans with friends and family by clicking the 'Share Plan' button on the <a href='plan.php'>Make a Plan</a> page.",
        "how do I save my itinerary" => "Your itinerary is automatically saved, but you can also download it as a PDF from the <a href='plan.php'>Make a Plan</a> page for offline access.",
        "can I find volunteer opportunities abroad" => "Yes! Visit our <a href='volunteer.php'>Volunteer Abroad</a> page to find various volunteer programs around the world.",
        "can I book group trips" => "Yes, you can book group trips. Check out our <a href='group-travel.php'>Group Travel</a> section for more information.",
        "how do I get travel insurance" => "Travel insurance is essential for most trips. We partner with several insurance providers; visit our <a href='insurance.php'>Travel Insurance</a> page to find the best options.",
        "how do I get a discount on flights" => "Use our travel search tools like Skyscanner and be flexible with dates to get the best deals. Find more tips on our <a href='flights.php'>Cheap Flights</a> page.",
        
        // Flight and Accommodation Queries
        "how do I book a flight" => "Booking a flight is easy! Use our flight search engine on the <a href='flights.php'>Flights</a> page to find the best options.",
        "what are the best airlines for international travel" => "Top international airlines include Emirates, Qatar Airways, and Singapore Airlines. For more, check out our <a href='flights.php'>Flight Guide</a> page.",
        "what’s the best way to get around in europe" => "In Europe, trains are a convenient and scenic way to travel. Check out Eurail passes for discounts on train travel. Visit our <a href='transportation.php'>Getting Around</a> page for more info.",
        "how to rent a car abroad" => "Renting a car abroad is simple. Check our <a href='car-rentals.php'>Car Rentals</a> page for options and advice on driving abroad.",
        "can I find pet-friendly hotels" => "Yes! Use the pet-friendly filter on our <a href='accommodations.php'>Accommodations</a> page to find hotels that welcome your furry friends.",
        
        // Health and Safety
        "how to stay safe while traveling" => "Stay safe by keeping your belongings secure, staying aware of your surroundings, and keeping emergency numbers handy. Check our <a href='safety.php'>Safety Tips</a> page for more detailed advice.",
        "what are the best health precautions for international travel" => "Make sure you're vaccinated, carry a travel first-aid kit, and research medical facilities in your destination. For more information, visit our <a href='health.php'>Health Tips</a> page.",
        "how do I deal with travel anxiety" => "Travel anxiety is common. Stay organized, keep an open mind, and don't hesitate to take breaks when needed. Check out our <a href='anxiety.php'>Travel Anxiety</a> page for more tips.",
        
        // Miscellaneous Fun and Personality
        "what’s your favorite country" => "I love all countries equally! Each place has its own unique charm. Tell me your favorite destination!",
        "what are your hobbies" => "I love learning about new destinations and helping travelers plan their perfect trips!",
        "tell me a travel-related joke" => "Why did the traveler bring a ladder to the airport? Because they were flying to new heights!",
        "who inspires you" => "I’m inspired by travelers who explore the world and embrace new cultures!",
        "how do you stay motivated" => "I stay motivated by helping people plan amazing adventures and making travel easy for everyone.",
        
        // Additional Support and User Interaction
        "help with my account" => "You can access your profile and settings on the <a href='profile.php'>My Account</a> page. Need help with something specific?",
        "how do I reset my password" => "If you’ve forgotten your password, use the 'Forgot Password' option on the <a href='login.php'>Login</a> page to reset it.",
        "how do I delete my account" => "To delete your account, please contact support through the <a href='contact.php'>Contact Us</a> page for assistance.",
        "how do I contact support" => "You can reach our support team anytime through the <a href='contact.php'>Contact Us</a> page.",
        "can I change my travel plan" => "Yes, you can easily edit your travel plan on the <a href='plan.php'>Make a Plan</a> page. Just select 'Edit Plan' to make changes.",
        
    ];
    

    // Match the user input to a keyword
    foreach ($responses as $keyword => $reply) {
        if (strpos($userInput, $keyword) !== false) {
            $response = $reply;
            break;
        }
    }

    // Send the response back to the frontend
    echo json_encode(["response" => $response]);
} else {
    echo json_encode(["response" => "No input received. Please try again."]);
}
?>
