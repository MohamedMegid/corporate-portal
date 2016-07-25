<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ContactsRequest;
use App\Http\Requests\TicketReplyRequest;

use App\MainInfo;
use App\MainInfoTrans;
use Laracasts\Flash\Flash;
use Lang;
use Auth;
use App\Media;
use App\language;

use App\Products;
use App\ProductsTrans;

use App\Services;
use App\ServicesTrans;

use App\SocialMedia;

use App\Contact;
use App\ContactInfo;
use App\Gmap;
use App\ContactUsPhone;

use App\MenuLink;
use App\MenuLinksTrans;

use App\Banners;
use App\BannersTrans;

use App\Events;
use App\EventsTrans;

use App\News;
use App\NewsTrans;

use App\ImpLinks;
use App\ImpLinksTrans;

use App\Pages;
use App\PagesTrans;

use App\Ticket;
use App\TicketReply;

class HomeController extends Controller
{
    /**
     * Show the form for rendering the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::leftJoin('products_trans as trans', 'products.id', '=', 'trans.tid')->with('image')
             ->select('products.*', 'trans.lang', 'trans.title', 'trans.description', 'trans.created_at', 'trans.updated_at')->where('trans.lang', '=', Lang::getlocale())->get();
        
        $services = Services::leftJoin('services_trans as trans', 'services.id', '=', 'trans.tid')->with('image')
             ->select('services.*', 'trans.lang', 'trans.title', 'trans.description', 'trans.created_at', 'trans.updated_at')->where('trans.lang', '=', Lang::getlocale())->get();

        $banners = Banners::leftJoin('banners_trans as trans', 'banners.id', '=', 'trans.tid')->with('image')
             ->select('banners.*', 'trans.lang', 'trans.title', 'trans.link', 'trans.created_at', 'trans.updated_at')->where('trans.lang', '=', Lang::getlocale())->get();

        $settings = $this->getsettings();

        $events = Events::leftJoin('events_trans as trans', 'events.id', '=', 'trans.tid')->with('image')
             ->select('events.*', 'trans.lang', 'trans.title', 'trans.summary', 'trans.body', 'trans.created_at', 'trans.updated_at')->where('events.published', '=', 1)->where('trans.lang', '=', Lang::getlocale())->orderBy('created_at', 'desc')->get();

        $news = News::leftJoin('news_trans as trans', 'news.id', '=', 'trans.tid')->with('image')
             ->select('news.*', 'trans.lang', 'trans.title', 'trans.summary', 'trans.body', 'trans.created_at', 'trans.updated_at')->where('news.published', '=', 1)->where('trans.lang', '=', Lang::getlocale())->orderBy('created_at', 'desc')->get();


        return view('frontend.home', compact('products', 'services', 'banners', 'settings', 'events', 'news'));
    }

    /**
     * Show the form for getting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getsettings()
    {
        $trans = '';
        $info = MainInfo::first();
        if ($info){
            $trans = MainInfoTrans::where('tid', '=', $info->id)->get()->keyBy('lang')->toArray();
        }

        $list = MainInfo::leftJoin('maininfo_trans as trans', 'maininfo.id', '=', 'trans.tid')
             ->select('maininfo.*', 'trans.lang', 'trans.name', 'trans.keywords', 'trans.description', 'trans.created_at', 'trans.updated_at')->where('trans.lang', '=', Lang::getlocale());
        $settings = $list->first();
        return $settings;
    }

     /**
     * Show the form for getting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getcurrentuser()
    {
        $user_id = 0;
        if (!empty(Auth::user()->id)){
            $user_id = Auth::user()->id;
        }
        return $user_id;
    }

    /**
     * Show the form for getting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getsocial()
    {
        $social = SocialMedia::first();
        return $social;
    }

    /**
     * Show the form for getting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getcontacts()
    {
        // $contact = ContactInfo::first();
        // $contact_id = $contact['attributes']['id'];
        // $phones = ContactUsPhone::where('contact_id', '=', $contact_id)->get();

        $contact = ContactInfo::leftJoin('contact_us_phones as phones', 'contact_info.id', '=', 'phones.contact_id')
             ->select('*')->first();
        
        return $contact;
    }

    /**
     * Show the form for getting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getcoordinates()
    {
        $location = Gmap::first();
        return $location;
    }

    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function main_menu_links()
    {
        $main_menu =  MenuLink::leftJoin('menus_links_trans as trans', 'menus_links.id', '=', 'trans.tid')->where('menus_links.menu_id', '=', 1)->where('trans.lang', '=', Lang::getlocale())
             ->select('*')->orderBy('order', 'asc')->get();
        return $main_menu;
    }


    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function getimplinks()
    {
        $links = ImpLinks::leftJoin('implinks_trans as trans', 'implink.id', '=', 'trans.tid')
                 ->select('implink.*', 'trans.lang', 'trans.title', 'trans.link', 'trans.created_at', 'trans.updated_at')->where('trans.lang', '=', Lang::getlocale())->get();
        return $links;
    }

    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function getpages()
    {
        $pages = Pages::leftJoin('pages_trans as trans', 'pages.id', '=', 'trans.tid')
             ->select('pages.*', 'trans.lang', 'trans.title', 'trans.body', 'trans.created_at', 'trans.updated_at')->where('trans.lang', '=', Lang::getlocale())->take(5)->get();
        return $pages;
    }

    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function products()
    {
        $products = Products::leftJoin('products_trans as trans', 'products.id', '=', 'trans.tid')->with('image')
             ->select('products.*', 'trans.lang', 'trans.title', 'trans.description', 'trans.created_at', 'trans.updated_at')->where('trans.lang', '=', Lang::getlocale())->get();
        return view('frontend.products.index', compact('products'));
    }

    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function services()
    {
        $services = Services::leftJoin('services_trans as trans', 'services.id', '=', 'trans.tid')->with('image')
             ->select('services.*', 'trans.lang', 'trans.title', 'trans.description', 'trans.created_at', 'trans.updated_at')->where('trans.lang', '=', Lang::getlocale())->get();
        return view('frontend.services.index', compact('services'));
    }

    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function single_product($id)
    {
        $product = Products::leftJoin('products_trans as trans', 'products.id', '=', 'trans.tid')->with('image')
             ->select('products.*', 'trans.lang', 'trans.title', 'trans.description', 'trans.created_at', 'trans.updated_at')->where('trans.lang', '=', Lang::getlocale())->where('products.id', '=', $id)->first();
        return view('frontend.products.single', compact('product'));
    }

    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function single_service($id)
    {
        $service = Services::leftJoin('services_trans as trans', 'services.id', '=', 'trans.tid')->with('image')
             ->select('services.*', 'trans.lang', 'trans.title', 'trans.description', 'trans.created_at', 'trans.updated_at')->where('trans.lang', '=', Lang::getlocale())->where('services.id', '=', $id)->first();
        return view('frontend.services.single', compact('service'));
    }

    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function page($link)
    {
        $link = "/" . Lang::getlocale() . "/page/" . $link;
        $page = Pages::leftJoin('pages_trans as trans', 'pages.id', '=', 'trans.tid')
             ->select('pages.*', 'trans.lang', 'trans.title', 'trans.body', 'trans.created_at', 'trans.updated_at')->where('trans.lang', '=', Lang::getlocale())->where('trans.path', '=', $link)->first();
        return view('frontend.pages.single', compact('page'));
    }

    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function news()
    {
        $news = News::leftJoin('news_trans as trans', 'news.id', '=', 'trans.tid')->with('image')
             ->select('news.*', 'trans.lang', 'trans.title', 'trans.summary', 'trans.body', 'trans.created_at', 'trans.updated_at')->where('news.published', '=', 1)->where('trans.lang', '=', Lang::getlocale())->orderBy('created_at', 'desc')->get();
        return view('frontend.news.index', compact('news'));
    }

    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function single_news($id)
    {
        $news = News::leftJoin('news_trans as trans', 'news.id', '=', 'trans.tid')->with('image')
             ->select('news.*', 'trans.lang', 'trans.title', 'trans.summary', 'trans.body', 'trans.created_at', 'trans.updated_at')->where('news.published', '=', 1)->where('trans.lang', '=', Lang::getlocale())->orderBy('created_at', 'desc')->where('news.id', '=', $id)->first();
        return view('frontend.news.single', compact('news'));
    }

    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function events()
    {
        $events = Events::leftJoin('events_trans as trans', 'events.id', '=', 'trans.tid')->with('image')
             ->select('events.*', 'trans.lang', 'trans.title', 'trans.summary', 'trans.body', 'trans.created_at', 'trans.updated_at')->where('events.published', '=', 1)->where('trans.lang', '=', Lang::getlocale())->orderBy('created_at', 'desc')->get();
        return view('frontend.events.index', compact('events'));
    }

    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function single_event($id)
    {
        $events = Events::leftJoin('events_trans as trans', 'events.id', '=', 'trans.tid')->with('image')
             ->select('events.*', 'trans.lang', 'trans.title', 'trans.summary', 'trans.body', 'trans.created_at', 'trans.updated_at')->where('events.published', '=', 1)->where('trans.lang', '=', Lang::getlocale())->orderBy('created_at', 'desc')->where('events.id', '=', $id)->first();
        return view('frontend.events.single', compact('events'));
    }

    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function contact()
    {
        $contacts = $this->getcontacts();
        $location = $this->getcoordinates();
        $phones = ContactUsPhone::all();
        return view('frontend.contactus.index', compact('contacts', 'location', 'phones'));
    }

    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function store_contact(ContactsRequest $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->mail = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->user_id = Auth::user()->id;
        $contact->reply_status = 2;
        $contact->save();
        Flash::success(trans('backend.sent_successfully'));
        $Currentlanguage = Lang::getLocale();
        return redirect(''.$Currentlanguage.'/contact');
    }

    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function tickets()
    {
        $tickets = '';
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $tickets = Ticket::where('user_id', '=', $user_id)->get();
        }
        return view('frontend.tickets.index', compact('tickets'));
    }

    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function single_ticket($id)
    {
        $tickets = Ticket::with('reply')->where('id', '=', $id)->orderBy('created_at', 'asc')->get();
        return view('frontend.tickets.single', compact('tickets'));
    }

    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function post_single_ticket(TicketReplyRequest $request,$id)
    {
        $reply = new TicketReply;
        $reply->ticket_id = $id;
        $reply->reply = $request->reply_message;
        $reply->user_id = Auth::user()->id;
        $reply->save();

        Flash::success(trans('backend.replied_successfully'));
        $Currentlanguage = Lang::getLocale();
        return redirect(''.$Currentlanguage.'/tickets/' . $id);
    }

    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function create_ticket()
    {
        return view('frontend.tickets.create');
    }

    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function store_create_ticket(Request $request)
    {
        $ticket = new Ticket;
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->status = 2;
        $ticket->user_id = Auth::user()->id;
        $ticket->save();

        Flash::success(trans('backend.replied_successfully'));
        $Currentlanguage = Lang::getLocale();
        return redirect(''.$Currentlanguage.'/tickets');
    }
}
