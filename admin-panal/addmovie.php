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
	<form method="post" action="add/adddetails.php">
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
		<div class="row">
	<div class="col-md-12 " style="margin-bottom: 3vh;">
		<div style="float: left;">
		<label style="margin-right: 5px;"> Title Name :</label>
		<input class="movietextbox " type="text"  placeholder="Title name" name="name1" required>
	</div>
</div>
	</div>
	<div class="row">
	<div class="col-md-12 " style="margin-bottom: 3vh;">
	<div style="float: left;">
		<label style="margin-right: 15px;"> Full Name :</label>
		<input class="movietextbox " type="text"  placeholder="Full Name" name="name2" required>
	</div>
</div>
</div>

<div class="row">
	<div class="col-md-12 " style="margin-bottom: 3vh;">
	<div style="float: left;">
		<label style="margin-right: "> Description :</label>
		<input class="movietextbox " type="text" name="description" placeholder="Description" required>
	</div>
</div>
</div>

<div class="row">
	<div class="col-md-12 " style="margin-bottom: 3vh;">
	<div style="float: left;">
		<label style="margin-right: "> Poster Image :</label>
		<input class="btn btn-secondary" type="file" name="poster" required>
	</div>
</div>
</div>

<div class="row">
	<div class="col-md-12 " style="margin-bottom: 3vh;">
	<div style="float: left;">
		<label style="margin-right:22px "> Slide Image :</label>
		<input class="btn btn-secondary" type="file" name="wideposter">
	</div>
</div>
</div>

<div class="row">
	<div class="col-md-12 " style="margin-bottom: 3vh;">
	<div style="float: left;">
		<label style="margin-right:10px "> IMDb Rate :</label>
		<input class="movietextbox " type="text" name="imdb"  maxlength="3" placeholder="IMDb Rate">
	</div>
</div>
</div>

<div class="row">
	<div class="col-md-12 " style="margin-bottom: 3vh;">
	<div style="float: left;">
		<label style="margin-right:13px "> IMDb Link :</label>
		<input class="movietextbox " type="url" name="imdburl"   placeholder="IMDb Link">

	</div>
</div>
</div>

<div class="row">
	<div class="col-md-12 " style="margin-bottom: 3vh;">
	<div style="float: left;">
		<label style="margin-right:14px "> Country :</label>
		<input type="radio" name="country" value="United States" checked required> United States
  		<input style="margin-left: 24px" type="radio" name="country" value="United Kingdom"> United Kingdom
  		<input style="margin-left: 24px" type="radio" name="country" value="Asia"> Asia
  		<input style="margin-left: 24px" type="radio" name="country" value="Japan"> Japan
  		<input style="margin-left: 24px" type="radio" name="country" value="Korean"> Korean
  		<input style="margin-left: 24px" type="radio" name="country" value="Egypt"> Egypt
  		<br>
  		<input style="margin-left: 24px" type="radio" name="country" value="China"> China
  		<input style="margin-left: 24px" type="radio" name="country" value="India"> India
	</div>
</div>
</div>

<div class="row">
	<div class="col-md-12 " style="margin-bottom: 3vh;">
	<div style="float: left;">
		<label style="margin-right:38px "> Qulity :</label>
		<input type="radio" name="qulity" value="HD 720"  checked> HD 720
  		<input style="margin-left: 24px" type="radio" name="qulity" value="Bluray" > Bluray
  		<input style="margin-left: 24px" type="radio" name="qulity" value="FHD 1080"> FHD 1080
  		<input style="margin-left: 24px" type="radio" name="qulity" value="SD"> SD
  		<input style="margin-left: 24px" type="radio" name="qulity" value="HD cam"> HD cam
  		<input style="margin-left: 24px" type="radio" name="qulity" value="TS"> TS
	</div>
</div>
</div>

<div class="row">
	<div class="col-md-12 " style="margin-bottom: 3vh;">
	<div style="float: left;">
		<label style="margin-right:10px "> Trailer Link:</label>
		<input class="movietextbox " type="url" name="trailer"   placeholder="Trailer Link" required>

	</div>
</div>
</div>

<div class="row">
	<div class="col-md-12 " style="margin-bottom: 3vh;">
	<div style="float: left;">
		<label style="margin-right:10px "> period :</label>
		<input class="movietextbox " type="number" name="period"   min="1" max="1000">
	</div>
</div>
</div>

<div class="row">
	<div class="col-md-12 " style="margin-bottom: 3vh;">
	<div style="float: left;">
		<label style="margin-right:10px "> Torrent:</label>
		<input class="btn btn-secondary" type="file" name="torrent">
	</div>
</div>
</div>


<div class="row">
	<div class="col-md-12 " style="margin-bottom: 3vh;">
	<div style="float: left;">
		<label style="margin-right:10px "> Release Date:</label>
		<input class="movietextbox " type="number" name="rlease"   min="1900" max="2100">
	</div>
</div>
</div>

<div class="row">
	<div class="col-md-12 " style="margin-bottom: 3vh;">
	<div style="float: left;">
		<label style="margin-right:10px "> Server 1:</label>
		<input class="btn btn-secondary" type="file" name="server1" required>
	</div>
</div>
</div>

<div class="row">
	<div class="col-md-12 " style="margin-bottom: 3vh;">
	<div style="float: left;">
		<label style="margin-right:10px "> Server 2:</label>
		<input class="movietextbox " type="url" name="server2"   placeholder="Server Link" required>

	</div>
	
</div>
</div>

<div class="row">
	<div class="col-md-12 " style="margin-bottom: 3vh;">
	<div style="float: left;">
		<label style="margin-right:38px "> Already Rleased :</label>
		<input type="radio" name="released" value="Yes" checked > Yes
  		<input style="margin-left: 24px" type="radio" name="released" value="No"> No
  		
	</div>
</div>
</div>

<div class="row">
	<div class="col-md-12">
		<input class="btn btn-secondary" style="font-size: 20px;float: right;" type="submit" name="AddMovie" value="Next">
	</div>
</div>

	</div>
	</div>
</div>

</form>
</div>
</div>
</div>