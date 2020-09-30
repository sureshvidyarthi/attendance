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
    <title>Your Frofile Page</title>
    <link href="/./AND/ext/style.css" rel="stylesheet" type="text/css">
    </head>
    <body background="/././AND/img/admin.jpg" style="background-repeat: no-repeat;
  background-size: 1320px 700px; opacity: 10  ">
 
	<div >
    <h3><font color ="white">Welcome : </font><font color="red" ><?php echo $login_session; ?></font></h3>
	<div><a href = "insertrecord/insert_img_.php">
	<?php   
		$username = $login_name; //SELECT img FROM login limit 1
		$query = "SELECT img FROM admin_details where username = '$login_session' limit 1";  //SELECT img FROM login where username=$username limit 1
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
	<br><div class="button_cont" align="left"><a class="example_e" href="admin_fetch.php" >CHECK ATTENDANCE</a></div>
	<br><div class="button_cont" align="left"><a class="example_b" href="logout.php" >LOG OUT</a></div>
	
    </body>
    </html>