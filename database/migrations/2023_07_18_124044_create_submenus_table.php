<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submenus', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_id');
            $table->string('name');
            $table->bigInteger('sort_id')->nullable(); 
            $table->string('cms')->nullable(); ;
            $table->string('pname')->nullable(); ;
            $table->string('image')->nullable(); ;

            $table->string('url_link')->nullable(); 
            $table->string('display_name')->nullable(); 


            $table->longText('seo_title')->nullable(); 
            $table->longText('seo_description')->nullable(); 
            $table->longText('seo_keywords')->nullable(); 


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
        Schema::dropIfExists('submenus');
    }
}
