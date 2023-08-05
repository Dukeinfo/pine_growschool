<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_apps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link');
            $table->string('logo')->nullable();
            $table->string('icon')->nullable(); 
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
        Schema::dropIfExists('social_apps');
    }
}
