<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <a href="" class="px-4 py-2 text-sm flex items-center text-trueGray-500 hover:bg-blue-500 hover:text-white ">

           
        <span class="flex justify-center w-9">
            <i class="fas fa-shopping-cart"></i>
        </span>
        <span class="relative inline-block pr-4">
            Carrito de compras
            @if (Cart::count())
                <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{ Cart::count() }}</span>
                @else
                <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span></span>    
                @endif
            
        </span>
    </a>
</div>
