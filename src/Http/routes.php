<?php

/*
|--------------------------------------------------------------------------
| Laravel User Management Routes
|--------------------------------------------------------------------------
*/

Route::auth();

Route::group(['middleware' => 'auth'], function () {

	/*
	|--------------------------------------------------------------------------
	| Dashboard
	|--------------------------------------------------------------------------
	*/

	Route::get('/', ['as' => 'dashboard', 'uses' => 'Dashboard\DashboardController@index']);


	/*
	|--------------------------------------------------------------------------
	| Users crud
	|--------------------------------------------------------------------------
	*/

	Route::get('profile/{param}/edit', ['as' => 'profile.update', 'uses' => 'Users\Profile@update']);


	Route::get('users/index', ['as' => 'users.index', 'uses' => 'Users\UserController@index']);
	Route::get('users/create', ['as' => 'users.create', 'uses' => 'Users\UserController@create']);
	Route::post('users/store', ['as' => 'users.store', 'uses' => 'Users\UserController@store']);
	Route::get('users/datatable', ['as' => 'users.datatable', 'uses' => 'Users\UserController@datatable']);
	Route::delete('users/{user?}', ['as' => 'users.destroy', 'uses' => 'Users\UserController@destroy']);
	Route::get('users/{param}/edit', ['as' => 'users.edit', 'uses' => 'Users\UserController@edit']);

	/*
	|--------------------------------------------------------------------------
	| Permissions crud
	|--------------------------------------------------------------------------
	*/

	Route::get('users/{param}/permissions', ['as' => 'users.permissions', 'uses' => 'Users\PermissionController@index']);
	Route::put('users/permissions/update', ['as' => 'users.permissions.update', 'uses' => 'Users\PermissionController@update']);
	Route::get('users/{param}/login-as', ['as' => 'users.login_as', 'uses' => 'Users\PermissionController@loginAs']);
	Route::put('users/{product}/update', ['as' => 'users.update', 'uses' => 'Users\UserController@update']);

	/*
	 |--------------------------------------------------------------------------
	 | Roles crud
	 |--------------------------------------------------------------------------
	 */
	Route::get('roles/index', ['as' => 'roles.index', 'uses' => 'Users\RolesController@index']);
	Route::get('roles/changePermission', ['as' => 'roles.changePermission', 'uses' => 'Users\RolesController@changePermission']);
	Route::put('users/roles/update', ['as' => 'users.roles.update', 'uses' => 'Users\RolesController@update']);


});
