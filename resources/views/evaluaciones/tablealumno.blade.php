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

        </table>
    </div>
    <div class="card-footer clearfix float-right">
        <div class="float-right">
            @foreach($matricula as $matriculas)
            <tr>
                <td>{{ $matriculas->matriculamaestro->nromatricula }}</td>
                <td>{{ $matriculas->matriculamaestro->alumno->apellidoPaterno }} {{ $matriculas->matriculamaestro->alumno->apellidoMaterno }}, {{ $matriculas->matriculamaestro->alumno->nombres }}</td>
               
            </tr>
        @endforeach
        </div>
    </div>
</div>
