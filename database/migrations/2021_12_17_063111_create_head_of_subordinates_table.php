<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadOfSubordinatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('head_of_subordinates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('head');
            $table->foreign('head')->references('employee_id')->on('users');
            $table->string('subordinate');
            $table->foreign('subordinate')->references('employee_id')->on('users');
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
        Schema::dropIfExists('head_of_subordinates');
    }
}
