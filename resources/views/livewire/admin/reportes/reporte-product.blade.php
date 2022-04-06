<div>
    <div class="mt-16" >
        <div class="  flex bg-white px-4 py-2 items-center shadow-xl" >
             <h2 class="font-semibold text-xl text-gray-800 leading-tight  ">
                 Reportes de tienda por rango de fechas
             </h2>
        </div>
        
     <div class="container flex-1 flex-wrap mt-12 md:mt-0 pb-24 md:pb-5 ">      
 
      
         <x-table-responsive >
 
                     
                     @if ($products) 
                                       
                          <table class="w-1/4 md:w-full table-auto">
                             <thead>
                                 <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                     <th class="py-3 px-6 text-left">Producto</th>
                                     <th class="py-3 pxborder-4 border-light-blue-500 border-opacity-25-6 text-left">Cantidad</th>
                                     <th class="py-3 px-6 text-center">Categoria</th>
                                    
                                     <th class="py-3 px-6 text-center">Opciones</th>
                                 </tr>
                             </thead>
                             <tbody class="text-gray-600 text-sm font-light">
                               @foreach ($products as $dato)    
                              
                                     <tr class=" hover:bg-gray-100">
                                         <td class="py-3 px-6 text-left whitespace-nowrap">
                                             <div class="flex items-center">
                                                <span class="font-medium">  {{($dato->name)}}   </span>
                                             </div>
                                         </td>
                                         <td class="py-3 px-6 text-left">
                                             <div class="flex items-center">
                                                 <span>  {{$dato->quantity}} </span>
                                             </div>
                                         </td>
 
                                         <td class="py-3 px-6 text-center">
                                             <div class="flex items-center justify-center">
                                             {{$dato->subcategory->category->name}}  
                                             </div>
                                         </td>
 
                                         {{-- <td class="py-3 px-6 text-center">
                                              @switch( $dato->tipo )
                                                 @case(1)
                                                     <span class="bg-green-400 font-semibold text-white py-1 px-3 rounded-full text-xs">Online</span>
                                                     @break
                                                 @case(2)
                                                     <span class="bg-red-400 font-semibold text-white py-1 px-3 rounded-full text-xs">Tienda</span>
                                                     @break
                                                 @default
                                                     
                                             @endswitch 
                                         
                                         </td> --}}
 
                                         <td class="py-3 px-6 text-center">
                                             <div class="flex item-center justify-center">
                                                 
                                                 <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                     <a href="{{-- {{route('admin.products.edit',$product)}} --}}">
                                                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                         </svg>
                                                     </a>  
                                                 </div>
                                                 
                                             </div>
                                         </td>
                                     </tr>
 
                              @endforeach  -
                             </tbody>
                         </table> 
 
                      @else
                         <div class="py-6 px-4">
                             No se encuentran datos coincidentes
                         </div>
                     @endif  -
 
                   {{--   @if ($products->hasPages())
                         <div class="px-6 py-4  ">
                         {{$products->links()}} 
                         </div>
                     @endif  --}}
                    
         </x-table-responsive>  


        
                <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                    <h5 class="font-bold uppercase text-gray-600">Productos mas vendidos</h5>
                </div>
                <div class="p-5" wire:ignore>
                    <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
                    <script>
                         var datas = <?php echo json_encode($datos); ?>;
                        var fechas = <?php echo json_encode($ver); ?>;
                        new Chart(document.getElementById("chartjs-1"), {
                            "type": "horizontalBar",
                            "data": {
                                "labels": datas,
                                "datasets": [{
                                    "label": "cantidad",
                                    "data":fechas,
                                    "fill": false,
                                    "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                    "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                    "borderWidth": 1
                                }]
                            },
                            "options": {
                                "scales": {
                                    "yAxes": [{
                                        "ticks": {
                                            "beginAtZero": true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </div>
            

     </div>     
 </div>
</div>
