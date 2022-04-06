<?php

namespace App\Http\Livewire\Admin\Reportes;

use App\Models\Venta;

use Livewire\Component;
use PDF;
class ReportesShow extends Component
{

    public $inicial, $final,$datos, $start_time, $times, $time_end ;
    public $monto=0,$ventas=[],$dias,$monto1=0,$monto2=0;
   
    public $rules=[
        'inicial' => 'required',
        'final' => 'required',
       
    ];

    public function filtro(){

        $this->validate($this->rules);
            
            $this->reset('datos','monto'); 
            $this->datos=Venta::whereDate('created_at','>=',$this->inicial)->whereDate('created_at','<=',$this->final)->get();
            foreach ($this->datos as $key ) {
                $this->monto =  $this->monto + $key->total;
                if($key->tipo==1){
                  
                    $this->monto1 = $this->monto1 + $key->total;
                  /*   dd($this->ventas); */
                }else{
                    $this->monto2=$this->monto2 + $key->total;
                }
              
                $this->ventas[0]= $this->monto1;
                $this->ventas[1]=$this->monto2;

                 
                /* $this->dias[]=($key->created_at); */
            }
             
           /* $this->reset('inicial','final');  */
           
           /* dd( $this->ventas);  */
            
 
    }


   
  
    public function render()
    {


        return view('livewire.admin.reportes.reportes-show')->layout('layouts.admin');
    }
}
