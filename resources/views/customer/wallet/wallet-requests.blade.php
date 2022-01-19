@extends('customer.layout.master-page-support')
@section('title','Wallet Requests')
@section('page-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 hide-in-mobile">
                @include('customer.layout.customer-menus')
            </div>
            <div class="col-md-9" style="padding: 5px;">
                <div class="section customer-home-section pt-1">
                    <div class="wallet-card">
                        <h3>Wallet Request</h3>
                        <div class="wallet-requests-container">
                            <div class="spinner-red pt-5" id="spinner-loader" ></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customer-js')
<script type="text/javascript" src="{{asset('assets/js/customer/wallet/wallet-requests.js')}}"></script>
<script>
    let page = "{{$currentPage}}";
    getMyWalletRequests();
</script>
@endsection
