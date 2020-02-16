<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThekedarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thekedars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plots');
            $table->string('thekedar_name');
            $table->integer('payments_recieve')->nullable();
            $table->integer('totals_payment')->nullable();
            $table->string('dates');
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
        Schema::dropIfExists('thekedars');
    }
}
