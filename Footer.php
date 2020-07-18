<?php
if (isset($accountid)) {
  $requestid = $accountid;
}else{
  $requestid = "";
}

?>
<script>
$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#request").click(function() {
       //Assigning search box value to javascript variable named as "name".
       var request = $('#requesttext').val();
       var username18 = $('#requestid').val();
       //Validating, if "comment" is empty.
       if (username18 == "") {
           //Assigning empty value to "display" div in "search.php" file.
   Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'You have to login in to Send Request!',
  
});
   $("#requesttext").val("");
           }else if(request ==""){
   
       $("#requesttext").val("");

       //If commenttext is not empty.
       }else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "comment.php".
               url: "request.php",
               //Data, that will be sent to "comment.php".
               data: {
                   //Assigning value of "ncomment and other" into "comment and other" variable.
                   request: request,
                   username18: username18
               },
               //If result found, this funtion will be called.
               success: function(comment) {
                   //Assigning result to "display" div in "search.php" file.       
           $("#requesttext").val("");

            Swal.fire(
  'Successful Sent Request',
  '',
  'success'
);
               }
           });
       }
   });
});





</script> 
<div class="container" >
  <div class="row">
    <div class="col-md-12">
     <a href="https://www.cic-cairo.com/" target="_blank" > <img src="icons/download.png" width="100%" height="auto"></a>
    </div>
  </div>
</div>
<br>
<!-- Footer -->
  <section>

    <div class="footer-container " >
      <footer class="short bg-secondary-1">
        <div class="container-fluid" style="color: #a1a1a1;">
          <div class="row">
           <div class="col-md-6 footerfirst">
            <img class="footerlogo" src="icons/OFA12.png">
            <p class="footerparagraph">OFA-Free movies online, here you can watch movies online in high quality for free without annoying of advertising, just come and enjoy your movies online.</p>
            <div class="twitterfooter"><a class="twitterfooter2" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter " ></i> Connect with us on Twitter</a></div>
             
              <div class="twitterfooter"><a class="twitterfooter2" target="_blank" href="https://www.facebook.com/"><i class="fab fa-facebook-f" style="margin-top: 1vh"></i> Connect with us on Facbook</a></div>
              <div class="twitterfooter2"> Copyright © 2019-2019 OFA. All Rights Reserved </div></div>
          
            <div class="col-xs-4 mt-3 footercat">
              <div class="heading">Movies</div>
              <div><a class="twitterfooter2" href="search.php?searchbycat=Action">Action</a></div>
              <div><a class="twitterfooter2" href="search.php?searchbycat=Adventure">Adventure</a></div>
              <div><a class="twitterfooter2" href="search.php?searchbycat=Animation">Animation</a></div>
              <div><a class="twitterfooter2" href="search.php?searchbycat=Crime">Crime</a></div>
              <div><a class="twitterfooter2" href="search.php?searchbycat=Comedy">Comedy</a></div>
              <div><a class="twitterfooter2" href="search.php?searchbycat=Drama">Drama</a></div>
              
              
              <div><a class="twitterfooter2" href="search.php?searchbycat=Family">Family</a></div>
              <div><a class="twitterfooter2" href="search.php?searchbycat=Fantasy">Fantasy</a></div>
              <div><a class="twitterfooter2" href="search.php?searchbycat=Romance">Romance</a></div>
              <div><a class="twitterfooter2" href="search.php?searchbycat=Sci-Fi">Sci-Fi</a></div>
              <div><a class="twitterfooter2" href="search.php?searchbycat=Sports">Sports</a></div>
              <div><a class="twitterfooter2" href="search.php?searchbycat=Horror">Horror</a></div>
            </div>
            <div class="col-xs-4 mt-3 footercat">
              <div class="heading">Country</div>
              <div><a class="twitterfooter2" href="search.php?searchbycontury=United States">United States</a></div>
              <div><a class="twitterfooter2" href="search.php?searchbycontury=United Kingdom">United Kingdom</a></div>
              <div><a class="twitterfooter2" href="search.php?searchbycontury=Asia">Asia</a></div>
              <div><a class="twitterfooter2" href="search.php?searchbycontury=Japan">Japan</a></div>
              
              <div><a class="twitterfooter2" href="search.php?searchbycontury=Korean">Korean</a></div>
              <div><a class="twitterfooter2" href="search.php?searchbycontury=Egypt">Egypt</a></div>
              <div><a class="twitterfooter2" href="search.php?searchbycontury=China">China</a></div>
              <div><a class="twitterfooter2" href="search.php?searchbycontury=India">India</a></div>
            </div>
            <div class="col-xs-4 mt-3 footercat">
              <div class="heading">Help</div>
              <div><span class="twitterfooter2" onclick="document.getElementById('Request').style.display='block'">Request</span></div>
              <div><a class="twitterfooter2" href="#">Blog</a></div>
              <div><a class="twitterfooter2" href="#">Sitemap</a></div>
              <div><a class="twitterfooter2" href="#">DCMA</a></div>
              <div><a class="twitterfooter2" href="#">FAQ</a></div>
              
        </div>
      </div>

      </div>
      </footer>
    </div>
  </section>

  <!----------------------------------------REQUEST MESSEGE---------------------------------------->

  <div id="Request" class="modal" style="z-index: 20;margin-top: 25vh;background-color: rgba(0,0,0,0.0);">
  <div class="modal-content animate" >
      <div class="imgcontainer">
      <span onclick="document.getElementById('Request').style.display='none'" class="close" title="Close PopUp">&times;</span>
    </div>
      <div class="container" style="margin-top: 15px;">
        <input type="text" id="requesttext" name="" class="" placeholder="Enter Your Request" >
        <button class="btn btn-success sign" id="request"  name="" >Send Request</button>
        <input type="hidden" id="requestid" name="" value="<?php echo $requestid ?>">
      </div>
  </div>
</div>
<!-------------------------------------------------------------------------------------------------->

  <script src="js/all.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js1.js"></script>
  <script type="text/javascript" src="js/js1.js"></script>

 
    


 
</body>
</html>

