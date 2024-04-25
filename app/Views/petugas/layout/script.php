    <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url() ?>admin/dist/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="<?= base_url() ?>admin/dist/vendors/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="<?= base_url() ?>admin/dist/vendors/chart.js/js/chart.min.js"></script>
    <script src="<?= base_url() ?>admin/dist/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="<?= base_url() ?>admin/dist/vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="<?= base_url() ?>admin/dist/js/main.js"></script>

    <!-- script datatables -->
    <script src="<?= base_url() ?>DataTables/datatables.min.js"></script>

    <!-- sweet alert -->
    <script src="<?= base_url() ?>alert/alert.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css"> -->

    <!-- script jquery -->
    <script src="<?= base_url() ?>sweetalert/alert.js"></script>
    <script>
$(function() {
    <?php if (session()->has("success")) { ?>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '<?= session("success") ?>'
    })
    <?php } ?>
});
    </script>
    </body>

    </html>