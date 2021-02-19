<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="evaluaciones-table">
            <thead>
                <tr>
                    <th>@lang('models/matriculas.fields.matricula_id')</th>
                    <th>@lang('models/alumnos.fields.apellidosyNombres')</th>
                    <th colspan="3">Nota</th>
                </tr>
            </thead>
            <tbody>
                @foreach($matriculas as $matricula)
                <tr>
                    <td>{{ $matricula->matriculamaestro->nromatricula }}</td>
                    <input type="hidden" name="matricula_id[]" value="{{$matricula->matricula_id}}">
                    <td>{{ $matricula->matriculamaestro->alumno->apellidoPaterno }} {{ $matricula->matriculamaestro->alumno->apellidoMaterno }}, {{ $matricula->matriculamaestro->alumno->nombres }}</td>
                    <td style="width: 600px"><input id="nota" type="number" class="form-control col-2" name="nota_id[]" maxlength="2" min="0" max="20" required></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer ">
        <button class="btn btn-primary">Enviar</button>
        <a href="{{ route('evaluaciones.index') }}" class="btn btn-default">Volver</a>
    </div>
</div>
<script>
    function validar() {
    var nota;
    nota = document.getElementById("nota").value;
    console.log(nota);
    if(nota === "") {
        alert("El campo nota esta vacio");
        return false;
    }
    else if(nota < 0 || nota > 20) {
        alert("La nota es invalida");
        return false;
    }
    else if(isNAN(nota)) {
        alert("La nota debe ser un numero");
        return false;
    }
} 
</script>