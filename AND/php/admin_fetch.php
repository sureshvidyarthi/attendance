     <?php
    include('session.php');
    if(!isset($_SESSION['username'])){
    header("location: /././index.php"); // Redirecting To Home Page
    }
	$login_session=$_SESSION['username'];
    ?>
 <html>
<head><title>Past Attendance Checking

</title
<link rel="icon" href="/././AND/img/iiitbh_logo.png" type="image/icon type">
<link href="/./AND/ext/style.css" rel="stylesheet" type="text/css">
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","get_admin_rec.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body background="/././AND/img/back.jpg" style="background-repeat: no-repeat;
  background-size: 1320px 700px; opacity: 10 ">
<center>
<?php
//$conn = mysqli_connect("localhost", "root", "", "attendance_system");
//if (!$conn) {
//    die('Could not connect: ' . mysqli_error($conn));
//}
//mysqli_select_db($conn,"attendance_system");
$sql="select DISTINCT(branch),subj.b_id from subj,branch where subj.b_id=branch.b_id ";
$result = mysqli_query($conn,$sql);
echo '<form>
<select name="branch" onchange="showUser(this.value)">
<option value="">Select Branch :</option>';
while($row = mysqli_fetch_array($result)) {
    echo '<option value="'.$row["b_id"].'">'.$row["branch"].'</option>';
}
echo "</select>
</form>";
//mysqli_close($conn);
?>
<br>
<div id="txtHint"><b>Next you have to select subject here...</b></div>
</center>
</body>
</html> 
