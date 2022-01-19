
<style>
    .scrollable-menu {
        height: auto;
        max-height: 200px;
        overflow-x: hidden;
    }
     #customerMenu  a:hover {
         color: #FF324D;
     }
</style>
<div class="col-lg-9 col-md-8 col-sm-6 col-9">
    <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler side_navbar_toggler" type="button" data-toggle="collapse" data-target="#navbarSidetoggle" aria-expanded="false">
            <span class="ion-android-menu"></span>
        </button>
        <div class="pr_search_icon">
            <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
        </div>
        <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
            <ul class="navbar-nav">
                <li><a class="nav-link nav_item" href="{{url('/')}}">Home</a></li>
                @if($navigationMenus)
                    @foreach($navigationMenus as $categories)
                        @if($categories['sub_categories'])
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">{{$categories['category']}}</a>
                            <div class="dropdown-menu dropdown-reverse">
                                @foreach($categories['sub_categories'] as $subcategory)
                                <ul>
                                    <li><a class="dropdown-item nav-link nav_item" href="{{route('viewProductByCatSubCat',[$categories['category_slug'],$subcategory['slug']])}}">{{$subcategory['subcategory']}}</a></li>
                                </ul>
                                @endforeach
                            </div>
                        </li>
                        @else
                            <li><a class="nav-link nav_item" href="{{route('viewProductByCatSubCat',[$categories['category_slug'],''])}}">{{$categories['category']}}</a></li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>

        <ul class="navbar-nav attr-nav align-items-center">
            @if(Auth::check())
                <li class="nav-item dropdown ml-2">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="linearicons-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu dropdown-menu-left" id="customerMenu">
                        <a  href="{{route('viewCustomerDashboard')}}" class="dropdown-item">My Account</a>
                        <a  href="{{route('viewCustomerProfile')}}" class="dropdown-item d-none mobile-menu">Profile</a>
                        {{--<a  href="{{route('viewAnalytics')}}" class="dropdown-item d-none mobile-menu">Analytics</a>
                           <a  href="{{route('viewMyWalletRequests')}}" class="dropdown-item d-none mobile-menu">Wallet Requests</a>--}}
                        <a  href="{{route('viewNotifications')}}" class="dropdown-item d-none mobile-menu">Notifications</a>
                        <a  href="{{route('viewPasswordSetting')}}" class="dropdown-item d-none mobile-menu">Password Setting</a>
                        <a  href="{{route('viewCustomerAddresses')}}" class="dropdown-item d-none mobile-menu">Addresses</a>
                        <a  href="{{route('viewCustomerOrders')}}" class="dropdown-item d-none mobile-menu">Orders</a>
                        <a  href="{{route('viewReviews')}}" class="dropdown-item d-none mobile-menu">My Reviews</a>
                        <a  href="{{route('viewNewsLetterSetting')}}" class="dropdown-item d-none mobile-menu">My Newsletter</a>
                        <a  href="{{route('customerLogout')}}" class="dropdown-item">Logout</a>
                    </div>
                </li>
              {{--  <li class="nav-item dropdown ml-2">
                    <a class="nav-link" data-toggle="dropdown" href="#notificationDrop">
                        <i class="ti-bell"></i><span class="wishlist_count notifications-count">0</span>
                    </a>
                </li>
                <div id="notificationDrop" class="dropdown-menu dropdown-menu-lg dropdown-menu-right notification-dropdown">

                </div>--}}

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
                        <i class="ti-bell"></i><span class="wishlist_count notifications-count">0</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="notification-container" style="left: inherit; right: -27px;">
                        <span class="dropdown-item dropdown-header nft-count"><span class="notifications-count">0</span> Notifications</span>
                        <div class="notification-dropdown">

                        </div>
                    </div>
                </li>
            @else
                <li><a href="{{route('viewLogin')}}" class="nav-link text-capitalize btn" style="background-color: #FF334D; padding: 10px;" id="colorWhiteOnHover">
                        sign in/sign up
                    </a></li>
                <style>
                    #colorWhiteOnHover:hover {
                        color: white!important;
                    }
                </style>
{{--                <li><a href="{{route('viewLogin')}}" class="nav-link"><i class="linearicons-user"></i></a></li>--}}
            @endif

            <li class="dropdown cart_dropdown">
              <a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-bag2"></i><span class="cart_count">0</span><span class="amount"><span class="currency_symbol">৳</span><span class="cart_total_price">0</span></span></a>
                @include('customer.layout.cart-dropdown')
            </li>
        </ul>
    </nav>
</div>
