<x-app-layout>
    <section class="bg-cover" style="background-image: url({{ asset('img/home/1111.jpg')}})">
       <div class="max-w-7x1 mx-auto px-4 sm:px-6 lg:px-8 py-36">
        <div class="w-full md:w-3/4 lg:w-1/2">
            
        <h1 class="text-white font-bold text-4xl ">Systems Install Cente / CURSOS</h1>
        <p class="text-white text-lg mt-2 mb-4">Sistema de gestion de instalaciones de servidores para WinsTech</p>
        <!-- component -->
    <!-- This is an example component -->
    @livewire('search')
        </div>
       </div>
    </section>
    @livewire('courses-index')
</x-app-layout>