<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
class CourseController extends Controller
{
    //
    public function index(){
        //retorno la vista en Resources/Views/courses/index.blade.php
        return view('courses.index');
    }
    // Verifico si el status del curso esta como publicado o, si tiene otro, que lo compare contra CoursesPolicy
    public function show(Course $course){
        $this->authorize('published', $course);

$similares = Course::where('category_id', $course->category_id)
                    ->where('id', '!=', $course->id)
                    ->where('status', 3)
                    ->latest('id')
                    ->take(5)
                    ->get();

        return view ('courses.show', compact('course', 'similares'));

    }
    public function enrolled(Course $course){
       $course->students()->attach(auth()->user()->id);
       return redirect()->route('courses.status', $course);

    }
/*     //Esta funcion la dejo de usar ya que voy a vincular directamente al componente de Livewire CourseStatus
    public function status(Course $course){
        return view('courses.status', compact('course'));
    }
    */
} 
