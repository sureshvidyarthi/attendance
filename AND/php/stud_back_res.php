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
//$conn = mysqli_connect("localhost", "root", "", "attendance_system");
//if (!$conn) {
//    die('Could not connect: ' . mysqli_error($conn));
//}
$sql="select distinct(b_id) from subj where stud_id=".$login_id."";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$q=$row['b_id'];

$main_table_name=$_POST['fac'].$_POST['subject'].$q.$_POST['sem'].$_POST['year'];
//$conn = mysqli_connect("localhost", "root", "", "attendance_system");
//if (!$conn) {
//    die('Could not connect: ' . mysqli_error($conn));
//}
$query = "SELECT name FROM ".$main_table_name." ORDER BY Sr_No DESC limit 1";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
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
//$conn = mysqli_connect("localhost", "root", "", "attendance_system");
//if (!$conn) {
//    die('Could not connect: ' . mysqli_error($conn));
//}
$sqll="select name from ".$main_table_name."";
$result = mysqli_query($conn,$sqll);
while($row = mysqli_fetch_array($result)) {
    echo "<th>" . substr($row['name'],10,4). "-" . substr($row['name'],14,2). "-" . substr($row['name'],16,2). "</th>";
}
echo "</tr>";


			echo "<tr>";
			echo "<td>".$login_session."</td>";
			echo "<td>".$login_id."</td>";
			$sql3="select name from ".$main_table_name."";
			$result3 = mysqli_query($conn,$sql3);
			while($row3 = mysqli_fetch_array($result3)){
			$sql2="SELECT stat from ".$row3['name']." where stud_id=".$login_id."";
			$result2 = mysqli_query($conn,$sql2);
			while($row2 = mysqli_fetch_array($result2)) {
				if($row2['stat']==1)
					echo "<td><font color='green'>P</font></td>";
				else
					echo "<td><font color='red'>A</font></td>";
				
			}}echo "</tr>";

echo "</table>";
//mysqli_close($conn);
?>

</center>
</body>
</html>