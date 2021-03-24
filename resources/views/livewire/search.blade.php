<form class="pt-2 relative mx-auto text-gray-600" autocomplete="off">
    <div class="pt-2 relative mx-auto text-gray-600">
        <input wire:model="search" class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
          type="search" name="search" placeholder="Search">

         <button type="submit" class="bg-blue-400 text-white font-semibold rounded font-lg absolute top-0 right-0 bottom-0 mt-3 mr-1 mb-1 px-4 ">
            Search
        </button>
        
    </div>
@if ($search)
    <ul class="absolute z-50 left-0 w-full bg-white mt-1 rounded-lg overflow-hidden">
        @forelse ($this->results as $result)
            <li class="leading-8 px-5 text-sm cursor-pointer hover:bg-blue-400">
                <a href="{{route('courses.show', $result)}}">{{$result->title}}</a>
            </li>
            @empty
            <li class="leading-8 px-5 text-sm cursor-pointer hover:bg-blue-400">
                No hay coincidencias :(
            </li>
        @endforelse
    </ul>
    
@endif
</form>