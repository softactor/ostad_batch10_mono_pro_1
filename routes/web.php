<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;


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