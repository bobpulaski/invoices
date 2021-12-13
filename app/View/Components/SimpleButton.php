<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SimpleButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $type;
    public $bg;
    public $hover;

    public function __construct($type, $bg, $hover)
    {
        $this->type = $type;
        $this->bg = $bg;
        $this->hover = $hover;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.simple-button');
    }
}
