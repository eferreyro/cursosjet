<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Course;
use App\Models\Review;

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

    //Metodo para evitar que un usuario admin publique un curso que esta como BORRADOR (Status == 2)
    public function revision(User $user, Course $course)
    {
        if ($course->status == 2) {
            return true;
        } else {
            return false;
        }
    }

    
    //Metodo para evitar que un usuario registrado yque haya hecho una valoracion de un curso, pueda hacer una segunda valoracion
    public function valued(User $user, Course $course)
    {
        //Si hay un registro ed usuario que coincide con el usuario registrado
        if (Review::where('user_id', $user->id)->where('course_id', $course->id)->count()){
            return false;
        }else{
            return true;
        }
    }
}