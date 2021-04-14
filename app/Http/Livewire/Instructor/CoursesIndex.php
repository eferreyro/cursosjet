<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;
//Importo los modelos de category y level para leer sus registros
use App\Models\Category;
use App\Models\Level;

use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;
    public $search;
    public $category_id;
    public $level_id;


    public function render()
    {
        $categories = Category::all();
        $levels = Level::all();
        $courses = Course::where('title', 'LIKE', '%' . $this->search . '%')
                            ->where('user_id', auth()->user()->id)
                            ->orderBy('id', 'desc')
                            ->paginate(10);


        return view('livewire.instructor.courses-index', compact('courses', 'categories', 'levels'));
    }


    public function limpiar_page(){
        $this->reset('page');
    }

}
