// START SALAH
        //GRAPH
if (window.location.pathname=='/Gestion-des-Tickets---FIFA-World-Cup-Qatar-2022/pages/admin/dashboard.php') {
  var xValues = ["E-Tickets Disponible", "E-Tickets Reservés", "E-Tickets Restants"];
var yValues = [7400, 5400, 2000];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    //
  }
});
}

function resetForm(){
  if (window.location.pathname.startsWith('/Gestion-des-Tickets---FIFA-World-Cup-Qatar-2022/pages/admin/teams.php')) {
    console.log("1");
    document.getElementById("modal-title").innerHTML = "Add Team";
    document.getElementById("country").value = "";
    document.getElementById("groups").value = "";
    $("#save").show();
    $("#update").hide();
  }
}



// END SALAH

// START HAJJOU
// END HAJJOU

// START YOUNESS
// END YOUNESS

// START MOUAD
if (window.location.pathname=='/Gestion-des-Tickets---FIFA-World-Cup-Qatar-2022/index.php' || window.location.pathname=='/Gestion-des-Tickets---FIFA-World-Cup-Qatar-2022/') {
$(function() {
    $('input[name="date"]').daterangepicker({
      autoUpdateInput: false,
      showDropdowns: true,
      locale: {
        cancelLabel: 'Clear'
      }
    });
  
    $('input[name="date"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD MMM YYYY') + ' - ' + picker.endDate.format('DD MMM YYYY'));
    });
  
    $('input[name="date"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
    });
  });
}

function initTaskForm() {
  document.getElementById("modal-title").innerHTML = "Add Match";
  // Clear task form from data
  document.getElementById("first-team").value = "";
  document.getElementById("second-team").value = "";
  document.getElementById("stadium").value = "";
  document.getElementById("date").value = "";
  
  // Hide all action buttons
  document.getElementById('save-button').classList.remove('d-none');
  document.getElementById("update-button").classList.add("d-none");
}

function createMatch(){
  if (window.location.pathname.startsWith('/Gestion-des-Tickets---FIFA-World-Cup-Qatar-2022/pages/admin/played-matches.php')) {

    initTaskForm();
    // Ouvrir modal form
    $(document).ready(function() {
      $('#modal').modal('show');
    });

  }
}
// END MOUAD