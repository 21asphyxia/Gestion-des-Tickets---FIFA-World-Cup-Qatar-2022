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
// END MOUAD