<div class="max-w-4xl mx-auto mt-16 px-4 sm:px-6 lg:px-8 py-12 text-gray-700 bg-white shadow-lg">
    <h2 class="text-3xl text-center font-semibold mb-8">Completa esta informacion para crear un producto</h2>

    <div class="grid grid-cols-2  gap-6 mb-4">
        <div>
            <x-jet-label value="Categorias"/>
            <select class="w-full form-control py-2 px-2" wire:model="category_id">
                <option value="" selected disabled>Seleccione una categoria</option>

                @foreach ($categories as $category)

                <option value="{{$category->id}}">{{$category->name}}</option>
                    
                @endforeach

            </select>
            <x-jet-input-error for="category_id"/>
        </div>

        <div>
            <x-jet-label value="SubCategorias"/>
            <select class="w-full form-control py-2 px-2" wire:model="subcategory_id">
                <option value="" selected disabled>Seleccione una subcategoria</option>

                @foreach ($subcategories as $subcategory)

                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                    
                @endforeach

            </select>
            <x-jet-input-error for="subcategory_id"/>
        </div>
    </div>

    {{-- Nombre Porducto --}}
    <div class="mb-4">
        <x-jet-label value="Nombre"/>
        <x-jet-input type="text" class="w-full" wire:model="name" placeholder="Ingrese nombre del producto"/>
        <x-jet-input-error for="name"/>
    </div>

    {{-- slug producto --}}
    <div class="mb-4">
        <x-jet-label value="Slug"/>
        <x-jet-input type="text" class="w-full bg-gray-100" disabled wire:model="slug" placeholder="Ingrese slug del producto"/>
        <x-jet-input-error for="slug"/>
    </div>

    {{-- descripcion --}}
    
    <div class="mb-4" >
        <div  wire:ignore>
            <x-jet-label value="Descripcion"/>
            <textarea class="w-full form-control" rows="6"
            wire:model="description"
            x-data x-init="ClassicEditor
            .create($refs.miEditor)
            .then(function(editor){
                editor.model.document.on('change:data',()=>{
                @this.set('description',editor.getData())
            })
            })
            .catch( error => {
                console.error( error );
            } );"
            x-ref="miEditor">

            </textarea>
        </div>
        <x-jet-input-error for="description"/>

    </div>

    <div class="grid grid-cols-3 mb-4 gap-6">


        <div class="w-full">
            <x-jet-label value="Costo Dolares/Soles" />
             <x-jet-input type="number" wire:model="priceC" step=".01"/>{{-- step define el ingreso de decimales --}}
             <x-jet-input-error for="priceC"/>
        </div>

        <div class="w-full">
            <x-jet-label value="Tasa Cambio" />
             <x-jet-input type="number" wire:model="tasa" step=".01"/>{{-- step define el ingreso de decimales --}}
             <x-jet-input-error for="tasa"/>
        </div>

        <div class="w-full">
            <x-jet-label value="Costo" />
             <x-jet-input type="number" class="bg-gray-50" readonly="true" wire:model="priceF" step=".01"/>{{-- step define el ingreso de decimales --}}
             <x-jet-input-error for="priceF"/>
        </div>



        <div class="w-full">
            <x-jet-label value="Precio Venta" />
             <x-jet-input type="number" wire:model="priceV" step=".01"/>{{-- step define el ingreso de decimales --}}
             <x-jet-input-error for="priceV"/>
        </div>

      

        
            @if ($subcategory_id)      
                @if (!$this->subcategory->color && !$this->subcategory->size)
                <div class="w-full">
                    <x-jet-label value="Cantidad" />
                    <x-jet-input type="number" wire:model="quantity"/>
                    <x-jet-input-error for="quantity"/>
                </div>
                <div class="w-full">
                    <x-jet-label value="Cantidad minimo" />
                    <x-jet-input type="number" wire:model="min"/>
                    <x-jet-input-error for="min"/>
                </div>
                @endif
         @endif
       
        
    </div>

   <div class="flex">
    <x-danger-enlace 
    wire:loading.attr="disabled"
    wire:target="save"
    wire:click="save"
    class="ml-auto cursor-pointer">
        Crear Producto
    </x-danger-enlace>
   </div>
    
    </div>
