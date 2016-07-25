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
		<!-- owl-carousel css -->
		<link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.theme.css') }}">
		
		<!-- owl-carousel css -->
		<link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.theme.css') }}">
		<!-- Custom Css -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/custom/style.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/responsive/responsive.css') }}">
@endsection
@section('content')


<!-- ======= revolution slider section ======= -->
	<section class="rev_slider_wrapper me-fin-banner">
		<div id="slider1" class="rev_slider"  data-version="5.0">
			<ul>
					@if ($banners->count())
					@foreach($banners as $banner)
				<li data-transition="fade">
					<a href="/{{$banner->link}}">
					<img src="/{{$banner->image->thumbnail}}"  alt="{{$banner->title}}" style="width: 1349px;height: 100%;">
					<div class="tp-caption sfb tp-resizeme banner-h1" 
				        data-x="left" data-hoffset="380" 
				        data-y="top" data-voffset="290" 
				        data-whitespace="nowrap"
				        data-transform_idle="o:1;" 
				        data-transform_in="o:0" 
				        data-transform_out="o:0" 
				        data-start="500">
						{{$banner->title}}
				    </div>
				    </a>
				</li>

				    @endforeach
				    @endif
			</ul>
		</div>
	</section>
<!-- ======= /revolution slider section ======= -->

<!-- ======= Welcome section ======= -->
		<section class="our_advisor">
			<div class="container">
				
				<div class="row">
					<h2>{{trans('backend.Meet Our Services')}}</h2>
				</div>
				<?php 
					$i = 1;
				?>
				@if ($services->count())

				<div class="row welcome welcome_details">
				@foreach ($services as $service)

				@if ($i <= 4)
				<?php
                    $limit = 90;
                    $subject = $service->description;
                        if (strlen($subject) > $limit)
                          $subject = substr($subject, 0, strrpos(substr($subject, 0, $limit), ' ')) . '...';
                ?>
					@if ($i == 1 || $i == 3)
					<div class="col-lg-6 col-md-12">
						@if ($i == 1)
						<a href="/{{Lang::getLocale()}}/services/{{$service->id}}">
						<div class="welcome_item">
							<img src="/{{$service->image->thumbnail}}" alt="{{$service->title}}" style="width: 180px;height: 170px;">
							<div class="welcome_info">
								<h3>{{$service->title}}</h3>
								<p>{{$subject}}</p>
							</div>
						</div>
						</a>
						@endif
						@if ($i == 3)
						<a href="/{{Lang::getLocale()}}/services/{{$service->id}}">
						<div class="welcome_item welcome_item_bottom">
							<img src="/{{$service->image->thumbnail}}" alt="{{$service->title}}" style="width: 180px;height: 170px;">
							<div class="welcome_info">
								<h3>{{$service->title}}</h3>
								<p>{{$subject}}</p>
							</div>
						</div>
						</a>
						@endif
					</div>
					@endif
					@if ($i == 2 || $i == 4)
					<div class="col-lg-6 col-md-12 bottom_row">
						@if ($i == 2)
						<a href="/{{Lang::getLocale()}}/services/{{$service->id}}">
						<div class="welcome_item">
							<img src="/{{$service->image->thumbnail}}" alt="{{$service->title}}" style="width: 180px;height: 170px;">
							<div class="welcome_info">
								<h3>{{$service->title}}</h3>
								<p>{{$subject}}</p>
							</div>
						</div>
						</a>
						@endif
						@if ($i == 4)
						<a href="/{{Lang::getLocale()}}/services/{{$service->id}}">
						<div class="welcome_item welcome_item_bottom">
							<img src="/{{$service->image->thumbnail}}" alt="{{$service->title}}" style="width: 180px;height: 170px;">
							<div class="welcome_info">
								<h3>{{$service->title}}</h3>
								<p>{{$subject}}</p>
							</div>
						</div>
						</a>
						@endif
					</div>
					@endif
				

				<?php 
					$i = $i + 1;
				?>
				@endif
				@endforeach
				</div> <!-- End Row -->
				@endif
			</div> <!-- End container -->
		</section> <!-- End welcome_sec -->
<!-- ======= /Welcome section ======= -->

<!-- ======= Who We Are ======= -->
		<section class="we_are">
			<div class="right_side" style="width:100%;">
				<div class="we_are_deatails">
					<h2>{{$settings->name}}</h2>
					<p style="width:90%;font-size:20px;">{{$settings->description}}<br>
				</div>
			</div> <!-- End right_side -->
		</section> <!-- End We Are -->
