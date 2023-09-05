<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class ExportTopperSample implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Generate sample data for the Excel file
         $data = collect([         
        [   'Topper',	'John ',	'10th'	,'A',	'85.5'	,'image1.jpg',	'thumb1.jpg',	'www.example.com/profile/john_smith',	'1',	'Active'],
        [   'Topper',	'Smith',	'10th'	,'A'	,'85.5',	'image1.jpg',	'thumb1.jpg',	'www.example.com/profile/john_smith',	'2',	'Active'],
        [   'Topper',	'Dev',	'10th'	,'A',	'85.5'	,'image1.jpg',	'thumb1.jpg',	'www.example.com/profile/john_smith',	'3',	'Active']
        ]);

        return $data;
    }
    
    public function headings(): array
    {
        return [ 'Category',	'Name',	'Class',	'Section'	,'Percentage'	,'Image'	,'Thumbnail',	'Link',	'Sort ID',	'Status'];
    }
}
