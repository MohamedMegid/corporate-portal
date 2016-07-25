<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\SocialMediaRequest;

use App\SocialMedia;
use Laracasts\Flash\Flash;
use Lang;
use Auth;
use App\Media;
use App\language;

class SocialMediaController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $info = SocialMedia::first();
        return view('backend.socialmedia.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SocialMediaRequest $request)
    {
        $info = SocialMedia::first();
        $info->facebook = $request->facebook;
        $info->twitter = $request->twitter;
        $info->gplus = $request->gplus;
        $info->linkedin = $request->linkedin;
        $info->update();
        Flash::success(trans('backend.updated_successfully'));
        $Currentlanguage = Lang::getLocale();
        if($request->back){
            return back();
        }
        return redirect(''.$Currentlanguage.'/admin/social/edit');
    }

}
