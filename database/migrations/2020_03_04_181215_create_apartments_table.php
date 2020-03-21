<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('floor');
            $table->integer('unit');
            $table->string('unit_name');
            $table->integer('bed_room');
            $table->integer('wash_room');
            $table->tinyInteger('drawing_dining')->comment('1 = attached, 2 = separate');
            $table->tinyInteger('kitchen_room');
            $table->integer('belcony');
            $table->double('unit_size');
            $table->double('unit_advance');
            $table->double('monthly_rent');
            $table->string('meter_no');
            $table->tinyInteger('is_occupied')->default(0)->comment("1=occupied, 0=available");
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_delete')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
