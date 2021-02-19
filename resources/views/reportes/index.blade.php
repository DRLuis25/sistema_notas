@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Reportes</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="content px-3">
        <div class="card">
            <form action="{{route('imprimir.excel')}}">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="periodo_id">Periodo:</label>
                            <select name="periodo_id" id="periodo_id" required="" class="form-control">
                                <option value="">Seleccione periodo</option>
                                    @foreach ($periodos as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nivel_id">Nivel:</label>
                            <select name="nivel_id" id="nivel_id" required="" class="form-control">
                                <option value="">Seleccione nivel</option>
                                    @foreach ($niveles as $item)
                                        <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nivel_id">Grado:</label>
                            <select name="grado_id" id="grado_id" required="" class="form-control">
                                <option value="">Seleccione grado</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nivel_id">Seccion:</label>
                            <select name="seccion_id" id="seccion_id" required="" class="form-control">
                                <option value="">Seleccione seccion</option>
                                <option value="1">Primaria</option>
                                <option value="2">Secundaria</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="curso_id">Curso:</label>
                            <select name="curso_id" id="curso_id" required="" class="form-control">
                                <option value="">Seleccione curso</option>
                                <option value="1">Primaria</option>
                                <option value="2">Secundaria</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nombre">Profesor:</label>
                            <input class="form-control" name="docente_name" id="docente_name" type="text" disabled>
                            <input type="hidden" value="" name="docente_id" id="docente_id">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nivel_id">Resumen reportes:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tiporesumen" value="1" id="flexRadioDefault1" checked required>
                                <label class="form-check-label" for="flexRadioDefault1">Del Primer</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tiporesumen" value="2" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">Del Primer al Segundo</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tiporesumen" value="3" id="flexRadioDefault3">
                                <label class="form-check-label" for="flexRadioDefault3">Del Primer al Cuarto</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Imprimir</button>
                </div>
            </form>
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
        $("#seccion_id").empty();
        $("#seccion_id").append(`<option value=''> Seleccione grado </option>`);
    });
    $("#grado_id").change(event => {
        $.get(`/getSecciones/${event.target.value}`, function(res, sta){
            $("#seccion_id").empty();
            $("#seccion_id").append(`<option value=''> Seleccione sección </option>`);
            res.forEach(element => {
                $("#seccion_id").append(`<option value=${element.id}> ${element.letra} </option>`);
            });
        });
    });
    $("#curso_id").change(event => {
        let periodo_id = $("#periodo_id").val();
        let curso_id = $("#curso_id").val();
        let grado_id = $("#grado_id").val();
        let seccion_id = $("#seccion_id").val();
        $.get(`/getDocente/${periodo_id}/${curso_id}/${grado_id}/${seccion_id}`, function(res, sta){
            $("#docente_name").empty();
            $("#docente_name").val(res.apellidoPaterno + " " + res.apellidoMaterno + ", "+ res.name);
            $("#docente_id").empty();
            $("#docente_id").val(res.docente_id);
        });
    });
    
</script>
@endsection