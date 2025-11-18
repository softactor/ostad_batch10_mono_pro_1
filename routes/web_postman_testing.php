<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/contact', function(){
//     return view('contact.contact');
// });

// Route::get('/contact', [ContactController::class, 'index']);


// Route::get('/', [HomeController::class, 'home']);
// Route::get('/contact', [HomeController::class, 'contact']);
// Route::get('/product', [HomeController::class, 'product']);


Route::get('/', function(){
    
    return response()->json([
        'status' => 'success',
        'message' => 'Found requested url',
        'data' => []
    ], Response::HTTP_OK);

});

//  home route
Route::get('/', function(){
    
    return response()->json([
        'status' => 'success',
        'message' => 'Found requested url',
        'data' => []
    ], Response::HTTP_OK);

});

//  home users
Route::get('/users', function(){


    $userData = [
        [
            'id'            => 1,
            'name'          => 'tanveer',
            'email'         => 'tanveer@example.com',
            'phone_number'  => '0123654789',
        ],
        [
            'id'            => 2,
            'name'          => 'wasi',
            'email'         => 'wasi@example.com',
            'phone_number'  => '0123654689',
        ],
        [
            'id'            => 3,
            'name'          => 'shariful',
            'email'         => 'shariful@example.com',
            'phone_number'  => '0123654789',
        ],
    ];
    
    return response()->json([
        'status' => 'success',
        'message' => 'Found users data',
        'data' => $userData
    ], Response::HTTP_OK);

});




Route::get('/user/{token}', function($id){

    $userData = [
        [
            'id'            => 1,
            'name'          => 'tanveer',
            'email'         => 'tanveer@example.com',
            'phone_number'  => '0123654789',
        ],
        [
            'id'            => 2,
            'name'          => 'wasi',
            'email'         => 'wasi@example.com',
            'phone_number'  => '0123654689',
        ],
        [
            'id'            => 3,
            'name'          => 'shariful',
            'email'         => 'shariful@example.com',
            'phone_number'  => '0123654789',
        ],
    ];

    $expectedUser = '';
    foreach($userData as $user){
        if($user['id'] == $id)
        {
            $expectedUser = $user;
        }
    }

    
    return response()->json([
        'status' => 'success',
        'message' => 'Found users data',
        'data' => $expectedUser
    ], Response::HTTP_OK);

});


Route::post('registration', function(Request $request){
    $user = [
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        // 'phone' => $request->get('phone'),
        'password' => $request->get('password'),
    ];

    $newUser = DB::table('users')->insert($user);

    return response()->json([
        'status' => 'success',
        'message' => 'Registration was successfull',
        'data' => $newUser
    ], Response::HTTP_CREATED);
});

// for post method need to set csrf token:
Route::get('/set_csrf_token', function(Request $request){
    return response()->json([
        'status' => 'success',
        'message' => 'csrf token',
        'data' => $request->session()->token()
    ], Response::HTTP_OK);
});


Route::post('product', function(Request $request){

    // to check request type
    // if($request->isJson()){
    //     echo 'json request';
    // }else{
    //     echo 'web';
    // }
    // exit;

    $product = [
        'title' => $request->get('title'),
        'category_id' => $request->get('category_id'),
    ];

    return response()->json([
        'status' => 'success',
        'message' => 'Registration was successfull',
        'data' => $product
    ], Response::HTTP_CREATED);
});



Route::post('single_file', function(Request $request){

    if($request->hasFile('file')){
        $file = $request->file('file');

        $path = $file->store('documents', 'public');

        return response()->json([
            'status' => 'success',
            'message' => 'File uploaded',
            'data' => $path
        ], Response::HTTP_CREATED);

    }


});

// get and check cookie
Route::get('/remember-me', function(Request $request){

    $name = $request->cookie('user_name');

    if($name){

        return response()->json([
            'status' => 'success',
            'message' => 'Hello ' .$name. ', nice to see you again!' ,
            'tip' => 'I read your name from cookie'
        ]);

    }else{
        return response()->json([
            'status' => 'success',
            'message' => 'I think you are first time here!',
            'instruction' => 'Visit /set-name/YourName to set your name'
        ]);

    }


});

// set cookie
Route::get('/set-name/{name}', function($name){

        return response()->json([
            'status' => 'success',
            'message' => "Hello $name , I will remember you!"
        ])->cookie('user_name', $name, 60);

});


// redirect url

Route::get('login/{userName}', function($userName){

        return redirect('/dashboard/'.$userName);

});


Route::get('dashboard/{userName}', function($userName){

        return response()->json([
            'status' => 'success',
            'message' => 'You redirected from login route!',
        ]);

});


// set custome header key value:

Route::get('/student-info', function(){

    return response()->json([
        'status' => 'success',
        'message' => 'Student information',
        'data'   => [
            'name' => 'Kanak',
            'course' => 'Web development',
            'progress' => "80%"
        ]        
    ])->header('X-Student-Grade', 'A+')
    ->header('X-Teacher-Message', 'Great!');


});

Route::get('/download-certificate', function(){

    return response()->json([
        'status' => 'success',
        'message' => 'Certificate downloaded'        
    ])->header('Content-Disposition', 'attachment, filename="certificate.pdf');


});