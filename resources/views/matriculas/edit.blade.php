@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>@lang('models/matriculas.singular')</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($matriculas, ['route' => ['matriculas.update', $matriculas->matricula_id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    <!-- Periodo Id Field -->
                    <div class="form-group col-sm-1">
                        {!! Form::label('periodo_id', __('models/matriculas.fields.periodo_id').':') !!}
                        {!! Form::label('periodo_id', $periodo->nombre, ['class' => 'form-control']) !!}
                        {!! Form::hidden('periodo_id', $periodo->id, ['class' => 'form-control']) !!}
                    </div>
                    <!-- Alumno Id Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('alumno_i', __('models/matriculas.fields.alumno_id').':') !!}
                        <input type="text" disabled class="form-control" value="{{$matriculas->matriculamaestro->alumno->apellidoPaterno." ".$matriculas->matriculamaestro->alumno->apellidoMaterno.", ".$matriculas->matriculamaestro->alumno->nombres}}">
                    </div>

                    <!-- Matricula Id Field -->
                    <div class="form-group col-sm-2">
                        {!! Form::label('matricula_id', __('models/matriculas.fields.matricula_id').':') !!}
                        <input type="text" id="nromatricula" name="nromatricula" disabled class="form-control" value="{{$matriculas->matriculamaestro->nromatricula}}">
                        {!! Form::hidden('matricula_id',$matriculas->matriculamaestro->id, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Seccion Id Field -->
                    <div class="form-group col-sm-2">
                        {!! Form::label('seccion_id', __('models/catedras.fields.seccion_id').':') !!}
                        <select name="seccion_id" id="seccion_id" required class="form-control">
                            <option value="">Seleccione sección</option>
                            @foreach ($secciones as $item)
                                <option value="{{$item->id}}" @if ($item->id==$matriculas->seccion_id)
                                    selected
                                @endif>{{$item->letra}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Observaciones Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('observaciones', __('models/matriculas.fields.observaciones').' (Opcional):') !!}
                        {!! Form::text('observaciones', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Exonerado Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('exonerado','Curso '. __('models/matriculas.fields.exonerado').'(FALTA EL SELECTED):') !!}
                        <select id="exonerado" name="exonerado[]" class="form-control" multiple="">
                            @foreach ($exonerados as $item)
                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('matriculas.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
