<div class="table-responsive">
    <table class="table" id="docentes-table">
        <thead>
            <tr>
                <th>Rol</th>
                <th>@lang('models/docentes.fields.dni')</th>
                <th>@lang('models/docentes.fields.nombres')</th>
                <th>@lang('models/docentes.fields.direccion')</th>
                <th>@lang('models/docentes.fields.apellidoPaterno')</th>
                <th>@lang('models/docentes.fields.apellidoMaterno')</th>
                <th>@lang('models/docentes.fields.email')</th>
                <th>@lang('models/docentes.fields.estadoCivil')</th>
                <th>@lang('models/docentes.fields.telefono')</th>
                <th>@lang('models/docentes.fields.seguroSocial')</th>
                <th>@lang('models/docentes.fields.departamento_id')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($docentes as $docentes)
            <tr>
                <td>{{ implode(" ",$docentes->getRoleNames()->toArray())}}</td>
                <td>{{ $docentes->dni }}</td>
                <td>{{ $docentes->name }}</td>
                <td>{{ $docentes->direccion }}</td>
                <td>{{ $docentes->apellidoPaterno }}</td>
                <td>{{ $docentes->apellidoMaterno }}</td>
                <td>{{ $docentes->email }}</td>
                <td>{{ $docentes->estadoCivil }}</td>
                <td>{{ $docentes->telefono }}</td>
                <td>{{ $docentes->seguroSocial }}</td>
                <td>{{ $docentes->departamento->nombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['docentes.destroy', $docentes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('docentes.show', [$docentes->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('docentes.edit', [$docentes->id]) }}" class='btn btn-default btn-xs'>
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
