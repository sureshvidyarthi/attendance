<html>
<head>
<body background="aa.jpg">
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="milchk.php">
					<input id="email" name="email" placeholder="email address" class="form-control"  type="email" required>
					<div>
						<input type="radio" name="user" value="fac" checked ><b><i>
						<a style="color: #f1c40f ">Faculty</a></b></i>
						<input type="radio" name="user" value="stud">
						<a style="color:#f1c40f"><b ><i>Student</b></i></a>
						<input type="radio" name="user" value="admin">
						<a style="color:#f1c40f"><b ><i>Admin</b></i></a>
					</div>
                      <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                     
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>

</body>
</head>
<html>