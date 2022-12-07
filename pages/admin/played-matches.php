<?php
include_once '../../includes/admin/head.php';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<body class="g-sidenav-show bg-gray-100">
    <?php include_once '../../includes/admin/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include_once '../../includes/admin/navbar.php';?>
        <!-- Content -->
        <div class="tableContainer m-4">
        <div class="d-flex justify-content-end m-3">
            <button href="#modal-product" data-bs-toggle="modal" class="btn btn-primary d-flex "><i class="bi bi-plus-circle-dotted me-2"></i>Add Product</button>
        </div>
        
      <table class="table table-dark table-hover table-striped "  id="myTable">
        <thead>
          <tr>
            <th class="text-center" scope="col">Image</th>
            <th class="text-center" scope="col">Team 1</th>
            <th class="text-center" scope="col">Team 2</th>
            <th class="text-center" scope="col">Stadium</th>
            <th class="text-center" scope="col">Date</th>
            <th class="text-center" scope="col">Operations</th>
          </tr>
        </thead>
        <tbody>

          <tr class="text-center">
            <td class="align-middle"><img class="flagImage" src="../../assets/img/Flag-Senegal.webp" alt="image" width="50px"></td>
            <td class="align-middle">1</td>
            <td class="align-middle">Senegal</td>
            <td class="align-middle">Aliou Cissé</td>
            <td class="align-middle">A</td>
            <td class="align-middle">
                <div class="d-flex flex-wrap justify-content-around">
                    <a href="#" class="btn btn-warning d-flex"></i>Update</a>
                    <a href="#" class="btn btn-danger d-flex"></i>Delete</a>
                </div>
            </td>
          </tr>

     

        </tbody>
      </table>
              <!-- MODAL -->
      <div class="modal fade" id="modal-product" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="" method="POST" id="form" enctype="multipart/form-data" data-parsley-validate>
              <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <!-- HIDDEN INPUT  -->
                  <input type="hidden" name="product-id">
                  
                  <div class="mb-3">
                    <label class="form-label" >Country</label>
                    <input name="country" type="text" class="form-control" id="country" required/>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" >Coach</label>
                    <input name="coach" type="text" class="form-control" id="coach" required/>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Groups</label>
                    <select class="form-select" id="groups" name="groups" required>
                      <option selcterd disabled hidden>Please select</option>
                      <option value="1">A</option>
                      <option value="2">B</option>
                      <option value="3">C</option>
                      <option value="4">D</option>
                      <option value="5">E</option>
                      <option value="6">F</option>
                      <option value="7">G</option>
                      <option value="8">H</option>
                    </select>
                  </div>

                  <div class="mb-0">
                    <label class="col-md-4 control-label mb-1" for="filebutton">Product Image</label>
                    <div class="col-md-4">
                    <input id="picture" name="picture" class="input-file" type="file">
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


