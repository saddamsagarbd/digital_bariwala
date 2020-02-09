<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->tinyInteger('gender')->comment('1 = male, 2 = female');
            $table->string('mobile_no')->unique();
            $table->string('address');
            $table->integer('floors');
            $table->integer('units');
            $table->string('password');
            $table->timestamp('mobile_no_verified_at')->nullable();
            $table->string('validation_code')->nullable();
            $table->tinyInteger('user_type')->comment('1 = super admin, 2 = user');
            $table->tinyInteger('status')->default('1')->comment('1=active, 2=delete, 3=de-active, 4=suspend');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
