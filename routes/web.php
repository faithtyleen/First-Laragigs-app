<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ListingController::class, 'index']);
    
/*           
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'
            ]
    
        ]
*/

//show create form
Route::get('/listings/create', 
[ListingController::class, 'create'])->middleware('auth');

//store listing data
Route::post('/listings', 
[ListingController::class, 'store'])->middleware('auth');

//show edit form
Route::get('/listings/{listing}/edit', 
[ListingController::class, 'edit'])->middleware('auth');

//update Listing
Route::put('/listings/{listing}',
[ListingController::class, 'update'])->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}',
[ListingController::class, 'destroy'])->middleware('auth');

//Manage Listings
Route::get('/listings/manage',
[ListingController::class, 'manage'])->middleware('auth');

//single Listing
Route::get('/listings/{listing}', 
[ListingController::class, 'show']);

//Show Register/Create Form
Route::get('/register',
[UserController::class, 'create'])->middleware('guest');

//create new user
Route::post('/users',
[usercontroller::class, 'store']);

// Log user out
Route::post('/logout',
[usercontroller::class, 'logout'])->middleware('auth');

//show login form
Route::get('/login',
[usercontroller::class, 'login'])->name('login')->middleware('guest');

//Log in user
Route::post('/users/authenticate',
[usercontroller::class, 'authenticate']);



/*
Route:: get('/hello', function (){
    return response('<h1>Hello World</h1>', 200);
});
Route::get('/posts/{id}', function($id){
    return response('post ' . $id);
});
*/
?>