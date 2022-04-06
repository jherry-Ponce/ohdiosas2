<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
class AddCartItemColor extends Component
{
    public $product,$colors,$color_id="";

    public $qty=1;
    public $quantity=0;
    public $options=[
        'size_id'=>null,
    ];

    public function mount(){
        $this->colors = $this->product->colors;
        if ($this->product->images->count()){
         $this->options['image']=$this->product->images->first()->url;
        }
    }

     /* esta funcion se aCTUALIZA CADA VEZ QUE CAMBIE EL VALOR DE LA VARIABLE DECLARADA */
     public function updatedColorId($value)
     { 
        $color = $this->product->colors->find($value);
         $this->quantity= qty_available($this->product->id, $color->id);
         $this->options['color']= $color->name;
         $this->options['color_id']= $color->id;
    
 
     }

    public function decrement(){
        if($this->qty>=2){
             $this->qty = $this->qty-1;    
            }
    }

    public function increment(){
        /* $this->qty = $this->qty+1; */
        $this->qty++;     
    }

    public function addItem(){
        Cart::add([
            'id' => $this->product->id,
             'name' => $this->product->name, 
             'qty' => $this->qty, 
             'price' => $this->product->priceV, 
             'weight' => 550,
             'options'=>$this->options
            
        ]);
        $this->quantity= qty_available($this->product->id, $this->color_id);
        $this->reset('qty');
        /* em
        itTo permite especificar que componente lo escuchara */
        $this->emitTo('dropdown-cart','render');
    }

    public function render()
    { 
        return view('livewire.add-cart-item-color');
    }
}
