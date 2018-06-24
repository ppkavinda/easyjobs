<?php
session_start();

include_once("helpers/functions.php");
include_once("db/config.php");
employerOnly();

if(isset($_POST["submit-job"])){
    $target_dir = "uploads/img/";
    $target_file = $target_dir . basename($_FILES["profilePic"]["name"]);
    $title = clean_input($_POST['title']);
    $salary = clean_input($_POST['salary']);
    $age= clean_input($_POST['age']);
    $location = clean_input($_POST['location']);
    $description = clean_input($_POST['description']);

    $sql1 = "INSERT INTO `jobs` (`job_id`, `employer_id`, `title`, `job_description`, `salary`, `age_limit`, `location`, `posted_on`, `job_pic`) VALUES (NULL, '$_SESSION[user_id]', '$title', '$description', '$salary', '$age', '$location', CURRENT_TIMESTAMP, '$target_file');";
echo $sql1;
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
    <title>Easy Jobs</title>
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/banner2.css" rel='stylesheet' type='text/css' />
    <link href="css/forms.css" rel='stylesheet' type='text/css' />
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
					   <input type="submit" name="submit-job" value="Add Vacancy">
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