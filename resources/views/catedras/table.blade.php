<div class="table-responsive">
    <table class="table" id="catedras-table">
        <thead>
            <tr>
                <th>@lang('models/catedras.fields.periodo_id')</th>
        <th>@lang('models/catedras.fields.docente_id')</th>
        <th>@lang('models/catedras.fields.curso_id')</th>
        <th>@lang('models/catedras.fields.grado_id')</th>
        <th>@lang('models/catedras.fields.seccion_id')</th>
        <th>@lang('models/catedras.fields.nrohoras')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($catedras as $catedra)
            <tr>
                <td>{{ $catedra->periodo_id }}</td>
            <td>{{ $catedra->docente_id }}</td>
            <td>{{ $catedra->curso_id }}</td>
            <td>{{ $catedra->grado_id }}</td>
            <td>{{ $catedra->seccion_id }}</td>
            <td>{{ $catedra->nrohoras->format('H:i') }} horas</td>
                <td width="120">
                    {!! Form::open(['route' => ['catedras.destroy', $catedra->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('catedras.show', [$catedra->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('catedras.edit', [$catedra->id]) }}" class='btn btn-default btn-xs'>
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
