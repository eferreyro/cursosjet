<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Livewire\InstructorCourses;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\CoursesCurriculum;

//Ruta que redirige al prefijo de instructor para cuando peguen en el navegador la ruta
Route::redirect('', 'instr/courses');

//Ruta de instructor que esta relacionada con el middleware RouteServiceProvider
//Route::get('courses', InstructorCourses::class)->middleware('can:Ver Cursos')->name('courses.index');

//Creo esta ruta para permitir CRUD con los cursos, Esta ruta reemplaza la linea 11
Route::resource('courses', CourseController::class)->names('courses');

//INSTR/COURSES
Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->name('courses.curriculum');