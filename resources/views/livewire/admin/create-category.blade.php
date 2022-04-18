<div class="mt-16  ">
    <div class="flex items-center py-4 text-indigo-600 font-serif font-semibold text-xl text-center shadow-lg">
       
        <div class=" mx-2">
            <h2>Categorias de la Empresa</h2>
        </div>
        <div class="mx-auto hidden md:block">
            <x-jet-input  type="text" wire:model="search" class="w-full bg-gray-100" placeholder="Ingrese la categoria a buscar"/>
        </div>
        <div class="ml-auto">
            <x-jet-button class="mr-2" wire:click="abrirmodal()">
                +
            </x-jet-button>
        </div>
            
        
    </div>
     
    
        <div class="container  my-6">

               
                @if ($categories->count())
                                           
                            {{-- gap-6 brinda espaciado entre columnas anto en el eje x  como y --}}
                            <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                @foreach ($categories as $category)
                                    <li class="bg-white rounded-lg shadow">
                                        <article>
                                            <figure>
                                                <img class="h-48 rounded-t object-center w-full object-cover " src="/storage/{{$category->image}}" alt="">
                                            </figure>
            
                                            <div class="py-4 px-6">
                                                    <h1 class="text-lg font-semibold">
                                                       
                                                        {!!$category->icon!!} {{$category->name}}
                                                        
                                                    </h1>
            
                                                    <div class="flex justify-center">
                                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 text-yellow-500 cursor-pointer" wire:click='marcamodal({{$category->id}})'>
                                                            <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>
                                                        </div>
                                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 text-blue-500 cursor-pointer" wire:click='openmodal({{$category->id}})'>
                                                          
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg>
                                                         
                                                        </div>
                                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 text-red-500 cursor-pointer" wire:click="$emit('deleteCategory',{{$category->id}})">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </div>

                                                        <div class="ml-auto">
                                                            @switch($category->status)
                                                            @case(0)
                                                                <span wire:click="status({{$category->id}})" class="bg-yellow-400  font-semibold text-white py-1 px-3 rounded-full text-xs cursor-pointer">Oculto</span>
                                                                @break
                                                            @case(1)
                                                                <span wire:click="status({{$category->id}})" class=" font-semibold bg-red-400 text-white py-1 px-3 rounded-full text-xs cursor-pointer">Publicado</span>
                                                                @break
                                                            
                                                            @default
                                                                
                                                              @endswitch 
                                                        </div>
                                                    </div>
                                            </div>
                                        </article>
                                    </li>
                                @endforeach
                            </ul>




                @endif    
           {{--  </table> --}}

        </div>
     

     <x-jet-dialog-modal wire:model="modal">

         <x-slot name="title">
            Crear Categoria
         </x-slot>

         <x-slot name="content">
             <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="w-full ">
                    <x-jet-label value="Nombre" />
                    <x-jet-input type="text" class="w-full"  wire:model="name" placeholder="Ingrese nombre de la categoria"/>
                    <x-jet-input-error for="name"/>
                </div>

                 <div class="w-full ">
                    <x-jet-label value="Url automatico" />
                    <x-jet-input class="w-full bg-gray-100" readonly="true" type="text" wire:model="slug" />
                    <x-jet-input-error for="slug"/>
                </div>
            
                <div class="w-full">
                    <x-jet-label value="Icono" />
                    <x-jet-input type="text" class="w-full" wire:model="icon" placeholder="Ingrese el icono"/>
                    <x-jet-input-error for="icon"/>
                </div>

                <div class="w-full  overflow-hidden">
                    <x-jet-label value="Foto" />
                    <x-jet-input type="file" accept="image/*" wire:model="image" />
                    <x-jet-input-error for="image"/>
                </div>
            </div>
             
                
        </x-slot>

        <x-slot name="footer">
            <div class="flex justify-end items-center mt-4">
        
                <x-jet-action-message class="mr-3" on="saved">
                    Actualizado
               </x-jet-action-message>    
       
               <x-jet-button 
                   wire:loading.attr="disabled"
                   wire:target="saved"
                   wire:click="saved"
                  >
                  Guardar
               </x-jet-button>
              
          </div>
        </x-slot>

     </x-jet-dialog-modal>

     <x-jet-dialog-modal wire:model="modalEdit">

        <x-slot name="title">
           Actualizar Categoria
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div class="w-full ">
                        <x-jet-label value="Nombre" />
                        <x-jet-input type="text" class="w-full"  wire:model="name" placeholder="Ingrese nombre de la categoria"/>
                        <x-jet-input-error for="name"/>
                    </div>
     
                     <div class="w-full ">
                        <x-jet-label value="Url automatico" />
                        <x-jet-input class="w-full bg-gray-100" readonly="true" type="text" wire:model="slug" />
                        <x-jet-input-error for="slug"/>
                    </div>
                
                    
                   
                    {{-- <div>
                      

                        <strong>Marcas de la categoria: </strong> 
                        
                        @if ($brands)
                            @foreach ($brands as $anidadas)
                                
                                <x-jet-label>
                                    {{$anidadas->name}}
                                </x-jet-label>
  
                            @endforeach
                       
                        @endif
                       
                        </div> --}}
                  

                    

                    @if ($marca)
                        <div>
                            <strong>Agregar marcas a su categoria</strong>
                            @foreach ($marca as $item)
                                    <x-jet-label>
                                        <x-jet-checkbox  name="dato[]"   wire:model.defer="dato" value="{{$item->id}}"   /> {{$item->name}}
                                     </x-jet-label>
                            @endforeach
                                
                            <x-jet-input-error for="dato" /> 
                        </div>
                    @endif
                  
                </div>
               
                <div>
                    <div class="w-full  overflow-hidden">
                        <x-jet-label value="Foto" />
                        <x-jet-input type="file" wire:model="editImage" accept="image/*" {{-- id="{{$rand}}" --}} />
                        <x-jet-input-error for="image"/>
                    </div>

                   
                    <div>
                        @if ($editImage)
                            <img class="w-full h-64 object-cover object-center" src="{{$editImage->temporaryUrl()}}" alt="">
                        @else
                            <img class="w-full h-64 object-cover object-center" src="/storage/{{$image}}" alt="">
                        @endif
                    </div>
                </div>
              
           </div>
            
               
       </x-slot>

       <x-slot name="footer">
           <div class="flex justify-end items-center mt-4">
       
               <x-jet-action-message class="mr-3" on="updated">
                   Actualizado
              </x-jet-action-message>    
      
              <x-jet-button 
                  wire:loading.attr="disabled"
                  wire:target="update"
                  wire:click='update'
                 >
                 Actualizar
              </x-jet-button>
             
         </div>
       </x-slot>

    </x-jet-dialog-modal>
  
      @if ($modelo==true)  
      
      
        <livewire:admin.cretae-subcategoria :categoria="$categoria" />
        
      @endif  

</div>

@push('script')
<script>
    Livewire.on('deleteCategory', Category =>{
    Swal.fire({
        title: 'Estas seguro de eliminar esta categoria?',
        text: "No podrás revertir esta accion!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminarlo!'
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('delete',Category);
            Swal.fire(
            'Eliminado!',
            'La categoria ha sido eliminado.',
            'Hecho'
            )
        }
        })
    })
</script>
@endpush