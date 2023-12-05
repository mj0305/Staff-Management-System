<!DOCTYPE html>
<html>
<head>
    <title>Payroll Receipt</title>
</head>
<style>
	body {
            background-color: #99ff33;
            text-align: center;
            font-family: Rockwell, sans-serif;
        }
        
    .container {
        max-width: 400px;
        margin: 10px auto;
        padding: 20px;
        background-color: #006600;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
	table {
	margin-left:auto;
	margin-right:auto;
    width: 60%;
    text-align: center;
	border: 3px solid black;
    border-radius: 5px;
	border-collapse: collapse;
	}
  
	th, td {
    padding: 10px;
	border: 3px solid black;
    border-radius: 5px;
	text-align:center;
	}
  
	th {
	border: 3px solid black;
    border-radius: 5px;
    background-color: green;
    color: white;
	}
  
	td {
	border: 3px solid black;
    border-radius: 5px;
    background-color: lightgreen;
	}
	
	.return-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #FF0000;
    color: #FFFFFF; /* Change text color to white */
    border: 3px solid black;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
		
	.return-button:hover {
        background-color: #ffe599;
        }
	
	.submit-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #00ff00;
        color: #000000;
        border: 3px solid black;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        }
        
    .submit-button:hover {
        background-color: #FF4081;
        }
</style>

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


    $payroll = $salary;

    // Display the receipt
    echo "<p>Staff ID: $staff_id</p>";
	echo "<p>First Name: $FirstName</p>";
	echo "<p>Last Name: $LastName</p>";
    echo "<p>Payroll: $payroll</p>";
	

    // Close the database connection
    $conn->close();
    ?>
	
<body>
  <h1>Open Payment Options<h1>
<div class="submit-button">
<a href="online_banking.php">Online Banking</a></div>
<div class="submit-button">
<a href="debit_card.php">Debit Card</a></div>
<div class="submit-button">
<a href="credit_card.php">Credit Card</a><br>
</div>
<div class="return-button">
<a href="payroll.php">Return</a><br>
</body>
</html>
