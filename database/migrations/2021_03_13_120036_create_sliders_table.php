<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1);
            $table->integer('position')->default(1000);
            $table->string('text_1')->nullable();
            $table->string('text_2')->nullable();
            $table->string('text_3')->nullable();
            $table->string('button_1_text')->nullable();
            $table->string('button_1_url')->nullable();
            $table->string('button_2_text')->nullable();
            $table->string('button_2_url')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('image');
            $table->string('image_path')->nullable();
            $table->unsignedBigInteger('media_id')->nullable();
            $table->tinyInteger('slider_type')->default(1)->comment("1=images", "2=video", "3=scripts");
            $table->tinyInteger('bd_opacity')->comment("0=hide", "1=show");
            $table->string('video')->nullable();
            $table->text('slider_script')->nullable();
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
        Schema::dropIfExists('sliders');
    }
}
