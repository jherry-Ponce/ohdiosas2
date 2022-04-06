<div class=" mt-16">
    <div class="flex  pl-4 py-2 items-center shadow-xl ">
        <h2 class="text-gray-500 font-serif text-xl font-semibold  my-3 ">Usuarios</h2>
        <button wire:click="crearModal()"
        class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 my-3 ml-auto rounded-md mr-6">Crear</button>
       @if ($modal)
            @include('components.modal-user')
        @endif 
    </div>

    <div class=" container  my-4">
            <table class="min-w-full border-collapse block md:table">
                <div class="px-6 py-4 ">
                   {{--  <x-jet-input  type="text" wire:model="search" class="w-full bg-gray-100" placeholder="Ingrese el producto a buscar"/> --}}
                </div>
             
                    <thead class="block md:table-header-group border">
                        <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                            
                            <th class="bg-gray-400 p-2 text-gray-700 font-bold text-center block md:table-cell">Id</th>
                            <th class="bg-gray-400 p-2 text-gray-700 font-bold  text-center block md:table-cell">Usuario</th>
                            <th class="bg-gray-400 p-2 text-gray-700 font-bold  text-center block md:table-cell">Email</th>
                            <th class="bg-gray-400 p-2 text-gray-700 font-bold  text-center block md:table-cell">Rol</th>
                            <th class="bg-gray-400 p-2 text-gray-700 font-bold  text-center block md:table-cell">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="block md:table-row-group border">
                        @foreach ($rol as $rols)     
                                <tr class=" border border-grey-500 md:border-none block md:table-row">
                                   
                                    <td class="p-2 text-left block md:text-center md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Id</span>{{-- {{$rols->id}} --}}</td>
                                    <td class="p-2 text-left block md:text-center md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Usuario</span>{{$rols->name}} </td>
                                    <td class="p-2 text-left block md:text-center md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Email</span>{{$rols->email}} </td>
                                    <td class="p-2 text-left block md:text-center md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold ">Rol</span> <span class="bg-green-400 font-semibold text-white py-1 px-3 rounded-full text-xs"> {{$rols->rol}} </span></td>
                                    <td class="p-2 text-left block md:table-cell">
                                        <span class="inline-block w-1/3 md:hidden font-bold">Opciones</span>
                                            <div class="flex justify-center">
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 text-yellow-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </div>
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 text-blue-500">
                                                    <a href="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                    </a>  
                                                </div>
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 text-red-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </div>
                                            </div>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>  
   
            </table>        
    </div>
</div>