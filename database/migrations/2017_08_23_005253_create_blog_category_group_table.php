<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCategoryGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_category_group', function (Blueprint $table) {

            $table->integer('category_id')->unsigned()->comment('this reference the primary key of field id of the blog_categories table');// references to category_name pk
            $table->integer('group_id')->unsigned()->comment('this reference the primary key of field parent_name of the blog_categories table');// References to category_parent_name pk



            $table->foreign('category_id')->references('id')->on('blog_categories');

            $table->foreign('group_id')->references('id')->on('security_groups');

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
        Schema::dropIfExists('blog_category_group');
    }
}
