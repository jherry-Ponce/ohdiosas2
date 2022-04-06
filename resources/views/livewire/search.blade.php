{{-- se le da flex-1 ya que el componete esta siendo llamado dentro de una clase flex --}}
<div class="flex-1 relative">
    <x-jet-input type="text" class="w-full" placeholder="¿Que estas buscando?" />
{{-- absolute nos ayuda para que el icono se pisione al costado y no debajo del imput --}}
{{-- justify-center se encarga de centrar los costados y  items-center centar en el eje y --}}
   <button class="absolute top-0 right-0  w-12 h-full bg-blue-500 flex items-center justify-center rounded-r-md"> 
       <x-search size="35" />
</button>
</div>
