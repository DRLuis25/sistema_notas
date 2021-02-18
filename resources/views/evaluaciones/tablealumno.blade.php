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
                @foreach($matriculas as $matricula)
                <tr>
                    <td>{{ $matricula->matriculamaestro->nromatricula }}</td>
                    <input type="hidden" name="matricula_id[]" value="{{$matricula->matricula_id}}">
                    <td>{{ $matricula->matriculamaestro->alumno->apellidoPaterno }} {{ $matricula->matriculamaestro->alumno->apellidoMaterno }}, {{ $matricula->matriculamaestro->alumno->nombres }}</td>
                    <td><input type="text" class="form-control col-2" name="nota_id[]" maxlength="2" min="0" max="20"></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix float-right">
        <div class="float-right">
            
        </div>
        <button class="btn btn-primary">Enviar</button>
    </div>
</div>