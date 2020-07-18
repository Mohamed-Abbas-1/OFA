<?php
	include 'panalheader.php';
?>

<?php

if (isset($_GET['Failed'])) {
	
	?>
	<script>
		$(document).ready(function() {
	Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'Something Got Wrong,Please try again later!',
  
});
	});
</script>
<?php
}

?>
<div class="container">
	<div class="row">
		
<div class="col-sm-6 col-xs-12 body_container">
	
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

                <div class="col-xs-2 bs-wizard-step disabled">
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <li href="#" class="bs-wizard-dot"></li>
                  <div class="bs-wizard-info text-center" >Add Movie details &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                </div>
                
                <div class="col-xs-2 bs-wizard-step disabled"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <li href="#" class="bs-wizard-dot"></li>
                  <div class="bs-wizard-info text-center">&nbsp;&nbsp;&nbsp;&nbsp;Add Categories&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                </div>
                
                
                
                <div class="col-xs-2 bs-wizard-step disabled"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <li href="#" class="bs-wizard-dot"></li>
                  <div class="bs-wizard-info text-center">&nbsp;&nbsp;&nbsp;&nbsp; Add Stars&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                </div>

                <div class="col-xs-2 bs-wizard-step disabled"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 5</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <li href="#" class="bs-wizard-dot"></li>
                  <div class="bs-wizard-info text-center" style="margin-left: ">&nbsp;&nbsp;&nbsp;&nbsp; Done &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                </div>
            </div>
		<div></div>
    <?php
    if(isset($_POST["postersubmit"])) {
$target_dir = "../images/poster/";
$target_file = $target_dir . basename($_FILES["poster"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

  

// Check if file already exists
if (file_exists($target_file)) {
    echo " file already exists.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else{
if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["poster"]["name"]). " has been uploaded.";
      }else {
        echo "Sorry, there was an error uploading your file.";
}
}
}
?>
		<div class="row">
  <div class="col-md-12 " style="margin-bottom: 3vh;">
  <div style="float: left;">
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <label style="margin-right:10px "> Poster:</label>
    <input class="btn btn-secondary" type="file" name="poster" id="poster"  style="margin-left: 67px;">
    <input class="btn btn-success" style="margin-left: 20px;" type="submit" name="postersubmit" value="Upload Poster">
  </form>
  </div>
</div>
</div>


<?php
    if(isset($_POST["widepostersubmit"])) {
$target_dir = "../images/WidePoster/";
$target_file = $target_dir . basename($_FILES["wideposter"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

  

// Check if file already exists
if (file_exists($target_file)) {
    echo " file already exists.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else{
if (move_uploaded_file($_FILES["wideposter"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["wideposter"]["name"]). " has been uploaded.";
      }else {
        echo "Sorry, there was an error uploading your file.";
}
}
}
?>
    <div class="row">
  <div class="col-md-12 " style="margin-bottom: 3vh;">
  <div style="float: left;">
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <label style="margin-right:10px "> Slide Poster:</label>
    <input class="btn btn-secondary" type="file" name="wideposter" id="wideposter">
    <input class="btn btn-success" style="margin-left: 20px;" type="submit" name="widepostersubmit" value="Upload Slide poster">
  </form>
  </div>
</div>
</div>






<?php
    if(isset($_POST["torrentsubmit"])) {
$target_dir = "../torrent/";
$target_file = $target_dir . basename($_FILES["torrent"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

  

// Check if file already exists
if (file_exists($target_file)) {
    echo " file already exists.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else{
if (move_uploaded_file($_FILES["torrent"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["torrent"]["name"]). " has been uploaded.";
      }else {
        echo "Sorry, there was an error uploading your file.";
}
}
}
?>
    <div class="row">
  <div class="col-md-12 " style="margin-bottom: 3vh;">
  <div style="float: left;">
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <label style="margin-right:10px "> Torrent:</label>
    <input class="btn btn-secondary" type="file" name="torrent" id="torrent" style="margin-left: 60px;">
    <input class="btn btn-success" style="margin-left: 20px;" type="submit" name="torrentsubmit" value="Upload torrent">
  </form>
  </div>
</div>
</div>


   <?php
    if(isset($_POST["Serversubmit"])) {
$target_dir = "../Movies/";
$target_file = $target_dir . basename($_FILES["Server"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

  

// Check if file already exists
if (file_exists($target_file)) {
    echo " file already exists.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else{
if (move_uploaded_file($_FILES["Server"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["Server"]["name"]). " has been uploaded.";
      }else {
        echo "Sorry, there was an error uploading your file.";
}
}
}
?>
    <div class="row">
  <div class="col-md-12 " style="margin-bottom: 3vh;">
  <div style="float: left;">
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <label style="margin-right:10px "> Server 1:</label>
    <input class="btn btn-secondary" type="file" name="Server" id="Server"  style="margin-left: 48px;">
    <input class="btn btn-success" style="margin-left: 20px;" type="submit" name="Serversubmit" value="Upload Movie">
  </form>
  </div>
</div>
</div>


<div class="row">
  <div class="col-md-12">
    <a href="addmovie.php" class="btn btn-secondary" style="font-size: 20px;float: right;" value="Next">Next</a>
  </div>
</div>
  </div>
  </div>
</div>

</div>
</div>
</div>