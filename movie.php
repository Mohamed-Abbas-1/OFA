<?php
include 'Header.php';
?>





<script>
function fill2(Value) {
   //Assigning value to "search" div in "search.php" file.
   $('#commenttext').val(Value);
   //Hiding "display" di v in "search.php" file.
   
} 
$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#commentbtn").click(function() {
       //Assigning search box value to javascript variable named as "name".
       var comment = $('#commenttext').val();
       var moviename = $('#commenttest1').val();
       var username = $('#commenttest2').val();
       //Validating, if "comment" is empty.
       if (comment == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#commenttext").val("");
           }else if(username ==""){
            Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'You have to login in to comment!',
  
});
       

       //If commenttext is not empty.
       }else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "comment.php".
               url: "comment.php",
               //Data, that will be sent to "comment.php".
               data: {
                   //Assigning value of "ncomment and other" into "comment and other" variable.
                   comment: comment,
                   moviename: moviename,
                   username: username
               },
               //If result found, this funtion will be called.
               success: function(comment) {
                   //Assigning result to "display" div in "search.php" file.
                   
                   setTimeout(function() {
$(".comments").load(location.href+" .comments>*"+"");
}, 1);
                    
               setTimeout(function() {
$("#commentcount").load(location.href+" #commentcount>*"+"");
}, 1);
 
           
           $("#commenttext").val("");

          //  $('#div').load(document.URL +  ' #div');  
         //  window.location.href ="movie.php?action=<?php // echo $_GET['action'] ?>";     



 

               }
           });
       }
   });
});





</script> 

<script>

$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#watchlist").click(function() {
       //Assigning search box value to javascript variable named as "name".
       var moviename2 = $('#commenttest1').val();
       var username2 = $('#commenttest2').val();
       //Validating, if "comment" is empty.
       if(username2 ==""){
            Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'You have to login in to get your personal Watch-later list!',
  
});
       

       //If commenttext is not empty.
       }else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "comment.php".
               url: "lists/watchlater.php",
               //Data, that will be sent to "comment.php".
               data: {
                   //Assigning value of "moviename2 and other" into "moviename2 and other" variable.
                   
                   moviename2: moviename2,
                   username2: username2
               },
               //If result found, this funtion will be called.
               success: function(watchlater) {
                   //Assigning result to "display" div in "search.php" file.
                   
                   setTimeout(function() {
$("#watch").load(location.href+" #watch>*"+"");
}, 1);
                    Swal.fire(
  'Successful Added to Watch-later list',
  '',
  'success'
);

                   
          //  $('#div').load(document.URL +  ' #div');  
         //  window.location.href ="movie.php?action=<?php // echo $_GET['action'] ?>";     



 

               }
           });
       }
   });
});





</script>   

<script>

$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#favouritlist").click(function() {
       //Assigning search box value to javascript variable named as "name".
       var moviename4 = $('#commenttest1').val();
       var username4 = $('#commenttest2').val();
       //Validating, if "comment" is empty.
       if(username4 ==""){
            Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'You have to login in to get your personal Favourit list!',
  
});
       

       //If commenttext is not empty.
       }else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "comment.php".
               url: "lists/favouritlist.php",
               //Data, that will be sent to "comment.php".
               data: {
                   //Assigning value of "moviename2 and other" into "moviename2 and other" variable.
                   
                   moviename4: moviename4,
                   username4: username4
               },
               //If result found, this funtion will be called.
               success: function(favouritlist) {
                   //Assigning result to "display" div in "search.php" file.
                   
                   setTimeout(function() {
$("#fav").load(location.href+" #fav>*"+"");
}, 1);
                    Swal.fire(
  'Successful Added to Favourit list',
  '',
  'success'
);
 }
           });
       }
   });
});





</script>   



<script>
 // like system
