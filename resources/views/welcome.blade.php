<x-app-layout >

        
   {{--  @foreach ($sliders as $slider) 
 
        @livewire('slider-show')
  
    @endforeach  --}}
          
            <div class="glider-contain">
                <div class="glider">
                    @foreach ($sliders as $slider) 
                    
                        @livewire('slider-show',['slider' => $slider])
                
                    @endforeach 
                </div>
                <button aria-label="Previous" class="glider-prev rounded-full bg-white" style="left: 23px; border-radius: 9999px; background-color: rgb(243 244 246 / var(--tw-bg-opacity)); --tw-text-opacity: 1;
                color: rgb(37 99 235 / var(--tw-text-opacity));">«</button>
                <button aria-label="Next" class="glider-next " style="right: 23px; border-radius: 9999px; background-color: rgb(243 244 246 / var(--tw-bg-opacity)); --tw-text-opacity: 1;
                color: rgb(37 99 235 / var(--tw-text-opacity))">»</button>
                    <div role="tablist" class="dots"></div>
            </div> 
        
   

        <div    class="container py-8">
            @foreach ($categories as $category) 
                
              
                    <div class=" mb-6">
                        
                        @if(sizeof($category->products) ) 
                            <div class="flex items-center mb-2">
                                <h1 class="text-lg uppercase font-semibold text-gray-700">
                                    {{ $category->name }}
                                </h1>

                                <a href="{{route('categories.show',$category)}}" class="text-blue-500 hover:text-blue-400 hover:underline ml-2 font-semibold">Ver más</a>
                            </div>

                            {{-- llama al componente de clase y le envia como dato category este lo recibira en el controlador de la clase --}}
                            @livewire('category-products', ['category' => $category])
                         @endif
                     
                    </div>
               
               

            @endforeach
            {{-- {{dd($category->products )}} --}}
        </div>


        {{-- la direcxtiva push -> todo el escript que tenemos es push se cargar en la vista app.blade en donde esta el stack --}}
        @push('script')
            <script>

                /* el evento que se da en el componente categoryproducts lo escuchara desde aca//
                asi no se ejecutara el codigo con la pagina sino bien se ejecute el evente glider */
                livewire.on('glider', function(id){

                    /* el valor de la clase que toma glider es glider concatenado con el id de la categoria
                    debido a que si no se especifica la propiedad que se desea implementar solo aplicara ala primera categoria
                    en cambio detallando el tipo se aplicara a todos */
                    new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [
                        {
                            breakpoint: 640,
                            settings: {
                                slidesToShow: 2.5,
                                slidesToScroll: 2,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 3.5,
                                slidesToScroll: 3,
                            }
                        },

                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 4.5,
                                slidesToScroll: 4,
                            }
                        },

                        {
                            breakpoint: 1280,
                            settings: {
                                slidesToShow: 5.5,
                                slidesToScroll: 5,
                            }
                        },
                    ]
                });

                });
                



                
        
            </script> 
        @endpush

        @push('sli')
            <script>
                new Glider(document.querySelector('.glider'), {
                    slidesToShow: 1,                   
                    duration:0.5,
                    dragVelocity:3.33,
                    dots: '.dots',
                    draggable: true,
                    
                    arrows: {
                        prev: '.glider-prev',
                        next: '.glider-next'
                    }
                    });
                
            </script>
 
        @endpush
   
</x-app-layout>
