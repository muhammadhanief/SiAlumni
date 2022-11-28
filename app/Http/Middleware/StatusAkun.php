<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StatusAkun
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
        if (auth()->user()->statusAkun == "Pending") {
            return response()->view('alumni.pendingverif');
        }
        if (auth()->user()->statusAkun == "Ditolak") {
            return response()->view('alumni.ditolakverif');
        }
        return $next($request);
    }
}
