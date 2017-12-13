<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGatewayFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gateway_fees', function (Blueprint $table) {
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
            $table->decimal('setup', 15, 2)->nullable();
            $table->decimal('monthly', 15, 2)->nullable();
            $table->decimal('transaction', 15, 2)->nullable();
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
        Schema::dropIfExists('gateway_fees');
    }
}
