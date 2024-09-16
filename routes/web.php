<?php

use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;



//AUTH
// Route::get('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/login', [AuthController::class, 'authenticated']);
// Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/', function(){

    $data = [
        'content' => 'home/beranda/index'
    ];
    return view('home.layouts.wrapper',$data);
});

Route::get('/ppid', function(){
    $data = [
        'content' => 'home/PPID/index'
    ];
    return view('home.layouts.wrapper',$data);
});
   
Route::get('/infopublik', function(){
    $data = [
        'content' => 'home/infopublik/index'
    ];
    return view('home.layouts.wrapper',$data);
});

Route::get('/layananinfo', function(){
    $data = [
        'content' => 'home/layananinfo/index'
    ];
    return view('home.layouts.wrapper',$data);
});


Route::get('/profile', function(){
    $data = [
        'content' => 'home/profile/index'
    ];
    return view('home.layouts.wrapper',$data);
});

Route::get('/kontak', function(){
    $data = [
        'content' => 'home/kontak/index'
    ];
    return view('home.layouts.wrapper',$data);
});



// ADMIN
Route::prefix('/admin')->group(function () {
    Route::get('/', function(){
        return view('admin.layouts.wrapper');
    });
    // Route::get('/user', function(){
    //     return view('admin.layouts.wrapper');
    // });
    Route::get('/user', [AdminUserController::class, 'index'])->name('user_page');
});
 

