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
               url: "search/deletemov.php",
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
   $("#deletemovie").click(function() {
       //Assigning search box value to javascript variable named as "name".
       
       var moviename = $('#deletemovieid').val();
       //Validating, if "comment" is empty.
       if(moviename ==""){
            Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'You have to Choose Movie From The list!',
  
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
               url: "delete/del_movie.php",
               //Data, that will be sent to "comment.php".
               data: {
                   //Assigning value of "moviename2 and other" into "moviename2 and other" variable.
                   
                   
                   moviename: moviename
               },
               //If result found, this funtion will be called.
               success: function(DeleteMovie) {

                setTimeout(function() {
$("#moviedetalies").load(location.href+" #moviedetalies>*"+"");
}, 1);
                 
                            Swal.fire(
  'Successful Removed from Movie list',
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

<div class="container">
	<div class="row">
		
<div class="col-sm-6 col-xs-12 body_container">
	
<div class="panal_body" style="min-height: 80vh;">
	<div class="addmoviebody">
		
	<div class="col-md-12" style="margin-top: 4vh;">
		<div style="float: right;">
			 <div class="row" style="display: inline-block;">
          <input class="form-control mr-sm-4 glyphicon search" type="search" placeholder="Search Movies" 
            style="border-radius: 50cm; background-color: rgba(0,0,0,0.3);border: 1px solid grey;color: white;
                      margin-left: 15px;width: 20vw;"
                      id="search" name="search" >
          <div id="display" name="name" class="search-engine comments3"  style="font-size: 22px"></div>

  </div>
		</div>
	</div>
	<div style="margin-top: 3vh;font-size: 30px;">Delete Movie</div>
	<?php
	if (isset($_GET['action'])) {
		$Query = "SELECT * FROM movie WHERE id = '$id' ";
//Query execution

   $ExecQuery = MySQLi_query($con, $Query);
//Creating unordered list to display result.
  if (mysqli_num_rows($ExecQuery) > 0) {
   //Fetching result from database.
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
       <div class="container" id="moviedetalies" style="margin-top: 4vh;" >
       	<div class="container">
       <div class="row">
       <div class="col-md-3">
       	<img style="" class="poster3" src="../images/poster/<?php echo $Result['poster']; ?>">
       </div>
       <div class="col-md-9" style="background: rgba(0,0,0,0.2);text-align: left;">
       	<div>
       		<span style="color: #f2f2f2">Name:</span> 
       		<?php echo $Result['name2']; ?>
       		(<?php echo $Result['release_date']; ?>)
       	</div>
       	<div>
       		<span style="color: #f2f2f2">Description:</span> 
       		<?php echo $Result['desciption'] ?>
       	</div>
       	<div>
       		<span style="color: #f2f2f2">qulity:</span> 
       		<?php echo $Result['qulity'] ?>
       	</div>
       	<div>
       		<span style="color: #f2f2f2">Genre:</span> <span> <?php $query7= "SELECT * FROM cat 
          INNER JOIN movie_cat
                    ON cat.id = movie_cat.cat_id
          INNER JOIN movie
                    ON movie.id = movie_cat.movie_id
          AND movie.id = $id";

        $cat = mysqli_query($con , $query7);
        ?>

                <?php 
                  // fetch the data from table cat
                  while ($row3 =mysqli_fetch_assoc($cat)) {
            		?>

                  <span><?php echo $row3['cat_name']; ?>,</span>
                  <?php }
                   ?>
       	</div>
       	<div>
       		<span style="color: #f2f2f2">Country:</span> 
       		<?php echo $Result['country'] ?>
       	</div>
       	<div>
       		<span style="color: #f2f2f2">Added At:</span> 
       		<?php echo $Result['created_at'] ?>
       	</div>
       	<div style="float: right;">
       		<button id="deletemovie" class="btn btn-danger">Delete</button>
       		<input type="hidden" name="" id="deletemovieid" value="<?php echo $id ?>">
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
	echo "No Movie With this Name";?>
		
	</span>
	<?php
}  }else{?>
	<br><br><br><br><br>
	<span style="font-size: 35px;">
		<?php
	echo "No Movie Selected Yet!" ;?>
		
	</span>
	<?php
}?>
</div>
</div>

</div>
</div>
</div>