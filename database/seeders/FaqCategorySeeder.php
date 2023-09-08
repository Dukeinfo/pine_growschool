<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

class FaqCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        FaqCategory::truncate();

        $faq_categories = array(
            array('name' => 'FAQ INTRODUCTION','slug' => 'faq-introduction','seo_title' => 'FAQ INTRODUCTION','seo_description' => NULL,'seo_keywords' => NULL,'sort_id' => '6','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
            array('name' => 'ADMISSION AND FEES','slug' => 'admission-and-fees','seo_title' => 'ADMISSION AND FEES','seo_description' => NULL,'seo_keywords' => NULL,'sort_id' => '2','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
            array('name' => 'ACADEMICS','slug' => 'academics','seo_title' => 'ACADEMICS','seo_description' => NULL,'seo_keywords' => NULL,'sort_id' => '1','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
            array('name' => 'FACILITIES AND ACTIVITIES','slug' => 'facilities-and-activities','seo_title' => 'FACILITIES AND ACTIVITIES','seo_description' => NULL,'seo_keywords' => NULL,'sort_id' => '5','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
            array('name' => 'BOARDING','slug' => 'boarding','seo_title' => 'BOARDING','seo_description' => NULL,'seo_keywords' => NULL,'sort_id' => '3','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
            array('name' => 'DISCIPLINE','slug' => 'discipline','seo_title' => 'DISCIPLINE','seo_description' => NULL,'seo_keywords' => NULL,'sort_id' => '4','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
            array('name' => 'OTHERS','slug' => 'others','seo_title' => 'OTHERS','seo_description' => NULL,'seo_keywords' => NULL,'sort_id' => '7','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => now(),'updated_at' => now())
          );

          foreach ( $faq_categories as $key => $name) {
            FaqCategory::create($name);
}
    }
}
