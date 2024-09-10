<?php 
include("connect.php");

session_start(); //start the session at the beginning

$error_message = ""; // Initialize error message variable

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $farmers_id = $_POST['farmers_id'];
    $password = $_POST['password'];
    if (!empty($farmers_id) && !empty($password)) {
        $sql = "SELECT * FROM farmers_details WHERE farmers_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $farmers_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($row['password'] == $password) {
                $_SESSION['farmers_id'] = $row['farmers_id'];
                header("Location: home.php");
                exit();
            } else {
                $error_message = "Invalid password"; 
            }
        } else {
            $error_message = "User not found"; 
        }
    } else {
        $error_message = "Please enter farmers ID and password"; 
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <div class="Thewholebox">  
        <h1>Login</h1>
        <form method="post">
            <div class="field input">
                <label for="farmers_id">FARMERS_ID:</label><br>
                <input type="text" id="farmers_id" name="farmers_id" required><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br><br>
                <button type="submit">Login</button>
                <?php if (!empty($error_message)) : ?>
                    <p class="error-message"><?php echo $error_message; ?></p>
                <?php endif; ?>
            </div>  
        </form>
    </div>
    <br>
    <div class="moreoptions">Don't have an account <a href="register.php">sign up now</a></div>
    <div class="ourdetails">
        <div class="contact-information">
            You can contact us at 07123456789 
        </div>
        <br>
        <a href="about us.html">About us</a>
        <div class="foot">
            <p>Making agriculture a source of livelihood</p>
        </div>
    </div>
</body>
</html>
