<!DOCTYPE html>
<html>
<head>
    <title>Payroll</title>
</head>
<body>
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
    <h1>Check Payroll</h1>
	<form method="post" action="check_payroll.php">
        <label for="staff_id">Staff ID:</label>
        <input type="text" name="staff_id" required><br><br>
        <input type="submit" class="submit-button" value="Check Payroll">
    </form>
    
</body>
</html>

