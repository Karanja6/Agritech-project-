<?php
include("connect.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $farmers_id = $_POST['farmers_id'];
    $contact = $_POST['contact'];
    $land_size = $_POST['land_size'];
    $soil_type = $_POST['soil_type'];
    $password = $_POST['password']; 
    if (!empty($name) && !empty($farmers_id) && !empty($contact) && !empty($land_size) && !empty($soil_type) && !empty($password)) {
        
        $sql = "INSERT INTO farmers_details (Name, farmers_id, contact, land_size, soil_type, password) VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        
        if ($stmt === false) {
            die('Error preparing statement: ' . $conn->error);
        }
        $stmt->bind_param("sssdss", $name, $farmers_id, $contact, $land_size, $soil_type, $password);
        
        // Execute statement
        if ($stmt->execute()) {
            header("Location: home.php?signup=success");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        
    } else {
        echo "Please fill out all fields";
    }
}

$conn->close();
