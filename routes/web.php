<?php

use App\Http\Controllers\ListingController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
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



Route::post('listings/',[ListingController::class, 'store']);

Route::get('/listings/create',[ListingController::class, 'create']);

Route::get('/',[ListingController::class, 'index'] );





Route::get('listings/{listing}',[ListingController::class, 'show']);