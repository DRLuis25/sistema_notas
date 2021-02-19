<?php

namespace App\Exports;

use App\Models\Alumnos;
use App\Models\Capacidades;
use App\Models\Cursos;
use App\Models\Evaluaciones;
use App\Models\Grados;
use App\Models\Periodos;
use App\Models\Secciones;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportesExport implements FromView
{
    protected $bimestre;
    protected $request;
    public function __construct($bimestre, Request $request = null) {
        $this->bimestre = $bimestre;
        $this->request = $request;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $periodo=Periodos::where('id','=',$this->request->periodo_id)->first();
        //Nivel
        $docente = User::where('id','=',$this->request->docente_id)->first();
        $seccion = Secciones::where('id','=',$this->request->seccion_id)->first();
        $curso = Cursos::where('id','=',$this->request->curso_id)->first();
        $grado = Grados::where('id','=',$this->request->grado_id)->first();
        $capacidades = Capacidades::where('periodo_id','=',$periodo->id)->where('grado_id','=',$grado->id)->where('curso_id','=',$curso->id)->get();
        foreach ($capacidades as $capacidad) {
            $res[]=$evaluaciones = Evaluaciones::where('periodo_id','=','1')->where('bimestre_id','=',$this->bimestre)->where('capacidad_id','=',$capacidad->id)->get();
        }
        //return $res;
        return view('reportes.indexExcel',compact(['periodo','grado','seccion','curso','docente','res','capacidades']));
    }
}