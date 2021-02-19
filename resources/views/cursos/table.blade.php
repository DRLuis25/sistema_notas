<div class="table-responsive">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Nivel&nbsp; Primaria</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Nivel&nbsp;Secundaria</a>

        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <!--Primaria -->
            <table class="table">
                <thead>
                    <tr>
                        <th>@lang('models/cursos.fields.nombre')</th>
                        <th colspan="3">@lang('crud.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cursos as $curso)
                    @if($curso->nivel->descripcion == "Primaria") 
                        <tr>
                            <td>{{ $curso->nombre }}</td>
                            <td width="120">
                                {!! Form::open(['route' => ['cursos.destroy', $curso->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{{ route('cursos.show', [$curso->id]) }}" class='btn btn-default btn-xs'>
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('cursos.edit', [$curso->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                    </a>
                                    {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <!-- Secundaria -->
            <table class="table">
                <thead>
                    <tr>
                        <th>@lang('models/cursos.fields.nombre')</th>
                        <th colspan="3">@lang('crud.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cursos as $curso)
                    @if($curso->nivel->descripcion != "Primaria") 
                        <tr>
                            <td>{{ $curso->nombre }}</td>
                            <td width="120">
                                {!! Form::open(['route' => ['cursos.destroy', $curso->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{{ route('cursos.show', [$curso->id]) }}" class='btn btn-default btn-xs'>
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('cursos.edit', [$curso->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                    </a>
                                    {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
