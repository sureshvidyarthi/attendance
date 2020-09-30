<?php
	include('session.php');
	$_SESSION['user']='stud';
	$_SESSION['email']='anand.cse.1710@iiitbh.ac.in';
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
	
</head>
<body>
<center>
	<?php 
		if(!isset($_POST['pass1'])){
			//if($_POST['unq']==$_SESSION['unq1']){
			if(111==111){
				 echo '<form action="" method="post">
						<input type="password" name="pass1" placeholder="Enter New Password">
						<input type="password" name="pass2" placeholder="Enter Password Again">
						<input type="submit"  value="Next">
						</form>
						';
			}
			else{
				echo '<script>var ask = window.confirm("Somethin Went Wrong ... Wanna try again??");
					if (ask) {
						window.location.href = "testmail.php";
					}
					else{
						window.location.href = "testmail.php";
					}</script>';
			}
		}
		if(isset($_POST['pass1'])){
			$user=$_SESSION['user'];
			$conn = mysqli_connect("localhost", "root", "", 'attendance_system');
			if($user=='fac'){
				$query = "UPDATE fac_details SET password='".$_POST['pass1']."' WHERE email_id = '".$_SESSION['email']."'";
				if(mysqli_query($conn, $query))  
			  {  
				   echo '<script>alert("Password Changed")</script>';
				header("location: /./index.php");  
				
			}}
			if($user=='admin'){
				$query = "UPDATE admin_details SET password='".$_POST['pass1']."' WHERE email_id = '".$_SESSION['email']."'";
				if(mysqli_query($conn, $query)) {  
				   echo '<script>alert("Password Changed")</script>';
				header("location: /./index.php");  
				
			}}
			if($user=='stud'){
				$query = "UPDATE stud_details SET password='".$_POST['pass1']."' WHERE email_id = '".$_SESSION['email']."'";
				if(mysqli_query($conn, $query))  
			  {  
				   echo '<script>var ask = window.confirm("Password Changed Successfully :):)");
					if (ask) {
						window.location.href = "/./index.php";
					}
					else{
						window.location.href = "/./index.php";
					}</script>';
				
			}}
		}
		?>
</center>
</body>
</html>
