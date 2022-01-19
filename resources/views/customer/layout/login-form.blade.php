<div class="account-login-failed" style="display: none">Login  failed !</div>
<form id="customerLoginForm">
    <div class="form-group">
        <input type="text" name="mobile" id="mobile" class="form-control" maxlength="12" placeholder="Your Mobile">
    </div>
    <div class="form-group">
        <div class="input-group">
            <input type="password"  name="password" id="password" class="form-control" placeholder="Password">
            <div class="input-group-prepend">
            <span class="input-group-text">
                <i onclick="togglePassword('password');" class="fa fa-eye-slash" style="cursor:pointer"></i>
            </span>
            </div>
        </div>
    </div>
    <div class="login_footer form-group">
        <div class="chek-form">
            <div class="custome-checkbox">
                <input class="form-check-input" type="checkbox" name="checkbox" id="rememberMeCheckBox">
                <label class="form-check-label d-none" for="rememberMeCheckBox"><span>Remember me</span></label>
            </div>
        </div>
        <a href="{{route('resetPassword')}}">Forgot password?</a>
    </div>
    <div class="form-group">
        <button type="submit" name="loginBtn" id="loginBtn" class="btn btn-fill-out btn-block" >Log in <span id="loginBtnLoader" class="spinner-border spinner-border-sm d-none" role="status"><span class="sr-only"> </span></span></button>
    </div>
</form>
<div class="different_login d-none">
    <span> or</span>
</div>
<ul class="btn-login list_none text-center d-none">
    <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
    <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
</ul>
<div class="form-note text-center">Don't Have an Account? <a href="{{route('viewSignup')}}">Sign up now</a></div>
<input type="hidden" name="redirection" id="redirection" value="{{Request::segment(1)}}">

