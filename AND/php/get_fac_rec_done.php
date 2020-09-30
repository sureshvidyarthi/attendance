<?php
    include('session.php');
    if(!isset($_SESSION['username'])){
    header("location: /././index.php"); // Redirecting To Home Page
    }
	$login_session=$_SESSION['username'];
?>
<html>
<head>
</head>
<body>
<?php

$stat = $_GET['stat'];
$idd= $_GET['id'];
//$conn = mysqli_connect("localhost", "root", "", "attendance_system");
//if (!$conn) {
//    die('Could not connect: ' . mysqli_error($conn));
//}
//mysqli_select_db($conn,"attendance_system");
$sql="update ".$_SESSION['t_name']." set stat =".$stat." where stud_id=".$idd."";
$result = mysqli_query($conn,$sql); ?>
</body>
</html>

