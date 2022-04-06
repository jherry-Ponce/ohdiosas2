
<div class="mt-16 overscroll-none " >
    <div class=" bg-white pl-4 py-2 shadow-lg shadow-white-500/50 " >
         <h2 class="text-xl font-bold text-gray-800 leading-tight mb-4  ">
            <i class="fas fa-landmark"></i>   Kardex General
         </h2>
         <p class="mx-2 text-center mb-4">En el módulo KARDEX puede ver los movimientos y costos de entradas - salidas de productos. Además, puede ver información detallada de los movimientos específicos de un producto por cada mes.</p>
         
         <div class="grid place-items-center items-center  md:gap-0 gap-4  md:grid-cols-3  grid-cols-1 mb-4">
             <div class=" hover:text-blue-500 cursor-pointer">
                <i class="fas fa-landmark"></i>   <a href="{{route('Kardex.index')}}" > Kardex General</a> 
             </div>

             <div class=" hover:text-blue-500 cursor-pointer">
                <i class="fas fa-search fa-fw"></i> buscar Kardex
             </div>
            
             <div class=" hover:text-blue-500 cursor-pointer">
                <i class="fas fa-luggage-cart fa-fw"></i>Kardex por Producto
             </div>
         </div>
    </div>
    
 <div class="container mt-12 md:mt-0 pb-24 md:pb-5 w-11/12   ">      

     <x-table-responsive >

                 @if ($kardexs->count())
                                         
                      <table class=" table-auto decoration-wavy border  border-gray-50  ">
                         <thead>
                             <tr class="bg-gray-800 text-white uppercase text-sm leading-normal ">
                                <th class="py-3 px-2 text-left">#</th>
                                 <th class="py-3 px-6 text-left">Fecha</th>
                                 <th class="py-3 px-6 border-4 border-light-blue-500 border-opacity-25-6 text-left">Producto</th>
                                 <th class="py-3 px-6 text-center">Entrada</th>
                                 <th class="py-3 px-6 text-center  table-cell sm:hidden md:table-celll">P.Costo</th>
                                 <th class="py-3 px-6 text-center">Salida</th>
                                 <th class="py-3 px-6 text-center table-cell sm:hidden md:table-celll ">P.Venta</th>
                                 <th class="py-3 px-4 text-center table-cell sm:hidden md:table-celll ">Inventario I</th>
                                 <th class="py-3 px-6 text-center">Inventario F</th>
                                 <th class="py-3 px-6 text-center">Detalle</th>
                             </tr>
                         </thead>
                         <tbody class="text-gray-600 text-sm font-light">
                             @foreach ($kardexs as $kardex)          

                                <tr class=" hover:bg-gray-100 hover:text-blue-600 ">
                                     <td class="py-3 px-2 text-left  ">
                                         <div class="flex items-center">
                                             <span class="font-medium"> <b>{{$kardex->id}} </b> </span>
                                         </div>
                                     </td>


                                     <td class="py-3 px-6 text-left ">
                                        <div class="flex items-center">
                                           
                                            <span>{{$kardex->updated_at}}</span>
                                        </div>
                                    </td>      

                                  <td class="py-3 px-6 text-left ">
                                        <div class="flex items-center">
                                           
                                            <span>{{$kardex->Documento}}</span>
                                        </div>
                                    </td>  

                                    <td class="py-3 px-6 text-left ">
                                         <div class="flex items-center">
                                            
                                             <span>{{$kardex->Entrada}}</span>
                                         </div>
                                     </td>

                                     <td class="py-3 px-6 text-center table-cell sm:hidden md:table-celll ">
                                         <div class="flex items-center justify-center">
                                         S/.{{$kardex->PrecioC}}
                                         </div>
                                     </td>

                                     <td class="py-3 px-6 text-center ">
                                        <div class="flex items-center justify-center">
                                            {{$kardex->Salida}}
                                            </div>
                                     
                                     </td>


                                     <td class="py-3 px-6 text-center table-cell sm:hidden md:table-celll ">
                                        <div class="flex items-center justify-center">
                                        S/.{{$kardex->PrecioV}}
                                        </div>
                                    </td>

                                    <td class="py-3 px-6 text-center table-cell sm:hidden md:table-celll ">
                                        <div class="flex items-center justify-center">
                                        {{$kardex->InventarioIni}}
                                        </div>
                                    </td>

                                    <td class="py-3 px-6 text-center  ">
                                        <div class="flex items-center justify-center">
                                        {{$kardex->InventarioFinal}}
                                        </div>
                                    </td>

                                     <td class="py-3 px-6 text-center hover:text-purple-600 text-purple-500">
                                        <b>
                                          <i class="fas fa-landmark  "></i>
                                        </b>

                                     </td>
                                </tr>

                         @endforeach
                         </tbody>
                     </table> 

                 @else
                     <div class="py-6 px-4">
                         No se encuentran datos coincidentes
                     </div>
                 @endif

                 @if ($kardexs->hasPages())
                        <div   class="px-6 py-4  ">
                            {{$kardexs->links()}}
                        </div>
             @endif  
                
     </x-table-responsive>  
 </div>     
</div>