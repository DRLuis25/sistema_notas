@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>@lang('models/catedras.singular')</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($catedra, ['route' => ['catedras.update', $catedra->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    <!-- Periodo Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('periodo_id', __('models/cursoGrados.fields.periodo_id').':') !!}
                        {!! Form::label('periodo_id', $periodo->nombre, ['class' => 'form-control']) !!}
                        {!! Form::hidden('periodo_id', $periodo->id, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Docente Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('docente_id', __('models/catedras.fields.docente_id').':') !!}
                        {!! Form::label('docente_id', $catedra->docente->apellidoPaterno." ".$catedra->docente->apellidoMaterno.", ".$catedra->docente->name, ['class' => 'form-control']) !!}
                        
                    </div>
                    <!-- Nivel Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('nivel_id', __('models/cursoGrados.fields.nivel_id').':') !!}
                        <select name="nivel_id" id="nivel_id" required class="form-control">
                            <option value="">Seleccione nivel</option>
                            @foreach ($niveles as $nivel)
                                <option value="{{$nivel->id}}"@if ($nivel->id==$catedra->grado->nivel->id){{'selected'}}             
                                    @endif>{{$nivel->descripcion}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Grado Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('grado_id', __('models/catedras.fields.grado_id').':') !!}
                        <select name="grado_id" id="grado_id" required class="form-control">
                            <option value="">Seleccione nivel</option>
                            <option value="{{$catedra->grado_id}}" selected>{{$catedra->grado->descripcion}}</option>
                        </select>
                    </div>

                    <!-- Curso Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('curso_id', __('models/catedras.fields.curso_id').':') !!}
                        <select name="curso_id" id="curso_id" required class="form-control">
                            <option value="">Seleccione nivel</option>
                            <option value="{{$catedra->curso_id}}" selected>{{$catedra->curso->nombre}}</option>
                        </select>
                    </div>
                    
                    <!-- Seccion Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('seccion_id', __('models/catedras.fields.seccion_id').':') !!}
                        <select name="seccion_id" id="seccion_id" required class="form-control">
                            <option value="">Seleccione grado</option>
                            <option value="{{$catedra->seccion_id}}" selected>{{$catedra->seccion->letra}}</option>
                        </select>
                    </div>
                    <!-- Nrohoras Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('nrohoras', __('models/catedras.fields.nrohoras').':') !!}
                        {!! Form::time('nrohoras', $catedra->nrohoras, ['class' => 'form-control','id'=>'nrohoras','min'=>'01:00', 'max'=>'8:00']) !!}
                    </div>



                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('catedras.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
@section('script')
<script>

    $("#nivel_id").change(event => {
        $.get(`/getGrados/${event.target.value}`, function(res, sta){
            $("#grado_id").empty();
            $("#grado_id").append(`<option value=''> Seleccione grado </option>`);
            res.forEach(element => {
                $("#grado_id").append(`<option value=${element.id}> ${element.descripcion} </option>`);
            });
        });
        $("#curso_id").empty();
        $("#curso_id").append(`<option value=''> Seleccione nivel </option>`);
        $("#seccion_id").empty();
        $("#seccion_id").append(`<option value=''> Seleccione nivel </option>`);
    });
    $("#grado_id").change(event => {
        $.get(`/getCursoGrado/${event.target.value}`, function(res, sta){
            console.log(res);
            console.log(sta);
            $("#curso_id").empty();
            $("#curso_id").append(`<option value=''> Seleccione curso </option>`);
            res.forEach(element => {
                $("#curso_id").append(`<option value=${element.curso_id}> ${element.nombre} </option>`);
            });
        });
        $.get(`/getSecciones/${event.target.value}`, function(res, sta){
            $("#seccion_id").empty();
            $("#seccion_id").append(`<option value=''> Seleccione sección </option>`);
            res.forEach(element => {
                $("#seccion_id").append(`<option value=${element.id}> ${element.letra} </option>`);
            });
        });
    });
</script>
@endsection