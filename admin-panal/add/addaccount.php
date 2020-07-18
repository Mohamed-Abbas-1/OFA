<?php
	
	$success_reg = "";
	$email_err = "";
	$password_err = "";
	$cpassword_err = "";
	$username_err ="";

	if(isset($_POST['createaccount'])){
	
	$con = mysqli_connect('localhost','root','','ofa');
	
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['confirm_password']; 
	$type = $_POST['type'];
/*
	echo $username;
	echo $email;
	echo $password;
	echo $cpassword;
	echo $email_err , $password_err , $cpassword_err ;
*/


 if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
        ?>
            <script>
                window.location.replace("../createacount.php?emptyusername");
            </script>
            <?php

    }elseif(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
        ?>
            <script>
                window.location.replace("../createacount.php?emptyemail");
            </script>
            <?php
    	
    }else

    $sql = "SELECT id FROM account WHERE email = '$email'";
    $testuser = mysqli_query($con , $sql);

    if (mysqli_num_rows($testuser) > 0){ 
						$email_err = 'This email is already taken';
						?>
            <script>
                window.location.replace("../createacount.php?invalidemail");
            </script>
            <?php
					}elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
        ?>
            <script>
                window.location.replace("../createacount.php?invalidpassword");
            </script>
            <?php
    				}elseif(empty($password_err) && ($password != $cpassword)){
            $cpassword_err = "Password did not match.";
            ?>
            <script>
                window.location.replace("../createacount.php?notmatch");
            </script>
            <?php
        }else{
        	// Prepare an insert statement
        $sql = "INSERT INTO account (user_name,email,user_password,type,picture) VALUES ('$username','$email','$password','$type','profile.jpg' )";

        	if (mysqli_query($con, $sql)) {
   			
   			 ?>
            <script>
                window.location.replace("../createacount.php?created");
            </script>
            <?php

		} else {
    		?>
            <script>
                window.location.replace("../createacount.php?Failed");
            </script>
            <?php

		}
        }

				


				


$con->close();
	}
?>