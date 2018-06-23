<?php
session_start();

include_once("helpers/functions.php");
include_once("db/config.php");

if (isset($_POST['submit'])) {
	$sql = "SELECT * FROM `jobs` INNER JOIN employers ON jobs.employer_id = employers.employer_id WHERE jobs.title LIKE '%$_POST[search]%';";
	$result = mysqli_query($con, $sql) or die (mysqli_error($con));
	if ($result) {
		$str = '';
		while ($row = mysqli_fetch_array($result)) {
			$str .= "<div class='col_1'>
   	        <div class='col-4 row_2'>
				<a href='single.php?q=$row[job_id]'><img style='width:150px;' src='$row[job_pic]' class='img' alt=''/></a>
			</div>
			<div class='job-detail row_1'>
				<h4><a href='single.php?q=$row[job_id]'>$row[title]</a></h4>
				<h6>Posted On <span class='dot'>·</span> $row[posted_on]</h6>
				<p>$row[description]</p>
			</div>
			<div class='clearfix'> </div>
		   </div>";
		}
	}
} else {
	$str = "No Records Matched!";
}
 ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Easy Jobs</title>
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/banner2.css" rel='stylesheet' type='text/css' />
	<link href="css/boxes.css" rel='stylesheet' type='text/css' />
</head>
<body>
	<?php include('partials/navbar.php'); ?>
	<?php include('partials/banner2.php'); ?>

<div class="container">
	 <div class="single">  
	   <div class="job-col">

			<?= $str; ?>
			<div class="clearfix"> </div>

	   </div>
   </div>
   <div class="clearfix"> </div>
	<div style="height: 250px;"></div>
   
</div>

<?php include('partials/footer.php'); ?>

</body>
</html>	
