<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use App\Operation;
use App\Operation2;
use App\Userdata;
class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Filter the incoming requests.
     */
    public function req()
    {
        //
        dd("ss");
    }
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verify');
        $this->middleware('amount');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  $usertype=Auth::user()->account_type;

        if($usertype == "Superadmin"){
            return redirect()->route('indexusers');
        }else{
            $info=array();

            $sum= Operation::where(function ($query) {
                $query->where('user_id', Auth::user()->id);

            })->where(function($query) {
                $query->where('direction', 1)
                    ->orwhere('direction', 0);
            })->sum('amount');

            $totaltransactions=(int)$sum;

            $userdata=Userdata::where('user_id',Auth::user()->id)->first();
            if($userdata != null){
                $totalbalance=$userdata->balance;
                $info['totalbalance']=$totalbalance;
                $currency = $userdata->currency;
                $info['currency']=$currency;
                $info['ip']=$userdata->userIP;
                $info['notice1']=$userdata->notice1;
                $info['notice2']=$userdata->notice2;
            }

           $latest= Operation::where(function ($query) {
                $query->where('user_id', Auth::user()->id);

            })->where(function($query) {
                $query->where('direction', 1)
                    ->orwhere('direction', 0);
            })->orderBy('id','DESC')->first();




            if($latest != null){
                $latesttransaction=$latest->amount;
                $info['totaltransaction']=$totaltransactions;
                $info['recenttransaction']=$latesttransaction;
            }

            $operation2=Operation2::where('user_id',Auth::user()->id)->get();
//        dd($info);
            return view('userdashboard.userDashboard',compact('info','operation2'));

        }
    }

    public  function getuseremail(){
        return view('getuseremail');
    }
    public function useremail(Request $request){

        $data = array('name'=>"Ashikul");
        Mail::send('accountdetailemail', $data, function($message) {
            $message->to('receiver_EMAIL_would_be_here', 'DemoAshikul')->subject
            ('Laravel HTML Testing Mail');
            $message->from('sender_EMAIL_would_be_here','Ashikul');
        });
        echo "HTML Email Sent. Check your inbox.";
    }
}
