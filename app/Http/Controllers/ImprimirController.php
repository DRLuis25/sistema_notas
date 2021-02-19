<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportesExport;
use App\Models\Capacidades;
use App\Models\Evaluaciones;
use App\Exports\Multiple;

class ImprimirController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ImprimirExcel(Request $request) {
        //return $request;
        //return Excel::download(new ReportesExport($request), 'reportes.xlsx');
        return (new Multiple($request))->download('reportes.xlsx');
    }
    public function test(Type $var = null)
    {
        
        $capacidades = Capacidades::where('periodo_id','=','1')->where('grado_id','=','1')->where('curso_id','=','1')->get();
        return $capacidades;
        foreach ($capacidades as $capacidad) {
            $res[]=$evaluaciones = Evaluaciones::where('periodo_id','=','1')->where('bimestre_id','=','1')->where('capacidad_id','=',$capacidad->id)->get();
        }
        
        return $res[0];
    }
}