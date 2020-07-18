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
   if(isset($_POST['actorname'])){
   $actorname = $_POST['actorname'];
   $actorimage = $_POST['actorimage']; 
   $movieid2 = $_POST['movieid2'];    
$query = "SELECT id FROM actor WHERE actor_name = '$actorname' ";
    $testlist = mysqli_query($conn , $query);

    if (mysqli_num_rows($testlist) > 0){ 
      

    }else{            

$sql = "INSERT INTO actor (actor_name, actor_pic)
VALUES ('$actorname', '$actorimage')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    
} else {
   
}
}
}
?>