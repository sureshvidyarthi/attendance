<html>
<head>
<body background="aa.jpg">
<?php
include('session.php');
session_start();
if(isset($_POST['user'])){
	$_SESSION['user']=$_POST['user'];
	if($_POST['user']=='fac')
		header('location: fac.php');
	if($_POST['user']=='admin')
		header('location: admin.php');
	if($_POST['user']=='stud')
		header('location: stud.php');
		
}
if(!isset($_POST['user'])){
echo '
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="">
					<div>
						<input type="radio" name="user" value="fac" checked ><b><i>
						<a style="color: #f1c40f ">Faculty</a></b></i>
						<input type="radio" name="user" value="stud">
						<a style="color:#f1c40f"><b ><i>Student</b></i></a>
						<input type="radio" name="user" value="admin">
						<a style="color:#f1c40f"><b ><i>Admin</b></i></a>
					</div>
                      <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Submit" type="submit">
                     
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
					';
}
					?>

</body>
</head>
<html>