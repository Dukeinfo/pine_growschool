<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_information', function (Blueprint $table) {
            $table->id();
            $table->string('school_name')->nullable();
            $table->string('application_no')->nullable();
            $table->string('school_code')->nullable();
            $table->string('school_add')->nullable();
            $table->string('principal_detail')->nullable();
            $table->string('school_email')->nullable();
            $table->string('school_phone')->nullable();
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
        Schema::dropIfExists('general_information');
    }
}
