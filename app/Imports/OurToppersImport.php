<?php

namespace App\Imports;

use App\Models\OurTopper;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\WithStartRow;
class OurToppersImport implements ToCollection,WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
        foreach ($collection as $row) {
            OurTopper::firstOrCreate(
                ['name' => $row[1]], // Assuming 'name' is in the second column (index 1)
                [
                    'category' => $row[0],
                    'class' => $row[2],
                    'section' => $row[3],
                    'percentage' => $row[4],
                    'image' => $row[5],
                    'thumbnail' => $row[6],
                    'link' => $row[7],
                    'sort_id' => $row[8],
                    'status' => $row[9],
                ]
            );
        }
    
    }
    
    public function startRow(): int
    {
        return 2;
    }

    
}
