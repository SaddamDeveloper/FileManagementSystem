<?php
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('dashboard', 'HomeController@index')->name('dashboard');
Route::get('admindashboard', 'AdminController@index')->name('admindashboard');
// Route::get('/employee', 'EmployeeloginController@index')->name('employee');
Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin-login');
    // Route::get('/', 'AdminController@index')->name('admindashboard');
});

Route::get('employeedashboard', 'EmployeeloginController@index')->name('employeedashboard');
Route::prefix('employee')->group(function(){
    Route::get('login', 'Auth\EmployeesloginController@showLoginForm');
    Route::post('login', 'Auth\EmployeesloginController@login')->name('employee-login');
});
// Route::get('/admin', 'AdminController@index');
// if(Auth::user()->email == 'admin@mail.com'){
//   Route::get('{path}', 'AdminController@index')->where('path', '([A-z\d-\/_.]+)?');
// }
dd(Auth::user());
// Route::get('{path}', 'HomeController@index')->where('path', '([A-z\d-\/_.]+)?');

// Route::get('{path}', 'HomeController@showAdminPanel')->where('path', '([A-z\d-\/_.]+)?');

// Route::GET('admin/home', 'AdminController@index');
