<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('business_name')->nullable();
            $table->string('business_legal_name')->nullable();
            $table->string('business_type')->nullable();
            $table->string('description')->nullable();
            $table->date('start_date')->nullable();
            $table->decimal('estimated_monthly_sales', 15, 2)->nullable();
            $table->string('industry')->nullable();
            $table->string('business_website')->nullable();
            $table->string('business_address')->nullable();
            $table->string('business_city')->nullable();
            $table->string('business_state')->nullable();
            $table->string('business_zip')->nullable();
            $table->string('business_country')->nullable();
            $table->timestamps();

            $table->index([
                'id', 'user_id', 'business_name',
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
        Schema::dropIfExists('business_informations');
    }
}
