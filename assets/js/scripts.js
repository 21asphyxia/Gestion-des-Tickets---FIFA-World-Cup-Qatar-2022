// START SALAH
// END SALAH

// START HAJJOU
// END HAJJOU

// START YOUNESS
// END YOUNESS

// START MOUAD
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
// END MOUAD