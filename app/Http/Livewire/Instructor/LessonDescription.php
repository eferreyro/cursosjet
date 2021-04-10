<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Lesson;
use Livewire\Component;

class LessonDescription extends Component
{
    public $lesson, $description, $name;
    protected $rules =[
        'description.name' =>'required'
    ];
    public function mount(Lesson $lesson){
        //reemplazamos lo que enviamos por el componente
        $this->lesson = $lesson;
        if ($lesson->description) {
            # code...
            $this->description = $lesson->description;
        }
    }
    public function render()
    {
        return view('livewire.instructor.lesson-description');
    }
    public function store(){
        //Agrego un nuevo registro en la tabla description, relacionado primero con la leccion
        $this->description = $this->lesson->description()->create(['name' => $this->name]);
        //reseteo el form
        $this->reset('name');

        //Actualizo la vista para evitar recargars
        $this->lesson = Lesson::find($this->lesson->id);
        
    }

    public function update(){
        //valido la informacion
        $this->validate();
        //actualizo la base de datos con la informacion que viene por el wire:update del form
        $this->description->save();
    }

    public function destroy(){
        //Elimino el registro
        $this->description->delete();
        //Reseteo el formulario
        $this->reset('description');
        //Actualizo la vista para evitar recargars
        $this->lesson = Lesson::find($this->lesson->id);
    }
}
