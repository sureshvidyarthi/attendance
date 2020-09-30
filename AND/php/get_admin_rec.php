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
</head>
<body>
<?php
$q = intval($_GET['q']);
$_SESSION['b_id']=$q;
$val=0;

//$conn = mysqli_connect("localhost", "root", "", "attendance_system");
//if (!$conn) {
  //  die('Could not connect: ' . mysqli_error($conn));
//}
echo '<form action="phy_admin_atten.php" method = "post">';
label:
if($val==2){
//mysqli_select_db($conn,"attendance_system");
$sql="select DISTINCT(subject),subj.sub_id from subj,sub_details where subj.sub_id=sub_details.sub_id and subj.b_id=".$q."";
$result = mysqli_query($conn,$sql);
echo '
<select name="subject" required>
<option value="">Select a Subject:</option>';
while($row = mysqli_fetch_array($result)) {
    echo "<option value=".$row['sub_id'].">".$row['subject']."</option>";
}
echo "</select>";
$val=$val+1;
goto label;
}
if($val==1){
$sql="select DISTINCT(sem) from subj,sub_details where subj.sub_id=sub_details.sub_id and subj.b_id=".$q."";
$result = mysqli_query($conn,$sql);
echo '
<select name="sem" required >
<option value="">Select Semester:</option>';
while($row = mysqli_fetch_array($result)) {
    echo "<option value=".$row['sem'].">".$row['sem']."</option>";
}
echo "</select>";
$val=$val+1;
goto label;
}
if($val==3){
$sql="select DISTINCT(subj.fac_id),name from subj,fac_details where subj.fac_id=fac_details.fac_id ";
$result = mysqli_query($conn,$sql);
echo '
<select name="fac" required >
<option value="">Select Faculty:</option>';
while($row = mysqli_fetch_array($result)) {
    echo "<option value=".$row['fac_id'].">".$row['name']."</option>";
}
echo "</select>";
$val=$val+1;
goto label;
}
if($val==0){
$sql="select DISTINCT(year) from subj,sub_details where subj.sub_id=sub_details.sub_id and subj.b_id=".$q."";
$result = mysqli_query($conn,$sql);
echo '
<select name="year" required>
<option value="">Select Year:</option>';
while($row = mysqli_fetch_array($result)) {
    echo "<option value=".$row['year'].">".$row['year']."</option>";
}
echo "</select>";
$val=$val+1;
goto label;
}
if($val==4){
echo '<br><br><input name="submit" type="submit" value=" Submit " >';
echo "</form>";
//mysqli_close($conn);
}

?>

</body>
</html> 
