<?php
include('session.php');
	session_start();
	if(!isset($_SESSION['user']))
		header('location: signup.php')
?>
<html>

<head>

<title>faculty Sign Up

</title>
<style>
::-webkit-input-placeholder
{
	color:white;
	font-size:medium;
}
</style>
<link rel="icon" href="/./AND/img/iiitbh_logo.png" type="image/icon type">
<link rel="stylesheet" type="text/css" href="/./AND/ext/login_teach.css">
<script type="text/javascript" src="AND/ext/usr_select.js"></script>
</head>

<body background="/./AND/img/back.jpg" style="background-repeat: no-repeat;
  background-size: 1320px 700px; opacity: 10 " >


<center>
<h1>TEACHER'S REGISTRATION </h1>

<a href="index.php">
</a>

<form action="otp_sign_fac.php" method = "post">

<div class="container">
<div>
<input type="number" placeholder="Enter the Id number" name="id" required>
</div>
<input type="text" placeholder="Enter User name" name="username" required >
 
</div>
</div>
<input type="text" placeholder="Enter name" name="name" required >
 
</div>
<div >
<input type="email" placeholder="Enter the email id " name="email" required >
</div>
 <!--pattern=".+[ece,cse].@iiitbh.ac.in"-->
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
