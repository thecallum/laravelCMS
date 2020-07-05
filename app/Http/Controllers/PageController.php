<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Page;

class PageController extends Controller
{
    private $pages = [
        [ "name" => "Home Page", "path" => "/", "contents" => "<p>Home page contents</p>" ],
        [ "name" => "Test Page", "path" => "test", "contents" => "<p style=\"color:red\">Test page contents</p>" ]
    ];  

    public function index()
    {
        $route = Route::current();
        $slug = '/';

        if (array_key_exists("any", $route->parameters)) {
            $slug = $route->parameters["any"];
        }

        $page = Page::where("slug", $slug)->first();

        if ($page == null) {
            return abort(404);
        }

        return view('page.index', [ "data" => $page, "title" => $page->name ]);
    }
}
