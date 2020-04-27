<?php

use App\Http\Controllers\IbrasHomepageController;
use App\Http\Controllers\IbrasUserController;
use App\Http\Controllers\IbrasAdminController;

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

// ? IbrasHomePage Routes 

Route::get('/', 'IbrasHomepageController@gotoinicio');

Route::get('/inicio', 'IbrasHomepageController@gotoinicio');

Route::get('/sobrenosotros', 'IbrasHomepageController@gotosobrenostoros');

Route::get('/menu', 'IbrasHomepageController@gotomenu');

// Route::get('/contacto/{status}', 'IbrasHomepageController@showcontactostatus');
Route::get('/contacto', 'IbrasHomepageController@gotocontacto');
Route::post('/contacto','IbrasHomepageController@storecontacto');

// Login Post
Route::post('/inicio/login','IbrasHomepageController@storelogincheck');
// Registration Post
Route::post('/inicio/registration','IbrasHomepageController@storeregistrationcheck');

// ?IbrasAdmin Routes
// Admin Home - Done
Route::get('/adminhome','IbrasAdminController@indexadmindashboard');

// Admin Menu - Need to add form changes
Route::get('/adminmenu','IbrasAdminController@indexadminmenu');
Route::get('/adminmenu/{MenuID}', 'IbrasAdminController@showadminmenuitem');

// Admin Feedback - Done
Route::get('/adminreview','IbrasAdminController@indexadminreview');
Route::get('/adminreview/{status}','IbrasAdminController@showadminreview');

// Admin Users - need to add
Route::get('/adminusers','IbrasAdminController@indexadminusers');

// Admin Enquiry - Done
Route::get('/adminenquiry','IbrasAdminController@indexadminenquiry');
Route::get('/adminenquiry/{status}','IbrasAdminController@showadminenquiry');

// Admin Timesheet - Done
Route::get('/admintimesheet','IbrasAdminController@indexadmintimesheet');

//Admin Inventory - Done
Route::get('/admininventory','IbrasAdminController@indexadmininventory');

// ?IbrasUser Routes

// User Home
Route::get('/customerhome','IbrasUserController@indexuserdashboard');
