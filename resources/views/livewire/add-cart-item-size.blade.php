<div x-data>
    <div>
        <p>Tallas</p>
        <select wire:model="size_id" class="form-control w-full">
            <option value="" selected disabled>Seleccione una talla</option>
            @foreach ($sizes as $size)
                <option value="{{$size->id}}">{{$size->name}}</option>
                
            @endforeach 
        </select>
    </div>

    <div>
            <p >Color</p>

     <select wire:model="color_id"  class="form-control w-full">
        <option value="" selected disabled>Seleccionar un color</option>
        @foreach ($colors as $color)
                <option value="{{$color->id}}">{{__($color->name)}}</option>
            
        @endforeach
     </select>
    </div>
    <p class="text-gray-700 mb-4 font-semibold">
        Stock disponible: <span>
            @if ($quantity)
                {{$quantity}}
            @else
            {{$product->stock}}
            @endif
            
    
        </span>
      </p>
    <div class="flex mt-4">
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

