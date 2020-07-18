<?php
	include 'panalheader.php';
?>
<div class="container">
	<div class="row">
		
<div class="col-sm-6 col-xs-12 body_container">
<div class="panal_body">
	<div class="addmoviebody" style="min-height: 70vh;">
		
		<div class="container" style="margin-top: 15vh;">
			
		<div class="row">


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2" style="border-left: 5px solid #28a745;cursor: pointer;" onclick="window.location.replace('movies.php');">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Movies (Number)</div>
                          <?php
         			 $selectmovie = "SELECT COUNT(id) AS mid FROM movie";
          $selectmovienum = mysqli_query($con , $selectmovie);
          while ($row2 = MySQLi_fetch_array($selectmovienum)) {
            $movienum = $row2['mid'];
           } 
        ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $movienum ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-film fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card  shadow h-100 py-2" style="border-left: 5px solid #17a2b8;cursor: pointer" onclick="window.location.replace('users.php');">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Users (Number)</div>
                  		<?php
         			 $selectuser = "SELECT COUNT(id) AS uid FROM account";
          $selectusernum = mysqli_query($con , $selectuser);
          while ($row3 = MySQLi_fetch_array($selectusernum)) {
            $usernum = $row3['uid'];
           } 
        ?>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $usernum ?></div>
                      </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-6 mb-4" >
              <div class="card  shadow h-100 py-2" style="border-left: 5px solid #ffc107;cursor: pointer" onclick="window.location.replace('requests.php');">
                <div class="card-body" >
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="">Requests (Number)</div>
                      <?php
         			 $selectreq = "SELECT COUNT(id) AS rid FROM request";
          $selectreqnum = mysqli_query($con , $selectreq);
          while ($row4 = MySQLi_fetch_array($selectreqnum)) {
            $reqnum = $row4['rid'];
           } 
        ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $reqnum ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>

</div>
</div>
</div>
</div>