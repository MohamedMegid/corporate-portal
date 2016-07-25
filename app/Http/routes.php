<?php
use App\Language;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/





	
Route::get('/', 'HomeController@index');
Route::get('guest/logout', 'LoginController@postLogoutGuest');
#setting of language
$currentLocale = Language::where('main', '=', '1')->first()->code;
$listCodes = Language::lists('code');
$defaultLocale = $currentLocale;
$localeCode = Request::segment(1);
	if($listCodes->contains($localeCode)) {
	      App::setLocale($localeCode);
	}
   else {
        App::setLocale($defaultLocale);
    }

$locale = App::getLocale();
#end setting of language

Route::group(['middleware' => ['web']], function () use($locale) {

	#frontend multi langual
	Route::group([
			'prefix' => $locale,
			],function() use($locale)
	{
		App::setLocale($locale);
		//Route::get('/', 'Auth\AuthController@getadmin');
		Route::get('/', function()
		{
			return redirect('/'.Lang::getLocale().'/home');
		});

		// Guest login & registration
		Route::get('guest/login', 'LoginController@getLoginGuest');
		Route::post('guest/login', 'LoginController@postLoginGuest');

		// Registration routes...
		Route::get('register', 'LoginController@getRegisterGuest');
		Route::post('register', 'LoginController@postRegisterGuest');
		Route::get('profile', 'LoginController@getprofile');
		Route::post('profile', 'LoginController@postprofile');

		// Front routes
		Route::get('home', 'HomeController@index');
		Route::get('products', 'HomeController@products');
		Route::get('services', 'HomeController@services');
		Route::get('products/{id}', 'HomeController@single_product');
		Route::get('services/{id}', 'HomeController@single_service');
		Route::get('page/{link}', 'HomeController@page');
		Route::get('news', 'HomeController@news');
		Route::get('events', 'HomeController@events');
		Route::get('news/{id}', 'HomeController@single_news');
		Route::get('events/{id}', 'HomeController@single_event');
		Route::get('contact', 'HomeController@contact');
		Route::post('contact', 'HomeController@store_contact');
		Route::get('tickets', 'HomeController@tickets');
		Route::get('tickets/{id}', 'HomeController@single_ticket');
		Route::post('tickets/{id}', 'HomeController@post_single_ticket');
		Route::get('create/ticket', 'HomeController@create_ticket');
		Route::post('create/ticket', 'HomeController@store_create_ticket');


	});


	#Admin Routes
	Route::group([
				'prefix' => $locale,
		      	'middleware' => 'App\Http\Middleware\AdminMiddleware'
			],function()
	{	
		#System Home
		Route::get('/admin', 'DashboardController@index');
		Route::get('/dashboard', 'DashboardController@index');

		
		#Contact Us
		Route::get('admin/contacts', 'ContactsController@index');
		Route::get('admin/contacts/replied', 'ContactsController@index_replied');
		Route::get('admin/contacts/{id}', 'ContactsController@show');
		Route::get('admin/contacts/{id}/reply', 'ContactsController@reply');
		Route::post('admin/contacts/{id}', 'ContactsController@store_reply');
		Route::post('admin/destroy-contacts', 'ContactsController@destroy');
		Route::post('admin/contacts-bulk', 'ContactsController@bulk_destroy_confirm');
		Route::post('admin/contacts-bulk-destroy', 'ContactsController@bulk_destroy');
		Route::get('admin/contacts/single/{status}/contact/{id}', 'ContactsController@single_status');
		Route::post('admin/contacts/bulk/{status}', 'ContactsController@bulk_status');
		Route::get('admin/contacts-info', 'ContactsController@edit_contact_info');
		Route::post('admin/contacts-info', 'ContactsController@update_contact_info');
		Route::get('admin/contacts-gmap', 'ContactsController@edit');
		Route::post('admin/contacts-gmap', 'ContactsController@update');
			
	    # Settings
		Route::get('admin/settings/email', 'SettingsController@edit_mail');
		Route::PATCH('admin/settings/email', 'SettingsController@update_mail');
		Route::get('admin/settings/social-media', 'SettingsController@edit_social_media');
		Route::PATCH('admin/settings/social-media', 'SettingsController@update_social_media');
		Route::get('admin/settings/app-links', 'SettingsController@edit_app_links');
		Route::PATCH('admin/settings/app-links', 'SettingsController@update_app_links');


		#News
		Route::get('admin/news', 'NewsController@index');
		Route::get('admin/news/create', 'NewsController@create');
		Route::post('admin/news', 'NewsController@store');
		Route::get('admin/news/{id}/edit', 'NewsController@edit');
		Route::patch('admin/news/{id}', 'NewsController@update');
		Route::post('admin/destroy-news', 'NewsController@destroy');
		Route::post('admin/news-bulk', 'NewsController@bulk_destroy_confirm');
		Route::post('admin/news-bulk-destroy', 'NewsController@bulk_destroy');
		Route::get('admin/news/single/{status}/news/{id}', 'NewsController@single_status');
		Route::post('admin/news/bulk/{status}', 'NewsController@bulk_status');


		#Events
		Route::get('admin/events', 'EventsController@index');
		Route::get('admin/events/create', 'EventsController@create');
		Route::post('admin/events', 'EventsController@store');
		Route::get('admin/events/{id}/edit', 'EventsController@edit');
		Route::patch('admin/events/{id}', 'EventsController@update');
		Route::post('admin/destroy-events', 'EventsController@destroy');
		Route::post('admin/events-bulk', 'EventsController@bulk_destroy_confirm');
		Route::post('admin/events-bulk-destroy', 'EventsController@bulk_destroy');
		Route::get('admin/events/single/{status}/events/{id}', 'EventsController@single_status');
		Route::post('admin/events/bulk/{status}', 'EventsController@bulk_status');


		#Pages
		Route::get('admin/pages', 'PagesController@index');
		Route::get('admin/pages/create', 'PagesController@create');
		Route::post('admin/pages', 'PagesController@store');
		Route::get('admin/pages/{id}/edit', 'PagesController@edit');
		Route::patch('admin/pages/{id}', 'PagesController@update');
		Route::post('admin/destroy-pages', 'PagesController@destroy');
		Route::post('admin/pages-bulk', 'PagesController@bulk_destroy_confirm');
		Route::post('admin/pages-bulk-destroy', 'PagesController@bulk_destroy');
		Route::get('admin/pages/single/{status}/pages/{id}', 'PagesController@single_status');
		Route::post('admin/pages/bulk/{status}', 'PagesController@bulk_status');

		#Important links
		Route::get('admin/implinks', 'ImpLinksController@index');
		Route::get('admin/implinks/create', 'ImpLinksController@create');
		Route::post('admin/implinks', 'ImpLinksController@store');
		Route::get('admin/implinks/{id}/edit', 'ImpLinksController@edit');
		Route::patch('admin/implinks/{id}', 'ImpLinksController@update');
		Route::post('admin/destroy-implinks', 'ImpLinksController@destroy');
		Route::post('admin/implinks-bulk', 'ImpLinksController@bulk_destroy_confirm');
		Route::post('admin/implinks-bulk-destroy', 'ImpLinksController@bulk_destroy');
		Route::get('admin/implinks/single/{status}/links/{id}', 'ImpLinksController@single_status');
		Route::post('admin/implinks/bulk/{status}', 'ImpLinksController@bulk_status');
		

		#Products
		Route::get('admin/products', 'ProductsController@index');
		Route::get('admin/products/create', 'ProductsController@create');
		Route::post('admin/products', 'ProductsController@store');
		Route::get('admin/products/{id}/edit', 'ProductsController@edit');
		Route::patch('admin/products/{id}', 'ProductsController@update');
		Route::post('admin/destroy-products', 'ProductsController@destroy');
		Route::post('admin/products-bulk', 'ProductsController@bulk_destroy_confirm');
		Route::post('admin/products-bulk-destroy', 'ProductsController@bulk_destroy');
		Route::get('admin/products/single/{status}/links/{id}', 'ProductsController@single_status');
		Route::post('admin/products/bulk/{status}', 'ProductsController@bulk_status');


		#Services
		Route::get('admin/services', 'ServicesController@index');
		Route::get('admin/services/create', 'ServicesController@create');
		Route::post('admin/services', 'ServicesController@store');
		Route::get('admin/services/{id}/edit', 'ServicesController@edit');
		Route::patch('admin/services/{id}', 'ServicesController@update');
		Route::post('admin/destroy-services', 'ServicesController@destroy');
		Route::post('admin/services-bulk', 'ServicesController@bulk_destroy_confirm');
		Route::post('admin/services-bulk-destroy', 'ServicesController@bulk_destroy');
		Route::get('admin/services/single/{status}/links/{id}', 'ServicesController@single_status');
		Route::post('admin/services/bulk/{status}', 'ServicesController@bulk_status');

		//Main Information
		Route::get('admin/maininfo/edit', 'MainInfoController@edit');
		Route::patch('admin/maininfo/edit', 'MainInfoController@update');

		//Social Media
		Route::get('admin/social/edit', 'SocialMediaController@edit');
		Route::patch('admin/social/edit', 'SocialMediaController@update');

		# Users
		Route::get('admin/users', 'UsersController@index');
		Route::get('admin/users/create', 'UsersController@create');
		Route::post('admin/users', 'UsersController@store');
		Route::get('admin/users/{id}/edit', 'UsersController@edit');
		Route::patch('admin/users/{id}', 'UsersController@update');
		Route::post('admin/destroy-users', 'UsersController@destroy');
		Route::post('admin/users-bulk', 'UsersController@bulk_destroy_confirm');
		Route::post('admin/users-bulk-destroy', 'UsersController@bulk_destroy');
		Route::get('admin/users/single/{status}/user/{id}', 'UsersController@single_status');
		Route::post('admin/users/bulk/{status}', 'UsersController@bulk_status');
		#profile
		Route::get('admin/profile/{id}/edit', 'UsersController@edit_profile');
		Route::patch('admin/profile/{id}', 'UsersController@update_profile');

		
		#Media
		Route::get('media/browse/images', 'MediaController@browse_images');
		Route::get('media/upload/image', 'MediaController@upload_image');
		Route::post('media/upload/image', 'MediaController@store_image');
		Route::get('media/browse/gallery', 'MediaController@browse_gallery_images');
		Route::get('media/upload/gallery', 'MediaController@upload_gallery_image');
		Route::post('media/upload/gallery', 'MediaController@store_image_gallery');

		#Tickets
		Route::get('admin/tickets', 'TicketsController@index');
		Route::get('admin/tickets/{id}', 'TicketsController@show');
		Route::get('admin/tickets/{id}/reply', 'TicketsController@reply');
		Route::post('admin/tickets/{id}', 'TicketsController@store_reply');
		Route::post('admin/destroy-tickets', 'TicketsController@destroy');
		Route::post('admin/tickets-bulk', 'TicketsController@bulk_destroy_confirm');
		Route::post('admin/tickets-bulk-destroy', 'TicketsController@bulk_destroy');
		Route::get('admin/tickets/single/{status}/link/{id}', 'TicketsController@single_status');
		Route::post('admin/tickets/bulk/{status}', 'TicketsController@bulk_status');
		Route::get('admin/tickets/{id}/close', 'TicketsController@close');
		Route::post('admin/tickets/{id}/close', 'TicketsController@close_ticket');

		#Menus
		Route::get('admin/menus', 'MenusController@index');
		Route::post('admin/menus/{id}', 'MenusController@save');
		Route::get('admin/menus/{menu_id}/links', 'MenusController@list_links');
		Route::get('admin/menus/create-link', 'MenusController@create_link');
		Route::post('admin/menus', 'MenusController@store_link');
		Route::get('admin/menus/{menu_id}/links/{link_id}/edit', 'MenusController@edit_link');
		Route::patch('admin/menus/{menu_id}/links/{link_id}', 'MenusController@update_link');
		Route::get('admin/menus/{menu_id}/links/{link_id}/delete', 'MenusController@delete_link');
		Route::post('admin/menus/{menu_id}/links/{link_id}/delete', 'MenusController@destroy_link');

		#Banners
		Route::get('admin/banners', 'BannersController@index');
		Route::get('admin/banners/create', 'BannersController@create');
		Route::post('admin/banners', 'BannersController@store');
		Route::get('admin/banners/{id}/edit', 'BannersController@edit');
		Route::patch('admin/banners/{id}', 'BannersController@update');
		Route::post('admin/destroy-banners', 'BannersController@destroy');
		Route::post('admin/banners-bulk', 'BannersController@bulk_destroy_confirm');
		Route::post('admin/banners-bulk-destroy', 'BannersController@bulk_destroy');
		Route::get('admin/banners/single/{status}/videos/{id}', 'BannersController@single_status');
		Route::post('admin/banners/bulk/{status}', 'BannersController@bulk_status');
	});

	#admin login
	Route::get('admin/login', 'Auth\AuthController@getadmin');
	Route::post('admin/login', 'Auth\AuthController@postadmin');
	Route::get('logout', 'Auth\AuthController@getLogout');

	Route::group([
		      	'middleware' => 'App\Http\Middleware\AdminMiddleware'
			],function()
	{
	#System Home
		Route::get('/admin', 'DashboardController@index');
		// Route::get('/', function()
		// {
		// 	return redirect('/'.Lang::getLocale().'/home');
		// });
	});

});

