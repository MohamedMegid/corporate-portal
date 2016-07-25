
<!-- ======= mainmenu-area section ======= -->
		<section class="mainmenu-area stricky">
			<div class="container">
				<nav class="clearfix">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header clearfix">
				      <button type="button" class="navbar-toggle collapsed">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="fa fa-th fa-2x"></span>
				      </button>
				    </div>
					<div class="nav_main_list custom-scroll-bar pull-left" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav" id="hover_slip">
							@if ($settings->main_menu_links()->count())
								@foreach ($settings->main_menu_links() as $link)
									<li><a href="{{$link->link}}">{{$link->title}}</a></li>
								@endforeach
							@endif
						</ul>						
					</div>
				</nav> <!-- End Nav -->
			</div> <!-- End Container -->
		</section>
<!-- ======= /mainmenu-area section ======= -->