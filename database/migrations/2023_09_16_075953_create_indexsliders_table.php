<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndexslidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indexsliders', function (Blueprint $table) {
            $table->id();
            $table->string('slider_img')->nullable();
            $table->string('title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_tag')->nullable();
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
        Schema::dropIfExists('indexsliders');
    }
}
