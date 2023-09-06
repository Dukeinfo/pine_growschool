<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultClassxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_classxes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('general_information_id');
            $table->string('year')->nullable();
            $table->string('regstu')->nullable();
            $table->string('passstu')->nullable();
            $table->string('passper')->nullable();
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
        Schema::dropIfExists('result_classxes');
    }
}
