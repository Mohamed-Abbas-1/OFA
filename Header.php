

<?php
include 'reg/signup.php';
include 'reg/login.php';
//include 'edit/editname.php';

?>



<?php
  $username_err3="";
  $email_err3 ="";
  $pass_err3 ="";


    if(isset($_GET['emptyname'])){

    $username_err3 = "Please enter a Username.";
    
  }elseif(isset($_GET['emptyemail'])){

    $email_err3 = "Please enter an Email.";
    
  }elseif(isset($_GET['takenemail'])){

    $email_err3 = "This email is already Taken.";

  }elseif(isset($_GET['Editemailsuccess'])){

    $email_err2 = 'Try your new Email .';

  }elseif(isset($_GET['editemailsuccess'])){   

    session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: index.php?Editemailsuccess"); 
exit;
  }elseif(isset($_GET['emptypass'])){

    $pass_err3 = "Please Fill All Fileds.";
    
  }elseif(isset($_GET['Invalidpass'])){

    $pass_err3 = "Invalid Old Password.";
    
  }elseif(isset($_GET['didnotmatch'])){ 

    $pass_err3 = "Password did not match.";  
    
  }elseif(isset($_GET['smallpass'])){ 

    $pass_err3 = "Password must have atleast 6 characters.";
    
  }elseif(isset($_GET['Editpasssuccess'])){ 

    $password_err2 = "Try your new Password .";
    
  }elseif(isset($_GET['editpasssuccess'])){   

    session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: index.php?Editpasssuccess");
exit;
  }

?>


<?php

// for sign in with google.
require_once "GoogleLogin/config.php";

$loginURL = $gClient -> createAuthurl();
if(isset($_SESSION['googlelogin'])){
 
    
     $accountemail=$_SESSION['email'];
     $accountpicture=$_SESSION['picture'];

    $con = mysqli_connect('localhost','root','','ofa');

    $sql = "SELECT id,user_name FROM account WHERE email = '$accountemail'";
    $fetchuser = mysqli_query($con , $sql);

    while ($row =MySQLi_fetch_array($fetchuser))  {
        $accountid= $row['id'];
        $accountname=$row['user_name'];
    }



    $con->close();
}

?>






<?php

  
  if(isset($_SESSION["login"])){
   
  $accountemail = $_SESSION["email"];
    $con = mysqli_connect('localhost','root','','ofa');

    $sql = "SELECT id,user_name,picture,type FROM account WHERE email = '$accountemail'";
    $fetchuser = mysqli_query($con , $sql);

    while ($row =MySQLi_fetch_array($fetchuser))  {
        $accountid= $row['id'];
        $accountname=$row['user_name'];
        $accountpicture="icons/".$row['picture'];
        $testtype=$row['type'];

    }



    $con->close();
} 
?>




<?php 

// Connect to database

$conn = mysqli_connect('localhost','root','','ofa');

// Test The Connection with the database

if (mysqli_connect_errno()){

  echo 'Database Connection Error : '.mysqli_connect_error();
}


?>


<?php
if(isset($_GET['removewatchmovie'])){
  $removeid = $_GET['removewatchmovie'];

$remove = "DELETE  FROM watch_later WHERE movie_id = '$removeid' AND acount_id= '$accountid' ";
    
      if (mysqli_query($conn, $remove)) {
       
      }
  }

?>


<?php
if(isset($_GET['removefavmovie'])){
  $removeid2 = $_GET['removefavmovie'];

$remove2 = "DELETE  FROM favourite WHERE movie_id = '$removeid2' AND acount_id= '$accountid' ";
    
      if (mysqli_query($conn, $remove2)) {
       
      }
  }

?>  

<?php
if(isset($_GET['removehistory'])){
  $removeid3 = $_GET['removehistory'];

$remove3 = "DELETE  FROM history WHERE id = '$removeid3' AND acount_id= '$accountid' ";
    
      if (mysqli_query($conn, $remove3)) {
       
      }
  }

?> 

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/simple-rating.css">
 
  <link rel="stylesheet" type="text/css" href="css/style1.css">
  <link rel="stylesheet" type="text/css" href="css/style2.css">
  <script type="text/javascript" src="js/ajax.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/all.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/swal.js"></script>
  <script src="js/simple-rating.js"></script>
  <script src="js/jQuery-gRating.js"></script>
  <title>O.F.A.</title>

<?php

if (isset($testtype) && $testtype == 'Admin') {
  ?>
  <script>
    $(document).ready(function(){
    $('.adminpanal').show();
    });
  </script>
  <?php
}

?>

<script>
          /*
           Search engine script
          */
function fill(Value) {
   //Assigning value to "search" div in "search.php" file.
   $('#search').val(Value);
   //Hiding "display" di v in "search.php" file.
   $('#display').hide();
} 
$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#search").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#search').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#display").html("");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "livesearch.php",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#display").html(html).show();
               }
           });
       }
   });
});





