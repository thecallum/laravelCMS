<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return View('admin.pages.index', [
            "pages" => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allPages = Page::all();
        
        return View('admin.pages.create', [
            "allPages" => $allPages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            $this->pageValidationRules()
        );

        $newPage = Page::create($validatedData);

        return $newPage->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        $allPages = Page::where("id", "!=", $page->id)->get();

        return View('admin.pages.show', [
            "page" => $page,
            "allPages" => $allPages
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $validatedData = $request->validate(
            $this->pageValidationRules($page->id)
        );

        $page->update($validatedData);

        return response()->json($validatedData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }

    private function pageValidationRules($id = null)
    {
        return [
            'name' => 'required|string',
            'title' => 'required|string',
            'parent_page_id' => 'required|exists:App\Page,id',
            'slug' => 'required|unique_with:Pages,parent_page_id,' . $id,
            'content' => 'required|min:3|max:10000',
        ];
    }
}
