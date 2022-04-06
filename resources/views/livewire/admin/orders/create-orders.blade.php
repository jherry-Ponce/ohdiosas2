<div class="mt-14">

    <div class="  flex bg-white pl-4 py-2 items-center shadow-xl px-4 mb-4" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight  ">
            Crear Orden
        </h2>
        
      
   </div>

    <div class="container mt-8 border py-8 shadow-lg shadow-indigo-500/50">

        <div class="grid grid-cols-3 gap-6 mb-4">
     
             <div class="w-full col-span-2 ">
                 <x-jet-label value="Proveedor"/>
                 <select class="w-full form-control py-2 px-2" wire:model="Proveedor" >
                     <option value="" selected disabled>Seleccione el proveedor</option>
     
                      @foreach ($proveedor as $proveedors)
     
                     <option value="{{$proveedors->id}}">{{$proveedors->Nombre}}</option>
                         
                     @endforeach 
     
                 </select>
              
             </div>
     
             <div class="w-full">
                 <x-jet-label value="Impuesto(%)"/>
                 <x-jet-input class="w-full bg-gray-200" type="number" readonly="true"  value="{{$impuesto}}" />
              
             </div>
     
        </div>
     
        <div class="mb-4">
             <div class="w-full">
                <x-jet-label value="Codigo de barras"/>
                <x-jet-input class="w-full" type="number" />
             </div>
        </div>
     
     
        <div class="grid grid-cols-6 gap-2">
             <div class="w-full col-span-3">
                <x-jet-label value="Producto"/>
                 <select class="w-full form-control py-2 px-2"  wire:model="producto" >
                     <option value="" selected disabled>Seleccione un producto</option>
     
                     @foreach ($product as $products)
     
                     <option value="{{$products->id}}">{{$products->name}}</option>
                         
                     @endforeach 
     
                 </select>
             </div>
     
     
             <div class="col-span-2 ">
                 <x-jet-label value="Cantidad"/>
                 <x-jet-input class="w-full" wire:model="cantidad" type="number" />
             </div>
     
             <div class="col-span-1">
                <x-jet-label value="Precio de Compra"/>
                <x-jet-input type="number" wire:model="precio" class="w-auto" />
             </div>
     
        </div>
        <div class="mt-4 flex justify-end">
            <x-jet-button 
               {{--  wire:loading.attr="disabled"
                wire:target="save"--}}
                wire:click="agregar" 
                class=""
               >
                   AGREGAR
            </x-jet-button>
        </div>

        <div class="mt-8 ">
            <h3> Detalles de Compra</h3>

            <div class="container flex-1 flex-wrap mt-12 md:mt-0 pb-24 md:pb-5 divide-y divide-dashed">      

                <x-table-responsive >
                                                    
                                 <table class="w-1/4 md:w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">Quitar</th>
                                            <th class="py-3 pxborder-4 border-light-blue-500 border-opacity-25-6 text-left">Producto</th>
                                            <th class="py-3 px-6 text-center">Cantidad</th>
                                            <th class="py-3 px-6 text-center">Precio(S/.)</th>
                                            <th class="py-3 px-6 text-center">SubToral(S/.)</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                       @foreach ($var as $vars)       
                                               
                                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <span class="font-medium">  </span>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <span class="font-medium">{{$vars[1]}}</span>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-left">
                                                    <div class="flex items-center justify-center">
                                                        <span>{{$vars[2]}}</span>
                                                    </div>
                                                </td>
        
                                                <td class="py-3 px-6 text-center">
                                                    <div class="flex items-center justify-center">
                                                   {{$vars[3]}} 
                                                    </div>
                                                </td>
        
                                                <td class="py-3 px-6 text-center">
                                                    <div class="flex items-center justify-center">
                                                        {{$vars[4]}} 
                                                    </div>
                                                </td>   
                                            </tr>
        
                                    @endforeach 
                                    </tbody>
                                </table> 
        
                           
                           
                </x-table-responsive>  

                <div class="flex justify-end">
                   <span class=" font-semibold text-right text-gray-600">TOTAL: </span> <span class="ml-6 font-bold">{{$cont*1}}</span>
                                                                                            
                </div>

                <div class="flex justify-end">
                   <span class=" font-semibold text-right text-gray-600 ">TOTAL IMPUESTO(18%): </span> <span class="ml-6 font-bold">{{($cont*18)/100}}</span> 
                </div>


                <div class="flex justify-end">
                   <span class=" font-semibold text-right text-gray-600 ">TOTAL PAGAR: </span> <span class="ml-6 font-bold">{{(($cont*18)/100)+$cont}}</span>
                </div>
               
                 @if ($var)
                    <div class="pt-4 flex justify-end">
                        <x-jet-button 
                        {{--  wire:loading.attr="disabled"
                            wire:target="save"--}}
                            wire:click="save" 
                            class=""
                        >
                            GUARDAR
                        </x-jet-button>
                    </div>
                 @endif
            </div>  

       

        </div>
     
    </div>

    



</div>