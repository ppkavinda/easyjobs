<?php
	session_start();
	include('helpers/functions.php');
	include('db/config.php');

	$sql = "SELECT * FROM `jobs` INNER JOIN employers ON jobs.employer_id = employers.employer_id";
	$result = mysqli_query($con, $sql);
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
?>
<!DOCTYPE HTML>
<html>
	<head>
	<title>Easy Jobs</title>
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/banner.css" rel='stylesheet' type='text/css' />
	<link href="css/boxes.css" rel='stylesheet' type='text/css' />
	</head>
<body>

<?php include('partials/navbar.php'); ?>	
<?php include('partials/banner.php'); ?>

<div class="container">
	 <div class="single">  
	   <div class="job-col">
			<?= $str; ?>
			<div class="clearfix"> </div>
	   </div>
   </div>
   <div class="clearfix"> </div>
   
</div>

<?php include('partials/footer.php'); ?>

</body>
</html>	