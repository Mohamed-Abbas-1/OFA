<?php
include 'Header.php';


/*
$Name=$_POST['Name'];
$Day=$_POST['Day'];
$Month=$_POST['Month'];
$Year=$_POST['Year'];
$Email = $_POST['Email'];
$Password = $_POST['Password'];
*/
?>

<?php











/*
$query2=	"SELECT * FROM cat 
					INNER JOIN movie_cat
                    ON cat.id = movie_cat.cat_id
					INNER JOIN movie
                    ON movie.id = movie_cat.movie_id
					AND movie.id = 'id'";

$cat = mysqli_query($conn , $query2);

*/
?>





<!------------------------------------------Slide Show------------------------------------------------------>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
	</ol>

		

	<div class="carousel-inner">

		<?php 

		$conn->close();
		$conn6 = mysqli_connect('localhost','root','','ofa');

						// fetch the data from table movie
		$query3 = "SELECT DISTINCT movie.id AS mid,name,name2,desciption,wide_poster,qulity,release_date,
					 imdb,period,created_at

			 FROM movie 
					WHERE movie.is_released= 'yes' AND wide_poster != '' ORDER BY movie.created_at DESC LIMIT 1" ;
		$movie2 = mysqli_query($conn6 , $query3);


		
					while ($row2 =MySQLi_fetch_array($movie2))  :{
						$name = $row2['name2'];
						$mid= $row2['mid'];
						$des=$row2['desciption'];
					} ?>
				

		<div class="carousel-item active">
			<a href="movie.php?action=<?php echo $mid; ?>"><img class="d-block w-100 img img2" src="images/WidePoster/<?php echo $row2['wide_poster']; ?>" alt="First slide"></a>
			<div class="carousel-caption d-none d-md-block" style="background:rgba(255,255,255,0.2);">
				<h5><?php echo $name ?> - (<a class="slide-year" style="color: white;" href="search.php?searchbyyear=<?php echo $row2['release_date']?>"><?php echo $row2['release_date']  ?></a>)</h5>
				<h6>
					<a class="slide-content" href="search.php?searchbyqulity=<?php echo $row2['qulity']?>"><span class="HD3 slide-content"><?php echo $row2['qulity'] ?></span></a>
					<a class="slide-content" href="search.php?searchbyimdb=<?php echo $row2['imdb']?>"><span class="star2 slide-content">IMDb: <?php echo $row2['imdb'] ?></span></a>
					<span style="margin-left: 20px;">
						Genre: <span style="color: #b3b3b3">

									<?php $query2=	"SELECT * FROM cat 
					INNER JOIN movie_cat
                    ON cat.id = movie_cat.cat_id
					INNER JOIN movie
                    ON movie.id = movie_cat.movie_id
					AND movie.id = '$mid'";

				$cat = mysqli_query($conn6 , $query2);
				?>

					 			<?php 
									// fetch the data from table cat
									while ($row =mysqli_fetch_assoc($cat)) {
									?> 
									

									 <a class="slide-genre" style="color: #b3b3b3;" href="search.php?searchbycat=<?php echo $row['cat_name']?>"><?php echo $row['cat_name']." , ";?></a>
									<?php		 

								} ?>
					 	</span> 

					</span>
				</h6>
				<p><?php echo $des; ?></p>
				<a href="movie.php?action=<?php echo $mid; ?>" class="btn btn-primary  " >Watch Now</a>
			</div>
		</div>

			<?php endwhile ?>
		
			<?php

				$conn6->close();
$conn2 = mysqli_connect('localhost','root','','ofa');
			?>
			<?php 
			
						// fetch the data from table movie
			$query4 = "SELECT DISTINCT movie.id AS nid,name,name2,desciption,wide_poster,qulity,release_date,
					 imdb,period,created_at

			 FROM movie 
					WHERE movie.is_released= 'yes' AND movie.id !='$mid' AND  wide_poster != '' ORDER BY movie.created_at DESC LIMIT 5" ;
			$movie3 = mysqli_query($conn2 , $query4);

				
					while ($row =mysqli_fetch_assoc($movie3))  :{
						$nid= $row['nid'];
						$des2=$row['desciption'];
						$slname6 = $row['name2'];
					} ?>
					
		<div class="carousel-item">
			<a href="movie.php?action=<?php echo $nid; ?>"><img class="d-block w-100 img img2" src="images/WidePoster/<?php echo $row['wide_poster']; ?>" alt="Second slide"></a>
			<div class="carousel-caption d-none d-md-block" style="background:rgba(255,255,255,0.2);">
				<h5><?php echo $slname6; ?> - (<a class="slide-year" style="color: white;" href="search.php?searchbyyear=<?php echo $row['release_date']?>"><?php echo $row['release_date']  ?></a>)</h5>
				<h6>
					<a class="slide-content" href="search.php?searchbyqulity=<?php echo $row['qulity']?>"><span class="HD3 slide-content"><?php echo $row['qulity'] ?></span></a>
					<a class="slide-content" href="search.php?searchbyimdb=<?php echo $row['imdb']?>"><span class="star2 slide-content">IMDb: <?php echo $row['imdb'] ?></span></a>
					<span style="margin-left: 20px;">
						Genre: <span style="color: #b3b3b3">

									<?php $query2=	"SELECT * FROM cat 
					INNER JOIN movie_cat
                    ON cat.id = movie_cat.cat_id
					INNER JOIN movie
                    ON movie.id = movie_cat.movie_id
					AND movie.id = '$nid'";

				$cat = mysqli_query($conn2 , $query2);
				?>

					 			<?php 
									// fetch the data from table cat
									while ($row =mysqli_fetch_assoc($cat)) {
						
									

									 ?> 
									

									 <a class="slide-genre" style="color: #b3b3b3;" href="search.php?searchbycat=<?php echo $row['cat_name']?>"><?php echo $row['cat_name']." , ";?></a>
									<?php		 

								} ?>
					 	</span> 

					</span>
				</h6>
				<p><?php echo $des2 ?></p>
				
				<a href="movie.php?action=<?php echo $nid; ?>" class="btn btn-primary  " >Watch Now</a>
			</div>
		</div>

		<?php endwhile 
			

		?>

	
	</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<!--------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------->


