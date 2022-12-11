<?php
$adminTitle = 'Profile';
include_once '../../includes/admin/head.php';
?>
<body class="g-sidenav-show bg-gray-100">
    <?php include_once '../../includes/admin/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include_once '../../includes/admin/navbar.php';?>
        <!-- Content -->
        <div class="container" id="profile">
            <div class="main-body">
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                          <h4>Salah</h4>
                          <p class="badge text-bg-primary mb-1">Admin</p>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row justify-content-center ">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Full Name</h6>
                        </div>
                        <input class="col-sm-9 text-secondary w-50" type="text"></input>
                      </div>
                      <hr>
                      <div class="row justify-content-center ">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <input class="col-sm-9 text-secondary w-50" type="email"></input>
                      </div>
                      <hr>
                      <div class="row justify-content-center ">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Password</h6>
                        </div>
                        <input class="col-sm-9 text-secondary w-50" type="password"></input>
                      </div>
                      <hr>
                      <div class="row justify-content-center ">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Confirm Password</h6>
                        </div>
                        <input class="col-sm-9 text-secondary w-50" type="password" ></input>
                      </div>
                      <hr>
                      <div class="row ">
                        <div class="col-sm-12 d-flex justify-content-evenly">
                          <a class="btn btn-info text-white" target="__blank" href="#">Update</a>
                          <a class="btn btn-danger" href="#">Delete Account</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    
            </div>
        </div>
    </main>
</body>
</html>
<?php include_once '../../includes/admin/corejs.php'; ?>