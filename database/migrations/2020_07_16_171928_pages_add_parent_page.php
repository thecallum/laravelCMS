<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PagesAddParentPage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function(Blueprint $table) {
            $table->integer('parent_page_id')->unsigned()->nullable()->after('id');

            $table->foreign('parent_page_id')->references('id')->on('pages');

            // $table->integer('parent')->unsigned()->nullable()->after('id');
            // $table->foreign('parent')->references('id')->on('cafes');
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
