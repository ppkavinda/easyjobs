<?php
session_start();

include_once("helpers/functions.php");

include_once("db/config.php");
	$sql = "SELECT * FROM `jobs` INNER JOIN employers ON jobs.employer_id = employers.employer_id WHERE jobs.employer_id = $_SESSION[user_id]";
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
				<h5><a class='candidate' href='candidates.php?q=$row[job_id]'>View Candidates</a></h5>
			</div>
			<div class='clearfix'> </div>
		   </div>";
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
<style>
.candidate {
	background: antiquewhite;
	padding: 4px 8px;
	color: red;
}
</style>
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
</div>

<?php include('partials/footer.php'); ?>

</body>
</html>	
<style>
	.single{
	padding:5em 0;
}
.job-col {
	width: 83.333%;
	float: left;
}
.col_1{
	margin-bottom:3em;
}
.col-4 {
	/*width: 33.33%;*/
	float: left;
	padding-left: 15px;
	padding-right: 15px;
}
.job-detail {
	padding-right: 15px;
	padding-left: 15px;
	width: 66.66%;
	float: left;
}
.img {
	width: 100%;
}
.row_1 h4{
	color: #000;
	font-size: 2.3em;
	font-weight: 400;
}
.row_1 h4 a:hover{
	text-decoration:none;
	color:#f15f43;
}
.row_1 h6{
	color: #c5c5c5;
    font-size: 0.75em;
    font-weight: 300;
    line-height: 1.8em;
}
.row_1 p, .single_right p{
	color:#555;
	font-size:0.85em;
	font-weight:300;
	line-height:1.8em;
	margin-bottom: 10px;
}
</style>
