<?php
/*
* Frontdesk - Visitor Management System
* URL: https://codecanyon.net/item/frontdesk-visitor-management-system/30860793
* Email: official.codefactor@gmail.com
* Version: 5.0
* Author: Brian Luna
* Copyright 2023 Codefactor
*/
namespace App\Http\Middleware;

use Closure;
use View;

class CheckStatus
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
        $status = \Auth::user()->status;

        if ($status == null || $status == 0) 
        {
            \Auth::logout();
            
            return redirect()->route('disabled');
        } 
        
        return $next($request);
    }
}
