<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class PageController extends Controller
{
    private $pages = [
        [ "name" => "Home Page", "path" => "/", "contents" => "<p>Home page contents</p>" ],
        [ "name" => "Test Page", "path" => "test", "contents" => "<p style=\"color:red\">Test page contents</p>" ]
    ];  

    public function index()
    {
        $route = Route::current();
        $name = Route::currentRouteName();
        $action = Route::currentRouteAction();

        $path = [];
        $parameters = '/';

        if (array_key_exists("any", $route->parameters)) {
            $parameters = $route->parameters["any"];
            $path = explode("/", $parameters);
        }


        $data = [
            "parameters" => $parameters,
            "path" => $path,
            "size" => count($path)
        ];


        $validPages = array_values(array_filter($this->pages, function($page) use ($data) {

            if ($page['path'] == $data['parameters']) {
                return true;
            }

            return false;
        }));

        if (count($validPages) == 0) {
            return abort(404);
        }

        $page = $validPages[0];

        return view('page.index', [ "data" => $page, "title" => $page['name'] ]);

    }
}
