<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Services_Twilio;
use Aloha\Twilio\Twilio;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class VerifyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   public function verify(){
       $us=Auth::User();
        if($us->verify==1){
            return redirect()->route('home');
            die;
        }
       $numbers = range(1, 20);
       $six_digit_random_number = mt_rand(100000, 999999);

       $us->code = $six_digit_random_number;

       $us->save();
       try{
       $twilio = new Twilio('AC3dbd8fe4a5b2c716c98138102248d4bf', '3bd0978a4fa28adf94b5e5b057080823', +33644644587);
       $twilio->message($us->phone, $six_digit_random_number.' is your Cadi verification code ');

       } catch ( \Services_Twilio_RestException $e ) {

           session(['failed'=> $e->getMessage()."<a href=\"editProfile/{$us->id}\" style=\"color:blue;font-weight:bold;font-size:13px\">changement</a>" ]);

       }
       return view('verify',compact('us'));

    }
    public function verify_again(){
        $us=Auth::User();

        if($us->verify==1){
            return redirect()->route('home');
            die;
        }
        $numbers = range(1, 20);
        $six_digit_random_number = mt_rand(100000, 999999);

        $us->code = $six_digit_random_number;

        $us->save();
        try{
            $twilio = new Twilio('AC3dbd8fe4a5b2c716c98138102248d4bf', '3bd0978a4fa28adf94b5e5b057080823', +33644644587);
            $twilio->message($us->phone, $six_digit_random_number.' is your Cadi verification code ');

        } catch ( \Services_Twilio_RestException $e ) {

            session(['failed'=> $e->getMessage()."<a href=\"editProfile/{$us->id}\" style=\"color:blue;font-weight:bold;font-size:13px\">changement</a>" ]);
            return view('verify',compact('us'));

        }
        session(['success' => 'Nouveau code envoyé avec succès, veuillez patienter 5 minutes']);
        return view('verify',compact('us'));

    }
    function check_code(Request $request ){

        $us=Auth::User();

        if($us->verify==1){
            return redirect()->route('home');
            die;
        }
    $c=(int)$us->code;
    $c1=(int)$request->code;
    if ($c!=$c1){
        session(['failed'=> 'veuillez entrer le code correct']);

        return view('verify',compact('us'));
    }
    else
    {
        $us->verify=1;
        $us->loc_mismatch=0;
        $us->save();
       return redirect()->route('home');
    }


    }


}
