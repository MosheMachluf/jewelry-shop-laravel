<?php

namespace App\Http\Middleware;

use Closure, Session;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if (Session::get('role') == 1) return $next($request);
        else return redirect()->back();

    }
}