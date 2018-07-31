<?php
/**
 * Created by PhpStorm.
 * User: Heisenburg
 * Date: 9/24/2017
 * Time: 12:54 AM
 */
?>

<!-- Start Footer Area -->
<footer>
    <!-- Start Footer Bottom Area -->
    <div class="footer-bottom-area themeix-pb">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="footer-bottom">
                        <div class="footer-logo">
                            <img src="images/ewubc new.png" alt="" >
                        </div>
                        <div class="copyright-text">
                            <p>East West University Business Club &copy; 2018 - All rights reserved.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="footer-bottom">
                        <div class="footer-logo">
                            <img src="images/brandaid.png" class="footer_logo" alt="">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom Area -->
    <!-- Start Scroll To Top -->
    <div class="scroll-top">
        <div class="scroll-icon">
            <i class="fa fa-angle-up"></i>
        </div>
    </div>
    <!-- End Scroll To Top -->
</footer>
<!-- DropZone Js -->
<script src="assets/dropzone/dropzone.js"></script>

<!-- jquery min -->
<script src="assets/js/jquery.min.js"></script>
<!-- Bootstrap Js -->
<script src="assets/js/bootstrap.min.js"></script>



<!-- jQuery Easing -->
<script src="assets/js/jquery.easing.js"></script>

<!-- Owl Carousel Js -->
<!--<script src="js/owl.carousel.min.js"></script>-->
<script src="assets/owlcarousel/owl.carousel.min.js"></script>

<!-- Google Map -->
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

<!-- Mean Menu -->
<script src="assets/js/jquery.meanmenu.js"></script>

<!-- Particles JS CDN -->
<script src="assets/js/particles.min.js"></script>
<script src="assets/js/jquery.countdown.min.js"></script>
<!-- Main Js -->
<script src="assets/js/main.js"></script>

<script type="application/javascript">
    $(document).ready(function() {

        var owl = $("#sponsor");

        owl.owlCarousel({
            items : 10, //10 items above 1000px browser width
            itemsDesktop : [1000,5], //5 items between 1000px and 901px
            itemsDesktopSmall : [900,3], // betweem 900px and 601px
            itemsTablet: [600,2], //2 items between 600 and 0
            itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
        });


    });

   /* $(document).ready(function(){
        $('meta[name="viewport"]').prop('content', 'width=1280');
    });*/
</script>
</body>

</html>
