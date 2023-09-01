<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultAcademicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_academics', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('general_information_id');
            $table->string('doc1')->nullable();
            $table->string('doc2')->nullable();
            $table->string('doc3')->nullable();
            $table->string('doc4')->nullable();
            $table->string('doc5')->nullable();
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
        Schema::dropIfExists('result_academics');
    }
}
