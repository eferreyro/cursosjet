<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Section;
use Livewire\Component;
use App\Models\Lesson;
use App\Models\Platform;

class CoursesLesson extends Component
{
    public $section, $lesson, $platforms, $name, $platform_id = 1, $url;
    protected $rules = [
        'lesson.name' => 'required',
        'lesson.platform_id' => 'required',
        'lesson.url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x']

    ];

    public function mount(Section $section)
    {
        $this->section = $section;
        $this->platforms = Platform::all();
        $this->lesson = new Lesson();
    }
    public function render()
    {
        return view('livewire.instructor.courses-lesson');
    }
    public function edit(Lesson $lesson)
    {
        $this->resetValidation();
        $this->lesson = $lesson;
    }

    public function store()
    {

        $rules = [
            'name' => 'required',
            'platform_id' => 'required',
            'url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x']

        ];
        if ($this->platform_id == 2) {

            # Si el platform_id es igual a vimeo hago la validacion
            $rules['url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
        }
        $this->validate($rules);
        //Agrego un nuevo registro a la base de datos con los campos que vienen desde la validacion de RULES
        Lesson::create([
            'name' => $this->name,
            'platform_id' => $this->platform_id,
            'url' => $this->url,
            'section_id' => $this->section->id
        ]);
        //Formateo los campos
        $this->reset([
            'name',
            'platform_id',
            'url'
        ]);
        //Refresco la informacion en pantalla para evitar que el usuario refreque la pagina para ver la nueva informacion.
        $this->section = Section::find($this->section->id);
    }
    public function update()
    {
        if ($this->lesson->platform_id == 2) {
            # code...
            $this->rules['lesson.url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
        }
        $this->validate();

        //recuperar la propiedad lesson y actualizar la base de datos
        $this->lesson->save();
        $this->lesson = new Lesson();

        $this->section = Section::find($this->section->id);
    }

    //Wire para el boton de eliminar leccion
    public function destroy(Lesson $lesson){
        $lesson->delete();
        $this->section = Section::find($this->section->id);

    }
    //wire para el boton de cancel.
    public function cancel()
    {
        //Limpio la informacion de la propiedad Lesson sin cambios.
        $this->lesson = new Lesson();
    }
}
