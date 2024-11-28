<?php

use Azuriom\Plugin\CapeApi\Controllers\Admin\SettingController;
use Azuriom\Plugin\CapeApi\Controllers\CapeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your plugin. These
| routes are loaded by the RouteServiceProvider of your plugin within
| a group which contains the "web" middleware group and your plugin name
| as prefix. Now create something great!
|
*/

Route::get('/', [CapeController::class, 'home'])->name('home');

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::post('/cape/upload', [CapeController::class, 'upload'])->name('cape.upload');
        Route::delete('/cape/delete', [CapeController::class, 'delete'])->name('cape.delete');
        
        // New route to serve cape image
        Route::get('/cape/{user}', [CapeController::class, 'serveCape'])->name('cape.show');
    });
});
