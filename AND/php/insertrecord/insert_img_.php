    <?php
    include('./AND/php/session.php');
	$login_session=$_SESSION['username'];
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	//$conn=' ';
	$user=$_SESSION['user'];
	//$conn = mysqli_connect("localhost", "root", "", 'attendance_system');
	if($user=='fac'){
		$query = "UPDATE fac_details SET img='$file' WHERE username = '$login_session'";
		if(mysqli_query($conn, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';
		header("location: /./AND/php/profile_fac.php");  
		
	}}
	if($user=='admin'){
    	$query = "UPDATE admin_details SET img='$file' WHERE username = '$login_session'";
		if(mysqli_query($conn, $query)) {  
           echo '<script>alert("Image Inserted into Database")</script>';
		header("location: /./AND/php/profile_admin.php");  
		
	}}
	if($user=='stud'){
    	$query = "UPDATE stud_details SET img='$file' WHERE username = '$login_session'";
		if(mysqli_query($conn, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';
		header("location: /./AND/php/profile_stu.php");  
		
	}}
	
      
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>IMAGE UPLOAD</title>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">UPLOAD YOUR IMAGE</h3>  
                <br />  
	
                <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="image" id="image" />  
                     <br />  
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                </form>  
		
	</div>  
      </body>  
 </html>  
