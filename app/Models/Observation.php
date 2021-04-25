<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;
    //Hbilito la asignacion masiva
    protected $fillable = ['body', 'course_id'];


    //Relacion uno a uno Inversa con Course
    public function Course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
