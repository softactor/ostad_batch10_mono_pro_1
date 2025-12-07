<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Log\LogController;
use App\Http\Controllers\SessionController;
use App\Models\Order;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){


    $products = (object)[
        (object)[
            'id' => 1,
            'title' => 'Product 1',
            'short_description' => 'Product 1 short descriptions',
            'product_image' => 'https://placehold.co/600x400?text=Product+1',
            'price' => 99.99
        ],
        (object)[
            'id' => 2,
            'title' => 'Product 2',
            'short_description' => 'Product 2 short descriptions',
            'product_image' => 'https://placehold.co/600x400?text=Product+2',
            'price' => 80.99
        ],
        (object)[
            'id' => 3,
            'title' => 'Product 3',
            'short_description' => 'Product 3 short descriptions',
            'product_image' => 'https://placehold.co/600x400?text=Product+3',
            'price' => 70.99
        ],
        (object)[
            'id' => 4,
            'title' => 'Product 4',
            'short_description' => 'Product 4 short descriptions',
            'product_image' => 'https://placehold.co/600x400?text=Product+4',
            'price' => 60.99
        ],
        (object)[
            'id' => 5,
            'title' => 'Product 5',
            'short_description' => 'Product 5 short descriptions',
            'product_image' => 'https://placehold.co/600x400?text=Product+5',
            'price' => 100
        ],
        (object)[
            'id' => 6,
            'title' => 'Product 6',
            'short_description' => 'Product 6 short descriptions',
            'product_image' => 'https://placehold.co/600x400?text=Product+6',
            'price' => 200
        ],
        (object)[
            'id' => 7,
            'title' => 'Product 7',
            'short_description' => 'Product 7 short descriptions',
            'product_image' => 'https://placehold.co/600x400?text=Product+7',
            'price' => 350
        ],
    ];


    return view('frontend.home', compact('products'));

});

Route::get('/about', function(){

    return view('frontend.about');

});

Route::get('/product', function(){

    return view('frontend.product');

});

Route::get('/contact', function(){

    return view('frontend.contact');

});

Route::get('/profile/{user_id}', function($userId){

    // $user = User::with('profile', 'orders')->find($userId);

    // $profile = $user->profile;

    // dd($profile);


    // $profile = Profile::find(1);
    $order = Order::with('user')->find(2);

    $user = $order->user;

    dd($user);

});


/**
 * 
 * Log Demo Route
 * 
 */
Route::get('/log-demo', [LogController::class, 'logDemo']);
Route::get('/log-user-create', [LogController::class, 'userProcess']);


/**
 * Session guide
 */


Route::get('/session', [SessionController::class, 'index'])->name('session-index');
Route::get('/session/set', [SessionController::class, 'setSession'])->name('session-set');
Route::get('/session/get', [SessionController::class, 'getSession']);
Route::get('/session/delete', [SessionController::class, 'deleteSession']);
Route::get('/session/flash', [SessionController::class, 'flasSession']);



/**
 * 
 * Admin Route
 * 
 */

Route::get('/admin/dashboard',[AdminDashboardController::class, 'dashboard'])->name('admin-dashboard');

/**
 * All product route:
 */
Route::get('/admin/product',[AdminProductController::class, 'index'])->name('admin.product.list');
Route::get('/admin/product/create',[AdminProductController::class, 'create'])->name('admin.product.create');