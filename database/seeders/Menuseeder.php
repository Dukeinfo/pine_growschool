<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class Menuseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
               /* `pineschool`.`menus` */
        $menus = array(
        array('name' => 'About Us' ,'sort_id' => '1','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('name' => 'Facilities' ,'sort_id' => '2','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('name' => 'Admission &amp; Fees' ,'sort_id' => '4','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('name' => 'Memories' ,'sort_id' => '3','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('name' => 'FAQs' ,'sort_id' => '3','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('name' => 'Calendar' ,'sort_id' => '3','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        );
        foreach ( $menus as $key => $name) {
                    Menu::create($name);
                }
    }
}







