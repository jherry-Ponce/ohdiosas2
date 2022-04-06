<?php

namespace App\Http\Livewire\Admin\Ventas;

use App\Models\DetVentas;
use Livewire\Component;
use App\Models\User;

use Illuminate\Support\Facades\Http;

use App\Models\Product;
use App\Models\Venta;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Showventas extends Component
{
    use WithPagination;

    public $nombre,$TipoDoc="",$doc,$telf,$correo, $response,$pago,$vuelto,$total, $modal = false;
    public $search,$options;
    public $estado=0;
    public $cliente3="",$dato;
    public $qty = 1;
    
    public $rules = [
        'pago' => 'required',
       
    ];


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

    public function mount(){
       

        /* $this->options['image']=$this->product->images->first()->url; */
       /*  dd($this->options); */
    }
    public function addItem($id){
        $product=Product::find($id);
        $this->options['image']=$product->images->first()->url;
        Cart::instance( 'ventas' )->add([
            'id' => $product->id,
             'name' => $product->name, 
             'qty' => $this->qty, 
             'price' => $product->priceV, 
             'weight' => 550,
             'options'=>$this->options
             
            
        ]);
        
        
        /* emitTo permite especificar que componente lo escuchara */
         $this->emitTo('Showventas','render'); 

  
    }

    public function venta(){
        $rules = $this->rules;
         $this->validate($rules);


        $venta = new Venta();

        $venta->status= '0';
        $venta->tipo= '2';
        $venta->codcliente = $this->dato;
        $venta->total = Cart::instance( 'ventas')-> subtotal();
        $venta->save(); 
      


        /* crear documento */
        DB::table('documento')->insert([
            'user_id'=> Auth::user()->id,
            'empresa_id'=>1,
            'venta_id'=>$venta->id,
            'version_UBL'=>'2.1',
            'tipo_factura'=>'0101',
            'tipo_documento'=>'03',  
            'forma_pago'=>'contado',
            'serie'=>'B00'.$venta->id,
            'correlativo'=>1,
            'fecha_emision'=>'2021-01-27T00:00:00-05:00',
            'monto_operaciones_gravadas'=>$venta->total,
            'monto_IGV'=>'18',
            'monto_IGV_gratuitas'=>'18',
            'total_impuestos'=>$venta->total*0.18,
            'valor_venta'=>$venta->total,
            'sub_total'=>$venta->total-$venta->total*0.18,
            'monto_total'=>$venta->total,
        ]);


        $order= new DetVentas();
        $order->total = Cart::instance( 'ventas')-> subtotal();
        $order->content = Cart::instance( 'ventas')-> content();
        $order->venta_id = $venta->id;
        $order->save(); 

        foreach (Cart::instance( 'ventas')-> content() as $item) {
            discount($item);
        }
        $this->reset();
        Cart::instance( 'ventas')-> destroy();
        return redirect()->route('venta.index');
        
    }

    public function render()
    {
 
        /* $products= Product::where('quantity','!=','')->paginate(8); */
        $products=Product::where('name','like','%'. $this->search .'%')->where('quantity','!=','')->paginate(4);
        if ($this->pago>=1) {
        
            $this->vuelto= round($this->pago-Cart::instance( 'ventas')-> subtotal(),2);
        }
        else{
            $this->vuelto ="";
        }
        
            # code...
           
               /*  $client=$this->search(); 
                if ($client) {
                    # code...
                    dd($client);
                } 
                  */
            
       
     
        return view('livewire.admin.ventas.showventas',compact('products'))->layout('layouts.admin');
    }
}
