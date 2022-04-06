<?php

namespace App\Http\Livewire\Admin\Users;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RolesComponent extends Component
{

    public $name, $modal = false;

    protected $rules=[
        'name'=>'required',
        ];

    public function save(){
        $this->validate();
        DB::table('roles')->insert(
        [
            'name' => $this->name,
            'guard_name'=>'web'
        ]
        );
        $this->reset();
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
        
        $rol=DB::table('roles')->orderBy('id')->get();
        /* dd($rol); */
        return view('livewire.admin.users.roles-component', compact('rol'))->layout('layouts.admin');
    }
}
