<?php
$adminTitle='Matches';
include __DIR__.'/../../controllers/MatchesController.php';
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
        <?php if (isset($_SESSION['message'])){
				echo "<div ";

				 if ($_SESSION['msg_type'] == "success") 
				{echo "class='alert alert-success alert-dismissible fade show mb-4' >
					<strong class='text-black'>Success! </strong>";}
				else { echo "class='alert alert-danger alert-dismissible fade show mb-4' >
					<strong class='text-black'>Failure! </strong>";}
					
						echo $_SESSION['message']; 
						unset($_SESSION['message']);
					
					echo '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></span>
				</div>';
				} ?>
            <!-- TABLEAU -->
        <div class="tableContainer m-4">
        <div class="d-flex justify-content-end m-3">
            <button class="btn btn-primary d-flex "id="addButton" onclick="createMatch()"><i class="bi bi-plus-circle-dotted me-2" ></i>Add Match</button>
        </div>
        
      <table class="table table-dark table-hover table-striped "  id="myTable">
        <thead>
          <tr>
            <th class="text-center" scope="col">Date</th>
            <th class="text-center" scope="col">Image</th>
            <th class="text-center" scope="col">First Team</th>
            <th class="text-center" scope="col">Second Team</th>
            <th class="text-center" scope="col">Stadium</th>
            <th class="text-center" scope="col">Capacity</th>
            <th class="text-center" scope="col">Tickets left</th>
            <th class="text-center" scope="col">Price</th>
            <th class="text-center" scope="col">Operations</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($matches as $key => $value) {
            ?>
          <tr class="text-center">
            <td class="align-middle"><?= date_format(date_create($value['date']), 'd M Y - H:i')?></td>
            <td class="align-middle"><img class="" src="../../assets/upload/<?php if($value['image']== ''){echo 'image-placeholder.png';}else echo $value['image']; ?>" alt="Flag" width="60px"></td>
            <td class="align-middle"><?= $value['team1_name'] ?></td>
            <td class="align-middle"><?= $value['team2_name']; ?></td>
            <td class="align-middle" ><?= $value['stadium_name']; ?></td>
            <td class="align-middle" ><?= $value['capacity']; ?></td>
            <td class="align-middle" >--</td>
            <td class="align-middle" ><?= $value['price']." $" ?></td>
            <td class="align-middle" >
                <div class="d-flex flex-wrap justify-content-around">
                    <a href="played-matches.php?updateId=<?= $value['id']; ?>" type="button" class="btn btn-warning d-flex text-dark" ></i>Update</a>
                    <a href="played-matches.php?deleteMatch=<?= $value['id']; ?>" type="button" class="btn btn-danger d-flex" ></i>Delete</a>
                </div>
            </td>
          </tr>
          <?php } ?>

        </tbody>
      </table>

              <!-- MODAL -->
      <div class="modal fade" id="modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" id="form" data-parsley-validate enctype="multipart/form-data">
              <div class="modal-header">
                <h5 class="modal-title" id="modal-title"><?php if(isset($_GET['updateId'])){echo 'Update';}?> Match</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- HIDDEN INPUT  -->
                <input type="hidden" value="<?php echo (isset($row)) ? $row['id'] : ''; ?>" name="match-id">

                <div class="mb-3">
                  <label for="first-team" class="form-label">First team</label>
                  <select class="form-select" id="first-team" name="team_1" required>
                    <option disabled hidden <?php if(!isset($row['team1_name'])){echo "selected";}?> value="">Please select</option>
                    <?php foreach ($readTeams as $key => $value) {
                    ?>
                    <option <?php if(isset($row['team1_name'])){
							        if($row['team1_name'] == $value['name']) echo "selected";}?> value="<?= $value['name']; ?>"><?= $value['name']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="second-team" class="form-label">Second team</label>
                  <select class="form-select" id="second-team" name="team_2" required>
                    <option disabled hidden <?php if(!isset($row['team2_name'])){echo "selected";}?> value="">Please select</option>
                    <?php foreach ($readTeams as $key => $value) {
                    ?>
                    <option <?php if(isset($row['team2_name'])){
							        if($row['team2_name'] == $value['name']) echo "selected";}?> value="<?= $value['name']; ?>"><?= $value['name']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="stadium" class="form-label">Stadium</label>
                  <select class="form-select" id="stadium" name="stadium" required>
                    <option disabled hidden <?php if(!isset($row['stadium_name'])){echo "selected";}?> value="">Please select</option>
                    <?php foreach ($readStadiums as $key => $value) {
                    ?>
                    <option <?php if(isset($row['stadium_name'])){
							        if($row['stadium_name'] == $value['name']) echo "selected";}?> value="<?= $value['name']; ?>"><?= $value['name']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="date" class="form-label">Date</label>
                  <input type="datetime-local" class="form-select" id="date" name="date" value="<?php echo (isset($row)) ? $row['date'] : ''; ?>" required>
                </div>
                
                <div class="mb-3">
                  <label for="price" class="form-label">Price</label>
                  <input type="number" class="form-select" id="price" name="price" value="<?php echo (isset($row)) ? $row['price'] : ''; ?>" required>
                </div>
                
                <div class="mb-3">
                  <input type="file" name="image" class="form-control" id="image">
                </div>
                
                <div class="mb-3">
						      <textarea class="form-control" name="description" id="description" placeholder="Description" ><?php
						      if(isset($row['description'])){
							      echo $row['description'];
						      }?></textarea>
						      <?php if(isset($_SESSION['descriptionErr'])){
							        echo '<div class="alert alert-danger mt-2 text-light" role="alert">'.$_SESSION['descriptionErr'].'</div>';
							        unset($_SESSION['descriptionErr']);
						        }?>
					      </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class="btn btn-secondary" >Cancel</button>
                <button type="submit" name="save" class="btn btn-primary task-action-btn" id="save-button">Save</button>
                <button type="submit" name="update" class="btn btn-warning task-action-btn text-dark" id="update-button">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </main>
    
</body>

</html>

<?php include_once '../../includes/admin/corejs.php';

if (isset($_GET['updateId'])) { 
  echo "<script type = text/javascript>
          document.getElementById('update-button').classList.remove('d-none');
          document.getElementById('save-button').classList.add('d-none');
          $(document).ready(function() {
            $('#modal').modal('show');
          }); 
        </script>";

        
} 
if(isset($_SESSION['error'])){
  echo $_SESSION['error'];
  unset($_SESSION['error']);
}
?>

