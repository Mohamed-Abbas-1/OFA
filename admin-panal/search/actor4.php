
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

if (isset($_POST['search'])) {
//Search box value assigning to $Name variable.
   $Name = $_POST['search'];
   //Search query.
   $Query2 = "SELECT * FROM actor WHERE actor_name LIKE '%$Name%' ORDER BY id DESC LIMIT 7 ";
//Search query.
   $ExecQuery2 = MySQLi_query($con, $Query2);
   if (mysqli_num_rows($ExecQuery2) > 0) {
   while ($Result2 = MySQLi_fetch_array($ExecQuery2)) {
   		$name3= $Result2['actor_name'];
       ?>
       <div class="col-md-12" style="text-align: left;font-size: 20px;">
        
       <div class="dropdown-item search-iteam" style="cursor: pointer;" onclick='fill4("<?php echo $Result2['actor_name']; ?>")' >
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
   		<img class="img-searchactor"  src="../images/actors/<?php echo $Result2['actor_pic']; ?>" >
       <span >
       <strong ><?php echo $Result2['actor_name']; ?></strong> </span> </div>
     
   </div>

  <?php

} // end while

} ?>
    <div class="dropdown-item " style="text-align: center;background-color: rgba(0,0,0,0.6);border:transparent;font-size: 20px;cursor: pointer;" onclick="document.getElementById('addnewactor').style.display='block';document.getElementById('display4').style.display='none'"><strong>Add New Actor</strong></div>
<?php
} 
?>
