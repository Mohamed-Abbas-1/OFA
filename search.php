<?php
include 'Header.php';
?>
<!---------------------------------------------------------------------------------------------------------------->

<?php
  // auto page counter variables
$page = 1;
if(!empty($_GET['page'])) {
    $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
    if(false === $page) {
        $page = 1;
    }
}

// set the number of items to display per page
$items_per_page = 2;

$offset = ($page - 1) * $items_per_page;

?>


<?php

		if(isset($_GET['searchbycat'])){
	$cat= $_GET['searchbycat'];

	

$sql6 = "SELECT DISTINCT  COUNT(movie.id) AS movieid

			 FROM movie 
					INNER JOIN movie_cat
                    ON movie.id = movie_cat.movie_id
					INNER JOIN cat
                    ON cat.id = movie_cat.cat_id
					AND cat.cat_name ='$cat' AND movie.is_released= 'yes' ORDER BY movie.created_at DESC";;
$result6 = mysqli_query($conn, $sql6);

   while ($row6 = MySQLi_fetch_array($result6)) {
            $row_count = $row6['movieid'];
           } 


$page_count = 0;

if (0 === $row_count) {  
    // maybe show some error since there is nothing in your table
} else {
   // determine page_count
   $page_count = (int)ceil($row_count / $items_per_page);
   // double check that request page is in range
   if($page > $page_count) {
        // error to user, maybe set page to 1
        $page = 1;
   }
}

	$query = "SELECT DISTINCT movie.id AS mid,name,name2,desciption,poster,wide_poster,qulity,country,release_date,
					 is_released,imdb,imdb_link,trailer,period,torrent,server1,server2,created_at

			 FROM movie 
					INNER JOIN movie_cat
                    ON movie.id = movie_cat.movie_id
					INNER JOIN cat
                    ON cat.id = movie_cat.cat_id
					AND cat.cat_name ='$cat' AND movie.is_released= 'yes' ORDER BY movie.created_at DESC LIMIT $offset , $items_per_page";



}elseif (isset($_GET['searchbycontury'])) {
	$con=$_GET['searchbycontury'];

	$sql6 = "SELECT DISTINCT  COUNT(movie.id) AS movieid from movie WHERE country='$con' AND is_released= 'yes' ORDER BY created_at DESC";
$result6 = mysqli_query($conn, $sql6);

   while ($row6 = MySQLi_fetch_array($result6)) {
            $row_count = $row6['movieid'];
           } 


$page_count = 0;

if (0 === $row_count) {  
    // maybe show some error since there is nothing in your table
} else {
   // determine page_count
   $page_count = (int)ceil($row_count / $items_per_page);
   // double check that request page is in range
   if($page > $page_count) {
        // error to user, maybe set page to 1
        $page = 1;
   }
}
	
	$query= "SELECT * FROM movie WHERE country='$con' AND is_released= 'yes' ORDER BY created_at DESC  LIMIT $offset , $items_per_page";



}elseif (isset($_GET['searchbyyear'])) {
	$year=$_GET['searchbyyear'];
	
	$sql6 = "SELECT DISTINCT  COUNT(movie.id) AS movieid from movie WHERE release_date='$year' AND is_released= 'yes' ORDER BY created_at DESC";
$result6 = mysqli_query($conn, $sql6);

   while ($row6 = MySQLi_fetch_array($result6)) {
            $row_count = $row6['movieid'];
           } 


$page_count = 0;

if (0 === $row_count) {  
    // maybe show some error since there is nothing in your table
} else {
   // determine page_count
   $page_count = (int)ceil($row_count / $items_per_page);
   // double check that request page is in range
   if($page > $page_count) {
        // error to user, maybe set page to 1
        $page = 1;
   }
}
	$query= "SELECT * FROM movie WHERE release_date='$year' AND is_released= 'yes' ORDER BY created_at DESC LIMIT $offset , $items_per_page";



}elseif (isset($_GET['search'])) {
	
	$sql6 = "SELECT DISTINCT  COUNT(movie.id) AS movieid from movie WHERE is_released= 'yes' ORDER BY imdb DESC";
$result6 = mysqli_query($conn, $sql6);

   while ($row6 = MySQLi_fetch_array($result6)) {
            $row_count = $row6['movieid'];
           } 


$page_count = 0;

if (0 === $row_count) {  
    // maybe show some error since there is nothing in your table
} else {
   // determine page_count
   $page_count = (int)ceil($row_count / $items_per_page);
   // double check that request page is in range
   if($page > $page_count) {
        // error to user, maybe set page to 1
        $page = 1;
   }
}


	$query= "SELECT * FROM movie WHERE is_released= 'yes' ORDER BY imdb DESC LIMIT $offset , $items_per_page";
}elseif (isset($_GET['popular'])) {
  
  $sql11 = "SELECT DISTINCT  COUNT(movie.id) AS movieid from movie WHERE is_released= 'yes' ORDER BY viewers DESC";
$result11 = mysqli_query($conn, $sql11);

   while ($row11 = MySQLi_fetch_array($result11)) {
            $row_count = $row11['movieid'];
           } 


$page_count = 0;

if (0 === $row_count) {  
    // maybe show some error since there is nothing in your table
} else {
   // determine page_count
   $page_count = (int)ceil($row_count / $items_per_page);
   // double check that request page is in range
   if($page > $page_count) {
        // error to user, maybe set page to 1
        $page = 1;
   }
}


  $query= "SELECT * FROM movie WHERE is_released= 'yes' ORDER BY viewers DESC LIMIT $offset , $items_per_page";
}elseif (isset($_GET['more'])) {  
	$more=$_GET['more'];

	$sql6 = "SELECT DISTINCT  COUNT(movie.id) AS movieid from movie WHERE name LIKE '%$more%' AND is_released= 'yes' ORDER BY created_at DESC";
$result6 = mysqli_query($conn, $sql6);

   while ($row6 = MySQLi_fetch_array($result6)) {
            $row_count = $row6['movieid'];
           } 


$page_count = 0;

if (0 === $row_count) {  
    // maybe show some error since there is nothing in your table
} else {
   // determine page_count
   $page_count = (int)ceil($row_count / $items_per_page);
   // double check that request page is in range
   if($page > $page_count) {
        // error to user, maybe set page to 1
        $page = 1;
   }
}
	
	$query= "SELECT * FROM movie WHERE name LIKE '%$more%' AND is_released= 'yes' ORDER BY created_at DESC LIMIT $offset , $items_per_page";



}elseif (isset($_GET['searchbyimdb'])) {
	$imdb=$_GET['searchbyimdb'];

	$sql6 = "SELECT DISTINCT  COUNT(movie.id) AS movieid from movie WHERE imdb >='$imdb' AND is_released= 'yes' ORDER BY created_at DESC";
$result6 = mysqli_query($conn, $sql6);

   while ($row6 = MySQLi_fetch_array($result6)) {
            $row_count = $row6['movieid'];
           } 


$page_count = 0;

if (0 === $row_count) {  
    // maybe show some error since there is nothing in your table
} else {
   // determine page_count
   $page_count = (int)ceil($row_count / $items_per_page);
   // double check that request page is in range
   if($page > $page_count) {
        // error to user, maybe set page to 1
        $page = 1;
   }
}

	$query= "SELECT * FROM movie WHERE imdb >='$imdb' AND is_released= 'yes' ORDER BY created_at DESC LIMIT $offset , $items_per_page";


}elseif (isset($_GET['searchbyqulity'])) {
	$qulity=$_GET['searchbyqulity'];

	$sql6 = "SELECT DISTINCT  COUNT(movie.id) AS movieid from movie WHERE qulity='$qulity' AND is_released= 'yes' ORDER BY created_at DESC";
$result6 = mysqli_query($conn, $sql6);

   while ($row6 = MySQLi_fetch_array($result6)) {
            $row_count = $row6['movieid'];
           } 


$page_count = 0;

if (0 === $row_count) {  
    // maybe show some error since there is nothing in your table
} else {
   // determine page_count
   $page_count = (int)ceil($row_count / $items_per_page);
   // double check that request page is in range
   if($page > $page_count) {
        // error to user, maybe set page to 1
        $page = 1;
   }
}

	$query= "SELECT * FROM movie WHERE qulity='$qulity' AND is_released= 'yes' ORDER BY created_at DESC LIMIT $offset , $items_per_page";
}elseif (isset($_GET['searchbyactor'])) {
	$actor=$_GET['searchbyactor'];

	$subquery="SELECT id,actor_pic FROM actor WHERE actor_name = '$actor' ";
	$actorid = mysqli_query($conn , $subquery);
			// fetch the data from table actor
					while ($row =mysqli_fetch_assoc($actorid)) :{
						
					
					} ?>
					<?php
						$actorid2= $row['id'];
						$actorpic= $row['actor_pic'];
					?>

				<?php endwhile; ?>


<?php

$sql6 = "SELECT DISTINCT  COUNT(movie.id) AS movieid FROM movie 
					INNER JOIN movie_actor
                    ON movie.id = movie_actor.movie_id
					INNER JOIN actor
                    ON actor.id = movie_actor.actor_id
					AND movie_actor.actor_id ='$actorid2' AND movie.is_released= 'yes' ORDER BY movie.created_at DESC";
$result6 = mysqli_query($conn, $sql6);

   while ($row6 = MySQLi_fetch_array($result6)) {
            $row_count = $row6['movieid'];
           } 


$page_count = 0;

if (0 === $row_count) {  
    // maybe show some error since there is nothing in your table
} else {
   // determine page_count
   $page_count = (int)ceil($row_count / $items_per_page);
   // double check that request page is in range
   if($page > $page_count) {
        // error to user, maybe set page to 1
        $page = 1;
   }
}


	$query= "SELECT DISTINCT movie.id AS nid,name,name2,desciption,poster,wide_poster,qulity,country,release_date,
					 is_released,imdb,imdb_link,trailer,period,torrent,server1,server2,created_at

			 FROM movie 
					INNER JOIN movie_actor
                    ON movie.id = movie_actor.movie_id
					INNER JOIN actor
                    ON actor.id = movie_actor.actor_id
					AND movie_actor.actor_id ='$actorid2' AND movie.is_released= 'yes' ORDER BY movie.created_at DESC LIMIT $offset , $items_per_page";
}else{
	?>
		<script>
                window.location.replace("index.php");
            </script>
            <?php
}


