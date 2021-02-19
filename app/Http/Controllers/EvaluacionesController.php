<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEvaluacionesRequest;
use App\Http\Requests\UpdateEvaluacionesRequest;
use App\Repositories\EvaluacionesRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Niveles;
use App\Models\Periodos;
use App\Models\Bimestres;
use App\Models\Capacidades;
use App\Models\Cursos;
use App\Models\Evaluaciones;
use App\Models\Grados;

use App\Models\MatriculaMaestro;
use App\Models\Matriculas;
use App\Models\Secciones;
use Illuminate\Http\Request;
use DB;
use Flash;
use Response;

class EvaluacionesController extends AppBaseController
{
    /** @var  EvaluacionesRepository */
    private $evaluacionesRepository;

    public function __construct(EvaluacionesRepository $evaluacionesRepo)
    {
        $this->evaluacionesRepository = $evaluacionesRepo;
    }

    /**
     * Display a listing of the Evaluaciones.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $evaluaciones = Evaluaciones::select('periodo_id','bimestre_id','capacidad_id')->distinct()->get();
        //$evaluaciones = $this->evaluacionesRepository->paginate(10);
        return view('evaluaciones.index')
            ->with('evaluaciones', $evaluaciones);
    }

    /**
     * Show the form for creating a new Evaluaciones.
     *
     * @return Response
     */
    public function create()
    {
        $periodo = Periodos::where('status','=','1')->first();
        $niveles = Niveles::all();
        $bimestre= Bimestres::all();
        $curso=Cursos::all();
        return view('evaluaciones.create',compact(['periodo','niveles','bimestre','curso']));
    }

    public function listar(Request $request)
    {
        //return $request;
        $evaluaciones = Evaluaciones::where('periodo_id','=',$request->periodo_id)->where('bimestre_id','=',$request->bimestre_id)->where('capacidad_id','=',$request->capacidad_id)->get();
        //return $evaluaciones;
        // $periodo = Periodos::where('id','=',$request->periodo_id)->first();
        // $bimestre = Bimestres::where('id','=',$request->bimestre_id)->first();
        // $capacidad = Capacidades::where('id','=',$request->capacidad_id)->first();
        $niveles = Niveles::where('id','=',$request->nivel_id)->first();
        $grado = Grados::where('id','=',$request->grado_id)->first();
        $seccion = Secciones::where('id','=',$request->seccion_id)->first();
        $curso = Cursos::where('id','=',$request->curso_id)->first();
        return view('evaluaciones.show',compact(['evaluaciones']));
    
    }

