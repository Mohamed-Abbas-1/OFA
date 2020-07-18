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
$moviename = $_POST['moviename12'];
   $username = $_POST['username12'];
   
   $query = "SELECT id FROM rating WHERE movie_id = '$moviename' AND acount_id = '$username'";
    $testlist = mysqli_query($conn , $query);

    if (mysqli_num_rows($testlist) > 0){ 
      while ($row = MySQLi_fetch_array($testlist)) {
      $id = $row['id'];
      }
      $query2 = "DELETE  FROM rating WHERE id = '$id'";
    
      if (mysqli_query($conn, $query2)) {
      
      }
      $sql = "INSERT INTO rating (movie_id, acount_id,rating_dislike)
VALUES ('$moviename', '$username',1)";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    
}

    }else{ 

$sql = "INSERT INTO rating (movie_id, acount_id,rating_dislike)
VALUES ('$moviename', '$username',1)";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    
}
}
}
?>