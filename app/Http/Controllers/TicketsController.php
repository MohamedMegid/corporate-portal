<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\TicketRequest;
use App\Http\Requests\TicketReplyRequest;
use App\Ticket;
use App\TicketReply;
use Laracasts\Flash\Flash;
use Lang;
use Auth;
use App\language;
use App\Setting;
use Config;
use Mail;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Varibales
        $title = '';
        $created_at = '';
        $last_update = '';
        $orderby = '';
        $sort = '';

        $list = Ticket::select();
        if(!empty($_GET['title'])){
            $title = $_GET['title'];
            $list->where('trans.title', 'like', '%'.$title.'%');     
        }
        if(!empty($_GET['status'])){
            $status = $_GET['status'];
            $list->where('tickets.status', '=', $status);
        }
        if(!empty($_GET['created_at'])){
            $created_at = $_GET['created_at'];
            $list->where('created_at', '>=', ''.$created_at.' 00:00:00')->where('created_at', '<=', ''.$created_at.' 23:59:59');           
        }
        if(!empty($_GET['last_update'])){
            $last_update = $_GET['last_update'];
            $list->where('updated_at', '>=', ''.$last_update.' 00:00:00')->where('updated_at', '<=', ''.$last_update.' 23:59:59');           
        }
        if(!empty($_GET['orderby']) && !empty($_GET['sort'])){
            $orderby = $_GET['orderby'];
            $sort = $_GET['sort'];
            $list->orderBy($orderby, $sort);           
        }
        
        $items = $list->paginate(10);
        // add to pagination other fields
        $items->appends(['title' => $title, 'created_at' => $created_at,
         'last_update' => $last_update, 'orderby' => $orderby, 'sort' => $sort]);

        return view('backend.tickets.index', compact('items'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;

        $reply = Ticket::where('id', '=', $id)->first();
        $reply->delete();


        Flash::success(trans('backend.deleted_successfully'));
        $Currentlanguage = Lang::getLocale();

        return redirect(''.$Currentlanguage.'/admin/tickets');
    }


    /**
     * confirm bulk delete and return resources to use it in model.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bulk_destroy_confirm(Request $request)
    {
        $items = Ticket::whereIn('id', $request->ids)->get();
        return $items;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bulk_destroy(Request $request)
    {
        $items = Ticket::find($request->ids);

        foreach ($items as $item) {
            $item->delete();
        }
        
        Flash::success(trans('backend.deleted_successfully'));
        $Currentlanguage = Lang::getLocale();
        return redirect(''.$Currentlanguage.'/admin/tickets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request)
    {
    	$tickets = Ticket::with('reply')->where('id', '=', $request->id)->orderBy('created_at', 'asc')->get();
        return view('backend.tickets.reply', compact('tickets'));
    }

    /**
     * Overide Defualt Mail settings.
     *
     * @return Response
     */
    public function mail_setting()
    {
        // config of mail
        $setting = Setting::find(1);
        $data = json_decode($setting->options);
        Config::set('mail.driver', $data->driver);
        Config::set('mail.host', $data->host);
        Config::set('mail.port', $data->port);
        Config::set('mail.from.address', $data->address);
        Config::set('mail.from.name', $data->name);
        Config::set('mail.encryption', $data->encryption);
        Config::set('mail.username', $data->user_name);
        Config::set('mail.password', $data->password);
        //end config of mail
    }


    /**
     * reply the ticket message
     *
     */
    public function store_reply(TicketReplyRequest $request, $id)
    {     

        $data = json_decode(Setting::find(1)->options);
        $ticket = Ticket::find($id);
        $this->mail_setting();
        try {
            Mail::send('emails.message', ['request' => $request], function ($msg) use($ticket, $data) {
                $msg->from($data->address, $data->name);
                $msg->to($ticket->mail);
                $msg->subject('Re:'.$ticket->subject);
            });
        } catch (\Exception $e) {
            Flash::error(trans('backend.error_sent'));
            return back();
        }

        $reply = new TicketReply;
        $reply->ticket_id = $id;
        $reply->reply = $request->reply_message;
        $reply->user_id = Auth::user()->id;
        $reply->save();

        Flash::success(trans('backend.replied_successfully'));
        $Currentlanguage = Lang::getLocale();
        return redirect(''.$Currentlanguage.'/admin/tickets/' . $id . '/reply');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function close($id)
    {
    	$item = Ticket::find($id);
        return view('backend.tickets.close', compact('item'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function close_ticket($id)
    {
    	$item = Ticket::find($id);
        $item->status = 1;
        $item->update();
        Flash::success(trans('backend.closed_successfully'));
        $Currentlanguage = Lang::getLocale();
        return redirect(''.$Currentlanguage.'/admin/tickets/' . $id . '/reply');
    }
}
