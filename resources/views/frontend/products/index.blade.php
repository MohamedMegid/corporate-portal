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
		<style type="text/css">
			#bg_image{
				background-image: url("/img/bg.jpg");
			}
		</style>
@endsection
@section('content')
<!-- ========== Our Company Growth ============ -->
		<section class="company_growth_sec">
			<div class="container" id="bg_image">
				<div class="row growth_title">
					<h2>{{trans('backend.Our Products')}}</h2>
				</div>
			</div> <!-- End container -->
			<div class="container-fluid">
				<div class="container">
					@if ($products->count())
					@foreach ($products as $product)
					<div class="row brand_name"> <!-- For brand title and logo -->
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
							<a href="/{{Lang::getLocale()}}/products/{{$product->id}}"><img class="img-responsive" src="/{{$product->image->thumbnail}}" alt="{{$product->title}}"></a> <!-- Logo -->
						</div>
						<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
							<h3><a href="/{{Lang::getLocale()}}/products/{{$product->id}}">{{$product->title}}</a></h3>
							<?php
			                    $limit = 190;
			                    $subject = $product->description;
			                        if (strlen($subject) > $limit)
			                          $subject = substr($subject, 0, strrpos(substr($subject, 0, $limit), ' ')) . '...';
			                ?>
							<p>{{$subject}}</p>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-1 col-xs-12">
							<div style="margin-top: 150px;">
                                <a href="/{{Lang::getLocale()}}/products/{{$product->id}}" style="border-radius:50%;padding:10px;background-color:#053A6E;color:#eee;">{{trans('backend.Details')}}</a>
                            </div>
						</div>
					</div>
					@endforeach
					@endif
					
				</div> <!-- End container -->
			</div> <!-- End container-fluid -->
		</section> <!-- End company_growth_se -->

<!-- ========== /Our Company Growth ============ -->
<!-- j Query -->

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

@endsection