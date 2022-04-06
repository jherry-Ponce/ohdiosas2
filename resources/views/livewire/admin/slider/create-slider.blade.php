<div class=" mt-16">
    <div class="flex  pl-4 py-2 items-center shadow-xl ">
        <h2 class="text-gray-500 font-serif text-xl font-semibold  my-3 ">Sliders</h2>
        <button wire:click="crearModal()"
        class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 my-3 ml-auto rounded-md mr-6">Crear</button>
        @if ($modal)
            @include('components.modal')
        @endif
    </div>

    <div class=" container grid md:grid-cols-2 md:gap-11">
         @foreach ($slider as $item)
            <div class="shadow-xl w-full my-3">
                <figure class="w-full">
                    <img class="w-full h-96  object-cover object-center" src="/storage/{{$item->imagen}}" alt="{{$item->Nombre}}">
                </figure>
                <div class="w-full border border-gray-100 py-3 px-3">
                    {!!$item->descripcion!!}
                </div>
            </div>
        @endforeach 
    </div>
</div>
