<?php
	include('session.php');
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	
</head>
<body>
<center>

	<?php 
		if(isset($_POST['email'])) {
			require 'phpmailer/PHPMailerAutoload.php';
			require 'credential.php';

			$mail = new PHPMailer;
			$var=rand(10000,99999);
			$_SESSION['user']=$_POST['user'];
			$_SESSION['email']=$_POST['email'];
			//$mail->SMTPDebug = 4;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = EMAIL;                 // SMTP username
			$mail->Password = PASS;                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom(EMAIL, 'Forgot Password???');
			$mail->addAddress($_POST['email']);     // Add a recipient

			$mail->addReplyTo(EMAIL);
			// print_r($_FILES['file']); exit;
			//for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
				//$mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    // Optional name
			//}
			$mail->isHTML(true);                                  // Set email format to HTML
			
			$mail->Subject = "Reply to this mail will not be entertained.............";
			$mail->Body    = $var.' is your one time password for changing your password in IIIT Bhagalpur\'s Attendance System';
			$mail->AltBody = 'all thi';

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				$_SESSION['unq1']=$var;
			    echo '<form action="chkunq.php" method="post">
					<input type="text" name="unq" placeholder="Enter Unique Code">
					<input type="submit"  value="Next">
					</form>
					';
			}
			
		}
		else{
			echo '<form action="" method="post">
					<input type="text" name="email" placeholder="Email">
					<div>
						<input type="radio" name="user" value="fac" checked ><b><i>
						<a style="color: #f1c40f ">Faculty</a></b></i>
						<input type="radio" name="user" value="stud">
						<a style="color:#f1c40f"><b ><i>Student</b></i></a>
						<input type="radio" name="user" value="admin">
						<a style="color:#f1c40f"><b ><i>Admin</b></i></a>
					</div>
					<input type="submit"  value="Next">
					</form>
					';
		}
			
	 ?>
</center>
</body>
</html>
