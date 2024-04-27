<!doctype html>
<html class="no-frontend/uthr/js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>modento </title>
    <meta name="description" content="Uthr Fashion eCommerce Bootstrap 5 Template is an innovative and modern e-commerce online store website template." />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="canonical" href="Replace_with_your_PAGE_URL" />

    <link rel="icon" href="{{ asset('img/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" href="{{ asset('img/favicon-192x192.png') }}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{ asset('img/favicon-180x180.png') }}" />
    <meta name="msapplication-TileImage" content="{{ asset('img/favicon-270x270.png') }}" />

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


    <script src="{{ asset('frontend/uthr/js/vendor/modernizr-3.7.1.min.frontend/uthr/js') }}"></script>

    <script type="application/ld+frontend/uthr/json">
        {
        "@context": "http://schema.org",
        "@type": "WebSite",
        "name": "Replace_with_your_site_title",
        "url": "Replace_with_your_site_URL"
        }
    </script>
</head>
<body>

<div class="main-login">
    <div class="signin-page">
        <div class="inner-login">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="left-login-content">
                        <div class=""><a class="items-center justify-center" href="index.html"><center><img src="{{ asset('img/logo/logo.png') }}" alt=""></center></a></div>
                        <div class="signin-content">
                            <h3>Welcome Back!</h3>
                            <p>To keep connected with us please login</p>
                            <a href="{{route('login')}}" class="btn btn-primary text-white">Login</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="register-form-outer">
                        <h3>Forget Password</h3>
                        <div class="other-logins">
                            <ul class="d-flex">
                                <li><a href="#"><i class="icon-social-instagram icons"></i></a></li>
                                <li><a href="#"><i class="icon-social-facebook icons"></i></a></li>
                                <li><a href="#"><i class="icon-social-twitter icons"></i></a></li>
                            </ul>
                        </div>
                        <div class="login-form">
                            <form action="{{ route('password.email') }}" method="POST">
                                @csrf
                                <div class="form-group search" style="margin-top: 20px;">
                                   <i class="fa fa-envelope"></i>
                                   <input type="email" class="form-control" id="mail"  name="email"  value="{{old('email')}}"  placeholder="Email">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('frontend/uthr/js/vendor/jquery-3.4.1.min.frontend/uthr/js') }}"></script>
<script src="{{ asset('frontend/uthr/js/vendor/popper.frontend/uthr/js') }}"></script>
<script src="{{ asset('frontend/uthr/js/vendor/bootstrap.min.frontend/uthr/js') }}"></script>
<script src="{{ asset('frontend/uthr/js/slick.min.frontend/uthr/js') }}"></script>
<script src="{{ asset('frontend/uthr/js/wow.min.frontend/uthr/js') }}"></script>
<script src="{{ asset('frontend/uthr/js/jquery.scrollup.min.frontend/uthr/js') }}"></script>
<script src="{{ asset('frontend/uthr/js/images-loaded.min.frontend/uthr/js') }}"></script>
<script src="{{ asset('frontend/uthr/js/isotope.pkgd.min.frontend/uthr/js') }}"></script>
<script src="{{ asset('frontend/uthr/js/jquery.nice-select.frontend/uthr/js') }}"></script>
<script src="{{ asset('frontend/uthr/js/tippy-bundle.umd.frontend/uthr/js') }}"></script>
<script src="{{ asset('frontend/uthr/js/jquery-ui.min.frontend/uthr/js') }}"></script>
<script src="{{ asset('frontend/uthr/js/jquery.instagramFeed.min.frontend/uthr/js') }}"></script>
<script src="{{ asset('frontend/uthr/js/jquery.magnific-popup.min.frontend/uthr/js') }}"></script>
<script src="{{ asset('frontend/uthr/js/mailchimp-ajax.frontend/uthr/js') }}"></script>
<script src="{{ asset('frontend/uthr/js/main.frontend/uthr/js') }}"></script>

</body>
</html>
