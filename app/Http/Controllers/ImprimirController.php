<?php

namespace App\Http\Controllers;

use App\Models\DetVentas;
use App\Models\Order;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;
use PDF;

class ImprimirController extends Controller
{
    //
    public function index(DetVentas $DetVentas){
   
       
     /*    $order=DetVentas::find($DetVentas);*/
        $venta=Venta::find($DetVentas->id);
       /*  dd($DetVentas->id); */
        $cliente=User::find($venta->codcliente);
        
         $items = json_decode($DetVentas->content);  
         
         
        $pdf = PDF::loadView('livewire.admin.pdf.orden', ['items'=>$items, 'DetVentas'=>$DetVentas,'venta'=>$venta , 'cliente'=>$cliente] );

        return $pdf->stream();
        
    }

    public function index2(Order $DetVentas){
   
  
        /*    $order=DetVentas::find($DetVentas);*/
           $venta=Venta::where('id',$DetVentas->venta_id)->first();
            
           
           
            $items = json_decode($DetVentas->content);  
            
            
           $pdf = PDF::loadView('livewire.admin.pdf.orden', ['items'=>$items, 'DetVentas'=>$DetVentas,'venta'=>$venta , 'cliente'=>$cliente] );
   
           return $pdf->stream();
           
       }
    public function ticket(DetVentas $DetVentas){
   
       
        /*    $order=DetVentas::find($DetVentas);*/
           $venta=Venta::find($DetVentas->id);
      
           $cliente=User::find($venta->codcliente);
           
            $items = json_decode($DetVentas->content);  
            
            
           $pdf = PDF::loadView('bouchers.tickets', ['items'=>$items, 'DetVentas'=>$DetVentas,'venta'=>$venta , 'cliente'=>$cliente] );
   
           return $pdf->setPaper('b8', 'portrait')->stream();
           
       }
    public function pdf( Request $Imprimir ){
        $venta=Venta::find($Imprimir->id);
   
        $cliente=User::find($venta->codcliente);
        
         $items = json_decode($Imprimir->content);  
         
         
        $pdf = PDF::loadView('livewire.admin.pdf.orden', ['items'=>$items, 'DetVentas'=>$Imprimir,'venta'=>$venta , 'cliente'=>$cliente] );

        return $pdf->download('orden.pdf'); 

     /*    view()->share('datos',$Imprimir);
        $pdf= PDF::loadView('livewire.admin.reportes.reportes-show');
     
        return $pdf->download('reporte.pdf'); */
        
    }
}
