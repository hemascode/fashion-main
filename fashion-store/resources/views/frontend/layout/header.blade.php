@php

    $includedCategories = ['new', 'men', 'women', 'season', 'kids'];
    $categories = \App\Models\Category::whereIn('name', $includedCategories)->get();
    $otherCategories = \App\Models\Category::whereNotIn('name', $includedCategories)->get();
    if (auth()->check()) {
        $cartItems = \App\Models\Cart::where('user_id', auth()->user()->id)->count();
    } else {
        $cartItems = 0;
    }

@endphp



<header class="header_section header_transparent">
    <div class="header_top">
        <div class="container-fluid position_center">
            <div class="row">
                <div class="col-12">
                    <div class="header_top_inner d-flex justify-content-between align-items-center">
                        <div class="header_contact_info">
                            <ul class="d-flex">
                                <li class="text-white header_icons_flex"> <img src="{{asset('frontend/uthr/assets/img/headerIcons/phone.png')}}" alt=""> <a
                                        href="tel:+910000000000">{{ $settings->contact_phone }}</a></li>
                                <li class="text-white header_icons_flex"> <img src="{{asset('frontend/uthr/assets/img/headerIcons/mail.png')}}" alt=""><a href="#"
                                       >{{ $settings->contact_email }}</a></li>
                            </ul>
                        </div>
                        <div class="free_shipping_text">
                            <p class="text-white">Follow Us and get a chance to win 80% off</p>
                        </div>
                        <div class="header_top_sidebar d-flex align-items-center">
                            <div class="header_social d-flex">
                                <span>Follow us :</span>
                                <ul class="d-flex ms-2">
                                    <li><a href="#"><img src="{{asset('frontend/uthr/assets/img/headerIcons/instagram.png')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{asset('frontend/uthr/assets/img/headerIcons/facebook.png')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{asset('frontend/uthr/assets/img/headerIcons/twitter.png')}}" alt=""></a></li>

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="header_container justify-content-between align-items-center position-relative">
                        <div class="canvas_open">
                            <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                        </div>
                        <div class="header_logo">
                            <a class="items-center justify-center" href="{{ url('/') }}">
                                <center><img src="{{ asset($logoSetting->logo) }}" alt=""></center>
                            </a>

                        </div>

                        <div class="header_account">
                            <ul class="d-flex align-items-center gap-[5px]">

                                <li class="account_link">
                                    @guest
                                        <!-- If user is a guest (not authenticated) -->
                                        <a href="{{ route('login') }}"> <img src="{{asset('frontend/uthr/assets/img/headerIcons/profile.png')}}" alt="" style="margin-right: 5px;margin-bottom:2px ">
                                            Login</a> / <a href="">Register</a>
                                    @else
                                        <!-- If user is authenticated -->
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf <!-- CSRF Protection -->
                                        </form>
                                    @endguest
                                </li>





                                <li class="header_search"><a href="#"> <img src="{{asset('frontend/uthr/assets/img/headerIcons/search.png')}}" alt=""></a>
                                </li>

                                <li class="shopping_cart">
                                    <a href="#"> <img src="{{asset('frontend/uthr/assets/img/headerIcons/cart.png')}}" alt=""></a>
                                    {{-- <span class="item_count">{{ $cartItems }}</span> --}}
                                </li>

                                <li>
                                    <a href="#"> <img src="{{asset('frontend/uthr/assets/img/headerIcons/wishlist.png')}}" alt=""></a>
                                    {{-- <span class="item_count">2</span> --}}
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page search box -->
    <div class="page_search_box">
        <div class="search_close">
            <i class="ion-close-round"></i>
        </div>
        <form class="border-bottom" action="#">
            <input class="border-0" placeholder="Search products..." type="text">
            <button type="submit"><span class="icon-magnifier icons"></span></button>
        </form>
    </div>
    {{-- <div class="main_menu d-none d-lg-block">
        <nav>
            <ul class="d-flex">
                <li><a class="active" href="/">Home</a> </li>

                @foreach ($categories as $category)

                <li>
                    <a href="{{ url($category->name . '-dashboard') }}">{{ ucfirst($category->name) }}<i class="icon icon-arrow-down"></i></a>
                    <ul class="sub_menu">
                        @php
                            $subCategories = $category->subcategories()->where('status', 1)->take(7)->get();
                        @endphp
                        @foreach ($subCategories as $subCategory)
                            <li>
                                <a href="{{ route('products.index', ['subcategorySlug' => $subCategory->slug]) }}">{{ $subCategory->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
            
                
                {{-- Displaying Other Categories --}}
                {{-- @php
                    $otherCategories = \App\Models\Category::whereNotIn('name', $includedCategories)->get();
                @endphp
                @if ($otherCategories->isNotEmpty())

                <li>
                    <a href="#">Others<i class="icon icon-arrow-down"></i></a>
                    <ul class="sub_menu">
                        @foreach ($otherCategories as $category)
                            <li>
                                <a href="{{ route('products.index', ['subCategory' => $subCategory->slug]) }}">{{($category->name) }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li> --}}
                
                {{-- @endif --}}

                {{-- <li><a href="#">sale</a></li> --}}

            {{-- </ul>
        </nav>

    </div> --}} 
    <div class="main_menu d-none d-lg-block">
        <nav>
            <ul class="d-flex">
                <li><a class="active" href="/">Home</a></li>
    
                @foreach ($categories as $category)
                <li>
                    <a class="change-navbar-color" href="{{ url($category->name . '-dashboard') }}">{{ ucfirst($category->name) }}<i class="icon icon-arrow-down"></i></a>
                    <ul class="sub_menu">
                        @php
                        $subCategories = $category->subcategories()->where('status', 1)->take(7)->get();
                        @endphp
                        @foreach ($subCategories as $subCategory)
                        <li>
                            <a href="{{ route('products.index', ['subcategorySlug' => $subCategory->slug]) }}">{{ $subCategory->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
    
                @php
                $otherCategories = \App\Models\Category::whereNotIn('name', $includedCategories)->get();
                @endphp
                @if ($otherCategories->isNotEmpty())
                <li>
                    <a href="/product-list">Others<i class="icon icon-arrow-down"></i></a>
                    <ul class="sub_menu">
                        @foreach ($otherCategories as $category)
                        <li>
                            <a href="{{ route('products.index', ['subCategory' => $subCategory->slug]) }}">{{($category->name) }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
    </div>

    <style>
       .active {
            /* Add your active styles here */
            color:black; /* Change color as needed */  
        }
        </style>

<script>
    // JavaScript to add/remove active class based on current URL
    document.addEventListener("DOMContentLoaded", function() {
        const currentLocation = window.location.href;
        const navLinks = document.querySelectorAll('.main_menu a');

        navLinks.forEach(link => {
            if (link.href === currentLocation) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    });
</script>

</header>
