<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AgenceImmoController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Gate;

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

Route::get('/', [AgenceImmoController::class, 'index'])->name('home');


Route::prefix('/admin/property')->name('admin.biens.')->controller(AdminController::class)->group(function(){

    Route::get('/', 'listeBiens')
        ->name('listeBien');

    Route::get('/new', 'createBien')
        ->name('createBien');

    Route::post('/new', 'storeBien')
        ->name('storeBien');

    Route::get('/{bien}/edit', 'editBien')
        ->name('editBien');

    Route::patch('/{bien}/edit', 'updateBien');

    Route::delete('/{bien}/delete', 'deleteBien')
        ->name('deleteBien');

    Route::delete('/image/{image}/delete', 'deleteImage')
        ->name('deleteImage');

});
    
Route::prefix('/admin/option')->name('admin.option.')->controller(AdminController::class)->group(function(){

    Route::get('/', 'listeOptions')
        ->name('listeOption');

    Route::post('/new', 'storeOption')
        ->name('storeOption');

    Route::patch('/{option}/edit', 'updateOption')
        ->name('editOption');

    Route::delete('/{option}/delete', 'deleteOption')
        ->name('deleteOption');

});

Route::prefix('/admin/user')->name('admin.user.')->controller(AdminController::class)->group(function(){

    Route::get('/', 'listeUsers')
        ->name('listeUsers');

    // Route::get('/{user}/edit', 'editOption')
    //     ->name('editUser');

    Route::patch('/{user}/edit', 'updateUser')
        ->name('updateUser');

});

Route::prefix('/biens')->name('biens.')->controller(AgenceImmoController::class)->group(function(){
    
    Route::get('/', 'listeBiens')
        ->name('listeBiens');

    Route::get('/search', 'searchBiens')
        ->name('search');

    Route::get('/{bien}/show', 'bienShow')
        ->name('show');

    Route::post('/{bien}/contact', 'contact')
        ->name('contact');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';