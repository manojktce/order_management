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
                            <form class="row contact_form" action="{{ route('register') }}" method="post" novalidate="novalidate">
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
                                    <input type="password" class="form-control" id="password" name="password_confirmation" value="" placeholder="Password Confirmation">
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

    <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Top Products</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Managed Website</a></li>
                            <li><a href="">Manage Reputation</a></li>
                            <li><a href="">Power Tools</a></li>
                            <li><a href="">Marketing Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Quick Links</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Jobs</a></li>
                            <li><a href="">Brand Assets</a></li>
                            <li><a href="">Investor Relations</a></li>
                            <li><a href="">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Features</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Jobs</a></li>
                            <li><a href="">Brand Assets</a></li>
                            <li><a href="">Investor Relations</a></li>
                            <li><a href="">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Resources</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Guides</a></li>
                            <li><a href="">Research</a></li>
                            <li><a href="">Experts</a></li>
                            <li><a href="">Agencies</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_footer_part">
                        <h4>Newsletter</h4>
                        <p>Heaven fruitful doesn't over lesser in days. Appear creeping
                        </p>
                        <div id="mc_embed_signup">
                            <form target="_blank"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="subscribe_form relative mail_part">
                                <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                                    class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = ' Email Address '">
                                <button type="submit" name="submit" id="newsletter-submit"
                                    class="email_icon newsletter-submit button-contactForm">subscribe</button>
                                <div class="mt-10 info"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="copyright_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="copyright_text">
                            <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer_icon social_icon">
                            <ul class="list-unstyled">
                                <li><a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fas fa-globe"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="{{ asset('/common/js/jquery-1.12.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('/common/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('/common/js/bootstrap.min.js') }}"></script>
    <!-- easing js -->
    <script src="{{ asset('/common/js/jquery.magnific-popup.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('/common/js/swiper.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('/common/js/masonry.pkgd.js') }}"></script>
    <!-- particles js -->
    <script src="{{ asset('/common/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/common/js/jquery.nice-select.min.js') }}"></script>
    <!-- slick js -->
    <script src="{{ asset('/common/js/slick.min.js') }}"></script>
    <script src="{{ asset('/common/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('/common/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('/common/js/contact.js') }}"></script>
    <script src="{{ asset('/common/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('/common/js/jquery.form.js') }}"></script>
    <script src="{{ asset('/common/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/common/js/mail-script.js') }}"></script>
    <script src="{{ asset('/common/js/stellar.js') }}"></script>
    <script src="{{ asset('/common/js/price_rangs.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('/common/js/custom.js') }}"></script>
</body>

</html>