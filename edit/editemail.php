<?php


if(isset($_POST['editemail-btn'])){
		if(empty(trim($_POST["newemail"]))){
        $email_err3 = "Please enter an Email.";
        header("location: ../index.php?emptyemail");
    }else{
	$con = mysqli_connect('localhost','root','','ofa');
	
	$Nemail = $_POST['newemail'];
	$Lemail = $_POST['hiddenvalue'];

	$sql = "SELECT id FROM account WHERE email = '$Nemail'";
    $testuser = mysqli_query($con , $sql);

    if (mysqli_num_rows($testuser) > 0){ 
						$email_err3 = 'This email is already taken';
						header("location: ../index.php?takenemail");
	}else{$sql2 = "UPDATE  account SET email = '$Nemail' WHERE email = '$Lemail'";
    

    if (mysqli_query($con, $sql2)) {
    	
   			 
   			 
   			 header("location: ../index.php?editemailsuccess");
    
   			 	}
	

	}
	}
}



?>