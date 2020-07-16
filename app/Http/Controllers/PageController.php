<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Page;

class PageController extends Controller
{
    public function index()
    {
        $route = Route::current();
        $slug = '/';

        if (array_key_exists("any", $route->parameters)) {
            $slug = $route->parameters["any"];
        }

        $params = explode("/", $slug);
        $last =  $params[array_key_last($params)];

        if ($last == "") {
            // homepage
            $last = "/";
        }

        $pages = Page::where('slug', $last)->get();

        // $slugs = [];

        foreach($pages as $page) {
            $pageSlug = $page->allParents();

            if (($slug == '/' && $slug == $pageSlug) || '/' . $slug == $pageSlug) {
                // dd("found");
                return view('page.index', [ "data" => $page, "title" => $page->name ]);
            }
        }

            // echo "404";
            return abort(404);
      
    }
}
