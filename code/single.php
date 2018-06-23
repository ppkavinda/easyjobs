<?php
session_start();
include ('helpers/functions.php');

include_once("db/config.php");

$msg_for_apply = '';

if (isset($_POST['apply'])) {
	$target_dir = "uploads/cv/";
	$target_file = $target_dir . basename($_FILES["cv"]["name"]);
	$job = $_POST['job'];
	$_REQUEST['q'] = $job;

    if (move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file)) {

		$sql = "INSERT INTO `employee_job` (`employee_id`, `job_id`, `cv`) VALUES ('$_SESSION[user_id]', '$job', '$target_file');";
		$result = mysqli_query($con, $sql) or die(mysqli_error($con));
		if ($result) {
			$msg_for_apply = "You have applied for the job Successfully!";
		}
	} else {
    	echo "Sorry, there was an error uploading your file.";
	}
}
	if (isset($_REQUEST['q'])) {
		$sql = "SELECT * FROM `jobs` INNER JOIN employers ON jobs.employer_id = employers.employer_id INNER JOIN users ON jobs.employer_id = users.user_id WHERE jobs.job_id = $_REQUEST[q]";
		$result = mysqli_query($con, $sql);
		if ($result) {
			$row = mysqli_fetch_array($result);
		}
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Seeking an Job Portal Category Flat Bootstrap Responsive Website Template | Single :: w3layouts</title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
</head>
<body>

<?php include('partials/navbar.php'); ?>

<?php include('partials/banner2.php'); ?>

<div class="SingleContainer">
    <div class="Single">  
	 	<div class="titleDiv title_right">
	      	<h1><?= $row['title']; ?></h1><br>
	      	<div class="row_1">
	      		<div class="divImg Single_img">
	      			<img style="width: 250px;" src="<?= $row['job_pic']; ?>" class="img" alt="job image"/>
					<div class="jobinfo1">
							<p>Employer : <span><?= $row['name']; ?></span></p>
							<p>Sallery : <span><?= $row['salary']; ?> LKR</span></p>
							<p>Location : <span><?= $row['location']; ?></span></p>
							<p>Email : <span><?= $row['email']; ?></span></p>
							<p>Contact : <span><?= $row['telephone']; ?></span></p>
					</div>
				</div>
				<div class="clearfix"></div>
				<h2 style="margin-top: 20px;">Description</h2>
	      		<div class="Single-para">
	      			<p>
	      				<?= $row['job_description']; ?>
					</p>	
				</div>
				<?php if (isEmployee()) echo "
					<form method='POST' action='".htmlspecialchars($_SERVER['PHP_SELF'])."'  enctype='multipart/form-data'>
						<div class='applybtndiv'>
							<label>Upload Your CV : </label> <input type='file' name='cv' required>
							<input type='hidden' name='job' Value='$row[job_id]'>
							<input class='applybtn' type='submit' name='apply' Value='Apply'>
						</div>
					</form>";
				?>

	      		<div class="clearfix"> </div>
	      	</div>
	      	</div>
	   <div class="clearfix"> </div>
	</div>
</div>

<?php include('partials/footer.php'); ?>

</body>
</html>	

<style>
	.applybtn{
		margin-top:40px;
		height:40px;
		width:90px;
		background-color: #33ccff;
		border:none;
		border-radius:5px;
		font-size:15px;
	}

	.applybtn:hover{
		background-color: #00ace6;
	}

	.SingleContainer{
		padding-right: 15px;
  		padding-left: 15px;
  		margin-right: auto;
  		margin-left: auto;
  		width: 1170px;
	}

	.Single {
		padding: 5em 0;
	}

	.titleDiv {
		width: 75%;
		position: relative;
		min-height: 1px;
		padding-left: 15px;
		padding-right: 15px;
		float: left;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}

	.title_right h3{
		color:#000;
		font-size:1.5em;
		font-weight:400;
		margin-bottom:1em;
	}

	.divImg{
		position: relative;
		min-height: 1px;
		padding-left: 15px;
		padding-right: 15px;
	}

	.Single_img{
		padding-left:0;
	}

	.Single-para {
	    padding: 0;
	    margin: 1em 0 0 0;
	}

	.divDescript{
		position: relative;
		min-height: 1px;
		padding-left: 15px;
		padding-right: 15px;
	}
	.Single_img .img {
		float: left;
	}
	.jobinfo1{
		float: left;
		margin-left: 20px;
		padding: 20px;
		font-family: Tahoma, Geneva, sans-serif;
	}
	.jobinfo1 span {
		font-weight: 900;
	}

	ul li{
		list-style-type: none;;
	}
</style>