$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#likeicon").click(function() {
       //Assigning search box value to javascript variable named as "name".
       
       var moviename11 = $('#commenttest1').val();
       var username11 = $('#commenttest2').val();
       //Validating, if "comment" is empty.
       if(username11 =="" ) {
        $("#likeicon").css("color", "grey");
            Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'You have to login in to Rating',
  
});
       /*
              setTimeout(function() {
$(".reloadrating").load(location.href+" .reloadrating>*"+"");
}, 1); */
    
       //If commenttext is not empty.
      }else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "comment.php".
               url: "rating/like.php",
               //Data, that will be sent to "comment.php".
               data: {
                   //Assigning value of "moviename2 and other" into "moviename2 and other" variable.
                   
                   moviename11: moviename11,
                   username11: username11,
                   
               },
               //If result found, this funtion will be called.
               success: function(like) {
                   //Assigning result to "display" div in "search.php" file.
                  
                   setTimeout(function() {
$(".dislikereload").load(location.href+" .dislikereload>*"+"");
}, 1);
                         setTimeout(function() {
$(".likereload").load(location.href+" .likereload>*"+"");
}, 1);
               

$("#likeicon").css("color", "gold");
$("#dislikeicon").css("color", "grey");
    
 }
           });
       }
   });
});





</script>





<script>
  // dislike system
$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#dislikeicon").click(function() {
       //Assigning search box value to javascript variable named as "name".
       
       var moviename12 = $('#commenttest1').val();
       var username12 = $('#commenttest2').val();
       //Validating, if "comment" is empty.
       if(username12 =="" ) {
        $("#likeicon").css("color", "grey");
            Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'You have to login in to Rating',
  
});
       /*
              setTimeout(function() {
$(".reloadrating").load(location.href+" .reloadrating>*"+"");
}, 1); */
    
       //If commenttext is not empty.
      }else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "comment.php".
               url: "rating/dislike.php",
               //Data, that will be sent to "comment.php".
               data: {
                   //Assigning value of "moviename2 and other" into "moviename2 and other" variable.
                   
                   moviename12: moviename12,
                   username12: username12,
                   
               },
               //If result found, this funtion will be called.
               success: function(dislike) {
                   //Assigning result to "display" div in "search.php" file.
                      setTimeout(function() {
$(".dislikereload").load(location.href+" .dislikereload>*"+"");
}, 1);
                         setTimeout(function() {
$(".likereload").load(location.href+" .likereload>*"+"");
}, 1);          

$("#dislikeicon").css("color", "gold");
$("#likeicon").css("color", "grey");
    
 }
           });
       }
   });
});
</script>

<!-------------------------------------------------------movie----------------------------------------------------------------------------->

<?php

if (isset($_GET['action'])) {
  # code...
}else{
  ?>
    <script>
         window.location.replace("index.php");
    </script>
   <?php
}

  $id = $_GET['action'];
  

  $query = "SELECT * FROM movie WHERE movie.id='$id'";


  $movie = mysqli_query($conn , $query);

  $row =mysqli_fetch_assoc($movie);
?>
<?php

  if (isset($_SESSION["login"])||isset($_SESSION['googlelogin'])) {
    $userimg= $accountpicture;
  }else{
    $userimg= "icons/profile.jpg";
  }
?>

<?php

if (isset($accountid)) {
  

$testlikequery = "SELECT id FROM rating WHERE movie_id = '$id' AND acount_id = '$accountid' AND rating_like = 1 ";
    $testlike = mysqli_query($conn , $testlikequery);

    if (mysqli_num_rows($testlike) > 0){ 
    ?>
    <script>
$(document).ready(function() {
$("#dislikeicon").css("color", "gery");
$("#likeicon").css("color", "gold");

});
</script>
    <?php
}
$testdislikequery = "SELECT id FROM rating WHERE movie_id = '$id' AND acount_id = '$accountid' AND rating_dislike = 1 ";
    $testdislike = mysqli_query($conn , $testdislikequery);

    if (mysqli_num_rows($testdislike) > 0){ 
    ?>
    <script>
$(document).ready(function() {
$("#dislikeicon").css("color", "gold");
$("#likeicon").css("color", "grey");

});
</script>
    <?php
}
}
?>
    
  <?php
if (isset($id)) {
  ?>
  <script>
  $(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   
       //Assigning search box value to javascript variable named as "name".
       
       var moviename13 = $('#commenttest1').val();
       
       //Validating, if "comment" is empty.
       if(moviename13 =="" ) {
          
       /*
              setTimeout(function() {
$(".reloadrating").load(location.href+" .reloadrating>*"+"");
}, 1); */
    
       //If commenttext is not empty.
      }else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "comment.php".
               url: "viewer.php",
               //Data, that will be sent to "comment.php".
               data: {
                   //Assigning value of "moviename2 and other" into "moviename2 and other" variable.
                   
                   moviename13: moviename13,
                   
                   
               },
               //If result found, this funtion will be called.
               success: function(viewers) {
                   //Assigning result to "display" div in "search.php" file.
                  
                  setTimeout(function() {
$(".viewers").load(location.href+" .viewers>*"+"");
}, 1);    
    
 }
           });
       }
   });