<!-- ======= /Who We Are ======= -->

<!-- ======= Testimonial & Company Values ======= 
		<section class="testimonial_sec clear_fix">
			<div class="container">
				<div class="row">
					<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 testimonial_container">
						<div class="sec-title">
							<h2>{{trans('backend.Events')}}</h2>
						</div>
						<div id="owl">
							@if ($events->count())
							@foreach($events as $event)
							<div>
								<div class="testimonial">									
									<img src="/{{$event->image->thumbnail}}" alt="{{$event->title}}" style="width: 100%;height: 300px;">
										<ul>
											<li style="color: #12a0b1;"><a href=""></a>{{$event->event_date}}</li>
										</ul>
									<div class="client_info" style="padding-top: 0px !important;">
										<p>{{$event->title}}</p>
									</div>
								</div>
								<?php
								/*
				                    $limit = 290;
				                    $subject = $event->body;
				                        if (strlen($subject) > $limit)
				                          $subject = substr($subject, 0, strrpos(substr($subject, 0, $limit), ' ')) . '...';
				                */
				                ?>
								<p class="john_speach">{{$subject}}</p>
							</div>
							@endforeach
							@endif
						</div>
					</div>
				</div>
			</div> 
		</section>
 ======= /Testimonial & Company Values ======= -->


<!-- ======== Our Advisor ======== -->
		<section class="our_advisor">
			<div class="container">
				<div class="row">
					<h2>{{trans('backend.Events')}}</h2>
				</div>
				<div class="row">

					@if ($events->count())
					@if ($events->count() <= 4)
					@foreach ($events as $event)
					<div class="col-md-3">
						<a href="/{{Lang::getLocale()}}/events/{{$event->id}}">
						<div class="single-advisor">
							<div class="img-holder">
								<img src="/{{$event->image->thumbnail}}" alt="{{$event->title}}"/>
							</div>
							<div class="content-holder hvr-sweep-to-bottom">
								<h4>{{$event->title}}</h4>
								<?php
				                    $limit = 60;
				                    $subject = $event->summary;
				                        if (strlen($subject) > $limit)
				                          $subject = substr($subject, 0, strrpos(substr($subject, 0, $limit), ' ')) . '...';
				                ?>
								<p>{{$subject}}</p>
							</div>
						</div>
						</a>
					</div>
					@endforeach
					@endif
					@endif
				</div>
			</div> <!-- End container -->
		</section> <!-- End our_advisor -->
<!-- ======== /Our Advisor ======== -->


<!-- ======== Our Advisor ======== -->
		<section class="our_advisor">
			<div class="container">
				<div class="row">
					<h2>{{trans('backend.Our Products')}}</h2>
				</div>
				<div class="row">

					@if ($products->count())
					@if ($products->count() <= 4)
					@foreach ($products as $product)
					<div class="col-md-3">
						<a href="/{{Lang::getLocale()}}/products/{{$product->id}}">
						<div class="single-advisor">
							<div class="img-holder">
								<img src="/{{$product->image->thumbnail}}" alt="{{$product->title}}"/>
							</div>
							<div class="content-holder hvr-sweep-to-bottom">
								<h4>{{$product->title}}</h4>
								<?php
				                    $limit = 60;
				                    $subject = $product->description;
				                        if (strlen($subject) > $limit)
				                          $subject = substr($subject, 0, strrpos(substr($subject, 0, $limit), ' ')) . '...';
				                ?>
								<p>{{$subject}}</p>
							</div>
						</div>
						</a>
					</div>
					@endforeach
					@endif
					@endif
				</div>
			</div> <!-- End container -->
		</section> <!-- End our_advisor -->
<!-- ======== /Our Advisor ======== -->

