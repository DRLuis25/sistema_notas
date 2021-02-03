<div class="table-responsive">
    <table class="table" id="departamentos-table">
        <thead>
            <tr>
                <th>@lang('models/departamentos.fields.nombre')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($departamentos as $departamentos)
            <tr>
                <td>{{ $departamentos->nombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['departamentos.destroy', $departamentos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('departamentos.show', [$departamentos->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('departamentos.edit', [$departamentos->id]) }}" class='btn btn-default btn-xs'>
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
