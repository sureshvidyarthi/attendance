<?php
include('session.php');
session_start();
if(!isset($_SESSION['email'])){
	header('location: forgot_password.php');
}
?>
<html>
<head>
<title>confirmation page...</title>
<link rel="stylesheet" type="text/css" href="">
</head>
<body background="ww.png">
<center>

<?php
	//$con=mysqli_connect('localhost','root');
    //mysqli_select_db($con,'attendance_system');
	if($_SESSION['user']=='stud'){
		$x="update stud_details set password='".$_POST['passw']."' where email_id = '".$_SESSION['email']."' ";
		$result=mysqli_query($conn,$x);
	}
	if($_SESSION['user']=='fac'){
		$x="update fac_details set password='".$_POST['passw']."' where email_id = '".$_SESSION['email']."' ";
		$result=mysqli_query($conn,$x);
	}
	if($_SESSION['user']=='admin'){
		$x="update admin_details set password='".$_POST['passw']."' where email_id = '".$_SESSION['email']."' ";
		$result=mysqli_query($conn,$x);
	}
		
		
		
		    echo '  <h1>Success! your Password has been Changed Successfully.</h1>
      <p><b>You will receive a confirmation mail shortly. </b></p>
      
	  <br><br>
	<input type="submit" button onclick="window.location.href=\'/./index.php\'" value="Home" />
	<input type="submit" button onclick="window.location.href=\'/./AND/php/logout.php\'" value="Sign out" />';
?>


</center>
</body>
</html>
