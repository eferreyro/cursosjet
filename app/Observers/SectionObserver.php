<?php

namespace App\Observers;
use App\Models\Section;
use Illuminate\Support\Facades\Storage;

class SectionObserver
{
    //Cuando intentamos eliminar una seccion, toma la cascada completa de lecciones y recursos y tambien las elimina
    public function deleting(Section $section){
        foreach ($section->lessons as $lesson) {
            # Si la seccion tiene lecciones y recursos dentro de las lecciones
            if ($lesson->resource) {
                # Elimino el archivo
                Storage::delete($lesson->resource->url);
                #Elimino el registro de la DB
                $lesson->resource->delete();
            }
        }
    }
}