</script>
<?php
}

  ?> 


  <?php

if(isset($accountid)){
$historyuser = $accountid;
if (isset($historyuser)) {
  
  $selecthistory = "SELECT id FROM history WHERE movie_id = '$id' AND acount_id = '$accountid'";
    $testhistory = mysqli_query($conn , $selecthistory);
    if (mysqli_num_rows($testhistory) > 0){ 
      while ($row8 = MySQLi_fetch_array($testhistory)) {
      $historyid = $row8['id'];
      }
      $deletehistory = "DELETE  FROM history WHERE id = '$historyid'";
    
      if (mysqli_query($conn, $deletehistory)) {
      
      }
      $inserthistory = "INSERT INTO history (movie_id, acount_id)
VALUES ('$id', '$accountid')";

if (mysqli_query($conn, $inserthistory)) {
    
    ?>
    <script>
  $(document).ready(function() {
   setTimeout(function() {
$("#history").load(location.href+" #history>*"+"");
}, 1);
   });
</script>
<?php
    
}

    }else{            

$inserthistory = "INSERT INTO history (movie_id, acount_id)
VALUES ('$id', '$accountid')";

if (mysqli_query($conn, $inserthistory)) {
    
  ?>
<script>
  $(document).ready(function() {
   setTimeout(function() {
$("#history").load(location.href+" #history>*"+"");
}, 1);
   });
</script>

  <?php   

}
 
  }
}
}
?>
        

<div class="container" style="margin-top: 90px; color: white">
  <div class="row">
    <a href="index.php" class="link">Home </a>&nbsp;&nbsp; <span style="font-size: 20px;">/</span> &nbsp;&nbsp;
    <a href="movie.php?action=<?php echo $id ?>" class="link" style="color: #007bff;"> <?php echo $row['name2']; ?></a>
  </div>

  <div class="row" style="margin-top: 25px;margin-bottom: 5px;">
    <div class="col-md-10" >
    <a href="<?php echo $row['imdb_link']; ?>" target="_blank" class="btn btn-success mb-1 viewimdb">View on IMDb</a>
    </div>
    <div class="col-md-2 mb-1" >
    <a href="torrent/<?php echo $row['torrent'] ?>" target="_blank" class="btn btn-danger torrent"><span style="z-index: 11;">Download the Torrent</span></a>
    </div>
    </div>

    

  <div class="row " id="local">
    <iframe id="local2" src="Movies/<?php echo $row['server1']?>" width="100%" height="550px" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen autopaused></iframe>
    
  </div>

  
<script>
$(function(){
    $('#server1').click(function(){      
        

         
        $('#local2').attr('src', 'Movies/<?php echo $row['server1']?>');
    });
});
</script>

<script>
$(function(){
    $('#server2').click(function(){    
     
        $('#local2').attr('src', '<?php echo $row['server2']?>');
        
    });
});
</script>

  
    <div class="row features">
      <div class="col-md-3 ratingdiv" style="margin-top: 8px;">
      <span class="fa fa-thumbs-up rateicon" id="likeicon"></span>
      <span class="likereload">
        <?php
          $selectlike = "SELECT COUNT(rating_like) AS likerating FROM rating WHERE movie_id = '$id';";
          $selectlikenum = mysqli_query($conn , $selectlike);
          while ($row4 = MySQLi_fetch_array($selectlikenum)) {
            $likenum = $row4['likerating'];
           } 
        ?>
        <span><?php echo $likenum ?></span>
      
      </span>

      <span class="fa fa-thumbs-down rateicon" id="dislikeicon"></span>
      <span class="dislikereload">
        <?php
          $selectlike = "SELECT COUNT(rating_dislike) AS dislikerating FROM rating WHERE movie_id = '$id';";
          $selectlikenum = mysqli_query($conn , $selectlike);
          while ($row5 = MySQLi_fetch_array($selectlikenum)) {
            $dislikenum = $row5['dislikerating'];
           } 
        ?>
        <span><?php echo $dislikenum ?></span>
      </span>
      
      <span style="margin-left: 12px;" >
        <img src="icons/viewer.png" style="width: 20px;"></span>
      
      <span class="viewers">
        <?php
          $selectviewers = "SELECT viewers FROM movie WHERE id = '$id'";
          $selectviewersnum = mysqli_query($conn , $selectviewers);
          while ($row6 = MySQLi_fetch_array($selectviewersnum)) {
            $viewersnum = $row6['viewers'];
           } 
        ?>
        <span style="margin-left: 2px;"><?php echo $viewersnum ?></span>
  </span>
    </div>
     
      

            <div class="col-md-2 add" id="watchlist" style="margin-left: 0px;">
               <i class="fa fa-plus"></i> Watch list 
            </div>
      
            <div class="col-md-3 add" id="favouritlist" style="margin-left: 0px;">
              <i class="fa fa-plus"></i> Favourit list 
            </div>
      
    
      <div class="col-md-2 " >
        <button class="btn btn-secondary server" id="server1" >Server 1</button>
        </div>
        
        <div class="col-md-2 " >
        <button class="btn btn-secondary  server" id="server2" >Server 2</button>
      </div>


    </div>
    </div>
  </div>

