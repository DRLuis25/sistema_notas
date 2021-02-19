@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>@lang('models/evaluaciones.singular')</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'evaluaciones.indexalumno','method'=>'get']) !!}

            <div class="card-body">

                <div class="row">
                    @include('evaluaciones.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Listar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('evaluaciones.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
@section('script')
<script>
    $("#nivel_id").change(event => {
        $.get(`/getGrados/${event.target.value}`, function(res, sta){
            console.log(res);
            console.log(sta);
            $("#grado_id").empty();
            $("#grado_id").append(`<option value=''> Seleccione Grado </option>`);
            res.forEach(element => {
                $("#grado_id").append(`<option value=${element.id}> ${element.descripcion} </option>`);
            });
        });
        $.get(`/getSecciones/${event.target.value}`, function(res, sta){
            console.log(res);
            console.log(sta);
            $("#seccion_id").empty();
            $("#seccion_id").append(`<option value=''> Seleccione seccion</option>`);
            res.forEach(element => {
                $("#seccion_id").append(`<option value=${element.id}> ${element.letra} </option>`);
            });
        });
        $.get(`/getCursos/${event.target.value}`, function(res, sta){
            console.log(res);
            console.log(sta);
            $("#curso_id").empty();
            $("#curso_id").append(`<option value=''> Seleccione curso </option>`);
            res.forEach(element => {
                $("#curso_id").append(`<option value=${element.id}> ${element.nombre} </option>`);
            });
        }); 
    });
    $("#bimestre_id").change(event => {
        let x = $("#grado_id").val();
        let y = $("#curso_id").val();
        console.log(x);
        console.log(y);
        $.get(`/getCapacidad/${y}/${x}`, function(res, sta){
            console.log(res);
            console.log(sta);
            $("#capacidad_id").empty();
            $("#capacidad_id").append(`<option value=''>Seleccione Capacidad</option>`);
            res.forEach(element => {
                $("#capacidad_id").append(`<option value=${element.id}> ${element.abreviatura} </option>`);
            });
        });
    });
    $("#capacidad_id").change(event => {
        $.get(`/getAlumnos/${y}`, function(res, sta){
            console.log(res);
            console.log(sta);
            $("#capacidad_id").empty();
            $("#capacidad_id").append(`<option value=''>Seleccione Capacidad</option>`);
            res.forEach(element => {
                $("#capacidad_id").append(`<option value=${element.id}> ${element.abreviatura} </option>`);
            });
        });
    });
</script>



@endsection