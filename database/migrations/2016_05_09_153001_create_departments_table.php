<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        
        Schema::create('auction_department', function(Blueprint $table) 
        {
        	$table->integer('auction_id')->unsigned()->index();
        	$table->foreign('auction_id')->references('id')->on('auctions')->onDelete('cascade');
        	
        	$table->integer('department_id')->unsigned()->index();
        	$table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
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
        Schema::drop('departments');
        Schema::drop('auction_department');
    }
}
