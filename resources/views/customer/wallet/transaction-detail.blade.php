@extends('customer.layout.master-page-support')
@section('title','My Wallet')
@section('page-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('customer.layout.customer-menus')
            </div>
            <div class="col-md-9" style="padding: 5px;">
                <div class="card2">
                    <div class="card-body2">
                        <div class="section customer-home-section pt-1">
                            <div class="wallet-card">
                                <h3>Transaction Detail</h3>
                                <div class="listed-detail mt-3">
                                    <div class="icon-wrapper">
                                        <div class="iconbox">
                                            <i class="ti-arrow-down" style="color: white"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-center mt-2">Payment Received</h3>
                                </div>
                                <!-- * Balance -->
                                <!-- Wallet Footer -->
                                <div class="recent-transaction">
                                    <ul class="listview simple-listview no-space mt-3">
                                        <li>
                                            <span>From</span>
                                            <strong>John Doe</strong>
                                        </li>
                                        <li>
                                            <span>Bank Name</span>
                                            <strong>Envato Bank</strong>
                                        </li>
                                        <li>
                                            <span>Date</span>
                                            <strong>Sep 25, 2020 10:45 AM</strong>
                                        </li>
                                        <li>
                                            <span>Amount</span>
                                            <strong>$ 50</strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
