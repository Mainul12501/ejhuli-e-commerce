@extends('customer.layout.master-page-support')
@section('title',$productDetail->product_name)
@section('page-content')

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Product Detail</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{route('viewHome')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                    <li class="breadcrumb-item active">Product Detail {{$productDetail->product_image1}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BREADCRUMB -->
<style>
    .review-pictures ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .review-pictures ul li {
        position: absolute;
        text-align:center;
        display: inline-block;
        width: 100%;

    }
</style>

<div class="section">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                @if($productDetail)
                <div class="product-image vertical_gallery">
                    <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-vertical="true" data-vertical-swiping="true" data-slides-to-show="5" data-slides-to-scroll="1" data-infinite="false">
                        <div class="item">
                            <a href="#" class="product_gallery_item active" data-image="{{asset('storage/uploads/products/'.$productDetail->product_image)}}" data-zoom-image="{{asset('storage/uploads/products/'.$productDetail->product_image)}}">
                                <img src="{{asset('storage/uploads/products/'.$productDetail->product_image)}}" alt="{{$productDetail->product_image}}" />
                            </a>
                        </div>
                        @if($productDetail->product_image_1)
                        <div class="item">
                            <a href="#" class="product_gallery_item" data-image="{{asset('storage/uploads/products/'.$productDetail->product_image_1)}}" data-zoom-image="{{asset('storage/uploads/products/'.$productDetail->product_image_1)}}">
                                <img src="{{asset('storage/uploads/products/'.$productDetail->product_image_1)}}" alt="{{$productDetail->product_image_1}}" />
                            </a>
                        </div>
                        @endif
                        @if($productDetail->product_image_2)
                            <div class="item">
                                <a href="#" class="product_gallery_item" data-image="{{asset('storage/uploads/products/'.$productDetail->product_image_2)}}" data-zoom-image="{{asset('storage/uploads/products/'.$productDetail->product_image_2)}}">
                                    <img src="{{asset('storage/uploads/products/'.$productDetail->product_image_2)}}" alt="{{$productDetail->product_image_2}}" />
                                </a>
                            </div>
                        @endif

                    </div>
                    <div class="product_img_box">
                        <img id="product_img" src='{{asset('storage/uploads/products/'.$productDetail->product_image)}}' data-zoom-image="{{asset('storage/uploads/products/'.$productDetail->product_image)}}" alt="{{$productDetail->product_image}}" />
                        <a href="#" class="product_img_zoom" title="Zoom">
                            <span class="linearicons-zoom-in"></span>
                        </a>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="pr_detail">
                    <div class="product_description">
                        <h4 class="product_title"><a href="javaScript:void(0);">{{$productDetail->product_name}}</a></h4>
                        <div class="product_price">
                            @if($productDetail->sale_price)
                                <span class="price">৳{{$productDetail->sale_price}}</span>
                                <del>৳{{$productDetail->regular_price??''}}</del>
                            @else
                                <span class="price">৳{{$productDetail->regular_price}}</span>
                            @endif

                            @if($productDetail->sale_price) <br/>
                                <div class="on_sale">
                                    <span>{{ number_format(((($productDetail->regular_price - $productDetail->sale_price) / $productDetail->regular_price)*100),2)  }}% Off</span>
                                </div>
                            @endif
                        </div>
                        <div class="rating_wrap">
                            @if($productDetail->average_rating)
                            <div class="rating">
                                <div class="product_rate" style="width:{{$productDetail->average_rating/5*100}}%"></div>
                            </div>
                            <span class="rating_num">(0)</span>
                            @endif
                        </div><br/><br/>
                        <div class="clearfix"></div>
                        <div class="pr_desc">
                            <p>{!! $productDetail->description !!}</p>
                        </div>
{{--                        <div class="product_sort_info">--}}
{{--                            <ul>--}}
{{--                                <li><i class="linearicons-shield-check"></i> 1 Year AL Jazeera Brand Warranty</li>--}}
{{--                                <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>--}}
{{--                                <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                    </div>
                    <hr />
                    <div class="cart_extra">
                        <div class="cart-product-quantity @if(count(\Cart::getContent()) == 0) d-none @endif">
                            <div class="quantity">
                                <input type="button" onclick="decreaseQty({{$productDetail->id}});" value="-" class="minus">
                                <input type="text" name="cart_quantity" id="cart_quantity{{$productDetail->id}}" value="{{(@\Cart::get($productDetail->id)->quantity)?\Cart::get($productDetail->id)->quantity:1}}" title="Quantity" readonly class="qty" size="4">
                                <input type="button" onclick="increaseQty({{$productDetail->id}});" value="+" class="plus">
                            </div>
                        </div>
                        <div class="cart_btn">
                            <button class="btn btn-fill-out btn-addtocart" type="button"
                                    onclick="addToCart(this);" data-product-id="{{$productDetail->id}}" data-product-name="{{$productDetail->product_name}}" data-product-price="{{($productDetail->sale_price?$productDetail->sale_price:$productDetail->regular_price)}}" data-product-qty="1" data-product-image="{{$productDetail->product_image}}"><i class="icon-basket-loaded"></i>
                                Add to cart
                            </button>
                        </div>
                    </div>
                    <hr />
                    <ul class="product-meta">
                        <li>SKU: <a href="javaScript:void(0);">{{$productDetail->sku}}</a></li>
                        <li>Tags:
                            @if($productTagNames)
                                @foreach($productTagNames as $tag)
                                    <a href="javaScript:void(0);" rel="tag">{{$tag}}</a>,
                                @endforeach
                            @endif
                    </ul>
                    <div class="product_share">
                        <span>Share:</span>
                        <ul class="social_icons">
                            <li><a href="http://www.facebook.com/sharer.php?s=100&amp;p[title]={{$productDetail->product_name}}&amp;p[summary]={{$productDetail->description}}&amp;p[url]={{Request::fullUrl()}}&amp;p[images[0]={{$productDetail->product_image}}" onclick="window.open(this.href, 'facebookwindow','left=20,top=20,width=600,height=700,toolbar=0,resizable=1'); return false;"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="http://twitter.com/intent/tweet?url={{Request::fullUrl()}}&text={{$productDetail->product_name.$productDetail->description}}" onclick="window.open(this.href, 'twitterwindow','left=20,top=20,width=600,height=300,toolbar=0,resizable=1'); return false;"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="https://plus.google.com/share?url={{Request::fullUrl()}}" onclick="window.open(this.href, 'googlepluswindow','left=20,top=20,width=600,height=700,toolbar=0,resizable=1'); return false;"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="http://www.tumblr.com/share?s=&v=3&u={{Request::fullUrl()}}&u={{$productDetail->product_name.$productDetail->description}}" onclick="window.open(this.href, 'tumblrwindow','left=20,top=20,width=600,height=700,toolbar=0,resizable=1'); return false;"><i class="ion-social-tumblr"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="large_divider clearfix"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="tab-style3">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Additional info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews"  role="tab" aria-controls="Reviews" aria-selected="false">Reviews  <span class="rating_num">(0)</span></a>
                        </li>
                        <input type="hidden" name="productId" id="productId" value="{{$productDetail->id}}" />
                    </ul>
                    <div class="tab-content shop_info_tab">
                        <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                            <p>{!! $productDetail->description !!}</p>
                        </div>
                        <div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                            {!! $productDetail->additional_info??'No Additional Info Provided' !!}
                        </div>
                        <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                            <div class="comments">
                                @if($productDetail->average_rating)
                                <h5 class="product_tab_title">Ratings & Reviews <span class="total-rating">{{number_format($productDetail->average_rating,1,'.',',')}} <i class="linearicons-star"></i></span></h5>
                                <ul class="list_none comment_list mt-4" id="product-reviews">
                                    {{-- reviews loaded dynamically here on page load--}}
                                    <div class="d-flex justify-content-center" id="reviews-loader" style="color:#FF324D">
                                        <div class="spinner-red"></div>
                                    </div>
                                </ul>
                                @else
                                    <p>Reviews not available !</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="small_divider"></div>
                <div class="divider"></div>
                <div class="medium_divider"></div>
            </div>
        </div>

        <div class="section small_pt small_pb">
            <div class="custom-container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="heading_tab_header">
                                    <div class="heading_s2">
                                        <h4>Related Products</h4>
                                    </div>
                                    <div class="view_all">
                                        <a href="{{route('viewHome')}}" class="text_default"><i class="linearicons-power"></i> <span>View All</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div id="related-products">
                                    <div class="d-flex justify-content-center" id="reviews-loader" style="color:#FF324D">
                                        {{-- related products loaded dynamically here on page load--}}
                                        <div class="spinner-red"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="zoomReviewImageModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customer-js')
<script src="{{asset('assets/js/customer/products/get-reviews-and-ratings.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/customer/products/get-related-products.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/customer/cart/create-update-cart.js')}}" type="text/javascript"></script>
@endsection
