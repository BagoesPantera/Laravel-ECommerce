<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CookieCheck
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
        $check = new Request();
        $checks = $check->hascookie("theme");#kalau bingung, baca https://stackoverflow.com/questions/18339716/why-im-getting-non-static-method-should-not-be-called-statically-when-invokin
        if($checks){
           return redirect('/setcookie');
        }
        #this doesnt rlly help...
    }
}