<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;

use Illuminate\Support\Facades\Mail;
use App\Mail\AppovedCourse;
use App\Mail\RejectCourse;

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
        //policie de CoursePolicy llamado Revision
        $this->authorize('revision', $course);
        //Retorno la vista SHOW con los datos de Course
        return view('admin.courses.show', compact('course'));
    }

    //Metodo del boton  PUBLICAR CURSO (Approved)
    public function approved(Course $course)
    {
        //policie de CoursePolicy llamado Revision
        $this->authorize('revision', $course);
        //Valido si los campos tienen datos y no vienen vacios
        if (!$course->lessons || !$course->goals || !$course->requirements || !$course->image){
            return back()->with('info', 'No se puede publicar un curso que no este completo');
        }

        //Cambio el status de pendiente a aprobado
        $course->status = 3;
        //Guardo la data en la DB
        $course->save();
        //Envio correo electronico o email
        $mail = new AppovedCourse($course);
        Mail::to($course->teacher->email)->send($mail);
        //Redirecciono a la vista index con mensaje de exito
        return redirect()->route('admin.courses.index')->with('info', 'El curso ha sido publicado con exito, se ha enviado un email de confirmacion.');




    }

    //Metodo del boton Observation
    public function observation(Course $course){
        return view('admin.courses.observation', compact('course'));
    }

    //Metodo del bonton reject
    public function reject(Request $request, Course $course){
        //Regla de validacion
        $request->validate([
            'body' => 'required'
        ]);
        //Agrego un nuevo registro en la DB
        $course->observation()->create($request->all());
        //Cambio el status de pendiente a borrador
        $course->status = 1;
        //Guardo la data en la DB
        $course->save();

        //Envio correo electronico o email
        $mail = new RejectCourse($course);
        Mail::to($course->teacher->email)->send($mail);
        //Redirecciono a la vista index con mensaje de exito
        return redirect()->route('admin.courses.index')->with('info', 'El curso ha sido rechazado con exito, se ha enviado un email de confirmacion.');



    }
}
