<?php

use Azuriom\Plugin\CapeApi\Controllers\Admin\AdminController;
use Azuriom\Plugin\CapeApi\Controllers\Admin\SettingController;
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

Route::get('/', [AdminController::class, 'index'])->name('index');

Route::get('/settings', [SettingController::class, 'index'])->name('settings');
Route::post('/settings', [SettingController::class, 'save'])->name('settings.save');
