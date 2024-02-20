<!--   Core JS Files   -->
<script src="../vendor/light-bootstrap/assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../vendor/light-bootstrap/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../vendor/light-bootstrap/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../vendor/light-bootstrap/assets/js/plugins/bootstrap-switch.js"></script>
<!--  Chartist Plugin  -->
<script src="../vendor/light-bootstrap/assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../vendor/light-bootstrap/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../vendor/light-bootstrap/assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<script src="../vendor/light-bootstrap/assets/js/demo.js"></script>
<script>
    $(document).ready(function () {
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            console.log(rowid);
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type: 'post',
                url: '../config/kendaraan/do_detail.php',
                data: 'rowid=' + rowid,
                success: function (data) {
                    $('.fetched-data').html(data); //menampilkan data ke dalam modal
                }
            });
        });
    });
</script>
