<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameToApplicationForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('application_forms', function (Blueprint $table) {
            //
            $table->string('name')->after('application_date')->nullable();
            $table->string('email')->after('name')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('application_forms', function (Blueprint $table) {
            //
            $table->dropColumn('name');
            $table->dropColumn('email');


        });
    }
}
