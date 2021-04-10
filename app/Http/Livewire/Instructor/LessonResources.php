<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Lesson;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class LessonResources extends Component
{
    use WithFileUploads;
    
    public $lesson, $file;
    
    public function mount(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }

    public function render()
    {

        return view('livewire.instructor.lesson-resources');
    }

    public function save(){
        $this->validate([
            'file' =>'required'
        ]);
        //Muevo la imagen subida a la carpeta temporal a una carpeta llamada resources
       $url = $this->file->store('resources');

       //Guardo lo que viene en la variable $url en la base de datos
       $this->lesson->resource()->create([
           'url' => $url
       ]);
        //recupero el registro de la base de datos
       $this->lesson = Lesson::find($this->lesson->id);
    }

    public function destroy(){
        //Funcion para eliminar la imagen del Storage
        Storage::delete($this->lesson->resource->url);

        //Funcion para eliminar el registro de la DB
        $this->lesson->resource->delete();

        //Refresco la informacion de la vista para evitar recargar
        $this->lesson = Lesson::find($this->lesson->id);
    }

    public function download(){
        return response()->download(storage_path('app/public/' . $this->lesson->resource->url));
    }
}
