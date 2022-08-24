<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->tinyInteger('feature_type')->comment('0=image','1=video');
            $table->string('freature_image');
            $table->string('image_path');
            $table->bigInteger('media_id');
            $table->string('video');
            $table->integer('position');
            $table->string('pdf_file');
            $table->tinyInteger('status');
            $table->timestamps();
            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_tags');
            // $table->foreignId('product_id')->constrained()->onDelete('cascade');
            // $table->foreignId('media_id')->constrained()->onDelete('cascade');
            // $table->integer('position')->default(1000);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
