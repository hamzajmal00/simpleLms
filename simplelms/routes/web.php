<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LearnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
// Admin
Route::middleware('adminauth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admindashboard');
    Route::get('/admin/dashboard/edit/user/{id}', [AdminController::class, 'edit'])->name('edituser');
    Route::post('/admin/dashboard/update/user/{id}', [AdminController::class, 'update'])->name('updateuser');
    Route::get('/admin/dashboard/delete/user/{id}', [AdminController::class, 'delete'])->name('deleteuser');
    // teacher
    Route::get('/admin/dashboard/teacher/', [AdminController::class, 'getTeacher'])->name('getteacher');
    Route::get('/admin/dashboard/teacher/add', [AdminController::class, 'addTeacher'])->name('addteacher');
    Route::post('/admin/dashboard/teacher/store', [AdminController::class, 'storeTeacher'])->name('storeteacher');

    // course categories
    Route::get('/admin/dashboard/course_cat/', [AdminController::class, 'courseCatIndex'])->name('getcoursecat');
    Route::get('/admin/dashboard/course_cat_add/', [AdminController::class, 'courseCatAdd'])->name('addcoursecat');
    Route::post('/admin/dashboard/course_cat_store/', [AdminController::class, 'courseCatStore'])->name('storecoursecat');
    Route::get('/admin/dashboard/course_cat_edit/{id}', [AdminController::class, 'EditCat'])->name('editecoursecat');
    Route::post('/admin/dashboard/course_cat_update/{id}', [AdminController::class, 'updateCat'])->name('updatecoursecat');
    Route::get('/admin/dashboard/course_cat_delete/{id}', [AdminController::class, 'deleteCat'])->name('deletecoursecat');
    // course
    Route::get('/admin/dashboard/course/', [AdminController::class, 'getCourse'])->name('getcourse');
    Route::get('/admin/dashboard/course_add/', [AdminController::class, 'AddCourse'])->name('addcourse');
    Route::post('/admin/dashboard/course_store/', [AdminController::class, 'StoreCourse'])->name('storecourse');
    Route::get('/admin/dashboard/course_edit/{id}', [AdminController::class, 'editCourse'])->name('editecourse');
    Route::post('/admin/dashboard/course_update/{id}', [AdminController::class, 'updateCourse'])->name('updatecourse');
    Route::get('/admin/dashboard/course_delete/{id}', [AdminController::class, 'deleteCourse'])->name('deletecourse');

});
// Teacher

Route::middleware('teacherauth')->group( function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'index'])->name('teacherdashboard');

 });
 // Learner
Route::middleware('learnerauth')->group( function () {
    Route::get('/learner/dashboard', [LearnerController::class, 'index'])->name('learnerdashboard');

 });
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //admin
    // Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admindashboard');




    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
