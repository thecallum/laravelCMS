<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $paths = [
        [ "name" => "Home", "url" => "/admin" ],
        [ "name" => "Pages", "url" => "/admin/pages" ],
    ];

    public $name = "Callum";

    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.breadcrumb');
    }
}
