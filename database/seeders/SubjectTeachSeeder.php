<?php

namespace Database\Seeders;

use App\Models\SubjectTeach;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectTeachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SubjectTeach::truncate();
        $subjects = [
            'English',
            'English Conversation',
            'Hindi',
            'Mathematics',
            'Social Science',
            'G. Sc.',
            'Punjabi/sanskrit',
            'Computers',
            'G.K./Typing',
            'Art/Music',
            'Internal Assessment',
            'English Core',
            'Business Studies ',
            'Computer science',
            'Economics',
            'Accountancy',
            'Phy. Edu.',
            'Environmental Sc.',
            'Info. Practices',
            'Physics',
            'Chemistry',
            'Biology Pr.',
            'Internal Assesment',
            'Art',
            'Music',
            'Physics Pr.',
            'Chemistry Pr.',
            'Info. Practices Pr.',
            'Maths Pr',
            'Phy. Edu. Pr',
            'G. Sc. Pr',
            'Accountancy Pr.',
            'Biology',
            'Accountancy',
            'Social Science Pr',
            'Painting',
            'Painting Pr',
            'Music Pr.',
            'Economics Pr.',
            'Business Studies Pr.',
            'GST',
            'Punjabi/Sanskrit',
            'Value Education',
            'Pol Science',
            'Psychology',
            'Sociology',
        ];


        foreach ($subjects as $index => $subject) {
            DB::table('subject_teaches')->insert([
                'class_id' => null,
                'name' => $subject,
                'sort_id' => $index + 1,
                'status' => 'active',
                'ip_address' => null,
                'login' => 1,
                'created_at'=> now(),
                'updated_at'=> now(),

            ]);
        }
    }
}
