<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReasonsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\VisitorLogController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Welcome Login Page
|--------------------------------------------------------------------------
*/
Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');

/*
|--------------------------------------------------------------------------
| Visitor Kiosk
|--------------------------------------------------------------------------
*/
Route::get('visitor-kiosk/check-in', [VisitorLogController::class, 'kioskCheckin']);
Route::get('visitor-kiosk/check-out', [VisitorLogController::class, 'kioskCheckout']);
Route::get('visitor-kiosk/get', [VisitorLogController::class, 'getVisitor']);
Route::post('visitor-kiosk/checkin', [VisitorLogController::class, 'visitorCheckin']);
Route::post('visitor-kiosk/checkout', [VisitorLogController::class, 'visitorCheckout']);

Route::middleware(['auth'])->group(function () {

    Route::middleware(['checkstatus'])->group(function () { 
            /*
            |--------------------------------------------------------------------------
            | Dashboard
            |--------------------------------------------------------------------------
            */
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard'); 

            /*
            |--------------------------------------------------------------------------
            | Visitor Log
            |--------------------------------------------------------------------------
            */
            Route::get('visitor-log', [VisitorLogController::class, 'index'])->name('visitorlog');
            Route::post('visitor-log', [VisitorLogController::class, 'filter']);
            Route::get('visitor-log/add', [VisitorLogController::class, 'add']);
            Route::post('visitor-log/store', [VisitorLogController::class, 'store']);
            Route::get('visitor-log/edit/{id}', [VisitorLogController::class, 'edit']);
            Route::post('visitor-log/update', [VisitorLogController::class, 'update']);
            Route::get('visitor-log/delete/{id}', [VisitorLogController::class, 'delete']);

            /*
            |--------------------------------------------------------------------------
            | Visitor Timeline
            |--------------------------------------------------------------------------
            */
            Route::get('visitor-timeline', [VisitorLogController::class, 'timeline'])->name('visitortimeline'); 

            /*
            |--------------------------------------------------------------------------
            | Reason for Visits
            |--------------------------------------------------------------------------
            */
            Route::get('reason-for-visits', [ReasonsController::class, 'index'])->name('reasons'); 
            Route::post('reason-for-visits/add', [ReasonsController::class, 'addReason']); 
            Route::get('reason-for-visits/delete/{id}', [ReasonsController::class, 'deleteReason']); 
            Route::get('reason-for-visits/export', [ReasonsController::class, 'exportReasons']); 
            Route::get('reason-for-visits/import-csv', [ReasonsController::class, 'importCsv']); 
            Route::post('reason-for-visits/import', [ReasonsController::class, 'importReasons']); 

            /*
            |--------------------------------------------------------------------------
            | Users
            |--------------------------------------------------------------------------
            */
            Route::get('users', [UsersController::class, 'index'])->name('users'); 
            Route::get('users/add', [UsersController::class, 'add']); 
            Route::get('users/edit/{id}', [UsersController::class, 'edit']); 
            Route::get('users/delete/{id}', [UsersController::class, 'delete']); 
            Route::post('users/store', [UsersController::class, 'store']); 
            Route::post('users/update/user', [UsersController::class, 'update']); 

            /*
            |--------------------------------------------------------------------------
            | Users Roles & Permission
            |--------------------------------------------------------------------------
            */
            Route::get('users/roles', [RolesController::class, 'index'])->name('roles');
            Route::get('users/roles/add', [RolesController::class, 'add']);
            Route::post('users/roles/store', [RolesController::class, 'store']);
            Route::get('users/roles/edit/{id}', [RolesController::class, 'edit']);
            Route::post('users/roles/update', [RolesController::class, 'update']);
            Route::get('users/roles/delete/{id}', [RolesController::class, 'delete']);
            Route::get('users/roles/permissions/edit/{id}', [RolesController::class, 'editperm']);
            Route::post('users/roles/permissions/update', [RolesController::class, 'updateperm']);

            /*
            |--------------------------------------------------------------------------
            | Update User
            |--------------------------------------------------------------------------
            */
            Route::get('account', [ProfileController::class, 'account'])->name('account'); 
            Route::post('account/profile/update', [ProfileController::class, 'updateUser']); 
            Route::post('account/password/update', [ProfileController::class, 'updatePassword']); 

            /*
            |--------------------------------------------------------------------------
            | Settings
            |--------------------------------------------------------------------------
            */
            Route::get('settings', [SettingsController::class, 'index'])->name('settings');
            Route::post('settings/update', [SettingsController::class, 'update']);

    });

});

/*
|--------------------------------------------------------------------------
| extra routes
|--------------------------------------------------------------------------
*/
Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::view('permission-denied', 'errors.permission-denied')->name('denied');
Route::view('account-disabled', 'errors.account-disabled')->name('disabled');
Route::view('account-not-found', 'errors.account-not-found')->name('notfound');

/*
|--------------------------------------------------------------------------
| auth routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
