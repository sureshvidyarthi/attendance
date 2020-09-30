<?php
    include('session.php');
    if(!isset($_SESSION['username'])){
    header("location: /././index.php"); // Redirecting To Home Page
    }
	$login_session=$_SESSION['username'];
    ?>
	
<html>
<head>
<script>
function dooo(stat,str) {
    if (stat == 1) {
        document.getElementById(str).innerHTML = "Prsent";
		
	}
	else{
		document.getElementById(str).innerHTML = "Absent";
	}
	return dooo1(stat,str);
}
</script>
<?php
$main_table_name=$login_id.$_POST['subject'].$_SESSION['b_id'].$_POST['sem'].$_POST['year'];
$query = "CREATE TABLE IF NOT EXISTS ".$main_table_name." (Sr_No int auto_increment primary key,name varchar(255) unique)";
$ses_sql = mysqli_query($conn, $query);

$table_name=$main_table_name.date("mdHis");
$_SESSION['t_name']=$table_name;
$query1 = "insert into ".$main_table_name." (name) values ('".$table_name."')";
$ses_sql1 = mysqli_query($conn, $query1);

$query2 = "CREATE TABLE ".$table_name." (stat int(1)) select stud_id from subj where sub_id = '".$_POST['subject']."' and fac_id = ".$login_id." and sem =".$_POST['sem']."  and year = ".$_POST['year']." and b_id =".$_SESSION['b_id']."";
$ses_sql2 = mysqli_query($conn, $query2);
?>
<script>
function dooo1(stat,str){
	
	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.open("GET","get_fac_rec_done.php?id="+str+"&stat="+stat,true);
	xmlhttp.send();
}
</script>

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
 <link href="/./AND/ext/style_fac_prof.css" rel="stylesheet" type="text/css">
</style>
</head>
<body BGCOLOR ="#FFE6E6">
<center>
<?php



echo '<h1> Get Ready For The Roll Call </h1>';

echo "<table>
<tr>
<th>ROLL NUMBER</th>
<th>NAME</th>
<th>IMAGE</th>
<th>ACTION</th>
<th>STATUS</th>
</tr>";
$sql="SELECT distinct(".$table_name.".stud_id),name,img from stud_details , ".$table_name." where stud_details.stud_id=".$table_name.".stud_id group by ".$table_name.".stud_id";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['stud_id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo '<td><img  src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" height="100" width="100" class="img-thumnail" />  </td>';
    echo '<td><button style = "
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 5px 8px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
" onclick="dooo(1,'. $row['stud_id'] .')">Present </button>
<button  style ="
  background-color: red;
  border: none;
  color: white;
  padding: 5px 8px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
" onclick="dooo(0,'. $row['stud_id'] .')">Absent</button></td>';
    echo "<td ><p id = '".$row['stud_id'] ."'></p></td>";
    echo "</tr>";
}
echo "</table>";

//mysqli_close($conn);

?>
<button style =" ,type ='submit'
  background-color: white;
  border: none;
  color: red;
  padding: 5px 8px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
<br><div class="button_cont" align="center"><a class="example_b" href="logout.php" >LOG OUT</a></div>
</center>
</body>
</html>