<!---------------------------------------------------------------- Movies ---------------------------------------------->
	<!--   button group -->
	
	<?php


$page = 1;
if(!empty($_GET['page'])) {
    $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
    if(false === $page) {
        $page = 1;
    }
}

// set the number of items to display per page
$items_per_page = 8;

$offset = ($page - 1) * $items_per_page;	



$sql6 = "SELECT COUNT(id) AS movieid FROM movie WHERE movie.is_released= 'yes'";
$result6 = mysqli_query($conn2, $sql6);

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


// make your LIMIT query here as shown above


// later when outputting page, you can simply work with $page and $page_count to output links
// for example
?>
   <div class="container ">
	<div class="row pagecounter" style="text-align: center; align-items: center; ">
	
	<div class="btn-toolbar " role="toolbar" aria-label="Toolbar with button groups" style="text-align: center" >
	<div class="btn-group mr-2" role="group" aria-label="First group" style="align-items: center;">
		<?php
			for ($i = 1; $i <= $page_count; $i++) {
   				if ($i === $page) { // this is current page
       			?>

       		<a  class="btn btn-secondary" style="color: white; background-color: rgba(90,90,90,0.9);"><?php echo $i ?></a>
       		<?php
   				} else { // show link to other page   
        
       		?>
       		<a href="index.php?page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
       		<?php
  			 }
			}

			?>
  			</div></div></div></div>

<section>
	<div class="container" style="background-color: rgba(0,0,0,0);">
		<div class="row">
			<?php 

			$conn2->close();
			$conn3 = mysqli_connect('localhost','root','','ofa');

			$query3 = "SELECT * FROM movie WHERE movie.is_released= 'yes'  ORDER BY created_at DESC LIMIT $offset , $items_per_page ";


$movie = mysqli_query($conn3 , $query3);
						// fetch the data from table movie
					while ($row =mysqli_fetch_assoc($movie)) :{
						
					} ?>
					<?php
					$id =$row['id']; ?>
			<div class="col-md-3 col-sm-6 col-xs-6 mov " style="margin-top:20px;" >
				<div class="border2" >

					<p class="HD" ><?php echo $row['qulity']; ?></p>

					<p class="star">&#9733;<?php echo $row['imdb'] ?></p>

					<a href="movie.php?action=<?php echo $id; ?>" onmouseenter="$(this).siblings().show();" onmouseleave="$(this).siblings('span').hide();"><p class="Text2 " ><?php echo $row['name']; ?> </p></a>

					<a href="movie.php?action=<?php echo $id; ?>" onmouseenter="$(this).siblings().show();" onmouseleave="$(this).siblings('span').hide();"><img class="poster movie img "  src="images/poster/<?php echo $row['poster']; ?>" ></a>

					<span class=" popover" id="none1" onmouseenter="$(this).show();" onmouseleave="$(this).hide();">
						
						<div class=" container" id="pop" >
							<div>
								<p class="popmoviename"><?php echo $row['name']; ?></p>

								<p class="HD2"><?php echo $row['qulity']; ?></p>
							</div>
							<div>
								<span class="popmovieimdb" >IMDb <?php echo $row['imdb']; ?></span>
								&nbsp;&nbsp;
								<span><?php echo $row['release_date']; ?></span>
								&nbsp;&nbsp;
								<span><?php echo $row['period']; ?></span>
							</div>
							<div class="popspan" >
								<?php echo $row['desciption']; ?>
							</div>
							<div class="popspan" >
								Country: <a class="movie-genre" style="color: #b3b3b3;" href="search.php?searchbycontury=<?php echo $row['country']?>"><span style="color: #b3b3b3"><?php echo $row['country']; ?></a>
									<?php $img= $row['qulity'];  ?>
								</span>
							</div>
							<div class="popspan" >

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

				$cat = mysqli_query($conn3 , $query2);
				?>

					 			<?php 
									// fetch the data from table cat
									while ($row =mysqli_fetch_assoc($cat)) {
						
									?> 
									

									 <a class="movie-genre" style="color: #b3b3b3;" href="search.php?searchbycat=<?php echo $row['cat_name']?>"><?php echo $row['cat_name']." , ";?></a>
									<?php		 

								} ?>
					 	</span>
							</div>
							
							<a  href="<?php echo $imdb ?>" target="_blank" class="btn btn btn-success IMDb"><span class="popmovielink">View on
								IMDb</span></a>
							<a  href="movie.php?action=<?php echo $id; ?>" class="btn btn-primary Watch " ><span class="popmovielink">Watch Now</span></a>
						</div>
						
					</span>


					
				</div>
			</div>

			<?php endwhile;?>
					
		</div>
	</div>
</section>


<div class="container ">
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
       		<a href="index.php?page=<?php echo $i ?>" class="btn btn-secondary" style="color: white;"><?php echo $i ?></a>
       		<?php
  			 }
			}

			?>
  			</div></div></div></div>
  			
<br>





<?php
include 'Footer.php';

?>