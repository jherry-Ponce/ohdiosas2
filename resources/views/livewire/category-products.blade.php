{{--  load post .> con wire:init lo que se busca que aqui se ejecute el metodo creado por el componente una vez que halla cargado la vista--}}
<div wire:init="loadPosts" >
  

    {{--si la variable product es diferente del vacio se compila ek if  --}}
    @if (count($products))
        


    {{--   se utiliza guilder js --}}
    <div class="glider-contain">
        <ul class="glider-{{$category->id}}">

         
          @foreach ($products as $product)
          
          {{-- {{ $loop->last ? '' : 'mr-4'}} //cada vez que se hace una bucle se cre automaticamente la variable lopp//
          con loop podemos saber en que iteracion se encuentra usando el metodo las ->buscamos la ultima//
          con la interrocaion es como si se tratase de un if el cual pregunta si es verdad y luego va lo que se hace//
          los : es como un else y luego la accion a realizar --}}

              <li class="bg-white rounded-lg shadow {{ $loop->last ? '' : 'sm:mr-4'}}">
                <article>
                  <figure>
                    {{--  object-cover-> evita que la imagen se desforme// object-center->centra la imagen--}}
                    @if ($product->images->count())
                    <img class="rounded-t h-48 w-full object-cover object-center" src="/storage/{{$product->images->first()->url}}" alt=""> 
                    @endif
                   
                  </figure>

                  <div class="py-4 px-6">
                    <h1 class="text-lg font-semibold"> 
                      <a href="{{route('products.show',$product)}}">
                        {{Str::limit($product->name, 20)}}
                      </a>  
                    </h1>

                    <p class="font-bold text-trueGray-700">S/ {{$product->priceV}}</p>
                  </div>
                </article>
              </li>
          @endforeach
        </ul>
      
        <button aria-label="Previous" class="glider-prev">«</button>
        <button aria-label="Next" class="glider-next">»</button>
        <div role="tablist" class="dots"></div>
    </div>


    @else

    {{-- este fragmento genera el spiner --}}
      <div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl border border-gray-100 rounded-lg">
        <div class=" rounded-md animate-spin ease duration-300 w-10 h-10 border-2 border-indigo-500"></div>
      </div>		
  
    @endif

 </div>
