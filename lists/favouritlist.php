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
   if(isset($_POST['username4'])){
   $moviename = $_POST['moviename4'];
   $username = $_POST['username4'];
       
$query = "SELECT id FROM favourite WHERE movie_id = '$moviename' AND acount_id = '$username'";
    $testlist = mysqli_query($conn , $query);

    if (mysqli_num_rows($testlist) > 0){ 
      while ($row = MySQLi_fetch_array($testlist)) {
      $id = $row['id'];
      }
      $query2 = "DELETE  FROM favourite WHERE id = '$id'";
    
      if (mysqli_query($conn, $query2)) {
      
      }
      $sql = "INSERT INTO favourite (movie_id, acount_id)
VALUES ('$moviename', '$username')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    
}

    }else{            

$sql = "INSERT INTO favourite (movie_id, acount_id)
VALUES ('$moviename', '$username')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    
} else {
   
}}
}
?>