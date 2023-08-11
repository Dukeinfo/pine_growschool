<?php

namespace Database\Seeders;

use App\Models\SectionMaster;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SectionMaster::truncate();

        $sections = ['A', 'B', 'C', 'D'];
        $classSeederData = [];
            foreach ($sections as $keys => $section) {
                $classSeederData[] = [
                    'name' =>  $section,
                    'class_masters_id' => $keys+1,
                    'status' => 'Active',
                    'sort_id' => $keys+1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            
        }

        DB::table('section_masters')->insert($classSeederData);
    }
}
