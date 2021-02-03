<div class="table-responsive">
    <table class="table" id="periodos-table">
        <thead>
            <tr>
                <th>@lang('models/periodos.fields.nombre')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($periodos as $periodos)
            <tr>
                <td>{{ $periodos->nombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['periodos.destroy', $periodos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('periodos.show', [$periodos->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('periodos.edit', [$periodos->id]) }}" class='btn btn-default btn-xs'>
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
