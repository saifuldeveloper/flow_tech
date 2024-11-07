<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chlild_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('sub_category_id');
            $table->string('childcategory_name')->nullable();
            $table->string('childcategory_slug')->nullable();
            $table->string('childcategory_img')->nullable();
            $table->string('childcategory_banner')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_tag')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chlild_categories');
    }
};
