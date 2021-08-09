<!-- Main Footer -->
<footer class="main-footer">
	<strong>Copyright &copy; 2020-2021 <a href="http://adminlte.io">Kurniamayasusanti @ inc </a>.</strong>
	All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
		<b>Version</b> 1.0
	</div>
</footer>
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/front-end/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/front-end/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/front-end/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/front-end/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/front-end/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/front-end/dist/js/demo.js"></script>

<script src="<?= base_url()?>assets/data/datepicker/js/bootstrap-datepicker.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
	  "lengthChange": false, 
	  "autoWidth": false,
	  "paging": false,
	  "searching": false,
	  "info": false,
	  "ordering": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
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
  $(function() {
    // setTimeout() function will be fired after page is loaded
    var timeout = 5000; // in miliseconds (5*1000)
    $('.alert').delay(timeout).fadeOut(300);
  });

  var baseURL= "<?= base_url();?>";
  var siswa = "<?= str_replace("siswa","",$user->username)?>" ;

  $(document).ready(function(){

		function load_unseen_notification(view = ''){
		$.ajax({
		url:baseURL+'siswa/getNotif',
		method:"POST",
		data:{view:view},
		dataType:"json",
		success:function(data){
			$('.dropdown-menu').html(data.notification);
			if(data.unseen_notification > 0){
			$('.count').html(data.unseen_notification);
		}
		}
		});
		}

		load_unseen_notification();

		$(document).on('click', '#notif', function(){
			// var nimNo = nim;
			$.ajax({
			url:baseURL+'siswa/updateNotif',
			method:"POST",
			data:{siswa:siswa},
			dataType:"json",
			success:function(data){
				$('.count').html('');
			}
			})
		});

		setInterval(function(){ 
		load_unseen_notification();; 
		}, 5000);

	});
</script>
</body>
</html>
