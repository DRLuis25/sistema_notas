<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSeccionesRequest;
use App\Http\Requests\UpdateSeccionesRequest;
use App\Repositories\SeccionesRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Niveles;
use App\Models\Periodos;
use Illuminate\Http\Request;
use Flash;
use Response;

class SeccionesController extends AppBaseController
{
    /** @var  SeccionesRepository */
    private $seccionesRepository;

    public function __construct(SeccionesRepository $seccionesRepo)
    {
        $this->seccionesRepository = $seccionesRepo;
    }

    /**
     * Display a listing of the Secciones.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $secciones = $this->seccionesRepository->paginate(10);

        return view('secciones.index')
            ->with('secciones', $secciones);
    }

    /**
     * Show the form for creating a new Secciones.
     *
     * @return Response
     */
    public function create()
    {
        $niveles = Niveles::all();
        $periodo = Periodos::where('status','=','1')->first();
        return view('secciones.create',compact('periodo','niveles'));
    }

    /**
     * Store a newly created Secciones in storage.
     *
     * @param CreateSeccionesRequest $request
     *
     * @return Response
     */
    public function store(CreateSeccionesRequest $request)
    {
        $input = $request->all();

        $secciones = $this->seccionesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/secciones.singular')]));

        return redirect(route('secciones.index'));
    }

    /**
     * Display the specified Secciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $secciones = $this->seccionesRepository->find($id);

        if (empty($secciones)) {
            Flash::error(__('messages.not_found', ['model' => __('models/secciones.singular')]));

            return redirect(route('secciones.index'));
        }

        return view('secciones.show')->with('secciones', $secciones);
    }

    /**
     * Show the form for editing the specified Secciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $periodo = Periodos::where('status','=','1')->first();
        $secciones = $this->seccionesRepository->find($id);
        $niveles = Niveles::all();
        $grados = $secciones->grado->nivel->grados;
        if (empty($secciones)) {
            Flash::error(__('messages.not_found', ['model' => __('models/secciones.singular')]));

            return redirect(route('secciones.index'));
        }

        return view('secciones.edit',compact('periodo','niveles','grados'))->with('secciones', $secciones);
    }

    /**
     * Update the specified Secciones in storage.
     *
     * @param int $id
     * @param UpdateSeccionesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeccionesRequest $request)
    {
        $secciones = $this->seccionesRepository->find($id);

        if (empty($secciones)) {
            Flash::error(__('messages.not_found', ['model' => __('models/secciones.singular')]));

            return redirect(route('secciones.index'));
        }

        $secciones = $this->seccionesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/secciones.singular')]));

        return redirect(route('secciones.index'));
    }

    /**
     * Remove the specified Secciones from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $secciones = $this->seccionesRepository->find($id);

        if (empty($secciones)) {
            Flash::error(__('messages.not_found', ['model' => __('models/secciones.singular')]));

            return redirect(route('secciones.index'));
        }

        $this->seccionesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/secciones.singular')]));

        return redirect(route('secciones.index'));
    }
}
