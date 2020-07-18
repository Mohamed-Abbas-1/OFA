<?php
  include 'panalheader.php';
?>

<?php
  
  
    if (isset($_GET['action'])) {
      $id = $_GET['action'];
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
               url: "search/deleteacc.php",
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


$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#deleteuser").click(function() {
       //Assigning search box value to javascript variable named as "name".
       
       var username12 = $('#deleteuserid').val();
       //Validating, if "comment" is empty.
       if(username12 ==""){
            Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'You have to Choose Account From The list!',
  
});
       

       //If commenttext is not empty.
       }else {

Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {


           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "comment.php".
               url: "delete/del_user.php",
               //Data, that will be sent to "comment.php".
               data: {
                   //Assigning value of "moviename2 and other" into "moviename2 and other" variable.
                   
                   
                   username12: username12
               },
               //If result found, this funtion will be called.
               success: function(Deleteuser) {

                setTimeout(function() {
$("#userdetalies").load(location.href+" #userdetalies>*"+"");
}, 1);
                 
                            Swal.fire(
  'Successful Removed This User',
  '',
  'success'
);
              }
           });

           }
});
       }
   });
});
 

</script>  

<script> 


$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#promotuser").click(function() {
       //Assigning search box value to javascript variable named as "name".
       
       var username13 = $('#deleteuserid').val();
       //Validating, if "comment" is empty.
       if(username13 ==""){
            Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'You have to Choose Account From The list!',
  
});
       

       //If commenttext is not empty.
       }else {




           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "comment.php".
               url: "edit/poromotuser.php",
               //Data, that will be sent to "comment.php".
               data: {
                   //Assigning value of "moviename2 and other" into "moviename2 and other" variable.
                   
                   
                   username13: username13
               },
               //If result found, this funtion will be called.
               success: function(poromotuser) {

        window.location.replace("deleteaccount.php?action=<?php echo $id ?>");
                 
 
              }
           });

           
       }
   });
});
 

</script> 

<script> 


$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#loweradmin").click(function() {
       //Assigning search box value to javascript variable named as "name".
       
       var username14 = $('#deleteuserid').val();
       //Validating, if "comment" is empty.
       if(username14 ==""){
            Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'You have to Choose Account From The list!',
  
});
       

       //If commenttext is not empty.
       }else {




           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "comment.php".
               url: "edit/loweruser.php",
               //Data, that will be sent to "comment.php".
               data: {
                   //Assigning value of "moviename2 and other" into "moviename2 and other" variable.
                   
                   
                   username14: username14
               },
               //If result found, this funtion will be called.
               success: function(poromotuser) {

        window.location.replace("deleteaccount.php?action=<?php echo $id ?>");
                 
 
              }
           });

           
       }
   });
});
 

</script>

<div class="container">
	<div class="row">
		
<div class="col-sm-6 col-xs-12 body_container">
	
<div class="panal_body" style="min-height: 80vh;">
	<div class="addmoviebody">
		
	<div class="col-md-12" style="margin-top: 4vh;">
		<div style="float: right;">
			 <div class="row" style="display: inline-block;">
          <input class="form-control mr-sm-4 glyphicon search" type="search" placeholder="Search Account" 
            style="border-radius: 50cm; background-color: rgba(0,0,0,0.3);border: 1px solid grey;color: white;
                      margin-left: 15px;width: 20vw;"
                      id="search" name="search" >
          <div id="display" name="name" class="search-engine comments3"  style="font-size: 22px"></div>

  </div>
		</div>
	</div>
	<div class="col-md-12">
	<div style="margin-top: 3vh;font-size: 30px;text-align: center;float:center;margin-left: 5vw; ">Poromotion/Delete Account</div>
</div>
	<?php
	if (isset($_GET['action'])) {
		$Query = "SELECT * FROM account WHERE id = '$id' ";
//Query execution

   $ExecQuery = MySQLi_query($con, $Query);
//Creating unordered list to display result.
  if (mysqli_num_rows($ExecQuery) > 0) {
   //Fetching result from database.
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
   		 $image = $Result['picture'];
        $type = $Result['type'];
       ?>
       <?php
        if ($type == 'user' || $type == 'Admin') {
          $image2 = "../icons/".$Result['picture']; 
          
        }elseif ($type == 'googleuser') {
          $image2 = $Result['picture'];
        }
      ?>
       <div class="container" id="userdetalies" style="margin-top: 4vh;" >
       	<div class="container">
       <div class="row">
       <div class="col-md-3">

       	<img style="" class="poster3" src="<?php echo $image2 ?>">
       </div>
       <div class="col-md-9" style="background: rgba(0,0,0,0.2);text-align: left;">
       	<div>
       		<span style="color: #f2f2f2">Name:</span> 
       		<?php echo $Result['user_name']; ?>
       		
       	</div>
       	<div>
       		<span style="color: #f2f2f2">Email:</span> 
       		<?php echo $Result['email'] ?>
       	</div>
       	<div>
       		<span style="color: #f2f2f2">Type:</span> 
       		<?php echo $Result['type'] ?>
       	</div>
       	
       	<div>
       		<span style="color: #f2f2f2">Joined At:</span> 
       		<?php echo $Result['created_at'] ?>
       	</div>
       	<div style="float: right;">
       		<button id="loweradmin" class="btn btn-secondary mb-3">Lower To User</button>
       		<button id="promotuser" class="btn btn-success mb-3">Poromot to Admin</button>
       		<button id="deleteuser" class="btn btn-danger mb-3">Delete</button>

       		<input type="hidden" name="" id="deleteuserid" value="<?php echo $id ?>">
       	</div>
       </div>
   </div></div>

		</div></div>
	</div>


<?php } }else{
	?>
	<br><br><br><br><br>
	<span style="font-size: 35px;">
		<?php
	echo "No Account With this Name";?>
		
	</span>
	<?php
}  }else{?>
	<br><br><br><br><br>
	<span style="font-size: 35px;">
		<?php
	echo "No Account Selected Yet!" ;?>
		
	</span>
	<?php
}?>
</div>
</div>

</div>
</div>
</div>
<?php
if ($type == 'Admin') {
           ?>
          <script>
          	
          		$('#promotuser').hide();
          		
          </script>

          <?php
        }elseif ($type == 'user') {
          ?>
          <script>
          	
          		$('#loweradmin').hide();
          	
          </script>

          <?php
        }elseif ($type == 'googleuser') {
        	?>
          <script>
          	
          		$('#promotuser').hide();
          		
          </script>
          <script>
          	
          		$('#loweradmin').hide();
          	
          </script>

          <?php
        }else{
        	?>
          <script>
          	
          		$('#loweradmin').hide();
          	
          </script>

          <?php
        }
      ?>