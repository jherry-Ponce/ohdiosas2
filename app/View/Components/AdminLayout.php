<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class AdminLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
  /*   public $Product; */
    public function __construct()
    {
       /*  $this->Product= Product::all(); */
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        
        return view('layouts.admin');
    }
}
