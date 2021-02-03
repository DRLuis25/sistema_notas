
<li class="nav-item">
    <a href="{{ route('departamentos.index') }}"
       class="nav-link {{ Request::is('departamentos*') ? 'active' : '' }}">
        <p>@lang('models/departamentos.plural')</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('cursos.index') }}"
       class="nav-link {{ Request::is('cursos*') ? 'active' : '' }}">
        <p>@lang('models/cursos.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('docentes.index') }}"
       class="nav-link {{ Request::is('docentes*') ? 'active' : '' }}">
        <p>@lang('models/docentes.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('periodos.index') }}"
       class="nav-link {{ Request::is('periodos*') ? 'active' : '' }}">
        <p>@lang('models/periodos.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('alumnos.index') }}"
       class="nav-link {{ Request::is('alumnos*') ? 'active' : '' }}">
        <p>@lang('models/alumnos.plural')</p>
    </a>
</li>
<!--
<li class="treeview">
    <a href="#">Detalle Empresa</a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('periodos*') ? 'active' : '' }}">
            <a href="{{ route('periodos.index') }}"><i class="fa fa-edit"></i><span>Periodos</span></a>
        </li>
    </ul>
</li>
--><li class="nav-item">
    <a href="{{ route('cursoGrados.index') }}"
       class="nav-link {{ Request::is('cursoGrados*') ? 'active' : '' }}">
        <p>@lang('models/cursoGrados.plural')</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('secciones.index') }}"
       class="nav-link {{ Request::is('secciones*') ? 'active' : '' }}">
        <p>@lang('models/secciones.plural')</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('capacidades.index') }}"
       class="nav-link {{ Request::is('capacidades*') ? 'active' : '' }}">
        <p>@lang('models/capacidades.plural')</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('matriculas.index') }}"
       class="nav-link {{ Request::is('matriculas*') ? 'active' : '' }}">
        <p>@lang('models/matriculas.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('evaluaciones.index') }}"
       class="nav-link {{ Request::is('evaluaciones*') ? 'active' : '' }}">
        <p>@lang('models/evaluaciones.plural')</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('catedras.index') }}"
       class="nav-link {{ Request::is('catedras*') ? 'active' : '' }}">
        <p>@lang('models/catedras.plural')</p>
    </a>
</li>


