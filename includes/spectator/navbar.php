<!-- navBar -->
<nav class="navbar navbar-expand-md">
  <div class="container-fluid">
    <a id="Youtickets" class="navbar-brand fw-bold" href="<?php /*if ($title != "Home")*/ echo "../../"; ?>index.php">YouTickets.com</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0 d-flex justify-content-center align-items-center">
        <li class="nav-item ">
          <a class="nav-link active fw-bold" aria-current="page" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active fw-bold" aria-current="page" href="#">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active fw-bold" aria-current="page" href="#">Teams</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active fw-bold" aria-current="page" href="#">Contact</a>
        </li>
      </ul>
      <form class="d-flex justify-content-center" role="authentification">
        <button id="btnLogin" class="btn btn-outline m-2 text-nowrap" type="button" data-bs-toggle="modal" data-bs-target="#login">log In</button>
        <button id="btnSignup" class="btn btn-outline m-2 text-nowrap" type="button" data-bs-toggle="modal" data-bs-target="#signup">Sign Up</button>
      </form>
    </div>
  </div>

  <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">LOGIN</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card ">
            <div class="card-body">
              <form action="./controllers/LoginController.php" method="post">
                <div class="mb-3">
                  <label for="email1" class="form-label">Email</label>
                  <input type="email" name="emailLogin" class="form-control" id="email1"/>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="passwordLogin" class="form-control" id="exampleInputPassword1"/>
                </div>
                  <div class="modal-footer d-flex flex-column align-items-center">
                      <button type="submit" name="login" class="btn btn-prim">LOGIN</button>
                  </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- SIGNUP Modal -->
  <div class="modal fade" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">SIGN UP</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card ">
            <div class="card-body">
              <form action="./controllers/SignUpController.php" method="POST">
                <div class="mb-3">
                  <label for="fullName" class="form-label">Full Name</label>
                  <input type="text" name="fullname" class="form-control" id="fullname"/>
                </div>
                <div class="mb-3">
                  <label for="email2" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="email"/>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="password"/>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="confirm-password" class="form-control" id="password"/>
                </div>
                  <!--check your TAGS  A HAJJOU-->
                  <div class="modal-footer d-flex flex-column align-items-center ">
                     <!-- <input type="submit" name="submit" class="btn btn-prim"/>-->
                      <div class="modal-footer d-flex flex-column align-items-center ">
                          <button name="signup" type="submit" class="btn btn-prim">SIGNUP</button> <!-- button HAJJOU -->
                      </div>
             </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</nav>
<!-- /navBar -->