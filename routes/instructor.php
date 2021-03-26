<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\InstructorCourses;


//Ruta que redirige al prefijo de instructor para cuando peguen en el navegador la ruta
Route::redirect('', 'instr/courses');

//Ruta de instructor que esta relacionada con el middleware RouteServiceProvider
Route::get('courses', InstructorCourses::class)->name('courses.index');