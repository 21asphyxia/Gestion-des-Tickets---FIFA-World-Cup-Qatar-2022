<?php
$adminTitle='Tickets';
include '../../models/TicketsModel.php';
include '../../models/usersModel.php';
if(!isset($_SESSION["id"]) || $_SESSION["role"] != "admin"){
    header('location:../../index.php');
  }
include_once '../../includes/admin/head.php';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<body class="g-sidenav-show bg-gray-100">
    <?php include_once '../../includes/admin/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include_once '../../includes/admin/navbar.php';?>
        <!-- Content -->
            <!-- TABLEAU -->
            <!-- Title -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <?php if(isset($_GET['id'])){?>
                        <h1 class="text-center">Tickets of <?php
                         $user = new Users();
                         $user->select("users","name","id=".$_GET['id']);
                         echo $user->sql->fetch(PDO::FETCH_ASSOC)['name'];
                        ?></h1>
                        <?php }else{?>
                        <h1 class="text-center">Tickets</h1>
                        <?php }?>
                    </div>
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
                $readTickets = $tickets->getTicketByUserId($_GET['id']);
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

<?php include_once '../../includes/admin/corejs.php'; ?>


