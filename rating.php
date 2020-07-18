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

$moviename = $_POST['moviename10'];
   $username = $_POST['username10'];
   $rating = $_POST['ratingmovie'];
   

$sql = "INSERT INTO rating (movie_id, acount_id,rating)
VALUES ('$moviename', '$username','$rating')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    
}

?>