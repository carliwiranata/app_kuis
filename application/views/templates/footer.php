   <footer class="main-footer">
       <div class="footer-left">
           Copyright &copy; <?= date('Y') ?> <div class="bullet"></div> <?= $title ?></a>
       </div>
       <div class="footer-right">

       </div>
   </footer>
   <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">Peringatan</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <form action="<?= base_url('auth/logout') ?>" method="post">
                   <div class="modal-body">
                       <p>Apakah anda yakin ingin logout?</p>
                   </div>
                   <div class="modal-footer bg-whitesmoke br">
                       <button type="submit" class="btn btn-primary">Logout</button>
                   </div>
               </form>
           </div>
       </div>
   </div>

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

   <!-- JS Libraies -->
   <script src="<?= base_url('assets/') ?>modules/sweetalert/sweetalert.min.js"></script>
   <script src="<?= base_url('assets/') ?>modules/datatables/datatables.min.js"></script>
   <script src="<?= base_url('assets/') ?>modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
   <script src="<?= base_url('assets/') ?>modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
   <script src="<?= base_url('assets/') ?>modules/jquery-ui/jquery-ui.min.js"></script>
   <script src="<?= base_url('assets/') ?>modules/summernote/summernote-bs4.js"></script>
   <script src="<?= base_url('assets/') ?>modules/codemirror/lib/codemirror.js"></script>
   <script src="<?= base_url('assets/') ?>modules/codemirror/mode/javascript/javascript.js"></script>
   <script src="<?= base_url('assets/') ?>modules/jquery-selectric/jquery.selectric.min.js"></script>
   <script src="<?= base_url('assets/') ?>modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

   <!-- Page Specific JS File -->
   <script src="<?= base_url('assets/') ?>js/page/modules-sweetalert.js"></script>
   <script src="<?= base_url('assets/') ?>js/page/modules-datatables.js"></script>

   <!-- Template JS File -->
   <script src="<?= base_url('assets/') ?>js/scripts.js"></script>
   <script src="<?= base_url('assets/') ?>js/custom.js"></script>
   </body>

   </html>