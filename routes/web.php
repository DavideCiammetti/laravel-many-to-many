<?php

use App\Http\Controllers\Admin\DashboardControllers;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','verified'])->name('admin.')->prefix('admin')->group(function(){
    
        Route::get('/', [DashboardControllers::class, 'index'])->name('dashboard');
        
        // route al resource controller per crud parameters=serve per prendere slug al posto di id
        Route::resource('projects', ProjectController::class)->parameters(['projects'=> 'project:slug']);
        Route::resource('types', TypeController::class)->parameters(['types'=> 'type:slug']);
    });

require __DIR__.'/auth.php';
