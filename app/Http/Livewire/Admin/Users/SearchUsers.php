<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

use Illuminate\Support\Facades\Http;
class SearchUsers extends Component
{

    public $nombre,$TipoDoc="",$doc,$telf,$correo, $response, $modal = false;

    public function search(){
        $token= config('services.apisunat.token');
        $urldni =config('services.apisunat.urldni');
        $urlruc =config('services.apisunat.urlruc');
        
        /* dd($urldni.$this->doc); */
        if ($this->TipoDoc == 'DNI') {
           // Iniciar llamada a API
             $this->response= Http::withHeaders([
                'Referer' => ' https://apis.net.pe/consulta-dni-api',
                'Authorization' => 'Bearer ' . $token
            ])->get($urldni.$this->doc);
           
        } else { if ($this->TipoDoc == 'RUC') {
                $this->response= Http::withHeaders([
                    'Referer' => 'http://apis.net.pe/api-ruc',
                    'Authorization' => 'Bearer ' . $token
                ])->get($urlruc.$this->doc);
            }
        }
        
       
                // Datos listos para usar
        $persona = ($this->response->json());
        dd($persona);
            
    }
    
    public function buscar(){
        $cliente= User::where('Dni',$this->doc)->first();
        $this->nombre=$cliente->name;
        $this->correo=$cliente->email;
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


    public function render()
    {
        $rol=User::all();
        return view('livewire.admin.users.search-users',compact('rol'))->layout('layouts.admin');
    }
}
