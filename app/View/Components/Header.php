<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Page;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $pages = [];

    public function __construct()
    {
        $this->pages = Page::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.header');
    }
}
