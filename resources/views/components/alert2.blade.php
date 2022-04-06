
{{-- este componente al no tener una clase se utiliza props el cual recibe un array con todos los atributos
   que se envian desde el componente 
   'color'=>'red' en el caso de que no pase el color al coponente este tomara por predeterminado el color rojo--}}
@props(['color'=>'yellow'])
<div role="alert" {{$attributes}}>
    <div class="bg-{{$color}}-500 text-white font-bold rounded-t px-4 py-2">
      {{$title}}
    </div>
    <div class="border border-t-0 border-{{$color}}-400 rounded-b bg-{{$color}}-100 px-4 py-3 text-{{$color}}-700">
      <p>{{$slot}}</p>
    </div>
  </div>
  