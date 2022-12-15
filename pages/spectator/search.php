<?php $title = "Search";
include "../../controllers/MatchesController.php";
include "../../controllers/StadiumsController.php";
include_once("../../includes/spectator/head.php");
?>
<body>
  <header>
    <?php include_once("../../includes/spectator/navbar.php"); ?>
    <section id="banner" class="position-relative">
      <img src="../../assets/img/banner.png" alt="banner" width="100%">
      <div class="w-100">
        <form id="searchBar" class="bottom-0 d-flex justify-content-center flex-wrap row mx-0 gy-1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <input class="col-10 col-sm-4" type="text" name="text" placeholder="Search by matches, teams, stadiums, and more">
          <input class="col-10 col-sm-4 date-selection" type="text" name="date" placeholder="&#xf073;  Select date">
          <button type="submit" class="btn-prim col-10 col-sm-2" name="search"><i class="bi bi-search"></i> Search</button>
        </form>
      </div>
    </section>
  </header>

  <!-- SEARCH -->
  <section class="cardsSection mx-5">

  <!-- ////////////////////////// Browse National Teams /////////////////////////////////-->
  <div class="d-flex flex-column align-items-center justify-content-between mt-4 mb-3">
    <span class="fs-6 fw-bolder">Browse National Teams</span>
    
        <?php
        if(isset($_POST["search"])){
        $db = new Database();
        $search =$_POST["text"];

        $sql="SELECT * FROM `teams` WHERE name LIKE '%".$search."%'";
        $stmt=$db->con->prepare($sql);
        $stmt->execute();
        $result=$stmt->fetchAll();

        foreach($result as $row){
          echo '<div class="card col-12 col-sm-6 col-lg-3 m-3">
              <img src="../../assets/img/'.$row['team_image'].'" class="card-img-top" alt="Team" height="225">
              <div class="card-body d-flex flex-column align-items-start row-gap">
                  <span class="fs-8">'.$row['name'] .' National Team</span>
                  <span class="fs-8">Group '.$row['team_group'].'</span>
                  <span class="fs-8"><i class="fas fa-location-dot" ></i> '.$row['name'].'</span>
              </div>
          </div>';
                
        }
        }
        ?>

</div>

  </section>


  <?php include ("../../includes/spectator/footer.php"); ?>
</body>
</html>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/scripts.js"></script>