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
            array('name' => 'FAQ INTRODUCTION','slug' => NULL,'sort_id' => NULL,'status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
            array('name' => 'ADMISSION AND FEES','slug' => NULL,'sort_id' => NULL,'status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
            array('name' => 'ACADEMICS','slug' => NULL,'sort_id' => NULL,'status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
            array('name' => 'FACILITIES AND ACTIVITIES','slug' => NULL,'sort_id' => NULL,'status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => now(),'created_at' => now(),'updated_at' => now()),
            array('name' => 'BOARDING','slug' => NULL,'sort_id' => NULL,'status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
            array('name' => 'DISCIPLINE','slug' => NULL,'sort_id' => NULL,'status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
            array('name' => 'OTHERS ','slug' => NULL,'sort_id' => NULL,'status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => now(),'updated_at' => now())
          );

          foreach ( $faq_categories as $key => $name) {
            FaqCategory::create($name);
}
    }
}
