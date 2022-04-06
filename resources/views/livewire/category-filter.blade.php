<div>
    {{-- aqui se da la barra de la categoria y la opcion grid y lista --}}
    <div class="bg-white rounded-lg shadow-lg mb-6">
        {{--justify-between -> permite la sepacion a los extremos    --}}
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-gray-700 uppercase">{{$category->name}}</h1>
        
            {{--  aqui van los iconos 
                se le da la clase grid y un grid-cols-2 el cual le da dos columnas una para cada icono
                luego para notar su separacion se le da la clase border y acompañado de border-gray-200 que es la tonalidad de la linea que los separa
                 --}}
            <div class="grid grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-gray-500">
                <i class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-blue-500' : ''}}" wire:click="$set('view', 'grid')"></i>
                <i class="fas fa-th-list p-3 cursor-pointer {{ $view == 'list' ? 'text-blue-500' : ''}}" wire:click="$set('view', 'list')"></i>
            </div>
        </div>
    </div>

    {{-- aca empieza el contenido dinamico que muestra filtros y productos//separado en 5 col por la grid --}}
    {{-- gap-6 ->separacion entre columna y columna --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">

        {{-- en el aside agregaremos las opciones de filtro --}}
        <aside>
           
            <h2 class="font-semibold text-center mb-2">Subcategoríass</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->subcategories as $subcategory)

                {{-- se utiliza metodos magicoa->permite cambiar facilmente las propiedades del componnete  
                    subcategoria es la variable que mandamos al componente y lo renderiza denuevo asi podemos compararlos con
                    la variable del foreach--}}
                    <li class="py-2 text-sm">
                        <a class="cursor-pointer hover:text-blue-500 capitalize {{ $subcategoria == $subcategory->slug  ? 'text-blue-500 font-semibold' : '' }}"
                            wire:click="$set('subcategoria', '{{$subcategory->slug}}')"
                        >{{$subcategory->name}}
                        </a>
                    </li>
                @endforeach
            </ul>

            <h2 class="font-semibold text-center mt-4 mb-2">Marcas</h2>
            <ul class="">
                @foreach ($category->brands as $brand)
                    <li class="py-2 text-sm">
                        <a class="cursor-pointer hover:text-blue-500 capitalize {{ $marca == $brand->name ? 'text-blue-500 font-semibold' : ''}}"
                            wire:click="$set('marca', '{{$brand->name}}')"
                        >
                            {{$brand->name}}
                        </a>
                    </li>
                @endforeach
            </ul>

            {{-- evento click --}}
            <x-jet-button class="mt-4" wire:click="limpiar">
                Eliminar filtros
            </x-jet-button>
        </aside>

        <div class="md:col-span-2 lg:col-span-4">
            @if ($view  == 'grid')

                {{-- gap-6 brinda espaciado entre columnas anto en el eje x  como y --}}
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse ($products as $product)
                        <li class="bg-white rounded-lg shadow">
                            <article>
                                <figure>
                                    <img class="h-48 rounded-t w-full object-cover object-center" src="/storage/{{$product->images->first()->url }}" alt="">
                                </figure>

                                <div class="py-4 px-6">
                                        <h1 class="text-lg font-semibold">
                                            <a href=" {{ route('products.show', $product) }} ">
                                                {{Str::limit($product->name, 20)}}
                                            </a> 
                                        </h1>

                                        <p class="font-bold text-trueGray-700">S/ {{$product->priceV}}</p>
                                </div>
                            </article>
                        </li>

                    @empty
                    <li class="md:col-span-2 lg:col-span-4">
                        <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                            <div class="flex">
                              <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                              <div>
                                <p class="font-bold">Ups!</p>
                                <p class="text-sm">No se encontraron productos con los filtros aplicados.</p>
                              </div>
                            </div>
                        </div>
                    </li>
                    
                    
                    @endforelse
                </ul>

            @else
                <ul>
                    @forelse ($products as $product)
                        <li class="bg-white rounded-lg shadow mb-4">

                            <article class="flex">
                                <figure>
                                    <img class="h-48 w-56 object-cover object-center sm:w-72" src="/storage/{{$product->images->first()->url }}" alt="">
                                </figure>
                                {{-- flex-1 hace que se tome todo el ancho del lado derecho --}}
                                <div class="flex-1 py-4 px-6 flex flex-col ">
                                    <div class="flex justify-between">
                                        <div>
                                            <h1 class="text-lg font-semibold text-gray-700"> {{$product->name}} 
                                                
                                            </h1>

                                            <p class="font-semibold text-gray-700"> S/ {{$product->priceV}}</p>

                                        </div>
                                        
                                        {{-- calicificacion de estrellas por parte del cliente --}}
                                        <div class=" items-center hidden  lg:flex">
                                            <ul class="flex text-sm ">
                                                <li>
                                                    <i class="fas fa-star  text-yellow-400 mr-1 "></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star  text-yellow-400 mr-1"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star  text-yellow-400 mr-1"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star  text-yellow-400 mr-1"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star  text-yellow-400 mr-1"></i>
                                                </li>
                                            </ul>
                                            <span class="text-grey-700 text-sm">(24)</span>
                                        </div>

                                    
                                    </div>
                                    <div class="mt-auto mb-6">
                                        {{-- llama al boton de jetstrean --}}
                                        <x-danger-enlace href="{{route('products.show',$product)}}">
                                            Mas informacion
                                        </x-danger-enlace>   
                                    </div>
                                </div>
                            </article>
                        </li>
                        
                        @empty
                        <li class="md:col-span-2 lg:col-span-4">
                            <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                                <div class="flex">
                                  <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                  <div>
                                    <p class="font-bold">Ups!</p>
                                    <p class="text-sm">No se encontraron productos con los filtros aplicados.</p>
                                  </div>
                                </div>
                            </div>
                        </li>
                        
                        
                        @endforelse
                </ul>
            @endif

            {{-- paginacion --}}
            <div class="mt-4">
                {{$products->links()}}
            </div>
        </div>

    </div>
</div>
