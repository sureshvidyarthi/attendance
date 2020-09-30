    <?php
    include('session.php');
    if(!isset($_SESSION['username'])){
    header("location: /././index.php"); // Redirecting To Home Page
    }
	$login_session=$_SESSION['username'];
if(isset($_POST['branch'])){
	$sql6="insert into fac_sub values(".$login_id.",'".$_POST['id']."','".$_POST['branch']."')";
	$result6 = mysqli_query($conn,$sql6);
	$sql6="insert into sub_branch (sub_id,b_id,sem) values('".$_POST['id']."','".$_POST['branch']."','".$_POST['sem']."')";
	$result6 = mysqli_query($conn,$sql6);
	$sql6="insert into sub_details values('".$_POST['id']."','".$_POST['subject']."')";
	$result6 = mysqli_query($conn,$sql6);
	echo 'SUBJECT REGISTERED';
	unset($_POST);
}
if(!isset($_POST['branch'])){
echo '
    <!DOCTYPE html>
    <html>
    <head>
    <title>Subject Registration</title>
    <link href="/./AND/ext/style_fac_prof.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="/./AND/ext/login_stu.css">
    </head>
    <body background="/././AND/img/fac.jpg" style="background-repeat: no-repeat;
  background-size: 1320px 700px; opacity: 10 ">
    <center>
<center>
<h1>Subject Registration </h1>

<form action="" method = "post">

<div class="container">
<div>
<input type="text" placeholder="Enter the Subject id" name="id" required>
</div>
<input type="text" placeholder="Subject" name="subject" required >
 
</div>
</div>
<input type="text" placeholder="semester" name="sem" required >
 
</div>
<div >
<select name="branch">
<option value="">Select Branch :</option>';

$sql6="select branch,b_id from branch";
$result6 = mysqli_query($conn,$sql6);
while($row = mysqli_fetch_array($result6)){
	echo "<option value='".$row['b_id']."'>".$row['branch']."</option>";
}

echo '</select>
</div>
<div>
<input name="submit" type="submit" value=" SUBMIT ">
</div>


</form>


	<br><div class="button_cont" align="center"><a class="example_b" href="profile_fac.php" >HOME</a></div>
	</center>
    </body>
    </html>';
}
	?>