<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRollofhonoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rollofhonours', function (Blueprint $table) {
            $table->id();
            $table->string('category_honour_id')->nullable(); 
            $table->string('sub_category')->nullable(); 
            $table->string('student_name')->nullable();
            $table->string('house')->nullable();
            $table->string('branch')->nullable();
            $table->string('year')->nullable();
            $table->string('image')->nullable();
            $table->string('thumbnail')->nullable();
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
        Schema::dropIfExists('rollofhonours');
    }
}
