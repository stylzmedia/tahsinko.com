<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('message');
            $table->tinyInteger('is_quote')->default(0);
            $table->tinyInteger('is_replay')->default(0);
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
        Schema::dropIfExists('request_contacts');
    }
}