$count=0;


?>




<section>
	<div class="container searchcon" >
		<div class="row searchrow" style="font-size: 20px;color: #007bff; ">
			<h1 class="searchrow" style="margin-left: 15px;">

			<?php if(isset($_GET['searchbycat'])){
				echo "Search Movies Using Category (".$cat.") :".$row_count." Movies Founded."; ?>
				<div class="container">
	<div class="row" style="text-align: center; align-items: center; ">
	
	<div class="btn-toolbar pagecounter" role="toolbar" aria-label="Toolbar with button groups" style="text-align: center" >
	<div class="btn-group mr-2" role="group" aria-label="First group" style="align-items: center;">
		<?php
			for ($i = 1; $i <= $page_count; $i++) {
   				if ($i === $page) { // this is current page
       			?>

       		<a  class="btn btn-secondary" style="color: white; background-color: rgba(90,90,90,0.9);"><?php echo $i ?></a>
       		<?php
   				} else { // show link to other page   
        
       		?>
       		<a href="search.php?searchbycat=<?php echo $cat ?>&page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
       		<?php
  			 }
			}

			?>
  			</div></div></div></div>
<?php
			}elseif (isset($_GET['searchbycontury'])) {
				echo "Search Movies Created in (".$con.") :".$row_count." Movies Founded"; 

				?>
				<div class="container">
	<div class="row" style="text-align: center; align-items: center; ">
	
	<div class="btn-toolbar pagecounter" role="toolbar" aria-label="Toolbar with button groups" style="text-align: center" >
	<div class="btn-group mr-2" role="group" aria-label="First group" style="align-items: center;">
		<?php
			for ($i = 1; $i <= $page_count; $i++) {
   				if ($i === $page) { // this is current page
       			?>

       		<a  class="btn btn-secondary" style="color: white; background-color: rgba(90,90,90,0.9);"><?php echo $i ?></a>
       		<?php
   				} else { // show link to other page   
        
       		?>
       		<a href="search.php?searchbycontury=<?php echo $con ?>&page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
       		<?php
  			 }
			}

			?>
  			</div></div></div></div>
<?php
			}elseif (isset($_GET['searchbyyear'])) {
				echo "Search Movies Created in Year (".$year.") :".$row_count." Movies Founded";
				?>
				<div class="container">
	<div class="row" style="text-align: center; align-items: center; ">
	
	<div class="btn-toolbar pagecounter" role="toolbar" aria-label="Toolbar with button groups" style="text-align: center" >
	<div class="btn-group mr-2" role="group" aria-label="First group" style="align-items: center;">
		<?php
			for ($i = 1; $i <= $page_count; $i++) {
   				if ($i === $page) { // this is current page
       			?>

       		<a  class="btn btn-secondary" style="color: white; background-color: rgba(90,90,90,0.9);"><?php echo $i ?></a>
       		<?php
   				} else { // show link to other page   
        
       		?>
       		<a href="search.php?searchbyyear=<?php echo $year ?>&page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
       		<?php
  			 }
			}

			?>
  			</div></div></div></div>
<?php

			}elseif (isset($_GET['search'])) {
				echo "Search Movies Using (Highset IMDB) :";

?>
				<div class="container">
	<div class="row" style="text-align: center; align-items: center; ">
	
	<div class="btn-toolbar pagecounter" role="toolbar" aria-label="Toolbar with button groups" style="text-align: center" >
	<div class="btn-group mr-2" role="group" aria-label="First group" style="align-items: center;">
		<?php
			for ($i = 1; $i <= $page_count; $i++) {
   				if ($i === $page) { // this is current page
       			?>

       		<a  class="btn btn-secondary" style="color: white; background-color: rgba(90,90,90,0.9);"><?php echo $i ?></a>
       		<?php
   				} else { // show link to other page   
        
       		?>
       		<a href="search.php?search=highestimdb&page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
       		<?php
  			 }
			}

			?>
  			</div></div></div></div>
<?php

			}elseif (isset($_GET['popular'])) {
        echo "Search Movies Using (Popular Movies) :";

?>
        <div class="container">
  <div class="row" style="text-align: center; align-items: center; ">
  
  <div class="btn-toolbar pagecounter" role="toolbar" aria-label="Toolbar with button groups" style="text-align: center" >
  <div class="btn-group mr-2" role="group" aria-label="First group" style="align-items: center;">
    <?php
      for ($i = 1; $i <= $page_count; $i++) {
          if ($i === $page) { // this is current page
            ?>

          <a  class="btn btn-secondary" style="color: white; background-color: rgba(90,90,90,0.9);"><?php echo $i ?></a>
          <?php
          } else { // show link to other page   
        
          ?>
          <a href="search.php?popular&page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
          <?php
         }
      }

      ?>
        </div></div></div></div>
<?php

      }elseif (isset($_GET['more'])) {
				echo "Search Movies By Name (".$more.") :".$row_count." Movies Founded";

				?>
				<div class="container">
	<div class="row" style="text-align: center; align-items: center; ">
	
	<div class="btn-toolbar pagecounter" role="toolbar" aria-label="Toolbar with button groups" style="text-align: center" >
	<div class="btn-group mr-2" role="group" aria-label="First group" style="align-items: center;">
		<?php
			for ($i = 1; $i <= $page_count; $i++) {
   				if ($i === $page) { // this is current page
       			?>

       		<a  class="btn btn-secondary" style="color: white; background-color: rgba(90,90,90,0.9);"><?php echo $i ?></a>
       		<?php
   				} else { // show link to other page   
        
       		?>
       		<a href="search.php?more=<?php echo $more ?>&page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
       		<?php
  			 }
			}

			?>
  			</div></div></div></div>
<?php

			}elseif (isset($_GET['searchbyimdb'])) {
				echo "Search Movies By IMDb More Than (".$imdb.") :".$row_count." Movies Founded";

				?>
				<div class="container">
	<div class="row" style="text-align: center; align-items: center; ">
	
	<div class="btn-toolbar pagecounter" role="toolbar" aria-label="Toolbar with button groups" style="text-align: center" >
	<div class="btn-group mr-2" role="group" aria-label="First group" style="align-items: center;">
		<?php
			for ($i = 1; $i <= $page_count; $i++) {
   				if ($i === $page) { // this is current page
       			?>

       		<a  class="btn btn-secondary" style="color: white; background-color: rgba(90,90,90,0.9);"><?php echo $i ?></a>
       		<?php
   				} else { // show link to other page   
        
       		?>
       		<a href="search.php?searchbyimdb=<?php echo $imdb ?>&page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
       		<?php
  			 }
			}

			?>
  			</div></div></div></div>
<?php


			}elseif (isset($_GET['searchbyqulity'])) {
				echo "Search Movies By Qulity (".$qulity.") :".$row_count." Movies Founded";

				?>
				<div class="container">
	<div class="row" style="text-align: center; align-items: center; ">
	
	<div class="btn-toolbar pagecounter" role="toolbar" aria-label="Toolbar with button groups" style="text-align: center" >
	<div class="btn-group mr-2" role="group" aria-label="First group" style="align-items: center;">
		<?php
			for ($i = 1; $i <= $page_count; $i++) {
   				if ($i === $page) { // this is current page
       			?>

       		<a  class="btn btn-secondary" style="color: white; background-color: rgba(90,90,90,0.9);"><?php echo $i ?></a>
       		<?php
   				} else { // show link to other page   
        
       		?>
       		<a href="search.php?searchbyqulity=<?php echo $qulity ?>&page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
       		<?php
  			 }
			}

			?>
  			</div></div></div></div>
<?php

			}elseif (isset($_GET['searchbyactor'])) {

				?>
				 
				<img class="actorimg" src="images/actors/<?php echo $actorpic ?>">
				<br><br>
				<?php
				echo "Search Movies With Actor (".$actor.") :".$row_count." Movies Founded";

				?>
				<div class="container">
	<div class="row" style="text-align: center; align-items: center; ">
	
	<div class="btn-toolbar pagecounter" role="toolbar" aria-label="Toolbar with button groups" style="text-align: center" >
	<div class="btn-group mr-2" role="group" aria-label="First group" style="align-items: center;">
		<?php
			for ($i = 1; $i <= $page_count; $i++) {
   				if ($i === $page) { // this is current page
       			?>

       		<a  class="btn btn-secondary" style="color: white; background-color: rgba(90,90,90,0.9);"><?php echo $i ?></a>
       		<?php
   				} else { // show link to other page   
        
       		?>
       		<a href="search.php?searchbyactor=<?php echo $actor ?>&page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
       		<?php
  			 }
			}

			?>
  			</div></div></div></div>
<?php

			}


			?>  
			<script>
				var count =document.getElementById("count");
			</script>
			</h1>
		</div>
		<div class="row">

