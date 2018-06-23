<?php
session_start();

include_once("helpers/functions.php");
guestOnly();

if(isset($_POST["submit"])){
    include_once("db/config.php");
    $email = clean_input($_POST["email"]);
    $password = clean_input($_POST["password"]);

    $sql = "SELECT user_id, role FROM users WHERE email = '$email' AND password = '" . md5($password) . "';";
    $result = mysqli_query($con, $sql) or  die(mysqli_error($con));
    
    if(mysqli_num_rows($result)>0){

        $row = mysqli_fetch_array($result);
        echo $row["user_id"];
        echo $row["role"];

        //if details are correct logging in the user
        $_SESSION["user_id"] = $row['user_id'];
        $_SESSION["role"] = $row["role"];

        if($_SESSION["role"] == 1){
            header("Location: admin.php");
        }else{
            header("Location: index.php");
        }
    }else{
        echo "You have Failed! #This city.";
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
                    <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="section-title">
                            <h3>LogIn to your Account</h3>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <input type="password" name="password" class="form-control " placeholder="Password" required>
                            </div>
                        </div>
                     <div class="forgot">
					     <div class="clearfix"> </div>
			        </div>
					<div class="login-btn">
					   <input type="submit" name="submit" value="Log in">
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


</style>