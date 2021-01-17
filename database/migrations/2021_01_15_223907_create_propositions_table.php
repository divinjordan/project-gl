<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propositions', function (Blueprint $table) {
            $table->bigIncrements('proposition_id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('offer_id');
            $table->string('proposition_value');
            $table->string('proposition_state');
            $table->timestamps();
            
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
        Schema::dropIfExists('propositions');
    }
}
