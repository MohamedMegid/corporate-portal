<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\auth\LoginRequest;
use App\Language;
use Auth;
use Lang;
use App\user;


class LoginController extends Controller
{


	/**
     * Show the application login form.
     *
     * @return Response
     */
    public function getLoginGuest()
    {
        return view('frontend.users.login');
    }


    /**
     * Handle a login request to the application.
     *
     * @param  LoginRequest  $request
     * @return Response
     */
    public function postLoginGuest(LoginRequest $request)
    {
        $this->validate($request, [
            'email' => 'required', 'password' => 'required',
        ]);


        //Edit Mahmoud Eid make sure user is active
      //  $credentials = $this->getCredentials($request);
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'confirmed' => 1,
            'active' => 1
        ];


        if (Auth::attempt($credentials, $request->has('remember'))) {
            $lang = Lang::getLocale();
            return redirect(''.$lang.'/home');
        }


        return redirect(''.$lang.'/guest/login')
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }


    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    public function postLogoutGuest()
    {
        
        Auth::logout();
        return redirect('/'.Lang::getLocale().'/home')->withErrors([
            'User' => 'This user has been logged out',
        ]);
                
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getprofile()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', '=', $user_id)->first();
        return view('frontend.users.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function postprofile(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $emails = User::where('id', '!=', $user_id)->get();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        if (!empty($request->input('password'))){
            if ($request->input('password') == $request->input('password_confirmation')){
                $user->password = bcrypt($request->input('password'));
            }
            else{
                //Flash::error(trans('backend.Confirmation Password don\'t match Password'));
                return redirect('/'.Lang::getLocale().'/profile');
            }
        }
        $user->update();
        //Flash::success(trans('backend.updated_successfully'));

        return redirect('/'.Lang::getLocale().'/profile');
    }

    /**
     * Show the application registration form.
     *
     * @return Response
     */
    public function getRegisterGuest()
    {
        return view('frontend.users.register');
    }
 
    /**
     * Handle a registration request for the application.
     *
     * @param  RegisterRequest  $request
     * @return Response
     */
    public function postRegisterGuest(Request $request)
    {
        $user = new User;
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $user->name = $name;
        $user->email = $email;
        $user->phone = $phone;
        $user->active = 1;
        $user->confirmed = 1;
        $user->password = bcrypt($request->input('password'));
        $confirmation_code = str_random(30);
        $user->confirmation_code = $confirmation_code;
        $user->save();

        $role = new UserRole;
        $role->role_id = 4;
        $role->user_id = $user->id;
        $role->save();

        Flash::success(trans('backend.registered_successfully'));
        return redirect('/'.Lang::getLocale().'/guest/login'); 
    }
}
