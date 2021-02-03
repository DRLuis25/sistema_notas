<div class="table-responsive">
    <table class="table" id="evaluaciones-table">
        <thead>
            <tr>
                <th>@lang('models/evaluaciones.fields.matricula_id')</th>
        <th>@lang('models/evaluaciones.fields.periodo_id')</th>
        <th>@lang('models/evaluaciones.fields.bimestre_id')</th>
        <th>@lang('models/evaluaciones.fields.capacidad_id')</th>
        <th>@lang('models/evaluaciones.fields.calificacion')</th>
        <th>@lang('models/evaluaciones.fields.observaciones')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($evaluaciones as $evaluaciones)
            <tr>
                <td>{{ $evaluaciones->matricula_id }}</td>
            <td>{{ $evaluaciones->periodo_id }}</td>
            <td>{{ $evaluaciones->bimestre_id }}</td>
            <td>{{ $evaluaciones->capacidad_id }}</td>
            <td>{{ $evaluaciones->calificacion }}</td>
            <td>{{ $evaluaciones->observaciones }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['evaluaciones.destroy', $evaluaciones->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('evaluaciones.show', [$evaluaciones->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('evaluaciones.edit', [$evaluaciones->id]) }}" class='btn btn-default btn-xs'>
                        <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
