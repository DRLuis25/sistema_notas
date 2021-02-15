@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('models/capacidades.plural')</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('capacidades.create') }}">
                       @lang('crud.add_new')
                    </a>
                </div>
                <br><br>
                <div class="col-sm-12">
                    <form class="form-inline my-2 my-lg-0 float-left">
                        <input name="BuscarCapacidades" class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" value="{{$BuscarCapacidades}}">
                        <button class="btn btn-success" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('capacidades.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $capacidades])
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

