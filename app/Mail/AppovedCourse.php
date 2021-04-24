<?php

namespace App\Mail;

use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppovedCourse extends Mailable
{
    use Queueable, SerializesModels;
    public $course;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Course $course)
    {
        //
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //Vista que vamos a enviar por email
        return $this->view('mail.approved-course')
                    ->subject('Nuevo curso publicado');
    }
}
