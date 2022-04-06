<?php

namespace App\Http\Livewire\Admin;

use App\Models\ColorProduct;
use App\Models\ColorSize;
use App\Models\Order;
use App\Models\Product;
use App\Models\Venta;
use Jenssegers\Date\Date;
use Livewire\Component;

class PanelAdmin extends Component
{
    public $Product, $monto,$pedido; 
    public function __construct()
    {
      $this->Product= Product::all()->count()  +   ColorProduct::count() +   ColorSize::count();
       
      $this->datos=Venta::Select('total')->get();
            foreach ($this->datos as $key ) {
                $this->monto =  $this->monto + $key->total;
            }
     
        $tiempo=  Date::now()->locale('es')->timezone('America/lima')->format('Y-m-d');
        /* dd($inicial); */
        $this->pedido=Order::whereDate('created_at',$tiempo)->get()->count();
        
    }
    public function render()
    {
        return view('livewire.admin.panel-admin')->layout('layouts.admin');
    }
}