</script>
<input type="hidden" id="watchusername2" name="" value="<?php echo $accountid ?>">
<script>



$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#watchremoveall").click(function() {
       //Assigning search box value to javascript variable named as "name".
       
       var username4 = $('#watchusername2').val();
       //Validating, if "comment" is empty.
       if(username4 ==""){
            Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'You have to login in to get your personal Watch-later list!',
  
});
       

       //If commenttext is not empty.
       }else {

Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {


           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "comment.php".
               url: "lists/watchlistremoveall.php",
               //Data, that will be sent to "comment.php".
               data: {
                   //Assigning value of "moviename2 and other" into "moviename2 and other" variable.
                   
                   
                   username4: username4
               },
               //If result found, this funtion will be called.
               success: function(watchlaterremoveall) {

                setTimeout(function() {
$("#watch").load(location.href+" #watch>*"+"");
}, 1);
                 
                            Swal.fire(
  'Successful Removed All from Watch-later list',
  '',
  'success'
);

                  
          //  $('#div').load(document.URL +  ' #div');  
         //  window.location.href ="movie.php?action=<?php // echo $_GET['action'] ?>";     



 

               }
           });

           }
});
       }
   });
});
 

</script> 

<script>

$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#favremoveall").click(function() {
       //Assigning search box value to javascript variable named as "name".
       
       var username6 = $('#watchusername2').val();
       //Validating, if "comment" is empty.
       if(username6 ==""){
            Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'You have to login in to get your personal Favourit list!',
  
});
       

       //If commenttext is not empty.
       }else {

Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {


           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "comment.php".
               url: "lists/favlistremoveall.php",
               //Data, that will be sent to "comment.php".
               data: {
                   //Assigning value of "moviename2 and other" into "moviename2 and other" variable.
                   
                   
                   username6: username6
               },
               //If result found, this funtion will be called.
               success: function(favlistremoveall) {

                setTimeout(function() {
$("#fav").load(location.href+" #fav>*"+"");
}, 1);
                 
                            Swal.fire(
  'Successful Removed All from Favourit list',
  '',
  'success'
);

                  
          //  $('#div').load(document.URL +  ' #div');  
         //  window.location.href ="movie.php?action=<?php // echo $_GET['action'] ?>";     



 

               }
           });

           }
});
       }
   });
});
 

</script>


<script>

$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#historyremoveall").click(function() {
       //Assigning search box value to javascript variable named as "name".
       
       var username7 = $('#watchusername2').val();
       //Validating, if "comment" is empty.
       if(username7 ==""){
            Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'You have to login in to get your personal History list!',
  
});
       

       //If commenttext is not empty.
       }else {

Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {


           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "comment.php".
               url: "lists/historyremoveall.php",
               //Data, that will be sent to "comment.php".
               data: {
                   //Assigning value of "moviename2 and other" into "moviename2 and other" variable.
                   
                   
                   username7: username7
               },
               //If result found, this funtion will be called.
               success: function(removeallhistory) {

                setTimeout(function() {
$("#history").load(location.href+" #history>*"+"");
}, 1);
                 
                            Swal.fire(
  'Successful Removed All from History list',
  '',
  'success'
);

                  
          //  $('#div').load(document.URL +  ' #div');  
         //  window.location.href ="movie.php?action=<?php // echo $_GET['action'] ?>";     



 

               }
           });

           }
});
       }
   });
});
 

</script>



  <style type="text/css">
    
  </style>
