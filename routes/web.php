<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
//  Route::view('/test','test');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard',[AdminController::class,'index'])->middleware(['auth','verified'])->name('dashboard');

Route::middleware(['auth','role:user,admin'])->group(function(){
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','role:user'])->group(function () {
    Route::resource('/users',UserController::class);
    Route::post('/picture/store',[PictureController::class,'store'])->name('picture.store');
    
      
});

Route::middleware(['auth','role:admin'])->group(function () {
    
     Route::get('/admin', [AdminController::class, 'index']);
});


require __DIR__.'/auth.php';
