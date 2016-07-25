
<!-- ============= Footer ================ -->
		<footer>
			<div class="top_footer container-fluid">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 part1">
							<a href="/{{Lang::getLocale()}}/home"><img src="/img/maininfo/{{$settings->getsettings()->logo}}" alt="{{$settings->getsettings()->name}}" style="width: 250px;"></a>
							<?php
			                    $limit = 120;
			                    $subject = $settings->getsettings()->description;
			                        if (strlen($subject) > $limit)
			                          $subject = substr($subject, 0, strrpos(substr($subject, 0, $limit), ' ')) . '...';
			                ?>
							<p>{{$subject}}</p>
							<ul class="p0">
								<li><a href="{{$social->getsocial()->facebook}}"><i class="fa fa-facebook"></i></a></li>
							<li><a href="{{$social->getsocial()->twitter}}"><i class="fa fa-twitter"></i></a></li>
							<li><a href="{{$social->getsocial()->gplus}}"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="{{$social->getsocial()->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>	
						<div class="col-lg-2 col-md-3 col-sm-12 part2">
							<h5>{{ trans('backend.Important Links') }}</h5>
							<ul class="p0">
								@if ($settings->getimplinks()->count())
								@foreach ($settings->getimplinks() as $implinks)
								<li><a href="{{$implinks->link}}">
									@if (Lang::getLocale() == 'ar')
										<i class="fa fa-angle-left">
									@else
										<i class="fa fa-angle-right">
									@endif
									</i>&nbsp;&nbsp;{{$implinks->title}}</a></li>
								@endforeach
								@endif
							</ul>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 part3">
							<h5>{{ trans('backend.Recent Pages') }}</h5>
							<br>
							@if ($settings->getpages()->count())
								@foreach ($settings->getpages() as $page)
								<?php
									$custom_url = $page->title;
									$path = str_replace(' ', '-', $custom_url);
									$lang = Lang::getlocale();
									if ($lang != 'ar'){
										$path = strtolower($path);
									}
								?>
								<li><a href="/{{$lang}}/page/{{$path}}">
									@if (Lang::getLocale() == 'ar')
										<i class="fa fa-angle-left">
									@else
										<i class="fa fa-angle-right">
									@endif
								</i>&nbsp;&nbsp;{{$page->title}}</a></li>
								@endforeach
							@endif				
						</div>
						<div class="col-lg-3 col-md-2 col-sm-12 part4">
							<h5>{{ trans('backend.Contacts') }}</h5>
							<br>
							<p style="color: #eee;"><i class="fa fa-phone"></i>  {{$contacts->getcontacts()->phone}}</p>
							<p style="color: #eee;">{{$contacts->getcontacts()->mail}}</p>
							<?php
									$lang = Lang::getlocale();
									if ($lang == 'en'){
	                                    $explode = explode(',', $contacts->getcoordinates()->address);
	                                    $part1 = $explode[0] .' ,'. $explode[1] .' ,'. $explode[2];
	                                    $part2 = $explode[3] .' ,'. $explode[4];
                                    }
                                ?>
                                @if ($lang == 'en')
									<p style="color: #eee;"> {{$part1}}<br><span>{{$part2}}</span></p>
								@else
									<p style="color: #eee;"> {{$contacts->getcoordinates()->address_ar}}</p>
								@endif
							
						</div>
					</div> <!-- End row -->
				</div>
			</div> <!-- End top_footer -->
			<div class="bottom_footer container-fluid">
				<div class="container">
					<p class="float_left">{{trans('backend.Copyright')}} &copy; {{$settings->getsettings()->name}} 2016. {{trans('backend.All rights reserved') }}. </p>
					<p class="float_right">{{trans('backend.Created by')}}: INNOFLAME</p>
				</div>
			</div> <!-- End bottom_footer -->
		</footer>
<!-- ============= /Footer =============== -->