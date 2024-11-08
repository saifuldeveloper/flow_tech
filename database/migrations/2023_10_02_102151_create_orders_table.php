<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('shipping')->nullable();
            $table->string('coupon_name')->nullable();
            $table->string('coupon_discount')->nullable();
            $table->string('total')->nullable();
            $table->string('status')->nullable()->default(0);
            $table->string('payment_number')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('month')->nullable();
            $table->string('date')->nullable();
            $table->string('year')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
