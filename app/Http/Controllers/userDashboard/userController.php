<?php

namespace App\Http\Controllers\userdashboard;

use App\Operation;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use App\User;
use App\Userdata;
use Illuminate\Support\Facades\Validator;
use DateTime;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notification;



class userController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verify');
        $this->middleware('amount');

    }



    public function showTransfer()
    {

        $check = session()->get('var');

        if (isset($check)) {
            return redirect()->route('getfirstverification');
        } else {

        $info = array();
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

        return view('userdashboard.transfer', compact('info'));
    }
    }

    public function showOperations(){
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

        $operations=Operation::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();


        return view('userdashboard.operations',compact('info','operations'));
    }




     public function user_transfer(Request $request){

             $this->validate($request, [

                 'code_bic' => 'required',

                 'account_number' => 'required',
                 'bank' => 'required',
                 'bank_address' => 'required',
                 'holder_name' => 'required',
                 'amount' => 'required|numeric',

             ]);

             $userid=$request["userid"];

             $userdata=User::where('id',$userid)->with('account')->first();
         $description="Transfert";
         $comment="Echec du transfert";
         $today = date("Y-m-d");

         Operation::create([
             'codeiban' => $request['code_iban'],
             'codebic' => $request['code_bic'],
             'account_from'=> $userdata->account_no,
             'account_to'=> $request['account_number'],
             'description'=> $description,
             'direction'=> 2,
             'amount'=> $request['amount'],
             'user_id' => $userid,
             'holderName'=> $request['holder_name'],
             'comment'=> $comment,
             'date'=> $today,
             'bank_address'=> $request['bank_address'],

             'bank'=> $request['bank'],

         ]);



             if($userdata->account == null) {
                 return redirect()->back()->with(['failed'=>'Vous n\'avez pas de solde dans votre compte.']);
             }
             $useraccount=$userdata->account_no;
//        dd($userdata);

             $amountcheck=$userdata->account->balance - $userdata->account->minimum_balance;
             $currency=$userdata->account->currency;

             if($amountcheck < $request['amount']){
                 return redirect()->route('userdashboard')->with(['failed'=>'Vous avez un solde insuffisant pour cette transaction. Vous pouvez retirer le maximum '.$currency.$amountcheck]);
             }
             else{
                 $timedate = date("Y-m-d H:i:s");


                 $sessiondata=array();

                 $sessiondata['codeiban'] = $request['codeiban'];
                 $sessiondata['codebic'] = $request['codeiban'];
                 $sessiondata['account_to'] = $request['account_number'];
                 $sessiondata['amount'] = $request['amount'];
                 $sessiondata['bank'] = $request['bank'];
                 $sessiondata['timer'] = $timedate;
                 $sessiondata['holderName'] = $request['holder_name'];
                 $sessiondata['bankAddress'] = $request['bank_address'];


                 session(['var' => $sessiondata]);

//            Userdata::where('user_id', $userid)
//                ->update([
//                    'balance' => $userdata->account->balance - $request['amount'],
//                ]);
                 $tempbalance= session()->get('balance');

                 $tempbalance=$tempbalance-$request['amount'];
                 session(['balance' => $tempbalance]);



                 $name=$userdata->name;
                 $email=$userdata->email;
                 $account=$userdata->account_no;
                 $data1 = array('name'=>$userdata->name, 'account_no'=>$account);

                 Mail::send('mailtransferconfirm', $data1, function($message) use ($email, $name) {
                     $message->to($email, $name)->subject
                     ('Transfer Confirmation');
                 });
                 return redirect()->route('getfirstverification');

             }






    }


    public function getfirstverification(){
        $get= session()->get('var');
if(!isset($get)){
    return redirect()->route('userdashboard');
}else{
    $user=Auth::user();
    $userid=$user->id;
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


    $titlemessage=Userdata::where('user_id',$userid)->first();

    $title=$titlemessage->title1;
    $message=$titlemessage->message1;

    return view('userdashboard.verification1',compact('info','title','message'));
}

    }


    public  function firstverification(Request $request){
        $this->validate($request, [
            'code' => 'required',

        ]);

        $checkcode=$request['code'];
        $userid=$request['userid'];
        $userdata=User::where('id',$userid)->with('account')->first();

        if($userdata->account->code1 != $checkcode){

            $get= session()->get('var');
               $description="Transfert";
            $comment="Echec du transfert";
            $today = date("Y-m-d");

            Operation::create([
                'codeiban' => $get['codeiban'],
                'codebic' => $get['codebic'],
                'account_from'=> $userdata->account_no,
                'account_to'=> $get['account_to'],
                'description'=> $description,
                'direction'=> 2,
                'amount'=> $get['amount'],
                'user_id' => $userid,
                'holderName'=> $get['holderName'],
                'comment'=> $comment,
                'date'=> $today,
                'bank_address'=> $get['bankAddress'],

                'bank'=> $get['bank'],

            ]);

            Session::forget('var');
            return redirect()->route('userdashboard')->with(['failed'=>'Vous avez entré un code erroné']);
        }else{

            return redirect()->route('getsecondverification');
        }

    }

    public function getsecondverification(){
                $get= session()->get('var');

        if(!isset($get)){
            return redirect()->route('userdashboard');
        }else {
            $user = Auth::user();
            $userid = $user->id;
            $info = array();
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

            $titlemessage = Userdata::where('user_id', $userid)->first();

            $title = $titlemessage->title2;
            $message = $titlemessage->message2;

            return view('userdashboard.verification2', compact('info', 'title', 'message'));
        }
    }


    public  function secondverification(Request $request){
        $this->validate($request, [
            'code' => 'required',

        ]);

        $checkcode=$request['code'];
        $userid=$request['userid'];
        $userdata=User::where('id',$userid)->with('account')->first();

        if($userdata->account->code2 != $checkcode){
            $get= session()->get('var');
               $description="Transfert";
            $comment="Echec du transfert";
            $today = date("Y-m-d");

            Operation::create([
                'codeiban' => $get['codeiban'],
                'codebic' => $get['codebic'],
                'account_from'=> $userdata->account_no,
                'account_to'=> $get['account_to'],
                'description'=> $description,
                'direction'=> 2,
                'amount'=> $get['amount'],
                'user_id' => $userid,
                'holderName'=> $get['holderName'],
                'comment'=> $comment,
                'date'=> $today,
                'bank_address'=> $get['bankAddress'],

                'bank'=> $get['bank'],

            ]);


            Session::forget('var');
            return redirect()->route('userdashboard')->with(['failed'=>'Vous avez entré un code erroné']);
        }else{
            return redirect()->route('getthirdverification');

        }

    }

    public function getthirdverification(){
                $get= session()->get('var');

        if(!isset($get)){
            return redirect()->route('userdashboard');
        }else {
            $user = Auth::user();
            $userid = $user->id;
            $info = array();
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
            $titlemessage = Userdata::where('user_id', $userid)->first();

            $title = $titlemessage->title3;
            $message = $titlemessage->message3;

            return view('userdashboard.verification3', compact('info', 'title', 'message'));
        }
    }

    public  function thirdverification(Request $request){
        $this->validate($request, [
            'code' => 'required',

        ]);

        $checkcode=$request['code'];
        $userid=$request['userid'];
        $userdata=User::where('id',$userid)->with('account')->first();

        $today = date("Y-m-d H:i:s");
        $currentDate = strtotime($today);
        $get= session()->get('var');

        $userLastActivity = strtotime($get['timer']);
        $minutes=($currentDate - $userLastActivity) / 60;


        if($userdata->account->code3 != $checkcode){
            $get= session()->get('var');
   $description="Transfert";
            $comment="Echec du transfert";
            $today = date("Y-m-d");

            Operation::create([
                'codeiban' => $get['codeiban'],
                'codebic' => $get['codebic'],
                'account_from'=> $userdata->account_no,
                'account_to'=> $get['account_to'],
                'description'=> $description,
                'direction'=> 2,
                'amount'=> $get['amount'],
                'user_id' => $userid,
                'holderName'=> $get['holderName'],
                'comment'=> $comment,
                'date'=> $today,
                'bank_address'=> $get['bankAddress'],

                'bank'=> $get['bank'],

            ]);
            Userdata::where('user_id', $userid)
                ->update([
                    'balance' => $userdata->account->balance + $get['amount'],
                ]);
            Session::forget('var');
            return redirect()->route('userdashboard')->with(['failed'=>'Vous avez entré un code erroné']);
        }
        elseif($minutes > 5){
            $get= session()->get('var');
   $description="Transfert";
            $comment="Echec du transfert";
            $today = date("Y-m-d");

            Operation::create([
                'codeiban' => $get['codeiban'],
                'codebic' => $get['codebic'],
                'account_from'=> $userdata->account_no,
                'account_to'=> $get['account_to'],
                'description'=> $description,
                'direction'=> 2,
                'amount'=> $get['amount'],
                'user_id' => $userid,
                'holderName'=> $get['holderName'],
                'comment'=> $comment,
                'date'=> $today,
                'bank_address'=> $get['bankAddress'],

                'bank'=> $get['bank'],

            ]);

            Session::forget('var');

            return redirect()->route('userdashboard')->with(['failed'=>'limite de 5 minutes dépassée']);

        }
        else{

            $description="Transfert";
            $comment="Transaction éffectuée";
            $today = date("Y-m-d");

            $get= session()->get('var');
//            dd($get['codeiban']);

            Operation::create([
                'codeiban' => $get['codeiban'],
                'codebic' => $get['codebic'],
                'account_from'=> $userdata->account_no,
                'account_to'=> $get['account_to'],
                'description'=> $description,
                'direction'=> 0,
                'amount'=> $get['amount'],
                'user_id' => $userid,
                'holderName'=> $get['holderName'],
                'comment'=> $comment,
                'date'=> $today,
                'bank_address'=> $get['bankAddress'],

                'bank'=> $get['bank'],

            ]);

            $newbalance=$userdata->account->balance - $get['amount'];

//            dd($newbalance);

            Userdata::where('user_id', $userid)
                ->update([
                    'balance' => $newbalance,
                ]);
            Session::forget('var');

            return redirect()->route('userdashboard')->with(['transfer'=>'successfull']);
        }

    }
    }