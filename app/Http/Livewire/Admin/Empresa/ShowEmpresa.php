<?php

namespace App\Http\Livewire\Admin\Empresa;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
class ShowEmpresa extends Component
{
    public $nombre, $ruc, $razonsocial,$descripcion,$horario,$telefono,$ciudad,$logo,$direccion,$modal = false;
    public $status;
    use WithFileUploads;

    protected $rules=[
        'nombre' => 'required',
        'ruc'=>'required',
        'razonsocial'=>'required',
        'descripcion'=>'required',
        'horario'=>'required',
        'telefono'=>'required',
        'ciudad'=>'required',
        'logo'=>'required|image|max:2048',
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
        $logo= $this->logo->store('categories');
        DB::table('empresas')->insert([
            'nombre_comercial'=>$this->nombre,
            'ruc'=>$this->ruc,
            'razonSocial'=>$this->razonsocial,
            'descripcion'=> $this->descripcion,
            'horario'=> $this->horario,
            'telefono'=> $this->telefono,
            'ciudad'=> $this->ciudad,
            'logo'=> $logo,
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
