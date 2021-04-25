<x-instructor-layout :course="$course">
    {{-- INICIA CONTENIDO DINAMICO DE VIEWS/LAYOUTS/INSTRUCTOR.BLADE.PHP --}}
    <h1 class="text-2xl font-bold">OBSERVACIONES DEL CURSO</h1>
    <hr class="mt-2 mb-6 shadow">

<div class="text-gray-500">
    {!!$course->observation->body!!}
</div>
</x-instructor-layout>