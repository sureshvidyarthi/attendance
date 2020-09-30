<?php
include('session.php');
session_start();
if(!isset($_SESSION['email'])){
	header('location: admin.php');
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
		$x="insert into stud_details (name,username,password,stud_id,email_id) values('".$_SESSION['name']."','".$_SESSION['username']."','".$_SESSION['password']."','".$_SESSION['id']."','".$_SESSION['email']."')";
		$result=mysqli_query($conn,$x);
	
		
		
		
		    echo '  <h1>Success! you are successfully registered</h1>
      <p><b> </b></p>
      
	  <br><br>
	<input type="submit" button onclick="window.location.href=\'/./index.php\'" value="Home" />';
?>


</center>
</body>
</html>
