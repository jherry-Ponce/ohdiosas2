{{-- <div class="mt-14">

    

  </div> --}}

  <div class="  fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center items-center min-h-screen pt-4 px-4 pb-20 text-center  sm:p-0">
    
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="inline-block sm:align-middle sm:h-screen  "></span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden  transform transition-all sm:my-8 sm:align-middle  " role="dialog" aria-modal="true" aria-labelledby="modal-headline">    
              
                <div class="  flex bg-white pl-4 py-2 items-center shadow-lg px-4 mb-4" >
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight  ">
                        Cliente
                    </h2>
                    
                  
               </div>
              
                <div class="container w-full mt-8 border py-8 shadow-lg shadow-indigo-500/50 ">
              
                    <div class="grid  md:grid-cols-2 grid-cols-1 gap-6 mb-4">
                 
                         <div class="w-full  col-span-1  ">
                             <x-jet-label value="TipoDoc"/>
                             <select class="w-full form-control py-2 px-2" wire:model="TipoDoc" >
                                 <option value="" selected disabled>Tipo de Documento</option>
                                 <option value="DNI" selected >DNI</option>
                                 <option value="RUC" selected >RUC</option>
                                 <option value="cedula" selected >CEDULA</option>
                             {{--      @foreach ($ as $)
                 
                                 <option value="{{}}">{{}}</option>
                                       
                                 @endforeach  --}}
                 
                             </select>
                          
                         </div>
                 
                         <div class="w-full">
                             <x-jet-label value="NroDoc"/>
                             <div class="flex items-center gap-2">
                                <x-jet-input wire:model="doc" class="w-auto" type="number" /> <span wire:click="search()"  class="text-white p-3 cursor-pointer bg-indigo-500 hover:bg-blue-500 rounded-full "><i class=" fas fa-user-plus "></i> </span> 
                             </div>
                            
                          
                         </div>

                    </div>
                        @if ($estado==1)
                            
                    
                            <div class="grid md:grid-cols-4 sm:grid-cols-1 gap-2">

                                <div class="w-full col-span-1">
                                    <x-jet-label value="Nombre Completo"/>
                                    <x-jet-input wire:model="nombre" class="w-full" type="text" />
                                </div>
                        
                        
                                <div class="col-span-1 ">
                                    <x-jet-label value="Telefono"/>
                                    <x-jet-input wire:model="telf" class="w-full" type="number" />
                                </div>
                        
                                <div class="w-full md:col-span-2 sm:grid-cols-1">
                                    <x-jet-label value="Correo Electronico"/>
                                    <x-jet-input type="email"  wire:model="correo" class="w-full" />
                                </div>
                        
                            </div>

                         @else
                            @if ($estado != '0')
                                 {{ $estado}}
                            @endif
                                
                        @endif
                    
                   
                    <div class="bg-gray-50 px-4 py-3 sm:px-6   sm:flex sm:flex-row-reverse">

                        @if ($estado==1)
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto mt-4 md:mt-0 ">
                                <x-jet-button 
                                    {{--  wire:loading.attr="disabled"
                                        wire:target="save"--}}
                                        wire:click="agregar" 
                                        class="inline-flex justify-center w-full"
                                    >
                                        Agregar
                            </x-jet-button>
                         @else
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto mt-4 md:mt-0 ">
                                <x-jet-button 
                                    {{--  wire:loading.attr="disabled"
                                        wire:target="save"--}}
                                        wire:click="buscar" 
                                        class="inline-flex justify-center w-full"
                                    >
                                        Buscar
                            </x-jet-button>
                
                            </span>

                         @endif
                        
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto mt-4 md:mt-0">
                            <x-jet-button 
                                {{--  wire:loading.attr="disabled"
                                wire:target="save"--}}
                                wire:click="cerrarModal" 
                                class="inline-flex justify-center w-full"
                            >
                                Cancelar
                           </x-jet-button>                            
                           
                        </span>
                    </div>
            
                 
                </div>   
                 
            </div>


    </div>
</div>
