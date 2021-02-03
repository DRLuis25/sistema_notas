<div class="table-responsive">
    <table class="table" id="cursos-table">
        <thead>
            <tr>
                <th>@lang('models/cursos.fields.nombre')</th>
        <th>@lang('models/cursos.fields.nivel_id')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cursos->sortBy('nivel_id') as $cursos)
            <tr>
                <td>{{ $cursos->nombre }}</td>
            <td>{{ $cursos->nivel->descripcion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cursos.destroy', $cursos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cursos.show', [$cursos->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cursos.edit', [$cursos->id]) }}" class='btn btn-default btn-xs'>
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
