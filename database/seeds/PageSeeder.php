<?php

use Illuminate\Database\Seeder;
use App\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page1 = Page::insert([
            "name" => "Home",
            "title" => "Home Page",
            "slug" => "/",
            "content" => "<p>homepage contents</p>"
        ]);

        $page2 = Page::insert([
            "name" => "About",
            "title" => "About",
            "slug" => "about",
            "content" => "<p>About contents</p>",
            "parent_page_id" => 1
        ]);       
        
        $page3 = Page::insert([
            "name" => "Memes",
            "title" => "memes",
            "slug" => "memes",
            "content" => "<p>Memes contents</p>",
            "parent_page_id" => 2
        ]);  

        $page4 = Page::insert([
            "name" => "About",
            "title" => "About Memes",
            "slug" => "about",
            "content" => "<p>About Memes contents</p>",
            "parent_page_id" => 3
        ]);  
    }
}
