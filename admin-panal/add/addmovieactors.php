<?php

if (isset($_GET['action']) && isset($_POST['search'])){
	$movieid = $_GET['action'];
	echo $movieid;

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

if (isset($_POST['search']) ) {
	$search = $_POST['search'];

	
 $sql2 = "SELECT id FROM actor WHERE actor_name = '$search'  ";
    $fetchmovie = mysqli_query($conn , $sql2);
if (mysqli_num_rows($fetchmovie) > 0){ 
    while ($row =MySQLi_fetch_array($fetchmovie))  {
        
        $id=$row['id'];
        

} 
$sql = "INSERT INTO movie_actor (movie_id, actor_id)
VALUES ('$movieid', '$id')";

if (mysqli_query($conn, $sql)) {
} }else{
	?>
            <script>
                window.location.replace("../addactor.php?action=<?php echo $movieid ?>&Failed");
            </script>
            <?php
}


	$search2 = $_POST['search2'];

	
 $sql3 = "SELECT id FROM actor WHERE actor_name = '$search2'  ";
    $fetchmovie2 = mysqli_query($conn , $sql3);
if (mysqli_num_rows($fetchmovie2) > 0){ 
    while ($row2 =MySQLi_fetch_array($fetchmovie2))  {
        
        $id2=$row2['id'];
        } 
$sql4 = "INSERT INTO movie_actor (movie_id, actor_id)
VALUES ('$movieid', '$id2')";

if (mysqli_query($conn, $sql4)) {
} }


	$search3 = $_POST['search3'];

	
 $sql5 = "SELECT id FROM actor WHERE actor_name = '$search3'  ";
    $fetchmovie3 = mysqli_query($conn , $sql5);
if (mysqli_num_rows($fetchmovie3) > 0){ 
    while ($row3 =MySQLi_fetch_array($fetchmovie3))  {
        
        $id3=$row3['id'];
        } 
$sql6 = "INSERT INTO movie_actor (movie_id, actor_id)
VALUES ('$movieid', '$id3')";

if (mysqli_query($conn, $sql6)) {
} }


	$search4 = $_POST['search4'];

	
 $sql7 = "SELECT id FROM actor WHERE actor_name = '$search4'  ";
    $fetchmovie4 = mysqli_query($conn , $sql7);
if (mysqli_num_rows($fetchmovie4) > 0){ 
    while ($row4 =MySQLi_fetch_array($fetchmovie4))  {
        
        $id4=$row4['id'];
        } 
$sql8 = "INSERT INTO movie_actor (movie_id, actor_id)
VALUES ('$movieid', '$id4')";

if (mysqli_query($conn, $sql8)) {
} }


	$search5 = $_POST['search5'];

	
 $sql9 = "SELECT id FROM actor WHERE actor_name = '$search5'  ";
    $fetchmovie5 = mysqli_query($conn , $sql9);
    if (mysqli_num_rows($fetchmovie5) > 0){ 
    while ($row5 =MySQLi_fetch_array($fetchmovie5))  {
        
        $id5=$row5['id'];
        } 
$sql10 = "INSERT INTO movie_actor (movie_id, actor_id)
VALUES ('$movieid', '$id5')";

if (mysqli_query($conn, $sql10)) {
} }


?>

            <script>
                window.location.replace("../addmoviecomplete.php?action=<?php echo $movieid ?>");
            </script>
            <?php
}
}else{
	?>
            <script>
                window.location.replace("../addmovie.php?Failed");
            </script>
            <?php
}
?>