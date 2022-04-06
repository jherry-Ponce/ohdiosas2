<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Empresa;

class Navigation extends Component
{
    public $empresa;
    public function render()
    {

        $this->empresa=Empresa::where('status',1)->first();
        
        $categories = Category::where('status',1)->get();
        return view('livewire.navigation',compact('categories'));
    }
}
