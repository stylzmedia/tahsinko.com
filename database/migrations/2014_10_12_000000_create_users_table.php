<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('type', 55)->default('admin');
           // $table->unsignedBigInteger('role');
            $table->unsignedBigInteger('role_id')->default(1)->comment('1 = Admin, 2 = Editor, 3 = Author');
            $table->string('status', 55);
            $table->string('first_name')->nullable();
            $table->string('last_name');
            $table->string('email', 191)->unique();
            $table->string('mobile_number')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
