<?php

if(isset($_POST['name1']) && isset($_POST['name2']) && isset($_POST['description'])&& isset($_POST['poster'])){
  $name = $_POST['name1'];
  $name2 = $_POST['name2'];
  $description = $_POST['description'];
  $poster = $_POST['poster'];
  $wideposter = $_POST['wideposter'];
  $imdb = $_POST['imdb'];
  $imdburl = $_POST['imdburl'];
  $country = $_POST['country'];
  $qulity = $_POST['qulity'];
  $trailer = $_POST['trailer'];
  $period = $_POST['period'];
  $torrent = $_POST['torrent'];
  $rlease = $_POST['rlease']; 
  $server1 = $_POST['server1']; 
  $server2 = $_POST['server2']; 
  $released = $_POST['released'];
?>

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

$sql = "INSERT INTO movie (name, name2,desciption,poster,wide_poster,qulity,country,release_date,is_released,imdb,imdb_link,trailer,period,torrent,server1,server2)
VALUES ('$name', '$name2','$description','$poster','$wideposter','$qulity','$country','$rlease','$released','$imdb','$imdburl','$trailer','$period','$torrent','$server1','$server2')";

if (mysqli_query($conn, $sql)) {
    

    $sql2 = "SELECT id FROM movie WHERE name = '$name' AND name2 = '$name2' AND poster = '$poster' AND desciption = '$description' ";
    $fetchmovie = mysqli_query($conn , $sql2);

    while ($row =MySQLi_fetch_array($fetchmovie))  {
        
        $id=$row['id'];
}



?>
            <script>
                window.location.replace("../addcat.php?action=<?php echo $id ?>");
            </script>
            <?php

    
}else{
	?>
            <script>
                window.location.replace("../addmovie.php?Failed");
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
