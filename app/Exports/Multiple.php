<?php
namespace App\Exports;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Facades\Excel;
class Multiple implements WithMultipleSheets
{
    use Exportable;

    protected $request;
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        if ($this->request->tiporesumen==1) {
            $sheets = [];
            $sheets[] = new ReportesExport('1',$this->request);
            return $sheets;
            return Excel::download(new ReportesExport('1',$this->request), 'reportes.xlsx');
        }
        elseif ($this->request->tiporesumen==2) {
            $sheets = [];
            $sheets[] = new ReportesExport('1',$this->request);
            $sheets[] = new ReportesExport('2',$this->request);
            return $sheets;
        }
        else {
            $sheets = [];
            $sheets[] = new ReportesExport('1',$this->request);
            $sheets[] = new ReportesExport('2',$this->request);
            $sheets[] = new ReportesExport('3',$this->request);
            $sheets[] = new ReportesExport('4',$this->request);
            return $sheets;
        }       
    }
}