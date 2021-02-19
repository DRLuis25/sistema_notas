@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>@lang('models/capacidades.singular')</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($capacidades, ['route' => ['capacidades.update', $capacidades->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    <!-- Nivel Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('nivel_id', __('models/cursoGrados.fields.nivel_id').':') !!}
                        <input type="text" value="{{$capacidades->curso->nivel->descripcion}}" disabled>
                    </div>
                    <!-- Periodo Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('periodo_id', __('models/capacidades.fields.periodo_id').':') !!}
                        {!! Form::label('periodo_id', $capacidades->periodo->nombre, ['class' => 'form-control']) !!}
                        {!! Form::hidden('periodo_id', $capacidades->periodo->id, ['class' => 'form-control']) !!}
                    </div>
                    <!-- Grado Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('grado_id', __('models/cursoGrados.fields.grado_id').':') !!}
                        {!! Form::label('grado_id', $capacidades->grado->descripcion, ['class' => 'form-control']) !!}
                        {!! Form::hidden('grado_id', $capacidades->grado->id, ['class' => 'form-control']) !!}
                    </div>
                    <!-- Curso Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('curso_id', __('models/cursoGrados.fields.curso_id').':') !!}
                        {!! Form::label('curso_id', $capacidades->curso->nombre, ['class' => 'form-control']) !!}
                        {!! Form::hidden('curso_id', $capacidades->curso->id, ['class' => 'form-control']) !!}
                    </div>
                    <!-- Asignatura Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('asignatura', __('models/capacidades.fields.asignatura').':') !!}
                        {!! Form::text('asignatura', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Abreviatura Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('abreviatura', __('models/capacidades.fields.abreviatura').':') !!}
                        {!! Form::text('abreviatura', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Orden Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('orden', __('models/capacidades.fields.orden').':') !!}
                        {!! Form::number('orden', null, ['class' => 'form-control']) !!}
                        {!! Form::hidden('orden2', null, ['class' => 'form-control','disabled']) !!}
                    </div>

                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('capacidades.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
