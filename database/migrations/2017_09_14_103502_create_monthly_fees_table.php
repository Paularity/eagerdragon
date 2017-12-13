<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlyFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchant_id')->unsigned();
            $table->integer('processor_id')->unsigned();
            $table->string('fee_type')->nullable();
            $table->string('monthly_fee')->nullable();
            $table->string('bank_fee')->nullable();
            $table->string('bank_setup')->nullable();
            $table->string('gateway_setup')->nullable();
            $table->string('misc_setup')->nullable();
            $table->string('total_transaction_charge')->nullable();
            
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
        Schema::dropIfExists('monthly_fees');
    }
}
