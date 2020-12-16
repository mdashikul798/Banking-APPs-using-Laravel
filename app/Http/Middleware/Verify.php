<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\TwoFactoe;
class Verify
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
        $us=Auth::user();
        $f = TwoFactoe::find(1);

        if($us->verify==0&&$f->status==1)
        {

           return redirect()->route('verify');
        }
        return $next($request);
    }
}
