<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
class ShowCategories extends Component
{
    use WithPagination;
    public $search;
    /* reseta la busqueda  lo realiza sin importar en que agination se encuentre */
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {   $categories=Category::where('name','like','%'. $this->search .'%')->paginate(10);
        return view('livewire.admin.show-categories',compact('categories'))->layout('layouts.admin');
    }
}
