<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Lesson;
class CourseStatus extends Component
{
    public $course, $current;


    public function mount(Course $course){
        $this->course = $course;
        //Busca las lecciones completadas y le asigna a la propiedad current el valor de no completada
        foreach ($course->lessons as $lesson) {
            if(!$lesson->completed){
                $this->current = $lesson;

                break;
            }
        }
        //Si current no trae nada
        if (!$this->current) {
            # Le indico que Lesson es la ultima
            $this->current = $course->lessons->last();
        }
        
    }


    public function render()
    {
        return view('livewire.course-status');
    }


    //Metodos
    public function changeLesson(Lesson $lesson){
        $this->current = $lesson;
        //recupero la informacion almacenada en Lesson
        $this->index = $this->course->lessons->pluck('id')->search($lesson->id);

    }

    public function completed(){
        if($this->current->completed){
            //Eliminar registro
            $this->current->users()->detach(auth()->user()->id);

        }else{
            //agregar registro
            $this->current->users()->attach(auth()->user()->id);
        }
        //Actualizo los botones de Finalizado y el circulo de la derecha de la leccion
        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);

    }

    //Propiedades computadas para los botones de Next y Previous de cada curso
    public function getIndexProperty(){
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }
    public function getPreviousProperty()
    {
        if ($this->index == 0) {
            return null;
        } else {

            return $this->course->lessons[$this->index - 1];
        }
    }
    public function getNextProperty(){
        if ($this->index == $this->course->lessons->count() - 1) {
            return null;
        } else {
            return $this->course->lessons[$this->index + 1];
        }
        
    }
        public function getAdvanceProperty(){
                $i = 0;
                foreach ($this->course->lessons as $lesson) {
                    # code...
                    if($lesson->completed){
                        $i++;
                    }
                }
                $advance = ($i * 100)/($this->course->lessons->count());
                return round($advance, 2);
        }
    }
