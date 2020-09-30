<?php
include('session.php');
session_start();
if(!isset($_SESSION['email'])){
	header('location: forgot_password.php');
$emil=$_SESSION['email'];}
?>


<html>
<head>
<script>
function pass_validation()
{
var firstpassword=document.f1.passw.value;  
var secondpassword=document.f1.passw2.value;  

if(firstpassword==secondpassword){  
return true;  
}  
else{  
alert("please enter same password");  
return false;  
}  
}
</script>
<body background="aa.jpg">
 <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="pss_thnks.php" onsubmit="return pass_validation()">
     <input  type="password" id="passw" name="passw" required placeholder="New Password "></br><br>
     <input  type="password" id="passw" name="passw2" required placeholder="Confirm New Password "></br><br>						  </div>
     <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
     <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
</body>
</head>
<html>