<?php 
$movie = mysqli_query($conn , $query);

$count=0;
?>
				<?php		// fetch the data from table movie
					while ($row =mysqli_fetch_assoc($movie)) :{
						
					
					} ?>
					<?php
					$count = $count+1;
					if(isset($_GET['searchbycat'])){
	
					$id =$row['mid'];
					}elseif(isset($_GET['searchbyactor'])){
	
					$id =$row['nid'];
					}else {
						$id=$row['id'];
					}
					 ?>
					 
					 <div class="col-md-3 col-sm-6 col-xs-6 mov " style="margin-top:30px;" >
				<div class="border2" >
					<p class="HD" ><?php echo $row['qulity']; ?></p>
					<p class="star">&#9733;<?php echo $row['imdb'] ?></p>
					<a href="movie.php?action=<?php echo $id; ?>" onmouseenter="$(this).siblings().show();" onmouseleave="$(this).siblings('span').hide();"><h2 class="Text2 " ><?php echo $row['name']; ?> </h2></a>
					<a href="movie.php?action=<?php echo $id; ?>" onmouseenter="$(this).siblings().show();" onmouseleave="$(this).siblings('span').hide();"><img class="poster movie img "  src="images/poster/<?php echo $row['poster']; ?>" ></a>
					<span class=" popover" id="none1" onmouseenter="$(this).show();" onmouseleave="$(this).hide();">
						<div class=" container" id="pop" >
							<div>
								<p class="popmoviename"><?php echo $row['name']; ?></p>

								<p class="HD2"><?php echo $row['qulity']; ?></p>
							</div>
							<div>
								<span class="popmovieimdb">IMDb <?php echo $row['imdb']; ?></span>
								&nbsp;&nbsp;
								<span><?php echo $row['release_date']; ?></span>
								&nbsp;&nbsp;
								<span><?php echo $row['period']; ?></span>
							</div>
							<div class="popspan">
								<?php echo $row['desciption']; ?>
							</div>
							<div class="popspan">
								Country: <a class="movie-genre" style="color: #b3b3b3;" href="search.php?searchbycontury=<?php echo $row['country']?>"><span style="color: #b3b3b3"><?php echo $row['country']; ?></a>
								</span>
							</div>
							<div class="popspan">

								<?php
									
									$imdb =$row['imdb_link'];
									
								?>
								
								Genre: <span style="color: #b3b3b3">

									<?php $query2=	"SELECT * FROM cat 
					INNER JOIN movie_cat
                    ON cat.id = movie_cat.cat_id
					INNER JOIN movie
                    ON movie.id = movie_cat.movie_id
					AND movie.id = '$id'";

				$cat2 = mysqli_query($conn , $query2);
				?>

					 			<?php 
									// fetch the data from table cat
									while ($row =mysqli_fetch_assoc($cat2)) {
						
									

									 ?> 
									

									 <a class="movie-genre" style="color: #b3b3b3;" href="search.php?searchbycat=<?php echo $row['cat_name']?>"><?php echo $row['cat_name']." , ";?></a>
									<?php		 

								} ?>
					 	</span>
							</div>
							
							<a href="<?php echo $imdb ?>" target="_blank" class="btn btn btn-success IMDb"><span class="popmovielink">View on
								IMDb</span></a>
							<a href="movie.php?action=<?php echo $id; ?>" class="btn btn-primary Watch " ><span class="popmovielink">Watch Now</span></a>
						</div>
						
					</span>


					
				</div>
			</div>

			<?php endwhile;?>

			<script >
					 count.innerHTML = <?php echo $count ?>;
			</script>
					
		</div>
	</div>
