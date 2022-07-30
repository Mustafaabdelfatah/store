@extends('layouts.site')

@section('content')
    {{-- @include('front.includes._banner') --}}
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Register</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('welcome') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('front.login') }}">Login/Register</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================register Box Area =================-->
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="register_form_inner">
                        <h3>Registertion</h3>
                        <form class="row register_form" action="{{ route('front.register') }}" method="post"
                            id="contactForm" novalidate="novalidate">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Username" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Username'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="name"
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
                        <div class="col-md-12">
                            <span> already have Account?</span>
                            <a class="genric-btn primary small" href="registration.html">Sign in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--================End register Box Area =================-->



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



            // Validate register form on keyup and submit
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
