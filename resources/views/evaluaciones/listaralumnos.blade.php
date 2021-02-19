<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="evaluaciones-table">
            <thead>
                <tr>
                    <th>@lang('models/matriculas.fields.matricula_id')</th>
                    <th>@lang('models/alumnos.fields.apellidosyNombres')</th>
                    <th >Nota</th>
                </tr>
            </thead>
            <tbody>
                @foreach($evaluaciones as $evaluacion)
                <tr>
                    <td>{{ $evaluacion->matricula->nromatricula }}</td>
                    <td>{{ $evaluacion->matricula->alumno->apellidoPaterno }} {{ $evaluacion->matricula->alumno->apellidoMaterno }}, {{ $evaluacion->matricula->alumno->nombres }}</td>
                    <td><input type="text" class="form-control col-2" value="{{$evaluacion->calificacion}}" disabled></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">

        <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
    </div>
</div>