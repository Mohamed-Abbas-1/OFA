<?php

$con = MySQLi_connect(
   "localhost", //Server host name.
   "root", //Database username.
   "", //Database password.
   "ofa" //Database name or anything you would like to call it.
);
//Check connection
if (MySQLi_connect_errno()) {
   echo "Failed to connect to MySQL: " . MySQLi_connect_error();
}
if(isset($_POST['moviename15'])){
$moviename = $_POST['moviename15'];
$username = $_POST['username15'];

$addhistory = "INSERT INTO history (movie_id, acount_id)
VALUES ('$moviename', '$username')";

if (mysqli_query($con, $addhistory)) {
}

}

?>