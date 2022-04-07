{{-- la clase bg es background // sticky y top-0 es para que se quede pegado en partede arriba //z-50 para que este por encima de todo
Para darle funcionalidad al boton de categorias se usara javascript una de sus librerias
 que viene con jetstram que es alphine -> x-data este componente asigna o declara el espacio de trabajo que se usara indicamos que las funcionalidades
  van a funcionar a nivel del header -esto hace que el header sea considerado como un componente 
  {open: false} es una variiable declarada el false lo cual evita mostrar el header a menos que cambie a true 
  otra manera usa java scrip y creando una funcion --}}
<header class="bg-trueGray-800 sticky top-0  z-50 " x-data="dropdown()">

  
    <div>
          {{-- la clase container-> centra // flex->permite contenido uno asl costado de otro //h->es el alto de la cabecera//
         justify-between -> brinda un spaciado de extremo a extremo//
         md:justify-start->a un  tamaño mediano lo regresa a la normalida--}}
        <div class="container flex items-center h-16 justify-between md:justify-start">

            {{-- flex flex-col ->le hace flexible a nivel de columna evitando que se pocisione al costado //items-center->centra //
                bg_white->color blanco a nivel de backgroud para la opacidad // opacidad-25->se le agrega bg para que solo sea a nivel de background  
                cursor-pointer-> al pasar el cursor por la opcion cambie de forma a una mano --}}
            {{-- x-on:click="open= !open" al darl click en el botoon categorias este cambiara la condicion de false y despelegara la vista --}}
            <a x-on:click="show()"
            {{-- :class es una clase dinamica al darle click la letra se pone azul  --}}
            :class="{'text-blue-500 bg-opacity-100':open}"
            {{-- order las -> esta clase se puede utilizar ya que el div padre tiene display flex// order-last cambia la posision de la categoria --}}
                class="flex flex-col items-center justify-center order-last sm:order-none px-6 md:px-4 bg-white bg-opacity-25 text-white cursor-pointer font-semibold h-full">

                {{-- esto nos muestra el icono de las tres barras --}}
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>

                <span class="text-sm hidden md:block">Categorias</span>
            </a>


            {{-- logo de la pagina --}}
            @if ($empresa)
            <a href="/" class=" ml-6 ">
                <img src="/storage/{{$empresa->logo}}" title="Oh Diosas" alt="logo"
                    class=" w-24  object-cover mt-4  cursor-pointer">
            </a>
            @endif
            
            {{-- hiddem oculta el buscador // md:block genera que el buscador se muestre en pantallas grandes 
                // el flex-1 espande el buscador ya que el div lo restringe de espandirse --}}
            <div class="flex-1 hidden md:block mx-6">
                {{-- componente de livewire para optener el imput del buscador --}}
            {{--  @livewire('search') --}}
                <livewire:search />
            </div>



            {{-- ese fragmento de codico es un componente de jetstream se hace el llamado y muestra el usuario que esta en sesion y 
            opciones del perfil --}}
            <!-- Settings Dropdown -->
            <div class="mx-6 relative hidden md:block">
                @auth
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">

                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                    alt="{{ Auth::user()->name }}" />
                            </button>

                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="{{ route('orders.index') }}">
                                {{ __('Mis ordenes') }}
                            </x-jet-dropdown-link>

                            @role('admin')
                                <x-jet-dropdown-link href="{{ route('admin.dashboard') }}">
                                    {{ __('Administrador') }}
                                </x-jet-dropdown-link>
                            @endrole

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>


                @else
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <i class="fas fa-user-circle text-white text-3xl cursor-pointer items-center "></i>
                        </x-slot>

                        <x-slot name="content">
                            <x-jet-dropdown-link href="{{ route('login') }}">
                                {{ __('Login') }}
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('register') }}">
                                {{ __('Register') }}
                            </x-jet-dropdown-link>
                        </x-slot>

                    </x-jet-dropdown>
                @endauth
            </div>


            {{-- el div ejecutara la clase hidden a excepcion de que la pantalla sea media a mas  carro de compras--}}
            <div class=" hidden md:block">
                @livewire('dropdown-cart') 
            {{-- <livewire:dropdown-cart /> --}}
            </div>
            


        </div>



        {{-- genera la vista desplegada de categorias --}}
        <nav id="navigation-menu" 
            {{-- x-show Muestra, o no, un elemento dependiendo de un resultado booleano. recibe del header y del x-on el resultado --}} {{-- clases dinamicas con alphine  // el hidden muestra y oculta le nav --}}
            {{-- esta clase dinamica recibe el paramnetro de open y de acuerdo a ese valor muestra u oculta el contenido --}}
            :class="{'block':open,'hidden':!open}"
            class="bg-trueGray-400 bg-opacity-50 w-full absolute hidden    ">


            {{-- este div  centra la parte de la pantalla a mostrar con la clase container // y el h-fulll el largo //
                aqui se da la vista del menu--}}
            <div class="container h-full hidden md:block">
                <div {{-- x-on:click.away="open=false" el .away inidca cualquier parte fuera del div que sigue --}}
                x-on:click.away="close()" 
                class=" grid  h-full grid-cols-4 relative">

                    {{-- UL OCUPA 1 COLUMNA --}}
                    <ul class="bg-white ">
                        @foreach ($categories as $category)
                            {{-- hover:bg-blue-500 al pasar el mouse este se subraya en azul  // 
                            hover:text-white al asar el  mouse las letras se ponen en blanco --}}
                            <li class="navigation-link text-trueGray-500 hover:bg-blue-500 hover:text-white">
                                {{-- items-center -> lo centra en el eje y // justify-center -> lo centra en el eje x --}}
                                <a href="{{route('categories.show',$category)}}" class="px-4 py-2 text-sm flex items-center ">

                                    {{-- icon se le pone exclamacion para extraer el codigo ht,ml ya que esto se guardo en bd
                                        flex justify-center van juntos para poder centarlo los iconos --}}
                                    <span class="flex justify-center w-9">
                                        {!! $category->icon !!}
                                    </span>
                                    {{ $category->name }}
                                </a>

                                {{-- w-3/4 ESTE DIV OCUPA LAS 3/4 PARTES DEL DIV PADRE EL CUAL SE DIVIDO EN 4//
                                    h-full PARA QUE OCUPE TODO EL LARGO DE LA PANTALLA 
                                    top-0 ESTE PEGADO ARRIBA
                                    right-0 PEGADO A LA DERECHA
                                    ABSOLUTE LA POSICION QUE SE TOMARA LA CUAL EL DIV PADRE DEBE TENER UN RELATIVE --}}
                                <div class="navigation-submenu bg-trueGray-100 absolute w-3/4 h-full top-0 right-0 hidden">
                                    {{-- SE UTILIZA COMPONENTES PARA REDUCIR CODIGO --}}
                                    
                                    <x-navigation-subcategories :category="$category" />
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    {{-- DIV ESTE OCUPA 3 COLUMNAS
                        col-span-3 -> --}}
                    <div class="col-span-3 bg-trueGray-100">
                        <x-navigation-subcategories :category="$categories->first()" />
                    </div>

                </div>
            </div>


            {{-- menu mobil --}}
            <div class="bg-white h-full overflow-y-auto block md:hidden">
                <div class="container bg-blue-300 py-2 mb-2">
                    @livewire('search')
                </div>

                <ul>
                    @foreach ($categories as $category)
                    <li class=" text-trueGray-500 hover:bg-blue-500 hover:text-white">
                        {{-- items-center -> lo centra en el eje y // justify-center -> lo centra en el eje x --}}
                        <a href="{{route('categories.show',$category)}}" class="px-4 py-2 text-sm flex items-center ">

                            {{-- icon se le pone exclamacion para extraer el codigo ht,ml ya que esto se guardo en bd
                                flex justify-center van juntos para poder centarlo los iconos --}}
                            <span class="flex justify-center w-9">
                                {!! $category->icon !!}
                            </span>
                            {{ $category->name }}
                        </a>
                        </li>
                    @endforeach
                </ul>

                <p class="text-trueGray-500 px-6 my-2">Usuarios</p>

                @livewire('cart-mobil')
                {{-- auth valida si esta logueado se mostrara lo que contiene --}}
                @auth
                <a href="{{ route('profile.show') }}" class="px-4 py-2 text-sm flex items-center text-trueGray-500 hover:bg-blue-500 hover:text-white ">

            
                    <span class="flex justify-center w-9">
                        <i class="fas fa-user"></i>
                    </span>
                    Perfil
                </a>

                @role('admin')
                <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 text-sm flex items-center text-trueGray-500 hover:bg-blue-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-user"></i>
                    </span>
                    Administrador
                </a>
                 @endrole


                {{-- onclick metodo de java scrip//
                event.preventDefault() -> para que se mantega en la misma pagina sin redireccion//
                document.getElementById('logout-form')"   -> selecciona un elemento el cual recibe como parametro --}}
                <a href="" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit()"
                class="px-4 py-2 text-sm flex items-center text-trueGray-500 hover:bg-blue-500 hover:text-white ">

            
                    <span class="flex justify-center w-9">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    Cerrar Sesion
                </a>

                <form  id="logout-form" action="{{route('logout')}}" method="POST" class="hidden">
                    @csrf
                </form>
            
            
                {{-- cuandop no inicie sesion --}}  
                @else
                    
                <a href="{{ route('login') }}" class="px-4 py-2 text-sm flex items-center text-trueGray-500 hover:bg-blue-500 hover:text-white ">

            
                    <span class="flex justify-center w-9">
                        <i class="fas fa-user-circle"></i>
                    </span>
                    Iniciar Sesion
                </a>

                <a href="{{ route('register') }}" class="px-4 py-2 text-sm flex items-center text-trueGray-500 hover:bg-blue-500 hover:text-white ">

            
                    <span class="flex justify-center w-9">
                        <i class="fas fa-fingerprint"></i>
                    </span>
                    Registrate
                </a>

                @endauth
                
            </div>

        </nav>
    </div>
  
</header>

