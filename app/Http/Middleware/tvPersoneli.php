<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class tvPersoneli
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
        if (Auth::check() && Auth::user()->Rol()==3)
        {
            return $next($request);
        }

        else
        {
            alert()
                ->error('Hata !', 'Yetkisi Giris !')
                ->autoClose(1000);
            return back();
        }
    }
}