<!-- ======== Latest News ======== -->
		<section class="p0 container-fluid latest_news_sec news_large">
			<div class="container">
				<h2>{{trans('backend.Latest News')}}</h2>
			</div>
			<div class="news_highlight">
				@if ($news->count())
				<?php
					$i = 1;
				?>
				@if ($news->count() <= 4)
				@foreach($news as $item)
				@if ($i == 1)
				<div class="col-lg-3 col-md-6 news">
					<a href="/{{Lang::getLocale()}}/news/{{$item->id}}">
					<div class="news_img_holder">
						<img class="img-responsive" src="/{{$item->image->thumbnail}}" alt="{{$item->title}}">
						<div class="news_opacity">
						</div>
						<div class="news_details">
							<a href="/{{Lang::getLocale()}}/news/{{$item->id}}">
								<?php
				                    $limit = 80;
				                    $subject = $item->summary;
				                        if (strlen($subject) > $limit)
				                          $subject = substr($subject, 0, strrpos(substr($subject, 0, $limit), ' ')) . '...';
				                ?>
								<span>{{$item->created_at}}</span>
								<h4>{{$item->title}}</h4>
								<p>{{$subject}}</p>
							</a>
						</div>
					</div>
					</a>
				</div>
				@endif
				@if ($i == 2)
				<div class="col-lg-3 col-md-6 news news_right">
					<a href="/{{Lang::getLocale()}}/news/{{$item->id}}">
					<div class="news_img_holder">
						<img class="img-responsive" src="/{{$item->image->thumbnail}}" alt="{{$item->title}}">
						<div class="news_opacity">
						</div>
						<div class="news_details">
							<a href="/{{Lang::getLocale()}}/news/{{$item->id}}">
								<?php
				                    $limit = 80;
				                    $subject = $item->summary;
				                        if (strlen($subject) > $limit)
				                          $subject = substr($subject, 0, strrpos(substr($subject, 0, $limit), ' ')) . '...';
				                ?>
								<span>{{$item->created_at}}</span>
								<h4>{{$item->title}}</h4>
								<p>{{$subject}}</p>
							</a>
						</div>
					</div>
					</a>
				</div>
				@endif
				@if ($i == 3)
				<div class="col-lg-3 col-md-6 news news_bottom">
					<a href="/{{Lang::getLocale()}}/news/{{$item->id}}">
					<div class="news_img_holder">
						<img class="img-responsive" src="/{{$item->image->thumbnail}}" alt="{{$item->title}}">
						<div class="news_opacity">
						</div>
						<div class="news_details">
							<a href="/{{Lang::getLocale()}}/news/{{$item->id}}">
								<?php
				                    $limit = 80;
				                    $subject = $item->summary;
				                        if (strlen($subject) > $limit)
				                          $subject = substr($subject, 0, strrpos(substr($subject, 0, $limit), ' ')) . '...';
				                ?>
								<span>{{$item->created_at}}</span>
								<h4>{{$item->title}}</h4>
								<p>{{$subject}}</p>
							</a>
						</div>
					</div>
					</a>
				</div>
				@endif
				@if ($i == 4)
				<div class="col-lg-3 col-md-6 news news_right news_bottom">
					<a href="/{{Lang::getLocale()}}/news/{{$item->id}}">
					<div class="news_img_holder">
						<img class="img-responsive" src="/{{$item->image->thumbnail}}" alt="{{$item->title}}">
						<div class="news_opacity">
						</div>
						<div class="news_details">
							<a href="/{{Lang::getLocale()}}/news/{{$item->id}}">
								<?php
				                    $limit = 80;
				                    $subject = $item->summary;
				                        if (strlen($subject) > $limit)
				                          $subject = substr($subject, 0, strrpos(substr($subject, 0, $limit), ' ')) . '...';
				                ?>
								<span>{{$item->created_at}}</span>
								<h4>{{$item->title}}</h4>
								<p>{{$subject}}</p>
							</a>
						</div>
					</div>
					</a>
				</div>
				@endif
				<?php
					$i = $i + 1;
				?>
				@endforeach
				@endif
				@endif
			</div>
		</section> <!-- End latest_news_sec -->
<!-- ======== /Latest News ======== -->


@endsection
@section('footer')
				<!-- j Query -->
		<script type="text/javascript" src="{{ asset('assets/frontend/js/jquery-2.1.4.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
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
		<!-- owl-carousel -->
		<script type="text/javascript" src="{{ asset('assets/frontend/js/owl.carousel.js') }}"></script>
		<script src="{{ asset('assets/frontend/js/owl-custom.js') }}"></script>
		<!-- Custom & Vendor js -->
		<script type="text/javascript" src="{{ asset('assets/frontend/js/custom.js') }}"></script>

		<!--Media -->
		@include('backend.media.scripts.scripts')
		<!--end media -->
@endsection