</head>
<body style="background-color: #3E4551; ">
  
  
<!--  starting of all nav bar -->
  
  
  
    <nav class="navbar navbar-expand-xl navbar-dark transnav  fixed-top" id="nav2" style="color:White;background:rgba(52,58,64,0.7);z-index: 100;" >



    <!-- side nav -->

    
      <div id="mySidenav" class="sidenav" style="background:rgba(0,0,0,0.8);" onclick="fun1();">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#" style="margin-bottom: 40px;">
          <h3><?php if(isset($accountemail)){
                     
                    echo $accountname;
                      }elseif(isset($_SESSION['googlelogin'])){
                        echo "accountname";
                    }else{echo "MY Name"; }; ?>
          </h3>
        </a>
        <a href="#" class="nav-item2"
              onclick="document.getElementById('modal-wrapper4').style.display='block';
                        document.getElementById('modal-wrapper5').style.display='none'
                        document.getElementById('modal-wrapper6').style.display='none'
                        document.getElementById('modal-wrapper7').style.display='none'
                        document.getElementById('mySidenav').style.width = '0'">
           <h3 >My profile</h3>
        </a>
        <a href="#" class="nav-item2"
              onclick="document.getElementById('modal-wrapper5').style.display='block'
                        document.getElementById('modal-wrapper4').style.display='none'
                        document.getElementById('modal-wrapper6').style.display='none'
                        document.getElementById('modal-wrapper7').style.display='none'
                        document.getElementById('mySidenav').style.width = '0'">
          <h3 >Watch later</h3>
        </a>
        <a href="#" class="nav-item2"
              onclick="document.getElementById('modal-wrapper6').style.display='block'
                        document.getElementById('modal-wrapper5').style.display='none'
                        document.getElementById('modal-wrapper4').style.display='none'
                        document.getElementById('modal-wrapper7').style.display='none'
                        document.getElementById('mySidenav').style.width = '0'">
          <h3 >Favorite list</h3>
        </a>
        <a href="#" class="nav-item2"
                onclick="document.getElementById('modal-wrapper7').style.display='block'
                        document.getElementById('modal-wrapper5').style.display='none'
                        document.getElementById('modal-wrapper6').style.display='none'
                        document.getElementById('modal-wrapper4').style.display='none'
                        document.getElementById('mySidenav').style.width = '0'">
          <h3 >History</h3>
        </a>

        <form style="padding-left: 22px;padding-top: 5px;" method="post" action="index.php?logout">
          <button class="btn btn-danger my-2 my-sm-0"  type="submit" style="border-radius:10px;padding-right: 20px;padding-left: 20px;font-size: 22px;">Logout</button>
        </form>

      </div>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>


      <div><a href="index.php" style="padding-left: 1cm;"><img src="icons/OFA12.png"  class="icon"></a></div>

      <!-- nav bar -->

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
          </li>
          <li class="nav-item">
            <a class="nav-link links " href="index.php" style="padding-left: 1cm; " ><span class="links"> Home</span> </a>
          </li>
          
           <li class="nav-item dropdown">
            <a class="nav-link  dropdown-toggle links" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" style="padding-left: 1cm;">
              <span class="links">Genre</span>
            </a>
            <div class="dropdown-menu mega-drop" aria-labelledby="navbarDropdown" >
              <div class="row">
                <div class="col-md-6">
              <a class="dropdown-item iteam" href="search.php?searchbycat=Action">Action</a>
              <a class="dropdown-item iteam" href="search.php?searchbycat=Adventure">Adventure</a>
              <a class="dropdown-item iteam" href="search.php?searchbycat=Animation">Animation</a>
              <a class="dropdown-item iteam" href="search.php?searchbycat=Crime">Crime</a>
              <a class="dropdown-item iteam" href="search.php?searchbycat=Comedy">Comedy</a>
              <a class="dropdown-item iteam" href="search.php?searchbycat=Drama">Drama</a>
              </div>
              <div class="col-md-6">
              <a class="dropdown-item iteam" href="search.php?searchbycat=Family">Family</a>
              <a class="dropdown-item iteam" href="search.php?searchbycat=Fantasy">Fantasy</a>
              <a class="dropdown-item iteam" href="search.php?searchbycat=Romance">Romance</a>
              <a class="dropdown-item iteam" href="search.php?searchbycat=Sci-Fi">Sci-Fi</a>
              <a class="dropdown-item iteam" href="search.php?searchbycat=Sports">Sports</a>
              <a class="dropdown-item iteam" href="search.php?searchbycat=Horror">Horror</a>
              </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link  dropdown-toggle links" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" style="padding-left: 1cm;">
              <span class="links">Country</span>
            </a>
            <div class="dropdown-menu mega-drop" aria-labelledby="navbarDropdown" >
              <div class="row">
                <div class="col-md-6">
              <a class="dropdown-item iteam" href="search.php?searchbycontury=United States">United States</a>
              <a class="dropdown-item iteam" href="search.php?searchbycontury=United Kingdom">United Kingdom</a>
              <a class="dropdown-item iteam" href="search.php?searchbycontury=Asia">Asia</a>
              <a class="dropdown-item iteam" href="search.php?searchbycontury=Japan">Japan</a>
              </div>
              <div class="col-md-6">
              <a class="dropdown-item iteam" href="search.php?searchbycontury=Korean">Korean</a>
              <a class="dropdown-item iteam" href="search.php?searchbycontury=Egypt">Egypt</a>
              <a class="dropdown-item iteam" href="search.php?searchbycontury=China">China</a>
              <a class="dropdown-item iteam" href="search.php?searchbycontury=India">India</a>
            </div>
          </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link  dropdown-toggle links" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" style="padding-left: 1cm;">
              <span class="links">Release</span>
            </a>
            <div class="dropdown-menu mega-drop" aria-labelledby="navbarDropdown" style="background:rgba(52,58,64,0.7);">
              <div class="row">
                <div class="col-md-6">
              <a class="dropdown-item iteam" href="search.php?searchbyyear=2019">2019</a>
              <a class="dropdown-item iteam" href="search.php?searchbyyear=2018">2018</a>
              <a class="dropdown-item iteam" href="search.php?searchbyyear=2017">2017</a>
              <a class="dropdown-item iteam" href="search.php?searchbyyear=2016">2016</a>
              <a class="dropdown-item iteam" href="search.php?searchbyyear=2015">2015</a>
              </div>
              <div class="col-md-6">
              <a class="dropdown-item iteam" href="search.php?searchbyyear=2014">2014</a>
              <a class="dropdown-item iteam" href="search.php?searchbyyear=2013">2013</a>
              <a class="dropdown-item iteam" href="search.php?searchbyyear=2012">2012</a>
              <a class="dropdown-item iteam" href="search.php?searchbyyear=2011">2011</a>
              <a class="dropdown-item iteam" href="search.php?searchbyyear=2010">2010</a>
            </div>
          </div>
        </div>
          </li>
          <li class="nav-item">
            <a class="nav-link links" href="search.php?search=highestimdb" style="padding-left: 1cm;"> <span class="links">Highest IMBD</span></a>
          </li>
          <li class="nav-item" >
            <a class="nav-link links" href="search.php?popular" style="padding-left: 1cm;"><span class="links">Popular Movies</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link links adminpanal" style="display: none;padding-left: 1cm;" href="admin-panal/home.php" > <span class="links">Admin Panal</span></a>
          </li>
        </ul>

        <form class="form-inline my-2 my-lg-0" >
          <div class="container">
            <div class="row" style="display: inline-block;">
          <input class="form-control mr-sm-4 glyphicon search" type="search" placeholder="Search" 
            style="border-radius: 50cm; background-color: rgba(0,0,0,0.3);border: 1px solid grey;color: white;
                       min-width: 20vw;"
                      id="search">

          <div id="display" name="name" class="search-engine comments3"  style=""></div>
        </div>
      </div>
        </form>
        <button  id="login" class="btn btn-success my-2 my-sm-0" type="submit" 
            style="border-radius: 50cm;" onclick="document.getElementById('modal-wrapper').style.display='block'">Sign In</button>
      </div>
    </nav>
  
