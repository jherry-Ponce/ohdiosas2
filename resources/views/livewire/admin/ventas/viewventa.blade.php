<div class="mt-16" >
    <div class="  flex bg-white px-4 py-2 items-center shadow-xl" >
         <h2 class="font-semibold text-xl text-gray-800 leading-tight  ">
             Lista ventas
         </h2>
         
         <x-danger-enlace class="ml-auto" href="{{route('createventa.index')}}">
             Agregar Venta
         </x-danger-enlace> 
    </div>
    
 <div class="container flex-1 flex-wrap mt-12 md:mt-0 pb-24 md:pb-5 ">      

        <div class="container py-12">
    
            <section class="grid grid-cols-2 gap-6 text-white">
                    
                <a href="{{ route('orders.index') . "?status=4" }}" class="bg-green-600 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                    <p class="text-center text-2xl">
                      {{--   {{$entregado}} --}}
                    </p>
                    <p class="uppercase text-center">Entregado</p>
                    <p class="text-center text-2xl mt-2">
                        <i class="fas fa-check-circle"></i>
                    </p>
                </a>
    
                <a href="{{ route('orders.index') . "?status=5" }}" class="bg-red-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                    <p class="text-center text-2xl">
                      {{--   {{$anulado}} --}}
                    </p>
                    <p class="uppercase text-center">Anulado</p>
                    <p class="text-center text-2xl mt-2">
                        <i class="fas fa-times-circle"></i>
                    </p>
                </a>
            </section>
    
            @if ($venta->count())
                
            
                <section class="bg-white shadow-lg rounded-lg px-6 py-8 mt-12 text-gray-700">
                    <h1 class="text-2xl mb-4">Pedidos recientes</h1>
    
                    <ul>
                        @foreach ($venta as $ventas)
                    
                            <li>
                                <a href="{{route('detventa.index', $ventas)}}" class="flex items-center py-2 px-4 hover:bg-gray-100">
                                    <span class="w-12 text-center">
                                        @switch($ventas->status)
                                            @case(1)
                                                <i class="fas fa-business-time text-green-500 opacity-50"></i>
                                                @break
                                            @case(2)
                                                <i class="fas fa-credit-card text-red-500 opacity-50"></i>
                                                @break
                                         
                                            @default
                                                
                                        @endswitch
                                    </span>
    
                                    <span>
                                        Venta: {{$ventas->id}}
                                        <br>
                                        {{$ventas->created_at->format('d/m/Y')}}
                                    </span>
    
    
                                    <div class="ml-auto">
                                        <span class="font-bold">
                                            @switch($ventas->status)
                                                @case(1)
                                                    
                                                Entregado
    
                                                    @break
                                                @case(2)
                                                    
                                                Anulado
    
                                                    @break
                                            
                                                @default
                                                    
                                            @endswitch
                                        </span>
    
                                        <br>
    
                                        <span class="text-sm">
                                           S/.{{$ventas->total}} 
                                        </span>
                                    </div>
    
                                    <span>
                                        <i class="fas fa-angle-right ml-6"></i>
                                    </span>
    
                                </a>
                                <div class="container flex">
                                    <x-jet-danger-button
                                    wire:click="$emit('deleteColorSize', {{ $ventas }})">
                                    Enviar a sunat
                                </x-jet-danger-button>
                                </div>
                               
                            </li>
                        @endforeach
                    </ul>
                </section>
    
            @else
            <div class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
                <span class="font-bold text-lg">
                    No existe registros de ordenes
                </span>
            </div>
          
            @endif
    
            @if ($venta->hasPages())
            <div class="px-6 py-4  ">
                {{$venta->links()}}
            </div>
        @endif 
        </div>
    
    
 </div>     
</div>

@push('script')
    <script>
        Livewire.on('deleteColorSize', ventas =>{

            Swal.fire({
            title: 'Estas seguro de enviara sunat?',
            text: "No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, enviar!'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('factura',ventas);
                Swal.fire(
                'Factura Enviada!',
                'Su factura a sido enviada.',
                'Hecho'
                )
            }
            })



        })

    </script>
@endpush