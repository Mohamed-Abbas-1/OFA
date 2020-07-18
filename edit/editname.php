<?php



	if(isset($_POST['editname-btn'])){
		if(empty(trim($_POST["newname"]))){
        $username_err3 = "Please enter a username.";
        header("location: ../index.php?emptyname");
    }else{
	$con = mysqli_connect('localhost','root','','ofa');
	
	$name = $_POST['newname'];
	$email = $_POST['hiddenvalue'];

	$sql = "UPDATE  account SET user_name = '$name' WHERE email = '$email'";
    

    if (mysqli_query($con, $sql)) {
    	
   			 
   			 
   			 header("location: ../index.php?editnamesuccess");
    

	

	}
	}
}
?>