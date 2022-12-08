<?php
$pagetitle='teams';
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
        <div class="d-flex justify-content-end m-3">
            <button href="#modal-teams" data-bs-toggle="modal" class="btn btn-primary d-flex "><i class="bi bi-plus-circle-dotted me-2"></i>Add Team</button>
        </div>
        
      <table class="table table-dark table-hover table-striped "  id="myTable">
        <thead>
          <tr>
            <th class="text-center" scope="col">Flag</th>
            <th class="text-center" scope="col">Team</th>
            <th class="text-center" scope="col">Country</th>
            <th class="text-center" scope="col">Groups</th>
            <th class="text-center" scope="col">Operations</th>
          </tr>
        </thead>
        <tbody>

        <?php 
            include '../../models/TeamsModal.php';
            $b = new Teams();
            $b->select("teams","*");
            $result = $b->sql;
        ?>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
          <tr class="text-center">
            <td class="align-middle"><img class="" src="../../assets/img/<?php echo $row['flag'] ?>" alt="image" width="50px"></td>
            <td class="align-middle"><img class="" src="../../assets/img/<?php echo $row['team_image'] ?>" alt="image" width="50px"></td>
            <td class="align-middle"><?php echo $row['name']; ?></td>
            <td class="align-middle" ><?php echo $row['team_group']; ?></td>
            <td class="align-middle" >
                <div class="d-flex flex-wrap justify-content-around">
                    <a href="teams.php?updateId=<?php echo $row['id']; ?>" type="button" class="btn btn-warning d-flex" ></i>Update</a>
                    <a href="../../controllers/TeamsController.php?deleteId=<?php echo $row['id']; ?>" type="button" class="btn btn-danger d-flex" ></i>Delete</a>
                </div>
            </td>
          </tr>
          <?php } ?>

        </tbody>
      </table>
              <!-- MODAL -->
      <div class="modal fade" id="modal-teams" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="../../controllers/TeamsController.php" method="POST" id="form" enctype="multipart/form-data" data-parsley-validate>
              <div class="modal-header">
                <h5 class="modal-title">Add Team</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <!-- HIDDEN INPUT  -->
 
                  <div class="mb-3">
                    <label class="form-label" >Country</label>
                    <input name="country" type="text" class="form-control" id="country" required/>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Groups</label>
                    <select class="form-select" id="groups" name="groups" required>
                      <option disabled hidden selected>Please select</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                      <option value="E">E</option>
                      <option value="F">F</option>
                      <option value="G">G</option>
                      <option value="H">H</option>
                    </select>
                  </div>
                  
                  <div class="mb-0">
                    <label class="col-md-4 control-label mb-1" for="filebutton">Flag Image</label>
                    <div class="col-md-4">
                    <input id="flagImage" name="flagImage" class="input-file" type="file">
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="col-md-4 control-label mb-1" for="filebutton">Team Image</label>
                    <div class="col-md-4">
                    <input id="teamImage" name="teamImage" class="input-file" type="file">
                    </div>
                  </div>
                
              </div>
              <div class="modal-footer">
                <button data-bs-dismiss="modal" class="btn btn-secondary" >Cancel</button>
                <button type="submit" name="save" class="btn btn-primary task-action-btn" id="save">Save</button>
                <button type="submit" name="update" class="btn btn-warning task-action-btn" id="update">Update</button>
              </div>
            </form>
          </div>
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
        $("#save").hide();
        $("#update").show();
        $("#modal-teams").modal("show");
      };
  <?php }
    ?>
  </script>


