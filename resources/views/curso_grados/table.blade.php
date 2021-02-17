<div class="table-responsive">
    <p>Periodo {{$cursoGrados[0]->periodo->nombre}}</p>
    <h3>Nivel {{ $cursoGrados[0]->grado->nivel->descripcion }}</h3>
    <h4>Grado: {{ $cursoGrados[0]->grado->descripcion}}</h4>
    <table class="table" id="cursoGrados-table">
        <thead>
            <tr>
                <th>@lang('models/cursoGrados.fields.curso_id')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cursoGrados as $cursoGrado)
            <tr>
                <td>{{ $cursoGrado->curso->nombre }}</td>
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
