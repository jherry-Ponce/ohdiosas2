<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
class UserComponent extends Component
{
    public $modal=false;
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
        $rol=DB::table('users')->join('model_has_roles as m', 'm.model_id','=','users.id')
        ->join('roles as r','r.id','=','m.role_id')
        ->select('users.name as name','users.email as email','r.name as rol')->get();
        /* dd($rol); */
        return view('livewire.admin.users.user-component', compact('rol'))->layout('layouts.admin');
    }
}
