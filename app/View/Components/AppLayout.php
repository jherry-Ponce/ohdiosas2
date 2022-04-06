<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public $color;
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
//todos los atributos que se pasan por el componente debrian ser recibidos por el contructor
//como es el caso de $color , en el caso de no ser asi estas se almacenan de manera automatica 
//en $attributes
/*      public function __construct($color='orange')
     {
         $this->color = $color;
     } */
    public function render()
    {
        return view('layouts.app');
    }
/* // la funcion que se crea  es llamada en la vista del constructor, 
//en esta se puede realizar todas las validaciones o cosas que se desea
    public function prueba(){
        if($this->color =="red"){
            return "este es un mensaje de alerta";
        }
    } */
}
