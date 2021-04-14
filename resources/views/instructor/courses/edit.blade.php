<x-instructor-layout :course="$course">
    {{-- SLOT CON NOMBRE para la vista CoursesCurriculum.php --}}
 

    
    {{-- INICIA CONTENIDO DINAMICO DE VIEWS/LAYOUTS/INSTRUCTOR.BLADE.PHP --}}
    <h1 class="text-2xl font-bold">INFORMACION DEL CURSO</h1>
    <hr class="mt-2 mb-6 shadow">
    {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' => 'true']) !!}
    @include('instructor.courses.partials.form')
    <div class="flex justify-center mt-6">
        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
        <script src="{{ asset('js/instructor/courses/form.js') }}">

        </script>
    </x-slot>
</x-instructor-layout>
