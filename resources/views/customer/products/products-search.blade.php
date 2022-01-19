@extends('customer.layout.master-page-support')
@section('title',Str::title(Request::segment(2)))
@section('page-content')
    <!-- START SECTION SHOP -->
    <style>
        .sub-category-filter{
            display: none;
        }
    </style>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row align-items-center mb-4 pb-1">
                        <div class="col-12">
                            <div class="product_header">
                                <div class="product_header_right">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="custom_select">
                                                <select id="default_filter" class="form-control form-control-sm">
                                                    <option value="">Default Filter</option>
                                                    <option value="popularity">Sort by popularity</option>
                                                    <option value="new">Sort by newness</option>
                                                    <option value="price_asc">Sort by price: low to high</option>
                                                    <option value="price_desc">Sort by price: high to low</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="custom_select">
                                                <select id="rating_filter" class="form-control form-control-sm">
                                                    <option value="">Rating Filter</option>
                                                    <option value="5">5 Star or below 5 star</option>
                                                    <option value="4">4 Star or below 4 star</option>
                                                    <option value="3">3 Star of below 3 star</option>
                                                    <option value="2">2 Star of below 2 star</option>
                                                    <option value="1">1 Star</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row shop_container" id="searched_products">

                    </div>
                </div>

                <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            <h5 class="widget_title">Categories</h5>
                            @if(count($categoriesWithSubCategories))
                                @foreach($categoriesWithSubCategories as $category)
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"> <a href="{{route('viewProductByCatSubCat',[$category['category_slug']])}}">{{$category['category']}}</a>
                                            @if(count($category['sub_categories']))
                                                <span style="float: right">
                                                 <a href="javaScript:void(0)"  onclick="showSubCategory(this);"> <i class="linearicons-chevron-down"></i></a>
                                                </span>
                                            @endif
                                        </li>
                                        @if($category['sub_categories'])
                                            <ul class="list-group sub-category-filter" style="margin-left: 20px;">
                                                @foreach($category['sub_categories'] as $subcategory)
                                                    <li class="list-group-item"> <a href="{{route('viewProductByCatSubCat',[$category['category_slug'],$subcategory['slug']])}}">{{$subcategory['subcategory']}}</a> </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </ul>
                                @endforeach
                            @endif
                        </div>
                        <div class="widget">
                            <div class="shop_banner">
                                <div class="banner_img overlay_bg_20">
                                    <img src="{{asset('web/assets/images/shop_banner3.jpg')}}" alt="sidebar_banner_img">
                                </div>
                                <div class="shop_bn_content2 text_white">
                                    <h5 class="text-uppercase shop_subtitle">New Collection</h5>
                                    <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
                                    <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->
    <input type="hidden" id="search_query_string" value="{{ Request::segment(3) }}" />
@endsection
@section('customer-js')
<script src="{{asset('assets/js/customer/products/product-search.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/customer/cart/create-update-cart.js')}}" type="text/javascript"></script>
@endsection

