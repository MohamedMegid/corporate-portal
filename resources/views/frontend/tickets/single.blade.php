
@extends('frontend.master')
@section('header')
 <link href="{{ asset('assets/backend/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.1.0.css') }}" />



<style type="text/css">
.Area
{
  width:80%;
  background-color:rgba(240, 240, 240, 0.2);
  display:table;
  padding:5px;
  border-radius:5px;
  margin-bottom:10px;
}
.L
{
  float:left;
}
img
{
  width:50px;
  height:50px;
  border-radius:50%;
  border:2px solid #f0f0ff;
  padding:5px;    
}
img:hover
{
    -moz-box-shadow: 0 5px 5px rgba(223, 120, 8, 1);
-webkit-box-shadow: 0 5px 5px rgba(223, 120, 8, 1);
box-shadow: 0 5px 5px rgba(223, 120, 8, 1);
       -webkit-transition: all 1.5s;
    -moz-transition: all 1.5s;
    transition: all 1.5s;
  cursor:pointer;
}
.R
{
    float:right;
}
.text
{
  color: #a4a4a4;
font-family: tahoma;
font-size: 13px;
  font-weight:lighter;
line-height: 30px;
  width:100%;
  border:1px solid #f0f0f0;
  background-color:rgba(255, 255, 255, 0.6);
  margin-top:10px;
  border-radius:5px;
  padding:5px;  
}
.Area textarea
{
  font-size:12px;
  width:90%;
  max-width:90%;
  min-width:90%;
  padding:5%;
  border-radius:5px;
  border:1px solid #f0f0f1;
  max-height:50px;
  height:50px;
  min-height:50px;
  background-color:#333;
  color:#fff;
  outline:none;
  border:1px solid transparent;
  resize:none;
}
.Area textarea:focus
{
  color:#333;
  border:1px solid #ccc;
     -webkit-transition: all 1.5s;
    -moz-transition: all 1.5s;
    transition: all 1.5s;
  background-color:#fff;
}
.Area .note
{
  color:#9F6905;
  font-size:10px;
}
.R .tooltip
{
  font-size:10px;
  position:absolute;
  background-color:#fff;
  padding:5px;
  border-radius:5px;
  border:2px solid #9F6905;
  margin-left:70px;
  margin-top:-70px;
  display:none;
  color:#545454;
}
.R .tooltip:before
{
    content: '';
    position: absolute;
    width: 1px;
    height: 1px;
    border: 5px solid transparent;
    border-right-color: #9F6905;
    margin-top: 10px;
    margin-left: -17px;
}
.R:hover .tooltip
{
  display:block;
}

.L .tooltip
{
  font-size:10px;
  position:absolute;
  background-color:#fff;
  padding:5px;
  border-radius:5px;
  border:2px solid #9F6905;
  margin-left:70px;
  margin-top:-70px;
  display:none;  
  color:#545454;
}
.L .tooltip:before
{
    content: '';
    position: absolute;
    width: 1px;
    height: 1px;
    border: 5px solid transparent;
    border-right-color: #9F6905;
    margin-top: 10px;
    margin-left: -17px;
}
.L:hover .tooltip
{
  display:block;
}
a
{
  text-decoration:none;
}


.Area input[type=button]
{
  font-size:12px;
  padding:5px;
  border-radius:5px;
  border:1px solid #f0f0f1;
  background-color:#333;
  color:#fff;
  outline:none;
  border:1px solid transparent;
  float:left;
}
.Area input[type=button]:hover
{
  color:#fff;
  border:1px solid #ccc;
     -webkit-transition: all 1.5s;
    -moz-transition: all 1.5s;
    transition: all 1.5s;
  background-color:#9F6905;
} 
.validation
{
  float:left;
  background-color:#ccc;
  border-radius:5px;
  padding:5px;
  font-size:12px;
  line-height:14px;
  height:0px;
  margin-left:5px;
  display:none;
}
br
{
  clear:both;
  height:20px;
}

</style>

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
						    
							@if ($tickets->count()) 
                        
 						<div class="table-scrollable">
                            <table class="table table-hover">
                                <tbody style="background-color: #eee;">
                                    <tr>
                                    	@foreach($tickets as $item)
                                        <td><b>{{ trans('backend.title')}}:</b></td>
                                        <td>{{ $item->title }}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                    	@foreach($tickets as $item)
                                        <td><b>{{ trans('backend.description')}}:</b></td>
                                        <td>{{ $item->description }}</td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>

							<div class="container">
								@foreach($tickets as $item)
								@foreach($item->reply as $reply)
								@if ($reply->user_id == 1)
							  <div class="Area">
							    <div class="L">
							      <a href="#">
							    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrEyVlaWx0_FK_sz86j-CnUC_pfEqw_Xq_xZUm5CMIyEI_-X2hRUpx1BHL"/>Admin</a>
							    </div>
							    <div class="text R textR">
							    	{{$reply->reply}}
							    </div>
							  </div>
							  @else
							  
							    <div class="Area"> 
							    <div class="R">
							      <a href="#">
							    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrEyVlaWx0_FK_sz86j-CnUC_pfEqw_Xq_xZUm5CMIyEI_-X2hRUpx1BHL"/>You</a>
							    </div>    
							    <div class="text L textL">{{$reply->reply}}
							    </div>    
							  </div>
							  @endif
							  @endforeach
							  @endforeach

							  
							</div>
                        	<form action="{{ action('HomeController@post_single_ticket', $item->id) }}" method="POST" role="form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="reply_message">{{ trans('backend.message_reply')}}</label>
                                <textarea name="reply_message" id="input" class="form-control" rows="10">{{ old('reply_message') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ trans('backend.send')}}</button>
                        	</form>

						</div> <!-- End tab_details -->
						@endif
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
		<script type="text/javascript">
			function clickX()
			{
			  $(".validation").animate({ 'height': '16px' }, 500).show();
			}
		</script>
@endsection