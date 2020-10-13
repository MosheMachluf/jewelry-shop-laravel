<?php

namespace App\Http\Middleware;

use Closure, Session;

class CmsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if (Session::get('role') <= 2) return $next($request);
        else return redirect('user/signin');

    }
}