<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('offer_id');
            $table->unsignedBigInteger('user_id');
            $table->string('offer_title');
            $table->text('offer_description');
            $table->unsignedInteger('offer_price');
            $table->string('offer_location');
            $table->string('offer_article_state');
            $table->string('offer_brand')->nullable();
            $table->string('offer_size');
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
