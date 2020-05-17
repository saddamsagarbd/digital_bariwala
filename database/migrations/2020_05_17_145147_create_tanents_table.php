<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanents', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name');
            
            $table->string('email');
            
            $table->string('contact_no');
            
            $table->string('option_contact_no')
            	  ->nullable();
            
            $table->tinyInteger('id_type');
            
            $table->string('id_no');
            
            $table->integer('family_member')
            	  ->nullable();
            
            $table->string('femily_details')
            	  ->nullable();
            
            $table->string('permanent_address')
            	  ->nullable();
            
            $table->string('occupation')
            	  ->nullable();
            
            $table->string('company_address')
            	  ->nullable();
            
            $table->tinyInteger('is_active')
            	  ->default(1)
            	  ->comment("1=active, 0=inactive");
            
            $table->string('created_by');
            
            $table->dateTime('created_at');
            
            $table->string('updated_by')
            	  ->nullable();
            
            $table->dateTime('updated_at')
            	  ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanents');
    }
}
