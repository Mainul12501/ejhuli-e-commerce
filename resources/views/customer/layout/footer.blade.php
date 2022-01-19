
@include('customer.layout.newsletter')
<!-- START FOOTER -->
<footer class="bg_gray">
    @if(Request::segment(1) !="customer")
        <div class="footer_top small_pt pb_20">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="widget">
                            <div class="footer_logo">
                                @if(!$websiteLogo)
                                    <img src="{{asset('assets/images/logo_default_dark.png')}}" alt="logo" />
                                @else
                                    <img src="{{asset('storage/uploads/media/'. $websiteLogo)}}" alt="logo" />
                                @endif
                            </div>
{{--                            logo {{ $websiteLogo }}--}}
                            <p class="mb-3">Grow Stronger In Faith.</p>
                            <ul class="contact_info">
                                <li>
                                    <i class="ti-location-pin"></i>
                                    <p>@lang('common.company_address')</p>
                                </li>
                                <li>
                                    <i class="ti-email"></i>
                                    <a href="mailto:info@sitename.com">{{ config('constants.footer_email') }}</a>
                                </li>
                                <li>
                                    <i class="ti-mobile"></i>
                                    <p>{{ config('constants.footer_mobile') }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="widget">
                            <h6 class="widget_title">Useful Links</h6>
                            <ul class="widget_links">
                                <li><a href="{{route('viewAboutUs')}}">About Us</a></li>
                                <li><a href="{{route('viewContactUs')}}">Contact</a></li>
                                <li><a href="{{route('viewTrackOrder')}}">Order Tracking</a></li>
                                <li><a href="{{route('viewTermsAndConditions')}}">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="widget">
                            <h6 class="widget_title">Our Sellers Success Story</h6>
                            <ul class="widget_instafeed instafeed_col4">
                                @if($stories)
                                    @foreach($stories as $story)
                                        <li>
                                            <a href="{{ $story->link }}" target="_blank">
                                                <img src="{{ asset('storage/uploads/media/'. $story->image)}}" alt="{{ $story->title }}">
                                                <span class="insta_icon"><i class="ti-link"></i></span>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="middle_footer">
        <div class="custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="shopping_info">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="flaticon-shipped"></i>
                                    </div>
                                    <div class="icon_box_content">
                                        <h5>Fast Delivery</h5>
                                        <p>We are ensuring fast and safe delivery of your products, your happiness is our main priority.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="icon-badge"></i>
                                    </div>
                                    <div class="icon_box_content">
                                        <h5>Ensuring Best Quality</h5>
                                        <p>We don't compromise on product quality. Just order and get the best qualityful product from us.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="flaticon-support"></i>
                                    </div>
                                    <div class="icon_box_content">
                                        <h5>27/4 Online Support</h5>
                                        <p>Are you facing any issues? No worries, our support team is always ready to assist you anytime.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer border-top-tran">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-4">
                    <p class="mb-lg-0 text-center" style="margin-top: 10px;">© 2021 All Rights Developed by <a href="https://thevirtualbd.com/" target="_blank" class="theme-color">{{ config('constants.designed_and_developed_by') }}</a> </p>
                </div>
                <div class="col-lg-4 order-lg-first">
                    <div class="widget mb-lg-0">
                        <ul class="social_icons text-center text-lg-left">
                            <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#" class="sc_google"><i class="ion-social-whatsapp"></i></a></li>
                            <li><a href="#" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ul class="footer_payment text-center text-lg-right">
                        <div class="row">
                            <div class="col-12">
                                <li><a href="#"><img src="{{asset('web/assets/images/pm-icon/bkash.png')}}" alt="visa"></a></li>
                                <li><a href="#"><img src="{{asset('web/assets/images/pm-icon/nagad.png')}}" alt="visa"></a></li>
                                <li><a href="#"><img src="{{asset('web/assets/images/pm-icon/Untitled-1-03.png')}}" alt="visa"></a></li>
                                <li><a href="#"><img src="{{asset('web/assets/images/pm-icon/Untitled-1-04.png')}}" alt="visa"></a></li>
                                <li><a href="#"><img src="{{asset('web/assets/images/pm-icon/Untitled-1-05.png')}}" alt="visa"></a></li>
                                <li><a href="#"><img src="{{asset('web/assets/images/pm-icon/Untitled-1-06.png')}}" alt="visa"></a></li>
                                <li><a href="#"><img src="{{asset('web/assets/images/pm-icon/Untitled-1-07.png')}}" alt="visa"></a></li>
                            </div>
                            <div class="col-12 pt-2">
                                <li><a href="#"><img src="{{asset('web/assets/images/pm-icon/Untitled-1-08.png')}}" alt="visa"></a></li>
                                <li><a href="#"><img src="{{asset('web/assets/images/pm-icon/Untitled-1-09.png')}}" alt="visa"></a></li>
                                <li><a href="#"><img src="{{asset('web/assets/images/pm-icon/Untitled-1-10.png')}}" alt="visa"></a></li>
                                <li><a href="#"><img src="{{asset('web/assets/images/pm-icon/Untitled-1-11.png')}}" alt="visa"></a></li>
                                <li><a href="#"><img src="{{asset('web/assets/images/pm-icon/Untitled-1-12.png')}}" alt="visa"></a></li>
                                <li><a href="#"><img src="{{asset('web/assets/images/pm-icon/Untitled-1-13.png')}}" alt="visa"></a></li>
                                <li><a href="#"><img src="{{asset('web/assets/images/pm-icon/Untitled-1-14.png')}}" alt="visa"></a></li>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->
