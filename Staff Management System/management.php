<?php
// Include config file
require_once "config.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


$sql = "SELECT * FROM management"; 
if ($res = mysqli_query($link, $sql)) { 
    if (mysqli_num_rows($res) > 0) { 
        echo "<table>"; 
        echo "<tr>"; 
        echo "<th>STAFF ID</th>"; 
        echo "<th>FIRST NAME</th>"; 
        echo "<th>LAST NAME</th>";  
        echo "<th>PHONE NO</th>"; 
        echo "<th>DATE JOINED</th>"; 
        echo "<th>SALARY</th>"; 
        echo "</tr>"; 
        while ($row = mysqli_fetch_array($res)) { 
            echo "<tr>"; 
            echo "<td>".$row['staff_id']."</td>"; 
            echo "<td>".$row['FirstName']."</td>"; 
            echo "<td>".$row['LastName']."</td>";  
            echo "<td>".$row['Phone_no']."</td>"; 
            echo "<td>".$row['date_joined']."</td>"; 
            echo "<td>".$row['salary']."</td>";
        
            echo "</tr>"; 
        } 
        echo "</table>"; 
        
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
else { 
    echo "ERROR: Could not able to execute $sql. "
                                .mysqli_error($link); 
} 
mysqli_close($link); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff</title>
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
	
	.submit-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #00ff00;
        color: #FFFFFF;
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
</head>
<body>
<p>
<div class="submit-button">
<a href="update_staff.php">EDIT</a></div>
<div class="submit-button">   
   <a href="welcome.php" >GO BACK</a></div>
    </p>
</body>
</html>