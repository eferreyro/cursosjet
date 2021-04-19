<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;

class CourseController extends Controller
{
    //
    public function index()
    {
        //recupero el listado ed cursos cuyo status sea 2(pendiente) para luego enviarlo a la vista
        $courses = Course::where('status', 2)->orderBy('id', 'DESC')->paginate(20);

        //Retorno la vista admin\courses\index.blade.php
        return view('admin.courses.index', compact('courses'));
    }

    //
    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }


    public function approved(Course $course)
    {
        if (!$course->lessons || !$course->goals || !$course->requirements || !$course->image){
            return back()->with('info', 'No se puede publicar un curso que no este completo');
        }
        $course->status = 3;
        $course->save();
        return redirect()->route('admin.courses.index')->with('info', 'El curso ha sido publicado con exito');
    }
}
