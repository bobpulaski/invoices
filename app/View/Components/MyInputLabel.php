<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MyInputLabel extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $for;

    public function __construct($for)
    {
        $this->for = $for;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.include.my-input-label');
    }
}
