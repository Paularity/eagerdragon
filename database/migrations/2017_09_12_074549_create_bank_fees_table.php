<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->integer('processor_id')->unsigned()->nullable();
            $table->foreign('processor_id')
                ->references('id')
                ->on('processors')
                ->onDelete('cascade');
            $table->decimal('transaction', 15, 2)->nullable();
            $table->decimal('authorization', 15, 2)->nullable();
            $table->decimal('capture', 15, 2)->nullable();
            $table->decimal('sale', 15, 2)->nullable();
            $table->decimal('decline', 15, 2)->nullable();
            $table->decimal('refund', 15, 2)->nullable();
            $table->decimal('chargeback1', 15, 2)->nullable();
            $table->decimal('chargeback2', 15, 2)->nullable();
            $table->decimal('chargeback_threshold', 15, 2)->nullable();
            $table->decimal('discount_rate', 15, 2)->nullable();
            $table->decimal('avs_premium', 15, 2)->nullable();
            $table->decimal('cvv_premium', 15, 2)->nullable();
            $table->decimal('interregional_premium', 15, 2)->nullable();
            $table->decimal('wire', 15, 2)->nullable();
            $table->decimal('reserve_rate', 15, 2)->nullable();
            $table->integer('reserve_period')->nullable();
            $table->decimal('initial_reserve', 15, 2)->nullable();
            $table->decimal('setup', 15, 2)->nullable();
            $table->decimal('monthly', 15, 2)->nullable();
            $table->timestamps();

            $table->index([
                'id', 'user_id', 'processor_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_fees');
    }
}
