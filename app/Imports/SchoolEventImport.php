<?php

namespace App\Imports;

use App\Models\SchoolCalendar;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Carbon;
class SchoolEventImport implements ToCollection ,WithStartRow
{

    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {


            SchoolCalendar::firstOrCreate(
                ['date' => Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[0]))
], // Assuming 'date' is in the first column (index 0)
                [
                    'event' => $row[1], // Assuming 'event' is in the second column (index 1)
                    'sort_id' => $row[2], // Assuming 'Sorting Order' is in the fourth column (index 3)
                    'status' => $row[3], // Assuming 'Status' is in the fifth column (index 4)



                ]
            );
        }
    }
    public function startRow(): int
    {
        return 2;
    }
}
