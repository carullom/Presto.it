<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', 'PublicController@index');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Nuovo annuncio

Route::get('/announcement/new', 'HomeController@newAnnouncement')->name('announcement.new');

Route::post('/announcement/create', 'HomeController@createAnnouncement')->name('announcement.create');

Route::post('/announcement/images/upload', 'HomeController@uploadImage')->name('announcement.images.upload');

Route::delete('/announcement/images/remove', 'HomeController@removeImage')->name('announcement.images.remove');

Route::get('/announcement/images', 'HomeController@getImages')->name('announcement.images');

Route::get('/category/{name}/{id}/announcements', 'PublicController@announcementsByCategory')->name('public.announcements.category');

Route::get('/announcement/detail/{id}', 'PublicController@announcementDetail')->name('public.announcement.detail');

Route::get('/search', 'PublicController@search')->name('public.search');

// RICHIESTA REVISORE
Route::get('/revisor/request', 'HomeController@revisorRequest')->name('revisor.request');
Route::post('/revisor/submit', 'HomeController@submitRevisor')->name('revisor.submit');
Route::get('/revisor/thankyou', 'HomeController@revisorThankyou')->name('revisor.thankyou');

//AREA REVISORE

Route::get('/revisor/home', 'RevisorController@index')->name('revisor.home');
Route::post('/revisor/announcement/{id}/accept', 'RevisorController@accept')->name('revisor.accept');
Route::post('/revisor/announcement/{id}/reject', 'RevisorController@reject')->name('revisor.reject');
Route::post('/revisor/announcement/{id}/delete', 'RevisorController@delete')->name('revisor.delete');
Route::get('/revisor/historical', 'RevisorController@historical')->name('revisor.historical');
Route::get('/revisor/historical_revisor', 'RevisorController@historicalRevisor')->name('revisor.historicalRevisor');
Route::post('/revisor/announcement/{id}/restore', 'RevisorController@restore')->name('revisor.restore');
Route::get('/revisor/user_revisor', 'RevisorController@userRevisor')->name('revisor.userRevisor');
Route::post('/revisor/announcement/{id}/revisor', 'RevisorController@revisor')->name('revisor.revisor');
Route::get('/revisor/basket', 'RevisorController@basket')->name('revisor.basket');



Route::get('/revisor/user_revisor2', 'HomeController@userRevisor')->name('revisor.userRevisor2');
Route::post('/revisor/announcement/{id}/revisor2', 'HomeController@revisor')->name('revisor.revisor2');

//Multilingua
Route::post('/locale/{locale}', 'PublicController@locale')->name('locale');
