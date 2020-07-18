<?php
	include 'panalheader.php';
?>
<?php

if (isset($_GET['Failed'])) {
	
	?>
	<script>
		$(document).ready(function() {
	Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'Something Got Wrong,Please try again later!',
  
});
	});
</script>
<?php
}

?>
<?php
if(isset($_GET['emptyusername'])){
	$username_err="Please enter a username.";
	$email_err ="";
	$password_err="";
	$cpassword_err="";
}elseif(isset($_GET['emptyemail'])){
	$email_err="Please enter a email.";
	$username_err="";
	$password_err="";
	$cpassword_err="";
}elseif(isset($_GET['invalidemail'])){
	$email_err="This email is already taken";
	$username_err="";
	$password_err="";
	$cpassword_err="";
}elseif(isset($_GET['invalidpassword'])){
	$password_err="Password must have at least 6 characters.";
	$username_err="";
	$email_err ="";
	$cpassword_err="";
}elseif(isset($_GET['notmatch'])){
	$cpassword_err="Password did not match.";
	$username_err="";
	$email_err ="";
	$password_err="";
}elseif(isset($_GET['created'])){
	?>
	<script>
		$(document).ready(function() {

		Swal.fire(
  'Successful Created New Account',
  '',
  'success'
);
		});
	</script>

	<?php
	$username_err="";
	$email_err ="";
	$password_err="";
	$cpassword_err="";
}else{ 
	$username_err="";
	$email_err ="";
	$password_err="";
	$cpassword_err="";
}

?>
<div class="container">
	<div class="row">
		
<div class="col-sm-6 col-xs-12 body_container">
	<form method="post" action="add/addaccount.php">
<div class="panal_body">
	<div class="addmoviebody">
		<div style="margin-top: 3vh;font-size: 30px;">Create An Account</div>
		<div class="container">
			<div class="row" style="margin-top: 5vh;">
				<span style="font-size: 17px;margin-left: 10px;"><?php echo $username_err; ?></span>
	<div class="col-md-12 " style="margin-bottom: 3vh;">
		<div style="float: left;">

		<label style="margin-right: 10px;"> User Name :</label>
		<input class="movietextbox " type="text"  placeholder="User Name" name="username" required>
	</div>

</div>
	</div>

<div class="row" style="margin-top: 5vh;">
	<span style="font-size: 17px;margin-left: 10px;"><?php echo $email_err; ?></span>
	<div class="col-md-12 " style="margin-bottom: 3vh;">
		<div style="float: left;">
		<label style="margin-right: 75px;"> Email :</label>
		<input class="movietextbox " type="email"  placeholder="Email" name="email" required>
	</div>

</div>
	</div>

	<div class="row" style="margin-top: 5vh;">
		<span style="font-size: 17px;margin-left: 10px;"><?php echo $password_err; ?></span>
	<div class="col-md-12 " style="margin-bottom: 3vh;">
		<div style="float: left;">
		<label style="margin-right: 27px;"> Password :</label>
		<input class="movietextbox " type="Password"  placeholder="Password" name="password" required>
	</div>

</div>
	</div>

	<div class="row" style="margin-top: 5vh;">
		<span style="font-size: 17px;margin-left: 10px;"><?php echo $cpassword_err; ?></span>
	<div class="col-md-12 " style="margin-bottom: 3vh;">
		<div style="float: left;">
		<label style="margin-right: 0px;"> Repassword :</label>
		<input class="movietextbox " type="Password"  placeholder="Repassword" name="confirm_password" required>
	</div>

</div>
	</div>

	<div class="row">
	<div class="col-md-12 " style="margin-bottom: 3vh;">
	<div style="float: left;">
		<label style="margin-right:38px "> Type :</label>
		<input type="radio" name="type" value="user" checked > User
  		<input style="margin-left: 24px" type="radio" name="type" value="Admin"> Admin
  		
	</div>
</div>
</div>

<div class="row">
	<div class="col-md-12">
		<input class="btn btn-secondary" style="font-size: 20px;float: right;" type="submit" name="createaccount" value="Create Account">
	</div>
</div>

</div>

</form>
</div>
</div>
</div>