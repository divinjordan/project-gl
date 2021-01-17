<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_files', function (Blueprint $table) {
            $table->bigIncrements('message_file_id');
            $table->unsignedBigInteger('message_id');
            $table->unsignedBigInteger('file_id');
            $table->timestamps();
            $table->foreign('file_id')->references('file_id')->on('files')->onDelete('cascade');
            $table->foreign('message_id')->references('message_id')->on('messages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_files');
    }
}
