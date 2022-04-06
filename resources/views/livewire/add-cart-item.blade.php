{{--x-data inicializamos alphine para su uso --}}
<div x-data>
  <p class="text-gray-700 mb-4 font-semibold">
    Stock disponible: <span>{{$quantity}} </span>
  </p>
  <div class="flex">
      <div>
        {{-- •	x-bind: Asigna el valor de un atributo  --}}
        {{-- de esta manera se logra acceder al valor dela variable qty $wire.qty --}}
        <x-jet-secondary-button 
        disabled
        x-bind:disabled="$wire.qty <=1"
        {{--  wire:loading.attr="disabled" con esto cambia la propiedad mientras se ejecuta el metodo decrement --}}
        wire:loading.attr="disabled"
        {{-- especifica que el se desabilite solo cuando usa el metodo decremenmt --}}
        wire:target="decrement"
        wire:click="decrement"> 
          
            -
        </x-jet-secondary-button>

        <span class="mx-2 text-gray-700">{{$qty}}</span>

        <x-jet-secondary-button 
        x-bind:disabled="$wire.qty >= $wire.quantity"
        wire:loading.attr="disabled"
        wire:target="increment"
        wire:click="increment"> 
            +
        </x-jet-secondary-button>
      </div>
        
      <div class=" flex-1 ml-4  ">
        <x-button-dinamic color='blue' class="w-full" wire:click="addItem"
        x-bind:disabled="$wire.qty > $wire.quantity"
        wire:loading.attr="disabled"
        wire:target="addItem"> 
             Agregar al carrito de compras
        </x-button-dinamic>
      </div>
  </div>
</div>
