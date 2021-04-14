<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Livewire\InstructorCourses;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\CoursesCurriculum;
use App\Http\Livewire\Instructor\CoursesStudents;


//Ruta que redirige al prefijo de instructor para cuando peguen en el navegador la ruta
Route::redirect('', 'instructor/courses');

//Ruta de instructor que esta relacionada con el middleware RouteServiceProvider
//Route::get('courses', InstructorCourses::class)->middleware('can:Ver Cursos')->name('courses.index');

//Creo esta ruta para permitir CRUD con los cursos, Esta ruta reemplaza la linea 14
Route::resource('courses', CourseController::class)->names('courses');


//INSTRUCTOR/COURSES
Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->middleware('can:Editar Cursos')->name('courses.curriculum');
//METAS DE UN CURSO
Route::get('courses/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');
//ESTUDIANTES DE UN CURSO
Route::get('courses/{course}/students', CoursesStudents::class)->middleware('can:Editar Cursos')->name('courses.students');

//STATUS DE UN CURSO
Route::post('courses/{course}/status', [CourseController::class, 'status'])->name('courses.status');