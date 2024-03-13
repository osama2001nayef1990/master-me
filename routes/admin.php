<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\CategoryController;
use App\Models\User;


Route::middleware('auth')->group(function () {
//    Route::get('/dashboard', [AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/create/link', [AdminController::class, 'newLink'])->name('admin.create.link.view');
    Route::post('/create/link', [LinkController::class, 'create'])->name('admin.create.link');
    Route::get('/create/category', [AdminController::class, 'category'])->name('admin.create.category.view');
    Route::post('/create/category', [CategoryController::class, 'create'])->name('admin.create.category');
    Route::delete('/delete/category/{category}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
    Route::get('/edit/category/{category}', [CategoryController::class, 'EditView'])->name('admin.category.edit.view');
    Route::put('/edit/category/{category}', [CategoryController::class, 'update'])->name('admin.category.edit');
    Route::get('/show/users', [AdminController::class, 'users'])->name('admin.users.all');
    Route::put('/block/user/{user}', [AdminController::class, 'block'])->name('admin.user.block');
    Route::put('/activate/user/{user}', [AdminController::class, 'activate'])->name('admin.user.activate');
    Route::get('/links/all', [AdminController::class, 'links'])->name('admin.links.all');
    Route::delete('/delete/links/{link}', [LinkController::class, 'destroy'])->name('link.delete');


    Route::get('mylinks',function (){
        return view('admin.mylinks');
    })->name('admin.my_links');



});


?>
