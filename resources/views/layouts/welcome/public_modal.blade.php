<button type="button" class="close_lft" data-dismiss="modal">&times;</button>
<form id="login"  method="POST" action="{{ url('signin') }}">

    <div class="login-block">
        <h1>Login</h1>
        {{ csrf_field() }}
        <input type="text" class="form-control"  id="username" name="email" placeholder="Email" required autofocus>
        <input type="password" class="form-control" name="password" placeholder="Password" id="password" required>
        <input type="checkbox" id="checkbox3" class="css-checkbox" name="rememberme"/>
        <label for="checkbox3"   class="css-label lite-red-check">Remember Me</label>

        <input  type="submit" value="SIGN IN" style="position: relative;">

        <br>
        <div class="small_loader" style="text-align:center;display:none"><img src="http://demo.truebus.co.in/assets/images/loader-small.gif"></div>
        <div class="login_res" style="text-align:center;"></div>
        <br>
        <div class="forgot"><a data-dismiss="modal" href="#myModalf"data-toggle="modal" data-target="#myModalf">Forgot Password?</a></div>
        <div class="sign_in"><a  data-dismiss="modal" href="#myModal" data-toggle="modal" data-target="#myModal">Sign Up</a></div>
    </div>
</form>
</div>
</div>

<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<button type="button" class="close_lft" data-dismiss="modal">&times;</button>
<form id="signup" method="POST" action="{{ url('/signup') }}">
    <div class="login-block">
        <h1>Sign Up</h1>
        {{ csrf_field() }}
        <div class="form-line">
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}"  autocomplete="first_name" placeholder="First Name..." required autofocus>

            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-line">
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"  autocomplete="last_name" placeholder="Last Name..." required >

            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-line">
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="Email Address..." required >

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-line">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password" required>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-line">
            <input type="password" class="form-control" name="password_confirmation" minlength="6" placeholder="Confirm Password" required>
        </div>
        <div class="form-line">
            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone" placeholder="Phone..." required >

            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-line">
            <input type="text" class="form-control @error('nid') is-invalid @enderror" name="nid" value="{{ old('nid') }}"  autocomplete="nid" placeholder="NID number..." required >

            @error('nid')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <input  type="submit" value="Sign up" style="position: relative;">
        <br>
        <div class="small_loader" style="text-align:center;display:none"><img src="http://demo.truebus.co.in/assets/images/loader-small.gif"></div>
        <div class="signup_res" style="text-align:center;"></div>
        <br>
        <div class="account"><a data-dismiss="modal" href="#myModals"data-toggle="modal" data-target="#myModals">Already have an account?</a></div>
        <div class="sign_in"><a data-dismiss="modal" href="#myModals"data-toggle="modal" data-target="#myModals">Sign In</a></div>
    </div>
</form>

</div>
</div>



<div class="modal fade" id="myModalf" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<button type="button" class="close_lft" data-dismiss="modal">&times;</button>
<form id="forgot" data-parsley-validate="">
    <div class="login-block">
        <h1>Forgot Password</h1>
        <input type="email" name="email" placeholder="Email" class="username"  data-parsley-required="true"/>

        <!--    <span class="terms_tb">By signing up, you agree to our <a class="cond_tb" href="#">Terms and Conditions.</a></span> <br>
        <br> -->

        <input  type="button" value="RESET" style="position: relative;" onclick="Forgot()">

        <br>
        <div class="small_loader" style="text-align:center;display:none"><img src="http://demo.truebus.co.in/assets/images/loader-small.gif"></div>
        <div class="forgot_res" style="text-align:center;"></div>
        <br>
        <div class="account"><a href="#">Already have an account?</a></div>
        <div class="sign_in"><a data-dismiss="modal" href="#myModals"data-toggle="modal" data-target="#myModals">Sign In</a></div>
    </div>
</form>
</div>
</div>
