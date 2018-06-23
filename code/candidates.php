<?php
session_start();
include('helpers/functions.php');
include_once("db/config.php");

	$sql = "SELECT * FROM `employee_job` INNER JOIN employees ON employees.employee_id = employee_job.employee_id INNER JOIN users ON employee_job.employee_id = users.user_id WHERE employee_job.job_id = $_REQUEST[q]";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));

	if(mysqli_num_rows($result)>0){
	    $str= "<table>";
	    $str.="<tr><th>Name</th><th>Email</th><th>Telephone</th><th>Address</th><th>Date of Birth</th><th>Gender</th><th>CV</th></tr>";
	    $i = 0;
	    while($row = mysqli_fetch_array($result)){
	    	$i++;
	        $str.= "<tr><td>$row[fname] $row[lname]</td>";
	        $str.= "<td>$row[email]</td>";
	        $str.= "<td>$row[telephone]</td>";
	        $str.= "<td>$row[address1] $row[address2]</td>";
	        $str.= "<td>$row[dob]</td>";
	        $str.= "<td>$row[gender]</td>";
	        $str.= "<td><a href='$row[cv]'>Download CV</a></td>";
	    }
	    $str.= "</table>";
	}else{
	    $str = "<p style='font-size: 40px;'>No records matched.</p>";
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>One Movies</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="css/admin.css" rel="stylesheet" type="text/css"> 
	<link href="css/tables.css" rel="stylesheet" type="text/css"> 
</head>
	
<body>
	<?php include('partials/navbar.php'); ?>

	<div class="container add-movie">
		<h3 style="margin-bottom: 30px;">All Employees</h3>	
	</div>
	<div class="container">
			<?= $str ?>
	</div>
	<div style="height: 500px;"></div>

	<?php include('partials/footer.php'); ?>
candidate .php