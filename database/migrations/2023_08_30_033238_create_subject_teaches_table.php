<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectTeachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_teaches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('class_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('sort_id')->nullable(); 
            $table->enum('status', ['Active', 'Inactive', 'Deleted'])->default('Active');
            $table->ipAddress('ip_address')->nullable();
            $table->string('login')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('subject_teaches');
    }
}
