<?php
    include('session.php');
    if(!isset($_SESSION['username'])){
    header("location: /././index.php"); // Redirecting To Home Page
    }
	$login_session=$_SESSION['username'];
    ?>
<!DOCTYPE html>
<html>
<head>
<link href="/./AND/ext/select.css" rel="stylesheet" type="text/css">
<script>
</script>
</head>
<body>
<?php
$q = intval($_GET['q']);
$_SESSION['b_id']=$q;

//$conn = mysqli_connect("localhost", "root", "", "attendance_system");
//if (!$conn) {
//    die('Could not connect: ' . mysqli_error($conn));
//}
//mysqli_select_db($conn,"attendance_system");
$sql="select DISTINCT(subject),subj.sub_id from fac_details,subj,sub_details where subj.sub_id=sub_details.sub_id AND fac_details.fac_id=subj.fac_id AND fac_details.username='".$login_session."' and subj.b_id=".$q."";
$result = mysqli_query($conn,$sql);
echo '<form action="phy_fac_atten_unq.php" method = "post" >
<select name="subject" required>
<option value="">Select a Subject:</option>';
while($row = mysqli_fetch_array($result)) {
    echo "<option value=".$row['sub_id'].">".$row['subject']."</option>";
}
echo "</select>";

$sql="select DISTINCT(sem) from fac_details,subj,sub_details where subj.sub_id=sub_details.sub_id AND fac_details.fac_id=subj.fac_id AND fac_details.username='".$login_session."' and subj.b_id=".$q."";
$result = mysqli_query($conn,$sql);
echo '
<select name="sem" required >
<option value="">Select Semester:</option>';
while($row = mysqli_fetch_array($result)) {
    echo "<option value=".$row['sem'].">".$row['sem']."</option>";
}
echo "</select>";
$sql="select DISTINCT(year) from fac_details,subj,sub_details where subj.sub_id=sub_details.sub_id AND fac_details.fac_id=subj.fac_id AND fac_details.username='".$login_session."' and subj.b_id=".$q."";
$result = mysqli_query($conn,$sql);
echo '
<select name="year" required>
<option value="">Select Year:</option>';
while($row = mysqli_fetch_array($result)) {
    echo "<option value=".$row['year'].">".$row['year']."</option>";
}
echo "</select>";
echo '<br><input name="submit" type="submit" value=" Submit " >';
echo "</form>";
//mysqli_close($conn);

?>

</body>
</html> 
