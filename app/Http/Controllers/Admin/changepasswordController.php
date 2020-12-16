<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class changepasswordController extends Controller
{
    public function getadminchangepassword(){

        $user = Auth::user();
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();


        return view('adminDashboard.changepassword', compact('count'));
    }

    public function postadminchangepassword(Request $request){

       $userid=$request['userid'];
        $oldpass=$request['old_password'];


         $user= User::where('id',$userid)->first();
         
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:6|different:old_password',
            'new_password_confirmation' => 'required',
        ]);
        if (Hash::check($oldpass, $user->password)) {
            $newpassword=Hash::make($request['new_password']);

                    User::where('id', $userid)
                     ->update([
                         'password' => $newpassword,

                        ]);
        return redirect()->back()->with('success', 'Votre nouveau mot de passe est maintenant réglé!');
        }else{
                return redirect()->back()->with('failed', 'Votre ancien mot de passe n\'est pas correct');

        }




    }
}
