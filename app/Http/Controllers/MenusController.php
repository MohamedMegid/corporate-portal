<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MenuRequest;
use App\Http\Controllers\Controller;

use App\Menu;
use App\MenuTrans;
use App\MenuLink;
use App\MenuLinksTrans;
use App\Page;

use Laracasts\Flash\Flash;
use Lang;
use Response;
use App\language;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $list_menus = Menu::leftJoin('menus_trans as trans', 'menus.id', '=', 'trans.tid')
             ->select('menus.*', 'trans.name', 'trans.lang', 'trans.created_at', 'trans.updated_at')->where('trans.lang', '=', Lang::getlocale());
        $menus = $list_menus->paginate(10);
        return view('backend.menus.index', compact('menus'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function list_links($menu_id)
    {
        $list_menus = Menu::leftJoin('menus_trans as trans', 'menus.id', '=', 'trans.tid')
             ->select('menus.*', 'trans.name', 'trans.lang', 'trans.created_at', 'trans.updated_at')->where('trans.lang', '=', Lang::getlocale())->where('menus.id', '=', $menu_id);
        
        $menu = $list_menus->first();
        //$links = MenuLink::where('menu_id', '=', $menu_id)->orderBy('order', 'ASC')->get();

        $list_links = MenuLink::leftJoin('menus_links_trans as trans', 'menus_links.id', '=', 'trans.tid')
             ->select('menus_links.*', 'trans.title', 'trans.link', 'trans.lang', 'trans.created_at', 'trans.updated_at')->where('trans.lang', '=', Lang::getlocale())->where('menus_links.menu_id', '=', $menu_id);
        $links = $list_links->orderBy('order', 'ASC')->get();
        
        return view('backend.menus.links.index', compact('menu', 'links'));
    }

    /**
     * sort menu links.
     *
     * @param  Request  $request
     * @return Response
     */
    public function save(Request $request, $id)
    {
        $data = json_decode($request->data);
        // level 0
        foreach ($data as $key => $value) {
            $link = MenuLink::find($value->id);
            if(!empty($value->children)){
                $link->has_children = 1;
                //level 1
                foreach ($value->children as $key_1 => $value_1) {
                    $link_1 = MenuLink::find($value_1->id);
                    if(!empty($value_1->children)){
                        $link_1->has_children = 1;
                        // level 2
                        foreach ($value_1->children as $key_2 => $value_2) {
                            $link_2 = MenuLink::find($value_2->id);
                            if(!empty($value_2->children)){
                            $link_2->has_children = 1;
                                // level 3
                                foreach ($value_2->children as $key_3 => $value_3) {
                                    $link_3 = MenuLink::find($value_3->id);
                                    if(!empty($value_3->children)){
                                        $link_3->has_children = 1;
                                        //level 4
                                        foreach ($value_3->children as $key_4 => $value_4) {
                                            $link_4 = MenuLink::find($value_4->id);
                                            $link_4->parent = $link_3->id;
                                            $link_4->order = $key_4;
                                            $link_4->save();
                                        }
                                    }
                                    else{
                                        $link_3->has_children = 0;
                                    }
                                    $link_3->parent = $link_2->id;
                                    $link_3->order = $key_3;
                                    $link_3->save();
                                }
                            }
                            else{
                                $link_2->has_children = 0;
                            }
                            $link_2->parent = $link_1->id;
                            $link_2->order = $key_2;
                            $link_2->save();
                            }
                    }
                    else{
                        $link_1->has_children = 0;
                    }
                    $link_1->parent = $link->id;
                    $link_1->order = $key_1;
                    $link_1->save();
                }
            }
            else{
                $link->has_children = 0;
            }
            $link->parent = '0';
            $link->order = $key;
            $link->save();
        }

       // return Response::json( $value->id );
        return true;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create_link()
    {
        $list_menus = Menu::leftJoin('menus_trans as trans', 'menus.id', '=', 'trans.tid')
             ->select('menus.*', 'trans.name', 'trans.lang', 'trans.created_at', 'trans.updated_at')->where('trans.lang', '=', Lang::getlocale());
        $menus = $list_menus->get();
        return view('backend.menus.links.create', compact('menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function store_link(MenuRequest $request)
    {
        $links = new MenuLink;
        $links->menu_id = $request->menu;
        $links->save();

        // translation
        $languages = Language::all();
        if($languages->count()){
            foreach ($request->language as $language) {
                $title = 'title_'.$language.'';
                $link = 'link_'.$language.'';
                $link_trans = new MenuLinksTrans;
                
                $link_trans->title = $request->$title;
                $link_trans->link = $request->$link;

                $link_trans->lang = $language;
                $link_trans->tid = $links->id;
                
                $link_trans->save();
            }
        }
        session()->forget('default_contnent_language');
        // end translation

        Flash::success(trans('backend.saved_successfully'));
        $Currentlanguage = Lang::getLocale();
        if($request->back){
            return back();
        }

        return redirect(''.$Currentlanguage.'/admin/menus/'.$links->menu_id.'/links');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit_link($menu_id, $link_id)
    {

        $link = MenuLink::find($link_id);
        $trans = MenuLinksTrans::where('tid', '=', $link_id)->get()->keyBy('lang')->toArray();

        $list_menus = Menu::leftJoin('menus_trans as trans', 'menus.id', '=', 'trans.tid')
             ->select('menus.*', 'trans.name', 'trans.lang', 'trans.created_at', 'trans.updated_at')->where('trans.lang', '=', Lang::getlocale());
        $menus = $list_menus->get();
        return view('backend.menus.links.edit', compact('menus', 'link', 'trans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update_link(MenuRequest $request, $menu_id, $link_id)
    {
        $links = MenuLink::find($link_id);
        $links->menu_id = $request->menu;
        $links->save();

        // translation
        $languages = Language::all();
        if($languages->count()){
            foreach ($request->language as $language) {
                $title = 'title_'.$language.'';
                $link = 'link_'.$language.'';

                $link_trans = MenuLinksTrans::where('tid', '=', $links->id)->where('lang', '=', $language)->first();
                if(empty($link_trans)){
                    $link_trans = new MenuLinksTrans;
                }
                
                $link_trans->title = $request->$title;
                $link_trans->link = $request->$link;

                $link_trans->lang = $language;
                $link_trans->tid = $links->id;
                
                $link_trans->save();
            }
        }
        session()->forget('default_contnent_language');
        // end translation

        Flash::success(trans('backend.saved_successfully'));
        $Currentlanguage = Lang::getLocale();
        if($request->back){
            return back();
        }
        return redirect(''.$Currentlanguage.'/admin/menus/'.$menu_id.'/links');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete_link($menu_id, $link_id)
    {
        $list_links = MenuLink::leftJoin('menus_links_trans as trans', 'menus_links.id', '=', 'trans.tid')
             ->select('menus_links.*', 'trans.title', 'trans.link', 'trans.lang', 'trans.created_at', 'trans.updated_at')->where('trans.lang', '=', Lang::getlocale())->where('menus_links.id', '=', $link_id);
        $link = $list_links->first();
        return view('backend.menus.links.confirmdelete', compact('link'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy_link($menu_id, $link_id)
    {
        //languages
        $languages = Language::all();
        if($languages->count()){
            foreach ($languages as $language) {
                $link_trans = MenuLinksTrans::where('tid', '=', $link_id)->first();
                if($link_trans) {
                    $link_trans->delete();
                }
            }
            $link = MenuLink::find($link_id);
            if (!empty($link)){
                $link->delete();
            }
        }

        Flash::success(trans('backend.deleted_successfully'));
        $Currentlanguage = Lang::getLocale();

        return redirect(''.$Currentlanguage.'/admin/menus/'.$menu_id.'/links');

    }
}