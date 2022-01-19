@extends('customer.layout.master-page-support')
@section('title','Dashboard')
@section('page-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 hide-in-mobile">
                @include('customer.layout.customer-menus')
            </div>
            <div class="col-md-9" style="padding: 5px;">
                <div class="section customer-home-section pt-1">
                    <div class="wallet-card">
                        @if(!$accountVerified)
                        <div class="alert alert-label-message alert-dismissible fade show" role="alert">
                            <strong>Attention!</strong> You haven't verified your account, please check your email.
                            <a href="{{ route('resend-mail', ['id' => \Illuminate\Support\Facades\Session::get('customer_id_for_verify')]) }}" id="resendVerifyEmail" class="text-capitalize btn btn-info" style="padding: 0px 10px; ">Resend mail</a>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <h3>Dashboard</h3>
                            <div class="row">
                                {{--<div class="col">
                                    <div class="balance">
                                        <div class="left">
                                            <span class="title">Wallet Balance</span>
                                            <h1 class="total" id="currentBalance">৳ {{$wallet_balance}}</h1>
                                        </div>
                                    </div>
                                </div>--}}
                                <div class="col">
                                    <div class="balance">
                                        <div class="left">
                                            <span class="title">Total Spent</span>
                                            <h1 class="total" id="currentBalance">৳ {{$total_spent}}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="balance">
                                        <div class="left">
                                            <span class="title">Order Placed</span>
                                            <h1 class="total" id="currentBalance">{{$total_orders}}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="balance">
                                        <div class="left">
                                            <span class="title">Order Canceled</span>
                                            <h1 class="total" id="currentBalance">{{ $canceled_orders }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="balance">
                                <div class="left">
                                    <span class="title">Total Wallet Balance</span>
                                    <h1 class="total" id="currentBalance">৳ {{number_format($currentBalance,2)}}</h1>
                                </div>
                                <div class="right">
                                    <a href="javaScript:void(0);" onclick="showAddWalletModal();" class="button">
                                        <i class="linearicons-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="spinner-red" id="spinner-loader"></div>
                             <div class="wallet-requests-container">

                            </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addWalletModal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form id="addMoneyWalletForm">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body text-center pt-0">
                        <img src="{{asset('web/assets/images/add-money-in-wallet-logo.png')}}" width="100" alt="logo" class="logo-small">
                        <div class="form-group mt-4">
                            <select name="payment_method" id="payment_method" class="form-control form-control-lg">
                                <option value="">Select</option>
                                <option value="Bkash">Bkash</option>
                                <option value="Rocket">Rocket</option>
                                <option value="Nagad">Nagad</option>
                            </select>
                            <div id="payment_methodError" class="error text-left"></div>
                        </div>
                        <div class="form-group mt-4">
                            <input type="text" name="mobile_no" id="mobile_no" placeholder="Mobile No."  maxlength="10" class="form-control form-control-lg">
                            <div id="mobile_noError" class="error text-left"></div>
                        </div>
                        <div class="form-group mt-4">
                            <input type="text" name="txn_id" id="txn_id" placeholder="Transaction Id"  class="form-control form-control-lg">
                            <div id="txn_idError" class="error text-left"></div>
                        </div>
                        <div class="form-group mt-4">
                            <input type="text" name="wallet_amount" id="wallet_amount" placeholder="Enter amount"  class="form-control form-control-lg">
                            <div id="wallet_amountError" class="error text-left"></div>
                        </div>
                        <p class="text-left">You are requesting this payment. After request it needs to be approved by admin</p>
                        <a href="{{ route('learnToRequestPayment') }}" target="_blank" class="float-left theme-color">How can you request for Payment? Learn More. </a>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="submit" id="addMoneyInWalletBtn" class="btn btn-fill-out btn-block">Request
                            <span id="addMoneyInWalletBtnLoader" class="spinner-border spinner-border-sm d-none" role="status"><span class="sr-only"> </span></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('customer-js')

<script type="text/javascript" src="{{asset('assets/js/customer/wallet/wallet.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/customer/wallet/wallet-requests.js')}}"></script>
<script>
    let page = "{{$currentPage}}";
getTopWalletRequests();
</script>


    @if(\Illuminate\Support\Facades\Session::has('show-success-alert'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.all.min.js" integrity="sha512-kW/Di7T8diljfKY9/VU2ybQZSQrbClTiUuk13fK/TIvlEB1XqEdhlUp9D+BHGYuEoS9ZQTd3D8fr9iE74LvCkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            Swal.fire('Success...', 'A verification magic link has sent to your email.', 'success');
        </script>
    @endif

@endsection
