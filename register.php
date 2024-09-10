
<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="stylesheet.css">
    <meta charset="UTF-8">
    <title>Sign up</title>
    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            if (password != confirmPassword) {
                alert("Passwords do not match!");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h1>FARMERS DETAILS</h1>
    <form action="processfarmers_details.php" method="post" onsubmit="return validatePassword()">
        <label for="name">NAME:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="farmers_id">FARMERS_ID:</label><br>
        <input type="number" id="farmers_id" name="farmers_id"><br>

        <label for="contact">CONTACT:</label><br>
        <input type="tel" id="contact" name="contact" pattern="[0-9]{10,}" title="Please enter at least 10 digits" required><br>
        
        <label for="land_size">SIZE OF LAND (in acres):</label><br>
        <input type="number" id="land_size" name="land_size" step="0.01" pattern="[0-9]*" required><br>

        <label for="soil_type">TYPE OF SOIL (after soil analysis):</label><br>
        <select name="soil_type" id="soil_type" required>
            <option value="" disabled selected>Select Soil Type</option>
            <option value="Alluvial Soil">Alluvial Soil</option>
            <option value="Black Soil">Black Soil</option>
            <option value="Red & Yellow Soil">Red & Yellow Soil</option>
            <option value="Laterite Soil">Laterite Soil</option>
            <option value="Arid Soil">Arid Soil</option>
            <option value="Mountain & Forest Soil">Mountain & Forest Soil</option>
            <option value="Loamy Soil">Loamy Soil</option>
            <option value="Sandy Soils">Sandy Soils</option>
            <option value="Black Cotton Soils">Black Cotton Soils</option>
            <option value="Volcanic Soils">Volcanic Soils</option>
        </select><br><br>

        <label for="password">PASSWORD:</label><br>
        <input type="password" id="password" name="password" required><br>

        <label for="confirm_password">CONFIRM PASSWORD:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>

        <button type="submit">Sign up</button>
    </form>

    <p>Already have an account? <a href="login.php">Login</a></p>
    <div class="contact-information">
        You can contact us at 07123456789 
    </div>

    <a href="about us.html">About us</a><br><br>

    <div class="foot">
        <p>Making agriculture a source of livelihood</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const queryString = window.location.search;
            if (queryString.includes('signup=success')) {
                alert('Signup successful! Redirecting to homepage.');
                window.location.href = 'home.php'; 
            }
        });
    </script>
</body>
</html>
