<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePeriodosRequest;
use App\Http\Requests\UpdatePeriodosRequest;
use App\Repositories\PeriodosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PeriodosController extends AppBaseController
{
    /** @var  PeriodosRepository */
    private $periodosRepository;

    public function __construct(PeriodosRepository $periodosRepo)
    {
        $this->middleware('auth');
        $this->periodosRepository = $periodosRepo;
    }

    /**
     * Display a listing of the Periodos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $periodos = $this->periodosRepository->all();

        return view('periodos.index')
            ->with('periodos', $periodos);
    }

    /**
     * Show the form for creating a new Periodos.
     *
     * @return Response
     */
    public function create()
    {
        return view('periodos.create');
    }

    /**
     * Store a newly created Periodos in storage.
     *
     * @param CreatePeriodosRequest $request
     *
     * @return Response
     */
    public function store(CreatePeriodosRequest $request)
    {
        $input = $request->all();

        $periodos = $this->periodosRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/periodos.singular')]));

        return redirect(route('periodos.index'));
    }

    /**
     * Display the specified Periodos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $periodos = $this->periodosRepository->find($id);

        if (empty($periodos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/periodos.singular')]));

            return redirect(route('periodos.index'));
        }

        return view('periodos.show')->with('periodos', $periodos);
    }

    /**
     * Show the form for editing the specified Periodos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $periodos = $this->periodosRepository->find($id);

        if (empty($periodos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/periodos.singular')]));

            return redirect(route('periodos.index'));
        }

        return view('periodos.edit')->with('periodos', $periodos);
    }

    /**
     * Update the specified Periodos in storage.
     *
     * @param int $id
     * @param UpdatePeriodosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePeriodosRequest $request)
    {
        $periodos = $this->periodosRepository->find($id);

        if (empty($periodos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/periodos.singular')]));

            return redirect(route('periodos.index'));
        }

        $periodos = $this->periodosRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/periodos.singular')]));

        return redirect(route('periodos.index'));
    }

    /**
     * Remove the specified Periodos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $periodos = $this->periodosRepository->find($id);

        if (empty($periodos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/periodos.singular')]));

            return redirect(route('periodos.index'));
        }

        $this->periodosRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/periodos.singular')]));

        return redirect(route('periodos.index'));
    }
}
