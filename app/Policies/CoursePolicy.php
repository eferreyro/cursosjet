<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Course;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    //metodo que verifica si un usuario esta matriculado a un curso.
    public function enrolled(User $user, Course $course){
        //recupero el registro de todos los usuarios que han tomado el curso (DB usuario_curso)
        return $course->students->contains($user->id);
    }
    //Metodo que verifica si un curso esta o no publicado
    public function published(?User $user, Course $course){
        if($course->status == 3){
            return true;
        }else{
            return false;
        }
    }
    //Metodo para verificar si el usuario que creo el curso es el mismo que esta logueado
    public function dictated(User $user, Course $course){
        if($course->user_id == $user->id){
            return true;
        }else{
            return false;
        }
    }
}
