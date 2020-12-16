<?php

namespace App\Http\Middleware;

use Closure;
use App\Userdata;
use Auth;
use Session;
class amount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $today = date("Y-m-d H:i:s");
        $currentDate = strtotime($today);
        $formdata= session()->get('var');

        $userLastActivity = strtotime($formdata['timer']);

        $minutes=($currentDate - $userLastActivity) / 60;


        if(isset($formdata)){

            if($minutes > 5){
                $userData= Userdata::where('user_id', Auth::user()->id)->firstOrFail();;
                session(['balance' => $userData->balance]);
                Session::forget('var');

            }


        }
         else{
                  $userData= Userdata::where('user_id', Auth::user()->id)->firstOrFail();;

                session(['balance' => $userData->balance]);
         }


        return $next($request);
    }
}
