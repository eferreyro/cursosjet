<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\VipController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Livewire\CourseStatus;
use App\Http\Controllers\CourselfController;
use App\Http\Controllers\BillingController;

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

Route::get('/', HomeController::class)->name('home');
//Ruta para mostrar el Dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Ruta para mostrar la lista de cursos
Route::get('cursos', [CourseController::class, 'index'])->name('courses.index');

//Ruta para mostrar la lista de Blog
Route::get('blog', [BlogController::class, 'index'])->name('blog.index');

//Ruta para mostrar la Acceso VIP
Route::get('vip', [VipController::class, 'index'])->name('vip.index');

//Ruta para mostrar el boton de Pagos en los usuarios registrados->menu de Usuario
Route::get('billing', [BillingController::class, 'index'])->middleware('auth')->name('billing.index');

//Ruta para mostrar el boton de Mis Cursos en los usuarios registrados->menu de Usuario
Route::get('courself', [CourselfController::class, 'index'])->middleware('auth')->name('courself.index');


//Ruta para mostrar la informacion del curso
Route::get('cursos/{course}', [CourseController::class, 'show'])->name('courses.show');

//Ruta para matricular a un usuario
Route::post('courses/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware('auth')->name('courses.enrolled');

//Ruta para los cursos matriculados usando el controlador CourseStatus (php artisan make:livewire CourseStatus)
Route::get('course-status/{course}', CourseStatus::class)->name('courses.status')->middleware(('auth'));