<?php

namespace App\Http\Livewire\Admin\Ventas;

use App\Models\User;

use Illuminate\Support\Facades\Http;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;



class Venta extends Component
{
    use WithPagination;

    public $nombre,$TipoDoc="",$doc,$telf,$correo, $response,$pago,$vuelto,$total, $modal = false;
    public $search;
    public $estado=0;
    public $cliente3="",$dato;
    public $qty = 1;
    

    public function search(){

        $token= config('services.apisunat.token');
        $urldni =config('services.apisunat.urldni');
        $urlruc =config('services.apisunat.urlruc');
        $client="";
        /* dd($urldni.$this->doc); */
        if (strlen($this->doc) == '8') {
            $doc=$this->doc;
            
            # code...        
            if ($this->TipoDoc == 'DNI') {
            // Iniciar llamada a API
                $response= Http::withHeaders([
                    'Referer' => ' https://apis.net.pe/consulta-dni-api',
                    'Authorization' => 'Bearer ' . $token
                ])->get(
                    $urldni.$doc
                );
            
            } else { if ($this->TipoDoc == 'RUC') {
                    $response= Http::withHeaders([
                        'Referer' => 'http://apis.net.pe/api-ruc',
                        'Authorization' => 'Bearer ' . $token
                    ])->get($urlruc.$doc);
                }
            }
        
        
                    // Datos listos para usar
            /* $persona = ($this->response->json()); */
            $persona=json_decode($response);
            /* dd($persona->nombres); */
            $client=$persona;
        } 
            return $client; 
         
        
    }
    
    public function buscar(){
        $this->cliente3= User::where('Dni',$this->doc)->first();
        $this->dato=$this->cliente3->id;
        if ($this->cliente3) {
            $this->estado=1;
            $this->nombre=$this->cliente3->name;
            $this->correo=$this->cliente3->email;
        }
        else{
            $this->estado='No hay datos';
           
        }       
      
    }

    public function agregar(){
        $this->nombre= $this->nombre;
        $this->modal = false;
    }

    public function crearModal()
    {
       /*  $this->limpiarCampos(); */
        $this->abrirModal();
        
    }

    public function abrirModal()
    {
        $this->modal = true;
        
    }

    public function cerrarModal()
    {
        $this->modal = false;
        $this->reset();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function addItem($id){
        $product=Product::find($id);
        
        Cart::add([
            'id' => $product->id,
             'name' => $product->name, 
             'qty' => $this->qty, 
             'price' => $product->priceV, 
             'weight' => 550,
             
            
        ]);
        
        
        /* emitTo permite especificar que componente lo escuchara */
         $this->emitTo('venta','render'); 

  
    }

    public function venta(){


        /* $venta = new Venta();

        $venta->status= '1';
        $venta->codcliente = $this->dato;
        $venta->save(); */
        $venta=DB::table('ventas')->insert(
            [  
                'status' => '1',
                'codcliente'=>$this->dato,
                
            ]
            );

        foreach ( Cart::content() as $key ) {
            DB::table('detalleventa')->insert(
                [  
                    'precio' => $key->id,
                    'cantidad'=>$key->qty,
                    'venta_id'=>$key->$venta->id,
                    'products_id'=> $key->id,
                    
                ]
                );
        }
        $this->reset();
        


    }

    public function render()
    {
 
        /* $products= Product::where('quantity','!=','')->paginate(8); */
        $products=Product::where('name','like','%'. $this->search .'%')->where('quantity','!=','')->paginate(8);
        if ($this->pago>=199) {
        
            $this->vuelto= round($this->pago-Cart::subtotal(),2);
        }
        else{
            $this->vuelto ="";
        }
        
            # code...
           
               /*  $client=$this->search(); 
                if ($client) {
                    # code...
                    dd($client);
                } */
                 
            
       
     
 
        
        return view('livewire.admin.ventas.venta', compact('products'))->layout('layouts.admin');
    }
}
