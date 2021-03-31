<div class="container py-8">
    <x-table-responsive>
        <div class="px-6 py-4 flex">
            <input wire:keydown="limpiar_page" wire:model="search" class="form-input flex-1 shadow-sm " type="text"
                placeholder="Buscar curso">
                <a class="btn btn-danger ml-2" href="{{route('instructor.courses.create')}}">Crear curso</a>
        </div>
        @if ($courses->count())
            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Matriculados
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Calificacion
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($courses as $course)

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @isset($course->image)
                                        <img class="h-10 w-10 rounded-full obkect-cover object-center"
                                        src="{{ Storage::url($course->image->url) }}" alt="">
                                            @else
                                      <img id="picture" class="h-10 w-10 rounded-full obkect-cover object-center"
                               src="https://images.pexels.com/photos/3243/pen-calendar-to-do-checklist.jpg?cs=srgb&dl=pexels-breakingpic-3243.jpg&fm=jpg">

                                        @endisset
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $course->title }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $course->category->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $course->students->count() }}</div>
                                <div class="text-sm text-gray-500">Alumnos Matriculados</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 flex item-center">
                                    {{ $course->ratting }}
                                    <ul class="flex text-sm ml-2">
                                        <li class="mr-1">
                                            <i
                                                class="fas fa-star text-{{ $course->ratting >= 1 ? 'yellow' : 'gray' }}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i
                                                class="fas fa-star text-{{ $course->ratting >= 2 ? 'yellow' : 'gray' }}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i
                                                class="fas fa-star text-{{ $course->ratting >= 3 ? 'yellow' : 'gray' }}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i
                                                class="fas fa-star text-{{ $course->ratting >= 4 ? 'yellow' : 'gray' }}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i
                                                class="fas fa-star text-{{ $course->ratting == 5 ? 'yellow' : 'gray' }}-400"></i>
                                        </li>
                                    </ul>


                                </div>
                                <div class="text-sm text-gray-500 ">Valoraciones</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                @switch($course->status)
                                    @case(1)
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Borrador
                                    </span>
                                    @break
                                    @case(2)
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Revision
                                    </span>
                                    @break
                                    @case(3)
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Publicado
                                    </span>
                                    @break
                                    @default

                                @endswitch

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{route('instructor.courses.edit', $course)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                    @endforeach

                    <!-- More items... -->
                </tbody>
            </table>
            <div class="px-6 py-4">
                {{ $courses->links() }}
            </div>
        @else
            <div class="px-6 py-4 bg-red-100" role="alert">
                <strong>Ups!</strong> No hay ningun registro para esta busqueda.
            </div>
        @endif
    </x-table-responsive>

</div>
