<?php

use App\Http\Controllers\Admin\MaintenanceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Backend\Admin\MaintenanceController as AdminMaintenanceController;
use App\Http\Controllers\Backend\Admin\UserController as AdminUserController;
use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SpecializationController;
use App\Http\Controllers\Backend\StrandController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\SubjectController;
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


Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index')->name('auth.index');
    Route::post('/login', 'login')->name('auth.store');
    Route::post('/logout',  'logout')->name('auth.delete')->middleware(['auth','isUserActive']);
});
Route::middleware(['auth','alert','isUserActive'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('academics')->name('academic.')->group(function () {
        Route::prefix('strand')->name('strand.')->controller(StrandController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        });
        Route::prefix('specialization')->name('specialization.')->controller(SpecializationController::class)->group(function () {
            Route::get('/{strand_id?}', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/delete/{id}', 'destroy')->name('destroy');
        });
        Route::prefix('subject')->name('subject.')->controller(SubjectController::class)->group(function () {
            Route::get('/{specialization_id?}', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        });
    });

    Route::prefix('student')->name('student.')->controller(StudentController::class)->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/import', 'import')->name('import');
        Route::get('/show/{id}', 'show')->name('show');
        Route::post('/store/{student_id}/{grade_level_id}/{status}', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{table}/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        Route::get('/{grade_level_id?}/{specialization_id?}', 'index')->name('index');
    });

    /* Admin */
    Route::middleware(['isAdmin'])->group(function () {
        Route::prefix('maintenance')->name('maintenance.')->controller(AdminMaintenanceController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        });
        Route::prefix('user')->name('user.')->group(function () {
            Route::controller(AdminUserController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/update/{id}', 'update')->name('update');
                Route::delete('/destroy/{id}', 'destroy')->name('destroy');
            });

        });
    });
});
