<?php
session_start();
include('helpers/functions.php');
include_once("db/config.php");
adminOnly();

if ($_REQUEST['t'] == 'employees') {
	$sql = "DELETE FROM `users` WHERE `users`.`user_id` = $_REQUEST[id];";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));
	
	header('Location: employees.php');
}

if ($_REQUEST['t'] == 'employers') {
	$sql = "DELETE FROM `users` WHERE `users`.`user_id` = $_REQUEST[id];";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));

    header('Location: employers.php'); 
}

if ($_REQUEST['t'] == 'jobs') {
	$sql = "DELETE FROM `jobs` WHERE `jobs`.`job_id` = $_REQUEST[id];";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));

	header('Location: jobs.php');
}
if ($_REQUEST['t'] == 'message') {
	$sql = "DELETE FROM `messages` WHERE `messages`.`mes_id` = $_REQUEST[id]";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));

	header('Location: mes.php');
}
