<?php

session_start();
$q=$_POST['email'];
$r=$_POST['user'];
$_SESSION['user']=$_POST['user'];
//$con=mysqli_connect('localhost','root');
   // mysqli_select_db($con,'attendance_system');
   include('session.php');
	if($r=='stud'){
		$x="select email_id from stud_details where email_id='$q'";
		$result=mysqli_query($conn,$x);
		$num=mysqli_num_rows($result);
	}
	if($r=='fac'){
		$x="select email_id from fac_details where email_id='$q'";
		$result=mysqli_query($conn,$x);
		$num=mysqli_num_rows($result);
	}
	if($r=='admin'){
		$x="select email_id from admin_details where email_id='$q'";
		$result=mysqli_query($conn,$x);
		$num=mysqli_num_rows($result);
	}
if($num==1){
	$_SESSION['email']=$q;
	header('location: sendmail.php');
	
}
else
{	 echo '<script>var ask = window.confirm("Something went wrong with mail id... wanna try again :):)");
					if (ask) {
						window.location.href = "forgot_password.php";
					}
					else{
						window.location.href = "/./index.php";
					}</script>';
}

?>