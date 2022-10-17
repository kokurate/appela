<?php

namespace App\Http\Controllers;

use App\Exports\PengaduanExportAll;
use App\Exports\PengaduanMultiSheetExport;
use App\Exports\PengaduansExport;
use Illuminate\Http\Request;
// use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel;

class PengaduansExportController extends Controller
{
    private $excel;
    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    public function excel_monthly(Excel $excel)
    {
        return 
        $this->excel->download(new PengaduanMultiSheetExport(2022),'Data Pengaduan Bulanan.xlsx');

    }

    public function excel_all()
    {
        return
        $this->excel->download(new PengaduanExportAll,'Data Pengaduan.xlsx');
    }

}
    