<?php
session_start();

include_once("helpers/functions.php");
include_once("db/config.php");
guestOnly();

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
    <title>Easy Jobs</title>
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/banner2.css" rel='stylesheet' type='text/css' />
    <link href="css/forms.css" rel='stylesheet' type='text/css' />
    <script src="js/scripts.js"></script>
</head>
<body>
    <?php include('partials/navbar.php'); ?>
    <?php include('partials/banner2.php'); ?>

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
                                <label><input type="radio" name="gender" value="male" required>Male</label>
                                <label><input type="radio" name="gender" value="female" required>Female</label>
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
