<?php
  include 'reg/checkemail.php';
?>

<?php

session_start();

if(isset($_SESSION["login"])){
   
  $accountemail = $_SESSION["email"];
    $con = mysqli_connect('localhost','root','','ofa');

    $sql = "SELECT type FROM account WHERE email = '$accountemail'";
    $fetchuser = mysqli_query($con , $sql);

    while ($row =MySQLi_fetch_array($fetchuser))  {
        
        $testtype=$row['type'];
}
 if ($testtype == 'Admin') {
     ?>
            <script>
                window.location.replace("home.php");
            </script>
            <?php
 }
}
?>
<?php
if (isset($_GET['NotAnAdmin'])) {
  $email_err = 'Not An Admin Email';
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>OFA Admin-Panal-Register</title>
     <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" type="text/css" href="css/adminstyle1.css">
 
  
  <script type="text/javascript" src="js/ajax.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/all.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/swal.js"></script>
  
</head>
<body style="font-family: Open Sans, sans-serif;">
  <div style="background-color:rgba(62,69,81,0.5);height: 40vh;"> <!--rgb(62, 69, 81)-->
   <div class="container" >
    
    <div class="col-sm-6 col-xs-12 logocontain">
     <form class="form_signin" method="POST" action="adminlogin.php">
      <img class="reg_logo" src="../icons/OFA9.png">
      <div class="reg_info">

       <h3 style="margin-top: 8vh;font-weight: 400">Welcome Back!</h3>

       
      <div style="margin-left: 25px; margin-bottom: -4vh;text-align: left;margin-top: 2vh;"><?php echo $email_err; ?></div>
       <input class="reg_email" id="email_address" type="email" name="email" placeholder="Email Address" step required>

       <div style="margin-left: 25px;margin-bottom: -4vh;text-align: left;margin-top: 2vh;"><?php echo $password_err; ?></div>  
       <input class="reg_email" id="password" type="password" name="password" placeholder="Password" step required>

       <input class="btn btn-primary panal_submit" type="submit" name="login_btn" value="Log In">
       <a class="btn btn-success panal_submit returnhome"  href="../index.php">Go To Our Website</a>


      </div>
      <div></div>
     </form>
    </div>
   
   </div>
  </div>
</body>
</html>