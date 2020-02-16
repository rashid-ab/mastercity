<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerdaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perdays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('PlotNo');
            $table->string('Items');
            $table->string('Quantity')->nullable();
            $table->string('Date');
            $table->integer('Price');
            $table->timestamps();
        });
        DB::update("ALTER TABLE perdays AUTO_INCREMENT = 1000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perdays');
    }
}
