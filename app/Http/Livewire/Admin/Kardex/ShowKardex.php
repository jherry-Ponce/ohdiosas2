<?php

namespace App\Http\Livewire\Admin\Kardex;

use App\Models\Kardex;
use Livewire\Component;
use Livewire\WithPagination;
class ShowKardex extends Component
{
   

 use WithPagination;
    public function render()
    {
        $kardexs= Kardex::paginate(10);
        return view('livewire.admin.kardex.show-kardex', compact('kardexs'))->layout('layouts.admin');
    }
}
