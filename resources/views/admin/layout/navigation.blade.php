<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        @if($adminUser->profile_pic)
                            <img src="{{asset('storage/uploads/profile/admin/'.$adminUser->profile_pic)}}" id="admin-profile-img" alt="{{$adminUser->profile_pic}}">
                        @else
                            <img src="{{asset('assets/images/avtar/avtar.png')}}" alt="...">
                        @endif
                       <span id="admin-name"> {{$adminUser->name}}</span> <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="{{route('viewAdminProfile')}}"> Profile</a></li>
                        <li><a href="{{route('adminLogout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>
                <li role="presentation" class="dropdown" style="display:none;">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <div class="text-center">
                                <a href="messages">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
