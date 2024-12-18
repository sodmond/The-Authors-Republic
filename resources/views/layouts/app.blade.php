<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', '') }}</title>
	<meta name="description" content="">
	
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
	<link rel="apple-touch-icon" href="{{ asset('img/favicon.png') }}">
	
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/icomoon.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/transitions.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/color-purple.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/brands.min.css">
	<script src="{{ asset('frontend/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
	<style>
		@font-face {
		    font-family: "Script MT";
		    src: url({{ asset('frontend/fonts/ScriptMTBold.woff') }});
		}
		.tg-aboutusshortcode .tg-sectionhead h2, .tg-aboutusteam #teamHeader h2, .aboutus-section h2 {
    		font-family: 'Script MT' !important;
			font-size: 32px !important;
			line-height: 35px;
		}
	</style>
</head>
<body class="tg-home tg-homevtwo">
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!--************************************
			Wrapper Start
	*************************************-->
	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <!--************************************
				Header Start
		*************************************-->
        @include('layouts.partials.header')
        <!--************************************
				Header End
		*************************************-->

		<!--************************************
				Home Slider/Inner Banner Start
		*************************************-->
        @if($activePage == 'home')
		    @include('layouts.partials.home_slider')
        @else
            @include('layouts.partials.breadcrumb')
        @endif
		<!--************************************
				Home Slider/Inner Banner End
		*************************************-->

		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			
            @yield('content')
			
		</main>
		<!--************************************
				Main End
		*************************************-->
		<!--************************************
				Footer Start
		*************************************-->
		@include('layouts.partials.footer')
		<!--************************************
				Footer End
		*************************************-->
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
	<script src="{{ asset('frontend/js/vendor/jquery-library.js') }}"></script>
	<script src="{{ asset('frontend/js/vendor/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.vide.min.js') }}"></script>
	<script src="{{ asset('frontend/js/countdown.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
	<script src="{{ asset('frontend/js/parallax.js') }}"></script>
	<script src="{{ asset('frontend/js/countTo.js') }}"></script>
	<script src="{{ asset('frontend/js/appear.js') }}"></script>
	<script src="{{ asset('frontend/js/gmap3.js') }}"></script>
	<script src="{{ asset('frontend/js/main.js') }}"></script>
	<script src="{{ asset('frontend/js/custom.js') }}"></script>
	<script src="{{ asset('frontend/js/bootstrap-rating-input.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/fontawesome.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/brands.min.js"></script>
	@stack('custom-scripts')
	{!! htmlScriptTagJsApi() !!}
	@if(session('cart_suc'))
    <script>
        $(function() {
            $('#statusModal').modal('show');
            setTimeout(function() {
                $("#statusModal").modal('hide');
            }, 2000);
        });
    </script>
    @endif
	@if(session('newsletter_suc'))
    <script>
        $(function() {
            $('#newsletterModal').modal('show');
            setTimeout(function() {
                $("#newsletterModal").modal('hide');
            }, 2000);
        });
    </script>
    @endif
	<script>
		$('#newsletterForm').submit(function(e) {
			e.preventDefault();
			var email = $('#newsletter_email1').val();
			$('#newsletter_email2').val(email);
			$('#newsletterPrompt').modal('show');
		});
		$('#newsletterForm2').submit(function(e) {
			if(grecaptcha.getResponse() == "") {
    			e.preventDefault();
			    alert("Please verify you're not a bot.");
			}
		});
	</script>
</body>
</html>