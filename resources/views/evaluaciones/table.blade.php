<div class="table-responsive">
    <table class="table" id="evaluaciones-table">
        <thead>
            <tr>
                <th>@lang('models/evaluaciones.fields.periodo_id')</th>
                <th>Curso</th>
                <th>@lang('models/evaluaciones.fields.bimestre_id')</th>
                <th>@lang('models/evaluaciones.fields.capacidad_id')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($evaluaciones as $evaluacion)
            <tr>
                <td>{{ $evaluacion->periodo->nombre }}</td>
                <td>{{ $evaluacion->capacidad->curso->nombre }}</td>
                <td>{{ $evaluacion->bimestre->nombre }}</td>
                <td>{{ $evaluacion->capacidad->asignatura }}</td>
                <td width="120">
                    <div class='btn-group'>
                        <a href="{{ route('evaluaciones.listar', ['periodo_id'=>$evaluacion->periodo_id,'bimestre_id'=>$evaluacion->bimestre_id,'capacidad_id'=>$evaluacion->capacidad_id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('evaluaciones.editar', ['periodo_id'=>$evaluacion->periodo_id,'bimestre_id'=>$evaluacion->bimestre_id,'capacidad_id'=>$evaluacion->capacidad_id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
