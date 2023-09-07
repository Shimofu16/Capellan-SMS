<?php

use App\Http\Controllers\Admin\MaintenanceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Backend\Admin\MaintenanceController as AdminMaintenanceController;
use App\Http\Controllers\Backend\Admin\TeacherController;
use App\Http\Controllers\Backend\Admin\UserController as AdminUserController;
use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ScheduleController;
use App\Http\Controllers\Backend\SpecializationController;
use App\Http\Controllers\Backend\StrandController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\SubjectController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Request;
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
    Route::post('/logout',  'logout')->name('auth.delete')->middleware(['auth', 'isUserActive']);
});
Route::middleware(['auth', 'alert'])->prefix('admin')->name('admin.')->group(function () {
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
            Route::get('/{strand_id}', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/delete/{id}', 'destroy')->name('destroy');
        });
        Route::prefix('subject')->name('subject.')->controller(SubjectController::class)->group(function () {
            Route::get('/gradeLevel/{gradeLevelId}/{specialization_id?}', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        });
    });

    Route::prefix('student')->name('student.')->group(function () {
        Route::get('/create', [StudentController::class, 'create'])->name('create');
        Route::post('/import', [StudentController::class, 'import'])->name('import');
        Route::get('/show/{id}', [StudentController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
        Route::put('/update/{table}/{id}', [StudentController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [StudentController::class, 'destroy'])->name('destroy');
        Route::get('/{type?}/{id?}', [StudentController::class, 'index'])->name('index');
        Route::post('/store/{student_id}/{grade_level_id}/{status}', [StudentController::class, 'store'])->name('store');
    });
    Route::prefix('schedule')->name('schedule.')->controller(ScheduleController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy');
    });
    Route::prefix('switch')->name('switch.')->group(function () {
        Route::get('/sy/{id}', function ($id) {
            $sy = \App\Models\EMS\SchoolYear::find($id);
            // update the sy_id in session
            Request::session()->put('sy_id', $sy->id);
            return redirect()->back();
        })->name('sy');
    });
    /* Admin */
    Route::middleware(['isAdmin'])->group(function () {

        Route::prefix('teacher')->name('teacher.')->controller(TeacherController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        });

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
                Route::put('/update/{id}', 'update')->name('update');
                Route::delete('/destroy/{id}', 'destroy')->name('destroy');
            });
        });
    });
    Route::prefix('profile')->name('profile.')->controller(ProfileController::class)->group(function () {
        Route::prefix('change-password')->name('change-password.')->group(function () {
            Route::get('/', 'changePassword')->name('index');
            Route::put('/update', 'updatePassword')->name('update');
        });
    });
});
