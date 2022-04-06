<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use PhpParser\Node\Expr\FuncCall;

class ShowProducts extends Component
{
    use WithPagination;
    public $search, $start_time, $times, $time_end ;

     public Function mount(){
        $this->start_time = $this->microtime_float();
    } 

    /* reseta la busqueda  lo realiza sin importar en que agination se encuentre */
    public function updatingSearch(){
        $this->resetPage();
    }
    public function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
  
  

    public function render()
    {  

     
          $products=Product::where('name','like','%'. $this->search .'%')->orWhere('id','like', $this->search .'%')->paginate(10);
      
      
       
       
       
        
        $this->time_end =$this->microtime_float();
        $time = $this->time_end - $this->start_time;
        $this->times=number_format($time, 4);
        
        return view('livewire.admin.show-products', compact('products'))->layout('layouts.admin');
    
    }
}
