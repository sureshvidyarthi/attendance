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
</head>
<body background="/././AND/img/back.jpg" style="background-repeat: no-repeat;
  background-size: 1320px 700px; opacity: 10 ">
<center>
<?php
$query = "select subj.b_id,fac_id,subj.stud_id from subj,stud_details where subj.stud_id=stud_details.stud_id and stud_details.username='".$login_session."' and subj.sub_id='".$_POST['subject']."'";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_array($res);
$b_id=$row['b_id'];
$fac_id=$row['fac_id'];
$stud_id=$row['stud_id'];
//mysqli_close($conn);
$main_table_name=$fac_id.$_POST['subject'].$b_id.$_POST['sem'].$_POST['year'];
//$conn = mysqli_connect("localhost", "root", "", "attendance_system");
//if (!$conn) {
//    die('Could not connect: ' . mysqli_error($conn));
//}
$query = "SELECT * FROM ".$main_table_name." ORDER BY Sr_No DESC limit 1";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$table_name=$row['name'];
//mysqli_close($conn);

//$conn = mysqli_connect("localhost", "root", "", "attendance_system");
//if (!$conn) {
//die('Could not connect: ' . mysqli_error($conn));}
$query1 = "select ip from ".$table_name."ips where sr=2 ";
$result1 = mysqli_query($conn, $query1);
@$row1 = mysqli_fetch_array($result1);
$mip=substr($row1['ip'],0,8);
$ip=substr(get_client_ip(),0,8);

$query = "select unq from ".$table_name."ips where sr =1 ";
$result = mysqli_query($conn, $query);
@$row = mysqli_fetch_array($result);
$uniq=$row['unq'];
//mysqli_close($conn);
if ($_POST['unq_id'] == $uniq ) {
	//$conn = mysqli_connect("localhost", "root", "", "attendance_system");
	//if (!$conn) {
	//	die('Could not connect: ' . mysqli_error($conn));}
	$sql="update ".$table_name." set stat = 1 where stud_id=".$stud_id."";
	mysqli_query($conn,$sql);
	if($mip!=$ip){
		$sql="update ".$table_name." set proxy = 1 where stud_id=".$stud_id."";
		mysqli_query($conn,$sql);
	}
	$queryx = "insert into ".$table_name."ips (ip,stud_id) values('".get_client_ip()."',".$stud_id.")";
	if(!$resultx = mysqli_query($conn, $queryx)){
		$query = "select stud_id from ".$table_name."ips where ip='".get_client_ip()."' ";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		$sql="update ".$table_name." set proxy = ".$row['stud_id']."  where stud_id=".$stud_id."";
		mysqli_query($conn,$sql);
	}
	//mysqli_close($conn);
	echo '<script>var ask1 = window.confirm("Attendance Submitted Successfully :) :)");
    
		window.location.href = "profile_stu.php";
    </script>';
}
else{
	echo '<script>var ask = window.confirm("Somethin Went Wrong ... Wanna try again??");
    if (ask) {
		window.location.href = "get_stud_rec_unq.php";
    }
	else{
		window.location.href = "profile_stu.php";
	}</script>';
}
    
?>
</center>
</body>
</html>