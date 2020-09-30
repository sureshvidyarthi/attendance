<?php
include('session.php');
	session_start();
	if(!isset($_SESSION['user']))
		header('location: signup.php')
?>
<html>

<head>

<title>Student Sign Up

</title>

<link rel="icon" href="/./AND/img/iiitbh_logo.png" type="image/icon type">
<link rel="stylesheet" type="text/css" href="/./AND/ext/login_stu.css">
<script type="text/javascript" src="AND/ext/usr_select.js"></script>
</head>
<style>
::-webkit-input-placeholder
{
	color:white;
	font-size:medium;
}
</style>

<body background="/./AND/img/back.jpg" style="background-repeat: no-repeat;
  background-size: 1320px 700px; opacity: 10 " >


<center>
<h1>STUDENT'S REGISTRATION </h1>

<a href="index.php">
</a>

<form action="otp_sign_stud.php" method = "post">

<div class="container">


<input type="text" placeholder="Enter User name" name="username" required  >
 
</div>
<div>
<input type="text" placeholder="ENTER NAME" name="name" required>
</div>
<div>
<input type="text" placeholder="Enter the Roll number" name="roll" required>
</div>
<div >
<input type="email" placeholder="Enter the email "  name="email" required >
</div>
<!--pattern=".+@iiitbh.ac.in"-->
<div>
<input type="password" placeholder="Enter Password" name="password" required>
</div>

<div>
   
<input name="submit" type="submit" value=" SUBMIT ">
</div>

</form>

</center>

</body>

</html>
