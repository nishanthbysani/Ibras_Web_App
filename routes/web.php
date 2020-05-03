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

// ?----------------IbrasHomePage Routes ------------------------------------------------------------------------------------------------
// Goto Inicio Page
Route::get('/', 'IbrasHomepageController@gotoinicio');

// Goto Inicio Page
Route::get('/inicio', 'IbrasHomepageController@gotoinicio');

// Goto Sobre Nostros Page
Route::get('/sobrenosotros', 'IbrasHomepageController@gotosobrenostoros');

// Goto Menu Page
Route::get('/menu', 'IbrasHomepageController@gotomenu');

// Goto Contacto Page
Route::get('/contacto', 'IbrasHomepageController@gotocontacto');
// Contacto Page request submit
Route::post('/contacto', 'IbrasHomepageController@storecontacto');

// Login Post
Route::post('/inicio/login', 'IbrasHomepageController@storelogincheck');

// Registration Post
Route::post('/inicio/registration', 'IbrasHomepageController@storeregistrationcheck');

// Logout
Route::get('/logout', 'IbrasHomepageController@indexlogout');

// ?----------------IbrasAdmin Routes------------------------------------------------------------------------------------------------
// Admin Home
Route::get('/adminhome', 'IbrasAdminController@indexadmindashboard');

// Admin Menu - Need to add form changes
Route::get('/adminmenu', 'IbrasAdminController@indexadminmenu');
Route::get('/adminmenu/{MenuID}', 'IbrasAdminController@showadminmenuitem');
Route::post('/adminmenu/addnewitem', 'IbrasAdminController@showadminaddmenuitem');
Route::post('/adminmenu/editmenuitem', 'IbrasAdminController@showadmineditmenuitem');

// Admin Feedback - Done
Route::get('/adminreview', 'IbrasAdminController@indexadminreview');
Route::get('/adminreview/{status}', 'IbrasAdminController@showadminreview');

// Admin Users - need to add
Route::get('/adminusers', 'IbrasAdminController@indexadminusers');

// Admin Enquiry - Done
Route::get('/adminenquiry', 'IbrasAdminController@indexadminenquiry');
Route::get('/adminenquiry/{status}', 'IbrasAdminController@showadminenquiry');

// Admin Timesheet - Done
Route::get('/admintimesheet', 'IbrasAdminController@indexadmintimesheet');

//Admin Inventory - Done
Route::get('/admininventory', 'IbrasAdminController@indexadmininventory');

// Admin Profile Page
Route::get('/adminprofile', 'IbrasAdminController@indexadminprofiles');

// ?----------------IbrasUser Routes------------------------------------------------------------------------------------------------

// User Home
Route::get('/customerhome', 'IbrasUserController@indexuserdashboard');

// Menu Add Items to Cart
Route::post('/addtocart', 'IbrasUserController@storeadditemstocart');
// User Cart
Route::get('/customercart', 'IbrasUserController@indexusercart');
// Delete items from cart
Route::post('/deletefromcart', 'IbrasUserController@storedeletefromcart');
// Place Order
Route::get('/placeorder', 'IbrasUserController@indexplaceorder');
// Orders Page
Route::get('/customerorders', 'IbrasUserController@indexuserorders');
// Feedback Page
Route::get('/customerfeedback', 'IbrasUserController@indexuserfeedback');
