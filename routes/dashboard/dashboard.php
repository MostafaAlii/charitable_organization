<?php
use App\Http\Controllers\Dashboard\Admin;
use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'admin','middleware' => 'auth:admin'], function () {
    Route::get('dashboard', [Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('sections', Admin\SectionController::class);
    Route::resource('services', Admin\ServiceController::class);
    Route::resource('cases', Admin\PersonalStatusController::class);
});