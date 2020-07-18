

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }

function changepass(){
	getElementById('newpass').style.display='block';
	getElementById('lastpass').style.display='none';

}

  $(document).ready(function(){
$(".dropdown").hover(function(){
       $(this).children(".dropdown-menu").toggleClass("show");
    });

	
/*
	$(".img").mouseenter(function(){
       $(this).siblings().show();
    });
	
     $(".img").mouseleave(function(){
       $('#none1').hide();
    });

     

     $("#none1").mouseenter(function(){
       $("#none1").show();
    });

     $("#none1").mouseleave(function(){
       $('#none1').hide();
    });

   */  


// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}





  // If user clicks anywhere outside of the modal, Modal will close

  var modal4 = document.getElementById('m');
var trdata = $('#opentr').attr('src');
  window.onclick = function (event) {
    if (event.target == modal4) {
      modal4.style.display = "none";
      $('#opentr').attr('src', 'none');
      $('#opentr').attr('src', trdata);
    }
  }








});