</div>





<!--------------------------------------------------Pop Up Message(login)----------------------------------------------------->

<div id="modal-wrapper" class="modal">
  
  <form class="modal-content animate" action="index.php?login" method="post">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
      
      <h1 style="text-align:center">Log In</h1>
    </div>

    <div class="container">

      <div style="margin-left: 25px;"><?php echo $success_sign; ?></div>
      <div style="margin-left: 25px;"><?php echo $email_err2; ?></div>
      <input type="email" placeholder="Enter Email" name="email2" required>
       
            

       <div style="margin-left: 25px;"><?php echo $password_err2; ?></div>   
      <input type="password" placeholder="Enter Password" name="password2" required> 
      
            

      <button class="btn btn-success sign" type="submit" name="login-btn" >Login</button>
      <input type="button" class="btn btn-danger sign" style="border:none;" onclick="window.location = '<?php echo $loginURL ?>';" value="Log in with Gmail"  >    
      <button class="btn btn-primary sign" type="button" onclick="document.getElementById('modal-wrapper2').style.display='block';
                                                    document.getElementById('modal-wrapper').style.display='none'">Sign Up</button>    

    </div>
    
  </form>
  
</div>



<!------------------------------------------------Pop Up Message(Signup)----------------------------------------------------->

<div id="modal-wrapper2" class="modal">
  
  <form class="modal-content animate" action="index.php?signup" method="post">
        
    <div>
      <span onclick="document.getElementById('modal-wrapper2').style.display='none'" class="close" title="Close PopUp">&times;</span>
      
      <h1 style="text-align:center">Join OFA Now</h1>
    </div>

    <div class="container">
      
      <div ><?php echo $success_reg ?></div>

      <div style="margin-left: 25px;"><?php echo $username_err ?></div>
      <div>
      <input  type="text" placeholder="Enter Username" name="username" required></div>
      

      <div style="margin-left: 25px;"><?php echo $email_err ?></div>
      <div>
      <input type="Email" placeholder="Enter Email" name="email" required>
      </div>
      
      
      <div style="margin-left: 25px;"><?php echo $password_err ?></div>
      <div>
      <input type="password" placeholder="Enter Password" name="password" required>
      </div>
      


      <div style="margin-left: 25px;"><?php echo $cpassword_err ?></div>
      <div>
      <input type="password" placeholder="Re-Enter Password" name="confirm_password" required>
      </div>
      


      <button class="btn btn-primary sign" type="submit" name="signup-btn">Sign Up</button> 
      <button class="btn btn-success sign" type="button" onclick="document.getElementById('modal-wrapper').style.display='block'
                                                   document.getElementById('modal-wrapper2').style.display='none'" >Login</button>    
         

    </div>
    
  </form>
  
</div>
<!-------------------------------------------------MY Profile------------------------------>

