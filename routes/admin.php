<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;

Route::get('', [HomeController::class, 'index'])->middleware('can:Ver Dashboard')->name('home');

//Genero ruta de tipo resource para los Roles (7 rutas necesarias para 1 CRUD)
Route::resource('roles', RoleController::class)->names('roles');

//Genero ruta de tipo resource para los Users (7 rutas necesarias para 1 CRUD)
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('users');

//Ruta de cursos pendientes del Administrador de Cursos
Route::get('courses', [CourseController::class, 'index'])->name('courses.index');


//Ruta de boton de Revisar del administrador de cursos que nos muestra el curso a aprovar
Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');


//Ruta de boton Publicar Curso del administrador de cursos
Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');
