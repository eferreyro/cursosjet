<section class="mt-4">
    <h1 class="font-bold text-3xl text-gray-800">Valoraciones</h1>
    {{-- Permito que un usuario registrado pueda agregar una valoracion de un curso --}}
    @can('enrolled', $course)
        <article class="mb-4">
            @can('valued', $course)

                <textarea wire:model="comment" class="form-input w-full" rows="3"
                    placeholder="Agregar una reseña del curso"></textarea>
                <div class="flex items-center">
                    <button class="btn btn-primary mr-4 " wire:click="store">Guardar</button>
                    <ul class="flex ">
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 1)">
                            <i class="fas fa-star text-{{ $rating >= 1 ? 'yellow' : 'gray' }}-300"></i>
                        </li>
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 2)">
                            <i class="fas fa-star text-{{ $rating >= 2 ? 'yellow' : 'gray' }}-300"></i>
                        </li>
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating',3 )">
                            <i class="fas fa-star text-{{ $rating >= 3 ? 'yellow' : 'gray' }}-300"></i>
                        </li>
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating',4 )">
                            <i class="fas fa-star text-{{ $rating >= 4 ? 'yellow' : 'gray' }}-300"></i>
                        </li>
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating',5 )">
                            <i class="fas fa-star text-{{ $rating == 5 ? 'yellow' : 'gray' }}-300"></i>
                        </li>
                    </ul>
                </div>
            @else
                <div x-data="{ show: true }" x-show="show"
                    class=" bg-white my-4 rounded-r-md px-6 border-l-4 border-blue-500 w-full">
                    <div class="flex items-center py-4">
                        <i class="fas fa-info-circle fill-current text-4xl text-gray-700"></i>
                        <div class="ml-5">
                            <h1 class="text-lg font-bold">Muchas gracias!</h1>
                            <p class="text-gray-700 my-0">Ya has valorado este curso.</p>
                        </div>

                    </div>
                </div>

            @endcan
        </article>
    @endcan
    {{-- Valoraciones que tiene un curso --}}
    <div class="card">
        <div class="card-body">
            <p class="text-gray-800 text-xl">{{ $course->reviews->count() }} valoraciones</p>


            @foreach ($course->reviews as $review)
                <article class="flex b-4 text-gray-600">
                    <figure class="mr-4">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg"
                            src="{{ $review->user->profile_photo_url }}" alt="">
                    </figure>
                    <div class="card flex-1 ml-2">
                        <div class="card-body bg-gray-100">
                            <p>
                                <b>{{ $review->user->name }}</b>
                                <i class="fas fa-star text-yellow-300"></i>
                                ({{ $review->rating }})
                            </p>
                            {{ $review->comment }}
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
