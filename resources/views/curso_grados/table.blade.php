<div class="table-responsive">
    <p>Periodo {{$cursoGrados[0]->periodo->nombre}}</p>
    <h5>Periodo &nbsp; {{ $cursoGrados[0]->periodo->nombre }} </h5>
    <!-- Despegable -->
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Nivel&nbsp; {{ $cursoGrados[0]->grado->nivel->descripcion }}</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Nivel&nbsp;Secundaria</a>

        </div>
    </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <!--Tb Primaria -->
            <table class="table" >
                <thead>
                    <tr>
                        <th>@lang('models/cursoGrados.fields.curso_id')</th>
                        <th>@lang('models/cursoGrados.fields.grado_id')</th>
                        <th colspan="3">@lang('crud.action')</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($cursoGrados as $cursoGrado)
                @if($cursoGrado->grado->nivel->descripcion == "Primaria") 

                    <tr>                                                                        
                        <td>{{ $cursoGrado->curso->nombre }}</td>
                        <td>{{ $cursoGrado->grado->descripcion }}</td>

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

                 @endif    
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <!--Tb Secundaria-->
            <table class="table">
                <thead>
                    <tr>

                        <th>@lang('models/cursoGrados.fields.curso_id')</th>
                        <th>@lang('models/cursoGrados.fields.grado_id')</th>

                        <th colspan="3">@lang('crud.action')</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($cursoGrados as $cursoGrado)
                @if($cursoGrado->grado->nivel->descripcion == "Secundaria") 
                    <tr>                        
                        <td>{{ $cursoGrado->curso->nombre }}</td>
                        <td>{{ $cursoGrado->grado->descripcion }}</td>                        
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

                  @endif  
                @endforeach
                </tbody>
            </table>
        </div>
      </div>
    <!-- Fin Despegable-->

    
</div>
