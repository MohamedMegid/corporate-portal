@inject('settings', 'App\Http\Controllers\HomeController')
@inject('social', 'App\Http\Controllers\HomeController')
@inject('contacts', 'App\Http\Controllers\HomeController') 
@inject('Language', 'App\Http\Controllers\LanguageController')
@inject('user', 'App\Http\Controllers\HomeController')

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">

		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta name="description" content="{{$settings->getsettings()->description}}">

		<title>{{$settings->getsettings()->name}}</title>

		<?php
			$keywords_str = '';
			$keywords = $settings->getsettings()->keywords;
			$keywords = explode(' ', $keywords);
			foreach ($keywords as $key => $value) {
				$keywords_str .= $value . ',';
			}
		?>
		<meta name="keywords" content="{{$keywords_str}}">

		<meta name="author" content="INNOFLAME INFORMATION TECHNOLOGY">

		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="/img/maininfo/{{$settings->getsettings()->favicon}}"/>	

		@yield('header')
		<!--[if lt IE 9]>
	   		<script src="js/html5shiv.js"></script>
		<![endif]-->

		@if(Lang::getLocale() == 'ar')
	        <link href="{{ asset('assets/frontend/css/custom-rtl.css') }}" rel="stylesheet" type="text/css" id="colorscheme" />
	    @endif

	</head>
	<body class="home">
		@include('frontend.regions.header')
		@include('frontend.menu')
		@yield('content')

		@include('frontend.regions.footer')

		
		@yield('footer')
	</body>
</html>