<h3>Periodo {{$evaluaciones[0]->periodo->nombre}}</h3>
<div class="table-responsive">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Primer Bimestre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Segundo Bimestre</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Tercer Bimestre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="cuarto-tab" data-toggle="tab" href="#cuarto" role="tab" aria-controls="cuarto" aria-selected="false">Cuarto Bimestre</a>
          </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table class="table">
                <thead>
                    <tr>
                        <th>Curso</th>
                        <th>@lang('models/evaluaciones.fields.capacidad_id')</th>
                        <th colspan="3">@lang('crud.action')</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($evaluaciones as $evaluacion)
                    @if($evaluacion->bimestre->id=="1")
                    <tr>
                        <td>{{ $evaluacion->capacidad->curso->nombre }}</td>
                        <td>{{ $evaluacion->capacidad->asignatura }}</td>
                        <td width="120">
                            <div class='btn-group'>
                                <a href="{{ route('evaluaciones.listar', ['periodo_id'=>$evaluacion->periodo_id,'bimestre_id'=>$evaluacion->bimestre_id,'capacidad_id'=>$evaluacion->capacidad_id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('evaluaciones.editar', ['periodo_id'=>$evaluacion->periodo_id,'bimestre_id'=>$evaluacion->bimestre_id,'capacidad_id'=>$evaluacion->capacidad_id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <table class="table">
                <thead>
                    <tr>
                        <th>Curso</th>
                        <th>@lang('models/evaluaciones.fields.capacidad_id')</th>
                        <th colspan="3">@lang('crud.action')</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($evaluaciones as $evaluacion)
                    @if($evaluacion->bimestre->id=="2")
                    <tr>
                        <td>{{ $evaluacion->capacidad->curso->nombre }}</td>
                        <td>{{ $evaluacion->capacidad->asignatura }}</td>
                        <td width="120">
                            <div class='btn-group'>
                                <a href="{{ route('evaluaciones.listar', ['periodo_id'=>$evaluacion->periodo_id,'bimestre_id'=>$evaluacion->bimestre_id,'capacidad_id'=>$evaluacion->capacidad_id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('evaluaciones.editar', ['periodo_id'=>$evaluacion->periodo_id,'bimestre_id'=>$evaluacion->bimestre_id,'capacidad_id'=>$evaluacion->capacidad_id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <table class="table">
                <thead>
                    <tr>
                        <th>Curso</th>
                        <th>@lang('models/evaluaciones.fields.capacidad_id')</th>
                        <th colspan="3">@lang('crud.action')</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($evaluaciones as $evaluacion)
                    @if($evaluacion->bimestre->id=="3")
                    <tr>
                        <td>{{ $evaluacion->capacidad->curso->nombre }}</td>
                        <td>{{ $evaluacion->capacidad->asignatura }}</td>
                        <td width="120">
                            <div class='btn-group'>
                                <a href="{{ route('evaluaciones.listar', ['periodo_id'=>$evaluacion->periodo_id,'bimestre_id'=>$evaluacion->bimestre_id,'capacidad_id'=>$evaluacion->capacidad_id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('evaluaciones.editar', ['periodo_id'=>$evaluacion->periodo_id,'bimestre_id'=>$evaluacion->bimestre_id,'capacidad_id'=>$evaluacion->capacidad_id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="cuarto" role="tabpanel" aria-labelledby="cuarto-tab">
            <table class="table">
                <thead>
                    <tr>
                        <th>Curso</th>
                        <th>@lang('models/evaluaciones.fields.capacidad_id')</th>
                        <th colspan="3">@lang('crud.action')</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($evaluaciones as $evaluacion)
                    @if($evaluacion->bimestre->id=="4")
                    <tr>
                        <td>{{ $evaluacion->capacidad->curso->nombre }}</td>
                        <td>{{ $evaluacion->capacidad->asignatura }}</td>
                        <td width="120">
                            <div class='btn-group'>
                                <a href="{{ route('evaluaciones.listar', ['periodo_id'=>$evaluacion->periodo_id,'bimestre_id'=>$evaluacion->bimestre_id,'capacidad_id'=>$evaluacion->capacidad_id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('evaluaciones.editar', ['periodo_id'=>$evaluacion->periodo_id,'bimestre_id'=>$evaluacion->bimestre_id,'capacidad_id'=>$evaluacion->capacidad_id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
      </div>
</div>
