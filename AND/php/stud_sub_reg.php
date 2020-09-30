    <?php
    include('session.php');
    if(!isset($_SESSION['username'])){
    header("location: /././index.php"); // Redirecting To Home Page
    }
	$login_session=$_SESSION['username'];?>
	<!DOCTYPE html>
    <html>
    <head>
	<script>function done(){var ask = window.confirm("Cannot update Subject details later.. Confirm Registration?? ");
    if (ask) {
		return true;
    }
	else{
		return false;
	}}</script>
	<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
    <title>Subject Registration</title>
    <link href="/./AND/ext/style_fac_prof.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="/./AND/ext/login_stu.css">
    </head>
    <body BGCOLOR ="#FFE6E6">
   
<center>

	<?php
if(isset($_POST['sem'])){
	echo $_POST['sem']." semester selected<br>";
	$_SESSION['sem']=$_POST['sem'];
	echo '<h1> SUBJECT DETAILS </h1></center>';
echo '<table style="border: none"><tr><th><h3>SUBJECT CODE</h3></th><th><h3>SUBJECT</h3></th></tr>';
$sqll="select distinct(sub_branch.sub_id),subject from sub_details,sub_branch where sub_branch.sub_id=sub_details.sub_id and sem=".$_SESSION['sem']." group by sub_branch.sub_id";
$result = mysqli_query($conn,$sqll);
while($row = mysqli_fetch_array($result)) {
	echo "<tr>
	<td>".$row['sub_id']."</td>
	<td>".$row['subject']."</td></tr>
	";
}
echo '<center><form action="done_stud_sub_reg.php" method ="POST" >
		<input name="submit" type="submit" value=" Register " onclick="return done()"></form></center>';
}


if(!isset($_POST['sem'])){
	$sql6="select email_id from stud_details where username='".$login_session."'";
	$result6 = mysqli_query($conn,$sql6);
	$row = mysqli_fetch_array($result6);
	$branch=substr($row['email_id'],-21,3);
	$y=(int)substr($row['email_id'],-17,2);
	$t=substr((int)date("Y"),2,2);
	$t=$t-$y;
	$sem=0;
	$sem1=0;
	if($t==0){
		$sem1=1;
	}
	elseif($t==1){
		$sem=2;
		$sem1=3;
	}
	elseif($t==2){
		$sem=4;
		$sem1=5;
	}
	elseif($t==3){
		$sem=6;
		$sem1=7;
	}
	if($t==3){
		$sem=8;
		
	}
	$b_id=0;
	if($branch=='cse'){
		$b_id=1;}
	elseif($branch=='ece'){
		$b_id=2;}
	else{
		$b_id=3;}
	$_SESSION['b_id']=$b_id;
echo '
    
<h1>Subject Registration </h1>
<form action="" method = "post">

<div class="container">

<div>

<select name="sem">
<option value="">Select Semester :</option>';

$sql6="select distinct(sem) from sub_branch";
$result6 = mysqli_query($conn,$sql6);
while($row = mysqli_fetch_array($result6)){
	if($row['sem']==$sem || $row['sem']==$sem1){
	echo "<option value='".$row['sem']."'>".$row['sem']."</option>";}
}

echo '</select>
</div>
<div>
<input name="submit" type="submit" value=" SUBMIT ">
</div>

</div>
</form>


	<br><div class="button_cont" align="center"><a class="example_b" href="profile_stu.php" >HOME</a></div>
	';
}
	?>
	</center>
    </body>
    </html>