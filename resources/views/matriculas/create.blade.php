@extends('layouts.app')
@section('estilos')
    <link rel="stylesheet" href="/select2/bootstrap-select.min.css">
@endsection
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

            {!! Form::open(['route' => 'matriculas.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('matriculas.fields')
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
@section('script')
<script src="/select2/bootstrap-select.min.js"></script>
<script>
    $("#alumno_id").change(event => {
        $("#matricula_id").empty();
        $.get(`/getNroMatricula/${event.target.value}`, function(res, sta){
            console.log(res);
            $("#matricula_id2").val(res.nromatricula);
            $("#matricula_id").val(res.id);
        });
    });
    $("#nivel_id").change(event => {
        $.get(`/getGrados/${event.target.value}`, function(res, sta){
            $("#grado_id").empty();
            $("#grado_id").append(`<option value=''> Seleccione grado </option>`);
            res.forEach(element => {
                $("#grado_id").append(`<option value=${element.id}> ${element.descripcion} </option>`);
            });
        });
    });
    $("#grado_id").change(event => {
        $.get(`/getSecciones/${event.target.value}`, function(res, sta){

            $("#seccion_id").empty();
            $("#seccion_id").append(`<option value=''> Seleccione sección </option>`);
            res.forEach(element => {
                $("#seccion_id").append(`<option value=${element.id}> ${element.letra} </option>`);
            });
        });
        $.get(`/getCursoGrado/${event.target.value}`, function(res, sta){
            console.log(res);
            console.log(sta);
            $("#exonerado").empty();
            res.forEach(element => {
                $("#exonerado").append(`<option value=${element.curso_id}> ${element.nombre} </option>`);
            });
        });
    });
</script>
@endsection