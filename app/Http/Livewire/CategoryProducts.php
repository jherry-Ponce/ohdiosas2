<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryProducts extends Component
{
/* se crea la variable category para que esta pueda recibir el dato ennviado        */
    public $category;

    public $products =[];


        /* una vez se ejecute el metodo hara lo de adentro */
    public function loadPosts(){

        /* como se sabe la tabla product tiene 2 estados borrador y publicado es por ello que 
        se usa la sentencia where para condicionar y take para  limitar la cantidad de productos
         obtenidos a mostrar en glider  */
        $this->products = $this->category->products()->where('status',2)->take(15)->get();
        
        /* para que se haga el evento se utiliza la funcion emit() */
    
        $this->emit('glider', $this->category->id);
    }

    public function render()
    {
        return view('livewire.category-products')
        ;

    }

}
