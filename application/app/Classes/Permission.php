<?php
/*
* Frontdesk - Visitor Management System
* URL: https://codecanyon.net/item/frontdesk-visitor-management-system/30860793
* Email: official.codefactor@gmail.com
* Version: 5.0
* Author: Brian Luna
* Copyright 2023 Codefactor
*/
namespace App\Classes;

use App\Models\Permissions;
use Auth;

Class Permission {

    public static $perms = [
        1 => 'dashboard',
        2 => 'visitor-log',
            21 => 'visitor-log-add',
            22 => 'visitor-log-view',
            23 => 'visitor-log-edit',
            24 => 'visitor-log-delete',
            // 25 => 'visitor-log-archive',
        3 => 'users',
            31 => 'users-add',
            32 => 'users-edit',
            33 => 'users-delete',
        4 => 'roles',
            41 => 'roles-add',
            42 => 'roles-edit',
            43 => 'roles-permission',
            44 => 'roles-delete',
        5 => 'settings',
            51 => 'settings-update',
        6 => 'timeline',
        7 => 'reason-for-visits',
            71 => 'reason-for-visits-add',
            72 => 'reason-for-visits-delete',
            73 => 'reason-for-visits-import',
            74 => 'reason-for-visits-export',
        8 => 'visitor-kiosk',
    ];

    public static function permitted($page) 
    {
        $role = \Auth::user()->role_id;

        $perms = self::$perms;

        $permid = array_search($page, $perms);

        $permcheck = Permissions::where('role_id', $role)->where('perm_id', $permid)->first();

        if ($permcheck == NULL) 
        {
            return "fail";
        } else {
            if ($permcheck->perm_id<0) 
            {
                return "fail";
            } else { 
                return "success";
            }
        }
    }

}