<?php
session_start();
include ('helpers/functions.php');
include ('db/config.php');

$sql = "SELECT * FROM employees INNER JOIN users ON employees.employee_id = users.user_id WHERE employee_id = " . $_SESSION['user_id'];
$result = mysqli_query($con, $sql) or die(mysqli_error($con));

if ($result) {
	$row = mysqli_fetch_array($result);
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Seeking an Job Portal Category Flat Bootstrap Responsive Website Template | Location_Single :: w3layouts</title>
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/admin.css" rel="stylesheet" type="text/css"> 
</head>
<body>
	<?php include('partials/navbar.php'); ?>

	<div class="container">
		<div class="align">
			<a href="employees.php" class="button"><h4>View Employees</h4></a>
			<a href="employers.php" class="button"><h4>View Employers</h4></a>
			<a href="jobs.php" class="button"><h4>View Vacancies</h4></a>
			<a href="mes.php" class="button"><h4>View Messages</h4></a>
		</div>
	</div>
	<div style="height: 200px;"></div>

<?php include('partials/footer.php'); ?>

</body>
</html>	