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
   $Query2 = "SELECT * FROM cat WHERE cat_name LIKE '%$Name%' LIMIT 5 ";
//Search query.
   $ExecQuery2 = MySQLi_query($con, $Query2);

   while ($Result2 = MySQLi_fetch_array($ExecQuery2)) {
   		$name3= $Result2['cat_name'];
       ?>
       <div >
       <div class="dropdown-item search-iteam" style="cursor: pointer;" onclick='fill4("<?php echo $Result2['cat_name']; ?>")'>
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
   		
       <span >
       <strong ><?php echo $Result2['cat_name']; ?></strong> </span> </div>
  <?php

} // end while


  

} 
?>