<div class="container py-12 mt-16">
    {{-- Agregar departamento --}}
    <x-jet-form-section submit="save" class="mb-6">

        <x-slot name="title">
            Agregar una nueva Marca
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder agregar una nueva Marca
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input wire:model.defer="name" type="text" class="w-full mt-1" />

                <x-jet-input-error for="name" />
            </div>
        </x-slot>

        <x-slot name="actions">

            <x-jet-action-message class="mr-3" on="saved">
                Marca agregada
            </x-jet-action-message>

            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    {{-- Mostrar Departamentos --}}
    <x-jet-action-section>
        <x-slot name="title">
            Lista de Marcas
        </x-slot>

        <x-slot name="description">
            Aquí encontrará todas las Marcas agregadas
        </x-slot>

        <x-slot name="content">

            <table class="text-gray-600">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="py-2 w-full">Nombre</th>
                        <th class="py-2">Acción</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-300">
                    @foreach ($marca as $marcas) 
                        <tr>
                            <td class="py-2">

                                <a href="" class="uppercase underline hover:text-blue-600">
                                   {{$marcas->name}}
                                </a>
                            </td>
                            <td class="py-2">
                                <div class="flex divide-x divide-gray-300 font-semibold">
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer text-indigo-600 font-bold" wire:click="openmodal({{$marcas}})"><i class="far fa-edit"></i></a>
                                    <a class="pl-2 hover:text-red-600 cursor-pointer text-red-500 font-extrabold" wire:click="$emit('deleteMarca' , {{$marcas->id}})"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>

        </x-slot>
    </x-jet-action-section>

    {{-- Modal editar --}}
    <x-jet-dialog-modal wire:model="modal">

        <x-slot name="title">
            Editar Marca
        </x-slot>

        <x-slot name="content">

            <div class="space-y-3">
               
                <div>
                    <x-jet-label>
                        Nombre
                    </x-jet-label>

                    <x-jet-input wire:model="search" type="text" class="w-full mt-1" />
                    
                    <x-jet-input-error for="search" />
                </div>

             
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="update()" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

    @push('script')
        <script>
            Livewire.on('deleteMarca', marcasId => {
            
                Swal.fire({
                    title: 'Seguro de Eliminar la marca?',
                    text: "No podra revertir esto! Se eliminaran los productos asociadas a esta marca",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emit('delete', marcasId)

                        Swal.fire(
                            'Eliminado!',
                            'La marca fue eliminada.',
                            'Hecho'
                        )
                    }
                })

            });
        </script>
    @endpush 
</div>
