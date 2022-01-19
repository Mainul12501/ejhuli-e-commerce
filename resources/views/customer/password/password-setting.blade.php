@extends('customer.layout.master-page-support')
@section('title','Profile')
@section('page-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 hide-in-mobile">
                @include('customer.layout.customer-menus')
            </div>
            <div class="col-md-9" style="padding: 5px;">
                <div class="section customer-home-section pt-1">
                    <div class="wallet-card">
                        <h3>Password</h3>
                        <form id="passwordUpdateForm" style="padding: 10px;">
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <div class="input-group mb-3 pass_show">
                                    <input type="password" name="current_password" id="current_password"  class="form-control" placeholder="Enter Current Password">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i onclick="togglePassword('current_password');" class="fa fa-eye-slash" style="cursor:pointer"></i>
                                        </span>
                                    </div>
                                </div>
                                <div id="current_passwordError" class="error"></div>
                            </div>
                           <div class="d-none" id="createPasswordFields">
                               <div class="form-group">
                                   <label for="new_password">New Password</label>
                                   <div class="input-group">
                                       <input type="password" name="new_password" id="new_password"  class="form-control"  placeholder="Enter New Password">
                                       <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i onclick="togglePassword('new_password');" class="fa fa-eye-slash" style="cursor:pointer"></i>
                                        </span>
                                       </div>
                                   </div>
                                   <div id="new_passwordError" class="error"></div>
                               </div>
                              <div class="form-group">
                                  <label for="confirm_password">Confirm Password</label>
                                  <div class="input-group">
                                      <input type="password" name="confirm_password" id="confirm_password"  class="form-control"   placeholder="Enter Confirm Password">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i onclick="togglePassword('confirm_password');" class="fa fa-eye-slash" style="cursor:pointer"></i>
                                        </span>
                                      </div>
                                  </div>
                                  <div id="confirm_passwordError" class="error"></div>
                              </div>
                           </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="hidden" name="currentPasswordStatus" id="currentPasswordStatus" value="verify"/>
                                    <button type="submit" id="updatePasswordBtn" class="btn btn-fill-out btn-block">Next</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customer-js')
    <script src="{{asset('assets/js/customer/password/password-update.js')}}" type="text/javascript"></script>
@endsection
