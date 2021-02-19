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
            <form action="">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="nivel_id">Nivel:</label>
                            <select name="nivel_id" id="nivel_id" required="" class="form-control">
                                <option value="">Seleccione nivel</option>
                                <option value="1">Primaria</option>
                                <option value="2">Secundaria</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nivel_id">Año:</label>
                            <select name="nivel_id" id="nivel_id" required="" class="form-control">
                                <option value="">Seleccione año</option>
                                <option value="1">2020</option>
                                <option value="2">2021</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nivel_id">Seccion:</label>
                            <select name="nivel_id" id="nivel_id" required="" class="form-control">
                                <option value="">Seleccione seccion</option>
                                <option value="1">Primaria</option>
                                <option value="2">Secundaria</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nivel_id">Curso:</label>
                            <select name="nivel_id" id="nivel_id" required="" class="form-control">
                                <option value="">Seleccione curso</option>
                                <option value="1">Primaria</option>
                                <option value="2">Secundaria</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nombre">Profesor:</label>
                            <input class="form-control" name="" type="text" id="">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nivel_id">Resumen reportes:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">Del Primer</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">Del Primer al Segundo</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">Del Primer al Tercero</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('imprimir.excel') }}" class="btn btn-primary">Imprimir</a>
                </div>
            </form>
        </div>
    </div>
@endsection