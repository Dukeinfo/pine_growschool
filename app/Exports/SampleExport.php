<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class SampleExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Generate sample data for the Excel file
    $data = collect([         
        [   'Department A',	'Manager',	    'image_a.jpg',	'1',	'Active'],
        [	'Department B',	'Supervisor',	'image_b.jpg',	'2',	'Inactive'],
        [   'Department C',	'Analyst',	    'image_c.jpg',	'3',   'Active'],
        [	'Department D',	'Coordinator',	'image_d.jpg',	'4',	'Active'],
            
        ]);

        return $data;
    }

    public function headings(): array
    {
        return ['Name', 'Designation', 'Image' ,'Sort id' ,'status'];
    }
}
