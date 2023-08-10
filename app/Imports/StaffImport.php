<?php

namespace App\Imports;

use App\Models\Staff;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
class StaffImport implements ToCollection ,WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
       
        foreach ($rows as $row) {
            Staff::firstOrCreate(
                ['name' => $row[0]], // Assuming 'name' is in the first column (index 0)
                [
                    'designation' => $row[1], // Assuming 'Designation' is in the second column (index 1)
                    'image' => $row[2], // Assuming 'Image' is in the third column (index 2)
                    'sort_id' => $row[3], // Assuming 'Sorting Order' is in the fourth column (index 3)
                    'status' => $row[4], // Assuming 'Status' is in the fifth column (index 4)
                ]
            );
        }
    }
    public function startRow(): int
    {
        return 2;
    }
}
