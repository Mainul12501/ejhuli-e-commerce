
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="theme-color" content="#FF324D">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $seoData->meta_description }}">
    <meta name="keywords" content="{{ $seoData->meta_keywords }}">

    <!-- SITE TITLE -->
    <title>@yield('title')</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/website_favicon.png')}}">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{asset('web/assets/css/animate.css')}}">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="{{asset('web/assets/bootstrap/css/bootstrap.min.css')}}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('web/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/simple-line-icons.css')}}">
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="{{asset('web/assets/owlcarousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/owlcarousel/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/owlcarousel/css/owl.theme.default.min.css')}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('web/assets/css/magnific-popup.css')}}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{asset('web/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/slick-theme.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('web/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/custom-style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/customer/home-page-style.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/responsive.css')}}">
    <link href="{{asset('assets/css/busy.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('web/assets/toaster/toastr.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('web/assets/autocomplete/jquery.autocomplete.css')}}" rel="stylesheet"/>
    <script>
        let BASE_URL = {!! json_encode(url('/')) !!}+"/";
        console.log(BASE_URL);
    </script>
</head>
<body>

<!-- LOADER -->
{{--<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>--}}
<!-- END LOADER -->

<!-- Home Popup Section -->
@include('customer.layout.modal-popup')
<!-- End Screen Load Popup Section -->

