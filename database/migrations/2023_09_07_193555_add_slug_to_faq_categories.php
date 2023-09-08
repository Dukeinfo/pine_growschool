<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToFaqCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faq_categories', function (Blueprint $table) {
            //
            $table->string('slug')->after('name')->nullable();
            $table->longText('seo_title')->after('slug')->nullable(); 
            $table->longText('seo_description')->after('seo_title')->nullable(); 
            $table->longText('seo_keywords')->after('seo_description')->nullable();
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faq_categories', function (Blueprint $table) {
            //
            $table->dropColumn('slug');
            $table->dropColumn('seo_title');
            $table->dropColumn('seo_description');
            $table->dropColumn('seo_keywords');

        });
    }
}
