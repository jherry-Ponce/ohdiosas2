<x-app-layout>

    <div class="container py-8">
        <figure class="mb-4" >
            <img  class="w-full h-96  object-cover object-center " src="/Storage/{{$category->image}}" alt="">
           
        </figure>

      @livewire('category-filter', ['category' => $category]) 

    </div>

</x-app-layout>