</section>
<?php
		if(isset($_GET['searchbycat'])){
				 ?>
				<div class="container">
	<div class="row" style="text-align: center; align-items: center; ">
	
	<div class="btn-toolbar pagecounter" role="toolbar" aria-label="Toolbar with button groups" style="text-align: center" >
	<div class="btn-group mr-2" role="group" aria-label="First group" style="align-items: center;">
		<?php
			for ($i = 1; $i <= $page_count; $i++) {
   				if ($i === $page) { // this is current page
       			?>

       		<a  class="btn btn-secondary" style="color: white; background-color: rgba(90,90,90,0.9);"><?php echo $i ?></a>
       		<?php
   				} else { // show link to other page   
        
       		?>
       		<a href="search.php?searchbycat=<?php echo $cat ?>&page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
       		<?php
  			 }
			}

			?>
  			</div></div></div></div>
<?php
			}elseif (isset($_GET['searchbycontury'])) {
				 

				?>
				<div class="container">
	<div class="row" style="text-align: center; align-items: center; ">
	
	<div class="btn-toolbar pagecounter" role="toolbar" aria-label="Toolbar with button groups" style="text-align: center" >
	<div class="btn-group mr-2" role="group" aria-label="First group" style="align-items: center;">
		<?php
			for ($i = 1; $i <= $page_count; $i++) {
   				if ($i === $page) { // this is current page
       			?>

       		<a  class="btn btn-secondary" style="color: white; background-color: rgba(90,90,90,0.9);"><?php echo $i ?></a>
       		<?php
   				} else { // show link to other page   
        
       		?>
       		<a href="search.php?searchbycontury=<?php echo $con ?>&page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
       		<?php
  			 }
			}

			?>
  			</div></div></div></div>
<?php
			}elseif (isset($_GET['searchbyyear'])) {
				
				?>
				<div class="container">
	<div class="row" style="text-align: center; align-items: center; ">
	
	<div class="btn-toolbar pagecounter" role="toolbar" aria-label="Toolbar with button groups" style="text-align: center" >
	<div class="btn-group mr-2" role="group" aria-label="First group" style="align-items: center;">
		<?php
			for ($i = 1; $i <= $page_count; $i++) {
   				if ($i === $page) { // this is current page
       			?>

       		<a  class="btn btn-secondary" style="color: white; background-color: rgba(90,90,90,0.9);"><?php echo $i ?></a>
       		<?php
   				} else { // show link to other page   
        
       		?>
       		<a href="search.php?searchbyyear=<?php echo $year ?>&page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
       		<?php
  			 }
			}

			?>
  			</div></div></div></div>
<?php

			}elseif (isset($_GET['search'])) {
				

?>
				<div class="container">
	<div class="row" style="text-align: center; align-items: center; ">
	
	<div class="btn-toolbar pagecounter" role="toolbar" aria-label="Toolbar with button groups" style="text-align: center" >
	<div class="btn-group mr-2" role="group" aria-label="First group" style="align-items: center;">
		<?php
			for ($i = 1; $i <= $page_count; $i++) {
   				if ($i === $page) { // this is current page
       			?>

       		<a  class="btn btn-secondary" style="color: white; background-color: rgba(90,90,90,0.9);"><?php echo $i ?></a>
       		<?php
   				} else { // show link to other page   
        
       		?>
       		<a href="search.php?search=highestimdb&page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
       		<?php
  			 }
			}

			?>
  			</div></div></div></div>
<?php

			}elseif (isset($_GET['popular'])) {
        

?>
        <div class="container">
  <div class="row" style="text-align: center; align-items: center; ">
  
  <div class="btn-toolbar pagecounter" role="toolbar" aria-label="Toolbar with button groups" style="text-align: center" >
  <div class="btn-group mr-2" role="group" aria-label="First group" style="align-items: center;">
    <?php
      for ($i = 1; $i <= $page_count; $i++) {
          if ($i === $page) { // this is current page
            ?>

          <a  class="btn btn-secondary" style="color: white; background-color: rgba(90,90,90,0.9);"><?php echo $i ?></a>
          <?php
          } else { // show link to other page   
        
          ?>
          <a href="search.php?popular&page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
          <?php
         }
      }

      ?>
        </div></div></div></div>
<?php

      }elseif (isset($_GET['more'])) {
				

				?>
				<div class="container">
	<div class="row" style="text-align: center; align-items: center; ">
	
	<div class="btn-toolbar pagecounter" role="toolbar" aria-label="Toolbar with button groups" style="text-align: center" >
	<div class="btn-group mr-2" role="group" aria-label="First group" style="align-items: center;">
		<?php
			for ($i = 1; $i <= $page_count; $i++) {
   				if ($i === $page) { // this is current page
       			?>

       		<a  class="btn btn-secondary" style="color: white; background-color: rgba(90,90,90,0.9);"><?php echo $i ?></a>
       		<?php
   				} else { // show link to other page   
        
       		?>
       		<a href="search.php?more=<?php echo $more ?>&page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
       		<?php
  			 }
			}

			?>
  			</div></div></div></div>
<?php

			}elseif (isset($_GET['searchbyimdb'])) {
				

				?>
				<div class="container">
	<div class="row" style="text-align: center; align-items: center; ">
	
	<div class="btn-toolbar pagecounter" role="toolbar" aria-label="Toolbar with button groups" style="text-align: center" >
	<div class="btn-group mr-2" role="group" aria-label="First group" style="align-items: center;">
		<?php
			for ($i = 1; $i <= $page_count; $i++) {
   				if ($i === $page) { // this is current page
       			?>

       		<a  class="btn btn-secondary" style="color: white; background-color: rgba(90,90,90,0.9);"><?php echo $i ?></a>
       		<?php
   				} else { // show link to other page   
        
       		?>
       		<a href="search.php?searchbyimdb=<?php echo $imdb ?>&page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
       		<?php
  			 }
			}

			?>
  			</div></div></div></div>
<?php


			}elseif (isset($_GET['searchbyqulity'])) {
				

				?>
				<div class="container">
	<div class="row" style="text-align: center; align-items: center; ">
	
	<div class="btn-toolbar pagecounter" role="toolbar" aria-label="Toolbar with button groups" style="text-align: center" >
	<div class="btn-group mr-2" role="group" aria-label="First group" style="align-items: center;">
		<?php
			for ($i = 1; $i <= $page_count; $i++) {
   				if ($i === $page) { // this is current page
       			?>

       		<a  class="btn btn-secondary" style="color: white; background-color: rgba(90,90,90,0.9);"><?php echo $i ?></a>
       		<?php
   				} else { // show link to other page   
        
       		?>
       		<a href="search.php?searchbyqulity=<?php echo $qulity ?>&page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
       		<?php
  			 }
			}

			?>
  			</div></div></div></div>
<?php

			}elseif (isset($_GET['searchbyactor'])) {

				 
				
				?>
				<div class="container">
	<div class="row" style="text-align: center; align-items: center; ">
	
	<div class="btn-toolbar pagecounter" role="toolbar" aria-label="Toolbar with button groups" style="text-align: center" >
	<div class="btn-group mr-2" role="group" aria-label="First group" style="align-items: center;">
		<?php
			for ($i = 1; $i <= $page_count; $i++) {
   				if ($i === $page) { // this is current page
       			?>

       		<a  class="btn btn-secondary" style="color: white; background-color: rgba(90,90,90,0.9);"><?php echo $i ?></a>
       		<?php
   				} else { // show link to other page   
        
       		?>
       		<a href="search.php?searchbyactor=<?php echo $actor ?>&page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
       		<?php
  			 }
			}

			?>
  			</div></div></div></div>
<?php

			}


			?>  

<br>



<br>

<!------------------------------------------------------------------------------------------------------------>
<?php
include 'Footer.php'
?>
