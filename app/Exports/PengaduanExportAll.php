<?php

namespace App\Exports;

use App\Models\Pengaduan;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;



class PengaduanExportAll implements  
                                ShouldAutoSize,
                                FromView,
                                WithEvents
{
    use Exportable; 

    public function view(): View
    {
        return view('exports.excel_all', [
            'count_pengaduan' => Pengaduan::where('tujuan_id',1)
                                    ->orWhere('tujuan_id',2)
                                    ->orWhere('tujuan_id',3)
                                    ->orWhere('tujuan_id',4)
                                    ->orWhere('tujuan_id',5)
                                    ->orWhere('tujuan_id',6)
                                    ->orWhere('tujuan_id',7)->count(),
            'pengaduan' => Pengaduan::where('tujuan_id',1)
                                    ->orWhere('tujuan_id',2)
                                    ->orWhere('tujuan_id',3)
                                    ->orWhere('tujuan_id',4)
                                    ->orWhere('tujuan_id',5)
                                    ->orWhere('tujuan_id',6)
                                    ->orWhere('tujuan_id',7)->get(),
            'count_jaringan' => Pengaduan::where('tujuan_id', 1)->count(),
            'count_server' => Pengaduan::where('tujuan_id', 2)->count(),
            'count_sistem_informasi' => Pengaduan::where('tujuan_id', 3)->count(),
            'count_website_unima' => Pengaduan::where('tujuan_id', 4)->count(),
            'count_lms' => Pengaduan::where('tujuan_id', 5)->count(),
            'count_ijazah' => Pengaduan::where('tujuan_id', 6)->count(),
            'count_slip' => Pengaduan::where('tujuan_id', 7)->count(),
            // 'count_lainlain' => Pengaduan::where('tujuan_id', 9)->count(),
            'i' => 1,
            
        ]);
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event){
                $event->sheet->getStyle('B3:C3')->applyFromArray([
                    'font' => ['bold' => true,
                                'size' =>12,
                                ],
                ]);

                $event->sheet->getStyle('A14:G14')->applyFromArray([
                    'font' => ['bold' => true,
                                'size' =>12,
                                ],
                ]);


                $event->sheet->getStyle('B1')->getFill()->applyFromArray([
                    'fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'ababab'],
                ]);

                $event->sheet->getStyle('A12')->getFill()->applyFromArray([
                    'fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'ababab'],
                ]);

                // $event->sheet->getStyle('A3:G3')->getFill()->applyFromArray([
                //     'fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'd6d3d2'],
                // ]);


            }
        ];
    }
}
