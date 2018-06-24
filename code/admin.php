<?php
session_start();
include ('helpers/functions.php');
include ('db/config.php');
adminOnly();

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Easy Jobs</title>
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/admin.css" rel="stylesheet" type="text/css"> 
</head>
<body>
	<?php include('partials/navbar.php'); ?>

	<div class="container">
		<div class="align">
			<a href="employees.php" class="button"><h4>Employees</h4></a>
			<a href="employers.php" class="button"><h4>Employers</h4></a>
			<a href="jobs.php" class="button"><h4>Vacancies</h4></a>
			<a href="mes.php" class="button"><h4>Messages</h4></a>
		</div>
	</div>
	<div style="height: 250px;"></div>

<?php include('partials/footer.php'); ?>

</body>
</html>	