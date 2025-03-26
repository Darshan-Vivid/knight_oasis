<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class header extends Component
{

    public $title;

    public $meta_description;

    /**
     * Create a new component instance.
     */
    public function __construct($title = 'Knight Oasis' , $meta_description = '')
    {
        $this->title = $title;
        $this->meta_description = $meta_description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
