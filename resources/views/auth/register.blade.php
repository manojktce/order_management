    @include('includes.header')

    <!--================login_part Area =================-->
    <section class="login_part padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Already a member?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="{{ route('login') }}" class="btn_3">Login</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome ! <br>
                                Enter Your Details</h3>
                            <form class="row contact_form" action="{{ route('register') }}" method="post" id="registerForm" autocomplete="off">
                                @csrf
                                
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="First Name">
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                </div>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                </span>
                                @enderror

                                <div class="col-md-6 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 form-group p_star">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="" placeholder="Password Confirmation">
                                </div>

                                <div class="col-md-4 form-group p_star">
                                    <input type="radio" id="Vendor" name="user_type" value="Vendor">
                                    <label for="Vendor">Vendor</label>
                                </div>
                                <div class="col-md-4 form-group p_star">
                                    <input type="radio" id="User" name="user_type" value="User">
                                    <label for="User">User</label>
                                </div>

                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="btn_3">
                                        Register
                                    </button>
                                    <a class="lost_pass" href="#">forgot password?</a>
                                </div>    
                                
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

    @include('includes.footer')
    @include('includes.login_register_script')