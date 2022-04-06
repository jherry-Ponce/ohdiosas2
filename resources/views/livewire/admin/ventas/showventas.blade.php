<div class="mt-16">
    <div class=" bg-white pl-4 py-2 shadow-lg shadow-white-500/50 mb-4" >
        <h2 class="text-xl font-bold text-gray-800 leading-tight mb-4  ">
           <i class="fas fa-cart-plus fa-fw mr-3"></i>Nueva Venta
        </h2>
        @if ($modal)
            @include('components.ventanausuario')
        @endif
        
        
        <div class="grid place-items-center items-center  md:gap-0 gap-4  md:grid-cols-3  grid-cols-1 mb-4">
            <div class=" hover:text-blue-500 cursor-pointer">
               <i class="fas fa-cart-plus fa-fw"></i>   <a href="{{route('Kardex.index')}}" > Nueva Venta</a> 
            </div>

            <div class=" hover:text-blue-500 cursor-pointer">
               <i class="fas fa-search fa-fw"></i> Ventas Realizadas
            </div>
           
            <div class=" hover:text-blue-500 cursor-pointer">
               <i class="fas fa-search-dollar fa-fw"></i>Buscar Venta
            </div>
        </div>
   </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 lg:grid-cols-6 mx-2 mt-4">

        <div class=" container col-span-1 md:col-span-3 lg:col-span-4 mt-4 ">
             <div class="grid lg:grid-cols-4 md:grid-cols-3  justify-items-center place-items-center">
                <div class=" col-span-1">
                    <button type="button" class="flex relative font-semibold uppercase border-0 text-green-500" >
                        <i class="fas fa-search"></i> &nbsp; Buscar producto
                    </button>               
                 </div>
    
                 <div class=" col-span-1 md:col-span-2  w-full">
                    <x-jet-input type="text" wire:model="search" placeholder="Nombre del Porducto" class="inputoutlinenone text-center border-b-black  w-full" />
                 </div>
    
                 <div class="col-span-1">
                    <button type="button" class="lex relative font-semibold uppercase border-0 text-green-500" >
                        <i class="far fa-check-circle"></i> &nbsp; Agregar producto
                    </button>
                 </div>
             </div>

             <div class="mt-8 hidden md:block">
                <div class="md:col-span-3 lg:col-span-4">

                        {{-- gap-6 brinda espaciado entre columnas anto en el eje x  como y --}}
                        <ul class=" grid md:grid-cols-2 lg:grid-cols-4 gap-6 ">
                            @foreach ($products as $product)
                                <li class="bg-white rounded-lg shadow">
                                    <article>
                                        <figure>
                                            <img class=" h-44 rounded-t w-full  object-cover object-center" src="/storage/{{$product->images->first()->url }}" alt="">
                                        </figure>
        
                                        <div class="py-4 px-6">
                                                <h1 class="text-lg font-semibold">
                                                   {{--  <a href=" {{ route('products.show', $product) }} "> --}}
                                                        {{Str::limit($product->name, 10)}}
                                                    {{-- </a>  --}}
                                                </h1>
        
                                                <p class="font-bold text-trueGray-700">S/ {{$product->priceV}}</p>
                                                <div class="flex  items-end justify-items-end w-full">
                                                    <x-jet-button 
                                                    x-bind:disabled="$wire.qty > $wire.quantity"
                                                    wire:click="addItem({{ $product->id }})"
                                                    wire:loading.attr="disabled"
                                                    wire:target="addItem"
                                                    value="{{$product->id}}"

                                                        class="mb-0 w-full"
                                                    >
                                                             <i class="fas fa-cart-plus fa-fw"></i>add
                                                    </x-jet-button>     
                                                </div>
                                                
                                        </div>
                                    </article>
                                </li>
                            @endforeach
                        </ul>
        
                  
        
                    {{-- paginacion --}}
                    <div class="mt-4">
                        {{$products->links()}}
                    </div> 
                </div>
             </div>
            

        </div>

        <div class="container col-span-1 md:col-span-2 mt-4 ">
            <h2>DATOS DE VENTA</h2>
            <hr>

            <div class="mt-2">
                <x-jet-label value="Fecha:"  />
                <x-jet-input value=" {{Date::now()->locale('es')->timezone('America/lima')->format('d-m-Y')}}" readonly="true" class="inputoutlinenone w-full text-center  bg-gray-100" />
                 
            </div>

            <div class="mt-2">
                <x-jet-label value="Vendedor:"  />
                <x-jet-input type="text" value="{{Auth::User()->name}}" readonly="true" class="inputoutlinenone w-full text-center  bg-gray-100" />
                 
            </div>

            <div class="mt-2">
                <x-jet-label value="Cliente:"  />
                <div class="flex">
                    @if ($nombre)                                         
                        <x-jet-input type="text" wire:model="nombre" class="inputoutlinenone w-full text-center bg-gray-50" />
                        @else
                        <x-jet-input type="text" class="inputoutlinenone w-full text-center bg-gray-50"  />
                    @endif
                     <span  wire:click="crearModal()" class="text-white p-3 cursor-pointer bg-indigo-500 hover:bg-blue-500 rounded-xl "><i class=" fas fa-user-plus "></i> </span>
                </div>
                
            </div>

            <div class="mt-2">
                <x-jet-label value="Total pagado por el cliente:"  />
                <div class="flex">
                    <x-jet-input type="number" wire:model="pago"  class="inputoutlinenone w-full text-center bg-gray-50" />
                    <x-jet-input-error for="pago" />
                </div>
            </div>

            <div class="mt-2">
                <x-jet-label value="Cambio:"  />
                <div class="flex">
                    
                    <x-jet-input type="number" wire:model="vuelto" readonly="true" class="inputoutlinenone w-full text-center bg-gray-50" />
                   
                </div>
            </div>

            <div class="mt-2  container">
                @if (Cart::instance( 'ventas' )->count()) 
                    <div class="grid grid-cols-2 mt-4 ">
                        <div>
                            <span class=" font-semibold">Subtotal:</span>
                        </div>
                        
                        <div>
                            <span class="mx-2">S/.{{round(Cart::subtotal()-(Cart::subtotal()*18)/100,2) }}</span>
                        </div>
                        
                    </div>

                    <div class="grid grid-cols-2 mt-4 mb-4 ">
                        <span class="flex font-semibold">IGV (18%):</span>
                        <span class="mx-2">S/.{{(round(Cart::subtotal()*18)/100) }}</span>
                    </div>
                   
                    <hr>
                
                    <div class="grid grid-cols-2 mt-4">
                      
                            <span class="flex font-semibold">Total:</span>
                            <span  class="mx-2"> S/. {{ Cart::subtotal() }}</span>
                      
                    </div>        
                 @else
                    <div class="grid grid-cols-2 mt-4 ">
                        <div>
                            <span class=" font-semibold">Subtotal:</span>
                        </div>
                        
                        <div>
                            <span class="mx-2">S/0.00</span>
                        </div>
                        
                    </div>

                    <div class="grid grid-cols-2 mt-4 mb-4 ">
                        <span class="flex font-semibold">IGV (18%):</span>
                        <span class="mx-2">S/0.00</span>
                    </div>
                
                    <hr>
                
                    <div class="grid grid-cols-2 mt-4">
                    
                        <span class="flex font-semibold">Total:</span>
                        <span  class="mx-2"> S/0.00</span>
                    
                    </div>          
                  
                @endif        
            </div>

            <div class="mt-4">
                <x-jet-button 
                                {{--  wire:loading.attr="disabled"
                                wire:target="save"--}}
                               wire:click="venta"
                                class="inline-flex justify-center w-full"
                            >
                                Guardar Venta
                           </x-jet-button>        
            </div>
   

        </div>

    </div>
</div>
