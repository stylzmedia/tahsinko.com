<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->integer('position')->nullable()->default(1000);
            $table->boolean('featured')->default(0);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_tags')->nullable();
            $table->tinyInteger('feature_type')->default(0)->comment('0=image,1=video');
            $table->string('feature_video')->nullable();
            $table->string('image')->nullable();
            $table->string('image_path')->nullable();
            $table->string('video_type')->default('File'); // File, Embade Code
            $table->string('video')->nullable();
            $table->text('video_embade_code')->nullable();
            $table->unsignedBigInteger('media_id')->nullable();
            $table->string('source_name')->nullable();
            $table->string('source_link')->nullable();
            $table->boolean('status')->default(1);
            $table->softDeletes();
            $table->string('publish_date')->nullable();
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
        Schema::dropIfExists('news');
    }
}
