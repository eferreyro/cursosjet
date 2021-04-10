<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\Requirement;
use Livewire\Component;

class CoursesRequirements extends Component
{
    public $course, $requirement, $name;
    protected $rules = [
        'requirement.name' => 'required'
    ];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->requirement = new Requirement();
    }

    public function render()
    {
        return view('livewire.instructor.courses-requirements');
    }
    public function store()
    {
        //Regla de validarcion
        $this->validate([
            'name' => 'required'
        ]);
        //Inserto en la base de datos lo que viene desde el formulario wire:submit
        $this->course->requirements()->create([
            'name' => $this->name
        ]);
        //reseteo el campo name
        $this->reset('name');
        //Actualizo la vista para evitar recargar
        $this->course = Course::find($this->course->id);
    }


    public function edit(Requirement $requirement)
    {
        $this->requirement = $requirement;
    }

    public function update()
    {
        //valido si lo que viene por el formulario tiene datos y son validos
        $this->validate();
        //Luego de validar guardo en la base de datos
        $this->requirement->save();
        //Borro los datos del formulario
        $this->requirement = new Requirement();
        //Actualizo la vista para evitar recargar
        $this->course = Course::find($this->course->id);
    }

    public function destroy(Requirement $requirement)
    {
        $requirement->delete();
        $this->course = Course::find($this->course->id);
    }
}
