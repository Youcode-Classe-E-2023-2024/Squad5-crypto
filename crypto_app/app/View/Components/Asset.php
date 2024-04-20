<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Asset extends Component
{

    public $asset;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($asset = null)
    {
        $this->asset = $asset;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.asset');
    }
}
