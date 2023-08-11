<?php

namespace Database\Seeders;

use App\Models\ClassMaster;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClassMaster::truncate();

        $classSeederData = [];

        for ($class = 1; $class <= 12; $class++) {
            if ($class == 1) {
                $ordinal = 'st';
            } elseif ($class == 2) {
                $ordinal = 'nd';
            } elseif ($class == 3) {
                $ordinal = 'rd';
            } else {
                $ordinal = 'th';
            }
        
            $classSeederData[] = [
                'classname' => $class . $ordinal,
                'sort_id' => $class,
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        DB::table('class_masters')->insert($classSeederData);
        
    }
}
