<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomer2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer1', function (Blueprint $table) {
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
        Schema::dropIfExists('customer2');
    }
}
