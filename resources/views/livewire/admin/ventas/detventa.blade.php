<div class="mt-16" >
    <div class="  flex bg-white px-4 py-2 items-center shadow-xl" >
         <h2 class="font-semibold text-xl text-gray-800 leading-tight  ">
           Detalle Venta
         </h2>
         
        
    </div>
    
    <div class="container flex-1 flex-wrap mt-12 md:mt-0 pb-24 md:pb-5 ">   


      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-12">
      
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
                <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span> Orden-{{$ventas->id}}</p>
                
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <div class="grid grid-cols-2 gap-6 text-gray-700">
                    <div>
                        <p class="text-lg font-semibold uppercase">Cliente</p>

                        <p class="text-sm">Persona que recibio el producto: {{$cliente->name}}</p>
                        
                    </div>
                </div>
            </div>
        

            <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
                <p class="text-xl font-semibold mb-4">Resumen</p>

                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Precio</th>
                            <th>Cant</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @foreach ($items as $item)
                            <tr>
                                <td>
                                    <div class="flex">
                                        <img class="h-15 w-20 object-cover mr-4" 
                                            src="/storage/{{$item->options->image}}" alt=""> 
                                        <article>
                                            <h1 class="font-bold">{{$item->name}}</h1>
                                            <div class="flex text-xs">

                                                @isset ($item->options->color)
                                                    Color: {{__($item->options->color)}}
                                                @endisset

                                                @isset ($item->options->size)
                                                    - {{$item->options->size}}
                                                @endisset
                                            </div>
                                        </article>
                                    </div>
                                </td>

                                <td class="text-center">
                                S/. {{$item->price}} 
                                </td>

                                <td class="text-center">
                                    {{$item->qty}}
                                </td>

                                <td class="text-center">
                                    S/.{{$item->price * $item->qty}} 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

                <div class="bg-white rounded-lg shadow-lg p-6 flex justify-between items-center mb-8 ">
                    <img class="h-8" src="{{ asset('img/MC_VI_DI_2-1.jpg') }}" alt="">
                        <div class="text-gray-700">
                            <p class="text-sm font-semibold">
                                Subtotal: S/.{{$detVentas->total }} 
                            </p>
                        
                            <p class="text-lg font-semibold uppercase">
                                Total: S/.{{$detVentas->total}} 
                            </p>

                
                         </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6 flex justify-between items-center">

                  @if ($ventas->tipo == 2)
                    <a href="{{route("admin.imprimir",$detVentas)}}" target="_blank"> <x-button-dinamic >
                        ver Boletas
                    </x-button-dinamic> </a>
                  @else
                    <a href="{{route("admin.imprimirO",$detVentas)}}" target="_blank"> <x-button-dinamic >
                        ver Boletaa
                    </x-button-dinamic> </a>
                  @endif  
        
                   <a href="{{route("admin.ticket",$detVentas)}} " target="_blank"> <x-button-dinamic>
                        ver ticket
                    </x-button-dinamic> </a>
                </div>
      </div>

        

    </div>
 </div>     
</div>