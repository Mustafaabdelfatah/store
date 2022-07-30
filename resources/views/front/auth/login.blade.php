@extends('layouts.site')


@section('content')
    {{-- @include('front.includes._banner') --}}
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Login/Register</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('front.login') }}">Login/Register</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Login Box Area =================-->
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="img/login.jpg" alt="">
                        <div class="hover">
                            <h4>New to our website?</h4>
                            <p>There are advances being made in science and technology everyday, and a good example of
                                this is the</p>
                            <a class="primary-btn" href="{{ route('front.register') }}">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Log in to enter</h3>
                        <form class="row login_form" action="{{ route('front.login') }}" method="post" id="contactForm"
                            novalidate="novalidate">
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="email"
                                    placeholder="Username" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Username'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Password'">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector">
                                    <label for="f-option2">Keep me logged in</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn">Log In</button>
                                <a href="#">Forgot Password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->



    @include('front.includes._footer')
@endsection
@push('js')
    <script>
        $().ready(function() {

            // Validate Register form on keyup and submit
            $("#registerForm").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                        regx: /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },

                    email: {
                        required: true,
                        email: true,
                        remote: "/check-email"
                    }
                },
                messages: {
                    name: {
                        required: "من فضلك ادخل Name",
                        minlength: "Name يجب ان يحتوي علي ثلاثه احرف علي الاقل",
                        regx: "<font color='red'>enter only english or arabic letters</font>"
                    },
                    password: {
                        required: "من فضلك ادخل كلمه المرور",
                        minlength: "كلمه المرور يجب ان تحتوي علي 6 ارقام علي الاقل",
                    },
                    email: {
                        required: "من فضلك ادخل البريد الالكتروني",
                        email: "من فضلك ادخل بريد الكتروني صحيح",
                        remote: "هذا البريد مستخدم من قبل!"
                    }
                }
            });



            // Validate Login form on keyup and submit
            $("#loginForm").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {

                    password: {
                        required: "من فضلك ادخل كلمه المرور",
                    },
                    email: {
                        required: "من فضلك ادخل البريد الالكتروني",
                        email: "من فضلك ادخل بريد الكتروني صحيح",
                    }
                }
            });




            // Password Strength Script
            $('#myPassword').passtrength({
                minChars: 6,
                passwordToggle: true,
                tooltip: true,
                textWeak: "Weak",
                textMedium: "Medium",
                textStrong: "Strong",
                textVeryStrong: "Very Strong",
                eyeImg: "/front/images/eye.svg"
            });




        });
    </script>
@endpush
