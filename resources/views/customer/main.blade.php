@extends('customer.layout.master-home')
@section('title', config('app.name'))
@section('page-content')
    <!-- START SECTION SHOP -->
    <div class="section small_pt pb-0">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-3 d-none d-xl-block">
                    <div class="sale-banner">
                        <a class="hover_effect1" href="#">
                            <img src="{{ asset('storage/uploads/media/'. $other_images[2]) }}" alt="shop_banner_img6">
                        </a>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="heading_tab_header">
                                <div class="heading_s2">
                                    <h4>Exclusive Products</h4>
                                </div>
                                <div class="tab-style2">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tabmenubar" aria-expanded="false">
                                        <span class="ion-android-menu"></span>
                                    </button>
                                    <ul class="nav nav-tabs justify-content-center justify-content-md-end" id="tabmenubar" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" onclick="getFeaturedAndNewArrivalProducts(1);" id="arrival-tab" data-toggle="tab" href="#arrival" role="tab" aria-controls="arrival" aria-selected="true">New Arrival</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="featured-tab" onclick="getFeaturedAndNewArrivalProducts(2);" data-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="false">Featured</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tab_slider">
                                <div class="tab-pane fade show active" id="arrival" role="tabpanel" aria-labelledby="arrival-tab">
                                   <img class="img-center" src="{{asset('assets/images/loaders/flower.gif')}}"/>
                                     {{-- products loaded dynamically here on page load--}}
                                </div>
                                <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                                    <img class="img-center" src="{{asset('assets/images/loaders/flower.gif')}}"/>
                                    {{-- products loaded dynamically here on page load--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

    <!-- START SECTION BANNER -->
    <div class="section pb_20 small_pt">
        <div class="custom-container">
            <div class="row">
                <div class="col-md-4">
                    <div class="sale-banner mb-3 mb-md-4">
                        <a class="hover_effect1" href="#">
                            <img src="{{asset('storage/uploads/media/'. $other_images[3])}}" alt="shop_banner_img7">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sale-banner mb-3 mb-md-4">
                        <a class="hover_effect1" href="#">
                            <img src="{{ asset('storage/uploads/media/'. $other_images[4]) }}" alt="shop_banner_img8">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sale-banner mb-3 mb-md-4">
                        <a class="hover_effect1" href="#">
                            <img src="{{ asset('storage/uploads/media/'. $other_images[5]) }}" alt="shop_banner_img9">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BANNER -->

    <!-- START SECTION CATEGORIES -->
    <div class="section small_pb small_pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="heading_s4 text-center">
                        <h2>Top Categories</h2>
                    </div>
                    <p class="text-center leads d-none">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim Nullam nunc varius.</p>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-12">
                    <div class="cat_slider cat_style1 mt-4 mt-md-0 carousel_slider owl-carousel owl-theme nav_style5" data-loop="true" data-dots="false" data-nav="true" data-margin="30" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "576":{"items": "4"}, "768":{"items": "5"}, "991":{"items": "6"}, "1199":{"items": "7"}}'>
                        @if($topCategories)
                            @foreach($topCategories as $topCategory)
                            <div class="item">
                                <div class="categories_box">
                                    <a href="{{route('viewProductByCatSubCat',[$topCategory->category_slug,''])}}">
                                        <i class="{{$topCategory->icon_class}}"></i>
                                    {{--<img src="{{asset('storage/uploads/categories/'.$topCategory->picture)}}" alt="{{$topCategory->picture}}"/>--}}
                                        <span>{{$topCategory->category}}</span>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION CATEGORIES -->


    <div id="loaded_products">
		<div class="d-flex justify-content-center"  style="color:#FF324D">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
    </div>

    <!-- START SECTION CLIENT LOGO -->
    <div class="section pt-0 small_pb">
        <div class="custom-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading_tab_header">
                        <div class="heading_s2">
                            <h4>Our Brands</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="client_logo carousel_slider owl-carousel owl-theme nav_style3" data-dots="false" data-nav="true" data-margin="30" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "5"}, "1199":{"items": "6"}}'>
                        @if($brands)
                            @foreach($brands as $brand)
                                <div class="item">
{{--                                   <a href="#">--}}
                                       <div class="cl_logo">
                                           <img src="{{asset('storage/uploads/brands/'.$brand->logo)}}" alt="{{$brand->logo}}"/>
                                       </div>
{{--                                   </a>--}}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customer-js')
    <script>
        $(document).ready(function(){
            showPopupModal();
        });

        function showPopupModal(){
            if (!!getCookie("show_popup")){
                $("#onload-popup").modal("hide");
            }else{
                $("#onload-popup").modal("show");
                setCookie("show_popup", "true", 10);
            }
        }

        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        }
        function setCookie(name,value,minutes) {
            if (minutes) {
                var date = new Date();
                date.setTime(date.getTime()+(minutes*60*1000));
                var expires = "; expires="+date.toGMTString();
            } else {
                var expires = "";
            }
            document.cookie = name+"="+value+expires+"; path=/";
        }

    </script>
    <script src="{{asset('assets/js/customer/home/get-home-page-products.js')}}"></script>
    <script src="{{asset('assets/js/customer/cart/create-update-cart.js')}}"></script>

@endsection
