<?php
session_start();
include_once("helpers/functions.php");
include_once("db/config.php");

if (isset($_POST['submit'])) {
	$name = clean_input($_POST['name']);
	$email = clean_input($_POST['email']);
	$message = clean_input($_POST['message']);

	$sql = "INSERT INTO `messages` (`mes_id`, `name`, `email`, `messages`) VALUES (NULL, '$name', '$email', '$message');";
	$result = mysqli_query($con, $sql);

	if ($result) {
		$str = "Thank You. We will contact You soon..!";
	} else {
		$str = "Sorry. Your message not Submitted successfully";
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
	<div class="single">  
		<div class="job-col">
		   	<h2 style="color: green; margin-top: 20px; margin-bottom: 20px;"><?php if(isset($str)) echo $str; ?></h2>
		   	<h2 style="margin-bottom: 20px;">Contact Us</h2>
		   	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
                        <textarea style="height: inherit;" name="message" class="form-control" cols="30" rows="10" placeholder="Enter your message"></textarea>
                    </div>
                </div>
				<div class="login-btn">
				   <input type="submit" name="submit" value="Register">
				</div>
             </form>
			<div class="clearfix"> </div>
	   </div>
   </div>
   <div class="clearfix"> </div>
</div>

    <?php include('partials/footer.php'); ?>

</body>
</html>	
