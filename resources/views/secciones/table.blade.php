<div class="table-responsive">
    <table class="table" id="secciones-table">
        <thead>
            <tr>
                <th>@lang('models/secciones.fields.periodo_id')</th>
        <th>@lang('models/secciones.fields.letra')</th>
        <th>@lang('models/secciones.fields.nrovacantes')</th>
        <th>@lang('models/secciones.fields.grado_id')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($secciones as $secciones)
            <tr>
                <td>{{ $secciones->periodo->nombre }}</td>
            <td>{{ $secciones->letra }}</td>
            <td>{{ $secciones->nrovacantes }}</td>
            <td>{{ $secciones->grado->descripcion }} - {{$secciones->grado->nivel->descripcion}}</td>
                <td width="120">
                    {!! Form::open(['route' => ['secciones.destroy', $secciones->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('secciones.show', [$secciones->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('secciones.edit', [$secciones->id]) }}" class='btn btn-default btn-xs'>
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
