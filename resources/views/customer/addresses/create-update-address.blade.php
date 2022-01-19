@extends('customer.layout.master-page-support')
@section('title','Profile')
@section('page-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 hide-in-mobile">
                @include('customer.layout.customer-menus')
            </div>
            <div class="col-md-9" style="padding: 5px;">
                <div class="card2">
                    <div class="card-body2">
                        <div class="section customer-home-section pt-1">
                            <div class="wallet-card">
                                <h3>Address</h3>
                                <form id="addressCreateUpdateForm" style="padding: 10px;">
                                   <div class="row">
                                       <div class="col-md-4">
                                           <div class="form-group">
                                               <label for="first_name">First Name</label>
                                               <input type="text" name="first_name" id="first_name"  class="form-control" value="{{$address->first_name??''}}"  placeholder="Enter First Name">
                                               <div id="first_nameError" class="error"></div>
                                           </div>
                                       </div>
                                       <div class="col-md-4">
                                           <div class="form-group">
                                               <label for="last_name">Last Name</label>
                                               <input type="text" name="last_name" id="last_name"  class="form-control" value="{{$address->last_name??''}}"   placeholder="Enter Last Name">
                                               <div id="last_nameError" class="error"></div>
                                           </div>
                                       </div>
                                   </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email_address">Email Address</label>
                                                <input type="text" name="email_address" id="email_address"  class="form-control" value="{{$address->email??''}}"  placeholder="Enter Email Address">
                                                <div id="email_addressError" class="error"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="address_contact">Contact</label>
                                                <input type="text" name="address_contact"  id="address_contact" class="form-control" value="{{$address->contact??''}}"  placeholder="Address Contact">
                                                <div id="address_contactError" class="error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        {{--<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <select name="country" id="country"  class="form-control">
                                                    <option value="">Select</option>
                                                    @if($countries)
                                                        @foreach($countries as $country)
                                                            <option value="{{$country->id}}" {{ ($address->country??'') == $country->id?'selected':''}} >{{$country->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <div id="countryError" class="error"></div>
                                            </div>
                                        </div>--}}
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="address_type">Address Type</label>
                                                <select name="address_type" id="address_type"  class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="1" {{ ($address->address_type??'') == 1?'selected':''}}>Home</option>
                                                    <option value="2" {{ ($address->address_type??'')  == 2?'selected':''}}>Office</option>
                                                    <option value="3" {{ ($address->address_type??'')  == 3?'selected':''}}>Other</option>
                                                </select>
                                                <div id="address_typeError" class="error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="street_address">Street Address</label>
                                                <input type="text" name="street_address" id="street_address"  class="form-control" value="{{$address->street_address??''}}"   placeholder="Enter Street Addess">
                                                <div id="street_addressError" class="error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <input type="text" name="state" id="state"  class="form-control"  value="{{$address->state??''}}"  placeholder="Enter State">
                                                <div id="stateError" class="error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="city_town">Town/City</label>
                                                <input type="text" name="city_town" id="city_town"  class="form-control"  value="{{$address->town_city??''}}"  placeholder="Enter City or Town">
                                                <div id="city_townError" class="error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="postal_zip_code">Postcode / ZIP</label>
                                                <input type="text" name="postal_zip_code" id="postal_zip_code"  class="form-control"  value="{{$address->postal_code??''}}"   placeholder="Enter Postcode Code">
                                                <div id="postal_zip_codeError" class="error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="hidden" name="edit_id" id="edit_id" value="{{$address->id??''}}"/>
                                            <button type="submit" id="saveAddressBtn" class="btn btn-fill-out btn-block">Save Address</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customer-js')
    <script src="{{asset('assets/js/customer/address/create-update-address.js')}}" type="text/javascript"></script>
@endsection
