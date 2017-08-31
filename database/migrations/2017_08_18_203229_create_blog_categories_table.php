<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            //----------------------------
            //Attributes table
            //----------------------------
            $table->increments('id')->unsigned();
            $table->string('name',45);
            $table->string('description',255)->nullable();
            $table->string('visibility', 255);
            $table->integer('parent_name')->unsigned();

            // ---------------------------
            // Composite  unique key
            // ---------------------------

            $table->unique(['name','parent_name']);

            //-----------------------------
            //timestamps fields
            //-----------------------------
            $table->timestamps();


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_categories');
    }
}
