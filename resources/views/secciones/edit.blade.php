@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>@lang('models/secciones.singular')</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($secciones, ['route' => ['secciones.update', $secciones->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    <!-- Periodo Id Field -->
                    <div class="form-group col-sm-1">
                        {!! Form::label('periodo_id', __('models/secciones.fields.periodo_id').':') !!}
                        {!! Form::label('periodo_id', $periodo->nombre, ['class' => 'form-control']) !!}
                        {!! Form::hidden('periodo_id', $periodo->id, ['class' => 'form-control']) !!}
                    </div>
                    <!-- Letra Field -->
                    <div class="form-group col-sm-1">
                        {!! Form::label('letra', __('models/secciones.fields.letra').':') !!}
                        {!! Form::text('letra', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Nrovacantes Field -->
                    <div class="form-group col-sm-2">
                        {!! Form::label('nrovacantes', __('models/secciones.fields.nrovacantes').':') !!}
                        {!! Form::number('nrovacantes', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Nivel Id Field -->
                    <div class="form-group col-sm-2">
                        {!! Form::label('nivel_id', __('models/cursoGrados.fields.nivel_id').':') !!}
                        <select name="nivel_id" id="nivel_id" required class="form-control">
                            <option value="">Seleccione nivel</option>
                            @foreach ($niveles as $nivel)
                                <option value="{{$nivel->id}}"@if ($nivel->id==$secciones->grado->nivel->id)
                                    selected
                                @endif>{{$nivel->descripcion}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Grado Id Field -->
                    <div class="form-group col-sm-2">
                        {!! Form::label('grado_id', __('models/catedras.fields.grado_id').':') !!}
                        <select name="grado_id" id="grado_id" required class="form-control">
                            <option value="">Seleccione nivel</option>
                            @foreach ($grados as $item)
                            <option value="{{$item->id}}" @if ($item->id==$secciones->grado->id)
                                selected
                            @endif>{{$item->descripcion}}</option>
                            @endforeach
                            
                        </select>
                    </div>

                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('secciones.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
