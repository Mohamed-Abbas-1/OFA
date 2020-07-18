<?php



	if(isset($_POST['editpass-btn'])){
		if(empty(trim($_POST["newpass"]))){
        $pass_err3 = "Please enter a username.";
        header("location: ../index.php?emptypass");
    }elseif(strlen(trim($_POST["newpass"])) < 6){
        $pass_err3 = "Password must have atleast 6 characters.";
        header("location: ../index.php?smallpass");
    }else{
	$con = mysqli_connect('localhost','root','','ofa');
	
	$lpass = $_POST['lastpass'];
	$npass = $_POST['newpass'];
	$cpass = $_POST['cnewpass'];
	$email = $_POST['hiddenvalue'];

	$sql = "SELECT user_password FROM account WHERE email = '$email'";
    $testuser = mysqli_query($con , $sql);
	while ($row =MySQLi_fetch_array($testuser))  {
    if ($lpass != $row['user_password'] ){ 
		header("location: ../index.php?Invalidpass");

			}elseif($npass != $cpass){
						$password_err3 = "Password did not match.";
						header("location: ../index.php?didnotmatch");
			}else{

	$sql2 = "UPDATE  account SET user_password = '$npass' WHERE email = '$email'";
    

    if (mysqli_query($con, $sql2)) {
    	
   			 
   			 
   			 header("location: ../index.php?editpasssuccess");
    

	
}
	}
	}
} }
?>