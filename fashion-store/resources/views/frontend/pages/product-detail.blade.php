<!doctype html>
<html class="no-js" lang="en">

<head>
    @section('title')
    {{$settings->site_name}} | Product Detail Page
    @endsection
   @include('frontend.layout.css')

   <style>
    .single_product{
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        border-radius: 1rem;
        margin-bottom: 10px
    }
    .add_to_cart_btn{
        width: 100%;
    }
    </style>
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
        <!--breadcrumbs area start-->
        <div class="breadcrumbs_area breadcrumbs_product">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb_content">
                            <ul>
                                <li><a href="index.html">home</a></li>
                                <li><a href="{{ route('frontend.pages.product-list') }}">shop</a></li>
                                <li>Product Example</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->

        <!--product details start-->
        <section class="product_details mb-135">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="product_zoom_gallery">
                            <div class="zoom_gallery_inner d-flex">
                                <div class="zoom_tab_img">
                                    @foreach ($product->productImageGalleries as $item)
                                        <a class="zoom_tabimg_list" href="javascript:void(0)"><img
                                                src="{{ asset($item->image) }}" alt="tab-thumb"></a>
                                    @endforeach
                                </div>


                                <div class="product_zoom_main_img">

                                    @foreach ($product->productImageGalleries as $item)
                                        <div class="product_zoom_thumb">

                                            <img data-image="{{ asset($item->image) }}"
                                                src="{{ asset($item->image) }}" alt=""
                                                style="height: 596px;width:677px">
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product_d_right">
                            <form action="#">
                                <p class="product-brand">{{ $product->brand->name }}</p>
                                <h1>{{ $product->name }}</h1>
                                <div class="product_ratting_review d-flex align-items-center">
                                    @php
                                        $rating = 0; // Assuming the rating value is 4
                                    @endphp

                                    <div class="product_ratting">
                                        <ul class="d-flex">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $rating)
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                @else
                                                    <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                                                @endif
                                            @endfor
                                        </ul>
                                    </div>


                                </div>
                                <div class="price_box">
                                    @if (checkDiscount($product))
                                        <span class="current_price">₹{{ $product->offer_price }}</span>
                                        <span><del>₹{{ $product->price }}</del></span>
                                    @else
                                        <span class="current_price">₹{{ $product->price }}</span>
                                    @endif

                                </div>


                                <div class="product_availalbe">
                                    <ul class="d-flex">
                                        <li><i class="icon-layers icons"></i> <span></span> </li>
                                        <li>Available: <span
                                                class="stock">{{ $product->qty > 0 ? 'In Stock' : 'Out of Stock' }}</span>
                                        </li>
                                    </ul>

                                </div>

                                <div class="product_variant">
                                    <div class="filter__list widget_color align-items-center">
                                        <h3>Colour : <span>black</span></h3>
                                        <div class="product-color mt-10px">
                                            <ul class="d-flex">
                                                <li>
                                                    <img src="{{ asset('frontend/uthr/assets/img/product/product1.jpg') }}"
                                                        width="68" height="98" class="selected">
                                                </li>
                                                <li>
                                                    <img src="{{ asset('frontend/uthr/assets/img/product/product1.jpg') }}"
                                                        width="68" height="98">
                                                </li>
                                                <li>
                                                    <img src="{{ asset('frontend/uthr/assets/img/product/product1.jpg') }}"
                                                        width="68" height="98">
                                                </li>
                                                <li>
                                                    <img src="{{ asset('frontend/uthr/assets/img/product/product1.jpg') }}"
                                                        width="68" height="98">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-flex ">
                                        <div class="filter__list widget_size d-flex align-items-center size-dropdown">
                                            <select>
                                                <option>choose your size</option>
                                                <option>S</option>
                                                <option>M</option>
                                                <option>L</option>
                                                <option>XL</option>
                                                <option>XXL</option>
                                            </select>

                                        </div>
                                        <div class="pro-qty border">
                                            <input min="1" max="100" type="tex" value="1">
                                        </div>
                                    </div>
                                    <div class="variant_quantity_btn d-flex">
                                        <form id="add-to-cart-form" action="{{ route('add-to-cart') }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button class="button btn btn-primary" type="submit"><i
                                                    class="ion-android-add"></i> Add To Cart</button>
                                        </form>


                                        <a class="wishlist" href="#"><i class="ion-ios-heart"></i></a>
                                    </div>
                                </div>
                                <div class="delivery-details-report">
                                    <div class="delivery-inner-block">
                                        <div class="truck-block">
                                            <p><svg viewBox="0 0 24 24" width="1em" height="1em"
                                                    fill="currentColor" aria-labelledby="expresslevering-:R1a:"
                                                    class="zds-icon RC794g X9n9TI DlJ4rT _5Yd-hZ HlZ_Tf I_qHp3"
                                                    focusable="false" aria-hidden="true" role="img">
                                                    <title id="expresslevering-:R1a:">Expresslevering</title>
                                                    <path
                                                        d="M2.231 8.25h2.282a.75.75 0 0 0 0-1.5H2.231a.75.75 0 0 0 0 1.5zm2.266 3a.75.75 0 0 0 0-1.5H.753a.75.75 0 0 0 0 1.5h3.744zm.016 3.001a.75.75 0 0 0 0-1.5H2.21a.75.75 0 0 0 0 1.5h2.303z">
                                                    </path>
                                                    <path
                                                        d="m23.81 11.501-3.368-3.738a.754.754 0 0 0-.557-.248h-3.378V4.497a.75.75 0 0 0-.75-.75H3.711a.75.75 0 0 0 0 1.5l11.298-.004.003 10.513-4.953.004c-.519-.897-1.478-1.508-2.588-1.508s-2.07.61-2.588 1.508H3.712a.75.75 0 1 0 0 1.5h.76a2.999 2.999 0 0 0 5.998 0h5.276l.76.003a2.999 2.999 0 0 0 5.997 0h.749a.75.75 0 0 0 .75-.75v-4.51a.751.751 0 0 0-.193-.502zm-16.338 7.25a1.5 1.5 0 1 1 0-2.999 1.5 1.5 0 0 1 0 2.999zm12.032 0a1.5 1.5 0 1 1 0-2.999 1.5 1.5 0 0 1 0 2.999zm2.998-2.988h-.408a2.987 2.987 0 0 0-2.59-1.511 2.987 2.987 0 0 0-2.59 1.511h-.402l-.003-6.748h3.042l2.95 3.278v3.47z">
                                                    </path>
                                                </svg></p>
                                            <p>2-4 working days</p>
                                            <p>Standard delivery</p>
                                            <p><a href="#">Free for orders over £35.00*</a></p>
                                        </div>
                                        <div class="return-block"><svg viewBox="0 0 24 24" width="1em"
                                                height="1em" fill="currentColor"
                                                class="zds-icon RC794g X9n9TI DlJ4rT _5Yd-hZ SpRgR2 HlZ_Tf I_qHp3"
                                                focusable="false" aria-hidden="true">
                                                <path
                                                    d="M14.25 4.33H1.939l3.056-3.055A.75.75 0 0 0 3.934.215L.658 3.49a2.252 2.252 0 0 0 0 3.182l3.276 3.275a.75.75 0 0 0 1.06-1.06L1.94 5.83h12.31c4.557 0 8.251 3.694 8.251 8.25s-3.695 8.42-8.251 8.42h-12a.75.75 0 0 0 0 1.5h12c5.385 0 9.75-4.534 9.75-9.919s-4.365-9.75-9.75-9.75z">
                                                </path>
                                            </svg> 100 day return policy</div>
                                    </div>
                                </div>
                                <div id="accordionExample">

                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <a class="collapsed btn" data-toggle="collapse" href="#" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Material & care <span><i class="fa fa-angle-down"
                                                        aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">

                                                {!! $product->short_description !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <a class="collapsed btn" data-toggle="collapse" href="#" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                                Details <span><i class="fa fa-angle-down"
                                                        aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">
                                                {!! $product->long_description !!}

                                            </div>
                                        </div>
                                    </div>
                                    {{-- 
							  <div class="card">
								<div class="card-header">
								  <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
									Size & fit <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
								  </a>
								</div>
								<div id="collapseThree" class="collapse" data-bs-parent="#accordion">
								  <div class="card-body">
									<table style="border-collapse: collapse; width: 100%;">
                                        <tr>
                                            <th style="border: 1px solid black; padding: 8px; text-align: left;">Our model's height</th>
                                            <td style="border: 1px solid black; padding: 8px; text-align: left;">Our model is 175 cm tall and is wearing size S</td>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black; padding: 8px; text-align: left;">Fit</th>
                                            <td style="border: 1px solid black; padding: 8px; text-align: left;">Oversized</td>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black; padding: 8px; text-align: left;">Shape</th>
                                            <td style="border: 1px solid black; padding: 8px; text-align: left;">Cocoon</td>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black; padding: 8px; text-align: left;">Length</th>
                                            <td style="border: 1px solid black; padding: 8px; text-align: left;">Long</td>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black; padding: 8px; text-align: left;">Sleeve length</th>
                                            <td style="border: 1px solid black; padding: 8px; text-align: left;">Long</td>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black; padding: 8px; text-align: left;">Sleeve length (Size S)</th>
                                            <td style="border: 1px solid black; padding: 8px; text-align: left;">68 cm</td>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black; padding: 8px; text-align: left;">Total length (Size S)</th>
                                            <td style="border: 1px solid black; padding: 8px; text-align: left;">65 cm</td>
                                        </tr>
                                    </table>
                                    
								  </div>
								</div>
							  </div> --}}
                                    <div class="card nocollapse-card">
                                        <p>adidas Originals <a href="#" class="right-follow">+ Follow</a></p>
                                    </div>
                                    <div class="card legal-concern">
                                        <p><a href="#"><i class="fa fa-flag-o" aria-hidden="true"></i> Report a
                                                legal concern</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--product details end-->

        <!--product area start-->
        <section class="product_area related_products mb-50">
            <div class="container">
                {{-- <div class="row">
                    <div class="col-12">
                        <div class="top-header mb-30">
                            <h2>Similar items</h2>
                            <p>How about these? <span><a href="#">See more <i class="fa fa-long-arrow-right"
                                            aria-hidden="true"></i></a></span></p>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="product_container row">
                    <div class=" product_slick slick_slider_activation"
                        data-slick='{
                    "slidesToShow": 4,
                    "slidesToScroll": 1,
                    "arrows": true,
                    "dots": false,
                    "autoplay": false,
                    "speed": 300,
                    "infinite": true,
                    "responsive":[
                      {"breakpoint":992, "settings": { "slidesToShow": 3 } },
                      {"breakpoint":768, "settings": { "slidesToShow": 2 } },
                      {"breakpoint":300, "settings": { "slidesToShow": 1 } }
                     ]
                }'>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img class="primary_img"
                                                src="frontend/uthr/assets/img/product/product1.jpg" alt="consectetur">
                                        </a>
                                        <div class="product_action">
                                            <ul>
                                                <li class="wishlist"><a href="#" data-tippy="Wishlist"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-heart icons"></i></a></li>

                                                <li class="quick_view"><a data-toggle="modal"
                                                        data-target="#modal_box" data-tippy="Quick View"
                                                        href="#" data-tippy-inertia="true"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-placement="left"><i
                                                            class="icon-size-fullscreen icons"></i></a></li>
                                                <li class="compare"><a data-tippy="Compare" href="#"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-refresh icons"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content text-center">
                                        <div class="product_ratting">
                                            <ul class="d-flex justify-content-center">
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><span>(4)</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="#">Basic Joggin Shorts</a></h4>
                                        <div class="price_box">
                                            <span class="current_price">$26.00</span>
                                            <span class="old_price">$62.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a class="btn btn-primary" href="/cartpage" data-tippy="Add To Cart"
                                                data-tippy-inertia="true" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img class="primary_img"
                                                src="{{ asset('frontend/uthr/assets/img/product/product3.jpg') }}"
                                                alt="consectetur">
                                        </a>
                                        <div class="product_action">
                                            <ul>
                                                <li class="wishlist"><a href="#" data-tippy="Wishlist"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-heart icons"></i></a></li>

                                                <li class="quick_view"><a data-toggle="modal"
                                                        data-target="#modal_box" data-tippy="Quick View"
                                                        href="#" data-tippy-inertia="true"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-placement="left"><i
                                                            class="icon-size-fullscreen icons"></i></a></li>
                                                <li class="compare"><a data-tippy="Compare" href="#"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-refresh icons"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product_label">
                                            <span>-20%</span>
                                        </div>
                                    </div>
                                    <figcaption class="product_content text-center">
                                        <div class="product_ratting">
                                            <ul class="d-flex justify-content-center">
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><span>(6)</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="#">Make Thing Happen T-Shirts</a></h4>
                                        <div class="price_box">
                                            <span class="text-black">$38.00</span>

                                        </div>
                                        <div class="add_to_cart">
                                            <a class="btn btn-primary" href="/cartpage" data-tippy="Add To Cart"
                                                data-tippy-inertia="true" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img class="primary_img"
                                                src="frontend/uthr/assets/img/product/product3.jpg" alt="consectetur">
                                        </a>
                                        <div class="product_action">
                                            <ul>
                                                <li class="wishlist"><a href="#" data-tippy="Wishlist"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-heart icons"></i></a></li>

                                                <li class="quick_view"><a data-toggle="modal"
                                                        data-target="#modal_box" data-tippy="Quick View"
                                                        href="#" data-tippy-inertia="true"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-placement="left"><i
                                                            class="icon-size-fullscreen icons"></i></a></li>
                                                <li class="compare"><a data-tippy="Compare" href="#"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-refresh icons"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product_label">
                                            <span>-18%</span>
                                        </div>
                                    </div>
                                    <figcaption class="product_content text-center">
                                        <div class="product_ratting">
                                            <ul class="d-flex justify-content-center">
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><span>(2)</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="#">Basic White Simple Sneaker</a></h4>
                                        <div class="price_box">
                                            <span class="current_price">$43.00</span>
                                            <span class="old_price">$46.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a class="btn btn-primary" href="/cartpage" data-tippy="Add To Cart"
                                                data-tippy-inertia="true" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img class="primary_img"
                                                src="frontend/uthr/assets/img/product/product4.jpg" alt="consectetur">
                                        </a>
                                        <div class="product_action">
                                            <ul>
                                                <li class="wishlist"><a href="#" data-tippy="Wishlist"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-heart icons"></i></a></li>

                                                <li class="quick_view"><a data-toggle="modal"
                                                        data-target="#modal_box" data-tippy="Quick View"
                                                        href="#" data-tippy-inertia="true"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-placement="left"><i
                                                            class="icon-size-fullscreen icons"></i></a></li>
                                                <li class="compare"><a data-tippy="Compare" href="#"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-refresh icons"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content text-center">
                                        <div class="product_ratting">
                                            <ul class="d-flex justify-content-center">
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><span>(8)</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="#">Simple Rounded Sunglasses</a></h4>
                                        <div class="price_box">
                                            <span class="text-black">$42.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a class="btn btn-primary" href="/cartpage" data-tippy="Add To Cart"
                                                data-tippy-inertia="true" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img class="primary_img"
                                                src="frontend/uthr/assets/img/product/product1.jpg" alt="consectetur">
                                        </a>
                                        <div class="product_action">
                                            <ul>
                                                <li class="wishlist"><a href="#" data-tippy="Wishlist"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-heart icons"></i></a></li>

                                                <li class="quick_view"><a data-toggle="modal"
                                                        data-target="#modal_box" data-tippy="Quick View"
                                                        href="#" data-tippy-inertia="true"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-placement="left"><i
                                                            class="icon-size-fullscreen icons"></i></a></li>
                                                <li class="compare"><a data-tippy="Compare" href="#"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-refresh icons"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content text-center">
                                        <div class="product_ratting">
                                            <ul class="d-flex justify-content-center">
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><span>(12)</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="#">Basic Joggin Shorts</a></h4>
                                        <div class="price_box">
                                            <span class="current_price">$26.00</span>
                                            <span class="old_price">$362.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a class="btn btn-primary" href="/cartpage" data-tippy="Add To Cart"
                                                data-tippy-inertia="true" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img class="primary_img"
                                                src="{{ asset('frontend/uthr/assets/img/product/product3.jpg') }}"
                                                alt="consectetur">
                                        </a>
                                        <div class="product_action">
                                            <ul>
                                                <li class="wishlist"><a href="#" data-tippy="Wishlist"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-heart icons"></i></a></li>

                                                <li class="quick_view"><a data-toggle="modal"
                                                        data-target="#modal_box" data-tippy="Quick View"
                                                        href="#" data-tippy-inertia="true"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-placement="left"><i
                                                            class="icon-size-fullscreen icons"></i></a></li>
                                                <li class="compare"><a data-tippy="Compare" href="#"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-refresh icons"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product_label">
                                            <span>-20%</span>
                                        </div>
                                    </div>
                                    <figcaption class="product_content text-center">
                                        <div class="product_ratting">
                                            <ul class="d-flex justify-content-center">
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><span>(14)</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="#">Simple Rounded Sunglasses</a></h4>
                                        <div class="price_box">
                                            <span class="current_price">$35.00</span>
                                            <span class="old_price">$38.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a class="btn btn-primary" href="/cartpage" data-tippy="Add To Cart"
                                                data-tippy-inertia="true" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    </div>
                </div> --}}
                <!-- 2 -->
                <div class="row">
                    <div class="col-12">
                        <div class="top-header mb-30">
                            <h2>Similar items</h2>
                            <p>How about these? <span><a href="#">See more <i class="fa fa-long-arrow-right"
                                            aria-hidden="true"></i></a></span></p>
                        </div>
                    </div>
                </div>
                <div class="product_container row">
                    <div class=" product_slick slick_slider_activation"
                        data-slick='{
                    "slidesToShow": 4,
                    "slidesToScroll": 1,
                    "arrows": true,
                    "dots": false,
                    "autoplay": false,
                    "speed": 300,
                    "infinite": true,
                    "responsive":[
                      {"breakpoint":992, "settings": { "slidesToShow": 3 } },
                      {"breakpoint":768, "settings": { "slidesToShow": 2 } },
                      {"breakpoint":300, "settings": { "slidesToShow": 1 } }
                     ]
                }'>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img class="primary_img" style="border-radius: 0.5rem 0.5rem 0 0;"
                                                src="{{ asset('frontend/uthr/assets/img/product/product1.jpg') }}"
                                                alt="consectetur">
                                        </a>
                                        <div class="product_action">
                                            <ul>
                                                <li class="wishlist"><a href="#" data-tippy="Wishlist"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-heart icons"></i></a></li>

                                                <li class="quick_view"><a data-toggle="modal"
                                                        data-target="#modal_box" data-tippy="Quick View"
                                                        href="#" data-tippy-inertia="true"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-placement="left"><i
                                                            class="icon-size-fullscreen icons"></i></a></li>
                                                <li class="compare"><a data-tippy="Compare" href="#"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-refresh icons"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content text-center" style="border-radius: 0 0 0.5rem 0.5rem ;">
                                        <div class="product_ratting">
                                            <ul class="d-flex justify-content-left">
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><span>(4)</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name justify-content-left"><a href="#">Basic Joggin Shorts</a></h4>
                                        <div class="price_box text-left">
                                            <span class="current_price">$26.00</span>
                                            <span class="old_price">$62.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a class="btn btn-primary add_to_cart_btn" href="/cartpage" data-tippy="Add To Cart"
                                                data-tippy-inertia="true" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img class="primary_img" style="border-radius: 0.5rem 0.5rem 0 0;"
                                                src="{{ asset('frontend/uthr/assets/img/product/men-5.png') }}"
                                                alt="consectetur">
                                        </a>
                                        <div class="product_action">
                                            <ul>
                                                <li class="wishlist"><a href="#" data-tippy="Wishlist"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-heart icons"></i></a></li>

                                                <li class="quick_view"><a data-toggle="modal"
                                                        data-target="#modal_box" data-tippy="Quick View"
                                                        href="#" data-tippy-inertia="true"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-placement="left"><i
                                                            class="icon-size-fullscreen icons"></i></a></li>
                                                <li class="compare"><a data-tippy="Compare" href="#"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-refresh icons"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product_label">
                                            <span>-20%</span>
                                        </div>
                                    </div>
                                    <figcaption class="product_content text-center" style="border-radius: 0 0 0.5rem 0.5rem ;">
                                        <div class="product_ratting">
                                            <ul class="d-flex justify-content-left">
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><span>(6)</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name justify-content-left"><a href="#">Make Thing Happen T-Shirts</a></h4>
                                        <div class="price_box text-left">
                                            <span class="text-black">$38.00</span>

                                        </div>
                                        <div class="add_to_cart">
                                            <a class="btn btn-primary add_to_cart_btn" href="/cartpage" data-tippy="Add To Cart"
                                                data-tippy-inertia="true" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img class="primary_img" style="border-radius: 0.5rem 0.5rem 0 0;"
                                                src="{{ asset('frontend/uthr/assets/img/product/product3.jpg') }}"
                                                alt="consectetur">
                                        </a>
                                        <div class="product_action">
                                            <ul>
                                                <li class="wishlist"><a href="#" data-tippy="Wishlist"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-heart icons"></i></a></li>

                                                <li class="quick_view"><a data-toggle="modal"
                                                        data-target="#modal_box" data-tippy="Quick View"
                                                        href="#" data-tippy-inertia="true"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-placement="left"><i
                                                            class="icon-size-fullscreen icons"></i></a></li>
                                                <li class="compare"><a data-tippy="Compare" href="#"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-refresh icons"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product_label">
                                            <span>-18%</span>
                                        </div>
                                    </div>
                                    <figcaption class="product_content text-center" style="border-radius: 0 0 0.5rem 0.5rem ;">
                                        <div class="product_ratting">
                                            <ul class="d-flex justify-content-left">
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><span>(2)</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name justify-content-left"><a href="#">Basic White Simple Sneaker</a></h4>
                                        <div class="price_box text-left">
                                            <span class="current_price">$43.00</span>
                                            <span class="old_price">$46.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a class="btn btn-primary add_to_cart_btn" href="/cartpage" data-tippy="Add To Cart"
                                                data-tippy-inertia="true" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img class="primary_img" style="border-radius: 0.5rem 0.5rem 0 0;"
                                                src="{{ asset('frontend/uthr/assets/img/product/product4.jpg') }}"
                                                alt="consectetur">
                                        </a>
                                        <div class="product_action">
                                            <ul>
                                                <li class="wishlist"><a href="#" data-tippy="Wishlist"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-heart icons"></i></a></li>

                                                <li class="quick_view"><a data-toggle="modal"
                                                        data-target="#modal_box" data-tippy="Quick View"
                                                        href="#" data-tippy-inertia="true"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-placement="left"><i
                                                            class="icon-size-fullscreen icons"></i></a></li>
                                                <li class="compare"><a data-tippy="Compare" href="#"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-refresh icons"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content text-center" style="border-radius: 0 0 0.5rem 0.5rem ;">
                                        <div class="product_ratting">
                                            <ul class="d-flex justify-content-left">
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><span>(8)</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name justify-content-left"><a href="#">Simple Rounded Sunglasses</a></h4>
                                        <div class="price_box text-left">
                                            <span class="text-black">$42.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a class="btn btn-primary add_to_cart_btn" href="/cartpage" data-tippy="Add To Cart"
                                                data-tippy-inertia="true" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img class="primary_img" style="border-radius: 0.5rem 0.5rem 0 0;"
                                                src="{{ asset('frontend/uthr/assets/img/product/men-2.png') }}" alt="consectetur">
                                        </a>
                                        <div class="product_action">
                                            <ul>
                                                <li class="wishlist"><a href="#" data-tippy="Wishlist"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-heart icons"></i></a></li>

                                                <li class="quick_view"><a data-toggle="modal"
                                                        data-target="#modal_box" data-tippy="Quick View"
                                                        href="#" data-tippy-inertia="true"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-placement="left"><i
                                                            class="icon-size-fullscreen icons"></i></a></li>
                                                <li class="compare"><a data-tippy="Compare" href="#"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-refresh icons"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content text-center" style="border-radius: 0 0 0.5rem 0.5rem ;">
                                        <div class="product_ratting">
                                            <ul class="d-flex justify-content-left">
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><span>(12)</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name justify-content-left"><a href="#">Basic Joggin Shorts</a></h4>
                                        <div class="price_box text-left">
                                            <span class="current_price">$26.00</span>
                                            <span class="old_price">$362.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a class="btn btn-primary add_to_cart_btn" href="/cartpage" data-tippy="Add To Cart"
                                                data-tippy-inertia="true" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img class="primary_img" style="border-radius: 0.5rem 0.5rem 0 0;"
                                                src="{{ asset('frontend/uthr/assets/img/product/product6.jpg ') }}"
                                                alt="consectetur">
                                        </a>
                                        <div class="product_action">
                                            <ul>
                                                <li class="wishlist"><a href="#" data-tippy="Wishlist"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-heart icons"></i></a></li>

                                                <li class="quick_view"><a data-toggle="modal"
                                                        data-target="#modal_box" data-tippy="Quick View"
                                                        href="#" data-tippy-inertia="true"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-placement="left"><i
                                                            class="icon-size-fullscreen icons"></i></a></li>
                                                <li class="compare"><a data-tippy="Compare" href="#"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-refresh icons"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product_label">
                                            <span>-20%</span>
                                        </div>
                                    </div>
                                    <figcaption class="product_content text-center" style="border-radius: 0 0 0.5rem 0.5rem ;">
                                        <div class="product_ratting">
                                            <ul class="d-flex justify-content-left">
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><span>(14)</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name justify-content-left"><a href="#">Simple Rounded Sunglasses</a></h4>
                                        <div class="price_box text-left">
                                            <span class="current_price">$35.00</span>
                                            <span class="old_price">$38.00</span>
                                        </div>
                                        <div class="add_to_cart text-center">
                                            <a class="btn btn-primary" href="/cartpage" data-tippy="Add To Cart"
                                                data-tippy-inertia="true" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    </div>
                </div>
                <!-- 3 -->
                {{-- <div class="row">
                    <div class="col-12">
                        <div class="top-header mb-30">
                            <h2>Similar items</h2>
                            <p>How about these? <span><a href="#">See more <i class="fa fa-long-arrow-right"
                                            aria-hidden="true"></i></a></span></p>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="product_container row">
                    <div class=" product_slick slick_slider_activation"
                        data-slick='{
                    "slidesToShow": 4,
                    "slidesToScroll": 1,
                    "arrows": true,
                    "dots": false,
                    "autoplay": false,
                    "speed": 300,
                    "infinite": true,
                    "responsive":[
                      {"breakpoint":992, "settings": { "slidesToShow": 3 } },
                      {"breakpoint":768, "settings": { "slidesToShow": 2 } },
                      {"breakpoint":300, "settings": { "slidesToShow": 1 } }
                     ]
                }'>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img class="primary_img"
                                                src="frontend/uthr/assets/img/product/product1.jpg" alt="consectetur">
                                        </a>
                                        <div class="product_action">
                                            <ul>
                                                <li class="wishlist"><a href="#" data-tippy="Wishlist"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-heart icons"></i></a></li>

                                                <li class="quick_view"><a data-toggle="modal"
                                                        data-target="#modal_box" data-tippy="Quick View"
                                                        href="#" data-tippy-inertia="true"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-placement="left"><i
                                                            class="icon-size-fullscreen icons"></i></a></li>
                                                <li class="compare"><a data-tippy="Compare" href="#"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-refresh icons"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content text-center">
                                        <div class="product_ratting">
                                            <ul class="d-flex justify-content-center">
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><span>(4)</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="#">Basic Joggin Shorts</a></h4>
                                        <div class="price_box">
                                            <span class="current_price">$26.00</span>
                                            <span class="old_price">$62.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a class="btn btn-primary" href="/cartpage" data-tippy="Add To Cart"
                                                data-tippy-inertia="true" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img class="primary_img"
                                                src="{{ asset('frontend/uthr/assets/img/product/product3.jpg') }}"
                                                alt="consectetur">
                                        </a>
                                        <div class="product_action">
                                            <ul>
                                                <li class="wishlist"><a href="#" data-tippy="Wishlist"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-heart icons"></i></a></li>

                                                <li class="quick_view"><a data-toggle="modal"
                                                        data-target="#modal_box" data-tippy="Quick View"
                                                        href="#" data-tippy-inertia="true"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-placement="left"><i
                                                            class="icon-size-fullscreen icons"></i></a></li>
                                                <li class="compare"><a data-tippy="Compare" href="#"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-refresh icons"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product_label">
                                            <span>-20%</span>
                                        </div>
                                    </div>
                                    <figcaption class="product_content text-center">
                                        <div class="product_ratting">
                                            <ul class="d-flex justify-content-center">
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><span>(6)</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="#">Make Thing Happen T-Shirts</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="text-black">$38.00</span>

                                        </div>
                                        <div class="add_to_cart">
                                            <a class="btn btn-primary" href="/cartpage" data-tippy="Add To Cart"
                                                data-tippy-inertia="true" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img class="primary_img"
                                                src="{{ asset('frontend/uthr/assets/img/product/product3.jpg') }}"
                                                alt="consectetur">
                                        </a>
                                        <div class="product_action">
                                            <ul>
                                                <li class="wishlist"><a href="#" data-tippy="Wishlist"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-heart icons"></i></a></li>

                                                <li class="quick_view"><a data-toggle="modal"
                                                        data-target="#modal_box" data-tippy="Quick View"
                                                        href="#" data-tippy-inertia="true"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-placement="left"><i
                                                            class="icon-size-fullscreen icons"></i></a></li>
                                                <li class="compare"><a data-tippy="Compare" href="#"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-refresh icons"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product_label">
                                            <span>-18%</span>
                                        </div>
                                    </div>
                                    <figcaption class="product_content text-center">
                                        <div class="product_ratting">
                                            <ul class="d-flex justify-content-center">
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><span>(2)</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="#">Basic White Simple Sneaker</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="current_price">$43.00</span>
                                            <span class="old_price">$46.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a class="btn btn-primary" href="/cartpage" data-tippy="Add To Cart"
                                                data-tippy-inertia="true" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img class="primary_img"
                                                src="{{ asset('frontend/uthr/assets/img/product/product4.jpg') }}"
                                                alt="consectetur">
                                        </a>
                                        <div class="product_action">
                                            <ul>
                                                <li class="wishlist"><a href="#" data-tippy="Wishlist"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-heart icons"></i></a></li>

                                                <li class="quick_view"><a data-toggle="modal"
                                                        data-target="#modal_box" data-tippy="Quick View"
                                                        href="#" data-tippy-inertia="true"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-placement="left"><i
                                                            class="icon-size-fullscreen icons"></i></a></li>
                                                <li class="compare"><a data-tippy="Compare" href="#"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-refresh icons"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content text-center">
                                        <div class="product_ratting">
                                            <ul class="d-flex justify-content-center">
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><span>(8)</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="#">Simple Rounded Sunglasses</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="text-black">$42.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a class="btn btn-primary" href="/cartpage" data-tippy="Add To Cart"
                                                data-tippy-inertia="true" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img class="primary_img"
                                                src="{{ asset('frontend/uthr/assets/img/product/product1.jpg') }}"
                                                alt="consectetur">
                                        </a>
                                        <div class="product_action">
                                            <ul>
                                                <li class="wishlist"><a href="#" data-tippy="Wishlist"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-heart icons"></i></a></li>

                                                <li class="quick_view"><a data-toggle="modal"
                                                        data-target="#modal_box" data-tippy="Quick View"
                                                        href="#" data-tippy-inertia="true"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-placement="left"><i
                                                            class="icon-size-fullscreen icons"></i></a></li>
                                                <li class="compare"><a data-tippy="Compare" href="#"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-refresh icons"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content text-center">
                                        <div class="product_ratting">
                                            <ul class="d-flex justify-content-center">
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><span>(12)</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="#">Basic Joggin Shorts</a></h4>
                                        <div class="price_box">
                                            <span class="current_price">$26.00</span>
                                            <span class="old_price">$362.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a class="btn btn-primary" href="/cartpage" data-tippy="Add To Cart"
                                                data-tippy-inertia="true" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="#">
                                            <img class="primary_img"
                                                src="{{ asset('frontend/uthr/assets/img/product/product2.jpg') }}"
                                                alt="consectetur">
                                        </a>
                                        <div class="product_action">
                                            <ul>
                                                <li class="wishlist"><a href="#" data-tippy="Wishlist"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-heart icons"></i></a></li>

                                                <li class="quick_view"><a data-toggle="modal"
                                                        data-target="#modal_box" data-tippy="Quick View"
                                                        href="#" data-tippy-inertia="true"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-placement="left"><i
                                                            class="icon-size-fullscreen icons"></i></a></li>
                                                <li class="compare"><a data-tippy="Compare" href="#"
                                                        data-tippy-inertia="true" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-placement="left"><i
                                                            class="icon-refresh icons"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product_label">
                                            <span>-20%</span>
                                        </div>
                                    </div>
                                    <figcaption class="product_content text-center">
                                        <div class="product_ratting">
                                            <ul class="d-flex justify-content-center">
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                <li><span>(14)</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="#">Simple Rounded Sunglasses</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="current_price">$35.00</span>
                                            <span class="old_price">$38.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a class="btn btn-primary" href="/cartpage" data-tippy="Add To Cart"
                                                data-tippy-inertia="true" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
        <!--product area end-->


        <!--newsletter section start-->
        <section class="newsletter_section">
            <div class="container">
                <div class="news">
                    <center>
                        <h3><b>Subscribe to our Newsletter</b></h3>
                        <p>Subscribe to our email and get updates right in your inbox</p>
                    </center>
                    <section class="home-newsletter">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="single">
                                        <div class="input-group">
                                            <input type="email" class="form-control"
                                                placeholder="Enter your email">
                                            <span class="input-group-btn">
                                                <button class="btn btn-theme" type="submit"><i
                                                        class='fa fa-send-o'></i>
                                                </button>
                                                <button class="btn btn-theme"
                                                    style="color: #DA627D; background-color: #F3F3F3;"
                                                    type="submit"><i class="fa fa-facebook"></i></i></button>

                                                <button class="btn btn-theme"
                                                    style="color: #DA627D; background-color: #F3F3F3;"
                                                    type="submit"><i class="fa fa-instagram"></i>
                                                    </i></button>

                                                <button class="btn btn-theme"
                                                    style="color: #DA627D; background-color: #F3F3F3;"
                                                    type="submit"><i class="fa fa-twitter"></i>
                                                    </i></button>

                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </section>
        <!--newsletter section end-->
    </div>

    <section>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col">
                        <ul>
                            <li><img src="frontend/uthr/assets/img/logo/shoppingbag-kXT.png" alt=""></li>
                            <li><a href="#">Complete your style with awesome clothes from us.</a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#">© 2024 All rights reserved.
                                </a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>help</h4>
                        <ul>
                            <li><a href="/contactus">privacy policy</a></li>
                            <li><a href="/aboutus">Shipping & Delivery</a></li>
                            <li><a href="/returnpolicy">Refund policy</a></li>
                            <li><a href="/termsandconditions">Track Your Order</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>store</h4>
                        <ul>
                            <li><a href="#">Mens fashion</a></li>
                            <li><a href="#">womens Fashion</a></li>
                            <li><a href="#">kids Fashion</a></li>
                            <li><a href="#">others</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>support</h4>
                        <ul>
                            <li><a href="#">Feedback</a></li>
                            <li><a href="#"> Contact us</a></li>
                            <li><a href="#">Download app</a></li>
                            <li><a href="#">Terms & condition</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </footer>

    </section>

    <!-- modal area start-->
    <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
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
                                        <img src="{{ asset('frontend/uthr/assets/img/product/big-product/product1.png') }}""
                                            alt="">
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
                                        <span class="old_price">$78.99</span>
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste
                                            laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam
                                            in quos qui, </p>
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
                                                <input min="1" max="100" step="2"
                                                    value="1" type="number">
                                                <button type="submit">add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal_social">
                                        <h2>Share this product</h2>
                                        <ul>
                                            <li class="facebook"><a href="#"><i
                                                        class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="#"><i
                                                        class="fa fa-twitter"></i></a></li>
                                            <li class="pinterest"><a href="#"><i
                                                        class="fa fa-pinterest"></i></a></li>
                                            <li class="google-plus"><a href="#"><i
                                                        class="fa fa-google-plus"></i></a></li>
                                            <li class="linkedin"><a href="#"><i
                                                        class="fa fa-linkedin"></i></a></li>
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
