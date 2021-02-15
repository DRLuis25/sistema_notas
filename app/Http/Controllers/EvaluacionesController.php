<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEvaluacionesRequest;
use App\Http\Requests\UpdateEvaluacionesRequest;
use App\Repositories\EvaluacionesRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Niveles;
use App\Models\Periodos;
use App\Models\Evaluaciones;
use Illuminate\Http\Request;
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
        $BuscarEvaluaciones = $request->get('BuscarEvaluaciones');
        $evaluaciones = Evaluaciones::where('matricula_id','!=','0')->where('matricula_id','like','%'.$BuscarEvaluaciones.'%')->paginate(10);

        return view('evaluaciones.index',compact('BuscarEvaluaciones'))
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
        return view('evaluaciones.create',compact(['periodo','niveles']));
    }

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
    public function show($id)
    {
        $evaluaciones = $this->evaluacionesRepository->find($id);

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
