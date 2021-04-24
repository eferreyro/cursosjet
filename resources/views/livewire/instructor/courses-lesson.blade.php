<div>
    {{-- Manipulo la vista del componente para mostrarla en courses-curriculum.php --}}
    @foreach ($section->lessons as $item)
        <article class="card mt-4" x-data="{open: false}">
            <div class="card-body">
                @if ($lesson->id == $item->id)
                    <form wire:submit.prevent="update">
                        <div class="flex items-center ">
                            <label class="w-32">Nombre:</label>
                            <input wire:model="lesson.name" class="form-input w-full" type="text" name="">
                        </div>
                        @error('lesson.name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                        <div class="flex items-center mt-4">
                            <label class="w-32">Plataforma:</label>
                            <select wire:model="lesson.platform_id"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($platforms as $platform)
                                    <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center mt-2">
                            <label class="w-32">URL:</label>
                            <input wire:model="lesson.url" class="form-input w-full" type="text" name="">
                        </div>
                        @error('lesson.url')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror


                        <div class="mt-4 flex justify-end">
                            <button type="button" class="btn btn-danger" wire:click="cancel">Cancel</button>
                            <button type="submit" class="btn btn-primary ml-2">Actualizar</button>

                        </div>
                    </form>
                @else
                    <header>
                        <h1 x-on:click="open = !open" class="cursor-pointer"><i class="far fa-play-circle text-blue-500 mr-1"></i>Leccion: {{ $item->name }}</h1>
                    </header>
                    <div x-show="open">
                        <hr calss="my-2">
                        <p class="text-sm">Plataforma: {{ $item->platform->name }}</p>
                        <p class="text-sm">Enlace: <a class="text-blue-600" href="{{ $item->url }}"
                                target="_blank">{{ $item->url }}</a></p>
                        <div class="mt-2">
                            <button class="btn btn-primary text-2m"
                                wire:click="edit({{ $item }})">Editar</button>
                            <button class="btn btn-danger text-2m"
                                wire:click="destroy({{ $item }})">Eliminar</button>
                            <div class="my-2">
                                @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description-'.$item->id))
                            </div>
                            <div class="mb-2">
                                @livewire('instructor.lesson-resources', ['lesson' => $item], key('lesson-resources-'.$item->id))
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </article>

    @endforeach

    <div class="mt-4" x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex item-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"> </i>
            Agregar Leccion
        </a>
        <div class="card">
            <article class="card" x-show="open">
                <div class="card-body ">
                    <h1 class="text-xl font-bold mb-4">Agregar Nueva Leccion</h1>
                    <div class="flex items-center ">
                        <label class="w-32">Nombre:</label>
                        <input wire:model="name" class="form-input w-full" type="text" name="">
                    </div>
                    @error('name')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="flex items-center mt-4">
                        <label class="w-32">Plataforma:</label>
                        <select wire:model="platform_id"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @foreach ($platforms as $platform)
                                <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="flex items-center mt-2">
                        <label class="w-32">URL:</label>
                        <input wire:model="url" class="form-input w-full" type="text" name="">
                    </div>
                    @error('url')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-end mb-2 ">
                    <button x-on:click="open = false" class="btn btn-danger">Cancel</button>
                    <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>
                </div>
            </article>
        </div>
    </div>
</div>
