<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\MainInfoRequest;

use App\MainInfo;
use App\MainInfoTrans;
use Laracasts\Flash\Flash;
use Lang;
use Auth;
use App\Media;
use App\language;

class MainInfoController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $trans = '';
        $info = MainInfo::first();
        if ($info){
            $trans = MainInfoTrans::where('tid', '=', $info->id)->get()->keyBy('lang')->toArray();
        }
        return view('backend.maininfo.edit', compact('info', 'trans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MainInfoRequest $request)
    {
        $info = MainInfo::first();

        if( $request->hasFile('logo') ) {
            $file = $request->file('logo');
            //if (!empty($file)){
                $info->logo = $file->getClientOriginalName();
                $file = $file->move('img/maininfo/', $file->getClientOriginalName());
            //}
            // Now you have your file in a variable that you can do things with
        }

        // $file = $request->file('logo');
        // if (!empty($file)){
        //     $info->logo = $file->getClientOriginalName();
        //     $file = $file->move('img/maininfo/', $file->getClientOriginalName());
        // }
        
        $file = $request->file('favicon');
        if (!empty($file)){
            $info->favicon = $file->getClientOriginalName();
            $file = $file->move('img/maininfo/', $file->getClientOriginalName());
        }


        $info->save();

        // translation
        $languages = Language::all();
        if($languages->count()){
            foreach ($request->language as $language) {
                $name = 'name_'.$language.'';
                $keywords = 'keywords_'.$language.'';
                $description = 'description_'.$language.'';
                
                $info_trans = MainInfoTrans::where('tid', '=', $info->id)->where('lang', '=', $language)->first();
                if(empty($info_trans)){
                    $info_trans = new MainInfoTrans;
                }
                
                $info_trans->name = $request->$name;
                $info_trans->keywords = $request->$keywords;
                $info_trans->description = $request->$description;

                $info_trans->lang = $language;
                $info_trans->tid = $info->id;
                
                $info_trans->save();
            }
        }

        session()->forget('default_contnent_language');
        // end translation

        Flash::success(trans('backend.updated_successfully'));
        $Currentlanguage = Lang::getLocale();
        if($request->back){
            return back();
        }
        return redirect(''.$Currentlanguage.'/admin/maininfo/edit');
    }

}
