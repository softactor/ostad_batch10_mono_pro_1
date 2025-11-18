<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){

    $title = 'Laravel learning - Batch 10';
    $heading = 'Welcome to our awesome Class!';

    $withHtml = "<b>This is Another Heading</b>";
    $withHtml.= "<p>";
    $withHtml.= "lorem ipsome .......";
    $withHtml.= "</p>";

    // return view('welcome', [
    //     'title' => $title,
    //     'heading' => $heading,
    // ]);

    return view('welcome', compact('title', 'heading', 'withHtml'));

});


Route::get('/day/{number}', function($number){

    $title = 'Laravel learning - Batch 10';
    $heading = 'Switch Case';

    $days = [
        1 => 'Sunday',
        2 => 'Monday',
        3 => 'Tuesday',
        4 => 'Wednesday',
        5 => 'Thursday',
        6 => 'Friday',
        7 => 'Saturday',
    ];   


    $day = $days[$number] ?? 'NA';

    return view('switch_day', compact('title', 'heading', 'number', 'day'));


});


Route::get('/about', function(){   


    $day = 'Fri';//date('D');

    $title = 'Laravel learning - Batch 10';
    $heading = 'Welcome to About Us';

    return view('about', compact('title', 'heading', 'day'));


});


Route::get('/loop', function(){   


    $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Fidayday', 'Saturday'];


    $title = 'Laravel learning - Batch 10';
    $heading = 'Welcome to Loop';

    return view('loop', compact('title', 'heading', 'days'));


});