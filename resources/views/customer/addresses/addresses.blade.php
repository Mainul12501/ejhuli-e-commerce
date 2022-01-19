@extends('customer.layout.master-page-support')
@section('title','Addresses')
@section('page-content')
    <style>

    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 hide-in-mobile">
                @include('customer.layout.customer-menus')
            </div>
            <div class="col-md-9" style="padding: 5px;">
                <div class="section customer-home-section pt-1">
                    <div class="simple-card">
                        <h3>Addresses</h3>
                        <div class="address" style="padding: 10px;">
                            <div class="addresses-list">
                                <a href="{{route('addAddress')}}" class="addresses-list__item addresses-list__item--new">
                                    <div class="addresses-list__plus"></div>
                                </a>
                                <div class="addresses-list__divider"></div>
                                @if($addresses)
                                    @foreach($addresses as $address)
                                        <div class="addresses-list__item card address-card">
                                            @if($address->default_address)
                                                <div class="address-card__badge">Default</div>
                                            @endif
                                            <div class="address-card__body">
                                                <div class="address-card__name">{{$address->full_name}}</div>
                                                <div class="address-card__row">
                                                   {{$address->street_address}}<br />
                                                    {{$address->state}}, {{$address->country_name}}<br />
                                                    {{$address->town_city}} - {{$address->postal_code}}
                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Phone Number</div>
                                                    <div class="address-card__row-content">{{$address->contact}}</div>
                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Email Address</div>
                                                    <div class="address-card__row-content">{{$address->email}}</div>
                                                </div>
                                                <div class="address-card__footer">
                                                    <a href="{{route('editAddress',['addressId'=>$address->id])}}">Edit</a>&nbsp;&nbsp;
                                                    <a href="javaScript:void(0);" onclick="removeAddress('{{$address->id}}');">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="addresses-list__divider"></div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customer-js')
    <script src="{{asset('assets/js/customer/address/create-update-address.js')}}" type="text/javascript"></script>
@endsection
