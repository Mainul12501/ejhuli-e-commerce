@extends('customer.layout.master-page-support')
@section('title','My Reviews')
@section('page-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 hide-in-mobile">
                @include('customer.layout.customer-menus')
            </div>
            <div class="col-md-9" style="padding: 5px;">
                <div class="section customer-home-section pt-1">
                    <div class="wallet-card">
                        <h3>My Reviews</h3>
                        <div class="my-orders">
                            @if(count($reviews))
                                <ul class="listview image-listview flush">
                                    @foreach($reviews as $review)
                                        <li>
                                            <a href="{{route('getProductDetail',[$review->product_slug])}}" target="_blank" class="item">
                                                <div class="icon-box bg-primary">
                                                    <i class="ti-star" style="color: white"></i>
                                                </div>
                                                <div class="in">
                                                    <div>
                                                        <div class="title">ORDER ID # {{$review->order_no}}</div>
                                                        <div class="text-secondary mb-05">{{$review->product_name}}</div>
                                                        <div class="text-small mb-05">{{$review->remark}}</div>
                                                        <div class="text-xsmall">Date # {{$review->review_date}}</div>
                                                        <div class="rating_wrap">
                                                            <div class="rating">
                                                                <div class="product_rate" style="width:{{ $review->rating/5*100  }}%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p>No reviews yet</p>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @include('customer.layout.pagination', ['paginator' => $reviews])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
