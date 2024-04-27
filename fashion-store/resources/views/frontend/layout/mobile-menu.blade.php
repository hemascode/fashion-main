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

<div class="offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                    </div>
                    <div class="header_contact_info">
                        <ul class="d-flex">
                            <li class="text-white"> <i class="icons icon-phone"></i> <a href="tel:+05483716566">{{ $settings->contact_phone }}</a></li>
                            <li class="text-white"> <i class="icon-envelope-letter icons"></i> <a
                                    href="#">{{ $settings->contact_email }}</a></li>
                        </ul>
                    </div>
                    <div class="header_social d-flex">
                        <span>Follow us</span>
                        <ul class="d-flex">
                            <li><a href="#"><i class="icon-social-twitter icons"></i></a></li>
                            <li><a href="#"><i class="icon-social-facebook icons"></i></a></li>
                            <li><a href="#"><i class="icon-social-instagram icons"></i></a></li>

                        </ul>
                    </div>
                   
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children active">
                                <a href="#">Home</a>
                            </li>
                            @foreach ($categories as $category)
                            <li>
                                <a class="change-navbar-color" href="{{ url($category->name . '-dashboard') }}" onclick="toggleSubMenu(event, '{{ $category->name }}')">
                                    {{ ucfirst($category->name) }}
                                    <i class="icon icon-arrow-down"></i>
                                </a>
                                <ul class="sub_menu" style="display: none;">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function toggleSubMenu(event, categoryName) {
        event.preventDefault();
        var subMenus = document.querySelectorAll('.sub_menu');
        subMenus.forEach(function(subMenu) {
            if (subMenu.previousElementSibling.textContent.trim() !== categoryName) {
                subMenu.style.display = "none";
            }
        });
        var clickedSubMenu = event.target.nextElementSibling;
        clickedSubMenu.style.display = (clickedSubMenu.style.display === "none") ? "block" : "none";
    }
</script>