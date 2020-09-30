<?php
    include('session.php');
    if(!isset($_SESSION['username'])){
    header("location: /././index.php"); // Redirecting To Home Page
    }
	$login_session=$_SESSION['username'];
    ?>
	
<html>
<head>
<?php

$main_table_name=$_POST['fac'].$_POST['subject'].$_SESSION['b_id'].$_POST['sem'].$_POST['year'];
//$conn = mysqli_connect("localhost", "root", "", "attendance_system");
//if (!$conn) {
//    die('Could not connect: ' . mysqli_error($conn));
//}
$query = "SELECT name FROM ".$main_table_name." ORDER BY Sr_No DESC limit 1";
$result = mysqli_query($conn,$query);
@$row = mysqli_fetch_array($result);
$table_name=$row['name'];

$query = "SELECT name FROM fac_details where fac_id =".$_POST['fac']." limit 1";
$result = mysqli_query($conn,$query);
$fac_name="aa";
while($row = mysqli_fetch_array($result)){
$fac_name=$row['name'];
}
$query = "SELECT subject FROM sub_details where sub_id ='".$_POST['subject']."' limit 1";
$result = mysqli_query($conn,$query);
$subject="aa";
while($row = mysqli_fetch_array($result)){
$subject=$row['subject'];
}
//mysqli_close($conn);

 ?> 

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
</head>
<body BGCOLOR ="#FFE6E6">
<center>
<?php



echo '<h1> ATTENDANCE RECORD </h1></center>';
echo '<table style="border: none"><tr><th><font color="red"><h3>'.$fac_name.'</th><th>'.$subject.'</h3></font></th><th>'.$_POST['subject'].'</h3></font></th></tr></table><center>';

echo "<table>";
echo "<tr>";
echo "<th>Roll No</th>";
echo "<th>NAME</th>";
$conn = mysqli_connect("localhost", "root", "", "attendance_system");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}
$sqll="select name from ".$main_table_name."";
$result = mysqli_query($conn,$sqll);
while($row = mysqli_fetch_array($result)) {
    echo "<th>" . substr($row['name'],10,4). "-" . substr($row['name'],14,2). "-" . substr($row['name'],16,2). "</th>";
}
echo "</tr>";

$sql="select name from ".$main_table_name." limit 1";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){
    
	$sql1="SELECT ".$row['name'].".stud_id,name from stud_details , ".$row['name']." where stud_details.stud_id=".$row['name'].".stud_id";
	$result1 = mysqli_query($conn,$sql1);
		while($row1 = mysqli_fetch_array($result1)) {
			echo "<tr>";
			echo "<td>".$row1['stud_id']."</td>";
			echo "<td>".$row1['name']."</td>";
			$sql3="select name from ".$main_table_name."";
			$result3 = mysqli_query($conn,$sql3);
			while($row3 = mysqli_fetch_array($result3)){
			$sql2="SELECT stat from ".$row3['name']." where stud_id=".$row1['stud_id']."";
			$result2 = mysqli_query($conn,$sql2);
			while($row2 = mysqli_fetch_array($result2)) {
				if($row2['stat']==1){
					$null='NULL';
					echo "<td><font color='green'>P</font>";
					$sqll="SELECT proxy from ".$row3['name']." where stud_id=".$row1['stud_id']."";
					$resultl = mysqli_query($conn,$sqll);
					if($rowl = @mysqli_fetch_array($resultl)){
						if($rowl['proxy']=='1' AND $rowl['proxy']!=$null){
							echo "(proxy)";
						}
						if($rowl['proxy']!='1' AND $rowl['proxy']!=$null){
							$sqlll="SELECT stud_id,name from stud_details where stud_id=".$rowl['proxy']."";
							$resultll = mysqli_query($conn,$sqlll);
							if($rowll = @mysqli_fetch_array($resultll)){
							echo "(".$rowll['name'].")";}
						}
					}
					echo "</td>";
				}
				else{
				echo "<td><font color='red'>A";   echo "</font></td>";}
				
			}}echo "</tr>";
}break;}
echo "</table><br><br>
<form action='done_modify.php' method='post'>
<select name='table' required >
<option value=''>Select Day :</option>";
$var=1;
$sqll="select name from ".$main_table_name."";
$result = mysqli_query($conn,$sqll);
while($row = mysqli_fetch_array($result)) {
	echo "
	<option value='".$row['name']."'>".$var."</option>
	";$var=$var+1;
}

echo "</select>";

echo "<select name='Roll' required >
<option value=''>Select Roll No:</option>";
$var=1;
$sqll="select name from ".$main_table_name." limit 1";
$result = mysqli_query($conn,$sqll);
$row1 = mysqli_fetch_array($result);
$sqll="select distinct(stud_id) from ".$row1['name']." limit 1";
$result = mysqli_query($conn,$sqll);
while($row = mysqli_fetch_array($result)) {
	echo "
	<option value='".$row['stud_id']."'>".$row['stud_id']."</option>
	";
}

echo "</select>";


echo '
<select name="stat" required >
<option value="">Select status:</option>
<option value="1">Persent</option>
<option value="0">Absent</option>';
echo "</select>";
echo'<input type="submit" value="Modify"></form>' ;
?>
<br><div class="button_cont" align="center"><a class="example_b" href="profile_fac.php" >HOME</a></div>
</center>
</body>
</html>