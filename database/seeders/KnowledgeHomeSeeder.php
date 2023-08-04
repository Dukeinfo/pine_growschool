<?php

namespace Database\Seeders;

use App\Models\KnowledgeHome;
use Illuminate\Database\Seeder;

class KnowledgeHomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /* `pineschool`.`knowledge_homes` */
$knowledge_homes = array(
    array('title' => ' Academics','description' => '<p>Great emphasis is laid on Academics as this is one of the important prerequisites for a successful future for the students.</p>
  ','slug' => NULL,'logo' => 'flaticon-open-book','image' => NULL,'thumbnail' => NULL,'link' => 'https://example.com/','sort_id' => '1','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-04 17:20:29','updated_at' => '2023-08-04 17:20:29'),
    array('title' => 'Co-curriculars','description' => '<p>Combined with Academics and Sports, Co-curricular activities at Pinegrove help in making a well-rounded individual.</p>
  ','slug' => NULL,'logo' => 'flaticon-graduating-student','image' => NULL,'thumbnail' => NULL,'link' => 'https://example.com/','sort_id' => '1','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-04 17:21:06','updated_at' => '2023-08-04 17:21:06'),
    array('title' => 'Games & Sports','description' => '<p>Harnessing the Power of Sports: Fostering Leadership, Integrity, Hard Work and Teamwork through Physical Fitness.</p>
  ','slug' => NULL,'logo' => 'flaticon-targeting','image' => NULL,'thumbnail' => NULL,'link' => 'https://example.com/','sort_id' => '3','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-04 17:23:24','updated_at' => '2023-08-04 17:23:24'),
    array('title' => 'How to Apply','description' => '<p>The admission procedure starts with Registration of the child for admission. Registration is normally open throughout the year.</p>
  ','slug' => NULL,'logo' => 'flaticon-online-registration','image' => NULL,'thumbnail' => NULL,'link' => 'https://example.com/','sort_id' => '2','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-04 17:24:01','updated_at' => '2023-08-04 17:24:01')
  );
  foreach ( $knowledge_homes as $key => $name) {
            KnowledgeHome::create($name);
}
    }
    
}
