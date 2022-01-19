@extends('customer.layout.master-page-support')
@section('title','Newsletter')
@section('page-content')
    <style>
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-switch-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .toggle-switch-slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .toggle-switch-slider {
            background-color: #FF324D;
        }

        input:focus + .toggle-switch-slider {
            box-shadow: 0 0 1px #FF324D;
        }

        input:checked + .toggle-switch-slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .toggle-switch-slider.round {
            border-radius: 34px;
        }

        .toggle-switch-slider.round:before {
            border-radius: 50%;
        }
    </style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 hide-in-mobile">
            @include('customer.layout.customer-menus')
        </div>
        <div class="col-md-9" style="padding: 5px;">
            <div class="section customer-home-section pt-1">
                <div class="wallet-card">
                    <h3>Newsletter Setting</h3>
                    <div class="row mt-5">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="toggle-switch">
                                    <input type="checkbox" id="newsletterCheckbox" onchange="changeNewsletterSetting(this);" @if($newsletterSetting == 1) checked @endif>
                                    <span class="toggle-switch-slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customer-js')
<script src="{{asset('assets/js/customer/newsletter/newsletter.js')}}" type="text/javascript"></script>
@endsection