<!-- START HEADER -->
<header class="header_wrap">
    <div class="top-header light_skin bg_dark d-none d-md-block">
        <div class="custom-container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="header_topbar_info">
                        <div class="header_offer">
                            <span>{{$offer_text}}</span>
                        </div>
                        <div class="download_wrap">
                            <span class="mr-3">Download App</span>
                            <ul class="icon_list text-center text-lg-left">
                                <li><a href="#"><i class="fab fa-android"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                       {{-- <div class="lng_dropdown">
                            <select name="countries" class="custome_select">
                                <option value='en' data-image="{{asset('web/assets/images/eng.png')}}" data-title="English">English</option>
                            </select>
                        </div>
                        <div class="ml-3">
                            <select name="countries" class="custome_select">
                                <option value='USD' data-title="BDT">BDT</option>
                            </select>
                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle-header dark_skin">
        <div class="custom-container">
            <div class="nav_block">
                <a class="navbar-brand" href="{{route('viewHome')}}">
                    @if(!$websiteLogo)
                        <img class="logo_dark" src="{{asset('assets/images/logo_default_dark.png')}}" alt="logo" />
                    @else
                        <img class="logo_dark" src="{{asset('storage/uploads/media/'. $websiteLogo)}}" alt="logo" />
                    @endif
                </a>
                @include('customer.layout.product-search-form')
                <div class="contact_phone contact_support">
                    <i class="linearicons-phone-wave" style="font-size: 18px;"></i>
                    <span>{{ config('constants.footer_mobile') }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase border-top border-bottom">
        <div class="custom-container">
            <div class="row">
                @include('customer.layout.category-sidebar')
                @include('customer.layout.main-menu')
            </div>
        </div>
    </div>
</header>
<!-- END HEADER -->

<!-- START SECTION BANNER -->
<div class="mt-4 staggered-animation-wrap">
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-7 offset-lg-3">
                <div class="banner_section shop_el_slider">
                    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
                        <div class="carousel-inner">
                            @if(!count($banners))
                            <div class="carousel-item active background_bg" data-img-src="{{asset('assets/images/banner-default.jpg')}}">
                                <div class="banner_slide_content banner_content_inner">
                                    <div class="col-lg-7 col-10">
                                        <div class="banner_content3 overflow-hidden">
                                            <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">Get up to 50% off Today Only!</h5>
                                            <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s">Dual Camera 20MP</h2>
                                            <h4 class="staggered-animation mb-4 product-price d-none" data-animation="slideInLeft" data-animation-delay="1.2s"><span class="price">$45.00</span><del>$55.25</del></h4>
                                            <a class="btn btn-fill-out btn-radius staggered-animation text-uppercase" href="#" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @elseif($banners)
                                @foreach($banners as $banner)
                                <div class="carousel-item @if ($loop->first)active @endif background_bg" data-img-src="{{asset('storage/uploads/media/'.$banner->file)}}">
                                    <div class="banner_slide_content banner_content_inner">
                                        <div class="col-lg-8 col-10">
                                            <div class="banner_content3 overflow-hidden">
                                                <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">{{$banner->data['sub_title']}}</h5>
                                                <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s">{{$banner->data['title']}}</h2>
                                                <h4 class="staggered-animation mb-3 mb-sm-4 product-price d-none" data-animation="slideInLeft" data-animation-delay="1.2s"><span class="price">$45.00</span><del>$55.25</del></h4>
                                                <a class="btn btn-fill-out btn-radius staggered-animation text-uppercase" href="{{$banner->data['button_link']}}" target="_blank" data-animation="slideInLeft" data-animation-delay="1.5s">{{$banner->data['button_label']}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <ol class="carousel-indicators indicators_style3">
                            @if(!count($banners))
                            <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                            @elseif($banners)
                                @foreach($banners as $key => $banner)
                                     <li data-target="#carouselExampleControls" data-slide-to="{{$key+1}}"></li>
                                @endforeach
                            @endif
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 d-lg-block">
                <div class="shop_banner2 el_banner1">
                    <a href="#" class="hover_effect1">
                        <div class="el_img">
                            <img src="{{ asset('storage/uploads/media/'. $other_images[0]) }}" alt="shop_banner_img6">
                        </div>
                    </a>
                </div>
                <div class="shop_banner2 el_banner2">
                    <a href="#" class="hover_effect1">
                        {{--<div class="el_title text_white">
                            <h6>MAC Computer</h6>
                            <span><u>Shop Now</u></span>
                        </div>--}}
                        <div class="el_img">
                            <img src="{{ asset('storage/uploads/media/'. $other_images[1]) }}" alt="shop_banner_img7">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BANNER -->

<!-- END MAIN CONTENT -->
<div class="main_content">
    @yield('page-content')
</div>
@include('customer.layout.footer')

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
<!-- Latest jQuery -->
<script src="{{asset('web/assets/js/jquery-1.12.4.min.js')}}"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="{{asset('assets/js/customer/newsletter/newsletter.js')}}"></script>
@yield('customer-js')

<script src="{{asset('web/assets/toaster/toastr.min.js')}}"></script>
@if(Auth::check())
    <script src="https://js.pusher.com/4.2/pusher.min.js"></script>
    <script src="{{asset('assets/js/notifications.js')}}"></script>
@endif
<script type="text/javascript" src="{{asset('assets/js/common.js')}}"></script>
<!-- popper min js -->
<script src="{{asset('web/assets/js/popper.min.js')}}"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="{{asset('web/assets/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- owl-carousel min js  -->
<script src="{{asset('web/assets/owlcarousel/js/owl.carousel.min.js')}}"></script>
<!-- magnific-popup min js  -->
<script src="{{asset('web/assets/js/magnific-popup.min.js')}}"></script>
<!-- waypoints min js  -->
<script src="{{asset('web/assets/js/waypoints.min.js')}}"></script>
<!-- parallax js  -->
<script src="{{asset('web/assets/js/parallax.js')}}"></script>
<!-- countdown js  -->
<script src="{{asset('web/assets/js/jquery.countdown.min.js')}}"></script>
<!-- fit video  -->
<script src="{{asset('web/assets/js/Hoverparallax.min.js')}}"></script>
<!-- jquery.countTo js  -->
<script src="{{asset('web/assets/js/jquery.countTo.js')}}"></script>
<!-- imagesloaded js -->
<script src="{{asset('web/assets/js/imagesloaded.pkgd.min.js')}}"></script>
<!-- isotope min js -->
<script src="{{asset('web/assets/js/isotope.min.js')}}"></script>
<!-- jquery.appear js  -->
<script src="{{asset('web/assets/js/jquery.appear.js')}}"></script>
<!-- jquery.parallax-scroll js -->
<script src="{{asset('web/assets/js/jquery.parallax-scroll.js')}}"></script>
<!-- jquery.dd.min js -->
<script src="{{asset('web/assets/js/jquery.dd.min.js')}}"></script>
<!-- slick js -->
<script src="{{asset('web/assets/js/slick.min.js')}}"></script>
<!-- elevatezoom js -->
<script src="{{asset('web/assets/js/jquery.elevatezoom.js')}}"></script>
<!-- scripts js -->
<script src="{{asset('web/assets/js/scripts.js')}}"></script>


</body>
</html>
