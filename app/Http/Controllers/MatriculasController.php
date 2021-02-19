<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMatriculasRequest;
use App\Http\Requests\UpdateMatriculasRequest;
use App\Repositories\MatriculasRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Alumnos;
use App\Models\CursoGrado;
use App\Models\Exonerados;
use App\Models\Matriculas;
use App\Models\Niveles;
use App\Models\Periodos;
use App\Models\Secciones;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash as FlashFlash;
use Response;

class MatriculasController extends AppBaseController
{
    /** @var  MatriculasRepository */
    private $matriculasRepository;

    public function __construct(MatriculasRepository $matriculasRepo)
    {
        $this->matriculasRepository = $matriculasRepo;
    }

    /**
     * Display a listing of the Matriculas.
     *
     * @param Request $request
     *
     * @return Response
     */
    const PAGINATION=10;
    public function index(Request $request)
    {
        $periodo = Periodos::where('status','=','1')->first();
        
        try {
            $matriculas = $this->matriculasRepository->buscarperiodo($periodo->id)->paginate(10);
            return view('matriculas.index')
            ->with('matriculas', $matriculas);
        } catch (\Throwable $th) {
            //Flash::error etc
        }

    }

    /**
     * Show the form for creating a new Matriculas.
     *
     * @return Response
     */
    public function create()
    {
        $periodo = Periodos::where('status','=','1')->first();
        $niveles = Niveles::all();
        $alumnos = Alumnos::all();
        return view('matriculas.create',compact(['niveles','alumnos','periodo']));
    }

    /**
     * Store a newly created Matriculas in storage.
     *
     * @param CreateMatriculasRequest $request
     *
     * @return Response
     */
    public function store(CreateMatriculasRequest $request)
    {
        $input = $request->all();
        try {
            //Store matricula Detalle
            DB::beginTransaction();
            $matriculas = new Matriculas();
            $matriculas->matricula_id = $request->matricula_id;
            $matriculas->periodo_id = $request->periodo_id;
            $matriculas->seccion_id = $request->seccion_id;
            $matriculas->observaciones = $request->observaciones;
            $matriculas->save();
            //return $matriculas;
            if(count($input['exonerado'])){
                $exonerados = $input['exonerado'];
                $cont = 0;
                while ($cont<count($exonerados)) {
                    $detalle = new Exonerados();
                    $detalle->matricula_id = $matriculas->matricula_id;
                    $detalle->periodo_id = $matriculas->periodo_id;
                    $detalle->curso_id = $exonerados[$cont];
                    $detalle->save();
                    $cont=$cont+1;
                }
            }
            DB::commit();
            //return $matriculas->exonerados;
            Flash::success(__('messages.saved', ['model' => __('models/matriculas.singular')]));

            return redirect(route('matriculas.index'));
        } catch (\Throwable $th) {
            //Flash::error(__('messages.rel_exist'));

            //return redirect(route('matriculas.index'));
            dd($th);
        }
    }

    /**
     * Display the specified Matriculas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $matriculas = $this->matriculasRepository->find($id);

        if (empty($matriculas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matriculas.singular')]));

            return redirect(route('matriculas.index'));
        }

        return view('matriculas.show')->with('matriculas', $matriculas);
    }

    /**
     * Show the form for editing the specified Matriculas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $periodo = Periodos::where('status','=','1')->first();
        $matriculas = Matriculas::where('matricula_id','=',$id)->where('periodo_id','=',$periodo->id)->first();
        $secciones = Secciones::where('id','=',$matriculas->seccion_id)->first()->grado->secciones;
        $exonerados = CursoGrado::join('curso as c','c.id','=','curso_grado.curso_id')->where('grado_id','=',Secciones::where('id','=',$matriculas->seccion_id)->first()->grado->id)->where('periodo_id','=',$periodo->id)->get();
        if (empty($matriculas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matriculas.singular')]));

            return redirect(route('matriculas.index'));
        }
        return view('matriculas.edit',compact(['periodo','secciones','exonerados']))->with('matriculas', $matriculas);
    }

    /**
     * Update the specified Matriculas in storage.
     *
     * @param int $id
     * @param UpdateMatriculasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMatriculasRequest $request)
    {
        $periodo = Periodos::where('status','=','1')->first();
        $matriculas = Matriculas::where('matricula_id','=',$id)->where('periodo_id','=',$periodo->id)->first();

        if (empty($matriculas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matriculas.singular')]));

            return redirect(route('matriculas.index'));
        }
        //Guardar cambios;
        //return $matriculas;
        $matriculas->seccion_id = $request->seccion_id;
        $matriculas->observaciones = $request->observaciones;
        $matriculas->save();
        //actualizar exonerados


        Flash::success(__('messages.updated', ['model' => __('models/matriculas.singular')]));

        return redirect(route('matriculas.index'));
    }

    /**
     * Remove the specified Matriculas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $matriculas = $this->matriculasRepository->find($id);

        if (empty($matriculas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matriculas.singular')]));

            return redirect(route('matriculas.index'));
        }

        $this->matriculasRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/matriculas.singular')]));

        return redirect(route('matriculas.index'));
    }
}
