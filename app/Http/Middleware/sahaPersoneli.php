<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class sahaPersoneli
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)

    {if (Auth::check() && Auth::user()->Rol()==9)
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
