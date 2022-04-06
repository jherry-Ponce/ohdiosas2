<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    //
    public function index(){

        $orders = Order::query()->where('user_id', auth()->user()->id);


        if (request('status')) {
            $orders->where('status', request('status'));
            
        }

        $orders = $orders->get();


        $pendiente = Order::where('status', 1)->where('user_id', auth()->user()->id)->count();
        $recibido = Order::where('status', 2)->where('user_id', auth()->user()->id)->count();
        $enviado = Order::where('status', 3)->where('user_id', auth()->user()->id)->count();
        $entregado = Order::where('status', 4)->where('user_id', auth()->user()->id)->count();
        $anulado = Order::where('status', 5)->where('user_id', auth()->user()->id)->count();


        return view('orders.index', compact('orders', 'pendiente', 'recibido', 'enviado', 'entregado', 'anulado'));
    }
    
    public function show(Order $order){
        $this->authorize('author', $order);
        $items = json_decode($order->content);
        return view('orders.show', compact('order','items'));
    }

    public function payment(Order $order){
        
        $items = json_decode($order->content);

        return view('orders.payment', compact('order', 'items'));
    }
    public function pay(Order $order,Request $request){
        
        $this->authorize('author', $order);
        $this->authorize('payment',$order);


        $payment_id= $request->get('payment_id');
      
       
        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id". "?access_token=APP_USR-6948680474029470-011301-69b8e677a1312751aceade34c372c1a0-1055967631");
      
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
