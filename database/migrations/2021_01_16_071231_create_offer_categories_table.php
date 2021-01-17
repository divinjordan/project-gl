<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_categories', function (Blueprint $table) {
            $table->bigIncrements('offer_category_id');
            $table->unsignedBigInteger('offer_id');
            $table->unsignedBigInteger('category_id');
            $table->string('categorisation_type');
            $table->timestamps();

            $table->foreign('offer_id')->references('offer_id')->on('offers')->onDelete('cascade');
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer_categories');
    }
}
