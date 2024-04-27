
<!doctype html>

<html class="no-js" lang="en">

<head>
    @section('title')
    {{$settings->site_name}} | Kids Product
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
		<section class="main-banner">
			<div class="">
				@if($homepage_secion_banner_three->banner_three->status == 1)
                    <a href="{{$homepage_secion_banner_three->banner_three->banner_url}}">
                    <img class="img-gluid" src="{{asset($homepage_secion_banner_three->banner_three->banner_image)}}" alt="" style="width:100%"></a>
                @endif
			</div>
		</section>
		<section class="cat-outer-section">
			<div class="container">
				<div class="row">
                    @foreach($kidsSubCategories as $item)
                 <div class="col-sm-6 col-md-6 col-lg-4">
                 <div class="category-section-blocks">
            <a href="{{ route('products.index', ['subcategorySlug' => $item->slug]) }}" class="cat-list-img"><img src="{{ asset($item->thumb_image) }}" alt=""></a>
            <a href="{{ route('products.index', ['subcategorySlug' => $item->slug]) }}">{{ $item->name }}</a>
        </div>
    </div>
@endforeach

				</div>
			</div>
		</section>
	</div>
	
	
    <!--newsletter section start-->
    @include('frontend.home.section.newsletter')
      
        


    @include('frontend.layout.footer')



    <script src="{{ asset('frontend/uthr/assets/js/vendor/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/vendor/popper.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/jquery.scrollup.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/images-loaded.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/tippy-bundle.umd.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/jquery.instagramFeed.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/uthr/assets/js/mailchimp-ajax.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('frontend/uthr/assets/js/main.js') }}"></script>


</body>

</html>
