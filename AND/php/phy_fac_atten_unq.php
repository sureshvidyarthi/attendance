<?php
    include('session.php');
    if(!isset($_SESSION['username'])){
    header("location: /././index.php"); // Redirecting To Home Page
    }
	$login_session=$_SESSION['username'];
	// Function to get the client IP address
	function get_client_ip() {
	$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
}
    ?>
	
<html>
<head>
<style>
table {
    width: absolute;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
<?php

$main_table_name=$login_id.$_POST['subject'].$_SESSION['b_id'].$_POST['sem'].$_POST['year'];
$query = "CREATE TABLE IF NOT EXISTS ".$main_table_name." (Sr_No int auto_increment primary key,name varchar(255) unique)";
$ses_sql = mysqli_query($conn, $query);

$table_name=$main_table_name.date("mdHis");
$query1 = "insert into ".$main_table_name." (name) values ('".$table_name."')";
$ses_sql1 = mysqli_query($conn, $query1);
$_SESSION['t_name']=$table_name;
$tname=$table_name.'ips';
$query2 = "CREATE TABLE ".$table_name." (stat int(1),proxy int) select stud_id from subj where sub_id = '".$_POST['subject']."' and fac_id = ".$login_id." and sem =".$_POST['sem']."  and year = ".$_POST['year']." and b_id =".$_SESSION['b_id']."";
mysqli_query($conn, $query2);
$query3 = "CREATE TABLE ".$tname." (sr int auto_increment primary key,unq varchar(225),ip varchar(255) unique,stud_id int,foreign key(stud_id) references stud_details(stud_id))";
mysqli_query($conn, $query3);

?>
</head>
<body background="/././AND/img/back.jpg" style="background-repeat: no-repeat;
  background-size: 1320px 700px; opacity: 10 ">
<center>
<?php
echo " Do not Refresh or Go Back ";
echo "<h2> Here's The Unique Code....<br>Ask student to submit their Attendance :)</h2>";
$unq_num=rand(10000,99999);

echo '<table><tr><td><h1>'.$unq_num.'</h1></td></tr></table>';

$sql="insert into ".$tname." (unq) values (".$unq_num.")";
$result = mysqli_query($conn,$sql);
$query4 = "insert into ".$tname." (ip) values('".get_client_ip()."')";
mysqli_query($conn, $query4);

echo '<br><form action="done_attendance.php" method="post"><input type="submit" value ="Done Attendance"> </form>';
//mysqli_close($conn);
?>

</center>
</body>
</html>