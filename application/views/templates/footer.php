 </section><!-- /MAIN CONTENT -->

        <!--main content end-->
        <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
               Copyright © Odes <?= date('Y') ?>
                <a href="#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?= base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/fancybox/jquery.fancybox.js"></script>  
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
     <link href="<?= base_url(); ?>assets/font-awesome/new/js/all.js" rel="stylesheet" />

<!-- datatables -->

<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>Bootstrap-4-4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>JSZip-2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>AutoFill-2.3.3/js/dataTables.autoFill.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>AutoFill-2.3.3/js/autoFill.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>Buttons-1.5.6/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>Buttons-1.5.6/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>Buttons-1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>Buttons-1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>Buttons-1.5.6/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>FixedColumns-3.2.5/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>FixedHeader-3.1.4/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>Responsive-2.2.2/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>Responsive-2.2.2/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>RowGroup-1.1.0/js/dataTables.rowGroup.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>RowReorder-1.2.4/js/dataTables.rowReorder.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>Scroller-2.0.0/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/'); ?>Select-1.3.0/js/dataTables.select.min.js"></script>
<!-- end datatables -->

    <!--common script for all pages-->
    <script src="<?= base_url(); ?>assets/js/common-scripts.js"></script>


  <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

  </script>

<script type="text/javascript">

  $(window).on('load',function(){
    $('.spinner-wrapper').fadeOut('slow');
  });


  $(document).ready(()=>{

    $('#datatables').DataTable({
      "bPaginate": true,
      "bLengthChange": false,
      "bFilter": true,
      "bInfo": false,
      "bAutoWidth": false,
      "responsive":true
    });

    $('.datatables').DataTable({
      "dom":' <"search"f><"top"l>rt<"bottom"ip><"clear">',
      "bPaginate": true,
      "bLengthChange": false,
      "bFilter": true,
      "bInfo": false,
      "bAutoWidth": false,
      "responsive":true
    });
    
  });
</script>


    <!--script for this page-->

    <!-- <script>
        //custom select box

        $(function() {
            $('select.styled').customSelect();
        });
    </script> -->

</body>

</html>