<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Registration Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: black;
            background-color: #f4f4f4;
            overflow-y: auto;
            font-family: sans-serif;
        }

               /* Main container for the background slider */
        .main-background {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding-top: 2em;
        }

        /* Background images */
        .background-slider {
            position: absolute;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            transition: opacity 1s ease-in-out;
            z-index: -1;
        }

        /* Content inside the main section */
        .container {
            text-align: center;
            color: white;
            z-index: 2;
        }

        h1 {
            font-size: 2.5em;
            animation: glow 3s infinite alternate;
        }

        /* Button to slide images */
        .next-btn {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 1.5em;
            cursor: pointer;
            z-index: 3;
        }

        .next-btn:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        @keyframes glow {
            0% { text-shadow: 0 0 10px white; }
            100% { text-shadow: 0 0 20px cyan; }
        }
        /* Navbar fixed at the top */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 10px 20px;
            gap: 15px;
            width: 100%;
            z-index: 10;
            animation: fadeInDown 1s ease-in-out;
        }

        /* Logo on the left */
        .navbar .logo {
            margin-right: auto;
            width: 100px;
            height: auto;
        }

        /* Navbar Links */
        .navbar a {
            text-decoration: none;
            color: #fff;
            padding: 10px 15px;
            transition: background-color 0.3s, color 0.3s;
            margin-left: 15px;
        }

        .navbar a:hover {
            background-color: #fff;
            color: #000;
            border-radius: 5px;
        }
/* Sports Section */
.sports-section {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 20px;
    background-color: #f5f5f5;
    min-height: 100vh; /* Increased height to cover full viewport */
}

/* Sport Item */
.sport-item {
    display: flex;
    align-items: center;
    background-color: black;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.2s ease-in-out;
    border: 5px solid black;
    height: 300px; /* Increased height of each sport item */
}

.sport-item:hover {
    transform: scale(1.03);
}

.sport-item img {
    width: 35%;
    height: 100%; /* Ensures image fills the sport-item height */
    object-fit: cover;
}

.sport-description {
    padding: 20px;
    flex: 1;
    text-align: center;
    color: #fff;
}

.sport-description h2 {
    margin: 0 0 10px;
    font-size: 1.8em; /* Slightly larger title */
    color: #fff;
}

