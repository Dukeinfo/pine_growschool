<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultClassxisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_classxis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('general_information_id');
            $table->string('year')->nullable();
            $table->string('nof_student')->nullable();
            $table->string('nof_student_passed')->nullable();
            $table->string('pass_percentage')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('result_classxis');
    }
}
