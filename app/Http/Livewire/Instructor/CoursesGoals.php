<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\Goal;
use Livewire\Component;

class CoursesGoals extends Component
{
    public $course, $goal, $name;
    protected $rules = [
        'goal.name' => 'required'
    ];

    public function mount(Course $course){
        $this->course = $course;
        $this->goal = new Goal();

    }
    
    public function render()
    {
        return view('livewire.instructor.courses-goals');
    }

    public function store(){
        //Regla de validarcion
        $this->validate([
            'name' => 'required'
        ]);
        //Inserto en la base de datos lo que viene desde el formulario wire:submit
        $this->course->goals()->create([
            'name' => $this->name
        ]);
        //reseteo el campo name
        $this->reset('name');
        //Actualizo la vista para evitar recargar
        $this->course = Course::find($this->course->id);
    }


    public function edit(Goal $goal){
        $this->goal = $goal;

    }

    public function update(){
        //valido si lo que viene por el formulario tiene datos y son validos
        $this->validate();
        //Luego de validar guardo en la base de datos
        $this->goal->save();
        //Borro los datos del formulario
        $this->goal = new Goal;
        //Actualizo la vista para evitar recargar
        $this->course = Course::find($this->course->id);

    }

    public function destroy(Goal $goal){
        $goal->delete();
        $this->course = Course::find($this->course->id);
    }
}
