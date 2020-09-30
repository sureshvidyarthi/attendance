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
    <title>Your Home Page</title>
    <link href="/./AND/ext/style_fac_prof.css" rel="stylesheet" type="text/css">
    </head>
    <body background="/././AND/img/fac.jpg" style="background-repeat: no-repeat;
  background-size: 1320px 700px; opacity: 10 ">
    <center>
	<div >
    <h3><font color="white">Welcome <br></font><font color="red"><?php echo $login_name; ?></font></h3>
	<div><a href = "insert_img_.php">
	<?php   
		$username = $login_session; //SELECT img FROM login limit 1
		$query = "SELECT img FROM fac_details where username = '$login_session' limit 1";  //SELECT img FROM login where username=$username limit 1
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($result))  
                {  
	     echo '  
		  <tr>  
		       <td>  
			    <img  src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" height="150" width="130" class="img-thumnail" />  
		       </td>  
		  </tr>  
	     ';  
                }  
                ?> </a></div>
    </div><br>
	<div class="button_cont" align="center"><a class="example_e" href="fac_back_fetch.php" >PAST ATTENDANCE RECORD</a></div>
	<br><div class="button_cont" align="center"><a class="example_e" href="fac_fetch.php" >PRESENT ATTENDANCE BY CALL</a></div>
	<br><div class="button_cont" align="center"><a class="example_e" href="fac_fetch_unq.php" >PRESENT ATTENDANCE BY UNIQUE CODE GENERATION </a></div>
	<br><div class="button_cont" align="center"><a class="example_e" href="fac_sub_reg.php" >SUBJECT REGISTRATION </a></div>
	<br><div class="button_cont" align="center"><a class="example_b" href="logout.php" >LOG OUT</a></div>
	</center>
    </body>
    </html>