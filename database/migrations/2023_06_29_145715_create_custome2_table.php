<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustome2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('sign');
            $table->string('act');
            $table->string('dateact');
            $table->string('counterparty');
            $table->string('phone');
            $table->string('duration');
            $table->string('contractamount');
            $table->string('calculation');
            $table->string('paidby');
            $table->string('view');
            $table->string('cost');
            $table->string('flights');
            $table->string('amount');
            $table->string('stairsframes');
            $table->string('passageframes');
            $table->string('doubleconnections');
            $table->string('singleconnections');
            $table->string('alllevelrafters');
            $table->string('alllevelpanels');
            $table->string('bash');
            $table->string('jack');
            $table->string('equipment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custome2');
    }
}
