<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\OurTopper;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromArray;
use PhpOffice\PhpSpreadsheet\Style\Protection;
class ExportTopper implements FromCollection, WithHeadings , ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $selectedFields;
    protected $customHeadings;
    public function __construct(array $selectedFields, array $customHeadings)
    {
        $this->selectedFields = $selectedFields;
        $this->customHeadings = $customHeadings;
    }
    public function collection()
    {
        return OurTopper::select($this->selectedFields)->get(); // Replace 'Example' with your model
    }

    public function headings(): array
    {
        return $this->customHeadings;
    }
    public function styles(Worksheet $sheet)
    {
        // Make sure you enable worksheet protection if you need any of the worksheet or cell protection features!
        // $sheet->getParent()->getActiveSheet()->getProtection()->setSheet(true);
        
        // // lock all cells then unlock the cell
        // $sheet->getParent()->getActiveSheet()
        //     ->getStyle('A2:Z1000')
        //     ->getProtection()
        //     ->setLocked(Protection::PROTECTION_UNPROTECTED);

        // styling first row
        $sheet->getStyle(1)->getFont()->setBold(true);
    }
}
