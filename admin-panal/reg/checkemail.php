<?php

	
	$email_err = "";
	$password_err = "";

	if(isset($_POST['login_btn'])){
	
	$con = mysqli_connect('localhost','root','','ofa');
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	

	if(empty(trim($_POST["email"]))){
        $email_err = "Please enter Email.";
    }elseif(empty(trim($_POST["password"]))){
        $password_err = "Please enter The Password.";}
        else{
    	$sql = "SELECT id, user_name,email,user_password,type FROM account WHERE email = '$email'";
    	$testuser = mysqli_query($con , $sql);

    	if (mysqli_num_rows($testuser) < 1){ 
						$email_err = 'Invalid Email';

			}else{
				while ($row =MySQLi_fetch_array($testuser))  {
						

					if($password != $row['user_password']){
						$password_err = "Invaild Password";


		} else {
    			
			 $success_reg = "Sign In successfully";
   			 session_start();
   			 $_SESSION["login"] = true;
   			 $_SESSION["email"] = $email;
   			 
   			 header("location: home.php");

		}
					}
				}
    }
$con->close();
}

?>