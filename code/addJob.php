<?php
session_start();

include_once("helpers/functions.php");

include_once("db/config.php");

if(isset($_POST["submit-job"])){
    $target_dir = "uploads/img/";
    $target_file = $target_dir . basename($_FILES["profilePic"]["name"]);
    $title = clean_input($_POST['title']);
    $salary = clean_input($_POST['salary']);
    $age= clean_input($_POST['age']);
    $location = clean_input($_POST['location']);
    $description = clean_input($_POST['description']);

    $sql1 = "INSERT INTO `jobs` (`job_id`, `employer_id`, `title`, `job_description`, `salary`, `age_limit`, `location`, `posted_on`, `job_pic`) VALUES (NULL, '$_SESSION[user_id]', '$title', '$description', '$salary', '$age', '$location', CURRENT_TIMESTAMP, '$target_file');";
    $result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));

    if($result1){
        $sql2 = "INSERT INTO `employer_job` (`employer_id`, `job_id`) VALUES ('$_SESSION[user_id]', '". mysqli_insert_id($con). "');";
        $result2 = mysqli_query($con, $sql2) or die(mysqli_error($con));

        if ($result2) {
            if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_file)) {
        	   header("Location: addJob.php"); 
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "job_employee adding failed!";
        }
    } else {
        echo "job registration failed!";
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

<div class="container">
    <div class="Single">
    	<div class="single_right">
            <div class="login-content">
				<form id="employeeForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
				    <div class="section-title">
                        <h3>Add a Vacancy</h3>
                    </div>
                    <div class="textbox-wrap">
                        <div class="input-group">
                            <input type="text" name="title" class="form-control " placeholder="Job Title" required>
                        </div>
                    </div>
                    <div class="textbox-wrap">
                        <div class="input-group">
                            <input type="text" name="salary" class="form-control" placeholder="Salary" required>
                        </div>
                    </div>
                    <div class="textbox-wrap">
                        <div class="input-group">
                            <input type="text" name="age" class="form-control" placeholder="Age Limit" required>
                        </div>
                    </div>
                    <div class="textbox-wrap">
                        <div class="input-group">
                            <input type="text" name="location" class="form-control" placeholder="Location" required>
                        </div>
                    </div>
                    <div class="textbox-wrap">
                        <div class="input-group">
                            <label>Job Picture: </label><input type="file" name="profilePic" required>
                        </div>
                    </div>
                    <div class="textbox-wrap">
                        <div class="input-group">
                            <textarea style="height: inherit;" name="description" class="form-control" cols="30" rows="10" placeholder="Enter some description about yourself"></textarea>
                        </div>
                    </div>
					<div class="login-btn">
					   <input type="submit" name="submit-job" value="Log in">
					</div>
                 </form>
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
		font-family: Tahoma, Geneva, sans-serif;
	}

	ul li{
		list-style-type: none;;
	}

	/*  LOGNI FORM */

.login-content {
	width: 50%;
	margin-left: auto;
	margin-right: auto;
}
	.single_right h3{
	color:#000;
	font-size:1.5em;
	font-weight:400;
	margin-bottom:1em;
}

.textbox-wrap {
    margin-bottom: 1em;
}
input.form-control {
    box-shadow: none;
    background-color:#fff;
    padding:0 20px;
    border-radius:0px;
}
.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.login-btn input[type="submit"], .rorl{
    background:#2185C5;
    color: #FFF;
    font-size: 15px;
    font-weight: 400;
    padding: 8px 30px;
    cursor: pointer;
    outline: none;
    margin: 2em 0;
    border: none;
    border-radius: 2px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -o-border-radius: 2px;
}
.login-btn input[type="submit"]:hover{
	background:#f15f43;
}
.login-bottom h3 {
    font-size: 20px;
    font-weight: 700;
    color: #000;
    padding: 25px 0px 0px 0px;
}
.login-bottom p {
    font-size: 1.2em;
    font-weight: 400;
    color: #000;
    margin: 0 0 0.5em;
}

</style>