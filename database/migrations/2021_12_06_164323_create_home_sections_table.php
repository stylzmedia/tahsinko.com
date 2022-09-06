<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_name',191)->nullable();
            $table->boolean('section_name_is_show')->default(false);
            $table->unsignedBigInteger('section_name_id')->nullable();
            $table->unsignedBigInteger('section_design_type_id')->nullable();
            $table->integer('position')->default(1000);
            $table->string('title',191);
            $table->longText('description')->nullable();
            $table->boolean('status')->default(true);
            $table->integer('col')->default(1);
            $table->integer('row')->default(3);
            $table->string('image',191)->nullable();
            $table->string('signature_light',191)->nullable();
            $table->string('signature_dark',191)->nullable();

            $table->string('image_path',191)->nullable();
            $table->string('image_path2',191)->nullable();
            $table->string('image_path3',191)->nullable();

            $table->unsignedBigInteger('media_id')->nullable();
            $table->unsignedBigInteger('media_id2')->nullable();
            $table->unsignedBigInteger('media_id3')->nullable();

            $table->string('ceo_name',191)->nullable();

            $table->integer('no_of_slide_col')->default(0);
            $table->string('feature_video',191)->nullable();


            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
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
        Schema::dropIfExists('home_sections');
    }
}
