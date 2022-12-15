<?php
$adminTitle = "Dashboard";
require_once('../../classes/SignUp.class.php');
if(!isset($_SESSION["id"]) || $_SESSION["role"] != "admin"){
    header('location:../../index.php');
}
include_once '../../includes/admin/head.php';

?>
<body class="g-sidenav-show bg-gray-100">
    <?php include_once '../../includes/admin/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include_once '../../includes/admin/navbar.php';?>
        <!-- Content -->
        <!-- STATISTIC CARDS -->
        <div class="row m-5 flex-wrap justify-content-center">
            <div class="col-xl-3 col-sm-6  mb-4">
            <div class="card">
                <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Matchs Joués</p>
                        <h5 class="font-weight-bolder mb-0">
                        <?php
                            $dsn = new SignUp();
                            $number = $dsn->NumberRow("SELECT * FROM matches", array());
                            echo $number;
                            ?>
                        </h5>
                    </div>
                    </div>
                    <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fa-regular fa-futbol"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-xl-3 col-sm-6  mb-4">
            <div class="card">
                <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Stades Disponible</p>
                        <h5 class="font-weight-bolder mb-0">
                            <?php
                            $dsn = new SignUp();
                            $number = $dsn->NumberRow("SELECT * FROM stadiums", array());
                            echo $number;
                            ?>
                        </h5>
                    </div>
                    </div>
                    <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-xl-3 col-sm-6  mb-4">
            <div class="card">
                <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Spectateurs</p>
                        <h5 class="font-weight-bolder mb-0">
                        <?php
                        $dsn = new SignUp();
                        $number = $dsn->NumberRow("SELECT * FROM users where role=?", array("spectator"));
                        echo $number;
                        ?>
                        </h5>
                    </div>
                    </div>
                    <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-xl-3 col-sm-6  mb-4">
            <div class="card">
                <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">E-Tickets Disponible</p>
                        <h5 class="font-weight-bolder mb-0">
                        7,400
                        </h5>
                    </div>
                    </div>
                    <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="fa-solid fa-ticket"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-xl-3 col-sm-6  mb-4">
            <div class="card">
                <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">E-Tickets Reservés</p>
                        <h5 class="font-weight-bolder mb-0">
                        5,400
                        </h5>
                    </div>
                    </div>
                    <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="fa-solid fa-ticket"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">E-Tickets Restants</p>
                        <h5 class="font-weight-bolder mb-0">
                        2,000
                        </h5>
                    </div>
                    </div>
                    <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="fa-solid fa-ticket"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <canvas id="myChart" style="width:100%;max-width:600px;max-height:200px;"></canvas>
        </div>
    </main>
</body>
</html>
<?php include_once '../../includes/admin/corejs.php'; ?>
    

