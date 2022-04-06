<?php

namespace App\Http\Livewire\Admin;

use App\Models\Subcategory;
use Livewire\Component;
use Illuminate\Support\Str;

class CretaeSubcategoria extends Component
{
    public $categoria;
    public $name, $slug, $color, $size;
    
    protected $rules=[
        'name'=>'required',
        'slug'=>'required|unique:subcategories,slug',
        'color'=>'required',
        'size'=>'required',

    ] ;

    public function updatedName($value){
        $this->slug=Str::slug($value);
    }

    public function save(){
      
      $this->validate();
      Subcategory::create([
        'name'=>$this->name,
        'slug'=>$this->slug,
        'color'=>$this->color,
        'size'=>$this->size,
        'category_id'=>$this->categoria

      ]);
      $this->reset();
      $this->emit('saved');
    }
    public function render()
    {
        return view('livewire.admin.cretae-subcategoria');
    }
}
