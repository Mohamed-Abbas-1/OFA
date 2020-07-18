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

if(isset($_POST['username12'])){
   
   $username12 = $_POST['username12'];

   $query = "DELETE  FROM favourite WHERE acount_id= '$username12' ";
    
      if (mysqli_query($conn, $query)) {
      
      }

      $query2 = "DELETE  FROM history WHERE acount_id= '$username12' ";
    
      if (mysqli_query($conn, $query2)) {
      
      }

      $query3 = "DELETE  FROM watch_later WHERE acount_id= '$username12' ";
    
      if (mysqli_query($conn, $query3)) {
      
      }

      $query4 = "DELETE  FROM comment WHERE acount_id= '$username12' ";
    
      if (mysqli_query($conn, $query4)) {
      
      }

      $query5 = "DELETE  FROM rating WHERE acount_id= '$username12' ";
    
      if (mysqli_query($conn, $query5)) {
      
      }

       $query6 = "DELETE  FROM request WHERE acount_id= '$username12' ";
    
      if (mysqli_query($conn, $query6)) {
      
      }

      $query8 = "DELETE  FROM account WHERE id= '$username12' ";
    
      if (mysqli_query($conn, $query8)) {
      
      }



  }

?>