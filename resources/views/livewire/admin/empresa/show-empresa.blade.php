
<div class="mt-16  ">
    <div>
        <div class="flex  pl-4 py-2 items-center shadow-xl">
            <h2 class="text-gray-500 font-serif text-xl font-semibold  my-3 ">Datos Empresa</h2>
            <button wire:click="crearModal()"
        class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 my-3 ml-auto rounded-md mr-6">Crear</button>
        </div>
        
        <div class="container mt-12 bg-gray-50 py-4">
            <div class="grid grid-cols-2 ">

                @if ($empresa)
                    
                
                    <div>    
                   
                        <div class="grid grid-cols-2 gap-6  mb-4">
                            <div>
                                <x-jet-label value="Nombre comercial"/>
                                <x-jet-input type="text" class="w-full" readonly="false" placeholder="{{$empresa->nombre_comercial}}"/>
                            </div>
                    
                            <div>
                                <x-jet-label value="Razon Social"/>
                                <x-jet-input type="text" class="w-full" readonly="true" placeholder="{{$empresa->razonSocial}}"/>
                            </div>
                            
                        </div>
                    
                        <div class="grid grid-cols-2 gap-6 mb-4">
                            <div>
                                <x-jet-label value="Numero de Ruc"/>
                                <x-jet-input type="text" class="w-full" readonly="true"  placeholder="{{$empresa->ruc}}"/>
                            </div>
                    
                            <div>
                                <x-jet-label value="Numero de Contacto"/>
                                <x-jet-input type="number" class="w-full"  readonly="true" placeholder="{{$empresa->telefono}}" />
                            
                            </div>
                                    
                        </div>
                    
                        
                        <div class="grid grid-cols-2 gap-6 mb-4">
                            <div>
                                <x-jet-label value="Direccion"/>
                                <x-jet-input type="text" class="w-full" readonly="true"  placeholder="{{$empresa->direccion}}"/>
                            </div>
                    
                            <div>
                                <x-jet-label value="Ciudad"/>
                                <x-jet-input type="text" class="w-full" readonly="true"  placeholder="{{$empresa->ciudad}}"/>
                            
                            </div>
                                    
                        </div>
                    
                    
                    
                        <div class="grid grid-cols-2 gap-6 mb-4">
                            <div>
                                <x-jet-label value="Horario"/>
                                <x-jet-input type="text" class="w-full" readonly="true"  placeholder="{{$empresa->horario}}"/>
                            </div>
                    
                            <div>
                                <x-jet-label value="Descripcion"/>
                                
                                <textarea name="text" class="w-full" readonly="true"  placeholder="{{$empresa->descripcion}} " ></textarea>
                            
                            </div>
       
                        </div>
                    </div>

                    <div>
                        <img class="container w-96 object-cover object-center mr-4" 
                                     src="/storage/{{$empresa->logo}}" alt=""> 
                    </div>
                   
                   
                    
                
                @endif


            </div>
        </div>






    </div>


    <x-jet-dialog-modal wire:model="modal">

        <x-slot name="title">
            Registara Empresa
        </x-slot>

        <x-slot name="content">

            <div class="space-y-3">
            
              
                    <div class="grid grid-cols-2 gap-6  mb-4">
                        <div>
                            <x-jet-label value="Nombre"/>
                            <x-jet-input type="text" class="w-full"  wire:model="nombre" placeholder="Ingrese nombre de la empresa"/>
                            <x-jet-input-error for="nombre"/>
                        </div>
                
                        <div>
                            <x-jet-label value="Razon Social"/>
                            <x-jet-input type="text" class="w-full"  wire:model="razonsocial" placeholder="Ingrese la razon social"/>
                            <x-jet-input-error for="razonsocial"/>
                        </div>
                        
                  
                        <div>
                            <x-jet-label value="Numero de Ruc"/>
                            <x-jet-input type="text" class="w-full"  wire:model="ruc" placeholder="Ingrese numero de Ruc"/>
                            <x-jet-input-error for="ruc"/>
                        </div>
                
                        <div>
                            <x-jet-label value="Numero de Contacto"/>
                            <x-jet-input type="number" class="w-full"  wire:model="telefono" placeholder="Ingrese numero de contacto"/>
                        
                            <x-jet-input-error for="telefono"/>
                        </div>
                                
          
                        <div>
                            <x-jet-label value="Direccion"/>
                            <x-jet-input type="text" class="w-full"  wire:model="direccion" placeholder="Ingrese la direccion"/>
                            <x-jet-input-error for="direccion"/>
                        </div>
                
                        <div>
                            <x-jet-label value="Ciudad"/>
                            <x-jet-input type="text" class="w-full"  wire:model="ciudad" placeholder="Ciudad"/>
                        
                            <x-jet-input-error for="ciudad"/>
                        </div>
                                
               
                        <div>
                            <x-jet-label value="Horario"/>
                            <x-jet-input type="text" class="w-full"  wire:model="horario" placeholder="Ingrese horario"/>
                            <x-jet-input-error for="horario"/>
                        </div>
                
                        <div>
                            <x-jet-label value="Descripcion"/>
                            <x-jet-input type="text" class="w-full"  wire:model="descripcion" placeholder="Ingrese descripcion"/>
                        
                            <x-jet-input-error for="descripcion"/>
                        </div>
                
                        <div>
                            <x-jet-label value="logo"/>
                            <x-jet-input type="text" class="w-full"  wire:model="logo" placeholder="direccion logo"/>
                        
                            <x-jet-input-error for="logo"/>
                        </div>

                        <div>
                            <label class="switchBtn">
                                <x-jet-input type="checkbox"  wire:click="switch()" />
                                <div class="slide round">Publicar</div>
                            </label>
                        </div>        
                    </div>
                

            
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button  wire:click="save" wire:loading.attr="disabled" wire:target="save">
                Registrar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

    

   

</div>



   