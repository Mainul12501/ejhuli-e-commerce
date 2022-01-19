@extends('admin.layout.master')
@section('title','Dashboard')
@section('page-content')
<div class="row tile_count">
   {{-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <a href="employeelist">
                <div class="icon"><i class="fa fa-users" style="font-size: 40px;"></i></div>
                <div class="count" style="color: #1ABB9C">1</div>
                <h3>Total Employees</h3>
            </a>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <a href="salaryreport">
                <div class="icon"><i class="fa fa-rupee" style="font-size: 40px;"></i></div>
                <div class="count" style="color: #1ABB9C">1</div>
                <h3>Total Salary Report</h3>
            </a>
        </div>
    </div>--}}
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-users"></i> Total Users</span>
        <div class="count">{{$totalCustomers}}</div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o"></i> Total Categories</span>
        <div class="count">{{$totalCategories}}</div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-pagelines"></i> Total Products</span>
        <div class="count green">{{$totalProducts}}</div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-first-order"></i> Total Orders</span>
        <div class="count">{{$totalOrders}}</div>
    </div>
</div>
<div class="row tile_count">
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-envelope-o"></i> Total Newsletters</span>
        <div class="count">{{$totalNewsletters}}</div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-dollar"></i> Total Collections</span>
        <div class="count">৳ {{$totalCollection}}</div>
    </div>
    {{--<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-users"></i> Total Wallets Amount</span>
        <div class="count">৳ {{$totalWalletsAmount}}</div>
    </div>--}}
</div>
@endsection
