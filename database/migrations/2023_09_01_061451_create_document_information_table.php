<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('general_information_id');
            $table->string('doc1')->nullable();
            $table->string('doc2')->nullable();
            $table->string('doc3')->nullable();
            $table->string('doc4')->nullable();
            $table->string('doc5')->nullable();
            $table->string('doc6')->nullable();
            $table->string('doc7')->nullable();
            $table->string('doc8')->nullable();
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
        Schema::dropIfExists('document_information');
    }
}
