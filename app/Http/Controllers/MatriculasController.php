<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMatriculasRequest;
use App\Http\Requests\UpdateMatriculasRequest;
use App\Repositories\MatriculasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
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
    public function index(Request $request)
    {
        $matriculas = $this->matriculasRepository->paginate(10);

        return view('matriculas.index')
            ->with('matriculas', $matriculas);
    }

    /**
     * Show the form for creating a new Matriculas.
     *
     * @return Response
     */
    public function create()
    {
        return view('matriculas.create');
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

        $matriculas = $this->matriculasRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/matriculas.singular')]));

        return redirect(route('matriculas.index'));
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
        $matriculas = $this->matriculasRepository->find($id);

        if (empty($matriculas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matriculas.singular')]));

            return redirect(route('matriculas.index'));
        }

        return view('matriculas.edit')->with('matriculas', $matriculas);
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
        $matriculas = $this->matriculasRepository->find($id);

        if (empty($matriculas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matriculas.singular')]));

            return redirect(route('matriculas.index'));
        }

        $matriculas = $this->matriculasRepository->update($request->all(), $id);

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
