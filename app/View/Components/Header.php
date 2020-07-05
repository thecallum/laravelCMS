<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $pages = [
        [ "name" => "Home", "url" => "/" ],
        [ "name" => "Test", "url" => "/test" ],
    ];

    public function __construct()
    {
        
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
