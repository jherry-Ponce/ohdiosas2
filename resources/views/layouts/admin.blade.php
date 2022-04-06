 <!DOCTYPE html>
 <html lang="{{ str_replace('_', '-', app()->getLocale())}}">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>{{config('app.name', 'Laravel')}}</title>
   @notifyCss
   <!-- Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

   <!-- Styles -->
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
      {{-- fontawesome --}}
      <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
      {{-- dropzon --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone.min.css" integrity="sha512-qkeymXyips4Xo5rbFhX+IDuWMDEmSn7Qo7KpPMmZ1BmuIA95IPVYsVZNn8n4NH/N30EY7PUZS3gTeTPoAGo1mA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      @livewireStyles

   <!--Scripts -->
      <script src="{{ mix('js/app.js')}}" defer></script>
      <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
   
    
      <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
     {{-- sweet alert --}}
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      {{-- dropzon --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js" integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
 </head>

 <body class="font-sans antialiased">
  <div class="font-sans leading-normal tracking-normal bg-purple-600 " x-data="{ puert: true }" >

        

        <div   class="flex flex-col md:flex-row  ">
            
            <div :class="{'block':puert,'hidden':!puert}" class=" bottom-0   fixed  lg:relative  z-10 w-full md:w-60 bg-gradient-to-r  md:h-screen bg-purple-600 " >
                
                <div  class="md:mt-12 md:w-60 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                        <a href="{{route('admin.dashboard')}}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white text-center ">
                            <span class="pb-1 md:pb-0 font-semibold text-xs md:text-base text-white md:text-white block md:inline-block">Oh! Diosas</span>
                        </a>
                    <hr>
                    <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2  md:text-left flex-wrap   ">
                        
                        <li class="mr-3 flex-1">
                            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                <span @click="open = !open" class="flex flex-row items-center w-full px-4 mt-2 text-sm font-semibold text-left bg-transparent  dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block    py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white  ">
                                    
                                        <i class="fas fa-chart-area pr-0 md:pr-3 "></i><span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Reportes</span>
                                    
                                  <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </span>

                                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="right-0 w-full mt-2 origin-top-right rounded-md shadow-lg relative">
                                  <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                    <a href="{{route('reporte.diario')}}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Reportes Diarios</a>
                                    <a  href="{{route('reporte.index')}}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Reporte Por Fecha</a>
                                    <a href="{{route('reporte.producto')}}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Productos mas vendido</a>
                                  </div>
                                </div>
                              </div>
                        </li>
                        <li class="mr-3 flex-1">
                            <a href="{{route('venta.index')}}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline ">
                                 <i class="fas fa-shopping-cart pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 font-semibold text-xs md:text-base text-white md:text-white block md:inline-block">Ventas</span>
                            </a>
                        </li>

                        <li class="mr-3 flex-1">
                            <a href="{{route('admin.provedor.show')}}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline ">
                                <i class="fas fa-dolly pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 font-semibold text-xs md:text-base text-white md:text-white block md:inline-block">Provedores</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1">
                            <a href="{{route("admin.ordershow")}}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline ">
                                <i class="fab fa-shopify pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 font-semibold text-xs md:text-base text-white md:text-white block md:inline-block">Compras</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1">
                            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                <span @click="open = !open" class="flex flex-row items-center w-full px-4 text-sm font-semibold text-left bg-transparent  dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block    py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white  ">
                                    
                                        <i class="fas fa-tasks pr-0 md:pr-3 "></i><span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Inventarios</span>
                                    
                                  <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </span>

                                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="relative right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                                  <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('admin.marca')}}">Marcas</a>
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('admin.categories.create')}}">Categorias</a>
                                   
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('producto.index')}}">Productos</a>
                                  </div>
                                </div>
                              </div>
                        </li>


                        <li class="mr-3 flex-1">
                            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                <span @click="open = !open" class="flex flex-row items-center w-full px-4 text-sm font-semibold text-left bg-transparent  dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block    py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white  ">
                                    
                                        <i class="fas fa-landmark pr-0 md:pr-3 "></i><span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Kardex</span>
                                    
                                  <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </span>

                                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="relative right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                                  <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('Kardex.index')}}">Kardex General</a>
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('producto.index')}}">Buscar Kardex</a>
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('producto.index')}}">Kardex por Producto</a>
                                  </div>
                                </div>
                              </div>
                        </li>


                        <li class="mr-3 flex-1">
                            <a href="{{route('admin.orders.index')}}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white">
                                <i class="fas fa-truck pr-0 md:pr-3 "></i><span class="pb-1 md:pb-0 font-semibold text-xs md:text-base text-white md:text-white block md:inline-block">Pedidos</span>
                            </a>
                        </li>

                        <li class="mr-3 flex-1">
                          <a href="{{route('admin.departments.index')}}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline ">
                              <i class="fa fa-road pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 font-semibold text-xs md:text-base text-white md:text-white block md:inline-block">Distribucion</span>
                          </a>
                      </li>

                        <li class="mr-3 flex-1">
                            <div @click.away="open = false" class="" x-data="{ open: false }">
                                <span @click="open = !open" class="flex flex-row items-center w-full px-4 text-sm font-semibold text-left bg-transparent  dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block    py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white  "> 
                                        <i class="f54e fas fa-store pr-0 md:pr-3 "></i><span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">ECommerce</span>
                                    
                                  <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </span>

                                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="relative right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                                  <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Redes Sociales</a>
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('slider.index')}}">Sliders</a>
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('admin.metodo.create')}}">Promociones</a>
                                  </div>
                                </div>
                              </div>
                        </li>

                       
                        <li class="mr-3 flex-1">
                            <a href="{{route('admin.rol')}}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline ">
                                <i class="fa fa-user-lock pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 font-semibold text-xs md:text-base text-white md:text-white block md:inline-block">Roles</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1">
                            <a href="{{route('cliente.index')}}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white ">
                                <i class="fas fa-users pr-0 md:pr-3 "></i><span class="pb-1 md:pb-0 font-semibold text-xs md:text-base text-white md:text-white block md:inline-block">Clientes</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1">
                            <a href="{{route('admin.users')}}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white ">
                                <i class="fas fa-user pr-0 md:pr-3 "></i><span class="pb-1 md:pb-0 text-xs font-semibold md:text-base text-white md:text-white block md:inline-block">Usuarios</span>
                            </a>
                        </li>
                       
                        <li class="mr-3 flex-1">
                            <div @click.away="open = false" class="" x-data="{ open: false }">
                                <span @click="open = !open" class="flex flex-row items-center w-full px-4 text-sm font-semibold text-left bg-transparent  dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block    py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white  "> 
                                        <i class="f54e far fa-building pr-0 md:pr-3 "></i><span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Empresa</span>
                                    
                                  <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </span>

                                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="relative right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                                  <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                    <a href="{{route('admin.empresa.create')}}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Datos Empresa</a>
                                   {{--  <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Link #2</a>
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Link #3</a> --}}
                                  </div>
                                </div>
                              </div>
                        </li>
                        {{-- <li class="mr-3 flex-1">
                            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                <span @click="open = !open" class="flex flex-row items-center w-full px-4 mt-2 text-sm font-semibold text-left bg-transparent  dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block    py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white  ">
                                    
                                        <i class="fas fa-chart-area pr-0 md:pr-3 text-blue-600"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Analytics</span>
                                    
                                  <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </span>

                                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                                  <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Link #1</a>
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Link #2</a>
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Link #3</a>
                                  </div>
                                </div>
                              </div>
                        </li> --}}


                    </ul>
                </div>


            </div>

            <main class="main-content fl flex-1  mt-0 pb-24 md:pb-5 bg-white" >
                <div  class="py-2 mt-0 mb-8 z-10   w-full fixed shadow-md bg-gradient-to-r from-white via-purple-400 to-purple-600">
                    <button @click="puert = !puert" class="text-gray-500 focus:outline-none ">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>
                
                <!-- Page Content -->
                
                   {{ $slot }} 
                
            </main>
        </div>  
    </div> 
  

  
  @stack('modals')
  <script>
    /*Toggle dropdown list*/
    function toggleDD(myDropMenu) {
        document.getElementById(myDropMenu).classList.toggle("invisible");
    }
    /*Filter dropdown options*/
    function filterDD(myDropMenu, myDropMenuSearch) {
        var input, filter, ul, li, a, i;
        input = document.getElementById(myDropMenuSearch);
        filter = input.value.toUpperCase();
        div = document.getElementById(myDropMenu);
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }
    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
            var dropdowns = document.getElementsByClassName("dropdownlist");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (!openDropdown.classList.contains('invisible')) {
                    openDropdown.classList.add('invisible');
                }
            }
        }
    }
</script>
 
@livewireScripts

    @stack('script')

  

 </body>
 </html>