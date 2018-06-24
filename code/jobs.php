<?php
session_start();
include('helpers/functions.php');
include_once("db/config.php");

adminOnly();

	$sql = "SELECT * FROM jobs INNER JOIN employers ON employers.employer_id = jobs.employer_id";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));

	if(mysqli_num_rows($result)>0){
	    $str= "<table>";
	    $str.="<tr><th>Title</th><th>Salary</th><th>Age Limit</th><th>Location</th><th>Posted On</th><th>Employer</th></tr>";
	    $i = 0;
	    while($row = mysqli_fetch_array($result)){
	    	$i++;
	        $str.= "<tr><td>$row[title]</td>";
	        $str.= "<td>$row[salary] LKR</td>";
	        $str.= "<td>$row[age_limit]</td>";
	        $str.= "<td>$row[location]</td>";
	        $str.= "<td>$row[posted_on]</td>";
	        $str.= "<td>$row[name]</td>";
	        $str.= "<td><a class='dlt-button' href='delete.php?t=jobs&id=$row[job_id]'>DELETE</a></td>";
	    }
	    $str.= "</table>";
	}else{
	    $str = "<p style='font-size: 40px;'>No records matched.</p>";
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Easy Jobs</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="css/admin.css" rel="stylesheet" type="text/css"> 
	<link href="css/tables.css" rel="stylesheet" type="text/css"> 
</head>
	
<body>
	<?php include('partials/navbar.php'); ?>

	<div class="container add-movie">
		<h3 style="margin-bottom: 30px; margin-top: 30px;">All Vacancies</h3>	
	</div>
	<div class="container">
			<?= $str ?>
	</div>
	<div style="height: 500px;"></div>

	<?php include('partials/footer.php'); ?>
