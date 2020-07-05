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
        Page::insert([
            "name" => "Home",
            "title" => "Home Page",
            "slug" => "/",
            "content" => "<p>homepage contents</p>"
        ]);

        Page::insert([
            "name" => "About",
            "title" => "About",
            "slug" => "about",
            "content" => "<p>About contents</p>"
        ]);
    }
}
