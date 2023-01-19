<?php

namespace App\View\Components;

use Illuminate\View\Component;

class componentejemplo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $mensaje;

    public function __construct($mensaje)
    {
        //
        $this->mensaje=$mensaje;
       
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.componentejemplo');
    }
}
