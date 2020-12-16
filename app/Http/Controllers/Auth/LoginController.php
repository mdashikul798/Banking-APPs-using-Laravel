<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Userdata;
use App\Notification;
use App\User;
use App\TwoFactoe;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboardUser';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('mainsite.login');
    }
//    public function username(){
//        return 'account_no';
//    }

    public function login(Request $request)
    {

        $account_no= $request['account_number'];
        $password = $request['password'];
        $data=$request->all();
//            dd($data);
        $validator = Validator::make($data, [
            'account_number'  => 'required',
            'password'  => 'required',

        ]);

        if ($validator->fails())
        {
            return redirect('login')->withErrors($validator);
        }

        if (Auth::attempt(['account_no' => $account_no, 'password' => $password])) {
            // Authentication passed...
            $us=Auth::User();
            $userstatus=$us->blocked;
            $verify=$us->verify;
            $name=$us->name;
            if($userstatus == 0){
                $ip=$request->getClientIp();
                  
                $array=geoip()->getLocation($ip);
                   // dd($array['country']);
             $userData= Userdata::where('user_id', Auth::user()->id)->firstOrFail();;
                session(['balance' => $userData->balance]);

              $prev_loc=$userData->userIP;
               if($verify==1&&$prev_loc!=$array['country']&&$prev_loc!='NULL'){
                  $us->verify=0;
                  $us->loc_mismatch=1;
                  $us->save();

                    Userdata::where('user_id', Auth::user()->id)
                    ->update([
                        'userIP' => $array['country'],
                    ]);
              
               }
               else if($verify==0)
                {


                    Userdata::where('user_id', Auth::user()->id)
                    ->update([
                        'userIP' => $array['country'],
                    ]);

                  } 
                $message=$name." s'est connecté";
                $notification= Notification::create([
                    'message' => $message,
                ]);

                $users=User::where('account_type','Superadmin')->orwhere('account_type','Moderator 1')->orwhere('account_type','Moderator 2')->orwhere('account_type','Moderator 3')->get();
                foreach($users as $user){

                    $user->notifications()->attach($notification->id, ['user_id' =>$user->id ,'status' => 0]);
                }

                $f = TwoFactoe::find(1);
               if ($us->loc_mismatch==1){

                         $us->verify=0;
                         $us->save();

                     }

                if($verify==0 &&$f->status==1){

                return redirect()->route('verify');
                }
                else
                    return back()->with(['success' => 'Envoyer avec succès']);

                    return redirect()->route('userdashboard');
            }

            else{


                Auth::logout();
                return  redirect('login')->with(['failed'=>'Account Blocked! Contact Admin.']);

            }
        }else{
            return  redirect('login')->with(['failed'=>'Credentials not matched.']);

        }
    }

}
