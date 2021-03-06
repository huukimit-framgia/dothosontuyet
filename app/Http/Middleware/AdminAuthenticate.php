<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::user()) {
            $user = Auth::user();
            if (1 == $user->groupid && $user->actived && !$user->blocked) {
                return $next($request);
            } else {
                return redirect('/')->with(['message' => ['status' => 'danger', 'message' => 'Forbidden']]);
            }
        } else {
            return redirect()->guest('login');
        }
    }
}
