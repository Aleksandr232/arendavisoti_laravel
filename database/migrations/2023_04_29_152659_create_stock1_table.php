<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStock1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock1', function (Blueprint $table) {
            $table->id();
            $table->string('tractor');
            $table->string('lesa');
            $table->string('tours');
            $table->string('texnica');
            $table->string('gazelnew');
            $table->string('gazelold');
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
        Schema::dropIfExists('stock1');
    }
}
