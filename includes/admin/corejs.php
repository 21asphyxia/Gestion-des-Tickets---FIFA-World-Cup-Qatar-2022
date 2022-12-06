    <!--   Core JS Files   -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/template/core/popper.min.js"></script>
    <script src="../../assets/js/template/core/bootstrap.min.js"></script>
    <script src="../../assets/js/template/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/template/plugins/smooth-scrollbar.min.js"></script>
    <script src="../../assets/js/template/plugins/chartjs.min.js"></script>
    <script src="../../assets/js/scripts.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/template/soft-ui-dashboard.min.js?v=1.0.6"></script>