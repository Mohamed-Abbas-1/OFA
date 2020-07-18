<?php

$conn = MySQLi_connect(
   "localhost", //Server host name.
   "root", //Database username.
   "", //Database password.
   "ofa" //Database name or anything you would like to call it.
);
//Check connection
if (MySQLi_connect_errno()) {
   echo "Failed to connect to MySQL: " . MySQLi_connect_error();
}

if(isset($_POST['username6'])){
   
   $username = $_POST['username6'];

   $query = "DELETE  FROM favourite WHERE acount_id= '$username' ";
    
      if (mysqli_query($conn, $query)) {
      
      }
  }

?>