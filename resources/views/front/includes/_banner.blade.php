<section class="banner-area">
    <div class="container">


        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="active-banner-slider owl-carousel">
                    @foreach ($banners as $key => $banner)
                        <!-- single-slide -->
                        <div class="row single-slide align-items-center d-flex">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h1>{{ $banner->title }} <br>Collection!</h1>
                                    <p>{{ $banner->desc }}</p>
                                    <div class="add-bag d-flex align-items-center">
                                        <a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
                                        <span class="add-text text-uppercase">Add to Bag</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img">
                                    <a href="{{ $banner->link }}">
                                        <img class="img-fluid" src="{{ asset('uploads/banners/' . $banner->image) }}"
                                            alt="">
                                    </a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- single-slide -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->
