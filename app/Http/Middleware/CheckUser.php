<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUser
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->user_type === "super" || auth()->user()->user_type === "doctor") {
            return $next($request);
        } else {
            return redirect()->route("patient.page");
        }
    }
}
