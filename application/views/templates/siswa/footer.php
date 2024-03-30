<!-- Modal -->
<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('auth/logout') ?>" method="post">
                <div class="modal-body">
                    Apakah anda yakin ingin logout?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Logout</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="selesai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Selesai</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('siswa/selesai') ?>" method="post">
                <div class="modal-body">
                    Apakah anda yakin dengan jawaban anda? silahkan klik selesai
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Selesai</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- General JS Scripts -->
<script src="<?= base_url('assets/') ?>modules/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>modules/popper.js"></script>
<script src="<?= base_url('assets/') ?>modules/tooltip.js"></script>
<script src="<?= base_url('assets/') ?>modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/') ?>modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?= base_url('assets/') ?>modules/moment.min.js"></script>
<script src="<?= base_url('assets/') ?>js/stisla.js"></script>
<script src="<?= base_url('assets/') ?>modules/datatables/datatables.min.js"></script>
<script src="<?= base_url('assets/') ?>modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="<?= base_url('assets/') ?>modules/jquery-ui/jquery-ui.min.js"></script>

<!-- Page Specific JS File -->
<script src="<?= base_url('assets/') ?>js/page/modules-datatables.js"></script>
<!-- JS Libraies -->
<script src="<?= base_url('assets/') ?>modules/sweetalert/sweetalert.min.js"></script>

<!-- Page Specific JS File -->
<script src="<?= base_url('assets/') ?>js/page/modules-sweetalert.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elem = document.documentElement;
        var requestFullScreen = elem.requestFullscreen || elem.mozRequestFullScreen || elem.webkitRequestFullScreen || elem.msRequestFullscreen;

        if (requestFullScreen) {
            requestFullScreen.call(elem);
        }

        document.addEventListener('fullscreenchange', function() {
            if (!document.fullscreenElement) {
                var exitFullScreen = document.exitFullscreen || document.mozCancelFullScreen || document.webkitExitFullscreen || document.msExitFullscreen;
                exitFullScreen.call(document);
            }
        });
    });
</script>
</body>

</html>