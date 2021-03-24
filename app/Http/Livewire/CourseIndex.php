<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
//Importo los modelos de category y level para leer sus registros
use App\Models\Category;
use App\Models\Level;

use Livewire\WithPagination;

class CourseIndex extends Component
{
    use WithPagination;

    public $category_id;
    public $level_id;


    public function render()
    {
        $categories = Category::all();
        $levels = Level::all();

        $courses = Course::where('status', 3)
                            ->category($this->category_id)
                            ->level($this->level_id)
                            ->latest('id')  
                            ->paginate(8);

        return view('livewire.course-index', compact('courses', 'categories', 'levels'));
    }

    public function resetFilters(){
        $this->reset(['category_id', 'level_id']);
    }

}
