<?php
    include('session.php');
    if(!isset($_SESSION['username'])){
    header("location: /././index.php"); // Redirecting To Home Page
    }
	$login_session=$_SESSION['username'];
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
	$ipp='172.16.0.199';
if(get_client_ip()===$ipp){
	echo '<script>var ask1 = window.confirm("Do not use proxy for your intranet.. Turn off your Proxy");
    
		window.location.href = "profile_stu.php";
    </script>';
}
    ?>
<!DOCTYPE html>
<html>
<head><title>Attendance Submission

</title>

<link rel="icon" href="AND/img/iiitbh_logo.png" type="image/icon type">
</head>
<body background="/././AND/img/back.jpg" style="background-repeat: no-repeat;
  background-size: 1320px 700px; opacity: 10 "><center>
<?php
//$conn = mysqli_connect("localhost", "root", "", "attendance_system");
//if (!$conn) {
//    die('Could not connect: ' . mysqli_error($conn));
//}
//mysqli_select_db($conn,"attendance_system");
$sql="select DISTINCT(subject),subj.sub_id from stud_details,subj,sub_details where subj.sub_id=sub_details.sub_id AND stud_details.stud_id=subj.stud_id AND stud_details.username='".$login_session."' ";
$result = mysqli_query($conn,$sql);
echo '<br><form action="phy_stud_atten_unq.php" method = "post">
<select name="subject" required>
<option value="">SELECT THE SUBJECT:</option>';
while($row = mysqli_fetch_array($result)) {
    echo "<option value=".$row['sub_id'].">".$row['subject']."</option>";
}
echo "</select>";

$sql="select DISTINCT(sem) from stud_details,subj,sub_details where subj.sub_id=sub_details.sub_id AND stud_details.stud_id=subj.stud_id AND stud_details.username='".$login_session."'";
$result = mysqli_query($conn,$sql);
echo '
<select name="sem" required >
<option value="">Select Semester:</option>';
while($row = mysqli_fetch_array($result)) {
    echo "<option value=".$row['sem'].">".$row['sem']."</option>";
}
echo "</select>";
$sql="select DISTINCT(year) from stud_details,subj,sub_details where subj.sub_id=sub_details.sub_id AND stud_details.stud_id=subj.stud_id AND stud_details.username='".$login_session."'";
$result = mysqli_query($conn,$sql);
echo '
<select name="year" required>
<option value="">Select Year:</option>';
while($row = mysqli_fetch_array($result)) {
    echo "<option value=".$row['year'].">".$row['year']."</option>";
}
echo "</select>";
echo '<br></br><input name="unq_id" type="text" placeholder = "TYPE UNIQUE CODE..." required>';
echo '<br><br><input name="submit" type="submit" value=" Submit " >';
echo "</form>";
//mysqli_close($conn);

?>
</center>
</body>
</html> 
