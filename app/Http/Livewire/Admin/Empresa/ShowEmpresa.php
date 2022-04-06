<?php

namespace App\Http\Livewire\Admin\Empresa;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowEmpresa extends Component
{
    public $nombre, $ruc, $razonsocial,$descripcion,$horario,$telefono,$ciudad,$logo,$direccion,$modal = false;
    public $status;
 
    protected $rules=[
        'nombre' => 'required',
        'ruc'=>'required',
        'razonsocial'=>'required',
        'descripcion'=>'required',
        'horario'=>'required',
        'telefono'=>'required',
        'ciudad'=>'required',
        'logo'=>'required',
        'direccion'=>'required',
      

    ];
        
      
    
    
    public function crearModal()
    {
       /*  $this->limpiarCampos(); */
        $this->abrirModal();
        
    }

    public function abrirModal()
    {
        $this->modal = true;
        
        
    }

    public function switch(){
      $this->status=1;
    }
    public function cerrarModal()
    {
        $this->modal = false;
        $this->reset();
    }
    public function save(){
        $this->validate();
        DB::table('empresas')->insert([
            'nombre_comercial'=>$this->nombre,
            'ruc'=>$this->ruc,
            'razonSocial'=>$this->razonsocial,
            'descripcion'=> $this->descripcion,
            'horario'=> $this->horario,
            'telefono'=> $this->telefono,
            'ciudad'=> $this->ciudad,
            'logo'=> $this->logo,
            'direccion'=> $this->direccion,
            'status'=>$this->status,
            
        ]);
          $this->cerrarModal(); 
    }
    public function render()
    {
        $empresa= DB::table('empresas')->first();
        return view('livewire.admin.empresa.show-empresa',compact('empresa'))->layout('layouts.admin');
    }
}
