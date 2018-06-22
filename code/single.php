<!DOCTYPE HTML>
<html>
<head>
<title>Seeking an Job Portal Category Flat Bootstrap Responsive Website Template | Single :: w3layouts</title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
</head>
<body>

<?php include('partials/navbar.php'); ?>

<?php include('partials/banner.php'); ?>

<div class="SingleContainer">
    <div class="Single">  
	 	<div class="titleDiv title_right">
	      	<h1>Job Title</h1><br>
	      	<div class="row_1">
	      		<div class="divImg Single_img">
	      			<img src="images/a1.jpg" class="img" alt="job image"/>
				</div>
				<br><br><br>
				<h2>Description</h2>
	      		<div class="Single-para">
	      			<p>
						  Job Description 
					</p>	
				</div>
				<div class="jobinfo1">
					<ul>
						<li>Employer : abv pvt ltd</li><br><br>
						<li>Sallery : 10000</li><br><br>
						<li>Location : kanaththa</li>
					</ul>
				</div>
				
				<div class="applybtndiv">
				<input class="applybtn" type="submit" name="submit" id="" Value="Apply">
				</div>

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

	.jobinfo1{
		position: absolute;
		margin-top: -385px;
		margin-left: 400px;
	}

	ul li{
		list-style-type: none;;
	}
</style>