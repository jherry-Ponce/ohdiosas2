<?php

namespace App\Http\Livewire\Admin\Provedor;

use App\Models\Proveedor;
use Livewire\Component;

class ShowProveedor extends Component
{
    public $search;
    public function render()
    {
        $proveedor=Proveedor::where('Nombre','like','%'. $this->search .'%')->paginate(10);
        return view('livewire.admin.provedor.show-proveedor', compact('proveedor'))->layout('layouts.admin');
    }
}
