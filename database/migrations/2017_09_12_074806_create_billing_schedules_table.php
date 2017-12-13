<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_schedules', function (Blueprint $table) {
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
            $table->integer('billing_per_week')->nullable();
            $table->string('billing_period_1_starts_on')->nullable();
            $table->string('billing_period_2_starts_on')->nullable();
            $table->integer('time_to_settle')->nullable();
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
        Schema::dropIfExists('billing_schedules');
    }
}
