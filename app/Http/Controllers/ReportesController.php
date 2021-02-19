<?php

namespace App\Http\Controllers;

use App\Models\Niveles;
use App\Models\Periodos;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodos = Periodos::all();
        $niveles = Niveles::all();
        return view('reportes.index',compact('periodos','niveles'));
    }
}