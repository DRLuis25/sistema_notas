<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCapacidadesRequest;
use App\Http\Requests\UpdateCapacidadesRequest;
use App\Repositories\CapacidadesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CapacidadesController extends AppBaseController
{
    /** @var  CapacidadesRepository */
    private $capacidadesRepository;

    public function __construct(CapacidadesRepository $capacidadesRepo)
    {
        $this->capacidadesRepository = $capacidadesRepo;
    }

    /**
     * Display a listing of the Capacidades.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $capacidades = $this->capacidadesRepository->paginate(10);

        return view('capacidades.index')
            ->with('capacidades', $capacidades);
    }

    /**
     * Show the form for creating a new Capacidades.
     *
     * @return Response
     */
    public function create()
    {
        return view('capacidades.create');
    }

    /**
     * Store a newly created Capacidades in storage.
     *
     * @param CreateCapacidadesRequest $request
     *
     * @return Response
     */
    public function store(CreateCapacidadesRequest $request)
    {
        $input = $request->all();

        $capacidades = $this->capacidadesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/capacidades.singular')]));

        return redirect(route('capacidades.index'));
    }

    /**
     * Display the specified Capacidades.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $capacidades = $this->capacidadesRepository->find($id);

        if (empty($capacidades)) {
            Flash::error(__('messages.not_found', ['model' => __('models/capacidades.singular')]));

            return redirect(route('capacidades.index'));
        }

        return view('capacidades.show')->with('capacidades', $capacidades);
    }

    /**
     * Show the form for editing the specified Capacidades.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $capacidades = $this->capacidadesRepository->find($id);

        if (empty($capacidades)) {
            Flash::error(__('messages.not_found', ['model' => __('models/capacidades.singular')]));

            return redirect(route('capacidades.index'));
        }

        return view('capacidades.edit')->with('capacidades', $capacidades);
    }

    /**
     * Update the specified Capacidades in storage.
     *
     * @param int $id
     * @param UpdateCapacidadesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCapacidadesRequest $request)
    {
        $capacidades = $this->capacidadesRepository->find($id);

        if (empty($capacidades)) {
            Flash::error(__('messages.not_found', ['model' => __('models/capacidades.singular')]));

            return redirect(route('capacidades.index'));
        }

        $capacidades = $this->capacidadesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/capacidades.singular')]));

        return redirect(route('capacidades.index'));
    }

    /**
     * Remove the specified Capacidades from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $capacidades = $this->capacidadesRepository->find($id);

        if (empty($capacidades)) {
            Flash::error(__('messages.not_found', ['model' => __('models/capacidades.singular')]));

            return redirect(route('capacidades.index'));
        }

        $this->capacidadesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/capacidades.singular')]));

        return redirect(route('capacidades.index'));
    }
}
