<?php

namespace App\Http\Livewire\Admin\Reportes;

use App\Http\Livewire\Admin\Ventas\Detventa;
use App\Models\DetVentas;
use App\Models\Order;
use App\Models\Product;
use App\Models\Venta;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReporteProduct extends Component
{
    public $datos=[],$ver=[];
  
    public function render()
    {
      $products=Product::where('quantity','<=','5')->get();
        foreach ($products as $key ) {
           $this->datos[]=$key->name;
            $this->ver[]=$key->quantity;
        }
  /*    dd($this->datos); */
        return view('livewire.admin.reportes.reporte-product', compact('products'))->layout('layouts.admin');
    }
}
