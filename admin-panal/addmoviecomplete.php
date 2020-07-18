<?php
	include 'panalheader.php';
?>

<?php
  
  
    if (isset($_GET['action'])) {
      $id = $_GET['action'];
    }else{
      ?>
            <script>
                window.location.replace("addmovie.php");
            </script>
            <?php
    } 
?>

<?php

$Query2 = "SELECT name FROM movie WHERE id LIKE '$id'  ";
//Search query.
   $ExecQuery2 = MySQLi_query($con, $Query2);
   
   while ($Result2 = MySQLi_fetch_array($ExecQuery2)) {
      $name3= $Result2['name'];
    }
?>

<script type="text/javascript">
                     Swal.fire(
  'Successful Added <?php echo $name3 ?> to Movies list',
  '',
  'success'
);
</script>
<div class="container">
	<div class="row">
		
<div class="col-sm-6 col-xs-12 body_container">
	<form method="post" action="addmoviecomplete.php">
<div class="panal_body">
	<div class="addmoviebody">
		<div style="margin-top: 3vh;font-size: 30px;">Add Movie</div>
		<div class="container">
		
        
            <div class="row bs-wizard" style="border-bottom:0;text-align: center;margin-left: 12vw;margin-top: 3vh;margin-bottom: 3vh;">
                
                <div class="col-xs-2 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <li href="#" class="bs-wizard-dot"></li>
                  <div class="bs-wizard-info text-center" >Upload movie resources &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                </div>

                <div class="col-xs-2 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <li href="#" class="bs-wizard-dot"></li>
                  <div class="bs-wizard-info text-center" >Add Movie details &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                </div>
                
                <div class="col-xs-2 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <li href="#" class="bs-wizard-dot"></li>
                  <div class="bs-wizard-info text-center">&nbsp;&nbsp;&nbsp;&nbsp;Add Categories&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                </div>
                
                
                
                <div class="col-xs-2 bs-wizard-step complete"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <li href="#" class="bs-wizard-dot"></li>
                  <div class="bs-wizard-info text-center">&nbsp;&nbsp;&nbsp;&nbsp; Add Stars&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                </div>

                <div class="col-xs-2 bs-wizard-step complete"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 5</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <li href="#" class="bs-wizard-dot"></li>
                  <div class="bs-wizard-info text-center" style="margin-left: ">&nbsp;&nbsp;&nbsp;&nbsp; Done &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                </div>
            </div>

<div style="margin-top: 20vh;margin-bottom: 25vh;font-size: 30px;">Add Movie <?php echo $name3 ?> Completed</div>

 </div>
  </div>
</div>




</form>
</div>
</div>
</div>