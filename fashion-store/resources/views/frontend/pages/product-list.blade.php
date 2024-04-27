<!doctype html>
<html class="no-js" lang="en">

<head>

  @section('title')
  {{$settings->site_name}} | Product-List
  @endsection
   @include('frontend.layout.css')
       
    

      <style>
        /* Reset styles for pseudo-elements */
::after,
::before {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

/* Remove default underline from links */
a {
  text-decoration: none;
}

/* Remove default list-style from lists */
li {
  list-style: none;
}

/* Styling for headings */
h1 {
  font-weight: 600;
  font-size: 1.5rem;
}

/* Set font family for the body */

/* Flexbox wrapper for the sidebar */
.wrapper {
  display: flex;
}

/* Sidebar container */
#sidebar {
  width: 50px;
  min-width: 50px;
  z-index: 1000;
  transition: all 0.25s ease-in-out;
  background-color: #ffff;
  display: flex;
  flex-direction: column;
}
.sidebar-item span {
  font-size: 20px;
  font-family: "HelveticaNowText";
  color: #fff;
}
/* Expand the sidebar */
#sidebar.expand {
  width: 260px;
  min-width: 260px;
}

/* Hide logo and text when sidebar is collapsed */
#sidebar:not(.expand) .sidebar-logo,
#sidebar:not(.expand) a.sidebar-link span {
  display: none;
}

/* Sidebar navigation */
.sidebar-nav {
  background-color: #fff;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
  padding: 20px 20px;
}
#side-color{
    background-color: #fff;
}
/* Sidebar links */
/* Sidebar links */
a.sidebar-link {
  /* padding: 0.625rem 1.625rem; */
  color: black;
  display: block;
  font-size: 0.9rem;
  white-space: nowrap;
  border-left: 3px solid transparent;
  min-width: 50%; /* Set the width to 50% */
}

/* Icon styling */
.sidebar-link i {
  font-size: 1.1rem;
  margin-right: 0.75rem;
}

/* Hover effect for sidebar links */
a.sidebar-link:hover {
  /* background-color: rgba(255, 255, 255, 0.075); */
  /* border-left: 3px solid #3b7ddd; */
}
.sidebar-item a {
  font-size: 15px !important;
  font-family: "HelveticaNowText";
  margin-bottom: 10px !important;
  padding: 5px 50px;
}
/* Dropdown menu styling */
.sidebar-item {
  position: relative;
  background: #DA627D;


  /* background-color: #d1cfcf !important; */
}
.sidebar-item button a{
  padding: 5px 5px !important;
}

/* Dropdown menu position and appearance */
#sidebar:not(.expand) .sidebar-item .sidebar-dropdown {
  position: absolute;
  top: 0;
  left: 70px;
  background-color: #ffff;
  padding: 0;
  min-width: 15rem;
  display: none;
}

/* Show dropdown menu on hover */
#sidebar:not(.expand) .sidebar-item:hover .has-dropdown + .sidebar-dropdown {
  display: block;
}

/* Styling for dropdown arrow icon */
#sidebar.expand .sidebar-link[data-bs-toggle="collapse"]::after {
  border: solid;
  border-width: 0 0.075rem 0.075rem 0;
  content: "";
  display: inline-block;
  padding: 2px;
  position: absolute;
  right: 1.5rem;
  top: 1.4rem;
  transform: rotate(-135deg);
  transition: all 0.2s ease-out;
}
.wrapper .sidebar-nav .sidebar-item #category-a{
  background-color: #fff !important;
}
/* Change arrow direction when dropdown is collapsed */
#sidebar.expand .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
  transform: rotate(45deg);
}
@media (max-width: 992px) {
    .sidebar-nav {
        padding-left: 20px;
        width: 142%;
        
        
    }

    .sidebar-item {
        
        margin-bottom: 10px;
    }

    .sidebar-dropdown {
        position: relative;
        left: 0;
        width: 100%;
    }
}

