<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Level;
use App\Models\Price;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Ver Cursos')->only('index');
        $this->middleware('can:Crear Cursos')->only('create', 'store');
        $this->middleware('can:Editar Cursos')->only('edit', 'update', 'goals');
        $this->middleware('can:Eliminar Cursos')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Traigo una vista de Instructor\Course\Index.blade.php
        return view('instructor.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');
        //Traigo una vista de Instructor\Course\Index.blade.php
        return view('instructor.courses.create', compact('categories', 'levels', 'prices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Reclas de validacion
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses',
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => 'image'

        ]);
        //Le pasamos al Request los valores que caputamos en el formulario de validacion
        $course = Course::create($request->all());

        if ($request->file('file')) {
            # code...
            $url = Storage::put('courses', $request->file('file'));
            $course->image()->create([
                'url' => $url
            ]);
        }
        //Retornamos lo que se manda desde el formulario instructor/courses
        return redirect()->route('instructor.courses.edit', $course);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //Traigo una vista de Instructor\Course\Index.blade.php
        return view('instructor.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $this->authorize('dictated', $course);

        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');

        //Traigo una vista de Instructor\Course\Index.blade.php
        return view('instructor.courses.edit', compact('course', 'categories', 'levels', 'prices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //Regla de control para un usuario. Viene del metodo dictated de CoursePolicy
        $this->authorize('dictated', $course);

        //Reclas de validacion
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses,slug,' . $course->id,
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => 'image'

        ]);
        //Actualizo la DB
        $course->update($request->all());
        if ($request->file('file')) {
            # Subo la imagen a la direccion establecida
            $url = Storage::put('courses', $request->file('file'));
            //Si existe una imagen en DB, elimino estsa del repositorio
            if ($course->image) {
                Storage::delete($course->image->url);
                //Una vez eliminada la imagen, actualizo la imagen con la nueva
                $course->image->update(['url' => $url]);
            } else {
                //Si el curso no tiene una imagen, actualizo el registro con esta imagen
                $course->image()->create(['url' => $url]);
            }
        }
        //Redirecciono
        return redirect(route('instructor.courses.edit', $course));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    public function goals(Course $course){
        return view('instructor.courses.goals', compact('course'));
    }


    public function status(Course $course){
       $course->status = 2;
       $course->save();

      if ($course->observation) {
        //Recupero el registro de observacion y le pido que se elimine el registro de la DB
            $course->observation->delete();
      }

       return redirect()->route('instructor.courses.edit', $course);
    }

    public function observation(Course $course){
        return view('instructor.courses.observation', compact('course'));
    }
}
