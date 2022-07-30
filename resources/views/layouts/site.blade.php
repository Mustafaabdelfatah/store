<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    @if (!empty($meta_description))
        <meta name="description" content="{{ $meta_description }}">
    @endif
    <!-- Meta Keyword -->
    @if (!empty($meta_keywords))
        <meta name="keywords" content="{{ $meta_keywords }}">
    @endif
    <!-- meta character set -->
    <meta charset="UTF-8">
    <title>
        @if (!empty($meta_title))
            {{ $meta_title }}
        @else
            Home | Shopper
        @endif
    </title>

    <!-- CSS ============================================= -->
    <link rel="stylesheet" href="{{ asset('front/') }}/css/linearicons.css">
    <link rel="stylesheet" href="{{ asset('front/') }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('front/') }}/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('front/') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('front/') }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('front/') }}/css/nice-select.css">
    <link rel="stylesheet" href="{{ asset('front/') }}/css/nouislider.min.css">
    <link rel="stylesheet" href="{{ asset('front/') }}/css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="{{ asset('front/') }}/css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="{{ asset('front/') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('front/') }}/css/main.css">
    <!--./CSS ============================================= -->

    <!-- noty -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/noty/noty.css') }}">
    <script src="{{ asset('admin/plugins/noty/noty.min.js') }}"></script>

    @stack('css')
</head>
<!--/head-->

<body>

    @include('front.includes._header')

    @include('front.includes._sessions')
    @yield('content')
    @include('front.includes._footer')



    <script src="{{ asset('front/') }}/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('front/') }}/js/vendor/bootstrap.min.js"></script>
    <script src="{{ asset('front/') }}/js/jquery.ajaxchimp.min.js"></script>
    <script src="{{ asset('front/') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('front/') }}/js/jquery.sticky.js"></script>
    <script src="{{ asset('front/') }}/js/nouislider.min.js"></script>
    <script src="{{ asset('front/') }}/js/countdown.js"></script>
    <script src="{{ asset('front/') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('front/') }}/js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{ asset('front/') }}/js/gmaps.min.js"></script>
    <script src="{{ asset('front/') }}/js/main.js"></script>
    <script>
        $(function() {
            $(document).on('click', '.favClass i', function(event) {

                event.preventDefault()

                var id = $(this).data('id');

                var url = $(this).data('url');

                var method = $(this).data('method');

                var thisSpan = $(this);
                $.ajax({
                    type: method,
                    url: url,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function(data) {

                        // console.log(data.count);
                        thisSpan.toggleClass('fa-heart');
                        thisSpan.toggleClass('fa-heart-o');
                        $('#fav').html('').append('<i class="fa fa-heart"> </i> Favorite ( ' +
                            data.count + ' ) ');
                    }
                });
            });
        });
    </script>
    @stack('js')

</body>

</html>
