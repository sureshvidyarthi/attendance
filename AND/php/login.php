    <?php
	
    session_start();// Starting Session
    $error = ''; // Variable To Store Error Message
	$_SESSION['val']=0;
    if (isset($_POST['submit'])) {
		include('session.php');
    if (empty($_POST['username']) || empty($_POST['password'])) {
    $error = "Username or Password is invalid";
    }
    else{$_SESSION['val']=1;
    // Define $username and $password
    $username = $_POST['username'];
    $password = $_POST['password'];
    // mysqli_connect() function opens a new connection to the MySQL server.
    //$conn = mysqli_connect("localhost", "root", "", "attendance_system");
	//if (!$conn) {
	//	die('Could not connect: ' . mysqli_error($con));
	//}
    // SQL query to fetch information of registerd users and finds user match.
	if($_POST["user"]=="fac")
    $query = "SELECT password from fac_details where BINARY username=? AND BINARY password=? LIMIT 1";
	if($_POST["user"]=="stud")
    $query = "SELECT password from stud_details where BINARY username=? AND BINARY password=? LIMIT 1";
	if($_POST["user"]=="admin")
    $query = "SELECT password from admin_details where BINARY username=? AND BINARY password=? LIMIT 1";
    // To protect MySQL injection for Security purpose
	$stmt = $conn->prepare($query);
	$stmt->bind_param("ss", $username, $password);
	$stmt->execute();
	@$stmt->bind_result($username,$password);
	$stmt->store_result();
	//mysqli_close($conn); // Closing Connection
	if($stmt->fetch()){ //fetching the contents of the row {
	$_SESSION['username'] = $username;
	$_SESSION['user']=$_POST['user'];}
	
	}
	
	}
    ?>