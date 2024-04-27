
<!doctype html>
<html class="no-js" lang="en">

<head>
    
    @section('title')
    {{$settings->site_name}} | Home Page
    @endsection
    @include('frontend.layout.css')

</head>

<body>

    <!--offcanvas menu area start-->
    <div class="body_overlay">

</div>
@include('frontend.layout.mobile-menu')
<!--offcanvas menu area end-->
<!--mini cart-->
@include('frontend.layout.mini-cart')
<!--mini cart end-->

<!--header area start-->
@include('frontend.layout.header')
<!--header area end-->
<div class="main-body">
    <!--slider area start-->
    @include('frontend.home.section.slider-section')
    
    <!-- brands -->

    @include('frontend.home.section.brands')




    <!-- banner section start -->
    @include('frontend.home.section.banner')

    <!-- product section end -->
		
   @include('frontend.home.section.seasonal')




    @include('frontend.home.section.browse-categpries')

    <!-- product section start -->
    
       @include('frontend.home.section.new-arrivals')
    <!-- product section end -->

	@include('frontend.home.section.popular')



   @include('frontend.home.section.kids')

    <!--newsletter section start-->
   @include('frontend.home.section.newsletter')
    <!--newsletter section end-->


    @include('frontend.layout.footer')




    <script src="frontend/uthr/assets/js/vendor/jquery-3.4.1.min.js"></script>
    <script src="frontend/uthr/assets/js/vendor/popper.js"></script>
    <script src="frontend/uthr/assets/js/vendor/bootstrap.min.js"></script>
    <script src="frontend/uthr/assets/js/slick.min.js"></script>
    <script src="frontend/uthr/assets/js/wow.min.js"></script>
    <script src="frontend/uthr/assets/js/jquery.scrollup.min.js"></script>
    <script src="frontend/uthr/assets/js/images-loaded.min.js"></script>
    <script src="frontend/uthr/assets/js/isotope.pkgd.min.js"></script>
    <script src="frontend/uthr/assets/js/jquery.nice-select.js"></script>
    <script src="frontend/uthr/assets/js/tippy-bundle.umd.js"></script>
    <script src="frontend/uthr/assets/js/jquery-ui.min.js"></script>
    <script src="frontend/uthr/assets/js/jquery.instagramFeed.min.js"></script>
    <script src="frontend/uthr/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="frontend/uthr/assets/js/mailchimp-ajax.js"></script>

    <!-- Main JS -->
    <script src="frontend/uthr/assets/js/main.js"></script>



</body>

</html>
