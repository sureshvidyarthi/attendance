    <?php
    // mysqli_connect() function opens a new connection to the MySQL server.
    $conn = mysqli_connect("localhost", "root", "", "attendance_system");
    @session_start();// Starting Session
    // Storing Session
    @$user_check = $_SESSION['username'];
	if(isset($_SESSION["user"])){
	if($_SESSION["user"]=="fac"){
	$query = "SELECT username,fac_id,name from fac_details where username = '$user_check'";
	$ses_sql = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($ses_sql);
    $login_session = $row['username'];
	$login_id = $row['fac_id'];
	$login_name = $row['name'];
	}
	if($_SESSION["user"]=="stud"){
	$query = "SELECT username,stud_id,name from stud_details where username = '$user_check'";
	$ses_sql = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($ses_sql);
    $login_session = $row['username'];
	$login_id = $row['stud_id'];
	$login_name = $row['name'];
	}
	if($_SESSION["user"]=="admin"){
	$query = "SELECT username,admin_id,name from admin_details where username = '$user_check'";
	$ses_sql = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($ses_sql);
    $login_session = $row['username'];
	$login_id = $row['admin_id'];
	$login_name = $row['name'];
	}}
    ?>