<div id="modal-wrapper4" class="modal">
  
  <div class="modal-content animate " >
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper4').style.display='none'" class="close" title="Close PopUp">&times;</span>

      <img src=" <?php echo $accountpicture ?> " alt="Avatar" class="avatar"> <!-- My Image   -->
      
    </div>

    <div class="container ">


      <div style="margin-left: 10px;"><?php echo $username_err3 ?></div>
      <div id="newname" style="display: none">

        <form method="post" action="edit/editname.php">
          <input type="hidden" value="<?php echo $accountemail ?>" name="hiddenvalue">
       <input  type="text" name="newname" placeholder="Enter New Name" class="changedata" style="width: 50%;">
       <input class="btn btn-success" name="editname-btn" type="submit" value="Change" onclick="document.getElementById('lastname').style.display='block';
                                  document.getElementById('newname').style.display='none';">
        <input class="btn btn-success" style="width: auto;margin-left: 10px;"  type="button" value="Cancel" onclick="document.getElementById('lastname').style.display='block';
                                  document.getElementById('newname').style.display='none';">
            </form>
          </div>
        </div>

         
      <h2 id="lastname" style="margin-left: 10px;"><?php echo $accountname;  ?> <span id="changcontent2"><img  src="icons/edit.png" style="width: 4%;cursor: pointer; float: right;margin-right: 10px;"
              onclick="document.getElementById('newname').style.display='block';
                        document.getElementById('lastname').style.display='none'"></span>
      </h2>
      
      <form method="post" action="edit/editemail.php">
          <input type="hidden" value="<?php echo $accountemail ?>" name="hiddenvalue">
          <div style="margin-left: 10px;"><?php echo $email_err3 ?></div>
      <div id="newemail" style="display: none">
       <input class="changedata" type="email" name="newemail" placeholder="Enter New Email" style="width: 50%;">
       <input class="btn btn-success" name="editemail-btn"  type="submit" value="Change" onclick="document.getElementById('lastemail').style.display='block';
                                  document.getElementById('newemail').style.display='none'">
        <input class="btn btn-success" style="width: auto;margin-left: 10px;"  type="button" value="Cancel" onclick="document.getElementById('lastemail').style.display='block';
                                  document.getElementById('newemail').style.display='none';">

        </div></form>


        
      <h2 id="lastemail" style="margin-left: 10px;"><?php echo $accountemail;  ?> <span id="changcontent3" ><img  src="icons/edit.png" style="width: 4%;cursor: pointer; float: right;margin-right: 10px;"
              onclick="document.getElementById('newemail').style.display='block';
                        document.getElementById('lastemail').style.display='none'"
                        
                                  ></span></h2> 


      <form method="post" action="edit/editpass.php">
          <input type="hidden" value="<?php echo $accountemail ?>" name="hiddenvalue">
          <div style="margin-left: 10px;"><?php echo $pass_err3 ?></div>
      <div style="display: none" id="newpass">
        <input class="changedata" type="password" name="lastpass" placeholder="Enter Last Password" style="width: 50%;">
        <input class="changedata" type="password" id="new1" name="newpass" placeholder="Enter New Password" style="width: 50%;">
        <input class="changedata" type="password" id="new2" name="cnewpass" placeholder="Re-Enter New Password" style="width: 50%;">
        <input  type="submit" name="editpass-btn" value="Change" class="btn btn-success" onclick="getElementById('newpass').style.display='none';
  getElementById('lastpass').style.display='block'">
        <input class="btn btn-success" style="width: auto;margin-left: 10px;"  type="button" value="Cancel" onclick="getElementById('newpass').style.display='none';
  getElementById('lastpass').style.display='block'">
      </div></form>
      <h6 class="Change" style="margin-left: 10px;" id="lastpass" onclick="getElementById('newpass').style.display='block';
  getElementById('lastpass').style.display='none';">Change Password</h6>
      
    </div>
    
  
  
</div>

<!-----------------------------------Watch later list ------------------------------->
<!---------------------------------------------------------------------------------->

