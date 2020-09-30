<?php
include('session.php');
	session_start();
	if(!isset($_SESSION['user']))
		header('location: signup.php')
?>
<html>

<head>
<script>
function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*.admin@iiitbh.ac.in/;
if(inputText.value.match(mailformat))
{
document.form1.text1.focus();
return true;
}
else
{
alert("You have entered an invalid email address!");
document.form1.text1.focus();
return false;
}
}
</script>

<title>Admin Sign Up

</title>

<link rel="icon" href="/./AND/img/iiitbh_logo.png" type="image/icon type">
<link rel="stylesheet" type="text/css" href="/./AND/ext/login_stu.css">
<script type="text/javascript" src="AND/ext/usr_select.js"></script>
<style>
::-webkit-input-placeholder
{
	color:white;
	font-size:medium;
}
</style>
</head>

<body background="/./AND/img/back.jpg" style="background-repeat: no-repeat;
  background-size: 1320px 700px; opacity: 10 " > 


<center>
<h1>ADMIN    REGISTRATION </h1>

<a href="index.php">
</a>

<form action="otp_sign.php" method = "post">

<div class="container">


<input type="text" placeholder="Enter User name" name="username" required >
 
</div>
<div class="container">


<input type="text" placeholder="Enter name" name="name" required >
 
</div>
<div class="container">


<input type="text" placeholder="iD" name="id" required >
 
</div>
<div >
<input type="email" placeholder="admin@iiitbh.ac.in "  name="email" required >
</div>
<!--pattern=".+admin@iiitbh.ac.in"-->
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
