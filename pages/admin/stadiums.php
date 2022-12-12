<?php
$adminTitle = "Stadiums";
include_once '../../includes/admin/head.php';
include "../../controllers/StadiumsController.php";


$stadiums = new controllerStade();

$data = $stadiums->getStads();
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<body class="g-sidenav-show bg-gray-100">
    <?php include_once '../../includes/admin/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include_once '../../includes/admin/navbar.php';?>
        <!-- Content -->
        <div class="tableContainer m-4">
        <div class="d-flex justify-content-end m-3">
            <button onclick="resetForm()" href="#modal-stadiums" data-bs-toggle="modal" class="btn btn-primary d-flex "><i class="bi bi-plus-circle-dotted me-2"></i>Add Stadium</button>
        </div>
        
      <table class="table table-dark table-hover table-striped "  id="myTable">
        <thead>
          <tr>
            <th class="text-center" scope="col">Name</th>
            <th class="text-center" scope="col">Image</th>
            <th class="text-center" scope="col">Location</th>
            <th class="text-center" scope="col">Capacity</th>
            <th class="text-center" scope="col">Operations</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach($data as $stads){
              echo "
                <tr class='text-center'>
                  <!-- <th class='align-middle' scope='row'>1</th> -->
                  <td class='align-middle'>$stads[name]</td>
                  <td class='align-middle'><img src='../../assets/upload/$stads[image].' width='90'></td>
                  <td class='align-middle' >$stads[location]</td>
                  <td class='align-middle' >$stads[capacity]</td>
                  <td class='align-middle' >
                      <div class='d-flex flex-wrap justify-content-around'>
                          <button type='button' data-bs-toggle='modal' data-bs-target='#modal-stadiums' class='btn btn-warning d-flex' onclick='editStadiums($stads[id])'>Update</button>
                          <button onclick='confirmDelete($stads[id])' class='btn btn-danger d-flex'></i>Delete</button>
                      </div>
                  </td>
                </tr>";
            }
          ?>
              
        </tbody>
      </table>
              <!-- MODAL -->
      <div class="modal fade" id="modal-stadiums" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="../../controllers/StadiumsController.php" method="POST" id="form" enctype="multipart/form-data" data-parsley-validate>
              <div class="modal-header">
                <h5 class="modal-title" id="modal_title">Add Stadium</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <!-- HIDDEN INPUT  -->
                  <input type="hidden" name="stadium-id" id="StadiumId">
                  
                  <div class="mb-3">
                    <label class="form-label" >Name</label>
                    <input name="nameStadiums" type="text" class="form-control" id="nameStadiums" required/>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" >Location</label>
                    <input name="location" type="text" class="form-control" id="location" required/>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" >Capacity</label>
                    <input name="capacity" type="number" class="form-control" id="capacity" required/>
                  </div>

                  <div class="mb-0">
                    <label class="col-md-4 control-label mb-1" for="filebutton">Stadium Image</label>
                    <div class="col-md-4">
                    <input id="stadiumPicture" name="stadiumPicture" class="input-file" type="file">
                    </div>
                  </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class="btn btn-secondary" >Cancel</button>
                <button type="submit" name="save" class="btn btn-primary task-action-btn d-block" id="save">Save</button>
                <button type="submit" name="update" class="btn btn-warning task-action-btn d-none" id="update">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    </main>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
      <script>
        function editStadiums(id){
          updateStadium();
					$.ajax({
						type: "POST",
						url: '../../controllers/StadiumsController.php',
						data: {getStad: id},
						success: function( response ) {
            obj = JSON.parse(response);
            document.querySelector('#StadiumId').value = obj.id;
            document.querySelector('#nameStadiums').value = obj.name;
            document.querySelector('#location').value = obj.location;
            document.querySelector('#capacity').value = obj.capacity;
							
						},					
					});
          
        }
      </script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        function confirmDelete(id){
          
          Swal.fire({
                title: 'Are you sure you want to delete this?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#c52495',
                cancelButtonColor: '#c3c3c3',
                confirmButtonText: 'Delete'
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href="../../controllers/StadiumsController.php?deleteStad="+id;
                  Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                }
              })
        }

        function resetForm(){
              document.getElementById('modal_title').innerText = "Add Stadiums";
              document.getElementById('nameStadiums').value = "";
              document.getElementById('stadiumPicture').value = "";
              document.getElementById('capacity').value = "";
              document.getElementById('location').value = "";

              
              document.getElementById('update').classList.add("d-none");
              document.getElementById('update').classList.remove("d-block");
              document.getElementById('save').classList.add("d-block");
              document.getElementById('save').classList.remove("d-none");
        }
        function updateStadium(){
        
          document.getElementById('modal_title').innerText = "Update Stadiums";
          document.getElementById('save').classList.add("d-none");
          document.getElementById('save').classList.remove("d-block");
          document.getElementById('update').classList.add("d-block");
          document.getElementById('update').classList.remove("d-none");

        }
      </script>
</body>
</html>
<?php include_once '../../includes/admin/corejs.php'; ?>



