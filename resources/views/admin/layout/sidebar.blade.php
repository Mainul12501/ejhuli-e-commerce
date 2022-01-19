<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title">
                <img src="{{ asset('assets/images/admin_website_logo.png') }}"  >
                {{-- <span>ShopZEN</span>--}}
            </a>
        </div>
        <div class="clearfix"></div>

        <div class="profile clearfix">
            <div class="profile_pic">
                @if($adminUser->profile)
                    <img src="{{asset('assets/images/profile/'.$adminUser->profile)}}" alt="..." class="img-circle profile_img">
                @else
                    <img src="{{asset('assets/images/avtar/avtar.png')}}" alt="..." class="img-circle profile_img">
                @endif
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{$adminUser->name}}</h2>
            </div>
        </div>
        <br />
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a href="{{route('viewAdminDashboard')}}"><i class="fa fa-home"></i>Dashboard</a></li>
                    <li><a href="{{route('viewCategory')}}"><i class="fa fa-bars"></i>Categories</a></li>
                    <li><a href="{{route('viewSubCategory')}}"><i class="fa fa-bars"></i>Sub categories</a></li>
                    <li><a href="{{route('viewBrands')}}"><i class="fa fa-bars"></i>Brands</a></li>
                    <li><a href="{{route('viewTags')}}"><i class="fa fa-bars"></i>Tags</a></li>
                    <li><a><i class="fa fa-pagelines"></i> Products <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('viewProducts')}}">Products</a></li>
                            <li><a href="{{route('addProducts')}}">Add Products</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-certificate"></i> Discounts <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('viewDiscounts')}}">Discounts List</a></li>
                        </ul>
                    </li>
                    {{--<li><a href="{{route('viewWalletRequests')}}"><i class="fa fa-dollar"></i>Wallet Requests</a></li>--}}
                    <li><a href="{{route('viewCustomers')}}"><i class="fa fa-users"></i>Customers</a></li>
                    <li><a href="{{route('viewQueries')}}"><i class="fa fa-comment"></i>Queries</a></li>
                    <li><a href="{{route('viewOrders')}}"><i class="fa fa-first-order"></i>Orders</a></li>
                    <li>
                        <a><i class="fa fa-envelope-o"></i> Newsletters <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('viewSubscribers') }}">Subscribers</a></li>
                            <li><a href="{{ route('ViewComposeNewsletter') }}">Compose</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-image"></i> Media <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('viewBannerImages')}}">Banner Images</a></li>
                            <li><a href="{{route('viewOtherMedia')}}">Other Images</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('viewSetting')}}"><i class="fa fa-wrench"></i>Settings</a></li>
                    <li><a href="{{route('viewPopup')}}"><i class="fa fa-check"></i>Poup</a></li>
                    <li><a href="{{route('viewStories')}}"><i class="fa fa-bars"></i>Story</a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar-footer hidden-small" style="display:none;">
            <a data-toggle="tooltip" data-placement="top" title="Settings" href="setting">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="dashboard/logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</div>
