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
if(isset($_POST['moviename13'])){
$moviename = $_POST['moviename13'];

$query = "SELECT viewers FROM movie WHERE id = '$moviename'";
$watch = mysqli_query($conn , $query);
 while ($row = MySQLi_fetch_array($watch)) {
      $viewersnum = $row['viewers'];
      }

$newviewersnum = $viewersnum + 1 ;
$query2 = "UPDATE movie  SET viewers = '$newviewersnum' WHERE id = '$moviename'";
    
      if (mysqli_query($conn, $query2)) {
      
      }

}
?>