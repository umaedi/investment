<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CheckAccessToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah access token tersedia di cookie atau tidak
        $token = $_COOKIE['access_token'];
        if(!isset($token)) {
            return redirect('/'); // Redirect jika access token tidak tersedia
        }
        $request->merge(['token' => $token]);
        return $next($request);
    }
}
