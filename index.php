<?php $title = "Home";
include "controllers/MatchesController.php";
include "controllers/StadiumsController.php";
include_once("includes/spectator/head.php");
?>
<body>
  <header>
    <?php include_once("includes/spectator/navbar.php"); ?>
    <section id="banner" class="position-relative">
      <img src="assets/img/banner.png" alt="banner" width="100%">
      <div class="w-100">
        <form id="searchBar" class="bottom-0 d-flex justify-content-center flex-wrap row mx-0 gy-1">
          <input class="col-10 col-sm-4" type="text" placeholder="Search by matches, teams, stadiums, and more">
          <input class="col-10 col-sm-4 date-selection" type="text" name="date" placeholder="&#xf073;  Select date">
          <button type="button" class="btn-prim col-10 col-sm-2"><i class="bi bi-search"></i> Search</button>
        </form>
      </div>
    </section>
  </header>
    
    <section class="cardsSection mx-5 mb-5">
        <!-- ////////////////////////// UPCOMIGN MATCHES /////////////////////////////////-->
        <div class="d-flex align-items-center justify-content-between mt-4 mb-3">
            <span class="fs-6 fw-bolder">Upcoming Matches</span>
            <span class="fs-8 fw-bolder view-all">View All <i class="fa-solid fa-angle-right"></i></span>
        </div>
        <div class="carousel-cell js-flickity" data-flickity-options='{ "wrapAround": true , "groupCells":1 }'>
        <?php foreach ($matches as $key => $value) {?>
            <a class="card col-12 col-sm-6 col-lg-3 ms-1" href="pages/spectator/reservation.php?id=<?= $value['id'] ?>">
                <img src="assets/upload/<?= ($value['image']== '') ?  'image-placeholder.png' : $value['image'] ?>" class="card-img-top" alt="">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <span class="fs-8 fw-bold"><?= strtoupper(date_format(date_create($value['date']), 'd M'));
                     ?></span>
                    <div class="d-flex flex-column row-gap">
                        <span class="fs-8"><?= $value['team1_name']." vs ".$value['team2_name'] ?></span>
                        <span class="fs-8">To FILL</span>
                        <span class="fs-8"><i class="fas fa-location-dot" ></i> <?= $value['stadium_name'] ?></span>
                    </div>
                </div>
            </a>
        <?php } ?>
            
        </div>
    </section>
    
  <!--  groups  -->
    <section class="col-12 d-flex justify-content-center bg-danger">
        <img src="assets/img/FIFA-World-Cup-Qatar-2022-Final-groups.jpg" class="container groups-img img-fluid mx-auto d-block" alt="image">
    </section>
    
    <section class="cardsSection mx-5">
        <!-- ////////////////////////// Browse National Teams /////////////////////////////////-->
        <div class="d-flex align-items-center justify-content-between mt-4 mb-3">
            <span class="fs-6 fw-bolder">Browse National Teams</span>
            <span class="fs-8 fw-bolder view-all">View All <i class="fa-solid fa-angle-right"></i></span>
        </div>
        <?php 
            include_once 'models/TeamsModal.php';
            $b = new Teams();
            $b->select("teams","*");
            $result = $b->sql;
        ?>
        <!-- <div class="row"> -->
        <div class="carousel-cell js-flickity" data-flickity-options='{ "wrapAround": true , "groupCells":1 }'>
        
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="card col-12 col-sm-6 col-lg-3 ms-1">
                    <img src="assets/img/<?php echo $row['team_image'] ?>" class="card-img-top" alt="Team" height="225">
                    <div class="card-body d-flex flex-column align-items-start row-gap">
                        <span class="fs-8"><?php echo $row['name']; ?> National Team</span>
                        <span class="fs-8">Group <?php echo $row['team_group']; ?></span>
                        <span class="fs-8"><i class="fas fa-location-dot" ></i> <?php echo $row['name']; ?></span>
                    </div>
                </div>
            <?php } ?>
            
            
        </div>
    
    
    </section>
    <section class="cardsSection mx-5 mb-5">
        <!-- ////////////////////////// Browse available stadiums /////////////////////////////////-->
        <div class="d-flex align-items-center justify-content-between mt-4 mb-3">
            <span class="fs-6 fw-bolder">Browse Available Stadiums</span>
            <span class="fs-8 fw-bolder view-all">View All <i class="fa-solid fa-angle-right"></i></span>
        </div>
        <?php 
            $stadiums = new controllerStade();
            $data = $stadiums->getStads();
        ?>
        <div class="carousel-cell js-flickity" data-flickity-options='{ "wrapAround": true , "groupCells":1 }'>
        <?php foreach($data as $stads) { ?>
            <div class="card col-12 col-sm-6 col-lg-3 ms-1">
                <img src="assets/upload/<?= $stads['image'] ?>" class="card-img-top" alt="">
                <div class="card-body d-flex flex-column align-items-start row-gap">
                    <span class="fs-8"><?php echo $stads['name']; ?></span>
                    <span class="fs-8">Capacity: <?php echo $stads['capacity']; ?></span>
                    <span class="fs-8"><i class="fas fa-location-dot" ></i> <?php echo $stads['location']; ?></span>
                </div>
            </div>
        <?php } ?>

        </div>
            
            
        
    
    </section>
  <?php include ("includes/spectator/footer.php"); ?>
</body>
</html>


<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>