<div class="container">
  <div class="row" style="margin-top: 25px; ">
  <div class="col-md-3 ">
    <img class="img3" src="images/poster/<?php echo $row['poster']?>">
  </div>

  <div class="col-md-9" style="background-color: rgba(0,0,0,0.4);z-index: 11;color: white;">
    <h5 style="color: white; margin-top: 10px;"><?php echo $row['name2'];?> 

      <button class="btn btn-danger " type="submit" style="float: right;"
          onclick="document.getElementById('m').style.display='block'" id="watchtr">watch tralier</button></h5>
      
      <div>
    <span style="background-color: green;padding:5px;">IMDb: <?php echo $row['imdb'];?></span>
             &nbsp;&nbsp;&nbsp;
             <span><?php echo $row['period'];?></span>
    </div>
    <div style="margin-top: 40px;">
      <?php echo $row['desciption'];?>
    </div>
    <?php
      $name = $row['name'];
      $name2 = $row['name2'];
      $Country=  $row['country'];
      $Release=  $row['release_date'];
      $qulity=  $row['qulity'];
      $Trailer=  $row['trailer'];
      $name3 = substr($name, 0, 5);  // returns "From the start Until the char 5 before the end"
    ?>
    


    <div style="margin-top:10px;">
            Genre: <span style="color: #b3b3b3"> <?php $query2= "SELECT * FROM cat 
          INNER JOIN movie_cat
                    ON cat.id = movie_cat.cat_id
          INNER JOIN movie
                    ON movie.id = movie_cat.movie_id
          AND movie.id = $id";

        $cat = mysqli_query($conn , $query2);
        ?>

                <?php 
                  // fetch the data from table cat
                  while ($row =mysqli_fetch_assoc($cat)) {
            
                  

                   ?> 
                  

                   <a class="movie-genre2" style="color: #b3b3b3;" href="search.php?searchbycat=<?php echo $row['cat_name']?>"><?php echo $row['cat_name']." / ";?></a>
                  <?php   

                
                    $cat1=$row['cat_name'];

                } ?></span>
    </div>
    <div style="margin-top:10px;">
            Country: <span style="color: #b3b3b3"><a class="movie-genre2" style="color: #b3b3b3;" href="search.php?searchbycontury=<?php echo $Country ?>"><?php echo $Country  ?></a></span>
    </div>
    <div style="margin-top:10px;">
            Stars: <span style="color: #b3b3b3"> <?php $query3= "SELECT * FROM actor 
          INNER JOIN movie_actor
                    ON actor.id = movie_actor.actor_id
          INNER JOIN movie
                    ON movie.id = movie_actor.movie_id
          AND movie.id = $id";

        $actor = mysqli_query($conn , $query3);
        ?>

                <?php 
                  // fetch the data from table cat
                  while ($row =mysqli_fetch_assoc($actor)) {
                    ?>
            
                  <a class="movie-genre2" style="color: #b3b3b3;" href="search.php?searchbyactor=<?php echo $row['actor_name']?>"><?php echo $row['actor_name']." , ";?></a>
                  <?php   
                       

                } ?></span>
    </div>
    <div style="margin-top:10px;">
            Release: <span><a class="movie-genre2" style="color: #b3b3b3" href="search.php?searchbyyear=<?php echo $Release?>"><?php echo $Release  ?></a></span>
    </div>
    <div style="margin-top:10px; margin-bottom: 7px;">
            Quality: <span class="qulity"><a class="movie-genre2" style="color: white;" href="search.php?searchbyqulity=<?php echo $qulity?>"><?php echo $qulity  ?></a></span>

    </div>
    
        
  </div>