<div id="modal-wrapper5" class="modal" style=";z-index: 80">
  
  <div class="modal-content animate "  style="height: 84vh;">
        
    <div class="imgcontainer">
      <div class="container">
        <div class="row">
          <div class="list-name" style="background-color: rgba(201,28,85,0.8);"
                onclick="document.getElementById('modal-wrapper5').style.display='block';
                        document.getElementById('modal-wrapper6').style.display='none'
                        document.getElementById('modal-wrapper7').style.display='none'
                        document.getElementById('mySidenav').style.width = '0'">
            Watch Later
          </div>
          <div class="list-name"
                onclick="document.getElementById('modal-wrapper6').style.display='block';
                        document.getElementById('modal-wrapper5').style.display='none'
                        document.getElementById('modal-wrapper7').style.display='none'
                        document.getElementById('mySidenav').style.width = '0'">
            Favourite
          </div>
          <div class="list-name"
                onclick="document.getElementById('modal-wrapper7').style.display='block';
                        document.getElementById('modal-wrapper5').style.display='none'
                        document.getElementById('modal-wrapper6').style.display='none'
                        document.getElementById('mySidenav').style.width = '0'">
            History
          </div>
      <span onclick="document.getElementById('modal-wrapper5').style.display='none'" class="close" title="Close PopUp">&times;</span>
      </div>
      </div>
      </div>
       <div class="container">
        <div class="row" style="margin-top: 0px;align-items: left">
         <div class="col-md-12 mt-3"> 
          <button class="btn btn-danger mb-1" id="watchremoveall" style="float: right;">Clear All</button></div>
       </div>
       <div class="container comments2 " id="watch" style="max-height: 60vh;background-color: rgba(0,0,0,0.0);">
        <?php
          //Search query.
          $selectwatch = "SELECT * FROM watch_later WHERE acount_id = '$accountid' ORDER BY added_at DESC ";
          //Search query.
          $ExecQuery4 = MySQLi_query($conn, $selectwatch);
           if (mysqli_num_rows($ExecQuery4) > 0){ 

   while ($row = MySQLi_fetch_array($ExecQuery4)) {
      $watchlistmovie = $row['movie_id'];
      $watchtime =$row['added_at'];
       ?>
       <?php
       $selectwatch2 = "SELECT * FROM movie WHERE id = '$watchlistmovie' ";
          //Search query.
          $ExecQuery5 = MySQLi_query($conn, $selectwatch2);

   while ($row2 = MySQLi_fetch_array($ExecQuery5)) {
      
       ?>
       
        <div class="row list">
          <div class="col-md-4 col-sm-6 col-xs-6 mov3" style="margin-top:15px; " >
        
          <p class="HD mqulity2" ><?php echo $row2['qulity'] ?></p>
          <p class="star stars3" >&#9733;<?php echo $row2['imdb'] ?></p>
          <a href="movie.php?action=<?php echo $watchlistmovie ?>"><h2 class="Text2 text3"><?php echo $row2['name'] ?></h2></a>
          
            
         <a href="movie.php?action=<?php echo $watchlistmovie ?>"> <img class="poster2 movie " src="images/poster/<?php echo $row2['poster'] ?>"></a>
        
      </div>
        <div class="col-md-8 col-sm-6 col-xs-6">
          
          <a href="index.php?removewatchmovie=<?php echo $watchlistmovie ?>"  class="btn btn-danger" id="watchremove" style="margin-top: 15px; float: right;">Remove</a>
          <p class="vistedat">Added at :<?php echo $watchtime ?></p>
          <input type="hidden" id="watchname" value="<?php echo $watchlistmovie ?>" name="">
          <input type="hidden" id="watchusername" value="<?php echo $accountid ?>" name="">
        </div>
          </div>
        <?php  } 
                }
              }else{
                ?>
                <h1 class="nomovies" >No movies Added Yet</h1>
                <?php
              }
                 ?></div>
         

        </div>
      
    </div>
    
  </div>
  
</div>

<!-------------------------------------------Favourit List -------------------------->
<!----------------------------------------------------------------------------------->

<div id="modal-wrapper6" class="modal" style=";z-index: 80">
  
  <div class="modal-content animate " style="height: 84vh;">
        
    <div class="imgcontainer">
      <div class="container">
        <div class="row">
          <div class="list-name"
                onclick="document.getElementById('modal-wrapper5').style.display='block';
                        document.getElementById('modal-wrapper6').style.display='none'
                        document.getElementById('modal-wrapper7').style.display='none'
                        document.getElementById('mySidenav').style.width = '0'">
            Watch Later
          </div>
          <div class="list-name" style="background-color: rgba(201,28,85,0.8);"
                onclick="document.getElementById('modal-wrapper6').style.display='block';
                        document.getElementById('modal-wrapper5').style.display='none'
                        document.getElementById('modal-wrapper7').style.display='none'
                        document.getElementById('mySidenav').style.width = '0'">
            Favourite
          </div>
          <div class="list-name"
                onclick="document.getElementById('modal-wrapper7').style.display='block';
                        document.getElementById('modal-wrapper5').style.display='none'
                        document.getElementById('modal-wrapper6').style.display='none'
                        document.getElementById('mySidenav').style.width = '0'">
            History
          </div>
      <span onclick="document.getElementById('modal-wrapper6').style.display='none'" class="close" title="Close PopUp">&times;</span>
      </div>
      </div>
      </div>
       <div class="container">
        <div class="row" style="margin-top: 0px;align-items: left">
         <div class="col-md-12 mt-3"> 
          <button class="btn btn-danger mb-1" id="favremoveall" style="float: right;">Clear All</button></div>
       </div>
       <div class="container comments2 " id="fav" style="max-height: 60vh;background-color: rgba(0,0,0,0.0);">
        <?php
          //Search query.
          $selectfav = "SELECT * FROM favourite WHERE acount_id = '$accountid' ORDER BY added_at DESC ";
          //Search query.
          $ExecQuery5 = MySQLi_query($conn, $selectfav);
           if (mysqli_num_rows($ExecQuery5) > 0){ 

   while ($row = MySQLi_fetch_array($ExecQuery5)) {
      $favlistmovie = $row['movie_id'];
      $favtime =$row['added_at'];
       ?>
       <?php
       $selectfav2 = "SELECT * FROM movie WHERE id = '$favlistmovie' ";
          //Search query.
          $ExecQuery6 = MySQLi_query($conn, $selectfav2);

   while ($row2 = MySQLi_fetch_array($ExecQuery6)) {
      
       ?>
       
        <div class="row list">
          <div class="col-md-4 col-sm-6 col-xs-6 mov3" style="margin-top:15px; " >
        
          <p class="HD mqulity2" ><?php echo $row2['qulity'] ?></p>
          <p class="star stars3" >&#9733;<?php echo $row2['imdb'] ?></p>
          <a href="movie.php?action=<?php echo $favlistmovie ?>"><h2 class="Text2 text3" ><?php echo $row2['name'] ?></h2></a>
          
            
         <a href="movie.php?action=<?php echo $favlistmovie ?>"> <img class="poster2 movie " src="images/poster/<?php echo $row2['poster'] ?>"></a>
        
      </div>
        <div class="col-md-8 col-sm-6 col-xs-6">
          
          <a href="index.php?removefavmovie=<?php echo $favlistmovie ?>"  class="btn btn-danger" id="watchremove" style="margin-top: 15px; float: right;">Remove</a>
          <p class="vistedat">Added at :<?php echo $favtime ?></p>
          <input type="hidden" id="watchname" value="<?php echo $favlistmovie ?>" name="">
          <input type="hidden" id="watchusername" value="<?php echo $accountid ?>" name="">
        </div>
          </div>
        <?php  } 
                }
              }else{
                ?>
                <h1 class="nomovies">No movies Added Yet</h1>
                <?php
              }
                 ?></div>
         

        </div>
      
    </div>
    
  </div>
  
