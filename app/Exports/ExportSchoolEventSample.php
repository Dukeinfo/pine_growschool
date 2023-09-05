<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ExportSchoolEventSample implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Generate sample data for the Excel file
    $data = collect([         
        [   '13/01/2023','Lohri','1',	'Active'],
       
            
        ]);

        return $data;
    }

    public function headings(): array
    {
        return ['Date', 'Event',  ,'Sort id' ,'Status'];
    }
}
