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
   if(isset($_POST['username18'])){
   $request = $_POST['request'];
   $username = $_POST['username18'];
       
          

$sql = "INSERT INTO request (request_text, acount_id)
VALUES ('$request', '$username')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    
} else {
   
}}

?>