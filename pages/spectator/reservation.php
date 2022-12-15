
<?php
$title = "Reservation";
include '../../controllers/ReservationController.php';
if(isset($_SESSION["id"])){
  if($_SESSION["role"] != "spectator"){
  header('location:../../pages/admin/dashboard.php');}}
else{
  header('location:../../index.php');
}
include_once '../../includes/spectator/head.php';
?>

<body>
  <header>
  <?php
include_once '../../includes/spectator/navbar.php';
?>
  </header>
  <div class="container">
    <div class="row">
      <div class="col ">
        <button type="button" class="btn border border-4 sec-border my-3"><i class="fa-solid fa-link sec-color fw-bold fs-5"></i></button>
        <button type="button" class="btn border border-4 sec-border my-3"><i class="fa-brands fa-instagram sec-color fw-bold fs-4 "></i></button>
        <button type="button" class="btn border border-4 sec-border my-3"><i class="fa-brands fa-twitter sec-color fw-bold fs-4 "></i></button>
        <button type="button" class="btn border border-4 sec-border my-3"><i class="fa-brands fa-facebook sec-color fw-bold fs-4 "></i></button>
      </div>
      <div class="col-12 col-sm-10">
            <div class="w-100 d-flex justify-content-center bg-purple">
              <img src="../../assets/upload/<?= $match['image'] ?>" class="img-fluid w-75 " alt="<?= $match["team1_name"]." vs ".$match["team2_name"]?>">
            </div>  
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="p-4 fw-bold">
                  <h3><strong><?= $match["team1_name"]." vs ".$match["team2_name"]?></strong></h3>
                </div>
                <p><i class="fa-regular fa-location-dot text-dark fw-bold fs-5 mx-4"></i> <small><?= $match['stadium_name'] ?></small></p>
                <p><i class="fa-solid fa-calendar text-dark fw-bold fs-5 mx-4"></i><small><?= date_format(date_create($match['date']), 'F d, Y · H:i') ?></small></p>
              </div>
  
        <div class="col col-sm-6 d-flex justify-content-sm-end align-items-start justify-content-center mt-sm-2">
            <div class="card d-flex shadow mt-sm-2 mt-lg-4" style="width: 18rem;">
                <form class="card-body bg-light rounded text-center" method=POST>
                    <h5 class="card-title text-secondary">Tickets starting at</h5>
                    <h1 class="display-6"><?= $match['price'] ." $" ?></h1>
                    <button type="submit" name="reserve" class="btn-prim border-0 p-2">Reserve your  E-Tickets</button>
    </form>
  </div>
  </div>
        </div>
  
        <div class="p-3 fw-bold">
        <h4><strong>Match Information</strong></h4>
        </div>
        <div class="p-3 fw-bold">
        <h4><strong>Description</strong></h4>
        </div>
        <div class="container">
        <p><?= $match['description'] ?></p>
        </div>
    <select class="form-select form-select-lg mx-auto fs-5 mb-5">
    <option selected>Terms & Condition</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
      </div>
      <div class="col">
      </div>
    </div>
  </div>
  <?php
include_once '../../includes/spectator/footer.php';
?>
</body>
</html>

<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/scripts.js"></script>