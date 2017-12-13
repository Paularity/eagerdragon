<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile_number');
            $table->tinyInteger('first_time_login')->default(1);
            $table->tinyInteger('status')->default(2);
            $table->timestamp('audited_at')->nullable()->default(null);
            $table->timestamp('last_password_reset_at')->useCurrent();
            $table->rememberToken();
            $table->timestamps();

            $table->index([
                'id', 'email', 'username', 'mobile_number',
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
        Schema::drop('users');
    }
}
