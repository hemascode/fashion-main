<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>modento </title>
    <meta name="description" content="Uthr Fashion eCommerce Bootstrap 5 Template is an innovative and modern e-commerce online store website template." />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="canonical" href="Replace_with_your_PAGE_URL" />

    <!-- Add site Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="32x32" />
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}" />
    <meta name="msapplication-TileImage" content="{{ asset('favicon.ico') }}" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/uthr/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/uthr/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/uthr/assets/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/uthr/assets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/uthr/assets/css/font.awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/uthr/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/uthr/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/uthr/assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/uthr/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/uthr/assets/css/style.css') }}">

    <!--modernizr min js here-->
    <script src="{{ asset('frontend/uthr/assets/js/vendor/modernizr-3.7.1.min.js') }}"></script>

</head>

<body>

<div class="main-login">
    <div class="signin-page">
        <div class="inner-login">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="left-login-content">
                        <div class=""><a class="items-center justify-center" href="/"><center><img src="{{ asset('frontend/uthr/assets/img/logo/logo3.png') }}" alt=""></center></a></div>
                        <div class="signin-content">
                            <h3>Welcome Back!</h3>
                            <p>To keep connected with us please login</p>
                            <a href="{{ route('login') }}" class="btn btn-primary text-white">Login</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="register-form-outer">
                        <h3>Create Account</h3>
                        <div class="other-logins">
                            <ul class="d-flex">
                                <li><a href="#"><i class="icon-social-instagram icons"></i></a></li>
                                <li><a href="#"><i class="icon-social-facebook icons"></i></a></li>
                                <li><a href="#"><i class="icon-social-twitter icons"></i></a></li>
                            </ul>
                        </div>
                        <p class="fs-14">Or use your email for registration</p>
                        <div class="login-form">
                            <form  method="POST"   action="{{route('register')}}">
                                 @csrf
                                <div class="form-group search">
                                   <i class="fa fa-user"></i>
                                   <input type="text" class="form-control" id="name" placeholder="Name"  value="{{old('name')}}" name="name" required autofocus autocomplete="name">
                                </div>
                                <div class="form-group search">
                                   <i class="fa fa-envelope"></i>
                                   <input type="email" class="form-control" id="email" placeholder="Email"  value="{{old('email')}}" name="email" required autocomplete="email">
                                </div>
                                <div class="form-group search">
                                   <i class="fa fa-lock"></i>
                                   <input type="password" class="form-control" id="password" placeholder="Password" name="password" required autocomplete="new-password">
                                </div>
                                <div class="form-group search">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                 </div>
                                <button type="submit" class="btn btn-primary">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
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
<script src="{{ asset('frontend/uthr/assets/js/main.js') }}"></script>

</body>

</html>
