<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDocentesRequest;
use App\Http\Requests\UpdateDocentesRequest;
use App\Repositories\DocentesRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\DepartamentosRepository;
use Illuminate\Http\Request;
use App\Models\Docentes;
use Flash;
use Response;

class DocentesController extends AppBaseController
{
    /** @var  DocentesRepository
     *  @var  DepartamentosRepository
     */
    private $docentesRepository;
    private $departamentosRepository;

    public function __construct(DocentesRepository $docentesRepo, DepartamentosRepository $departamentosRepo)
    {
        $this->middleware('auth');
        $this->docentesRepository = $docentesRepo;
        $this->departamentosRepository = $departamentosRepo;
    }

    /**
     * Display a listing of the Docentes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $BuscarPersonal = $request->get('BuscarPersonal');
        $docentes = Docentes::where('id','!=','0')->where('nombres','like','%'.$BuscarPersonal.'%')->paginate(10);
        
        return view('docentes.index',compact('BuscarPersonal'))
            ->with('docentes', $docentes);
    }

    /**
     * Show the form for creating a new Docentes.
     *
     * @return Response
     */
    public function create()
    {
        $departamentos = $this->departamentosRepository->all();
        return view('docentes.create',compact('departamentos'));
    }

    /**
     * Store a newly created Docentes in storage.
     *
     * @param CreateDocentesRequest $request
     *
     * @return Response
     */
    public function store(CreateDocentesRequest $request)
    {
        $input = $request->all();

        $docentes = $this->docentesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/docentes.singular')]));

        return redirect(route('docentes.index'));
    }

    /**
     * Display the specified Docentes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $docentes = $this->docentesRepository->find($id);

        if (empty($docentes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/docentes.singular')]));

            return redirect(route('docentes.index'));
        }

        return view('docentes.show')->with('docentes', $docentes);
    }

    /**
     * Show the form for editing the specified Docentes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $docentes = $this->docentesRepository->find($id);

        if (empty($docentes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/docentes.singular')]));

            return redirect(route('docentes.index'));
        }

        return view('docentes.edit')->with('docentes', $docentes);
    }

    /**
     * Update the specified Docentes in storage.
     *
     * @param int $id
     * @param UpdateDocentesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocentesRequest $request)
    {
        $docentes = $this->docentesRepository->find($id);

        if (empty($docentes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/docentes.singular')]));

            return redirect(route('docentes.index'));
        }

        $docentes = $this->docentesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/docentes.singular')]));

        return redirect(route('docentes.index'));
    }

    /**
     * Remove the specified Docentes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $docentes = $this->docentesRepository->find($id);

        if (empty($docentes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/docentes.singular')]));

            return redirect(route('docentes.index'));
        }

        $this->docentesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/docentes.singular')]));

        return redirect(route('docentes.index'));
    }
}
