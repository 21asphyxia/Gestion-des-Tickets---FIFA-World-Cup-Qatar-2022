<?php
$adminTitle='Users';
include '../../models/UsersModel.php';
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
        <div class="tableContainer m-4">
    
        
      <table class="table table-dark table-hover table-striped "  id="myTable">
        <thead>
          <tr>
            <th class="text-center" scope="col">Name</th>
            <th class="text-center" scope="col">Email</th>
            <th class="text-center" scope="col">Role</th>
            <th class="text-center" scope="col">Operations</th>
          </tr>
        </thead>
        <tbody>
        <?php 
            
           
            $b = new Users();
            $b->select("users","*");
            $result = $b->sql;
        ?>

    
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
          <tr class="text-center">
            <td class="align-middle"><?php echo $row['name']; ?></td>
            <td class="align-middle" ><?php echo $row['email']; ?></td>
            <td class="align-middle" ><?php echo $row['role']; ?></td>
            <td class="align-middle" >
                <div class="d-flex flex-wrap justify-content-around">
                    <a href="users.php?updateId=<?php echo $row['id']; ?>" type="button" class="btn btn-warning d-flex" ></i>Update Role</a>
                    <a href="tickets.php?id=<?php echo $row['id']; ?>" type="button" class="btn btn-success d-flex" ></i>View Tickets</a>
                </div>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

      <?php 
          if(isset($_GET['updateId'])){
            $b->select("users","*","id='".$_GET['updateId']."'");
            $result = $b->sql;
            $modalRow = $result->fetch(PDO::FETCH_ASSOC);
          }
        ?>
     
              <!-- MODAL -->
      <div class="modal fade" id="modal-users" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="../../controllers/usersController.php" method="POST" id="form" data-parsley-validate>
              <div class="modal-header">
                <h5 class="modal-title" id="modal-title">User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <!-- HIDDEN INPUT  -->
                  <input type="hidden" value="<?php if(isset($modalRow)) echo $modalRow['id'] ?>" name="users-id">
                  <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select class="form-select" id="role" name="role" required>
                      <option disabled hidden selected>Please select</option>
                      <option <?php if(isset($modalRow)){ echo ($modalRow['role']=='admin')  ?  'selected' : '';}?> value="admin">admin</option>
                      <option <?php if(isset($modalRow)){ echo ($modalRow['role']=='spectator')  ?  'selected' : '';}?> value="spectator">spectator</option>
                    </select>
                  </div> 
              </div>
              <div class="modal-footer" id="modal-footer" style="display:block">
                <button type="button" data-bs-dismiss="modal" class="btn btn-secondary" >Cancel</button>
                <button type="submit" name="update" class="btn btn-warning task-action-btn" id="update">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
    
</body>

</html>

<?php include_once '../../includes/admin/corejs.php'; ?>
<script>
    <?php if (isset($_GET['updateId'])) { ?>
      window.onload = function() {
        $("#modal-users").modal("show");

      };
  <?php }
    ?>
  </script>


