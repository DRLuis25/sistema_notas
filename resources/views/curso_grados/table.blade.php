<div class="table-responsive">
    <table class="table" id="cursoGrados-table">
        <thead>
            <tr>
                <th>@lang('models/cursoGrados.fields.periodo_id')</th>
                <th>@lang('models/cursoGrados.fields.curso_id')</th>
                <th>@lang('models/cursoGrados.fields.grado_id')</th>
                <th>@lang('models/cursoGrados.fields.nivel_id')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cursoGrados as $cursoGrado)
            <tr>
                <td>{{ $cursoGrado->periodo->nombre }}</td>
                <td>{{ $cursoGrado->curso->nombre }}</td>
                <td>{{ $cursoGrado->grado->descripcion }}</td>
                <td>{{ $cursoGrado->grado->nivel->descripcion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cursoGrados.destroy', $cursoGrado->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cursoGrados.show', [$cursoGrado->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cursoGrados.edit', [$cursoGrado->id]) }}" class='btn btn-default btn-xs'>
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
