<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;

class CoursesStudents extends Component
{

    public $course;

    public function mount(Course $course){
        $this->course = $course;

    }
    public function render()
    {
        $students = $this->course->students()->paginate(4);
        return view('livewire.instructor.courses-students', compact('students'))->layout('layouts.instructor');
    }
}
