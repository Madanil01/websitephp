<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\KontentController;
use App\Http\Controllers\MisiController;
use App\Http\Controllers\VisiController;
use App\Models\Kontent;
use App\Models\Misi;
use App\Models\Visi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;



//AUTH
// Route::get('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/login', [AuthController::class, 'authenticated']);
// Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticated']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storeRegistration']);

Route::get('/', function(){
    $kontents = Kontent::whereNull('deleted_at')->get();
    $data = [
        'content' => 'home/beranda/index',
        'kontents' => $kontents,
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
    Route::get('/home', function(){
        return view('admin.layouts.wrapper');
    })->middleware(AdminMiddleware::class)->name('admin_home');
    // Route::get('/user', function(){
    //     return view('admin.layouts.wrapper');
    // });
    Route::get('/user', [AdminUserController::class, 'index'])->middleware(AdminMiddleware::class)->name('user_page');
    Route::get('/kontent', [KontentController::class, 'create'])->name('kontent.create');
    Route::post('/kontent/create', [KontentController::class, 'store'])->name('kontent.store');
    Route::get('/kontent/edit/{id}', [KontentController::class, 'edit'])->name('kontent.edit');
    Route::post('/kontent/update{id}', [KontentController::class, 'update'])->name('kontent.update');
    Route::post('/kontent/destroy/{id}', [KontentController::class, 'destroy'])->name('kontent.destroy');


    //visi
    Route::get(
        '/visi-misi',
        function () {
            $data = [
                'content' => 'admin/visi_misi/visi_misi',
                'visis' => Visi::whereNull('deleted_at')->paginate(5, ['*'], 'visi'),
                'misis' => Misi::whereNull('deleted_at')->paginate(5, ['*'], 'misis'),
            ];
        return view('admin.layouts.wrapper', $data);
    })->name('visimisi_page');

    Route::post('/visi-misi/visi/store', [VisiController::class, 'store'])->name('visi.store');
    Route::post('/visi-misi/misi/store', [MisiController::class, 'store'])->name('misi.store');
    Route::post('/visi-misi/visi/{id}', [VisiController::class, 'update'])->name('visi.update');
    Route::post('/visi-misi/misi/{id}', [MisiController::class, 'update'])->name('misi.update');

    // Route::post('/visi-misi/visi/store', [VisiController::class, 'store'])->name('visi.edit');
    // Route::post('/visi-misi/misi/store', [MisiController::class, 'store'])->name('misi.destroy');
    // Route::post('/visi-misi/visi/store', [VisiController::class, 'store'])->name('visi.edit');
    // Route::post('/visi-misi/misi/store', [MisiController::class, 'store'])->name('misi.destroy');
});
 