</div>
</div>

<!-----------------------------------------------------------Comment----------------------------------------------->
<section id="div1">
  
<div class="container comment" id="div" style="margin-top: 25px;">
  <div class="row" id="div2" style="border-bottom: 3px solid rgba(255,255,255,.2);margin-left: 10px;">
   <div class="col-md-12">
      <strong  class="commentborder"> <span style="border-bottom: 3px solid #288ce4;padding-bottom: 3px;margin-left: -15px;">
        <span id="commentcount">
          <?php
          $selectcomment = "SELECT COUNT(id) AS comentid FROM comment WHERE movie_id = '$id'";
          $selectcommentnum = mysqli_query($conn , $selectcomment);
          while ($row6 = MySQLi_fetch_array($selectcommentnum)) {
            $commentnum = $row6['comentid'];
           } 
        ?>
          <span><?php echo $commentnum; ?></span>
        </span> Comments</span> <a class="OFA" style="margin-left: 50px;" href="index.php">OFA</a>
     
      <script>
        var count =document.getElementById("count");
     </script>

</strong>
<div style="float: right;" class="commentborder">
  <strong><?php

  if (isset($accountid)) {
    echo $accountname;
  }

?></strong></div>
</div>
    </div>

    <?php
      if (isset($accountid)) {
        $commentmaker = $accountid;
      }else{
        $commentmaker = "";
      }




    ?>
    <div class="row" style="margin-top: 30px;">
      <img src="<?php echo $userimg ?>"  class="comment-img" style="margin-top: 8px;">
      <input type="text" placeholder="Join The discussion" id="commenttext" name="" class="discussion"  style="width: 65%;">
      <input class="btn btn-secondary" type="button" id="commentbtn" value="Comment" style="height: 6vh;margin-top: 8px;" name="">
      <input type="hidden" value="<?php echo $id ?>" name="" id="commenttest1">
      <input type="hidden" value="<?php echo $commentmaker ?>" name="" id="commenttest2">
    </div>
    <div class="row comments" style="margin-top: 30px;">
      <div class="container" style="margin-left: 15px;">
      <?php
      
        $query5 = "SELECT * FROM comment  WHERE movie_id='$id' ORDER BY history_date DESC";


$comment = mysqli_query($conn , $query5);
            // fetch the data from table movie
      if (mysqli_num_rows($comment) > 0) {
          while ($row =MySQLi_fetch_array($comment)) :{
                $commenttext = $row['comment'];
                $commentdate =$row['history_date'];
                $commentuserid = $row['acount_id'];
                
                
               
              
          } ?>

          <?php
        $query6 = "SELECT * FROM account  WHERE id='$commentuserid'";


$commentuser = mysqli_query($conn , $query6);
            // fetch the data from table movie
          while ($row =MySQLi_fetch_array($commentuser)) :{
                $commentusername = $row['user_name'];
                if ($row['type']=="user" || $row['type']=="Admin"){
                  $commentuserpic ="icons/".$row['picture'];
                }elseif($row['type']=="googleuser") {
                  $commentuserpic = $row['picture'];
                }else{
                  $commentuserpic= NULL;
                }
          } ?>
      <div class="row div3" style="margin-bottom: 1vh">
        
      <img src="<?php echo $commentuserpic;?>"  class="comment-img2" style="margin-top: 10px;">
      &nbsp;
      <div class="col-md-8" style="margin-top: 10px;margin-bottom: 10px;margin-left: 1vw;margin-right: 2vw;">
        <span style="margin-top: 20px;">
        <strong><span  class="comment-name "><?php echo $commentusername;  ?> </span>

        <span style="color:#656c7a;font-size: 14px; ">• <?php echo $commentdate; ?></span>
        </span>
       
      </strong><br>
          <?php echo $commenttext ?> </div>
          
      <br><br>
      
      </div>
      <?php endwhile;?>
      
   <?php endwhile;?>
   <?php } else {
             ?> <span class="result0"> <?php echo "Be The First One to Comment ."; ?> </span> 
              <?php  } ?>
      </div>
  
    </div>
  


