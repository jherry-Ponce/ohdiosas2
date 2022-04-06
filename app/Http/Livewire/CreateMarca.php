<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;

class CreateMarca extends Component
{
    public $name,$brand,$search, $modal=false;
    protected $listeners =['delete'];
    protected $rules=[
        'name'=>'required'
    ];

    public function save(){

        $this->validate();

        Brand::create([
            'name'=>$this->name
        ]);

        $this->reset();
        $this->emit('saved');
    }

    public function update(){
        $rules=[];
        $rules['search']='required';
        $this->validate($rules);
        $this->brand->update(['name'=>$this->search]);
        $this->modal=false;
        $this->emit('updated');
    }

    public function openmodal(Brand $marcas){
        $this->modal=true;

        $this->brand= $marcas;

        $this->search=$this->brand->name;

    }

    public function delete(Brand $marcas){
        $marcas->delete();
    }

    public function render()
    {
        $marca=Brand::all();
        return view('livewire.create-marca', compact('marca'))->layout('layouts.admin');
    }
}
