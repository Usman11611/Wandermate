Wandermate
Developed by: Usman Haider
GitHub Repository: Usman11611

Overview
Wandermate is a comprehensive, web-based application designed to make travel planning easier and more efficient. It helps users manage their travel plans by providing key features such as seamless trip creation, location selection (with auto-filling dropdowns for countries, states, and cities), weather information, and user role management. With real-time weather data fetched via the OpenWeather API, dynamic user authentication, and a chatbot for user assistance, Wandermate aims to enhance the overall travel experience.

The application uses PHP for backend functionality, MySQL to store user and trip data, and dynamic JavaScript for a responsive frontend.

Key Features
1. User Authentication & Role Management
Login/Logout: Secure user authentication using PHP sessions and bcrypt for password hashing.
Roles: Differentiates between regular users and administrators, where admins have broader control over the platform.

2. Travel Plan Management
Users can create, edit, and delete travel plans, including trip names, start and end dates, budget, destination (country, state, city), and activities.

3. Weather API Integration (OpenWeather)
Provides real-time weather updates for selected cities, ensuring that users can plan their trips based on current weather forecasts.

4. Help Section & Chatbot
Includes a chatbot integration to assist users in navigating the platform and resolving common issues, such as login problems and trip planning.

5. Searchable Dropdowns (Select2)
Dynamic location selection (countries, states, cities) powered by Select2, providing an efficient search experience for users.

6. Admin Dashboard
Special access for admins to manage users, view all travel plans, and oversee activities on the platform. Admins can delete inappropriate content or suspend user accounts.

7. Responsive Design
The app is mobile-first, ensuring it works well on various devices, including smartphones, tablets, and desktops.

8. User Data Security & Privacy
User passwords are securely hashed using bcrypt, and PHP sessions ensure secure authentication. The platform complies with privacy regulations to safeguard user data.
Technology Stack

Frontend: HTML5, CSS3, JavaScript, JQuery, Select2
Backend: PHP (for server-side operations and user authentication)
Database: MySQL (for storing user and travel data)
API: OpenWeather API (for weather data integration)
Authentication: PHP sessions with bcrypt password hashing
Security: SSL/TLS encryption, password hashing

Setup Instructions:

Prerequisites
Web Server: Install XAMPP, WAMP, or any PHP-compatible server.
MySQL Database: Make sure MySQL/MariaDB is installed.
OpenWeather API Key: Sign up for an API key from OpenWeather to enable weather functionality.

Installation Steps
Clone or Download the Repository:
Clone the project repository or download it as a ZIP file.

git clone https://github.com/Usman11611/wandermate.git

Set Up the Database:
Import the provided SQL file into your MySQL database. This will set up the necessary tables for user management, payments, and travel plans.

Configure the API:
Replace YOUR_API_KEY in the JavaScript code with your actual OpenWeather API key.

Run the Application:
Start your local server and navigate to the project directory in your browser. Ensure all services (such as MySQL) are running correctly.

Conclusion
Wandermate is a scalable and robust travel management platform that leverages modern web technologies, real-time data, and secure user management to simplify the travel planning process. Whether you're a traveler organizing your next adventure or an admin overseeing the platform, Wandermate provides a comprehensive suite of features to help you along the way.

For further details, contributions, or issues, please visit the GitHub Repository.

Creator
Usman Haider – Developer and Designer

