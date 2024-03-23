<?php
/*
* Frontdesk - Visitor Management System
* URL: https://codecanyon.net/item/frontdesk-visitor-management-system/30860793
* Email: official.codefactor@gmail.com
* Version: 5.0
* Author: Brian Luna
* Copyright 2023 Codefactor
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function AuthRouteAPI(Request $request) 
    {
        return $request->user();
    }
}