    public function editar(Request $request)
    {
        //return $request;
        $evaluaciones = Evaluaciones::where('periodo_id','=',$request->periodo_id)->where('bimestre_id','=',$request->bimestre_id)->where('capacidad_id','=',$request->capacidad_id)->get();
        //return $evaluaciones;
        $matriculas = Matriculas::where('periodo_id','=',$evaluaciones[0]->periodo->id)->where('seccion_id','=',$evaluaciones[0]->matriculadetalle->seccion->id)->get();
        return view('evaluaciones.edit',compact(['evaluaciones','matriculas']));

    }
    public function actualizarnotas(Request $request)
    {
        //return $request;
        try{
            DB::beginTransaction();
            $cont=0;
            $evaluacion_id = $request->get('evaluacion_id');
            $nota_id = $request->get('nota_id');
            while ($cont < count($evaluacion_id)) {
                $evaluaciones = Evaluaciones::where('id','=',$evaluacion_id[$cont])->first();
                $evaluaciones->calificacion = $nota_id[$cont];
                $evaluaciones->save();
                $cont=$cont+1;
            }
            DB::commit();
            Flash::success('Notas actualizadas');
            return redirect(route('evaluaciones.index'));
        }catch (Exception $e) {
            DB::rollback();
            dd($e);
        }     

    }
    public function listarAlumnos(Request $request)
    {
        //return $request;
        $periodo = Periodos::where('status','=','1')->first();
        $niveles = Niveles::where('id','=',$request->nivel_id)->first();
        $grado = Grados::where('id','=',$request->grado_id)->first();
        $seccion = Secciones::where('id','=',$request->seccion_id)->first();
        $curso = Cursos::where('id','=',$request->curso_id)->first();
        $bimestre = Bimestres::where('id','=',$request->bimestre_id)->first();
        $capacidad = Capacidades::where('id','=',$request->capacidad_id)->first();
        $matriculas = Matriculas::where('periodo_id','=',$periodo->id)->where('seccion_id','=',$seccion->id)->get();
        return view('evaluaciones.indexalumno',compact(['periodo','niveles','grado','seccion','curso','bimestre','capacidad','matriculas']));
    }
    public function registrarnotas(Request $request)
    {
        try{
            //return $request;
            DB::beginTransaction();
            $cont=0;
            $periodo_id = $request->get('periodo_id');
            $bimestre_id = $request->get('bimestre_id');
            $capacidad_id = $request->get('capacidad_id');
            $matricula_id = $request->get('matricula_id');
            $nota_id = $request->get('nota_id');
            while ($cont < count($matricula_id)) {
                $evaluaciones= new Evaluaciones();
                $evaluaciones->matricula_id = $matricula_id[$cont];
                $evaluaciones->periodo_id = $periodo_id;
                $evaluaciones->bimestre_id = $bimestre_id;
                $evaluaciones->capacidad_id = $capacidad_id;
                $evaluaciones->calificacion = $nota_id[$cont];
                $evaluaciones->save();
                //return $evaluaciones;
                $cont=$cont+1;
            }
            DB::commit();
            Flash::success('Notas registradas');
            return redirect(route('evaluaciones.index'));
        }catch (Exception $e) {
            DB::rollback();
            dd($e);
        }     
       
    }
    //No se utiliza
    /**
     * Store a newly created Evaluaciones in storage.
     *
     * @param CreateEvaluacionesRequest $request
     *
     * @return Response
     */
    public function store(CreateEvaluacionesRequest $request)
    {
        $input = $request->all();

        $evaluaciones = $this->evaluacionesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/evaluaciones.singular')]));

        return redirect(route('evaluaciones.index'));
    }

    /**
     * Display the specified Evaluaciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(Request $request)
    {
        return $request;
        //$evaluaciones = $this->evaluacionesRepository->find($id);

        if (empty($evaluaciones)) {
            Flash::error(__('messages.not_found', ['model' => __('models/evaluaciones.singular')]));

            return redirect(route('evaluaciones.index'));
        }

        return view('evaluaciones.show')->with('evaluaciones', $evaluaciones);
    }
    /**
     * Show the form for editing the specified Evaluaciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $evaluaciones = $this->evaluacionesRepository->find($id);

        if (empty($evaluaciones)) {
            Flash::error(__('messages.not_found', ['model' => __('models/evaluaciones.singular')]));

            return redirect(route('evaluaciones.index'));
        }

        return view('evaluaciones.edit')->with('evaluaciones', $evaluaciones);
    }

    /**
     * Update the specified Evaluaciones in storage.
     *
     * @param int $id
     * @param UpdateEvaluacionesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEvaluacionesRequest $request)
    {
        $evaluaciones = $this->evaluacionesRepository->find($id);

        if (empty($evaluaciones)) {
            Flash::error(__('messages.not_found', ['model' => __('models/evaluaciones.singular')]));

            return redirect(route('evaluaciones.index'));
        }

        $evaluaciones = $this->evaluacionesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/evaluaciones.singular')]));

        return redirect(route('evaluaciones.index'));
    }

    /**
     * Remove the specified Evaluaciones from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $evaluaciones = $this->evaluacionesRepository->find($id);

        if (empty($evaluaciones)) {
            Flash::error(__('messages.not_found', ['model' => __('models/evaluaciones.singular')]));

            return redirect(route('evaluaciones.index'));
        }

        $this->evaluacionesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/evaluaciones.singular')]));

        return redirect(route('evaluaciones.index'));
    }
}