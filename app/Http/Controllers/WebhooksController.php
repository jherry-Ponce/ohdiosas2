<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WebhooksController extends Controller
{
    //
    public function __invoke(Order $order,Request $request){
        
        $this->authorize('author', $order);
        $this->authorize('payment',$order);

        dd($request);
        $payment_id= $request->get('payment_id');
      
       
        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id". "?access_token=APP_USR-3883720095399050-040215-9f43f506890402c624ffe9f39436659d-680933559");
      
        $response=json_decode($response);                                                           
        
        $status=$response->status;
       
        if ($status =='approved') {

            $venta = new Venta();

            $venta->status= '1';
            $venta->tipo= '1';
            $venta->codcliente =auth()->user()->id;
            $venta->total = $order->total;
            $venta->save(); 

            $order ->venta_id=$venta->id;
            $order ->status=2;
            $order->save();

            
        }

        return redirect()->route('orders.show',$order);
    }
}
