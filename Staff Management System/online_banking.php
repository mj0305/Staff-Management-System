<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pharmacy";

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get staff ID from the form
    $staff_id = $_POST["staff_id"];


    $sql = "SELECT salary, FirstName, LastName FROM management WHERE staff_id =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $staff_id);
    $stmt->execute();
    $stmt->bind_result($salary, $FirstName, $LastName);
    $stmt->fetch();
    $stmt->close();
	
    // Close the database connection
    $conn->close();
    ?>
	