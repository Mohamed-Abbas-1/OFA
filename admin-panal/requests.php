<?php include'panalheader.php' ?>
<div class="container">
	<div class="row">
		
<div class="col-sm-6 col-xs-12 body_container">
<div class="panal_body">
	<div class="addmoviebody" style="min-height: 70vh;">
		
		<div class="row" style="">
		<button class="btn btn-secondary" style="float: left;margin-top: 2vh;margin-left: 2vw;margin-bottom: 0vh;" onclick="window.location.replace('home.php');">Back</button>
	</div>
<div style="margin-top: 2vh;font-size: ">
<?php




   $Query = "SELECT * FROM request  ORDER BY request_date DESC";
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
        $text= $Result['request_text'];
        $accid = $Result['acount_id'];
        $date = $Result['request_date'];
      ?>
      <?php
      $Query2 = "SELECT * FROM account  WHERE account.id = '$accid' ";
//Query execution

   $ExecQuery2 = MySQLi_query($con, $Query2);
   while ($Result2 = MySQLi_fetch_array($ExecQuery2)) {
      $name = $Result2['user_name'];
      $email = $Result2['email'];
      $image = $Result2['picture'];
      $type = $Result2['type'];

   
   ?>
   <?php
        if ($type == 'user' || $type == 'Admin') {
          $image2 = "../icons/".$Result2['picture']; 
        }elseif ($type == 'googleuser') {
          $image2 = $Result2['picture'];
        }
      ?>
      <div class="container">
      <div class="row" style="padding-bottom: 25px;border-bottom: 1px solid grey;">
       
          <div class="col-sm-1" style="text-align: left;"> <a  href="deleteaccount.php?action=<?php echo $accid; ?>"><img src="<?php echo $image2 ?>" style="width: 50px;height: 50px;margin-top: 15px;"></a> </div>
          <div class="col-sm-8 " style="text-align: left;margin-left: -15px;">  <a  class="request_name" href="deleteaccount.php?action=<?php echo $accid; ?>"><?php echo $name; ?> </a> <span style="color:#656c7a;font-size: 12px; ">• 2019-05-03 13:44:43</span> 
            <div style="font-size: 15px;margin-top: 10px;"><?php echo $text; ?></div>
          </div>
           
        
      </div>
    </div>
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
   <?php

} }

}else { ?>
   NO Requests Sent Yet 
<?php
} 
?>

</div>
</div>
</div>
</div></div>