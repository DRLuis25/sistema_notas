<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="evaluaciones-table">
            <thead>
                <tr>
                    <th>@lang('models/matriculas.fields.matricula_id')</th>
                    <th>@lang('models/alumnos.fields.apellidosyNombres')</th>
                    <th colspan="3">Nota</th>
                </tr>
            </thead>
            <tbody>
                @foreach($evaluaciones as $evaluacion)
                <tr>
                    <td>{{ $evaluacion->matricula->nromatricula }}</td>
                    <input type="hidden" name="evaluacion_id[]" value="{{$evaluacion->id}}">
                    <input type="hidden" name="matricula_id[]" value="{{$evaluacion->matricula->id}}">
                    <td>{{ $evaluacion->matricula->alumno->apellidoPaterno }} {{ $evaluacion->matricula->alumno->apellidoMaterno }}, {{ $evaluacion->matricula->alumno->nombres }}</td>
                    <td style="width: 600px"><input id="nota" type="number" class="form-control col-2" name="nota_id[]" maxlength="2" min="0" max="20" value="{{$evaluacion->calificacion}}" required></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer ">
        <button class="btn btn-primary">Enviar</button>
        <a href="{{ route('evaluaciones.index') }}" class="btn btn-default">Volver</a>
    </div>
</div>