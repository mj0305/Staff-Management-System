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
$staff_id="";
$FirstName="";
$LastName="";
$Phone_no="";
$date_joined="";
$salary="";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add/Remove/Update Staff</title>
<link rel="stylesheet" href="css/style1.css" /><style>
	body {
			color:white;
            background-color: #99ff33;
            text-align: center;
            font-family: Rockwell, sans-serif;
        }
	h2{color:black;}
        
        .container {
            max-width: 500px;
            margin: 10px auto;
            padding: 20px;
            background-color: #009900;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
			text-align: left;
        }
        
        .submit-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #00ff00;
            color: #006600;
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
    <div id="wrapper">
       <h2>ADD/UPDATE/REMOVE STAFF</h2>
<div class="container">
    <?php
        if(isset($_POST['fetch_btn'])){
            $staff_id = $_POST['staff_id'];
            if($staff_id=="")
            {
                echo '<script type="text/javascript">alert("Enter staff id to get staff details")</script>';
            }
            {
                $query="select * from management where staff_id='$staff_id' ";
                $query_run=mysqli_query($link,$query);
                if($query_run)
                {
                    if(mysqli_num_rows($query_run)>0)
                    {
                        $row= mysqli_fetch_array($query_run,MYSQLI_ASSOC);
                        $staff_id=$row['staff_id'];
                        $FirstName=$row['FirstName'];
                        $LastName=$row['LastName'];
                        $Phone_no=$row['Phone_no'];
                        $date_joined=$row['date_joined'];
                        $salary=$row['salary'];
                
                    }
                    else{
                        echo '<script type="text/javascript">alert("Invalid staff id")</script>';
                    }
                }
                else{
                    echo '<script type="text/javascript">alert("Error in query")</script>';
                }
                
            }
            
        }
        
    ?>    
            <form action="update_staff.php" method="post">
                <label><b>Staff ID</b> </label><button id="btn_go" name="fetch_btn" type="submit" class="submit-button">Search</button>
                <input type="text" placeholder="Enter the staff id" name="staff_id" value="<?php echo $staff_id; ?>">
                <label><br><br><b>First Name</b></label>
                <input type="text" placeholder="Enter the First name" name="FirstName" value="<?php echo $FirstName; ?>">
                <label><br><br><b>Last Name</b></label>
                <input type="text" placeholder="Enter the last name" name="LastName" value="<?php echo $LastName; ?>">
                <label><br><br><b>Phone Number</b></label>
                <input type="number" placeholder="Enter the phone number" name="Phone_no" value="<?php echo $Phone_no; ?>">
                <label><br><br><b>Date Joined</b></label>
                <input type="date" placeholder="Enter the date joined" name="date_joined" value="<?php echo $date_joined; ?>">
                <label><br><br><b>Salary (in MYR)</b></label>
                <input type="number" placeholder="Enter the salary" name="salary" value="<?php echo $salary; ?>">
                
                <center><br>
                    <button id="btn_add" class="submit-button" name="add_btn" type="submit">Add</button>    
               
				<button id="btn_update" class="submit-button" name="update_btn" type="submit">Update</button>
                    <button id="btn_remove" class="submit-button" name="remove_btn" type="submit">Remove</button>
                    <a href="welcome2.php" class="submit-button" >GO BACK</a>
				</center>
            </form>
            <?php
            if(isset($_POST['add_btn'])){
                $staff_id=$_POST['staff_id'];
                $FirstName=$_POST['FirstName'];
                $LastName=$_POST['LastName'];
                $Phone_no=$_POST['Phone_no'];
                $date_joined=$_POST['date_joined'];
                $salary=$_POST['salary'];
                
                if($staff_id=="" || $FirstName=="" || $LastName=="" || $Phone_no=="" || $date_joined=="" || $salary=="")
                {
                    echo '<script type="text/javascript">alert("insert values in all fields")</script>';
                }
                else{
                    $query = "insert into management values('$staff_id','$FirstName','$LastName','$Phone_no','$date_joined','$salary')";
                    $query_run=mysqli_query($link,$query);
                    if($query_run)
                    {
                        echo '<script type="text/javascript">alert("values inserted successfully:)")</script>';
                    }
                    else{
                        echo '<script type="text/javascript">alert("values  not inserted successfully:(")</script>';
                        
                    }
                    
            
                }
            }
            else if(isset($_POST['update_btn']))
            {
                if($_POST['staff_id']=="" || $_POST['FirstName']=="" || $_POST['LastName']=="" || $_POST['Phone_no']=="" || $_POST['date_joined']=="" || $_POST['salary']=="")
                {
                    echo '<script type="text/javascript">alert("insert values in all fields")</script>';
                }
                else{
                    $staff_id=$_POST['staff_id'];
                    $FirstName=$_POST['FirstName'];
                    $LastName=$_POST['LastName'];
                    $Phone_no=$_POST['Phone_no'];
                    $date_joined=$_POST['date_joined'];
                    $salary=$_POST['salary'];
                    
                    $query = "update management
                        SET staff_id='$staff_id', FirstName='$FirstName', LastName='$LastName', Phone_no='$Phone_no', date_joined='$date_joined', salary='$salary'
                        WHERE staff_id='$staff_id' ";
                        
                        $query_run = mysqli_query($link,$query);
                        
                            if($query_run)
                            {
                                echo '<script type="text/javascript">alert("staff updated successfully:)")</script>';
                            }
                            else{
                                echo '<script type="text/javascript">alert("error")</script>';
                            }
                        
                    
                }
            }
            else if(isset($_POST['remove_btn']))
            {
                if($_POST['staff_id']=="")
                {
                    echo '<script type="text/javascript">alert("enter staff id to remove")</script>';
                }
            else{
                    $staff_id = $_POST['staff_id'];
                    
                    $query = "delete from management
                        WHERE staff_id='$staff_id' ";
                        $query_run = mysqli_query($link,$query);
                        if($query_run)
                            {
                                echo '<script type="text/javascript">alert("staff removed:)")</script>';
                            }
                            else{
                                echo '<script type="text/javascript">alert("error")</script>';
                            }
                    
                }
            }
            

        ?>    

        </div>
    </div>

</body>
</html>