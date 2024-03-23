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

use DB;

Class Table {

	public static function visitorlog() 
	{
    	$visitorlog = DB::table('table_visitorlog');
    	return $visitorlog;
  }

	public static function reasons() 
	{
    	$reasons = DB::table('table_reasons');
    	return $reasons;
  }

	public static function permissions() 
	{
    	$permissions = DB::table('users_permissions');
    	return $permissions;
  }

	public static function roles() 
	{
    	$roles = DB::table('users_roles');
    	return $roles;
  }

	public static function users() 
	{
    	$users = DB::table('users')->select('id', 'name', 'email', 'role_id', 'status');
    	return $users;
  }

	public static function settings() 
	{
    	$settings = DB::table('settings');
    	return $settings;
  }

}