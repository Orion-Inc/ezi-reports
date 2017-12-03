
    
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Malihu Scrollbar-->
    <script type="text/javascript" src="../plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Animo.js-->
    <script type="text/javascript" src="../plugins/animo.js/animo.min.js"></script>
    <!-- Bootstrap Progressbar-->
    <script type="text/javascript" src="../plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- jQuery Easy Pie Chart-->
    <script type="text/javascript" src="../plugins/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <!-- MomentJS-->
    <script type="text/javascript" src="../plugins/moment/min/moment.min.js"></script>
    <!-- Bootstrap Date Range Picker-->
    <script type="text/javascript" src="../plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Date Picker-->
    <script type="text/javascript" src="../plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Toastr-->
    <script type="text/javascript" src="../plugins/toastr/toastr.min.js"></script>
    <!-- Loading Overlay-->
    <script type="text/javascript" src="../plugins/jquery-loading-overlay/src/loadingoverlay.min.js"></script>
    <script type="text/javascript" src="../plugins/jquery-loading-overlay/extras/loadingoverlay_progress/loadingoverlay_progress.min.js"></script>
    <!-- Sweet Alert-->
    <script type="text/javascript" src="../plugins/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
    <!-- DropzoneJS-->
    <script type="text/javascript" src="../plugins/dropzone/dist/min/dropzone.min.js"></script>
    <!-- DataTables-->
    <script type="text/javascript" src="../plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" src="../plugins/jszip/dist/jszip.min.js"></script>
    <script type="text/javascript" src="../plugins/pdfmake/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="../plugins/pdfmake/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-colreorder/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-select/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <!-- jQuery Steps-->
    <script type="text/javascript" src="../plugins/jquery.steps/build/jquery.steps.min.js"></script>
    
    <?php if ($_SESSION['SESS_USER_ID'] != 'eziAdmin'): ?>
        <!-- Custom JS-->
        <script type="text/javascript" src="../build/js/app/app.js"></script>
    <?php endif ?>

    <?php if ($_SESSION['SESS_USER_ID'] == 'eziAdmin'): ?>
        <!-- Custom JS-->
        <script type="text/javascript" src="../build/js/app/admin-app.js"></script>
    <?php endif ?>
    
