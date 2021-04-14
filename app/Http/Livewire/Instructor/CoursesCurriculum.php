<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;
use App\Models\Section;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoursesCurriculum extends Component
{
    use AuthorizesRequests;

    public $course, $section, $name;
    /* Reglas de validacion */

    protected $rules = [
        'section.name' => 'required'
    ];
    public function mount(Course $course){
        $this->course = $course;
        $this->section = new Section();

        $this->authorize('dictated', $course);
    }

    public function render()
    {
        return view('livewire.instructor.courses-curriculum')->layout('layouts.instructor');
    }
    public function edit(Section $section){
        $this->section = $section;
    }
    /* Evento que activa un registro nuevo de seccion */
    public function store(){
        //regla de validacion para STORE
        $this->validate([
            'name' => 'required'
        ]);

        Section::create([
            'name' => $this->name,
            'course_id' =>$this->course->id
        ]);
        //reseteo los valores que vienen en Section -> name
        $this->reset('name');
        //Refresco la informacion de course para que aparezca en pantalla sin refrescar
        $this->course = Course::find($this->course->id);

    }

    /* edicion de una seccion de un curso */
    public function update(){
        //Prueba de validacion para evitar formulario vacio
        $this->validate();

        $this->section->save();
        $this->section = new Section();
        $this->course = Course::find($this->course->id);
    }
    //metodo para eliminar una seccion
    public function destroy(Section $section){
        $section->delete();
        $this->course = Course::find($this->course->id);
    }

}
