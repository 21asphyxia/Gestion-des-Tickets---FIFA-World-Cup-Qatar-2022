<?php
$title='My Tickets';
include '../../models/TicketsModel.php';
include_once '../../includes/spectator/head.php';
echo '  <!-- DATA TABLE CSS -->
<link href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../../assets/css/data-table.css">';
if(isset($_SESSION["id"])){
    if($_SESSION["role"] != "spectator"){
    header('location:../../pages/admin/dashboard.php');}}
  else{
    header('location:../../index.php');
}
?>
<body class="g-sidenav-show bg-gray-100">
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include_once '../../includes/spectator/navbar.php';?>
        <!-- Content -->
            <!-- TABLEAU -->
            <!-- Title -->
            <div class="container-fluid py-4">
                <div class="row">
                    <h1 class="col-12 text-center">Tickets of <?=$val["name"]?></h1>
                </div>
        <div class="tableContainer m-4">
            <table class="table table-dark table-hover table-striped "  id="myTable">
                <thead>
                <tr>
                    <th class="text-center" scope="col">Id</th>
                    <th class="text-center" scope="col">Serial Number</th>
                    <th class="text-center" scope="col">Time of reservation</th>
                    <th class="text-center" scope="col">Match</th>
                    <th class="text-center" scope="col">Stadium</th>
                    <th class="text-center" scope="col">Date of Match</th>
                </tr>
                </thead>
                <tbody>

                <?php $tickets = new Tickets();
                $readTickets = $tickets->getTicketByUserId($_SESSION["id"]);
                foreach ($readTickets as $key => $value) {?>
                <tr class="text-center">
                    <td class="align-middle"><?= $value['id'] ?></td>
                    <td class="align-middle"><?= $value['serial_number'] ?></td>
                    <td class="align-middle"><?=$value['time']?></td>
                    <td class="align-middle"><?= $value['match']['team1_name']." vs ".$value['match']['team2_name'] ?></td>
                    <td class="align-middle"><?= $value['match']['stadium_name']?></td>
                    <td class="align-middle"><?= date_format(date_create($value['match']['date']), 'd M Y - H:i')?></td>
                </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </main>
</body>
</html>

<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/scripts.js"></script>
<script src="../../assets/js/data-table.js"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>


