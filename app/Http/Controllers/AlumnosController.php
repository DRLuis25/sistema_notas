<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlumnosRequest;
use App\Http\Requests\UpdateAlumnosRequest;
use App\Repositories\AlumnosRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Alumnos;
use App\Models\MatriculaMaestro;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class AlumnosController extends AppBaseController
{
    /** @var  AlumnosRepository */
    private $alumnosRepository;

    public function __construct(AlumnosRepository $alumnosRepo)
    {
        $this->alumnosRepository = $alumnosRepo;
    }

    /**
     * Display a listing of the Alumnos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $BuscarAlumnos = $request->get('BuscarAlumnos');
        $alumnos = Alumnos::where('nombres','like','%'.$BuscarAlumnos.'%')->paginate(10);

        return view('alumnos.index',compact('BuscarAlumnos'))
            ->with('alumnos', $alumnos);
    }

    /**
     * Show the form for creating a new Alumnos.
     *
     * @return Response
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created Alumnos in storage.
     *
     * @param CreateAlumnosRequest $request
     *
     * @return Response
     */
    public function store(CreateAlumnosRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $alumnos = $this->alumnosRepository->create($input);
            //Generar matricula
            $matricula = new MatriculaMaestro();
            $matricula->nromatricula = $alumnos->dni.substr(date("Y"),-2);
            $matricula->alumno_id = $alumnos->id;
            $matricula->save();
            DB::commit();
            Flash::success(__('messages.saved', ['model' => __('models/alumnos.singular')]));
            return redirect(route('alumnos.index'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified Alumnos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $alumnos = $this->alumnosRepository->find($id);

        if (empty($alumnos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/alumnos.singular')]));

            return redirect(route('alumnos.index'));
        }

        return view('alumnos.show')->with('alumnos', $alumnos);
    }

    /**
     * Show the form for editing the specified Alumnos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $alumnos = $this->alumnosRepository->find($id);

        if (empty($alumnos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/alumnos.singular')]));

            return redirect(route('alumnos.index'));
        }

        return view('alumnos.edit')->with('alumnos', $alumnos);
    }

    /**
     * Update the specified Alumnos in storage.
     *
     * @param int $id
     * @param UpdateAlumnosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlumnosRequest $request)
    {
        $alumnos = $this->alumnosRepository->find($id);

        if (empty($alumnos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/alumnos.singular')]));

            return redirect(route('alumnos.index'));
        }

        $alumnos = $this->alumnosRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/alumnos.singular')]));

        return redirect(route('alumnos.index'));
    }

    /**
     * Remove the specified Alumnos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $alumnos = $this->alumnosRepository->find($id);

        if (empty($alumnos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/alumnos.singular')]));

            return redirect(route('alumnos.index'));
        }

        $this->alumnosRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/alumnos.singular')]));

        return redirect(route('alumnos.index'));
    }
    public function listarNroMatricula(request $request,$id)
    {
        if($request->ajax())
        {
            $matricula = MatriculaMaestro::where('alumno_id','=',$id)->first();
            return response()->json($matricula);
        }
    }
}
