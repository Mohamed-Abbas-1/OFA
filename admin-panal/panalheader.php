<?php
session_start();

if(isset($_SESSION["login"])){
   
  $accountemail = $_SESSION["email"];
    $con = mysqli_connect('localhost','root','','ofa');

    $sql = "SELECT id,user_name,picture,type FROM account WHERE email = '$accountemail'";
    $fetchuser = mysqli_query($con , $sql);

    while ($row =MySQLi_fetch_array($fetchuser))  {
        $accountid= $row['id'];
        $accountname=$row['user_name'];
        $accountpicture="../icons/".$row['picture'];
        $testtype=$row['type'];

    }
        
}else{
    ?>
            <script>
                window.location.replace("adminlogin.php");
            </script>
            <?php
}

if (isset($testtype) && $testtype=='Admin') {
            
        }else{
            ?>
            <script>
                window.location.replace("adminlogin.php?NotAnAdmin");
            </script>
            <?php
        }


?>


<!DOCTYPE html>
<html>
<head>
    <title>OFA Admin-Panal</title>
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
  <script type="text/javascript" src="js/admin_js.js"></script>
  
</head>
<body style="background-color: rgba(62,69,81,0.6);display: table;
    font-family: Open Sans, sans-serif;">

<?php
    if (isset($_GET['logout'])) {
        
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();

?>
            <script>
                window.location.replace("adminlogin.php?");
            </script>
            <?php
    }

?>


<nav class="navbar navbar-expand-xl navbar-dark transnav  fixed-top" id="nav2" style="z-index: 100;color: grey; background-color: rgba(52, 58, 64,0.8); box-shadow: 0 0 5px 0 rgba(43,43,43,0.1), 0 11px 6px -7px rgba(43,43,43,0.1); " >



    <!-- side nav -->

    
      <div id="mySidenav" class="sidenav"  >
        <a href="../index.php" ><img src="../icons/OFA12.png"  class="logo"></a>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="home.php">
          <h3>Home</h3>
        </a>
        
        <a href="upload.php">
          <h3>Add Movie</h3>
        </a>

        <a href="deletemovie.php">
          <h3>Delete Movie</h3>
        </a>

        <a href="createacount.php">
          <h3>Create Account</h3>
        </a>

        <a href="deleteaccount.php">
          <h3>Promotion / Delete Account</h3>
        </a>
        
        <form style="padding-left: 22px;padding-top: 5px;" method="post" action="home.php?logout">
          <button class="btn btn-danger my-2 my-sm-0"  type="submit" style="border-radius:10px;padding-right: 20px;padding-left: 20px;font-size: 22px;">Logout</button>
        </form>

      </div>
      <span class="sidenavmark" style="" onclick="openNav()">&#9776;</span>
     
      <div class="col-md-12 " id="navbarSupportedContent">
        <div class="myinfo">
            

            <span class="admin_name"><?php echo $accountname ?></span>
            <img class="admin_img" src="<?php echo $accountpicture ?>">
        </div>
        </div>      

      <!-- nav bar -->



      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
          </li>
         
      </div>
    </nav>
  
