    <?php
    include('session.php');
    if(!isset($_SESSION['username'])){
    header("location: /././index.php"); // Redirecting To Home Page
    }
	$login_session=$_SESSION['username'];?>
	
	<?php
	$u=date("Y");
	include('session.php');
	$sqll="select fac_sub.fac_id,fac_sub.sub_id from fac_sub,sub_branch where sub_branch.sub_id=fac_sub.sub_id and sub_branch.b_id=fac_sub.b_id and sem = ".$_SESSION['sem']." and fac_sub.b_id = ".$_SESSION['b_id']."";
	$result = mysqli_query($conn,$sqll);
	while($row = mysqli_fetch_array($result)) {
		$sql=" insert into subj values ('".$row['sub_id']."','".$row['fac_id']."','".$login_id."','".$_SESSION['b_id']."','".$_SESSION['sem']."','".$u."')";
		$resultl = mysqli_query($conn,$sql);}
	
	echo '
	<br>SUBJECTS REGISTERED<br>
	<br><div class="button_cont" align="center"><a class="example_b" href="profile_stu.php" >HOME</a></div>';
	?>