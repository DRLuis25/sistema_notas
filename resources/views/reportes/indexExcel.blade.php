<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    <thead></table>
    <table>
        <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th><b>REGISTRO NOTAS</b></th>
        </tr>
        </thead>
    </table>
    <table>
        <thead>
        <tr>
            <th></th>
            <th></th>
            <th>PRIMER BIMESTRE</th>
            <th></th>
            <th></th>   
            <th>Año academico:</th>
            <th></th>
            <th>{{$periodo->nombre}}</th>
        </tr>
        </thead>
    </table>
    <table>
        <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th><b>PRIMER BIMESTRE</b></th>
        </tr>
        </thead>
    </table>
    <table>
        <thead>
        <tr>
            <th></th>
            <th></th>
            <th><b>Grado</b></th>
            <th></th>
            <th></th>
            <th></th>
            <th><b>Seccion</b></th>
            <th></th>
            <th></th>
            <th><b>Area</b></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td>{{$grado->descripcion}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{$seccion->letra}}</td>
                <td></td>
                <td></td>
                <td>{{$curso->nombre}}</td>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr>
            <th></th>
            <th></th>
            <th><b>CODTRA</b></th>
            <th></th>
            <th></th>
            <th><b>PROFESOR</b></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th><b>FECHA</b></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td>DC{{sprintf('%06d',$docente->id)}}</td>
                <td></td>
                <td></td>
                <td>{{$docente->apellidoPaterno}} {{$docente->apellidoMaterno}}, {{$docente->name}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{date('m/d/Y')}}</td>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr>
            
            <th></th>
            <th></th>
            <th><b>@lang('models/matriculas.fields.matricula_id')</b></th>
            <th><b>@lang('models/alumnos.fields.apellidosyNombres')</b></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            @foreach ($capacidades as $item)
                <th><b>{{$item->abreviatura}}</b></th>
            @endforeach
            <th><b>PR</b></th>
        </tr>
        </thead>
        <tbody>
            @foreach($res[0] as $key => $evaluacion)
                <tr>
                </tr>
                <tr>
                <td></td>
                <td></td>
                <td>{{ $evaluacion->matricula->nromatricula }}</td>
                <td>{{ $evaluacion->matricula->alumno->apellidoPaterno }} {{ $evaluacion->matricula->alumno->apellidoMaterno }}, {{ $evaluacion->matricula->alumno->nombres }}</td>
                    
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{$res[0][$key]->calificacion}}</td>
                @isset($res[1][$key]->calificacion)
                <td>{{ $res[1][$key]->calificacion}}
                </td>
                @endisset
                
                @isset($res[2][$key]->calificacion)
                <td>{{ $res[2][$key]->calificacion}}
                </td> 
                @endisset
                @isset($res[3][$key]->calificacion)
                <td>{{ $res[3][$key]->calificacion}}
                </td>
                @endisset
                <td>
                    @if (count($capacidades)==1)
                        {{$res[0][$key]->calificacion}}
                    @elseif(count($capacidades)==2)
                        {{round (($res[0][$key]->calificacion + $res[1][$key]->calificacion)/2)}}
                    @elseif(count($capacidades)==3)
                        {{round (($res[0][$key]->calificacion + $res[1][$key]->calificacion + $res[2][$key]->calificacion)/3)}}
                    @elseif(isset($res[0][$key]->calificacion) && isset($res[1][$key]->calificacion)&& isset($res[2][$key]->calificacion)&& isset($res[3][$key]->calificacion))
                        {{round (($res[0][$key]->calificacion + $res[1][$key]->calificacion + $res[2][$key]->calificacion + $res[3][$key]->calificacion)/4)}}
                        
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>