</span></div></div></div></div></div>

<section>
<div class="container" style="margin-top: 100px;color: white">
  <h1 class="alsolike">You Might also like:</h1>

  <?php
  
    $conn->close();
      $conn2 = mysqli_connect('localhost','root','','ofa');

      $query2= "SELECT DISTINCT  movie.id AS mid,name,name2,desciption,poster,wide_poster,qulity,country,release_date,
           is_released,imdb,imdb_link,trailer,period,torrent,server1,server2

            FROM movie 
          INNER JOIN movie_cat
                    ON movie.id = movie_cat.movie_id
          INNER JOIN cat
                    ON cat.id = movie_cat.cat_id
                     AND (movie.name LIKE '%$name3%' OR cat.cat_name = '$cat1' OR movie.release_date ='$Release' )AND movie.id != '$id' AND movie.is_released= 'yes' ORDER BY movie.id DESC LIMIT 4";
  ?>
  </div>
</section>
</span></div>

<section>
  <div class="container" >
    
    <div class="row">

<?php 
$movie2 = mysqli_query($conn2 , $query2);


?>
        <?php   // fetch the data from table movie
          while ($row =MySQLi_fetch_array($movie2)) :{
            
          
          } ?>
          <?php
          

          
           ?>
           
           <div class="col-md-3 col-sm-6 col-xs-6 mov " style="margin-top:30px;" >
        <div class="border2" >
          <?php $id2=$row['mid']; ?>
          <p class="HD" ><?php echo $row['qulity']; ?></p>
          <p class="star">&#9733;<?php echo $row['imdb'] ?></p>
          <a href="movie.php?action=<?php echo $id2; ?>" onmouseenter="$(this).siblings().show();" onmouseleave="$(this).siblings('span').hide();"><h2 class="Text2 " ><?php echo $row['name']; ?> </h2></a>
          <a href="movie.php?action=<?php echo $id2; ?>" onmouseenter="$(this).siblings().show();" onmouseleave="$(this).siblings('span').hide();"><img class="poster movie img "  src="images/poster/<?php echo $row['poster']; ?>" ></a>
          
          <span class=" popover" id="none1" onmouseenter="$(this).show();" onmouseleave="$(this).hide();">
            <div class=" container" id="pop" >
              <div>
                <p  class="popmoviename"><?php echo $row['name']; ?></p>

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

                  <?php $query3=  "SELECT * FROM cat 
          INNER JOIN movie_cat
                    ON cat.id = movie_cat.cat_id
          INNER JOIN movie
                    ON movie.id = movie_cat.movie_id
          AND movie.id = '$id2'";

        $cat = mysqli_query($conn2 , $query3);
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
              
              <a href="<?php echo $imdb ?>" target="_blank" class="btn btn btn-success IMDb"><span class="popmovielink poplink2">View on
                IMDb</span></a>
              <a href="movie.php?action=<?php echo $id2; ?>" class="btn btn-primary Watch " ><span class="popmovielink poplink2">Watch Now</span></a>
            </div>
            
          </span>


          
        </div>
      </div>

      <?php endwhile;?>

      
          
    </div>
  </div>

</section>
</div>
    
</section>
<div class="hiden">
  <input type="hidden" value="<?php echo $id ?>" name="">
  <input type="hidden" value="<?php echo $accountid ?>" name="">
</div>

<br>
<br>








<!--------------------------------------------------------------Trailer---------------------------------------------->

 <div id="m" class="modal" style="z-index: 20">
  <form class="modal-content animate" action="movie.php">
      <div class="imgcontainer">
      <span onclick="document.getElementById('m').style.display='none'" class="close" id="closetr" title="Close PopUp">&times;</span>
    </div>
      <div class="container" style="margin-top: 15px;">
        <iframe id="opentr" width="100%" height="490" src="<?php echo $Trailer?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
  </form>
</div>

<script>
$(function(){
    $('#closetr').click(function(){    
      
        $('#opentr').attr('src', 'none');
        $('#opentr').attr('src', '<?php echo $Trailer?>');
    });
});
</script>


<?php
include 'Footer.php'
?>

