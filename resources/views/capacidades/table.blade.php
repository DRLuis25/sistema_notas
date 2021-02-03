<div class="table-responsive">
    <table class="table" id="capacidades-table">
        <thead>
            <tr>
                <th>@lang('models/capacidades.fields.periodo_id')</th>
        <th>@lang('models/capacidades.fields.curso_id')</th>
        <th>@lang('models/capacidades.fields.grado_id')</th>
        <th>@lang('models/capacidades.fields.asignatura')</th>
        <th>@lang('models/capacidades.fields.abreviatura')</th>
        <th>@lang('models/capacidades.fields.orden')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($capacidades as $capacidades)
            <tr>
                <td>{{ $capacidades->periodo_id }}</td>
            <td>{{ $capacidades->curso_id }}</td>
            <td>{{ $capacidades->grado_id }}</td>
            <td>{{ $capacidades->asignatura }}</td>
            <td>{{ $capacidades->abreviatura }}</td>
            <td>{{ $capacidades->orden }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['capacidades.destroy', $capacidades->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('capacidades.show', [$capacidades->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('capacidades.edit', [$capacidades->id]) }}" class='btn btn-default btn-xs'>
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
