<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\PermissionController;
use App\Http\Controllers\User\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');


Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/logout', action: [AuthController::class, 'logout']);
    Route::get('/users', action: [AuthController::class, 'users']);

    //permission routes
    Route::get('/permission/list', action: [PermissionController::class, 'list']);
    Route::post('/permission/create', action: [PermissionController::class, 'create']);
    Route::get('/permission/{id}/edit', action: [PermissionController::class, 'edit']);
    Route::post('/permission/{id}/update', action: [PermissionController::class, 'update']);
    Route::delete('/permission/{id}/delete', action: [PermissionController::class, 'destroy']);
    //role routes
    Route::get('/role/list', action: [RoleController::class, 'list']);
    Route::post('/role/create', action: [RoleController::class, 'create']);
    Route::get('/role/{id}/edit', action: [RoleController::class, 'edit']);
    Route::post('/role/{id}/update', action: [RoleController::class, 'update']);
    Route::delete('/role/{id}/delete', action: [RoleController::class, 'destroy']);
});

