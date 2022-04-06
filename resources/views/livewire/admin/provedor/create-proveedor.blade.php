<div class="mt-16 container">
    <div>
        <div>
            <h2 class="text-gray-500 font-serif text-xl font-semibold  my-3 ">Registro de Proveedorees</h2>
        </div>
    </div>


    <div class="grid grid-cols-2 gap-6  mb-4">
        <div>
            <x-jet-label value="Nombre"/>
            <x-jet-input type="text" class="w-full"  wire:model="Nombre" placeholder="Ingrese nombre del Proveedor"/>
        </div>

        <div>
            <x-jet-label value="Correo Electronico"/>
            <x-jet-input type="text" class="w-full"  wire:model="Correo" placeholder="Ingrese el correo electronico"/>
        </div>
        
    </div>

    <div class="grid grid-cols-2 gap-6 mb-4">
        <div>
            <x-jet-label value="Numero de Ruc"/>
            <x-jet-input type="text" class="w-full"  wire:model="Ruc" placeholder="Ingrese numero de Ruc"/>
        </div>

        <div>
            <x-jet-label value="Direccion"/>
            <x-jet-input type="text" class="w-full"  wire:model="direccion" placeholder="Ingrese el Pais"/>
        
        </div>
                
    </div>
  
    <div class="mb-4">  
            <x-jet-label value="Numero de Contacto"/>
            <x-jet-input type="text" class="w-full"  wire:model="celular" placeholder="Ingrese numero de contacto"/>                
    </div>

    <x-jet-button 
        wire:loading.attr="disabled"
        wire:target="save"
        wire:click="save"
    >
        Registrar
    </x-jet-button>

</div>
