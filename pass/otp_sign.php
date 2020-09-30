<?php
include('session.php');
session_start();
$_SESSION['email']=$_POST['email'];
if(!isset($_SESSION['email']))
	header('admin.php');
$q=$_SESSION['email'];
$_SESSION['name']=$_POST['name'];
$_SESSION['username']=$_POST['username'];
$_SESSION['password']=$_POST['password'];
$_SESSION['id']=$_POST['id'];
$num=rand(100000,999999);
if(mail("$q","OTP for new registration","Your OTP IS $num","From: test.mail260799@gmail.com")){
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

                    <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="done_admin_reg.php" name="otpf" onsubmit="return OTP_validation()">
						<input id="text" name="otp" placeholder="Enter Otp" class="form-control"  type="text" required>
                       <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
 
</body>
</head>
<html>

