<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToStaff extends Migration
{

    public function up()
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->string('description')->after('designation')->nullable();
        });
    }


    public function down()
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
}
