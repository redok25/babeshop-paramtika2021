<?php

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

Route::get('/', 'GeneralController@welcome'); //homepage
Route::get('barbers', 'GeneralController@barbers'); //barbers page
Route::get('pricing', 'GeneralController@pricing'); //pricing page
Route::get('about', 'GeneralController@about'); //about page
Route::get('galery', 'GeneralController@galery'); //galery page
Route::get('contact', 'GeneralController@contact'); //contact page

	//booking proses
	Route::get('booking', 'GeneralController@booking'); //booking page
	Route::get('aw56da6d4a65d4a65d4asad5awa5d4wa654d6a5d4a65d4aw65d4aw65d4aw65d4aw65', 'GeneralController@bookingdummy'); //booking proses1
	Route::get('booking/service/{id}', 'GeneralController@booking1'); //booking proses1
	Route::post('booking/proses','GeneralController@bookingProses'); //booking proses 
	Route::get('booking/invoice','GeneralController@bookingInvoice'); //booking ivoice 



//feedback
Route::get('feedback', 'GeneralController@feedback'); //feedback page
Route::post('feedback/proses', 'GeneralController@feedbackProses'); //feedback proses

//auth
Route::get('admin/login','GeneralController@adminLogin'); //login page
Route::get('admin/logout','GeneralController@adminLogout'); //logout page
Route::post('admin/auth', 'GeneralController@adminAuth'); //auth proses
Route::post('admin/changePassword','GeneralController@adminChangePassword'); //change password proses

//admin
Route::get('admin','GeneralController@admin'); //admin panel
	//pages
	Route::get('admin/pages/home','GeneralController@pagesHome'); //home page editor
	Route::post('admin/pages/home/proses','GeneralController@pagesHomeProses'); //homepage editor proses
	Route::get('admin/pages/about','GeneralController@pagesAbout'); //about page editor
	Route::post('admin/pages/about/proses','GeneralController@pagesAboutProses'); //about page editor proses
	Route::get('admin/pages/barbers','GeneralController@pagesBarbers'); //barbers page editor
	Route::post('admin/pages/barbers/proses','GeneralController@pagesBarbersProses'); //barbers page editor proses
	Route::get('admin/pages/galery','GeneralController@pagesGalery'); //galery page editor
	Route::post('admin/pages/galery/proses','GeneralController@pagesGaleryProses'); //galery page editor proses
	Route::get('admin/pages/feedback','GeneralController@pagesFeedback'); //feedback page editor
	Route::post('admin/pages/feedback/proses','GeneralController@pagesFeedbackProses'); //feedback page editor proses
	Route::get('admin/pages/pricing','GeneralController@pagesPricing'); //pricing page editor
	Route::post('admin/pages/pricing/proses','GeneralController@pagesPricingProses'); //pricing page editor proses
	Route::get('admin/pages/booking','GeneralController@pagesBooking'); //booking page editor
	Route::post('admin/pages/booking/proses','GeneralController@pagesBookingProses'); //booking page editor proses
	Route::get('admin/pages/contact','GeneralController@pagesContact'); //contact page editor
	Route::post('admin/pages/contact/proses','GeneralController@pagesContactProses'); //contact page editor proses

	//barber
	Route::get('admin/barbers', 'GeneralController@adminBarber'); //barber panel
	Route::post('admin/barbers/add', 'GeneralController@adminBarberAdd'); //barber new proses
	Route::post('admin/barbers/edit', 'GeneralController@adminBarberEdit'); //barber edit proses
	Route::get('admin/barbers/delete/{id}', 'GeneralController@adminBarberDelete'); //barber edit proses

	//service
	Route::get('admin/services', 'GeneralController@adminService'); //service panel
	Route::post('admin/services/add', 'GeneralController@adminServiceAdd'); //service new proses
	Route::post('admin/services/edit', 'GeneralController@adminServiceEdit'); //service edit proses
	Route::get('admin/services/delete/{id}', 'GeneralController@adminServiceDelete'); //service edit proses

	//orderan
	Route::get('admin/orderan', 'GeneralController@adminOrderan'); //orderan panel
	Route::post('admin/orderan/edit', 'GeneralController@adminOrderanEdit'); //orderan edit proses
	Route::get('admin/orderan/ubah/{id}/{barber}', [
    'uses'  => 'GeneralController@adminOrderanUbah',
    'as'    => 'ubahStatus'
	]);
	Route::get('admin/orderan/delete/{id}', 'GeneralController@adminOrderanDelete'); //orderan edit proses

	//time
	Route::get('admin/time', 'GeneralController@adminTime'); //time panel
	Route::post('admin/time/add', 'GeneralController@adminTimeAdd'); //time new proses
	Route::get('admin/time/delete/{id}', 'GeneralController@adminTimeDelete'); //time edit proses

	//galery
	Route::get('admin/galery', 'GeneralController@adminGalery'); //galery panel
	Route::post('admin/galery/add', 'GeneralController@adminGaleryAdd'); //galery new proses
	Route::post('admin/galery/add/proses', 'GeneralController@adminGaleryAddProses'); //galery new proses
	Route::get('admin/galery/delete/{id}', 'GeneralController@adminGaleryDelete'); //galery edit proses

	//feedback
	Route::get('admin/feedback', 'GeneralController@adminFeedback'); //Feedback panel

	//
	Route::post('admin/verify-code', 'GeneralController@adminVerifyCode'); //Feedback panel


	//sosmed
	Route::get('admin/sosmed', 'GeneralController@adminSosmed'); //sosmed panel
	Route::post('admin/sosmed/add', 'GeneralController@adminSosmedAdd'); //sosmed new proses
	Route::post('admin/sosmed/edit', 'GeneralController@adminSosmedEdit'); //sosmed edit proses
	Route::get('admin/sosmed/delete/{id}', 'GeneralController@adminSosmedDelete'); //sosmed edit proses
