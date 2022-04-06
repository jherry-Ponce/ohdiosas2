<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Pedido;
use App\Models\Product;
use App\Models\Proveedor;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnSelf;
class CreateOrders extends Component
{
    public $cantidad,$producto="",$total,$Proveedor="", $i, $var=[], $precio,$impuesto=18,$n=1;
    public  $proveedor, $product,$cont=0,$extraer;
    

    public function mount(){
        $this->proveedor=Proveedor::all();
        $this->product=Product::all();
    }
    public function agregar(){
        for ($this->i=0; $this->i < $this->n ; $this->i++) { 
            # code...

            $this->var[$this->n]=[$this->Proveedor,$this->producto,$this->cantidad,$this->precio,$this->total=$this->cantidad*$this->precio];
            
            $this->var;
        }
        $this->n=$this->n+1;
        $this->cont= $this->cont+$this->total=$this->cantidad*$this->precio;
        $this->Proveedor=$this->Proveedor;
    }
    public function save(){
        $pedidos=  Pedido::create([
            'cod'=> $this->Proveedor ,
            'impuesto'=>18,
            'total'=>(($this->cont*18)/100)+$this->cont,
            ]); 
            
      foreach ($this->var as $varr) {
                /* extraer el codigo del pedido recien insertado */
                $j=1;
        DB::table('ordenes')->insert(
            [   'id'=>$j,
                'codpedidos' => $pedidos->id,
                'codproducts'=>$varr[1],
                'unidades'=>$varr[2],
                'importe'=> $varr[4],
                
            ]
            );
            $j=$j+1;
      }  
        return redirect()->route('admin.ordershow');
       
    }
    
    public function render()
    {
       /*  dd($this->var); */
       
        return view('livewire.admin.orders.create-orders')->layout('layouts.admin');
    }
}
