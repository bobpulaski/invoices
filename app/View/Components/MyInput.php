<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MyInput extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $name;
    public $id;
    public $placeholder;

    public function __construct($name, $id, $placeholder)
    {
        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.include.my-input');
    }
}
