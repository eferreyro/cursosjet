               <div class="mb-4">
                   {!! Form::label('title', 'Titulo del Curso') !!}
                   {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('title') ? ' border-red-600' : '')]) !!}
                   @error('title')
                       <strong class="text-xs text-red-600">{{ $message }}</strong>
                   @enderror
               </div>
               <div class="mb-4">
                   {!! Form::label('slug', 'Slug del Curso') !!}
                   {!! Form::text('slug', null, ['readonly'=> 'readonly','class' => 'form-input block w-full mt-1 font-semibold' . ($errors->has('slug') ? ' border-red-600' : '')]) !!}
                   @error('slug')
                       <strong class="text-xs text-red-600">The SLUG cannot be processed if the TITLE field is empty.</strong>
                   @enderror
               </div>
               <div class="mb-4">
                   {!! Form::label('subtitle', 'Subtitulo del Curso') !!}
                   {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('subtitle') ? ' border-red-600' : '')]) !!}
                   @error('subtitle')
                       <strong class="text-xs text-red-600">{{ $message }}</strong>
                   @enderror
               </div>
               <div class="mb-4">
                   {!! Form::label('description', 'Descripcion del Curso') !!}
                   {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('description') ? ' border-red-600' : '')]) !!}
                   @error('description')
                       <strong class="text-xs text-red-600">{{ $message }}</strong>
                   @enderror
               </div>
               <div class="grid grid-cols-3 gap-4">
                   <div>
                       {!! Form::label('category_id', 'Categoria:') !!}
                       {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1 ']) !!}
                   </div>
                   <div>
                       {!! Form::label('level_id', 'Niveles:') !!}
                       {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1 ']) !!}
                   </div>
                   <div>
                       {!! Form::label('price_id', 'Precio:') !!}
                       {!! Form::select('price_id', $prices, null, ['class' => 'form-input block w-full mt-1 ']) !!}
                   </div>
               </div>

               <h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>

               <div class="grid grid-cols-2 gap-4">
                   <figure>
                       @isset($course->image)
                           <img id="picture" class="w-full h-64 object-cover object-center"
                               src="{{ Storage::url($course->image->url) }}">

                       @else
                           <img id="picture" class="w-full h-64 object-cover object-center"
                               src="https://images.pexels.com/photos/3243/pen-calendar-to-do-checklist.jpg?cs=srgb&dl=pexels-breakingpic-3243.jpg&fm=jpg">

                       @endisset
                   </figure>
                   <div class="">
                       <p class="mb-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id cum ullam facilis
                           vero
                           voluptatibus eaque tempora, non aperiam pariatur ea nam excepturi accusantium accusamus
                           veritatis iusto? Repudiandae est fuga accusantium.</p>
                       {!! Form::file('file', ['class' => 'form-input w-full mt-20 ml-auto ', 'id' => 'file']) !!}
                   </div>
               </div>