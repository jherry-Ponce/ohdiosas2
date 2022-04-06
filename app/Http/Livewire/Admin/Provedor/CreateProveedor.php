<?php

namespace App\Http\Livewire\Admin\Provedor;

use App\Models\Proveedor;
use Livewire\Component;

class CreateProveedor extends Component
{
    public $Nombre, $Correo, $Ruc, $direccion, $celular;

    protected $rules=[
        'Nombre'=>'required',
        'Correo'=>'required',
        'Ruc'=>'required',
        'direccion'=>'required',
        'celular'=>'required',
    ];

    public function save(){
        $this->validate();

        Proveedor::create([
            'Nombre'=>$this->Nombre,
            'Correo'=>$this->Correo,
            'Ruc'=>$this->Ruc,
            'direccion'=>$this->direccion,
            'celular'=>$this->celular,
        ]);

        $this->reset();

    }



    public function render()
    { 
        return view('livewire.admin.provedor.create-proveedor')->layout('layouts.admin');
    }
}
