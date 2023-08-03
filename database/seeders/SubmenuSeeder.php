<?php

namespace Database\Seeders;

use App\Models\Submenu;
use Illuminate\Database\Seeder;

class SubmenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /* `pineschool`.`submenus` */
$submenus = array(
    array('menu_id' => '1','name' => 'Location','sort_id' => '1','cms' => 'Yes','pname' => NULL,'image' => '64c28acfe0156.jpg','thumbnail' => 'thumb_64c28acfe0156.jpg','url_link' => 'Location','display_name' => 'location','seo_title' => 'test','seo_description' => '<p><strong>testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</strong></p>
  ','seo_keywords' => 'testtesttesttesttesttesttesttest','status' => 'Active','ip_address' => '127.0.0.1','login' => '1','deleted_at' => Null,'created_at' => '2023-07-27 15:18:39','updated_at' => '2023-07-27 17:25:37'),
    array('menu_id' => '1','name' => 'Director','sort_id' => '2','cms' => 'Yes','pname' => '','image' => '64c28bb2318dc.jpg','thumbnail' => 'thumb_64c28bb2318dc.jpg','url_link' => 'ewrewr','display_name' => 'werwer','seo_title' => 'ewrwe','seo_description' => '','seo_keywords' => 'dsdsds','status' => 'Active','ip_address' => '127.0.0.1','login' => '1','deleted_at' =>Null,'created_at' => '2023-07-27 15:22:26','updated_at' => '2023-07-27 17:25:38'),
    array('menu_id' => '1','name' => 'Raison D\'etre','sort_id' => '3','cms' => 'Yes','pname' => NULL,'image' => '64c28c9f003fa.png','thumbnail' => 'thumb_64c28c9f003fa.png','url_link' => 'teewr','display_name' => 'erewr','seo_title' => 'erewrwdgdsgds','seo_description' => '<p><strong>erewrwdgdsgdserewrwdgdsgdserewrwdgdsgdserewrwdgdsgdserewrwdgdsgds</strong></p>
  ','seo_keywords' => 'sdsd','status' => 'Active','ip_address' => '127.0.0.1','login' => '1','deleted_at' => Null,'created_at' => '2023-07-27 15:26:23','updated_at' => '2023-07-27 17:25:38'),
    array('menu_id' => '1','name' => 'Life at Piegrove','sort_id' => '3','cms' => 'Yes','pname' => NULL,'image' => '64c290f054d81.jpg','thumbnail' => 'thumb_64c290f054d81.jpg','url_link' => 'sadasd','display_name' => 'asdsad','seo_title' => 'sadsadasdad','seo_description' => '<p><strong>asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd</strong></p>
  ','seo_keywords' => 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd','status' => 'Active','ip_address' => '127.0.0.1','login' => '1','deleted_at' => Null,'created_at' => '2023-07-27 15:44:48','updated_at' => '2023-07-27 17:25:39'),
    array('menu_id' => '1','name' => 'Group Photo','sort_id' => '5','cms' => 'Yes','pname' => NULL,'image' => '64c2929986636.jpg','thumbnail' => 'thumb_64c2929986636.jpg','url_link' => 'fhgfhf','display_name' => 'hgfhfhfh','seo_title' => 'fhfhf','seo_description' => '<p><strong>ghfhgfhghfhgfhghfhgfhghfhgfhghfhgfhghfhgfhghfhgfhghfhgfh</strong></p>
  ','seo_keywords' => 'fgdfhfh','status' => 'Active','ip_address' => '127.0.0.1','login' => '1','deleted_at' => Null,'created_at' => '2023-07-27 15:51:53','updated_at' => '2023-07-27 17:25:40'),
    array('menu_id' => '1','name' => 'Scales of Pay','sort_id' => '7','cms' => 'Yes','pname' => '','image' => '64c2931e00682.jpg','thumbnail' => 'thumb_64c2931e00682.jpg','url_link' => 'fdsfdsf','display_name' => 'sfdsfsfsdf','seo_title' => 'vvxcvcxvx','seo_description' => '<p><strong>ghfhgfhghfhgfhghfhgfhghfhgfhghfhgfhghfhgfhghfhgfhghfhgfhvvxcvx</strong></p>
  ','seo_keywords' => 'cxvcxvxc','status' => 'Active','ip_address' => '127.0.0.1','login' => '1','deleted_at' => Null,'created_at' => '2023-07-27 15:54:06','updated_at' => '2023-07-27 17:25:40'),
    array('menu_id' => '1','name' => 'Enrollment','sort_id' => '8','cms' => 'Yes','pname' => '','image' => '64c2941bf12bc.jpg','thumbnail' => 'thumb_64c2941bf12bc.jpg','url_link' => 'test','display_name' => 'tsest','seo_title' => 'dfdsf','seo_description' => '<p><strong>test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;test&nbsp;</strong></p>
  ','seo_keywords' => 'test test test test test test test test test test test test ','status' => 'Active','ip_address' => '127.0.0.1','login' => '1','deleted_at' => Null,'created_at' => '2023-07-27 15:58:20','updated_at' => '2023-07-27 17:25:43'),
    array('menu_id' => '1','name' => 'SMC','sort_id' => '9','cms' => 'Yes','pname' => '','image' => '64c2980c571ca.jpg','thumbnail' => 'thumb_64c2980c571ca.jpg','url_link' => 'sfdsfds','display_name' => 'fdsfsd','seo_title' => 'fdsfds','seo_description' => '<p>dsfdsf</p>
  ','seo_keywords' => 'dsfdsf','status' => 'Active','ip_address' => '127.0.0.1','login' => '1','deleted_at' => Null,'created_at' => '2023-07-27 16:15:08','updated_at' => '2023-07-27 17:25:44')
  );
        foreach ( $submenus as $key => $name) {
            Submenu::create($name);
        }

    }
}
