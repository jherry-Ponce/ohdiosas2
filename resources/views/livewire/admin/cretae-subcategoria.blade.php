
<x-jet-dialog-modal>

   <x-slot name="title">
      Agregar Modelo a la Categoria
   </x-slot>

   <x-slot name="content">
       <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
           
               <div class="w-full ">
                   <x-jet-label value="Nombre" />
                   <x-jet-input type="text" class="w-full"  wire:model="name" placeholder="Ingrese nombre del modelo"/>
                   <x-jet-input-error for="name"/>
               </div>

                <div class="w-full ">
                   <x-jet-label value="Url automatico" />
                   <x-jet-input class="w-full bg-gray-100" readonly="true" type="text" wire:model="slug" />
                   <x-jet-input-error for="slug"/>
               </div>

               <div class="sm:col-span-4">
                <div class="flex">
                    <p>¿Este modelo necesita especifiquemos color?</p>

                    <div class="ml-auto">
                        <label>
                            <input type="radio" value="1" name="color" wire:model.defer="color">
                            Si
                        </label>
                        
                        <label class="ml-2">
                            <input type="radio" value="0" name="color" wire:model.defer="color">
                            No
                        </label>
                    </div>
                </div>

                <x-jet-input-error for="color" />
            </div>

            <div class=" sm:col-span-4">
                <div class="flex">
                    <p>¿Este modelo necesita especifiquemos talla?</p>

                    <div class="ml-auto">
                        <label>
                            <input type="radio" value="1" name="size" wire:model.defer="size">
                            Si
                        </label>
                        
                        <label class="ml-2">
                            <input type="radio" value="0" name="size" wire:model.defer="size">
                            No
                        </label>
                    </div>
                </div>

                <x-jet-input-error for="size" />
            </div>

      </div>
    
          
  </x-slot>

  <x-slot name="footer">
      <div class="flex justify-end items-center mt-4">
  
          <x-jet-action-message class="mr-3" on="saved">
              Guardado
         </x-jet-action-message>    
 
         <x-jet-button 
             wire:loading.attr="disabled"
             wire:target="saved"
             wire:click="save"
            >
            Guardar
         </x-jet-button>
        
    </div>
  </x-slot>

</x-jet-dialog-modal>