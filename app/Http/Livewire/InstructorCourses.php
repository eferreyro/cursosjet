<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;

class InstructorCourses extends Component
{
    use WithPagination;

    public $search;
    public function render()
    {
        //Recupero todo el listado de cursos
        $courses = Course::where('title', 'LIKE', '%' . $this->search . '%')
                           ->where('user_id',auth()->user()->id)
                           ->paginate(8);
        //Ya que tengo la lista de todos los cursos separados por ID de usuario se lo paso a la vista
        return view('livewire.instructor-courses', compact('courses'));
    }
    public function limpiar_page(){
        $this->reset('page');
    }
}
