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
  // end while


   $Query = "SELECT * FROM movie WHERE name LIKE '%$Name%' ORDER BY created_at DESC";
//Query execution

   $ExecQuery = MySQLi_query($con, $Query);
//Creating unordered list to display result.
  if (mysqli_num_rows($ExecQuery) > 0) {
   //Fetching result from database.
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
   <!-- Creating unordered list items.
        Calling javascript function named as "fill" found in "script.js" file.
        By passing fetched result as parameter. -->
   
    <?php $id3= $Result['id'];
        $name2= $Result['name'];
      ?>
      <div class="col-md-12" style="text-align: left;font-size: 15px; ">
   <a class="dropdown-item search-iteam"  href="deletemovie.php?action=<?php echo $id3; ?>" >
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
   <img class="img-search" src="../images/poster/<?php echo $Result['poster']; ?>" >
       <span >
       <strong style="font-weight: 600"><?php echo $Result['name']; ?></strong>
        <br>
        <span class="darkest">
        <strong><?php echo $Result['release_date'];  ?></strong>
       </span>
       </span>
</a>
 </div>
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
   <?php

}

}else { ?>
    <a class="dropdown-item search-iteam" style="color: black;text-align: center;">NO Movies With Name (<?php echo $Name; ?>) </a>
<?php
}} 
?>
