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
        foreach ($collection  as $row) {
            // $data = $row->skip(0);
            OurTopper::create([
                
                'category' => $row[0], // Assuming 'Name' is in the first column (index 0)
                'name' => $row[1], // Assuming 'Designation' is in the second column (index 1)
                'class' => $row[2], // Assuming 'Image' is in the third column (index 2)
                'section' => $row[3], // Assuming 'Sorting Order' is in the fourth column (index 3)
                'percentage' => $row[4], // Assuming 'Status' is in the fifth column (index 4)
                'image' => $row[2], // Assuming 'Status' is in the fifth column (index 4)
                'thumbnail' => $row[6], // Assuming 'Status' is in the fifth column (index 4)
                'link' => $row[7], // Assuming 'Status' is in the fifth column (index 4)
                'sort_id' => $row[8], // Assuming 'Status' is in the fifth column (index 4)
                'status' => $row[9], // Assuming 'Status' is in the fifth column (index 4)


            ]);
            // return $data;
        }
    }
    
    public function startRow(): int
    {
        return 2;
    }

    
}