</div>

<!---------------------------------------------History------------------>
<!------------------------------------------------------------------------->
<div id="modal-wrapper7" class="modal" style=";z-index: 80">
  
  <div class="modal-content animate "  style="height: 84vh;">
        
    <div class="imgcontainer">
      <div class="container">
        <div class="row">
          <div class="list-name"
                onclick="document.getElementById('modal-wrapper5').style.display='block';
                        document.getElementById('modal-wrapper6').style.display='none'
                        document.getElementById('modal-wrapper7').style.display='none'
                        document.getElementById('mySidenav').style.width = '0'">
            Watch Later
          </div>
          <div class="list-name" 
                onclick="document.getElementById('modal-wrapper6').style.display='block';
                        document.getElementById('modal-wrapper5').style.display='none'
                        document.getElementById('modal-wrapper7').style.display='none'
                        document.getElementById('mySidenav').style.width = '0'">
            Favourite
          </div>
          <div class="list-name" style="background-color: rgba(201,28,85,0.8);"
                onclick="document.getElementById('modal-wrapper7').style.display='block';
                        document.getElementById('modal-wrapper5').style.display='none'
                        document.getElementById('modal-wrapper6').style.display='none'
                        document.getElementById('mySidenav').style.width = '0'">
            History
          </div>
      <span onclick="document.getElementById('modal-wrapper7').style.display='none'" class="close" title="Close PopUp">&times;</span>
      </div>
      </div>
      </div>
       <div class="container">
        <div class="row" style="margin-top: 0px;align-items: left">
         <div class="col-md-12 mt-3"> 
            <button class="btn btn-danger mb-1" id="historyremoveall" style="float: right;">Clear All</button></div>
       </div>
       <div class="container comments2 " id="history" style="max-height: 60vh;background-color: rgba(0,0,0,0.0);">
        <?php
          //Search query.
          $selecthistory = "SELECT * FROM history WHERE acount_id = '$accountid' ORDER BY history_date DESC ";
          //Search query.
          $ExecQuery8 = MySQLi_query($conn, $selecthistory);
           if (mysqli_num_rows($ExecQuery8) > 0){ 

   while ($row = MySQLi_fetch_array($ExecQuery8)) {
      $historylist = $row['movie_id'];
      $historytime =$row['history_date'];
      $historyid = $row['id'];
       ?>
       <?php
       $selecthistory2 = "SELECT * FROM movie WHERE id = '$historylist' ";
          //Search query.
          $ExecQuery9 = MySQLi_query($conn, $selecthistory2);

   while ($row2 = MySQLi_fetch_array($ExecQuery9)) {
      
       ?>
       
        <div class="row list">
          <div class="col-md-4 col-sm-6 col-xs-6 mov3" style="margin-top:15px; " >
        
          <p class="HD mqulity2" ><?php echo $row2['qulity'] ?></p>
          <p class="star stars3" >&#9733;<?php echo $row2['imdb'] ?></p>
          <a href="movie.php?action=<?php echo $historylist ?>"><h2 class="Text2 text3" ><?php echo $row2['name'] ?></h2></a>
          
            
         <a href="movie.php?action=<?php echo $historylist ?>"> <img class="poster2 movie " src="images/poster/<?php echo $row2['poster'] ?>"></a>
        
      </div>
        <div class="col-md-8 col-sm-6 col-xs-4">
          
          <a href="index.php?removehistory=<?php echo $historyid ?>"  class="btn btn-danger" id="watchremove" style="margin-top: 15px; float: right;">Remove</a>
          <p class="vistedat">Last Visted At :<?php echo $historytime ?></p>
          
          <input type="hidden" id="watchusername" value="<?php echo $accountid ?>" name="">
        </div>
          </div>
        <?php  } 
                }
              }else{
                ?>
                <h1 class="nomovies" >No movies Visted Yet</h1>
                <?php
              }
                 ?></div>
         

        </div>
      
    </div>
    
  </div>
  
