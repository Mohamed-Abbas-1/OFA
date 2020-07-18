<?php
	
	$success_reg = "";
	$email_err = "";
	$password_err = "";
	$cpassword_err = "";
	$username_err ="";

	if(isset($_POST['signup-btn'])){
	
	$con = mysqli_connect('localhost','root','','ofa');
	
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['confirm_password'];
/*
	echo $username;
	echo $email;
	echo $password;
	echo $cpassword;
	echo $email_err , $password_err , $cpassword_err ;
*/


 if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    }elseif(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    	
    }else

    $sql = "SELECT id FROM account WHERE email = '$email'";
    $testuser = mysqli_query($con , $sql);

    if (mysqli_num_rows($testuser) > 0){ 
						$email_err = 'This email is already taken';
					}elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
    				}elseif(empty($password_err) && ($password != $cpassword)){
            $cpassword_err = "Password did not match.";
        }else{
        	// Prepare an insert statement
        $sql = "INSERT INTO account (user_name,email,user_password,type,picture) VALUES ('$username','$email','$password','user','profile.jpg' )";

        	if (mysqli_query($con, $sql)) {
   			 $success_reg = "Email created successfully";
   			 session_start();
   			 $_SESSION["login"] = true;
   			 $_SESSION["email"] = $email;
   			 header("location: index.php");

		} else {
    		echo "Somthing wrong try again later";

		}
        }

				


				


$con->close();
	}
?>