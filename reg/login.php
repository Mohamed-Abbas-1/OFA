<?php

	$success_sign = "";
	$email_err2 = "";
	$password_err2 = "";

	if(isset($_POST['login-btn'])){
	
	$con = mysqli_connect('localhost','root','','ofa');
	
	$email = $_POST['email2'];
	$password = $_POST['password2'];
	

	if(empty(trim($_POST["email2"]))){
        $email_err2 = "Please enter Email.";
    }elseif(empty(trim($_POST["password2"]))){
        $password_err2 = "Please enter The Password.";}
        else{
    	$sql = "SELECT id, user_name,email,user_password FROM account WHERE email = '$email'";
    	$testuser = mysqli_query($con , $sql);

    	if (mysqli_num_rows($testuser) < 1){ 
						$email_err2 = 'Invalid Email';

			}else{
				while ($row =MySQLi_fetch_array($testuser))  {
						

					if($password != $row['user_password']){
						$password_err2 = "Invaild Password";


		} else {
    			
			 $success_reg = "Sign In successfully";
   			 session_start();
   			 $_SESSION["login"] = true;
   			 $_SESSION["email"] = $email;
   			 
   			 header("location: index.php");

		}
					}
				}
    }
$con->close();
}

?>