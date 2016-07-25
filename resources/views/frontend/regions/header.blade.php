<!-- =======Header ======= -->
		<header>
			<div class="container-fluid top_header">
				<div class="container">
					<p class="float_left" style="color:white;">{{trans('backend.Welcome to')}} {{$settings->getsettings()->name}} {{trans('backend.Official Website')}}</p>
					<div class="float_right">
						<ul>
							<li class="dropdown language">
		                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding: 9px 4px 11px 5px; font-size: 15px; font-weight: 800; color: #fff; line-height: 2;">
		                            @foreach($Language->all() as $lang)
		                                @if($lang->code == Lang::getLocale())
		                                    {{ $lang->name }}
		                                @endif
		                            @endforeach 
		                        </a>
		                        <ul class="dropdown-menu">
		                        @foreach($Language->all() as $lang)
		                            <?php
		                                $url = Request::url();
		                                $new_url = '';
		                                $explode = explode('/', $url);
		                                $explode[3] = $lang->code;
		                                foreach ($explode as $key => $value) {
		                                    $new_url .= $value . "/";
		                                }
		                                $new_url = substr($new_url, 0, -1);
		                            ?>
		                            <li><a href="{{$new_url}}">{{ $lang->name }}</a></li>
		                        @endforeach 
		                        </ul>
		                    </li>
				                    
							<li><a href="{{$social->getsocial()->facebook}}"><i class="fa fa-facebook"></i></a></li>
							<li><a href="{{$social->getsocial()->twitter}}"><i class="fa fa-twitter"></i></a></li>
							<li><a href="{{$social->getsocial()->gplus}}"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="{{$social->getsocial()->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
							<li>
								<div  id="search_box">
									@if ($user->getcurrentuser() != 0)
                  					<li><a href="/{{Lang::getLocale()}}/profile" style="color: #E9ECEF;">{{trans('backend.Profile') }}</a></li>
                  					<li><a href="/logout" style="color: #E9ECEF;">{{trans('backend.Log out') }}</a></li>
                  					@else
									<li><a href="/{{Lang::getLocale()}}/guest/login" style="color: #E9ECEF;">{{trans('backend.Log In') }}</i></a></li>
									<li><a href="/{{Lang::getLocale()}}/register" style="color: #E9ECEF;">{{trans('backend.Register') }}</a></li>
									@endif
									
                  					<li><a href="/{{Lang::getLocale()}}/tickets" style="color: #E9ECEF;">{{trans('backend.Tickets') }}</a></li>

								</div>
							</li>
						</ul>
					</div>
				</div> <!-- end container -->
			</div><!-- end top_header -->
			<div class="bottom_header top-bar-gradient">
				<div class="container clear_fix">
					<div class="float_left logo">
						<a href="/{{Lang::getLocale()}}/home">
							<img src="/img/maininfo/{{$settings->getsettings()->logo}}" alt="{{$settings->getsettings()->name}}" style="width: 250px;height: 70px;">
						</a>
					</div>
					<div class="float_right address">
						<div class="top-info">
							<div class="icon-box">
								<span class=" icon icon-Pointer"></span>							
							</div>
							<div class="content-box">
								<?php
									$lang = Lang::getlocale();
									if ($lang == 'en'){
	                                    $explode = explode(',', $contacts->getcoordinates()->address);
	                                    $part1 = $explode[0] .' ,'. $explode[1] .' ,'. $explode[2];
	                                    $part2 = $explode[3] .' ,'. $explode[4];
                                    }
                                ?>
                                @if ($lang == 'en')
									<p> {{$part1}}<br><span>{{$part2}}</span></p>
								@else
									<p> {{$contacts->getcoordinates()->address_ar}}</p>
								@endif
								
							</div>
						</div>
						<div class="top-info">
							<div class="icon-box">
								<span class="separator icon icon-Phone2"></span>							
							</div>
							<div class="content-box">
								<p>{{$contacts->getcontacts()->phone}}<br><span>{{$contacts->getcontacts()->mail}}</span></p>
							</div>
						</div>
						<div class="top-info">
							<div class="icon-box">
								<span class="separator icon icon-Timer"></span>
							</div>
							<div class="content-box">
								@if ($lang == 'en')
									<p>{{$contacts->getcontacts()->title}}<br><span>{{trans('backend.Services') }}</span></p>
								@else
									<p>{{$contacts->getcontacts()->title_ar}}<br><span>{{trans('backend.Services') }}</span></p>
								@endif
							</div>
						</div>
					</div>
				</div> <!-- end container -->
			</div> <!-- end bottom_header -->
		</header> <!-- end header -->
<!-- ======= /Header ======= -->