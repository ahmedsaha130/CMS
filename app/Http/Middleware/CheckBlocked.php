<?php

namespace App\Http\Middleware;

use Closure;

class CheckBlocked
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
//        if(auth()->check() && (auth()->user()->status() == 'Inactive')){
//            Auth::logout();
//
//            $request->session()->invalidate();
//
//            $request->session()->regenerateToken();
//
//            return redirect()->route('admin.login')->with('error', 'Your Account is suspended, please contact Admin.');
//
//        }

        return $next($request);
    }
}
