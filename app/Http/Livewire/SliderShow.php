<?php

namespace App\Http\Livewire;

use App\Models\Slider;
use Livewire\Component;

class SliderShow extends Component
{   
   
   /*   public $slider;  */
    public $slider; 
 
    
    public function render() 
    {    
 
     
        return view('livewire.slider-show'/* , compact('slider') */);
    }
}
