<?php
    include('session.php');
    if(!isset($_SESSION['username'])){
    header("location: /././index.php"); // Redirecting To Home Page
    }
	$login_session=$_SESSION['username'];
	$sqll="update ".$_POST['table']." set status = ".$_POST['stat']." where stud_id = ".$_POST['Roll']." ";
	$result = mysqli_query($conn,$sqll);
    ?>
	
<br><div class="button_cont" align="center"><a class="example_b" href="profile_fac.php" >HOME</a></div>