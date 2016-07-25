
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
@endsection
@section('content')
<!-- ======= /Banner ======= -->
		<section class="side_tab">
			<div class="container">
				<div class="row">
					<div class="white_bg right_side col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-right">
						<div class="tab_details">
						    <!-- Tab panes -->
						    <div class="tab-content right_info">
						      <div class="tab-pane fade in row active" id="investment">
						      	<img class="img-responsive" src="/{{$service->image->thumbnail}}" alt="/{{$service->title}}" style="width: 100%;height: 350px;">
						      	<h2>{{$service->title}}</h2>
						      	<p>/{{$service->description}}</p>
						      </div>
						      
						    </div>
						</div> <!-- End tab_details -->
						
					</div> <!-- End white_bg -->
					
				</div> <!-- End row -->
			</div> <!-- End container -->
		</section>

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