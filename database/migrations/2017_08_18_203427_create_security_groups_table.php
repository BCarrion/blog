<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecurityGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('security_groups', function (Blueprint $table) {
            //----------------------------
            //Attributes table
            //----------------------------
            $table->increments('id');
            $table->string('name',45);
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
        Schema::dropIfExists('security_groups');
    }
}
