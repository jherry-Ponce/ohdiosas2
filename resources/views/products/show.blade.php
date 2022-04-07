<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6" >
            <div>
                <!-- Place somewhere in the <body> of your page -->
                <div class="flexslider">
                    <ul class="slides">
                        @if ($product->images->count())
                            @foreach ($product->images as $image)
                                <li {{-- class="rounded-t h-96 w-full object-cover object-center" --}} data-thumb="/storage/{{$image->url}}">
                                    <img class="w-full" src="/storage/{{$image->url}}" />
                                </li>
                            @endforeach
                        @endif
                    
                    </ul>
                </div>

            </div>
                
            <div>
                <h1 class="text-xl font-bold text-trueGray-700">{{$product->name}}</h1>

                <div class="flex">
                    <p class="text-trueGray-700">Marca: <a class="underline capitalize hover:text-blue-500" href="">{{ $product->brand->name }}</a></p>
                    <p class="text-trueGray-700 mx-6">5 <i class="fas fa-star text-sm text-yellow-400"></i></p>
                    <a class="text-blue-500 hover:text-blue-600 underline" href="">39 reseñas</a>
                </div>

                <p class="text-2xl font-semibold text-trueGray-700 my-4">S/ {{ $product->priceV }}</p>

                {{-- shadow se encarga de dale el relive del fondo --}}
                <div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-greenLime-600">
                            <i class="fas fa-truck text-sm text-white"></i>
                        </span>
                        
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-greenLime-600">Se hace envíos a todo el Perú</p>
                            {{-- SE UTILIZA INSTANCIA CARBON ASI QUE USAMOS NOW ///PARA QUE LA FECHA SE NOS MUESTRE EN ESPAÑOL
                                EJECUTAMOS EN EL TERMINAL composer require jenssegers/date UNA VEZ EJECUTADO DE AGREGA DATE:NOW //
                                Y SE AGREGA EL METODO LOCAL(ES)')
                                    
                                @show --}}
                            <p>Recibelo el {{ Date::now()->addDay(2)->locale('es')->timezone('America/lima')->format('l j F') }}</p>
                        </div>
                    </div>
                </div>
                
                {{-- condicion para mostar los componentes en pantalla de acuerdo al tipo de producto/ con talla con solo color o normal --}}
                @if ($product->subcategory->size)
                    
                    @livewire('add-cart-item-size', ['product' => $product])

                @elseif($product->subcategory->color)

                    @livewire('add-cart-item-color', ['product' => $product])

                @else

                    @livewire('add-cart-item', ['product' => $product])

                @endif 
            </div>
        </div>

    </div>

    @push('script')
        <script >
            // Can also be used with $(document).ready() se coloca el documen,que idica que se ejecute despues que halla cargado la pagina
            $(document).ready(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
            });
        </script>
        
    @endpush
</x-app-layout>