</div>

<!-------------------------------------------------------------------------->
  <?php 
  
  if(isset($_SESSION["login"])){
    
  ?>
    <script type="text/javascript">
  document.getElementById('login').style.display='none';
</script>
    <?php
}elseif(isset($_SESSION["googlelogin"])){
    
  ?>
    <script type="text/javascript">
  document.getElementById('login').style.display='none';
  
</script>
<script type="text/javascript"></script>
<script type="text/javascript"></script>
    <?php
}else{ ?>

  <script type="text/javascript">
document.getElementById('mySidenav').style.display='none';
</script>

  <script type="text/javascript">
    document.getElementById('nav2').style.color='rgba(0,0,0,0.0)';
  </script>
  <?php
}

if(isset($_GET["editnamesuccess"])||isset($_GET['emptyname'])||isset($_GET['emptyemail'])||isset($_GET['takenemail'])
    ||isset($_GET['emptypass'])||isset($_GET['Invalidpass'])||isset($_GET['didnotmatch'])||isset($_GET['smallpass'])){ ?>

<script type="text/javascript">
  document.getElementById('modal-wrapper4').style.display='block'; 
</script>
<?php
}
?>

<?php

if(isset($_GET['emptyname'])){ ?>

<script type="text/javascript">
  document.getElementById('lastname').style.display='none';
  document.getElementById('newname').style.display='block'; 
</script>
<?php
}
?>
<?php

if(isset($_GET['emptyemail'])||isset($_GET['takenemail'])){ ?>

<script type="text/javascript">
  document.getElementById('newemail').style.display='block';
  document.getElementById('lastemail').style.display='none'; 
</script>
<?php
}

if(isset($_GET['emptypass'])||isset($_GET['Invalidpass'])||isset($_GET['didnotmatch'])||isset($_GET['smallpass'])){ ?>

<script type="text/javascript">
  document.getElementById('newpass').style.display='block';
  document.getElementById('lastpass').style.display='none'; 
</script>
<?php
}
?>

<?php

if(isset($_GET["Editemailsuccess"])||isset($_GET["Editpasssuccess"])){ 
  

  ?>

<script type="text/javascript">
  document.getElementById('modal-wrapper').style.display='block'; 
</script>
<?php
}
?>



<?php

if(isset($_GET['signup'])){ ?>

<script type="text/javascript">
  document.getElementById('modal-wrapper2').style.display='block';
</script>
<?php

  }elseif(isset($_GET['login'])){ ?>

<script type="text/javascript">
  document.getElementById('modal-wrapper').style.display='block';
</script>
<?php

  }elseif(isset($_GET['logout'])){
    // Initialize the session
session_start();

// For LogOut From Google Account.

 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();


 
// Redirect to index page.
header("location: index.php");
exit;
  }




if(isset($_SESSION["googlelogin"])){
  ?>
<script>
  document.getElementById('changcontent').style.display='none';
</script>
<script>
  document.getElementById('changcontent2').style.display='none';
</script>
<script>
  document.getElementById('changcontent3').style.display='none';
</script>
<script>
  document.getElementById('lastpass').style.display='none';
  </script>


  <?php
}


  ?>  
<?php
if(isset($_GET['removewatchmovie'])){
  ?>
<script type="text/javascript">
  document.getElementById('modal-wrapper5').style.display='block';
</script>
<script type="text/javascript">
   Swal.fire(
  'Successful Removed from Watch-later list',
  '',
  'success'
);
</script>
<?php
}
?>

<?php
if(isset($_GET['removefavmovie'])){
  ?>
<script type="text/javascript">
  document.getElementById('modal-wrapper6').style.display='block';
</script>
<script type="text/javascript">
   Swal.fire(
  'Successful Removed from Favourit list',
  '',
  'success'
);
</script>
<?php
}
?>  


<?php
if(isset($_GET['removehistory'])){
  ?>
<script type="text/javascript">
  document.getElementById('modal-wrapper7').style.display='block';
</script>
<script type="text/javascript">
   Swal.fire(
  'Successful Removed from History list',
  '',
  'success'
);
</script>
<?php
}
?>