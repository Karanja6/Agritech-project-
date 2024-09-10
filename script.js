document.addEventListener('DOMContentLoaded', function() {
    const apiKey = '04eb7f7c890adeea99f87094783e52ee'; // Replace with your OpenWeatherMap API key

    const fetchWeather = async (location) => {
        const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${location}&appid=${apiKey}&units=metric`;

        try {
            const response = await fetch(apiUrl);
            if (!response.ok) {
                throw new Error('Weather information not available');
            }
            const weatherData = await response.json();
            displayWeather(weatherData);
        } catch (error) {
            console.error('Error fetching weather:', error);
            displayErrorMessage();
        }
    };

    const displayWeather = (data) => {
        const weatherInfo = document.getElementById('weather-info');
        weatherInfo.innerHTML = `
            <strong>${data.name}, ${data.sys.country}</strong><br>
            Temperature: ${data.main.temp} °C<br>
            Description: ${data.weather[0].description}<br>
            Humidity: ${data.main.humidity} %<br>
            Wind Speed: ${data.wind.speed} m/s
        `;

        showRecommendationContainer();
        const temperature = data.main.temp;
        const humidity = data.main.humidity;
        const windSpeed = data.wind.speed;
        const recommendedCrops = recommendCrops(temperature, humidity, windSpeed);
        displayRecommendedCrops(recommendedCrops);
    };

    const displayErrorMessage = () => {
        const weatherInfo = document.getElementById('weather-info');
        weatherInfo.textContent = 'Weather information not available. Please try again later.';
    };

    const showRecommendationContainer = () => {
        const recommendationContainer = document.querySelector('.recommendation-container');
        recommendationContainer.style.display = 'block'; 
    };

    const recommendCrops = (temperature, humidity, windSpeed) => {
        if (temperature <= 10 && humidity >= 70 && windSpeed < 5) {
            return ['Cabbage', 'Broccoli', 'Spinach'];
        } else if (temperature > 10 && temperature < 15 && humidity >= 60 && windSpeed < 6) {
            return ['Tomatoes', 'Beans', 'Peas'];
        } else if (temperature >= 15 && temperature < 20 && humidity >= 50 && windSpeed < 6) {
            return ['Broccoli', 'Lettuce', 'Peas', 'Spinach', 'Cabbage'];
        } else if (temperature >= 20 && temperature < 25 && humidity >= 45 && windSpeed < 7) {
            return ['Sorghum', 'Millet', 'Watermelon', 'Okra', 'Sweet Potatoes'];
        } else if (temperature >= 25 && temperature < 30 && humidity >= 40 && windSpeed < 8) {
            return ['Maize', 'Soy Beans', 'Tomatoes', 'Eggplant', 'Cucumbers', 'Peppers'];
        } else if (temperature >= 30 && temperature < 35 && humidity >= 35 && windSpeed < 9) {
            return ['Cotton', 'Peanuts', 'Pumpkin', 'Sunflower'];
        } else if (temperature >= 35 && humidity >= 30 && windSpeed < 10) {
            return ['Sesame', 'Coconut', 'Sesbania'];
        } else {
            return ['No specific recommendations for this weather condition'];
        }
    };

    const displayRecommendedCrops = (crops) => {
        const cropList = document.getElementById('cropList');
        cropList.innerHTML = ''; 

        crops.forEach(crop => {
            const cropItem = document.createElement('li');
            cropItem.textContent = crop;
            cropList.appendChild(cropItem);
        });
    };

    const fetchWeatherBtn = document.getElementById('fetchWeatherBtn');
    fetchWeatherBtn.addEventListener('click', function() {
        const locationInput = document.getElementById('location').value.trim();
        if (locationInput) {
            fetchWeather(locationInput);
        } else {
            alert('Please enter a city name.');
        }
    });
});
