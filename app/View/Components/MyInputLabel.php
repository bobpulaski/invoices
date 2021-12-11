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
    public $req = false;

    public function __construct($for, $req)
    {
        $this->for = $for;
        $this->req = $req;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if($this->req == 'true'){
            $this->req = true;
        }
        else{
            $this->req = false;
        }

        return view('components.include.my-input-label')->with ('req', $this->req);
    }
}
