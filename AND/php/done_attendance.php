<?php
    include('session.php');
    if(!isset($_SESSION['username'])){
    header("location: /././index.php"); // Redirecting To Home Page
    }
	$login_session=$_SESSION['username'];
?>
<html>
<head>
<script>function done(){
	
				window.location.href = "profile_fac.php";}
</script>
</head>
<body background="/././AND/img/back.jpg" style="background-repeat: no-repeat;
  background-size: 1320px 700px; opacity: 10 ">
<center>
<?php
$query2 = "drop table ".$_SESSION['t_name']."ips";
$ses_sql2 = mysqli_query($conn, $query2);
$var6=0;
$sql6="select stud_id from ".$_SESSION['t_name']." where stat=1";
$result6 = mysqli_query($conn,$sql6);
while($row = mysqli_fetch_array($result6)){
	$var6=$var6+1;
}
echo $var6." Student(s) submitted attendance";


?>
<br><input type="submit" value ="Goto main page" onclick="done()" /> </center>
</body>
</html>