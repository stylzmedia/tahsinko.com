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
            $table->string('name');
            $table->string('product_name');
            $table->unsignedBigInteger('product_id');
            $table->string('company')->nullable();
            $table->string('address');
            $table->string('email');
            $table->string('mobile');
            $table->string('stop_opening');
            $table->string('shaft_size')->nullable();
            $table->string('capacity');
            $table->string('machine_room');
            $table->string('head_room')->nullable();
            $table->string('pit')->nullable();
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
