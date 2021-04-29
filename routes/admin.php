<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\PriceController;

Route::get('', [HomeController::class, 'index'])->middleware('can:Ver Dashboard')->name('home');

//Genero ruta de tipo resource para los Roles (7 rutas necesarias para 1 CRUD)
Route::resource('roles', RoleController::class)->names('roles');

//Genero ruta de tipo resource para los Users (7 rutas necesarias para 1 CRUD)
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('users');



//Ruta de cursos pendientes del Administrador de Cursos
Route::get('courses', [CourseController::class, 'index'])->name('courses.index');



//Ruta de CRUD categorias del Administrador de Cursos
Route::resource('categories', CategoryController::class)->names('categories');

//Ruta de CRUD Niveles del Administrador de Cursos
Route::resource('levels', LevelController::class)->names('levels');

//Ruta de CRUD Niveles del Administrador de Cursos
Route::resource('prices', PriceController::class)->names('prices');




//Ruta de boton de Revisar del administrador de cursos que nos muestra el curso a aprovar
Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');


//Ruta de boton Publicar Curso del administrador de cursos
Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');


//Ruta de boton Observar Curso del administrador de cursos
Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');



//Ruta de boton Rechazar Curso del administrador de cursos
Route::post('courses/{course}/reject', [CourseController::class, 'reject'])->name('courses.reject');
