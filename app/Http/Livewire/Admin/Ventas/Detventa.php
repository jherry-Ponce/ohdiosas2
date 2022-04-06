<?php

namespace App\Http\Livewire\Admin\Ventas;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Venta;
use App\Models\DetVentas;
use App\Models\Order;
use App\Models\Product;

class Detventa extends Component
{
    public $ventas;
    public $cliente;
    public $detVentas;


    public function mount(Venta $ventas)
    {
        $this->ventas = $ventas;
       
        $this->cliente=User::find($this->ventas->codcliente);
        /* corregir */
        if ($this->ventas->tipo == 2) {
            $this->detVentas=DetVentas::where('venta_id',$this->ventas->id)->first();
        } else {
            $this->detVentas=Order::where('venta_id',$this->ventas->id)->first();
        }
        
       
        
    }

 
    public function render(  )
    {
     
   
         $items = json_decode($this->detVentas->content); 
         
      
        
        return view('livewire.admin.ventas.detventa' ,compact('items') )->layout('layouts.admin');
    }
}
