<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class loginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('adminDashboard.login');
    }

    public function authenticate(Request $request)
    {

       $email= $request['email'];
        $password = $request['password'];
        $data=$request->all();

        $validator = Validator::make($data, [
            'email'  => 'required',
            'password'  => 'required',

        ]);

        if ($validator->fails())
        {
            return redirect()->route('adminlogin')->withErrors($validator);
        }

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            $us=Auth::User();
            $usertype=$us->account_type;
            if($usertype == 'Superadmin' || $usertype == 'Moderator 1' || $usertype == 'Moderator 2' || $usertype == 'Moderator 3'){
    if($us->blocked == 0){
                    return redirect()->route('indexusers');

                }
                else{
                    Auth::logout();
                    return  redirect()->route('adminlogin')->with(['failed'=>'Vous êtes bloqué. S\'il vous plaît contacter admin.']);;
                }            }

            else{

                Auth::logout();
                return  redirect()->route('adminlogin');

            }
        }else{
            return  redirect()->route('adminlogin')->with(['failed'=>'Informations d\'identification non appariées.']);;

        }
    }



}
