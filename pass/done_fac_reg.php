
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
<body >
<center>

<?php
	//$con=mysqli_connect('localhost','root');
    //mysqli_select_db($conn,'attendance_system');
	//echo $_SESSION['name'].$_SESSION['username'].$_SESSION['password'].$_SESSION['id'].$_SESSION['email'];
		$x="insert into fac_details (name,username,password,fac_id,email_id) values('".$_SESSION['name']."','".$_SESSION['username']."','".$_SESSION['password']."',".$_SESSION['id'].",'".$_SESSION['email']."')";
		$result=mysqli_query($conn,$x);
	
		
		
		
		    echo '  <h1>Success! you are successfully registered</h1>
      <p><b> </b></p>
      
	  <br><br>
	<input type="submit" button onclick="window.location.href=\'/./index.php\'" value="Home" />';
?>


</center>
</body>
</html>
