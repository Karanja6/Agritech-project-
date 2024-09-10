<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="stylesheet.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
        }
        nav {
            background-color: #ffffff;
            color: #000000;
            padding: 3px 0;
            text-align: center;
        }
        nav a {
            color: #000000;
            text-decoration: none;
            margin: 0 10px;
        }
        section {
            display: flex;
            justify-content: space-around; 
            align-items: flex-start; 
            padding: 20px;
            text-align: center;
        }
        .form-container {
            flex: 1; 
            max-width: 400px; 
            margin-right: 20px; 
        }
        .weather-container {
            flex: 1; 
            max-width: 400px;
            margin-left: 20px;
            text-align: left; 
        }
        .recommendation-container {
            flex: 1; 
            max-width: 400px; 
            margin-top: 20px; 
            text-align: left;
            display: none; 
        }
        .recommendation-container ul {
            padding-left: 20px;
        }
        .recommendation-container button {
            margin-top: 10px; 
            padding: 10px 20px;
            font-size: 1em;
            background-color: #000000;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .recommendation-container button:hover {
            background-color: #3bff25;
        }
        .contact-information {
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Recommendation</h1>
    </header>
    <nav>
        <a href="home.php">Home</a>
        <a href= "about us.html">About</a>
        <a href="farmers evaluation.html">Farming Evaluation</a>
        <a href="advice.html">Advice</a>
        <a href=market.html>Market</a>
    </nav>
    <section>
        <div class="form-container">
            <label for="location">Enter Location:</label>
            <input type="text" id="location" placeholder="Enter city name">
            <button id="fetchWeatherBtn">Get Weather</button>
        </div>
        <div class="weather-container">
            <h2>Current Weather</h2>
            <p id="weather-info">Please enter a location above to get weather information.</p>
        </div>
        <div class="recommendation-container" id="recommendationContainer">
            <h2>Recommended Crops</h2>
            <ul id="cropList" class="crop-list">
                <!-- Recommended crops will be added here -->
            </ul>
        </div>
    </section>
    <div class="foot">
            <p>Making agriculture a source of livelihood</p>
        </div>
    <script src="script.js"></script>
</body>
</html>
