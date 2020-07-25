<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Page;

class PageController extends Controller
{
    public function index()
    {
        $slug = $this->getRequestSlug();

        $page = ($slug === "/") 
            ? $this->loadHomepage() 
            : $this->findPage($slug);

        if ($page == null) {
            return abort(404);
        }

        return view('page.index', [ "data" => $page, "title" => $page->name ]);            
    }

    private function loadHomepage()
    {
        return Page::where("slug", "/")->first();
    }

    private function findPage($slug)
    {
        $slugParts = $this->explodeSlug($slug);
        $pagePartialUrl =  end($slugParts);

        $pagesWithMatchingPartialURL = Page::where('slug', $pagePartialUrl)->get();

        if (count($pagesWithMatchingPartialURL) == 0) return null;

        foreach($pagesWithMatchingPartialURL as $page) {
            $pageSlug = $page->fullURL();

            if ($pageSlug == "/" . $slug) {
                return $page;
            }
        }

        return null;
    }

    private function explodeSlug($slug)
    {
        if ($slug == "/") {
            return [];
        }

        return explode("/", $slug);
    }

    private function getRequestSlug()
    {
        $route = Route::current();
        $slug = '/';

        if (array_key_exists("any", $route->parameters)) {
            $slug = $route->parameters["any"];
        }

        return $slug;
    }    
}