@media (max-width: 768px) {
  .sidebar-nav {
      width: 100% !important;
        
        
    }
    .sidebar-link {
        padding-left: 25px;
    }
}



      </style>
</head>

<body>

    
 <div class="body_overlay">

 </div>
 
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
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area breadcrumbs_product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li><a href="shop.html">shop</a></li>
                            <li>Product Example</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--product area start-->
    <section class="product_area related_products mb-118">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="top-header mb-30">
                        <h2>Product List</h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                  
                    <div class="col-lg-3 col-md-12 col-sm-6 mb-4">
                      <div class="wrapper">
                          <ul class="sidebar-nav">
                              <li class="sidebar-item">
                                  <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#categories" aria-expanded="false" aria-controls="categories">
                                      <span>All Categories</span>
                                  </a>
                                  <ul id="categories" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                      <!-- Insert your category items here -->
                                      @foreach ($categories as $category)
                                      <li class="sidebar-item" id="side-{{ $category->slug }}" id="category-a">
                                          <a href="{{ route('products.index', ['category' => $category->name]) }}" class="sidebar-link" style="color: #fff">{{ $category->name }}</a>
                                      </li>
                                      @endforeach
                                  </ul>
                              </li>
                              <li class="sidebar-item">
                                  <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#price" aria-expanded="false" aria-controls="price">
                                      <span>Price</span>
                                  </a>
                                  <ul id="price" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                      <li class="sidebar-item ps-3">
                                          <label for="" class="null" style="color: #ffff !important">0 $</label>
                                          <input type="range" class="null" id="customRange1" />
                                          <label for="" class="null" style="color: #ffff !important">800 $ </label><br />
                                          <button type="button" class="btn btn-primary btn-md mt-1 ms-3">
                                              <a href="#" style="text-decoration: none; color: #ffff !important">Filter</a>
                                          </button>
                                      </li>
                                  </ul>
                              </li>
                              <li class="sidebar-item">
                                  <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#brands" aria-expanded="false" aria-controls="brands">
                                      <span>Brands</span>
                                  </a>
                                  <ul id="brands" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                      @foreach ($brands as $brand)
                                      <li class="sidebar-item">
                                          <a href="#" class="sidebar-link" style="color: #fff">{{ $brand->name }}</a>
                                      </li>
                                      @endforeach
                                  </ul>
                              </li>
                          </ul>
                      </div>
                  </div>
                  
                  

                    <!-- Product Listing Section -->
                    <div class="col-lg-9">
                      <!-- Product Listing -->
                      <div class="product_tab_btn product-list-tabs">
                          <div id="tabsContent" class="tab-content">
                              <div id="all-tab" class="tab-pane fade active show">
                                  <div class="product_container product-list-items">
                                      <div class="row">
                                          @foreach($products as $product)
                                          <div class="col-sm-6 col-md-4 col-lg-3">
                                              <article class="single_product">
                                                  <figure>
                                                      <div class="product_thumb">
                                                          <a href="{{route('product-detail', $product->slug)}}">
                                                            <img class="primary_img"
                                                            src="{{ $product->thumb_image }}" alt="{{ $product->name }}" class="img-fluid">

                                                          </a>
                                                          <div class="product_action">
                                                              <ul>
                                                                  <li class="wishlist"><a href="#" data-tippy="Wishlist" data-tippy-inertia="true" data-tippy-delay="50"
                                                                          data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-heart icons"></i></a></li>
                  
                                                                  <li class="quick_view"><a data-toggle="modal" data-target="#modal_box" data-tippy="Quick View" href="#" data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-size-fullscreen icons"></i></a></li>
                                                                  <li class="compare"><a data-tippy="Compare" href="#" data-tippy-inertia="true" data-tippy-delay="50"
                                                                          data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-refresh icons"></i></a></li>
                                                              </ul>
                                                          </div>
                                                      </div>
                                                      <figcaption class="product_content text-center">
                                                          <div class="product_ratting">
                                                              <div class="product-category float-left">{{ $product->subCategory->name ?? '' }}</div>
                                                              {{-- <ul class="d-flex">
                                                                  <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                                  <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                                  <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                                  <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                                  <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                                  <li><span>(6)</span></li>
                                                              </ul> --}}
                                                          </div>
                                                          <h4 class="product_name"><a href="{{route('product-detail', $product->slug)}}">{{ $product->name }}</a></h4>
                                                          <div class="price_box text-left">
                                                              <span class="text-black">₹{{$product->price}}</span>
                                                              <span class="old_price">₹{{$product->offer_price}}</span>
                                                          </div>
                                                          @if($product->id)
                                                          <div class="add_to_cart">
                                                              <!-- Add to Cart form -->
                                                              <form action="{{ route('add-to-cart') }}" method="POST" >
                                                                  @csrf
                                                                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                  <!-- Quantity input -->
                                                                  <button type="submit" class="btn btn-primary" data-tippy="Add To Cart" data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</button>
                                                              </form>
                                                          </div>
                                                      @else
                                                          <p>Error: Product ID not found.</p>
                                                      @endif
                                                      
                                                        
                                                      </figcaption>
                                                  </figure>
                                              </article>
                                          </div>
                                          @endforeach
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  
                </div>
            </div>
        </div>
    </section>
    <!--product area end-->

    <!--newsletter section start-->

	@include('frontend.home.section.newsletter')
  
  @include('frontend.layout.footer')

     <!-- modal area start-->
    <div class="modal fade" id="modal_box" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="ion-android-close"></i></span>
                </button>
                <div class="modal_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="modal_zoom_gallery">
                                   <div class="product_zoom_thumb">
                                        <img src="frontend/uthr/assets/img/product/big-product/product1.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="modal_right">
                                    <div class="modal_title mb-10">
                                        <h2>Donec Ac Tempus</h2>
                                    </div>
                                    <div class="modal_price mb-10">
                                        <span class="new_price">$64.99</span>
                                        <span class="old_price" >$78.99</span>
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui,  </p>
                                    </div>
                                    <div class="variants_selects">
                                        <div class="variants_size">
                                           <h2>size</h2>
                                           <select class="select_option">
                                               <option selected value="1">s</option>
                                               <option value="1">m</option>
                                               <option value="1">l</option>
                                               <option value="1">xl</option>
                                               <option value="1">xxl</option>
                                           </select>
                                        </div>
                                        <div class="variants_color">
                                           <h2>color</h2>
                                           <select class="select_option">
                                               <option selected value="1">purple</option>
                                               <option value="1">violet</option>
                                               <option value="1">black</option>
                                               <option value="1">pink</option>
                                               <option value="1">orange</option>
                                           </select>
                                        </div>
                                        <div class="modal_add_to_cart">
                                            <form action="#">
                                                <input min="1" max="100" step="2" value="1" type="number">
                                                <button type="submit">add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal_social">
                                        <h2>Share this product</h2>
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal area end-->

<!-- JS
============================================ -->

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
@push('scripts')
    <script>
        $(document).ready(function(){
            $('.list-view').on('click', function(){
                let style = $(this).data('id');

                $.ajax({
                    method: 'GET',
                    url: "{{route('change-product-list-view')}}",
                    data: {style: style},
                    success: function(data){

                    }
                })
            })
        })
        @php
            if(request()->has('range') && request()->range !=  ''){
                $price = explode(';', request()->range);
                $from = $price[0];
                $to = $price[1];
            }else {
                $from = 0;
                $to = 8000;
            }
        @endphp
        jQuery(function () {
        jQuery("#slider_range").flatslider({
            min: 0, max: 10000,
            step: 100,
            values: [{{$from}}, {{$to}}],
            range: true,
            einheit: '{{$settings->currency_icon}}'
        });
    });
    
    </script>
@endpush

