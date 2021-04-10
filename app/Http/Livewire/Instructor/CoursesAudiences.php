<?php

namespace App\Http\Livewire\Instructor;


use Livewire\Component;

use App\Models\Course;
use App\Models\Audience;

class CoursesAudiences extends Component
{
    public $course, $audience, $name;

    protected $rules = [
        'audience.name' => 'required'
    ];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->audience = new Audience();
    }
    public function render()
    {
        return view('livewire.instructor.courses-audiences');
    }
    public function store()
    {
        //Regla de validarcion
        $this->validate([
            'name' => 'required'
        ]);
        //Inserto en la base de datos lo que viene desde el formulario wire:submit
        $this->course->audiences()->create([
            'name' => $this->name
        ]);
        //reseteo el campo name
        $this->reset('name');
        //Actualizo la vista para evitar recargar
        $this->course = Course::find($this->course->id);
    }


    public function edit(Audience $audience)
    {
        $this->audience = $audience;
    }

    public function update()
    {
        //valido si lo que viene por el formulario tiene datos y son validos
        $this->validate();
        //Luego de validar guardo en la base de datos
        $this->audience->save();
        //Borro los datos del formulario
        $this->audience = new Audience();
        //Actualizo la vista para evitar recargar
        $this->course = Course::find($this->course->id);
    }

    public function destroy(Audience $audience)
    {
        $audience->delete();
        $this->course = Course::find($this->course->id);
    }
}
