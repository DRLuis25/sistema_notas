<div class="table-responsive">
    <table class="table" id="matriculas-table">
        <thead>
            <tr>
                <th>@lang('models/matriculas.fields.matricula_id')</th>
        <th>@lang('models/matriculas.fields.periodo_id')</th>
        <th>@lang('models/matriculas.fields.seccion_id')</th>
        <th>@lang('models/matriculas.fields.observaciones')</th>
        <th>@lang('models/matriculas.fields.exonerado')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($matriculas as $matriculas)
            <tr>
                <td>{{ $matriculas->matricula_id }}</td>
            <td>{{ $matriculas->periodo_id }}</td>
            <td>{{ $matriculas->seccion_id }}</td>
            <td>{{ $matriculas->observaciones }}</td>
            <td>{{ $matriculas->exonerado }}</td>
                <td width="120">
                    <!--arreglar el id para las acciones-->
                    {!! Form::open(['route' => ['matriculas.destroy', $matriculas->matricula_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('matriculas.show', [$matriculas->matricula_id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('matriculas.edit', [$matriculas->matricula_id]) }}" class='btn btn-default btn-xs'>
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
