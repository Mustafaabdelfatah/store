{{-- <footer id="footer"><!--Footer-->

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="{{ url('contact-page') }}">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Quock Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">T-Shirt</a></li>
                            <li><a href="#">Mens</a></li>
                            <li><a href="#">Womens</a></li>
                            <li><a href="#">Gift Cards</a></li>
                            <li><a href="#">Shoes</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{ url('page/terms-conditions') }}">Terms & Conditions</a></li>
                            <li><a href="{{ url('page/privacy-policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ url('page/refund-policy') }}">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{ url('page/about-us') }}">About Us</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="javascript:void(0);" class="searchform" type="post">{{ csrf_field() }}
                            <input onfocus="enableSubscriber();" onfocusout="checkSubscriber();" name="subscriber_email" id="subscriber_email" type="email" placeholder="Your email address" required="" />
                            <button onclick="checkSubscriber(); addSubscriber();" id="btnSubmit" type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <div id="statusSubscribe" style="display: none;"></div>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer--> --}}
<!-- start footer Area -->
<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>About Us</h6>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore dolore
                        magna aliqua.
                    </p>
                </div>
            </div>
            <div class="col-lg-4  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Newsletter</h6>
                    <p>Stay update with our latest</p>
                    <div class="" id="mc_embed_signup">

                        <form target="_blank" novalidate="true"
                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                            method="get" class="form-inline">

                            <div class="d-flex flex-row">

                                <input class="form-control" name="EMAIL" placeholder="Enter Email"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
                                    required="" type="email">


                                <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right"
                                        aria-hidden="true"></i></button>
                                <div style="position: absolute; left: -5000px;">
                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                        type="text">
                                </div>

                                <!-- <div class="col-lg-4 col-md-4">
            <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
           </div>  -->
                            </div>
                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget mail-chimp">
                    <h6 class="mb-20">Instragram Feed</h6>
                    <ul class="instafeed d-flex flex-wrap">
                        <li><img src="{{ asset('front/') }}/img/i1.jpg" alt=""></li>
                        <li><img src="{{ asset('front/') }}/img/i2.jpg" alt=""></li>
                        <li><img src="{{ asset('front/') }}/img/i3.jpg" alt=""></li>
                        <li><img src="{{ asset('front/') }}/img/i4.jpg" alt=""></li>
                        <li><img src="{{ asset('front/') }}/img/i5.jpg" alt=""></li>
                        <li><img src="{{ asset('front/') }}/img/i6.jpg" alt=""></li>
                        <li><img src="{{ asset('front/') }}/img/i7.jpg" alt=""></li>
                        <li><img src="{{ asset('front/') }}/img/i8.jpg" alt=""></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Follow Us</h6>
                    <p>Let us be social</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
            <p class="footer-text m-0">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                    aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </div>
</footer>
<!-- End footer Area -->

<script>
    // function checkSubscriber() {
    //     var subscriber_email = $("#subscriber_email").val();
    //     $.ajax({
    //         type: 'post',
    //         url: '/check-subscriber-email',
    //         data: {
    //             subscriber_email: subscriber_email
    //         },
    //         success: function(resp) {
    //             if (resp == "exists") {
    //                 /*alert("Subscriber email already exists");*/
    //                 $("#statusSubscribe").show();
    //                 $("#btnSubmit").hide();
    //                 $("#statusSubscribe").html(
    //                     "<div style='margin-top:-10px;'>&nbsp;</div><font color='red'>Error: Subscriber email already exists!</font>"
    //                     );
    //             }

    //         },
    //         error: function() {
    //             alert("Error");
    //         }
    //     });
    // }

    // function addSubscriber() {
    //     var subscriber_email = $("#subscriber_email").val();
    //     $.ajax({
    //         type: 'post',
    //         url: '/add-subscriber-email',
    //         data: {
    //             subscriber_email: subscriber_email
    //         },
    //         success: function(resp) {
    //             if (resp == "exists") {
    //                 /*alert("Subscriber email already exists");*/
    //                 $("#statusSubscribe").show();
    //                 $("#btnSubmit").hide();
    //                 $("#statusSubscribe").html(
    //                     "<div style='margin-top:-10px;'>&nbsp;</div><font color='red'>Error: Subscriber email already exists!</font>"
    //                     );
    //             } else if (resp == "saved") {
    //                 $("#statusSubscribe").show();
    //                 $("#statusSubscribe").html(
    //                     "<div style='margin-top:-10px;'>&nbsp;</div><font color='green'>Success: Thanks for Subscribing!</font>"
    //                     );
    //             }

    //         },
    //         error: function() {
    //             alert("Error");
    //         }
    //     });
    // }

    // function enableSubscriber() {
    //     $("#btnSubmit").show();
    //     $("#statusSubscribe").hide();
    // }
</script>
