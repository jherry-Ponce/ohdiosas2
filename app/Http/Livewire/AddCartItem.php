<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItem extends Component
{
    public $qty = 1;
    public $product,$quantity;
    public $options = [
        'color_id'=>null,
        'size_id'=>null,
    ];

    

    public function mount(){
        $this->quantity = qty_available($this->product->id);

        $this->options['image']=$this->product->images->first()->url;
       /*  dd($this->options); */
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
        $this->quantity=qty_available($this->product->id);
        $this->reset('qty');
        /* emitTo permite especificar que componente lo escuchara */
        $this->emitTo('dropdown-cart','render');
    }
    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
