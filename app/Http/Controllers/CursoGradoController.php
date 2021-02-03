<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCursoGradoRequest;
use App\Http\Requests\UpdateCursoGradoRequest;
use App\Repositories\CursoGradoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
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
        return view('curso_grados.create');
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
        $input = $request->all();

        $cursoGrado = $this->cursoGradoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/cursoGrados.singular')]));

        return redirect(route('cursoGrados.index'));
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
}
