<?php

namespace App\Exports;

use App\Models\Pengaduan;
use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;

class PengaduansExport implements 
                                FromView,
                                ShouldAutoSize,
                                WithEvents,
                                WithCustomStartCell,
                                WithTitle
{
    use Exportable;  
   
    private $year;
    private $month;

    public function __construct(int $year, int $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function view(): View
    {
        return view('exports.excel', [
            'pengaduan' => Pengaduan::WhereYear('updated_at', $this->year)
                                        ->WhereMonth('updated_at', $this->month)
                                        ->with('tujuan')->get(),
            'i' => 1,
            'month' => DateTime::createFromFormat('!m', $this->month)->format('F'),
            'year' => Carbon::now()->year,
        ]);
    } 

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event){
                $event->sheet->getStyle('A1:G2')->applyFromArray([
                    'font' => ['bold' => true,
                                'size' =>16,
                                ],
                    'borders' => [
                            'outline' => [
                                // 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '000000'],
                            ],
                        ]
                ]);
              
                $event->sheet->getStyle('A3:G3')->applyFromArray([
                    'font' => ['bold' => true,
                                'size' =>12,
                                ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);

                // $event->sheet->getStyle('A3:G200')->applyFromArray([
                //     'borders' => [
                //         'allBorders' => [
                //             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                //             'color' => ['argb' => '000000'],
                //         ],
                //     ],
                // ]);

                // $event->sheet->getStyle('A1:G1')->getFill()->applyFromArray([
                //     'fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'c2bfbe'],
                // ]);
                // $event->sheet->getStyle('A3:G3')->getFill()->applyFromArray([
                //     'fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'd6d3d2'],
                // ]);


            }
        ];
    }


    public function startCell(): string
    {
        return 'A3';
    }

    public function title(): string
    {
        return DateTime::createFromFormat('!m', $this->month)->format('F');
    }

}
