@extends('customer.layout.master-page-support')
@section('title','Track Order')
@section('page-content')
<div class="section">
    <div class="container">
        <div class="field_form">
            <p class="text-center leads theme-color"><strong>Track Your Order From Anywhere</strong></p>
            <form id="track-order-form">
               <div class="row justify-content-center">
                   <div class="col">
                       <div class="input-group input-group">
                           <input type="text" name="order_no" id="order_no" placeholder="Order No." class="form-control" required="required">
                           <span class="input-group-btn"><button type="submit" id="trackOrderBtn" class="btn btn-fill-out"> <i class="fa fa-search"></i> Track</button></span>
                       </div>
                       <div id="order_noError" class="error"></div>
                   </div>
               </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div id="tracking-data">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customer-js')
<script src="{{asset('assets/js/customer/order-tracking/order-tracking.js')}}" type="text/javascript"></script>
@endsection
