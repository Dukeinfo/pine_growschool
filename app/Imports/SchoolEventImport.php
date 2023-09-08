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
            // Convert the Excel date to a Carbon instance and format it as 'd-m-Y'
            $excelDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[0]);
            $formattedDate = $excelDate->format('d-m-Y');
        // dd($formattedDate);
            SchoolCalendar::firstOrCreate(
                ['date' => $formattedDate], 
                [
                    // 'date' => date($row[0]),
                    'event' => $row[1], 
                    'sort_id' => $row[2], 
                    'status' => $row[3], 
                ]
            );
        }
    }
    public function startRow(): int
    {
        return 2;
    }
}
