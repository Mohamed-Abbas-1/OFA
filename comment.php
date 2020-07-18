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

//Search box value assigning to $Name variable.
   if(isset($_POST['comment'])){
   $comment = $_POST['comment'];
   $moviename = $_POST['moviename'];
   $username = $_POST['username'];
                   

$sql = "INSERT INTO comment (movie_id, acount_id, comment)
VALUES ('$moviename', '$username', '$comment')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    
} else {
   
}}

?>