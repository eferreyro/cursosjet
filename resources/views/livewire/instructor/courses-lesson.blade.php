<div>
    {{-- Manipulo la vista del componente para mostrarla en courses-curriculum.php --}}
    @foreach ($section->lessons as $item)
        <article class="card mt-4">
            <div class="card-body">
                @if ($lesson->id == $item->id)
                    <div>
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
                            <button class="btn btn-danger">Cancel</button>
                                <button class="btn btn-primary ml-2" wire:click="update">Actualizar</button>

                        </div>
                    </div>
                @else
                    <header>
                        <h1><i class="far fa-play-circle text-blue-500 mr-1"></i>Leccion: {{ $item->name }}</h1>
                    </header>
                    <div>
                        <hr calss="my-2">
                        <p class="text-sm">Plataforma: {{ $item->platform->name }}</p>
                        <p class="text-sm">Enlace: <a class="text-blue-600" href="{{ $item->url }}"
                                target="_blank">{{ $item->url }}</a></p>
                        <div class="mt-2">
                            <button class="btn btn-primary text-2m"
                                wire:click="edit({{ $item }})">Editar</button>
                            <button class="btn btn-danger text-2m">Eliminar</button>

                        </div>
                    </div>
                @endif
            </div>
        </article>

    @endforeach
</div>
