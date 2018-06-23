<?php
session_start();

include_once("helpers/functions.php");
guestOnly();

include_once("db/config.php");

if(isset($_POST["submit-employer"])){
    $target_dir = "uploads/img/";
    $target_file = $target_dir . basename($_FILES["profilePic"]["name"]);
    $email = clean_input($_POST["email"]);
    $password = clean_input($_POST["password"]);
    $name = clean_input($_POST['name']);
    $telephone = clean_input($_POST['tpno']);
    $website = clean_input($_POST['website']);
    $description = clean_input($_POST['description']);

    $sql1 = "INSERT INTO users(email, password, role) VALUES ('$email',  '" . md5($password) ."', '3');";
    $result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));

    if($result1){
        $sql2 = "INSERT INTO `employers` (`employer_id`, `name`, `telephone`, `website`, `profile_pic`, `description`) 
        VALUES ('". mysqli_insert_id($con) ."', '$name', '$telephone', '$website', '$target_file', '$description');";

        $result2 = mysqli_query($con, $sql2);
        if ($result2) {
            if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_file)) {
                header("Location: login.php");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "employers registration failed";
        }
    } else {
        echo "user registration failed";
    }
} else if(isset($_POST["submit-employee"])){
    $target_dir = "uploads/img/";
    $target_file = $target_dir . basename($_FILES["profilePic"]["name"]);
    $fname = clean_input($_POST['fname']);
    $lname = clean_input($_POST['lname']);
    $email = clean_input($_POST["email"]);
    $password = clean_input($_POST["password"]);
    $dob = clean_input($_POST["dob"]);
    $gender = clean_input($_POST["gender"]);
    $address1 = clean_input($_POST["address1"]);
    $address2 = clean_input($_POST["address2"]);
    $telephone = clean_input($_POST['tpno']);
    $description = clean_input($_POST['description']);
    
    $sql1 = "INSERT INTO users(email, password, role) VALUES ('$email',  '" . md5($password) ."', '2');";
    $result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));

    if($result1){
        $sql2 = "INSERT INTO `employees` (`employee_id`, `fname`, `lname`, `dob`, `gender`, `address1`, `address2`, telephone, `description`, `profile_pic`) 
        VALUES ('". mysqli_insert_id($con) ."', '$fname', '$lname', '$dob', '$gender', '$address1', '$address2', $telephone, '$description', '$target_file');";

        $result2 = mysqli_query($con, $sql2) or die(mysqli_error($con));

	    if ($result2) {
            if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_file)) {
            	header("Location: login.php");
    	    } else {
                echo "uploading file failed.";
            }
        } else {
            echo "employer registration failed.";
        }
    } else {
        echo "user registeration failed.";
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
<script>
	function showEmployee () {
		document.getElementById('employeeForm').style.display = "block";
		document.getElementById('employerForm').style.display = "none";
	}
	function showEmployer () {
		document.getElementById('employerForm').style.display = "block";
		document.getElementById('employeeForm').style.display = "none";
	}
</script>
<div class="container">
    <div class="Single">
    	<div class="single_right">
                <div class="login-content">
			   		<button class="rorl" onclick="showEmployee()">I am an Employee</button>
			   		<button class="rorl" onclick="showEmployer()">I am an Employer</button>
<!--  EMPLOYER FORM  -->
                    <form style="display: none" id="employerForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                    <div class="section-title">
                        <h3>Register As Employer</h3>
                    </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <input type="text" name="name" class="form-control " placeholder="Name" required>
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <input type="password" name="passwordc" class="form-control" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <input type="number" name="tpno" class="form-control" placeholder="Telephone" required>
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <input type="url" name="website" class="form-control" placeholder="Website" required>
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <label>Profile Picture: </label><input type="file" name="profilePic" required>
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <textarea style="height: inherit;" name="description" class="form-control" cols="30" rows="10" placeholder="Enter some description about your company"></textarea>
                            </div>
                        </div>
						<div class="login-btn">
						   <input type="submit" name="submit-employer" value="Register">
						</div>
                     </form>
 <!-- EMPLOYEE FORM  -->
					<form id="employeeForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
					 <div class="section-title">
                        <h3>Register As Employee</h3>
                    </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <input type="text" name="fname" class="form-control " placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <input type="text" name="lname" class="form-control " placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <input type="password" name="passwordc" class="form-control" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <input type="date" name="dob" class="form-control" placeholder="Date of Birth" required>
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <label><input type="radio" name="gender" required>Male</label>
                                <label><input type="radio" name="gender" required>Female</label>
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <input type="text" name="address1" class="form-control" placeholder="Address1" required>
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <input type="text" name="address2" class="form-control" placeholder="Address2" required>
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <input type="number" name="tpno" class="form-control" placeholder="Telephone" required>
                            </div>
                        </div>

                        <div class="textbox-wrap">
                            <div class="input-group">
                                <label>Profile Picture: </label><input type="file" name="profilePic" required>
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <textarea style="height: inherit;" name="description" class="form-control" cols="30" rows="10" placeholder="Enter some description about yourself"></textarea>
                            </div>
                        </div>
						<div class="login-btn">
						   <input type="submit" name="submit-employee" value="Register">
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