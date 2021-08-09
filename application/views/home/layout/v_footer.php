 <footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>About US</h3>
                    </div>
                    <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus bibendum. Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis montes.</p>
                    <p>Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis montes.</p>
                </div><!-- end clearfix -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Information Link</h3>
                    </div>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul><!-- end links -->
                </div><!-- end clearfix -->
            </div><!-- end col -->
            
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Contact Details</h3>
                    </div>

                    <ul class="footer-links">
                        <li><a href="mailto:#">info@yoursite.com</a></li>
                        <li><a href="#">www.yoursite.com</a></li>
                        <li>PO Box 16122 Collins Street West Victoria 8007 Australia</li>
                        <li>+61 3 8376 6284</li>
                    </ul><!-- end links -->
                </div><!-- end clearfix -->
            </div><!-- end col -->
            
        </div><!-- end row -->
    </div><!-- end container -->
</footer><!-- end footer -->

<div class="copyrights">
    <div class="container">
        <div class="footer-distributed">
            <div class="footer-left">                   
                <p class="footer-company-name">All Rights Reserved. &copy; 2018 <a href="#">QuickCloud</a> Design By : <a href="https://html.design/">html design</a></p>
            </div>

            <div class="footer-right">
                <ul class="footer-links-soi">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-github"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                  <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul><!-- end links -->
          </div>
      </div>
  </div><!-- end container -->
</div><!-- end copyrights -->

<a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

<!-- ALL JS FILES -->
<script src="<?= base_url() ?>assets/front-end/js/all.js"></script>
<!-- ALL PLUGINS -->
<script src="<?= base_url() ?>assets/front-end/js/custom.js"></script>
<script src="<?= base_url() ?>assets/front-end/js/timeline.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?= base_url()?>assets/data/DataTables/datatables.js"></script>

<!-- Ekko Lightbox -->
<script src="<?= base_url() ?>assets/back-end/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
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
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

<script>
  timeline(document.querySelectorAll('.timeline'), {
     forceVerticalMode: 700,
     mode: 'horizontal',
     verticalStartPosition: 'left',
     visibleItems: 4
 });
  function goBack() {
     window.history.back();
 }
 $(function() {
			// setTimeout() function will be fired after page is loaded
			var timeout = 10000; // in miliseconds (10*1000)
			$('.alert').delay(timeout).fadeOut(300);
		});
	</script>
</body>
</html>
