<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_alerts', function (Blueprint $table) {
            $table->bigIncrements('offer_alert_id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('preference_id');
            $table->timestamps();

            $table->foreign('preference_id')->references('preference_id')->on('preferences')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer_alerts');
    }
}
