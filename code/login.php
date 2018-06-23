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
.login-btn input[type="submit"]{
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