.sport-description p {
    font-size: 1.1em;
    color: #ddd;
    margin: 0;
}

        /* About Section */
        .about-section {
            color: white;
            padding: 50px;
            text-align: center;
            background-image: url('about.jpg');
            background-size: cover;
            background-position: center center;
            animation: fadeIn 2s ease-in-out;
        }

        .about-section h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
            animation: glow 3s infinite;
        }

        .about-section p {
            font-size: 1.5em;
            margin-bottom: 20px;
            animation: fadeIn 2s ease-in-out;
        }

        footer {
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            padding: 20px 0;
            position: relative;
            bottom: 0;
            width: 100%;
            animation: fadeIn 2s ease-in-out;
        }

        .footer-text {
            text-align: center;
            margin-bottom: 20px;
            animation: glow 3s infinite;
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            gap: 20px;
            padding: 20px;
            flex-wrap: wrap;
        }

        .footer-column {
            width: 30%;
            text-align: left;
        }

        .footer-column h3 {
            font-size: 1.8em;
            margin-bottom: 15px;
            animation: glow 3s infinite;
        }

        .footer-column ul {
            list-style-type: none;
            padding: 0;
        }

        .footer-column li {
            margin: 10px 0;
            font-size: 1.2em;
            color: #ddd;
            animation: fadeIn 2s ease-in-out;
        }

        footer a {
            color: #fff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <img src="nielogo.png" class="logo" alt="Logo">
        <a href="#about-section">About</a>
        <a href="admin_login.php">Admin</a>
        <a href="user_login.php">User</a>
        <a href="user_signup.php">sign-up</a>
    </div>
    <div class="main-background">
        <div class="background-slider" id="slider"></div>
        <div class="container">
            <h1>Welcome to the Sports Registration Dashboard</h1>
            <p>Select a category from the navigation bar to proceed.</p>
        </div>
        <button class="next-btn" onclick="nextImage()">&#10095;</button>
    </div>

    <script>
        const images = ['nie.jpg', 'football.jpg', 'nie3.jpg', 'nie4.jpg', 'nie5.jpg']; 
        let currentImageIndex = 0;
        const slider = document.getElementById('slider');

        function updateBackground() {
            slider.style.backgroundImage = `url('${images[currentImageIndex]}')`;
        }

        function nextImage() {
            currentImageIndex = (currentImageIndex + 1) % images.length;
            updateBackground();
        }

        // Initial background setup
        updateBackground();
    </script>


<!-- Sports Section -->
<div class="sports-section">
    <a href="user_login.php" class="sport-item">
        <img src="football.jpg" alt="Football">
        <div class="sport-description">
            <h2>Football</h2>
            <p>Football is a team sport played with a spherical ball between two teams of 11 players. It is the most popular sport in the world and is played in over 200 countries. 
            The game is governed by FIFA, and major tournaments include the FIFA World Cup, UEFA Champions League, and domestic leagues such as the English Premier League and La Liga. 
            It requires agility, teamwork, and strategy to control the ball and score goals.</p>
        </div>
    </a>
    
    <a href="user_login.php" class="sport-item" style="flex-direction: row-reverse;">
        <img src="Basketball.jpg" alt="Basketball">
        <div class="sport-description">
            <h2>Basketball</h2>
            <p>Basketball is a team sport in which two teams oppose one another on a rectangular court, competing to score points by shooting a ball through the opponent's hoop. 
            The game was invented by Dr. James Naismith in 1891 and has grown into a global phenomenon, with the NBA being the most prominent league. 
            It requires speed, precision, and coordination, with key skills including dribbling, passing, and shooting.</p>
        </div>
    </a>

    <a href="user_login.php" class="sport-item">
        <img src="cricket.jpg" alt="Cricket">
        <div class="sport-description">
            <h2>Cricket</h2>
            <p>Cricket is a bat-and-ball game played between two teams of eleven players on a field at the center of which is a 22-yard pitch with a wicket at each end. 
            It is a highly strategic game with various formats, including Test matches, One Day Internationals (ODIs), and Twenty20 (T20). 
            The game requires batting, bowling, and fielding skills, with international tournaments such as the ICC Cricket World Cup and T20 World Cup being widely followed.</p>
        </div>
    </a>

    <a href="user_login.php" class="sport-item" style="flex-direction: row-reverse;">
        <img src="Tennis.jpg" alt="Tennis">
        <div class="sport-description">
            <h2>Tennis</h2>
            <p>Tennis is a racket sport played individually or between two teams of two players. Players use a stringed racket to strike a hollow rubber ball over a net. 
            The game is played on different surfaces, including grass, clay, and hard courts, which influence playing styles. 
            Major tournaments such as Wimbledon, the US Open, the French Open, and the Australian Open attract global audiences. 
            Tennis demands endurance, agility, and precision.</p>
        </div>
    </a>

    <a href="user_login.php" class="sport-item">
        <img src="Hockey.jpg" alt="Hockey">
        <div class="sport-description">
            <h2>Hockey</h2>
            <p>Hockey is a sport where two teams play against each other by maneuvering a ball or puck into the opponent's goal using a hockey stick. 
            The game has different variations, including field hockey, ice hockey, and roller hockey. 
            Ice hockey is especially popular in North America and Europe, with the NHL being the top league. 
            It requires fast reflexes, teamwork, and physical endurance to control the puck and score.</p>
        </div>
    </a>

    <a href="user_login.php" class="sport-item" style="flex-direction: row-reverse;">
        <img src="Swimming.avif" alt="Swimming">
        <div class="sport-description">
            <h2>Swimming</h2>
            <p>Swimming is an individual or team sport that requires the use of one's entire body to move through water. 
            It is one of the oldest sports, with events dating back to ancient times. 
            Competitive swimming consists of different strokes, including freestyle, breaststroke, backstroke, and butterfly. 
            It is an Olympic sport with notable events such as the 100m freestyle and 200m medley. 
            Swimming is also a great full-body workout and a lifesaving skill.</p>
        </div>
    </a>

    <a href="user_login.php" class="sport-item">
        <img src="Badminton.avif" alt="Badminton">
        <div class="sport-description">
            <h2>Badminton</h2>
            <p>Badminton is a racquet sport played using a shuttlecock across a net. It requires agility, precision, and quick reflexes. 
            The game can be played in singles or doubles and is governed by the Badminton World Federation (BWF). 
            Major tournaments include the All England Open, the Olympic Games, and the BWF World Championships. 
            Badminton is known for its fast-paced rallies, requiring players to have excellent hand-eye coordination and speed.</p>
        </div>
    </a>
</div>

    <!-- About Section -->
    <div id="about-section" class="about-section">
        <h2>About NIE College and the Sports Club</h2>
        <p>The National Institute of Engineering (NIE), Mysore North, is one of the premier institutions in India, offering quality education in various engineering disciplines. The NIE Sports Club is dedicated to promoting physical fitness and fostering teamwork through a wide range of sports activities.</p>
        <p>We aim to build a healthy and active community that encourages participation in both recreational and competitive sports.</p>
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="footer-text">
            <p>&copy; 2025 Sports Registration Dashboard. All rights reserved.</p>
            <p>Designed by <a href="#">Your Name</a></p>
        </div>
        <div class="footer-container">
            <div class="footer-column">
                <h3>Sports Categories</h3>
                <ul>
                    <li>Football</li>
                    <li>Basketball</li>
                    <li>Cricket</li>
                    <li>Tennis</li>
                    <li>Hockey</li>
                    <li>Baseball</li>
                    <li>Volleyball</li>
                    <li>Badminton</li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Indoor Sports</h3>
                <ul>
                    <li>Table Tennis</li>
                    <li>Badminton</li>
                    <li>Boxing</li>
                    <li>Chess</li>
                    <li>Gymnastics</li>
                    <li>Wrestling</li>
                    <li>Volleyball</li>
                    <li>Squash</li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Outdoor Sports</h3>
                <ul>
                    <li>Football</li>
                    <li>Basketball</li>
                    <li>Cricket</li>
                    <li>Rugby</li>
                    <li>Baseball</li>
                    <li>Hockey</li>
                    <li>Tennis</li>
                    <li>Running</li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>
