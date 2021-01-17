<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_files', function (Blueprint $table) {
            $table->bigIncrements('offer_file_id');
            $table->unsignedBigInteger('offer_id');
            $table->unsignedBigInteger('file_id');
            $table->timestamps();
            $table->foreign('file_id')->references('file_id')->on('files')->onDelete('cascade');
            $table->foreign('offer_id')->references('offer_id')->on('offers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer_files');
    }
}
