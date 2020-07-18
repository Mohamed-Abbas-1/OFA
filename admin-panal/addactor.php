<?php
  include 'panalheader.php';
?>

<?php
  
  
    if (isset($_GET['action'])) {
      $id = $_GET['action'];
    }elseif(isset($_GET['addedimage'])){
      ?>
      <script>
        $(document).ready(function() {
            $("#addnewactor").show();
          });
      </script>
 <?php   
    }else{
      ?>
            <script>
                window.location.replace("addmovie.php");
            </script>
            <?php
    } 
?>
<input id="movieid2" type="hidden" value="<?php echo $id ?>" name="">
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

<script>
          /*
           Search engine script
          */
function fill(Value) {
   //Assigning value to "search" div in "search.php" file.
   $('#search').val(Value);
   //Hiding "display" di v in "search.php" file.
   $('#display').hide();
} 
$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#search").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#search').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#display").html("");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "search/actor1.php",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#display").html(html).show();

               }
           });
       }
   });
});





</script>

<script>

function fill2(Value) {
   //Assigning value to "search" div in "search.php" file.
   $('#search2').val(Value);
   //Hiding "display" di v in "search.php" file.
   $('#display2').hide();
} 
$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#search2").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#search2').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#display2").html("");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "search/actor2.php",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#display2").html(html).show();
               }
           });
       }
   });
});





</script>


<script>

function fill3(Value) {
   //Assigning value to "search" div in "search.php" file.
   $('#search3').val(Value);
   //Hiding "display" di v in "search.php" file.
   $('#display3').hide();
} 
$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#search3").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#search3').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#display3").html("");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "search/actor3.php",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#display3").html(html).show();
               }
           });
       }
   });
});

</script>

<script>

function fill4(Value) {
   //Assigning value to "search" div in "search.php" file.
   $('#search4').val(Value);
   //Hiding "display" di v in "search.php" file.
   $('#display4').hide();
} 
$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#search4").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#search4').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#display4").html("");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "search/actor4.php",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#display4").html(html).show();
               }
           });
       }
   });
});

</script>

<script>

function fill5(Value) {
   //Assigning value to "search" div in "search.php" file.
   $('#search5').val(Value);
   //Hiding "display" di v in "search.php" file.
   $('#display5').hide();
} 
$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#search5").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#search5').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#display5").html("");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "search/actor5.php",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#display5").html(html).show();
               }
           });
       }
   });
});

</script>

<script>

$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#addactorbtn").click(function() { 
       //Assigning search box value to javascript variable named as "name".
       var actorname = $('#actor_name2').val();
       var actorimage2 = $('#newactorimage').val();
       var actorimage = actorimage2.replace("C:\\fakepath\\", "");
       var movieid2 = $('#movieid2').val(); 
       //Validating, if "comment" is empty.
       if(actorname ==""){
            Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'You have to add actor name!',
  
});
       

       //If commenttext is not empty.
       }else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "comment.php".
               url: "add/newactor.php",
               //Data, that will be sent to "comment.php".
               data: {
                   //Assigning value of "moviename2 and other" into "moviename2 and other" variable.
                   
                   actorname: actorname,
                   actorimage: actorimage,
                   movieid2:movieid2
               },
               //If result found, this funtion will be called.
               success: function(addactor) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#addnewactor2").hide();
                /*   setTimeout(function() {
$("#fav").load(location.href+" #fav>*"+"");
}, 1); */
                    Swal.fire(
  'Successful Added to Actors list',
  '',
  'success'
);
 }
           });
       }
   });
});


</script> 

<div class="container">
  <div class="row">
    
<div class="col-sm-6 col-xs-12 body_container">
  <form method="post" action="add/addmovieactors.php?action=<?php echo $id ?>">
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

                <div class="col-xs-2 bs-wizard-step disabled"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 5</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <li href="#" class="bs-wizard-dot"></li>
                  <div class="bs-wizard-info text-center" style="margin-left: ">&nbsp;&nbsp;&nbsp;&nbsp; Done &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                </div>
            </div>

<div style="margin-bottom: 3vh;">Add Up to 5 Actors</div>

            <div class="row">
  <div class="col-md-12 " style="margin-bottom: 3vh;">
  <div style="float: left;">
    <label style="margin-right: "> Actor 1 :</label>
      <div class="row" style="display: inline-block;">
          <input class="form-control mr-sm-4 glyphicon search" type="search" placeholder="Search Actor" 
            style="border-radius: 50cm; background-color: rgba(0,0,0,0.3);border: 1px solid grey;color: white;
                      margin-left: 15px;"
                      id="search" name="search" required>
          <div id="display" name="name" class="search-engine comments3"  style="font-size: 22px"></div>

  </div></div>
</div>
</div>

<div class="row">
  <div class="col-md-12 " style="margin-bottom: 3vh;">
  <div style="float: left;">
    <label style="margin-right: "> Actor 2 :</label>
      <div class="row" style="display: inline-block;">
          <input class="form-control mr-sm-4 glyphicon search" type="search" placeholder="Search Actor" 
            style="border-radius: 50cm; background-color: rgba(0,0,0,0.3);border: 1px solid grey;color: white;
                      margin-left: 15px;"
                      id="search2" name="search2" >
          <div id="display2" name="name2" class="search-engine comments3"  style="font-size: 22px"></div>
  </div></div>
