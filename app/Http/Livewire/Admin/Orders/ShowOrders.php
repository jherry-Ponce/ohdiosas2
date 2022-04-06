<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Pedido;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use PDF;

class ShowOrders extends Component
{


    public $orden,$abb;
    public function mount(){
        $this->abb=DB::table('ordenes')->get();
    }
    public function status($id){

        $this->orden= Pedido::where('id',$id)
        ->first();
       
        /* if ( $this->orden->status == 0) {
            $this->orden->status='2';
            $this->orden->save();
            dd('$this->orden->status');
        }
       else  {
             dd('$this->orden->status');
           /*  $this->orden->status='1';
            $this->orden->save(); */
       
        
        switch ($this->orden->status) {
            case '0':
                $this->orden->status='2';
                 $this->orden->save();
                break;
            case '1':
                
                $this->orden->status='0';
                $this->orden->save();
                break;
            case '2':
                
                $this->orden->status='1';
                 $this->orden->save();
                break;
                
            default:
                
                break;
        }
 
    }
    public function pdf(){
       
        $pdf = PDF::loadView('livewire.admin.pdf.orden',$this->abb);
        return $pdf->download('livewire.admin.pdf.orden'); 
        return $pdf->stream();
        
    }

    public function render()
    {
        
        $ordenes=Pedido::all();
        return view('livewire.admin.orders.show-orders',compact('ordenes'))->layout('layouts.admin');
    }
}
