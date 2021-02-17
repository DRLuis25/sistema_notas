@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>@lang('models/cursoGrados.singular')</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($cursoGrado, ['route' => ['cursoGrados.update', $cursoGrado->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    <!-- Periodo Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('periodo_id', __('models/cursoGrados.fields.periodo_id').':') !!}
                        {!! Form::label('periodo_id', $periodo->nombre, ['class' => 'form-control']) !!}
                        {!! Form::hidden('periodo_id', $periodo->id, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Nivel Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('nivel_id', __('models/cursoGrados.fields.nivel_id').':') !!}
                        <select name="nivel_id" id="nivel_id" required class="form-control">
                            <option value="">Seleccione nivel</option>
                            @foreach ($niveles as $nivel)
                                <option value="{{$nivel->id}}"@if ($nivel->id==$cursoGrado->curso->nivel->id)
                                    selected
                                @endif>{{$nivel->descripcion}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Grado Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('grado_id', __('models/cursoGrados.fields.grado_id').':') !!}
                        <select name="grado_id" id="grado_id" required class="form-control">
                            <option value="">Seleccione grado</option>
                            @foreach ($grados as $item)
                                <option value="{{$item->id}}"@if ($item->id==$cursoGrado->grado->id)
                                    selected
                                @endif>{{$item->descripcion}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Curso Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('curso_id', __('models/cursoGrados.fields.curso_id').':') !!}
                        <select name="curso_id" id="curso_id" required class="form-control">
                            <option value="">Seleccione curso</option>
                            @foreach ($cursos as $item)
                                <option value="{{$item->id}}"@if ($item->id==$cursoGrado->curso->id)
                                    selected
                                @endif>{{$item->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    

                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('cursoGrados.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
@section('script')
<script>
    $("#nivel_id").change(event => {
        $.get(`/getCursos/${event.target.value}`, function(res, sta){
            console.log(res);
            console.log(sta);
            $("#curso_id").empty();
            $("#curso_id").append(`<option value=''> Seleccione curso </option>`);
            res.forEach(element => {
                $("#curso_id").append(`<option value=${element.id}> ${element.nombre} </option>`);
            });
        });
        $.get(`/getGrados/${event.target.value}`, function(res, sta){
            $("#grado_id").empty();
            $("#grado_id").append(`<option value=''> Seleccione grado </option>`);
            res.forEach(element => {
                $("#grado_id").append(`<option value=${element.id}> ${element.descripcion} </option>`);
            });
        });
    });
</script>
@endsection