</div>
</div>

<div class="row">
  <div class="col-md-12 " style="margin-bottom: 3vh;">
  <div style="float: left;">
    <label style="margin-right: "> Actor 3 :</label>
      <div class="row" style="display: inline-block;">
          <input class="form-control mr-sm-4 glyphicon search" type="search" placeholder="Search Actor" 
            style="border-radius: 50cm; background-color: rgba(0,0,0,0.3);border: 1px solid grey;color: white;
                      margin-left: 15px;"
                      id="search3" name="search3">
          <div id="display3" name="name3" class="search-engine comments3"  style="font-size: 22px"></div>
  </div></div>
</div>
</div>

<div class="row">
  <div class="col-md-12 " style="margin-bottom: 3vh;">
  <div style="float: left;">
    <label style="margin-right: "> Actor 4 :</label>
      <div class="row" style="display: inline-block;">
          <input class="form-control mr-sm-4 glyphicon search" type="search" placeholder="Search Actor" 
            style="border-radius: 50cm; background-color: rgba(0,0,0,0.3);border: 1px solid grey;color: white;
                      margin-left: 15px;"
                      id="search4" name="search4">
          <div id="display4" name="name4" class="search-engine comments3"  style="font-size: 22px"></div>
  </div></div>
</div>
</div>

<div class="row">
  <div class="col-md-12 " style="margin-bottom: 3vh;">
  <div style="float: left;">
    <label style="margin-right: "> Actor 5 :</label>
      <div class="row" style="display: inline-block;">
          <input class="form-control mr-sm-4 glyphicon search" type="search" placeholder="Search Actor" 
            style="border-radius: 50cm; background-color: rgba(0,0,0,0.3);border: 1px solid grey;color: white;
                      margin-left: 15px;"
                      id="search5" name="search5">
          <div id="display5" name="name5" class="search-engine comments3"  style="font-size: 22px"></div>
  </div></div>
</div>
</div>

<div class="row">
  <div class="col-md-12">
    <input class="btn btn-secondary" style="font-size: 20px;float: right;" type="submit" name="" value="Next">
  </div>
</div>


      </div>
  </div>
</div>




</form>
</div>
</div>
</div>

<!------------------------------------------------------Add Actor---------------------------------------------->

 <div id="addnewactor2" class="modal" style="z-index: 70">
  <form class="modal-content animate" >
      <div class="imgcontainer">
      <span onclick="document.getElementById('addnewactor2').style.display='none'" class="close" title="Close PopUp">&times;</span>
    </div>
    <input type="text" name="" style="margin-top: 5vh" id="actor_name2" class="actor_name2" placeholder="Enter Actor name" id="newactorname">
    <label style="margin-top: 5vh;margin-left: 2vw;">Choose Image</label>
      <input type="file" class="btn btn-secondary" name="" id="newactorimage" style="width: 40%;margin-left: 2vw;">
    <input class="btn btn-success" type="button" id="addactorbtn" value="Add New Actor" name="" style="margin-top: 5vh;width: 90%;margin-left: 5%;padding: 15px;">
  </form>
</div>
<!---------------------------------------------------Upload Actor Image----------------------------->

 <div id="addnewactor" class="modal" style="z-index: 70">
  <form class="modal-content animate" method="post" action="addactor.php?action=<?php echo $id ?>&addedimage" enctype="multipart/form-data">
      <div class="imgcontainer">
      <span onclick="document.getElementById('addnewactor').style.display='none'" class="close" title="Close PopUp">&times;</span>
    </div>
    <div style="margin-top: 4vh;margin-left: 2vw;">
    <?php
    if(isset($_POST["actorsubmit"])) {
$target_dir = "../images/actors/";
$target_file = $target_dir . basename($_FILES["uploadactorimage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

  

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else{
if (move_uploaded_file($_FILES["uploadactorimage"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["uploadactorimage"]["name"]). " has been uploaded.";
      }else {
        echo "Sorry, there was an error uploading your file.";
}
}
}
?>
</div>
    <label style="margin-top: 2vh;margin-left: 2vw;">Image</label>
      <input type="file" class="btn btn-secondary" name="uploadactorimage" id="uploadactorimage" style="width: 40%;margin-left: 2vw;">
      <input class="btn btn-success" type="submit" name="actorsubmit" value="upload Actor" style="width: 90%;margin-left: 5%;padding: 15px;margin-top: 3vh">
    <input class="btn btn-secondary" type="button" value="Next" name="" style="margin-top: 6vh;width: 90%;margin-left: 5%;padding: 15px;" onclick="document.getElementById('addnewactor2').style.display='block';document.getElementById('addnewactor').style.display='none'">
  </form>
</div>

<?php
if(isset($_GET['addedimage'])){
?>
<script>
document.getElementById('addnewactor').style.display='block';
</script>
<?php
}

?>