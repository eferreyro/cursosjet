<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesStudents extends Component
{
    //Hago dinamica la paginacion
    use WithPagination;

    //Declaro las variables
    public $course, $search;


    public function mount(Course $course)
    {
        //Recibo el parametro que llega desde la URL que viene del modelo Course
        $this->course = $course;
    }
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $students = $this->course->students()->where('name', 'LIKE', '%' . $this->search . '%')->paginate(8);

        return view('livewire.instructor.courses-students', compact('students'))->layout('layouts.instructor');
    }
}
