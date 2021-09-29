<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()){
            $student = Auth::user();
            if ($student["groupId"] == 0){
                return redirect("/login/add");
            }

            return $next($request);
        }
    }
}
