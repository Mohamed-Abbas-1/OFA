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

if(isset($_POST['moviename'])){
   
   $moviename = $_POST['moviename'];

   $query = "DELETE  FROM favourite WHERE movie_id= '$moviename' ";
    
      if (mysqli_query($conn, $query)) {
      
      }

      $query2 = "DELETE  FROM history WHERE movie_id= '$moviename' ";
    
      if (mysqli_query($conn, $query2)) {
      
      }

      $query3 = "DELETE  FROM watch_later WHERE movie_id= '$moviename' ";
    
      if (mysqli_query($conn, $query3)) {
      
      }

      $query4 = "DELETE  FROM comment WHERE movie_id= '$moviename' ";
    
      if (mysqli_query($conn, $query4)) {
      
      }

      $query5 = "DELETE  FROM rating WHERE movie_id= '$moviename' ";
    
      if (mysqli_query($conn, $query5)) {
      
      }

       $query6 = "DELETE  FROM movie_cat WHERE movie_id= '$moviename' ";
    
      if (mysqli_query($conn, $query6)) {
      
      }

      $query7 = "DELETE  FROM movie_actor WHERE movie_id= '$moviename' ";
    
      if (mysqli_query($conn, $query7)) {
      
      }

      $query8 = "DELETE  FROM movie WHERE id= '$moviename' ";
    
      if (mysqli_query($conn, $query8)) {
      
      }



  }

?>