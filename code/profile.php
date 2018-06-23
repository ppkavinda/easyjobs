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
</head>
<body>

<?php include('partials/navbar.php'); ?>
<?php include('partials/banner2.php'); ?>
<style>
.single {
	padding-top: 5em;
}
.single_right p {
    color: #555;
    font-size: 0.85em;
    font-weight: 300;
    line-height: 1.8em;
    margin-bottom: 10px;
}
.description-pane {
	width: 75%;
	float: left;
}
.detail-pane {
	width: 25%;
	float: left;
}
.my_details {
	/*width: 50%;*/
	margin-top: 20px;
}
.det {
	padding: 20px;
	padding-left: 0;
}
.det span {
	font-weight: 600;
	width: 150px;
	display: inline-block;
}
.det div {
	padding-top: 10px;
	padding-bottom: 10px;
}
.profile_pic {
	width: 300px;
}
</style>

<div class="container">
    <div class="single">  
	   <div class="description-pane single_right">
	       <p><?= $row['description']; ?></p>

         <div class="my_details">
          	<h2>Personal Details</h2>
          	<div class="det">
          		<div><span>Name :</span><?= $row['fname'] . ' ' . $row['lname']; ?></div>
          		<div><span>Date of Birth :</span> <?= $row['dob']; ?></div>
          		<div><span>Address :</span><?= $row['address1'] . ' ' . $row['address2']; ?></div>
          		<div><span>Gender :</span> <?= $row['gender']; ?></div>
          		<div><span>Contact No:</span> <?= $row['telephone']; ?></div>
          		<div><span>Email :</span> <?= $row['email']; ?></div>
          	</div>
		 </div>
       </div>
       <div class="detail-pane">
	   	  <img src="<?= $row['profile_pic']; ?>" class="img profile_pic" alt="Proile"/>

       </div>
       <div class="clearfix"> </div>
    </div>
</div>

<?php include('partials/footer.php'); ?>

</body>
</html>	