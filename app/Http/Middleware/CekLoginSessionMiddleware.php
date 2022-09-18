<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekLoginSessionMiddleware
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
        if ( 
            (session()->get('username') == '' || session()->get('username') == null )
        ) {
            if ($request->ajax()) {
                return response()->json(['message' => 'Session expired, please logged in.'], 401);
            }
            return redirect('/login');
        }
        return $next($request);
    }
}
