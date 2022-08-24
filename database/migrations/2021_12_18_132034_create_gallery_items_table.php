<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->string('title',191)->nullable();
            $table->unsignedBigInteger('gallery_id')->nullable();
            $table->text('description')->nullable();
            $table->string('image',191)->nullable();
            $table->string('video',191)->nullable();
            $table->text('video_embade_code')->nullable();
            $table->string('pdf_file',191)->nullable();
            $table->tinyInteger('type')->default(1)->comment('1=image,2=video,3=embade_code,4=pdf_file');
            $table->integer('position')->default(100);
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('gallery_items');
    }
}
