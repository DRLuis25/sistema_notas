<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('departamentos', 'DepartamentosController');

Route::resource('docentes', 'DocentesController');

Route::resource('periodos', 'PeriodosController');

Route::resource('cursos', 'CursosController');

Route::resource('alumnos', 'AlumnosController');

Route::resource('cursoGrados', 'CursoGradoController');

Route::get('getCursos/{id}','CursosController@listarCursos');
Route::get('getGrados/{id}','CursoGradoController@listarGrados');
Route::get('getSecciones/{id}','CursoGradoController@listarSecciones');
Route::get('getCapacidad/{curso}/{grado}','CapacidadesController@listarCapacidades');
Route::resource('secciones', 'SeccionesController');

Route::resource('capacidades', 'CapacidadesController');

Route::resource('matriculas', 'MatriculasController');

Route::resource('evaluaciones', 'EvaluacionesController');

Route::get('listaralumnos', 'EvaluacionesController@listarAlumnos')->name('evaluaciones.alumnos');

Route::resource('catedras', 'CatedraController');