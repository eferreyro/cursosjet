<x-app-layout>
    <section class="bg-cover" style="background-image: url({{ asset('img/home/2222.jpg')}})">
       <div class="max-w-7x1 mx-auto px-4 sm:px-6 lg:px-8 py-36">
        <div class="w-full md:w-3/4 lg:w-1/2">
            
        <h1 class="text-white font-bold text-4xl ">Systems Install Center</h1>
        <p class="text-white text-lg mt-2 mb-4">Sistema de gestion de instalaciones de servidores para WinsTech</p>
        <!-- component -->
    <!-- This is an example component -->
    @livewire('search')
        </div>
       </div>
    </section>
    <section class="mt-22">
        <h1 class="text-gray-600 text-center text-3xl mb-6">CONTENIDO</h1>

        <div class="max-w-7x1 mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover"  src="{{asset("img/home/im5.jpg")}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">lorem 1 </h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora voluptatum ipsum inventore </p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover"  src="{{asset("img/home/im2.jpg")}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">lorem 2</h1>
                </header>
                <p class="text-sm text-gray-500">lorem ipsum dolor excepturi dolores mollitia amet commodi illum sed nostrum. Dolores assumenda nemo labore, laborum cumque fugiat molestias vel dolore!</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover"  src="{{asset("img/home/im6.jpg")}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">lorem 3</h1>
                </header>
                <p class="text-sm text-gray-500">lorem ipsum dolor Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora voluptatum ipsum inventore</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset("img/home/im4.jpg")}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">lorem 4</h1>
                </header>
                <p class="text-sm text-gray-500">lorem ipsum dolor excepturi dolores mollitia amet commodi illum sed nostrum. Dolores assumenda nemo labore, laborum cumque fugiat molestias vel dolore!</p>
            </article>
        </div>
    </section>

    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">Lorem Ipsum DOLOR</h1>
        <p class="text-center text-white"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora voluptatum ipsum </p>
        <div class="flex justify-center mt-4">
            <a href="{{ route("courses.index") }}"class="bg-blue-500 hover:bg.blue-700 text-white font-bold py-2 px-4 rounded">
                Catalogo
            </a>

        </div>
    </section>


    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-600">ULTIMOS CURSOS</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Trabajo muy duro! Como un esclavo! paguenme dinero</p>

        <div class="max-w-7x1 mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4  gap-x-6 gap-y-8 grid-cols-1 ">
            @foreach ($courses as $course)
                <x-course-card :course="$course"/>
            @endforeach
        </div>
    </section>
</x-app-layout>


