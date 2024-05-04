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

.overflow-hidden{
    width: 100px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
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
  border: 1px solid #DA627D;
  border-radius: 0.5rem;
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

.sidebar_widget .single_banner {
  border: 0;
}
@media only screen and (max-width: 767px) {
  .sidebar_widget .single_banner {
    margin-bottom: 0;
  }
}
@media only screen and (max-width: 767px) {
  .sidebar_widget .single_banner a {
    width: 100%;
  }
}
@media only screen and (max-width: 767px) {
  .sidebar_widget .single_banner a img {
    width: 100%;
  }
}

.widget_list {
  margin-bottom: 29px;
  border-bottom: 1px solid #ddd;
  padding-bottom: 35px;
}
.widget_list:last-child {
  /* margin-bottom: 0;
  padding-bottom: 0;
  border-bottom: 0; */
}
.widget_list h2 {
  font-size: 16px;
  margin: 0 0 15px;
  padding: 0 0 5px;
  text-transform: capitalize;
  font-weight: 700;
  line-height: 24px;
}
.widget_list > ul > li {
  margin-bottom: 8px;
  position: relative;
}
.widget_list > ul > li:last-child {
  margin-bottom: 0;
}
.widget_list > ul > li input {
  position: absolute;
  left: 3px;
  top: 50%;
  transform: translatey(-50%);
  opacity: 0;
  cursor: pointer;
  z-index: 999;
}
.widget_list > ul > li input:checked ~ .checkmark {
  background-color: #DA627D;
  border: 1px solid #DA627D;
}
.widget_list > ul > li input:checked ~ .checkmark::before {
  display: block;
}
.widget_list > ul > li > a {
  font-size: 14px;
  display: block;
  line-height: 27px;
  margin-left: 30px;
  text-transform: capitalize;
  font-family: "poppins";
}
.widget_list > ul > li > a:hover {
  color: #DA627D;
}
.widget_list > ul > li span.checkmark {
  height: 17px;
  width: 17px;
  border: 1px solid #dfdfdf;
  border-radius: 3px;
  display: block;
  position: absolute;
  top: 50%;
  transform: translatey(-50%);
  background: #f4f4f4;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}
.widget_list > ul > li span.checkmark::before {
  left: 5px;
  top: 3px;
  width: 5px;
  height: 8px;
  border: solid white;
  border-top-width: medium;
  border-right-width: medium;
  border-bottom-width: medium;
  border-left-width: medium;
  border-width: 0 2px 2px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
  content: "";
  position: absolute;
  display: none;
}

.widget_list.widget_filter form {
  padding-top: 10px;
}
.widget_list.widget_filter form input {
  background: none;
  border: none;
  font-size: 12px;
  float: right;
  text-align: right;
  line-height: 31px;
}
@media only screen and (min-width: 992px) and (max-width: 1199px) {
  .widget_list.widget_filter form input {
    width: 65px;
  }
}
.widget_list.widget_filter form button {
  height: 30px;
  line-height: 30px;
  padding: 0 20px;
  text-transform: capitalize;
  color: #ffffff;
  background: #333;
  border: 0;
  border-radius: 30px;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}
.widget_list.widget_filter form button:hover {
  background: #DA627D;
}

.ui-slider-horizontal .ui-slider-range {
  background: #DA627D;
  height: 5px;
}

.ui-slider-horizontal {
  height: 3px;
  background: #dbdbdb;
  border: none;
  width: 92%;
  margin: 0 auto;
  margin-bottom: 22px;
}

.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
  background: #fff;
  border: 0;
  border-radius: 0;
  width: 19px;
  height: 19px;
  top: -7px;
  cursor: pointer;
  border-radius: 50%;
  border: 5px solid #DA627D;
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
                    
                      <div class="sidebar_widget">
                        <div class="widget_inner">
                            <div class="widget_list widget_filter sidebar-nav">
                                <h2>Filter by price</h2>
                                <form action="#">
                                    <div id="slider-range"></div>
                                    <button type="submit" style="margin-top: 10px;">Filter</button>
                                    <input type="text" style="margin-top: 10px;" name="text" id="amount" />

                                </form>
                            </div>
                            <div class="widget_list widget_categories sidebar-nav">
                                <h2>Select By Categories</h2>
                                <ul>
                                    <li>
                                        <input type="checkbox">
                                        <a href="#">Men(6)</a>
                                        <span class="checkmark"></span>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <a href="#">women(10)</a>
                                        <span class="checkmark"></span>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <a href="#">kids(4)</a>
                                        <span class="checkmark"></span>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <a href="#">Season(10)</a>
                                        <span class="checkmark"></span>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <a href="#">Othercatagory(8)</a>
                                        <span class="checkmark"></span>
                                    </li>

                                </ul>
                            </div>

                            <div class="widget_list widget_categories sidebar-nav">
                                <h2>Select By Brand</h2>
                                <ul>
                                    <li>
                                        <input type="checkbox">
                                        <a href="#">Prada(6)</a>
                                        <span class="checkmark"></span>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <a href="#">Zara(10)</a>
                                        <span class="checkmark"></span>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <a href="#">Celine(4)</a>
                                        <span class="checkmark"></span>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <a href="#">Gucci(10)</a>
                                        <span class="checkmark"></span>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <a href="#">Zara(8)</a>
                                        <span class="checkmark"></span>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <a href="#">Dior(7)</a>
                                        <span class="checkmark"></span>
                                    </li>
                                    {{-- <li>
                                        <input type="checkbox">
                                        <a href="#">Hema(6)</a>
                                        <span class="checkmark"></span>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="widget_list widget_categories sidebar-nav">
                                <h2>Select By Color</h2>
                                <ul>
                                    <li>
                                        <input type="checkbox">
                                        <a href="#">Black(6)</a>
                                        <span class="checkmark"></span>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <a href="#"> Blue(8)</a>
                                        <span class="checkmark"></span>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <a href="#">Brown(10)</a>
                                        <span class="checkmark"></span>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <a href="#"> Green(6)</a>
                                        <span class="checkmark"></span>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <a href="#">Pink(4)</a>
                                        <span class="checkmark"></span>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <a href="#">White(2)</a>
                                        <span class="checkmark"></span>

                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <a href="#">Yellow(3)</a>
                                        <span class="checkmark"></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="shop_sidebar_banner">
                            <a href="#"><img src="assets/img/bg/banner9.jpg" alt=""></a>
                        </div>
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
                                          <div class="col-sm-6 col-md-4 col-lg-3" style=" padding-left: 0">
                                              <article class="single_product">
                                                  <figure>
                                                      <div class="product_thumb">
                                                          <a href="{{route('product-detail', $product->slug)}}">
                                                            <img class="primary_img" style="border-radius: 0.5rem 0.5rem 0 0;"
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
                                                      <figcaption class="product_content text-center" style="border-radius: 0 0 0.5rem 0.5rem ;">
                                                          <div class="product_ratting">
                                                              <div class="product-category float-left">{{ $product->subCategory->name ?? $product->name }}</div>
                                                              {{-- <ul class="d-flex">
                                                                  <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                                  <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                                  <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                                  <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                                  <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                                  <li><span>(6)</span></li>
                                                              </ul> --}}
                                                          </div>
                                                          <h4 class="product_name overflow-hidden"><a href="{{route('product-detail', $product->slug)}}">{{ $product->name }}</a></h4>
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
                                                                  <button type="submit" class="btn btn-primary te" data-tippy="Add To Cart" data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</button>
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

