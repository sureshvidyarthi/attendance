<?php
include('session.php');
session_start();
if(!isset($_SESSION['email']))
	header('location: forgot_password.php');
$q=$_SESSION['email'];
$num=rand(100000,999999);
if(mail("$q","FORGOT PASSWORD ???","Your OTP IS $num","From: test.mail260799@gmail.com")){
    echo "mail sent";
}
else{
	echo "failed";
}
?>


<html>
<head>
<script>
function OTP_validation()
{
var num="<?php echo $num; ?>"; 
var OTP=document.otpf.otp.value;  
//setTimeout(function(){ window.location = "<URL HERE>";}, 5*60*1000);
if(num==OTP){  
return true; 
}  
else{  
alert("INVALID OTP");  
return false;  
}  
} 
</script>
<body background="aa.jpg">

                    <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="reset_pass.php" name="otpf" onsubmit="return OTP_validation()">
						<input id="text" name="otp" placeholder="Enter Otp" class="form-control"  type="text" required>
                       <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
 
</body>
</head>
<html>

