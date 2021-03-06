<?php

namespace App\Http\Livewire\Admin\Colores;

use App\Models\Color;
use Livewire\Component;

use App\Models\ColorSize as Pivot;

class ColorSize extends Component
{

    public $size, $colors, $color_id, $quantity, $open = false;

    public $pivot, $pivot_color_id, $pivot_quantity;


    protected $listeners = ['deletecolors'];

    protected $rules = [
        'color_id' => 'required',
        'quantity' => 'required|numeric'
    ];

    public function mount(){
        
        $this->colors = Color::all();
        
            
    }

    public function save(){
        $this->validate();


        $pivot = Pivot::where('color_id', $this->color_id)
                    ->where('size_id', $this->size->id)
                    ->first();

        if ($pivot) {

            $pivot->quantity = $pivot->quantity + $this->quantity;
            $pivot->save();
            
        }else{

            $this->size->colors()->attach([
                $this->color_id => [
                    'quantity' => $this->quantity
                ]
            ]);
        }

        $this->reset(['color_id', 'quantity']);

        $this->emit('saved');

        $this->size = $this->size->fresh();
    }

    public function edit(Pivot $pivot){

        $this->open = true;

        $this->pivot = $pivot;
        $this->pivot_color_id = $pivot->color_id;
        $this->pivot_quantity = $pivot->quantity;
    }

    public function update(){

        $this->validate([
            'pivot_color_id' => 'required',
            'pivot_quantity' => 'required',
        ]);

        $this->pivot->color_id = $this->pivot_color_id;
        $this->pivot->quantity = $this->pivot_quantity;

        $this->pivot->save();

        $this->size = $this->size->fresh();

        $this->reset('open');
    }

    public function deletecolors(Pivot $pivot){
      
        $pivot->delete();
        $this->size = $this->size->fresh();
    }

    public function render()
    {/*  dd($this->size->colors); */
      
 
            $size_colors = $this->size->colors;
        
        
     
       
        return view('livewire.admin.colores.color-size', compact('size_colors'))->layout('layouts.admin');
    }
}
