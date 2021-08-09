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
<script src="<?= base_url() ?>assets/back-end/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/back-end/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/back-end/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/back-end/dist/js/demo.js"></script>
<script>
  $(function() {
    // setTimeout() function will be fired after page is loaded
    var timeout = 5000; // in miliseconds (5*1000)
    $('.alert').delay(timeout).fadeOut(300);
  });

  var baseURL= "<?= base_url();?>";
  var guru = "<?= str_replace("guru","",$user->username)?>" ;

  $(document).ready(function(){

		function load_unseen_notification(view = ''){
		$.ajax({
		url:baseURL+'guru/getNotif',
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
			url:baseURL+'guru/updateNotif',
			method:"POST",
			data:{guru:guru},
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
