<x-app-layout>
    <div class="max-w-4 mx-auto sm:px6 lg:p-8 py-12">
        <h1 class="text-gray-500 text-3xl font-bold">Detalle de la compra</h1>
        <div class="card text-gray-600">
            <div class="card-body">
                <article class="flex items-center">
                    <img class="h-12 w-12 object-cover rounded" src="{{Storage::url($course->image->url)}}" alt="">
                    <h1 class="text-lg ml-2">{{$course->title}}</h1>
                    <p class="text-xl font-bold ml-auto">MXN {{$course->price->value}}</p>
                </article>
                <div class="flex justify-end mt-2">
                    <a href="" class="btn btn-primary"> Comprar este curso</a>
                </div>
                <hr class="mt-4 shadow">
                <p class="text-sm mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. In perferendis distinctio quos amet, repellat cumque eveniet id blanditiis ipsa fugit quibusdam sint! Magnam neque architecto,
                     hic placeat tempore maiores obcaecati.<a href="" class="text-red-500 font-bold">Terminos y condiciones</a> </p>
            </div>
        </div>
    </div>
</x-app-layout>