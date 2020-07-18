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

if(isset($_POST['username4'])){
   
   $username = $_POST['username4'];

   $query = "DELETE  FROM watch_later WHERE acount_id= '$username' ";
    
      if (mysqli_query($conn, $query)) {
      
      }
  }

?>