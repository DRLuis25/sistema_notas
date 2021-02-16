<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCursoGradoRequest;
use App\Http\Requests\UpdateCursoGradoRequest;
use App\Repositories\CursoGradoRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\CursoGrado;
use App\Models\Cursos;
use App\Models\Grados;
use App\Models\Niveles;
use App\Models\Periodos;
use App\Models\Secciones;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash as FlashFlash;
use Response;

class CursoGradoController extends AppBaseController
{
    /** @var  CursoGradoRepository */
    private $cursoGradoRepository;

    public function __construct(CursoGradoRepository $cursoGradoRepo)
    {
        $this->cursoGradoRepository = $cursoGradoRepo;
    }

    /**
     * Display a listing of the CursoGrado.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cursoGrados = $this->cursoGradoRepository->paginate(10);

        return view('curso_grados.index')
            ->with('cursoGrados', $cursoGrados);
    }

    /**
     * Show the form for creating a new CursoGrado.
     *
     * @return Response
     */
    public function create()
    {
        $periodo = Periodos::where('status','=','1')->first();
        //return $periodo;
        $niveles = Niveles::all();
        return view('curso_grados.create',compact(['periodo','niveles']));
    }

    /**
     * Store a newly created CursoGrado in storage.
     *
     * @param CreateCursoGradoRequest $request
     *
     * @return Response
     */
    public function store(CreateCursoGradoRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->all();

            $cursoGrado = $this->cursoGradoRepository->create($input);
    
            Flash::success(__('messages.saved', ['model' => __('models/cursoGrados.singular')]));
            DB::commit();
            return redirect(route('cursoGrados.index'));
        } catch (\Throwable $th) {
            DB::rollback();
            Flash::error(__('messages.rel_exist'));
            return redirect(route('cursoGrados.index'));
        }
        
    }

    /**
     * Display the specified CursoGrado.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cursoGrado = $this->cursoGradoRepository->find($id);

        if (empty($cursoGrado)) {
            Flash::error(__('messages.not_found', ['model' => __('models/cursoGrados.singular')]));

            return redirect(route('cursoGrados.index'));
        }

        return view('curso_grados.show')->with('cursoGrado', $cursoGrado);
    }

    /**
     * Show the form for editing the specified CursoGrado.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cursoGrado = $this->cursoGradoRepository->find($id);

        if (empty($cursoGrado)) {
            Flash::error(__('messages.not_found', ['model' => __('models/cursoGrados.singular')]));

            return redirect(route('cursoGrados.index'));
        }

        return view('curso_grados.edit')->with('cursoGrado', $cursoGrado);
    }

    /**
     * Update the specified CursoGrado in storage.
     *
     * @param int $id
     * @param UpdateCursoGradoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCursoGradoRequest $request)
    {
        $cursoGrado = $this->cursoGradoRepository->find($id);

        if (empty($cursoGrado)) {
            Flash::error(__('messages.not_found', ['model' => __('models/cursoGrados.singular')]));

            return redirect(route('cursoGrados.index'));
        }

        $cursoGrado = $this->cursoGradoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/cursoGrados.singular')]));

        return redirect(route('cursoGrados.index'));
    }

    /**
     * Remove the specified CursoGrado from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cursoGrado = $this->cursoGradoRepository->find($id);

        if (empty($cursoGrado)) {
            Flash::error(__('messages.not_found', ['model' => __('models/cursoGrados.singular')]));

            return redirect(route('cursoGrados.index'));
        }

        $this->cursoGradoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/cursoGrados.singular')]));

        return redirect(route('cursoGrados.index'));
    }
    public function listarGrados(request $request,$id)
    {
        if($request->ajax())
        {
            $grados = Grados::where('nivel_id','=',$id)->get();
            return response()->json($grados);
        }
    }
    public function listarSecciones(request $request,$id)
    {
        if($request->ajax())
        {
            $secciones = Secciones::where('grado_id','=',$id)->get();
            return response()->json($secciones);
        }
    }
    public function listarCursoGrado(request $request,$id)
    {
        if($request->ajax())
        {
            $periodo = Periodos::where('status','=','1')->first();
            $cursos = CursoGrado::join('curso as c','c.id','=','curso_grado.curso_id')->where('grado_id','=',$id)->where('periodo_id','=',$periodo->id)->get();
            return response()->json($cursos);
        }
    }
}
