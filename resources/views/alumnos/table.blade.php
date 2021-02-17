<div class="table-responsive">
    <table class="table" id="alumnos-table">
        <thead>
            <tr>
                <th>@lang('models/alumnos.fields.dni')</th>
                <th>@lang('models/alumnos.fields.nombres')</th>
                <th>@lang('models/alumnos.fields.otrosNombres')</th>
                <th>@lang('models/alumnos.fields.apellidoPaterno')</th>
                <th>@lang('models/alumnos.fields.apellidoMaterno')</th>
                <th>@lang('models/alumnos.fields.email')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($alumnos as $alumnos)
            <tr>
                <td>{{ $alumnos->dni }}</td>
            <td>{{ $alumnos->nombres }}</td>
            <td>{{ $alumnos->otrosNombres }}</td>
            <td>{{ $alumnos->apellidoPaterno }}</td>
            <td>{{ $alumnos->apellidoMaterno }}</td>
            <td>{{ $alumnos->email }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['alumnos.destroy', $alumnos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('alumnos.show', [$alumnos->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('alumnos.edit', [$alumnos->id]) }}" class='btn btn-default btn-xs'>
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
