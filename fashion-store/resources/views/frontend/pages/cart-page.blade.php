@php
    if (auth()->check()) {
        $cartItems = \App\Models\Cart::where('user_id', auth()->user()->id)->get();
        $total = $cartItems->reduce(function ($carry, $item) {
            return $carry + $item->product->price * $item->qty;
        }, 0);
    }

@endphp


<!doctype html>
<html class="no-js" lang="en">

<head>
    @section('title')
    {{$settings->site_name}} | Cart-Page
    @endsection
    @include('frontend.layout.css')
    <style>
        .cart_product_update {
            display: none;
        }
    </style>
    <script>
        function updatePrice(quantityInput) {
            var itemId = quantityInput.getAttribute('data-cartitemid');
            var price = parseFloat(quantityInput.getAttribute('data-price'));
            var totalPrice = price * quantityInput.value;
            var formattedTotalPrice = totalPrice.toFixed(2);
            document.getElementById('productPrice' + itemId).textContent = formattedTotalPrice;
            var hiddenInputId = 'hiddenQuantity' + itemId;
            document.getElementById(hiddenInputId).value = quantityInput.value;
            var updateButton = document.getElementById('updateButton' + itemId);
            updateButton.style.display = 'inline';
        }
    </script>
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
        <div class="breadcrumbs_area breadcrumbs_other">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb_content">
                            <ul>
                                <li><a href="index.html">home</a></li>
                                <li><a href="#">cart</a></li>
                            </ul>
                            <h3>Shopping Cart</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->

        <!--shopping cart area start -->

        <div class="shopping_cart_area">
            <div class="container">
                <form action="#">
                    <div class="cart_page_inner mb-60">
                        <div class="row">
                            <div class="col-12">
                                <div class="cart_page_tabel">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>product </th>
                                                <th>information</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($cartItems->isEmpty())
                                                <tr>
                                                    <td colspan="5" class="text-center">No Item in Cart</td>
                                                </tr>
                                            @else
                                                @foreach ($cartItems as $cartItem)
                                                    <tr class="border-top">
                                                        <td>
                                                            <div class="cart_product_thumb">
                                                                <a href="#">
                                                                    <img src="{{ asset($cartItem->Product->thumb_image) }}"
                                                                        alt="">

                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="cart_product_text">
                                                                <h4>{{ $cartItem->product->name }}</h4>
                                                                <ul>
                                                                    <li><i class="ion-ios-arrow-right"></i> Color :
                                                                        <span>White</span>
                                                                    </li>
                                                                    <li><i class="ion-ios-arrow-right"></i> Size :
                                                                        <span>XL</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                        <td class="product_quantity">
                                                            <div class="cart_product_quantity">
                                                                <input class="quantityInput"
                                                                    data-price="{{ $cartItem->product->price }}"
                                                                    data-cartitemid="{{ $cartItem->id }}"
                                                                    min="1" max="100"
                                                                    value="{{ $cartItem->qty }}" type="number"
                                                                    onchange="updatePrice(this)">



                                                            </div>
                                                            {{-- <span
                                                                id="">{{ number_format($cartItem->product->price) }}</span> --}}

                                                        </td>
                                                        <td>
                                                            <div class="cart_product_price">
                                                                <span
                                                                    id="productPrice{{ $cartItem->id }}">{{ number_format($cartItem->product->price * $cartItem->qty, 2) }}</span>
                                                            </div>

                                                        </td>

                                                        <td>
                                                            <div class="cart_product_remove text-right">
                                                                <form
                                                                    action="{{ route('cart.remove', $cartItem->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn"><i
                                                                            class="ion-android-close"></i></button>
                                                                </form>
                                                            </div>

                                                            <div class="cart_product_update text-right"
                                                                id="updateButton{{ $cartItem->id }}">
                                                                <form
                                                                    action="{{ route('cart.update', $cartItem->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="quantity"
                                                                        id="hiddenQuantity{{ $cartItem->id }}">
                                                                    <button type="submit" class="btn"><i
                                                                            class="ion-arrow-up-a"></i></button>
                                                                </form>
                                                            </div>

                                                            
                                                        </td>


                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cart_page_button border-top d-flex justify-content-between">
                                    <div class="shopping_cart_btn">
                                        <a href="{{ route('clear.cart') }}" class="btn btn-primary border">clear
                                            shopping cart</a>

                                    </div>
                                    <div class="shopping_continue_btn">
                                        <a href="{{ route('frontend.pages.product-list') }}"
                                            class="btn btn-primary">Continue Shopping</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--coupon code area start-->
                    <div class="cart_page_bottom">
                        <div class="row">

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="shopping_coupon_calculate">
                                    <h3 class="border-bottom">Coupon Discount </h3>
                                    <b>Enter your coupon code if you have one.</b>
                                    <form id="coupon_form">
                                        <input  class="border"    type="text" placeholder="Coupon Code" name="coupon_code" value="{{session()->has('coupon') ? session()->get('coupon')['coupon_code'] : ''}}">
                                        <button class="btn btn-primary" type="submit">apply coupon</button>

                                    </form>
                                </div>
                                
                               
                                
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-8">
                                <div class="grand_totall_area">
                                    <div class="grand_totall_inner border-bottom">
                                        <div class="cart_subtotal d-flex justify-content-between">
                                            <p>sub total </p>
                                            <span>{{ number_format($total, 2) }}</span>
                                        </div>
                                        <div class="cart_grandtotal d-flex justify-content-between">
                                            <p>grand total</p>
                                            <span>{{ number_format($total, 2) }}</span>
                                        </div>
                                    </div>
                                    <div class="proceed_checkout_btn">
                                        <a class="btn btn-primary" href="{{ route('user.checkout') }}">Proceed to
                                            Checkout</a>
                                    </div>
                                    <a href="#">Checkout with Mutilple Adresses</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--coupon code area end-->
                </form>
            </div>
        </div>
        <!--shopping cart area end -->
    </div>

    <!--newsletter section start-->
    @include('frontend.home.section.newsletter')
    <!--newsletter section end-->


    @include('frontend.layout.footer')



    <!-- Include jQuery -->
    <script src="{{ asset('frontend/uthr/assets/js/vendor/jquery-3.4.1.min.js') }}"></script>
    <!-- Include other scripts -->
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

    <!-- Include your main JS file -->
    <script src="{{ asset('frontend/uthr/assets/js/main.js') }}"></script>

    <!-- Include Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>


</html>

@push('scripts')
<script>
     $('#coupon_form').on('submit', function(e){
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                method: 'GET',
                url: "{{ route('apply-coupon') }}",
                data: formData,
                success: function(data) {
                   if(data.status === 'error'){
                    toastr.error(data.message)
                   }else if (data.status === 'success'){
                    calculateCouponDescount()
                    toastr.success(data.message)
                   }
                },
                error: function(data) {
                    console.log(data);
                }
            })

        })

        // calculate discount amount
        function calculateCouponDescount(){
            $.ajax({
                method: 'GET',
                url: "{{ route('coupon-calculation') }}",
                success: function(data) {
                    if(data.status === 'success'){
                        $('#discount').text('{{$settings->currency_icon}}'+data.discount);
                        $('#cart_total').text('{{$settings->currency_icon}}'+data.cart_total);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            })
        }
</script>
@endpush
