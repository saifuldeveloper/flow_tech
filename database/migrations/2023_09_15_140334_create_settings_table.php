<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('shipping_charge')->nullable();
            $table->string('shopname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->text('google_maps')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedIn')->nullable();
            $table->string('instagram')->nullable();
            $table->text('computer_laptop_gameingPc')->nullable();
            $table->text('Best_laptop')->nullable();
            $table->text('Best_desktop')->nullable();
            $table->text('emipage')->nullable();
            $table->text('policypage')->nullable();
            $table->text('contactpage')->nullable();
            $table->text('aboutpage')->nullable();
            $table->text('conditionpage')->nullable();
            $table->text('refundpage')->nullable();
            $table->text('delivery')->nullable();
            $table->text('message')->nullable();
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
