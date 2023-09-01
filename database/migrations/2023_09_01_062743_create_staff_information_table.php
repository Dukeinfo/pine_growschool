<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('general_information_id');
            $table->string('principal_name')->nullable();
            $table->string('school_teachers')->nullable();
            $table->string('school_pgt')->nullable();
            $table->string('school_tgt')->nullable();
            $table->string('school_prt')->nullable();
            $table->string('school_ratio')->nullable();
            $table->string('school_educator')->nullable();
            $table->string('school_cousellor')->nullable();
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
        Schema::dropIfExists('staff_information');
    }
}
