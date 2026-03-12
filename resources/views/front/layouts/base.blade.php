<!DOCTYPE html>
<!--[if IE 9]>
<html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>{!! $seo_meta['title'] !!}</title>

    <meta name="description" content="{!! $seo_meta['description'] !!}">
    <meta name="author" content="{!! $seo_meta['author'] !!}">
    <meta name="robots" content="{!! $seo_meta['robots'] !!}">
    <meta name="keywords" content="{!! $seo_meta['keywords'] !!}">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{!! $seo_meta['title'] !!}">
    <meta property="og:description" content="{!! $seo_meta['description'] !!}">
    <meta property="og:url" content="{!! url('') !!}">
    <meta property="og:site_name" content="{!! $seo_meta['name'] !!}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="canonical" href="{!! $seo_meta['canonical'] !!}">

    {{-- Fonts  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    {{--Icons--}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('public/images/icons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('public/images/icons/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/reset.custom.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/fontawesome-free-5.8.1-web/css/all.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('public/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/custom.css') }}">
    @stack('extrastylesheets')

    <script src="{{asset('public/js/modernizr.min.js')}}"></script>
    
    <!-- New CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    @include('front.layouts.sections.header')
    @yield('content')
    @include('front.layouts.sections.footer')
    <script>
        var sBaseURI = '{{ url('/') }}';
    </script>
    <script src="{{ asset('public/js/app.js') }}"></script>
    @stack('extrascripts')
    @if (session()->has('flash_message'))
        <script>
            document.addEventListener("DOMContentLoaded", function (event) {
                swal({
                    title: "{!! session('flash_message.title') !!}",
                    text: "{!! session('flash_message.message') !!}",
                    type: "{!! session('flash_message.type') !!}",
                    html: true,
                    allowEscapeKey: true,
                    allowOutsideClick: true,
                }, function () {
                });
            });
        </script>
    @endif
    <!-- Modal -->
    <div class="modal-mobile-nav g-padding">
        <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/about-us')}}">About me</a></li>
            <li><a href="podcast.html">Podcast</a></li>
            <li><a href="portfolio.html">Portfolio</a></li>
            <li><a href="blogs.html">Case Studies</a></li>
            <li><a href="testimonials.html">Testimonials</a></li>
            <a href="{{url('/contact-us')}}" class="a-mnav-m-link">
                Get In Touch
                <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.82287e-06 9C6.82287e-06 4.0293 4.02931 0 9 0C13.9707 0 18 4.0293 18 9C18 13.9707 13.9707 18 9 18H6.82287e-06L2.63611 15.3639C1.79918 14.5291 1.13545 13.5371 0.683068 12.445C0.230682 11.3529 -0.00145088 10.1821 6.82287e-06 9ZM4.34521 16.2H9C10.424 16.2 11.8161 15.7777 13.0001 14.9866C14.1841 14.1954 15.107 13.0709 15.6519 11.7553C16.1969 10.4397 16.3395 8.99201 16.0617 7.59535C15.7838 6.19869 15.0981 4.91577 14.0912 3.90883C13.0842 2.90189 11.8013 2.21616 10.4047 1.93835C9.00799 1.66053 7.56031 1.80312 6.24468 2.34807C4.92906 2.89302 3.80457 3.81586 3.01342 4.99989C2.22228 6.18393 1.80001 7.57597 1.80001 9C1.80001 10.9368 2.56591 12.7485 3.90871 14.0913L5.1813 15.3639L4.34521 16.2ZM5.4 9.9H12.6C12.6 10.8548 12.2207 11.7705 11.5456 12.4456C10.8705 13.1207 9.95478 13.5 9 13.5C8.04522 13.5 7.12955 13.1207 6.45442 12.4456C5.77929 11.7705 5.4 10.8548 5.4 9.9Z" fill="currentColor"/>
                </svg>
            </a>
        </ul>
    </div>
    <!-- Modal -->
    <script src="https://unpkg.com/lenis@1.3.18/dist/lenis.min.js"></script> 
    <script>
        const lenis = new Lenis({
        autoRaf: true,
        });

        const hamburger = document.getElementById('menu-mob');
        const modalNavMob = document.querySelector('.modal-mobile-nav');
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('hamburger-active');
            modalNavMob.classList.toggle('show-mmnav');
        });
    </script>
    <script src="{{ asset('public/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script> -->
    <script src="{{ asset('public/js/slider.js') }}"></script>
    <script src="{{ asset('public/js/aos.js') }}"></script>
    <script src="{{ asset('public/js/custom.js') }}"></script>
</body>
</html>