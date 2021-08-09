<!-- Main Footer -->
<footer class="main-footer">
	<strong>Copyright &copy; 2020-2021 <a href="http://adminlte.io">Kurniamayasusanti @ inc </a>.</strong>
	All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
		<b>Version</b> 1.0
	</div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url()?>assets/back-end/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url()?>assets/back-end/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url()?>assets/back-end/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>assets/back-end/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url()?>assets/back-end/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url()?>assets/back-end/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url()?>assets/back-end/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url()?>assets/back-end/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url()?>assets/back-end/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url()?>assets/back-end/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?= base_url()?>assets/back-end/dist/js/pages/dashboard2.js"></script>
<script type="text/javascript" charset="utf8" src="<?= base_url()?>assets/data/DataTables/datatables.js"></script>

<script src="<?= base_url()?>assets/data/datepicker/js/bootstrap-datepicker.js"></script>

<!-- Ekko Lightbox -->
<script src="<?= base_url()?>assets/back-end/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

<script> 
	$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

<style>
	.datepicker{z-index:1151;}
</style>
<script type="text/javascript">
	$(function(){
		$("#tanggal").datepicker({
			format:'yyyy/dd/mm'
		});
	});
	var baseUrl = "<?= base_url();?>";
</script>

<script>
	initSample();
</script>

<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
<script>
  $(function() {
    // setTimeout() function will be fired after page is loaded
    var timeout = 5000; // in miliseconds (5*1000)
    $('.alert').delay(timeout).fadeOut(300);
  });
</script>
</body>
</html>
