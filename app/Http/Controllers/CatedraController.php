<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatedraRequest;
use App\Http\Requests\UpdateCatedraRequest;
use App\Repositories\CatedraRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Docentes;
use App\Models\Niveles;
use App\Models\Periodos;
use App\Models\Catedra;
use Illuminate\Http\Request;
use Flash;
use Response;

class CatedraController extends AppBaseController
{
    /** @var  CatedraRepository */
    private $catedraRepository;

    public function __construct(CatedraRepository $catedraRepo)
    {
        $this->catedraRepository = $catedraRepo;
    }

    /**
     * Display a listing of the Catedra.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $BuscarCatedras = $request->get('BuscarCatedras');
        $catedras = Catedra::where('docente_id','!=','0')->where('docente_id','like','%'.$BuscarCatedras.'%')->paginate(10);

        return view('catedras.index',compact('BuscarCatedras'))
            ->with('catedras', $catedras);
    }

    /**
     * Show the form for creating a new Catedra.
     *
     * @return Response
     */
    public function create()
    {
        $periodo = Periodos::where('status','=','1')->first();
        $docentes = Docentes::all();
        $niveles = Niveles::all();
        return view('catedras.create',compact(['periodo','docentes','niveles']));
    }

    /**
     * Store a newly created Catedra in storage.
     *
     * @param CreateCatedraRequest $request
     *
     * @return Response
     */
    public function store(CreateCatedraRequest $request)
    {
        $input = $request->all();

        $catedra = $this->catedraRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/catedras.singular')]));

        return redirect(route('catedras.index'));
    }

    /**
     * Display the specified Catedra.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catedra = $this->catedraRepository->find($id);

        if (empty($catedra)) {
            Flash::error(__('messages.not_found', ['model' => __('models/catedras.singular')]));

            return redirect(route('catedras.index'));
        }

        return view('catedras.show')->with('catedra', $catedra);
    }

    /**
     * Show the form for editing the specified Catedra.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catedra = $this->catedraRepository->find($id);

        if (empty($catedra)) {
            Flash::error(__('messages.not_found', ['model' => __('models/catedras.singular')]));

            return redirect(route('catedras.index'));
        }

        return view('catedras.edit')->with('catedra', $catedra);
    }

    /**
     * Update the specified Catedra in storage.
     *
     * @param int $id
     * @param UpdateCatedraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCatedraRequest $request)
    {
        $catedra = $this->catedraRepository->find($id);

        if (empty($catedra)) {
            Flash::error(__('messages.not_found', ['model' => __('models/catedras.singular')]));

            return redirect(route('catedras.index'));
        }

        $catedra = $this->catedraRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/catedras.singular')]));

        return redirect(route('catedras.index'));
    }

    /**
     * Remove the specified Catedra from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catedra = $this->catedraRepository->find($id);

        if (empty($catedra)) {
            Flash::error(__('messages.not_found', ['model' => __('models/catedras.singular')]));

            return redirect(route('catedras.index'));
        }

        $this->catedraRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/catedras.singular')]));

        return redirect(route('catedras.index'));
    }
}
