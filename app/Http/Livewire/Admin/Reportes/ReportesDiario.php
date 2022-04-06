<?php

namespace App\Http\Livewire\Admin\Reportes;

use App\Models\Venta;

use Jenssegers\Date\Date;
use Livewire\Component;

class ReportesDiario extends Component
{
    public $datos,$monto,$inicial;

    public function render()
    {
        $this->reset('datos','monto'); 
        $this->inicial=  Date::now()->locale('es')->timezone('America/lima')->format('Y-m-d');
        /* dd($inicial); */
        $this->datos=Venta::whereDate('created_at',$this->inicial)->get();
        /* $this->datos=Venta::whereDate('created_at',$inicial)->get(); */
        foreach ($this->datos as $key ) {
            $this->monto =  $this->monto + $key->total;
        }
        

        return view('livewire.admin.reportes.reportes-diario')->layout('layouts.admin');
    }
}
