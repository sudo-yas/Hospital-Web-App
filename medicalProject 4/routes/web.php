<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('/');

Route::get('/inner', function () {
    return view('inner-page');
})->name('/inner');

Route::get('/sidebar', function () {
    return view('sidebar');
});


Route::get('/inscription', 'App\Http\Controllers\UserController@createUserForm')->name('UserRegister');
 //->middleware('alreadyLoggedIn');
Route::post('/inscription', 'App\Http\Controllers\UserController@UserForm')->name('inscription');
  //->middleware('alreadyLoggedIn');

Route::get('/login','App\Http\Controllers\LOGIN@LoginForm')->middleware('alreadyLoggedIn');
Route::post('/login','App\Http\Controllers\LOGIN@Login')->name('Login')->middleware('alreadyLoggedIn');

Route::get('dashboardP','App\Http\Controllers\LOGIN@dashboardP')->middleware('isloggedIn');
Route::get('dashboardD','App\Http\Controllers\LOGIN@dashboardD')->middleware('isloggedIn');
Route::get('dashboardA','App\Http\Controllers\LOGIN@dashboardA')->middleware('isloggedIn');

Route::get('logout','App\Http\Controllers\LOGIN@Logout')->name('logout');


/*====Patient Pages===*/
Route::get('/dashboardP/doctorsList',function(){
    return view('dashs.patientDash2');
})->name('doctorsList')->middleware('isloggedIn');

Route::get('/dashboardP/yourAppointements',function(){
    return view('dashs.patientDash4');
})->name('yourAppointements')->middleware('isloggedIn');

Route::post('dashboardP/doctorsList','App\Http\Controllers\Message@Msg')->name('Msg')->middleware('isloggedIn');
//+Reserve

/*====Doctor Pages===*/
Route::get('dashboardD/yourAppointements',function(){
    return view('dashs.doctorDash2');
})->name('yourAppointements')->middleware('isloggedIn');

Route::get('dashboardD/yourMessages',function(){
    return view('dashs.doctorDash3');
})->name('yourMessages')->middleware('isloggedIn');

Route::post('dashboardD','App\Http\Controllers\AppointmentController@av')->name('a')->middleware('isloggedIn');

Route::get('dashboardD/yourAppointements/delete/{id}','App\Http\Controllers\AppointmentController@Delete_D')->name('delete_Dapp');

/*====Admin Pages===*/
Route::get('/dashboardA/users',function(){
    return view('dashs.adminDash2');
})->name('AllUsers')->middleware('isloggedIn');

Route::get('/dashboardA/messages',function(){
    return view('dashs.adminDash3');
})->name('AllMessages')->middleware('isloggedIn');

Route::get('dashboardA/messages/delete/{id}','App\Http\Controllers\Message@Delete_mes')->name('delete_mes');
Route::get('dashboardA/delete/{id}','App\Http\Controllers\AppointmentController@Delete')->name('delete_app');
Route::get('dashboardA/users/delete/{id}','App\Http\Controllers\UserController@Delete')->name('delete_user');




/****   */

Route::post('dashs.patientDash/{id}', 'App\Http\Controllers\AppointmentController@update')->name('res');

// Profil patient
Route::post('dashboardP/patientProfil/{id}', 'App\Http\Controllers\UserController@update')->name('patientP');

Route::get('/dashboardP/patientProfil',function(){
    return view('dashs.patientDashProfil');
})->name('patientProfil')->middleware('isloggedIn');

// Patient Messages
Route::post('/dashboardD/yourMessages','App\Http\Controllers\Message@Msg')->name('Msg')->middleware('isloggedIn');
Route::get('dashboardP/yourMessages',function(){
    return view('dashs.patientDash3');
});

// Profil doctor
Route::post('dashboardD/doctorProfil/{id}', 'App\Http\Controllers\UserController@update')->name('doctorP');

Route::get('/dashboardD/doctorProfil',function(){
    return view('dashs.doctorDashProfil');
})->name('doctorProfil')->middleware('isloggedIn');


