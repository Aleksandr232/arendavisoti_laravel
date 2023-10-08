<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_tours', function (Blueprint $table) {
            $table->id();
            $table->string('sign');
            $table->string('act');
            $table->string('dateact');
            $table->string('counterparty');
            $table->string('phone');
            $table->string('duration');
            $table->string('adreess');
            $table->string('contractamount');
            $table->string('calculation');
            $table->string('paidby');
            $table->string('view');
            $table->string('cost');
            $table->string('flights');
            $table->string('amount');
            $table->string('name_tours');
            $table->string('footing1_5');
            $table->string('area0_45');
            $table->string('rama1_2');
            $table->string('rigel2');
            $table->string('link0_7');
            $table->string('rama1_1');
            $table->string('emphasis');
            $table->string('footing0_7');
            $table->string('area07_15');
            $table->string('rama0_7');
            $table->string('rigel1_5');
            $table->string('rama0_7_1');
            $table->string('footing2_4');
            $table->string('pipe');
            $table->string('rama1_4');
            $table->string('link0_9');
            $table->string('sum_equipment');
            $table->string('contract');
            $table->string('data_contract');
            $table->string('deposit');
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
        Schema::dropIfExists('customer_tours');
    }
}
