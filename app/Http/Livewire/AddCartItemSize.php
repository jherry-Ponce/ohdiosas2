<?php

namespace App\Http\Livewire;

use App\Models\size;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddCartItemSize extends Component

{   
    public $product, $sizes,$qty=1;
    public $size_id="";
    public $color_id="";
    public $quantity = 0;
    public $colors=[];
    public $options = [];

    public function mount(){
        $this->options['image']=$this->product->images->first()->url;
        $this->sizes=$this->product->sizes;
        
    }

    public function updatedSizeId($value){
        $size = size::find($value);
        $this->colors = $size->colors;
        $this->options['size'] = $size->name;
        $this->options['size_id'] = $size->id;
    }
    public function updatedColorId($value){
        $size = Size::find($this->size_id);
        $color = $size->colors->find($value);
        $this->quantity=qty_available($this->product->id, $color->id, $size->id);
        $this->options['color'] = $color->name;
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
        $this->quantity=qty_available($this->product->id, $this->color_id, $this->size_id);
        $this->reset('qty');
        /* emitTo permite especificar que componente lo escuchara */
        $this->emitTo('dropdown-cart','render');
    }

    public function render()
    {
        /* dd($this->product); */
        return view('livewire.add-cart-item-size');
    }

    
}
