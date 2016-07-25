@extends('frontend.master')
@section('header')
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/bootstrap/bootstrap.css') }}" media="screen">


		<!-- Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500italic,500,700,700italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,300,600,700,800,900' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic,800,300,300italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=PT+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ asset('assets/frontend/fonts/font-awesome/css/font-awesome.min.css') }}">
		<!-- Stroke Gap Icon -->
		<link rel="stylesheet" href="{{ asset('assets/frontend/fonts/stroke-gap/style.css') }}">

		<!-- Custom Css -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/custom/style.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/responsive/responsive.css') }}">
		<!-- Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500italic,500,700,700italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,300,600,700,800,900' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic,800,300,300italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=PT+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
@endsection
@section('content')


<!-- =============== google map ============= -->
		<div class="map">
			<div class="google-map" id="contact-google-map" data-map-lat="{{$location->latitude}}" data-map-lng="{{$location->longitude}}" data-icon-path="/assets/frontend/images/map-marker.png" data-map-title="{{$location->address}}" data-map-zoom="12"></div>
		</div>
<!-- =============== /google map ============= -->
<!-- =================== Contact us container ============== -->
		<section class="contact_us_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;"> <!-- section title -->
						<h2>{{trans('backend.Contact Us')}}</h2>
					</div> <!-- End section title -->
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 form_holder"> <!-- form holder -->
						<form action="{{ action('HomeController@store_contact') }}" class="contact-form" method="POST" role="form">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input class="form-control name" type="text" name="name" placeholder="{{trans('backend.Your Name') }}">
							<input class="form-control email" type="email" name="email" placeholder="{{trans('backend.Your Email') }}">
							<input class="form-control phone" type="text" name="phone" placeholder="{{trans('backend.Your phone') }}">
						    <input class="form-control" type="text" name="subject" placeholder="{{trans('backend.Subject') }}">
						    <textarea name="message" placeholder="{{trans('backend.Message') }}"></textarea>
						    <button type="submit" class="submit">{{trans('backend.submit now') }} <i class="fa fa-arrow-circle-right"></i></button>
						</form> <!-- End form holder -->
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right address">
						<address>
							<div class="icon_holder float_left"><span class="icon icon-Pointer"></span></div>
							<?php
                                    $explode = explode(',', $location->address);
                                    $part1 = $explode[0] .' ,'. $explode[1];
                                    $part2 = $explode[2] .' ,'. $explode[3];
                                    $part3 = $explode[4];
                                ?>
							<div class="address_holder float_left">{{$part1}} <br> {{$part2}} <br>{{$part3}}</div>
						</address>
						<address class="clear_fix">
							<div class="icon_holder float_left"><span class="icon icon-Plaine"></span></div>
							<div class="address_holder float_left">{{$contacts->mail}}</div>
						</address>
						<address class="clear_fix">
							<div class="icon_holder float_left"><span class="icon icon-Phone2"></span></div>
							<div class="address_holder float_left">
								@if ($phones->count())
								@foreach($phones as $phone)
								{{$phone->phone}} <br>
								@endforeach
								@endif
							</div>
						</address>
					</div>
				</div>
			</div>
		</section>
		<br>
<!-- =================== /Contact us container ============== -->
@endsection
@section('footer')
		<script type="text/javascript" src="{{ asset('assets/frontend/js/jquery-2.1.4.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.bxslider.min.js') }}"></script>
		<script src="{{ asset('assets/frontend/js/revolution-slider/jquery.themepunch.tools.min.js') }}"></script> <!-- Revolution Slider Tools -->
		<script src="{{ asset('assets/frontend/js/revolution-slider/jquery.themepunch.revolution.min.js') }}"></script> <!-- Revolution Slider -->
		<script type="text/javascript" src="{{ asset('assets/frontend/js/revolution-slider/extensions/revolution.extension.actions.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/frontend/js/revolution-slider/extensions/revolution.extension.carousel.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/frontend/js/revolution-slider/extensions/revolution.extension.kenburn.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/frontend/js/revolution-slider/extensions/revolution.extension.layeranimation.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/frontend/js/revolution-slider/extensions/revolution.extension.migration.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/frontend/js/revolution-slider/extensions/revolution.extension.navigation.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/frontend/js/revolution-slider/extensions/revolution.extension.parallax.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/frontend/js/revolution-slider/extensions/revolution.extension.slideanims.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/frontend/js/revolution-slider/extensions/revolution.extension.video.min.js') }}"></script>

		<!-- Bootstrap JS -->
		<script type="text/javascript" src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.appear.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.countTo.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.fancybox.pack.js') }}"></script>
		<!-- Custom & Vendor js -->
		<script type="text/javascript" src="{{ asset('assets/frontend/js/custom.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.mixitup.min.js') }}"></script>

		<script src="http://maps.google.com/maps/api/js"></script> <!-- Gmap Helper -->
		<script src="{{ asset('assets/frontend/js/gmap.js') }}"></script> <!-- gmap JS -->

@endsection