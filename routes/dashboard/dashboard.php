<?php
use App\Http\Controllers\Dashboard\Admin;
use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'admin','middleware' => 'auth:admin'], function () {
    Route::get('dashboard', [Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('sections', Admin\SectionController::class);
    Route::resource('services', Admin\ServiceController::class);
    Route::resource('cases', Admin\PersonalStatusController::class);
    Route::get('images/{id}', [Admin\PersonalStatusController::class, 'addImages'])->name('personal_status_cases.images');
    Route::post('image', [Admin\PersonalStatusController::class, 'savePersonalStatusCaseImages'])->name('personal_status_cases.images.store');
    Route::post('images/db',[Admin\PersonalStatusController::class, 'savePersonalStatusCaseImagesDB']) -> name('personal_status_cases.images.store.db');
});