<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolInfrastructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_infrastructures', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('general_information_id');
            $table->string('school_area')->nullable();
            $table->string('school_rooms')->nullable();
            $table->string('school_labs')->nullable();
            $table->string('school_internet')->nullable();
            $table->string('toilet_girls')->nullable();
            $table->string('toilet_boys')->nullable();
            $table->string('school_youtube')->nullable();
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
        Schema::dropIfExists('school_infrastructures');
    }
}
