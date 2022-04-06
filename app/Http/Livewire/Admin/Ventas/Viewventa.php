<?php

namespace App\Http\Livewire\Admin\Ventas;

use App\Models\DetVentas;
use App\Models\Order;
use App\Models\User;
use App\Models\Venta;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;

use Luecano\NumeroALetras\NumeroALetras;
class Viewventa extends Component
{
    use WithPagination;
    public $ventas,$detVentas,$mensaje;
    protected $listeners = ['factura'];
 
    public function factura(Venta $ventas)
    {
        
        /* OTENEMOS TOKEN USUARIO */
         $response = Http::post('https://facturacion.apisperu.com/api/v1/auth/login', [
            'username' => 'jherry',
            'password' => '75959881',
        ]); 
        $tOKEN=json_decode($response->getBody()->getContents(), true);;
        $token_usuario = $tOKEN['token'];
      
        // OBTENER EMPRESAS
        $autorization_empresas = 'Bearer ' . $token_usuario;
        $client = new Client();
        $response = $client->request('GET', 'https://facturacion.apisperu.com/api/v1/companies',[
            'headers' => [
                'Authorization' => $autorization_empresas,
            ]
        ]);
        $data = json_decode($response->getBody()->getContents(), true);
        
        $token_empresa = null;
        foreach ($data as $item) {
            if (10000000008 == $item['ruc']) {
                $token_empresa = $item['token']['code'];
                break;
            }
        }
       
        
         // OBTENER DATOS DEL DOCUMENTO
         $ventas = $ventas;
      
         $cliente=User::find($ventas->codcliente);
         /* corregir */
        
        $detVentas=DetVentas::where('venta_id',$ventas->id)->first();


         

        /* $documento = Documento::find(1); */
        $direccion_empresa = 'Trujillo';
        /* $empresa->direcciones->where('is_principal')->first(); */
        $direccion_cliente = 'Direccion cliente';
       /*  $documento->user->direcciones->where('is_principal')->first(); */
      /*   $orden =$detVentas->id; */
         /* $documento->pago->orden; */
        $items = json_decode($detVentas->content);
        /* creamos el array */
        $details = array();
        // dd($formatter->toInvoice($documento->monto_total, 2, 'soles'));

        // OBTENER PRODUCTOS
         $formatter = new NumeroALetras();
        foreach ($items as $item) {
            $temp = array(
                'codProducto' => $item->id,
                'unidad' => 'NIU',
                'descripcion' => $item->name,
                'cantidad' => $item->qty,
                'mtoValorUnitario' => $item->price,
                'mtoValorVenta' => $item->subtotal,
                'mtoBaseIgv' => ($item->subtotal),
                'porcentajeIgv' => '18',
                'igv' => $item->subtotal *0.18,
                'tipAfeIgv' => '10',
                'totalImpuestos' => $item->subtotal *0.18,
                'mtoPrecioUnitario' => $item->price +$item->price*0.18
            );

            array_push($details, $temp);
        }
        
        // GENERAR DATA
        $data_envio = array(
            'ublVersion' => '2.1',
            'tipoOperacion' => '0101',
          /*   $documento->tipo_factura, */
            'tipoDoc' => '03',
            'serie' => 'B00'.$ventas->id,
            'correlativo' => '1',
            /* (string) $documento->correlativo, */
            'fechaEmision' =>'2021-01-27T00:00:00-05:00', /* Carbon::now(), */
            /* convertir_fecha_a_formato($documento->fecha_emision, 'Y-m-d\TH:i:sP'), */
            'formaPago' => array(
                'moneda' => 'PEN',
                'tipo' =>'Contado'
               /*   $documento->forma_pago */
            ),
            'tipoMoneda' => 'PEN',
            'client' => array(
                'tipoDoc' => '1',
              /*   $documento->user->tipo_documento, */
                'numDoc' => '20000002',
              /*   $documento->user->documento, */
                'rznSocial' => 'Cliente',/* $documento->user->full_name() */
                'address' => array(
                    'direccion' => 'Direccion',
                    'provincia' => 'Direccion',
                    'departamento' => 'Direccion',
                    'distrito' => 'Direccion',
                    'ubigueo' => 'Direccion',
                )
            ),
            'company' => array(
                'ruc' => '10000000008',
               /*  $empresa->ruc, */
                'razonSocial' =>"Ropa", /* $empresa->razon_social, */
                'nombreComercial' => 'OhDiosas',
              /*   $empresa->nombre_comercial, */
                'address' => array(
                    'direccion' =>'trujillo',
                   /*   $direccion_empresa->direccion, */
                    'provincia' => 'trujillo',
                   /*  $direccion_empresa->distrito->provincia->nombre, */
                    'departamento' => 'trujillo',
                    /* $direccion_empresa->distrito->provincia->departamento->nombre, */
                    'distrito' => 'trujillo',
                  /*   $direccion_empresa->distrito->nombre, */
                    'ubigueo' =>'trujillo',
                     /* $direccion_empresa->distrito_id */
                ),
            ),
            'mtoOperGravadas' =>$detVentas->total,
            /*  $documento->monto_operaciones_gravadas, */
            'mtoIGV' => $detVentas->total *0.18,
            /* $documento->monto_IGV, */
            'valorVenta' =>$detVentas->total,
             /* $documento->valor_venta, */
            'totalImpuestos' =>$detVentas->total *0.18,
            'subTotal' => $detVentas->total + $detVentas->total*0.18,
            'mtoImpVenta' => $detVentas->total + $detVentas->total*0.18,
            'details' => $details,
            'legends' => array(
                array(
                    'code' => '1000',
                    'value' => 'SON '.$formatter->toInvoice(($detVentas->total + $detVentas->total *0.18), 4, 'soles'),
                   
                )
            )
        );
       
        $autorization = 'Bearer ' . $token_empresa;
        $client = new Client();
        $response = $client->request('POST', 'https://facturacion.apisperu.com/api/v1/invoice/send',[
            'headers' => [
                'Authorization' => $autorization,
                'Content-Type' => 'application/json',
                'Accept' => "application/json"
            ],
            'body' => json_encode($data_envio)
        ]);
        $data = json_decode($response->getBody()->getContents(), true);
        $succes=$data['sunatResponse'];
        
        $respuesta=json_encode($data['xml']);
        /* $this->mensaje=$succes['cdrResponse']; */
       
       /*  dd($ventas->id); */
        // ACTUALIZAR DOCUMENTO
 
         /* DB::table('documento')
        ->where('venta_id', '=',$ventas->id)
        ->update([
        
            ['is_envio_sunat' => $succes],
           
            ]);   */

         DB::table('documento')
              ->where('venta_id', $ventas->id)
              ->update([
                  'is_envio_sunat' => true,
                  'respuesta_sunat' =>  $respuesta,
                ]);

        $ventas->update([
            'status'=>1,
        ]);



     
    }

       
 



    public function render()
    { 
        $venta=Venta::where('tipo',2)->paginate(5);
       
       
        return view('livewire.admin.ventas.viewventa', compact('venta'))->layout('layouts.admin');
    }
}
