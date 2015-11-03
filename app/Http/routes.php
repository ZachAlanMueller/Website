<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
| ssh -NL 3307:127.0.0.1:3306 mysqlclient@vms1.parlevelvms.com
*/

Route::get('/', 'work_controller@check_routes');
Route::get('/league', function() {
	return view('league');
});
