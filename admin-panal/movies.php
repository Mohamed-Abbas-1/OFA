<?php include'panalheader.php' ?>
<div class="container">
	<div class="row">
		
<div class="col-sm-6 col-xs-12 body_container">
<div class="panal_body">
	<div class="addmoviebody" style="min-height: 70vh;">
		
		<div class="row" style="">
		<button class="btn btn-secondary" style="float: left;margin-top: 2vh;margin-left: 2vw;margin-bottom: 0vh;" onclick="window.location.replace('home.php');">Back</button>
	</div>
<div style="margin-top: 2vh;">
<?php




   $Query = "SELECT * FROM movie  ORDER BY created_at DESC";
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
   NO Movies Added Yet 
<?php
} 
?>

</div>
</div>
</div>
</div></div>