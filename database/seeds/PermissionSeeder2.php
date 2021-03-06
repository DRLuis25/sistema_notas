<?php

use App\Models\Alumnos;
use App\Models\Bimestres;
use App\Models\Capacidades;
use App\Models\Catedra;
use App\Models\CursoGrado;
use App\Models\Cursos;
use App\Models\Departamentos;
use App\Models\Docentes;
use App\Models\Evaluaciones;
use App\Models\Grados;
use App\Models\MatriculaMaestro;
use App\Models\Matriculas;
use App\Models\Niveles;
use App\Models\Periodos;
use App\Models\Secciones;
use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Departamentos
        $primaria=Departamentos::create([
            'nombre'=>'Personal Docente Primaria',
        ]);
        $secundaria=Departamentos::create([
            'nombre'=>'Personal Docente Secundaria',
        ]);
        //Roles del sistema
        Role::create(['name' => 'user']);
        Role::create(['name' => 'admin']);
        // User temp
        $admin = User::create([
            'dni'=> '13245678',
            'name'=>'Luis',
            'direccion'=>'Direccion N',
            'apellidoMaterno' => 'Howe',
            'apellidoPaterno' => 'Raynor',
            'email'=>'admin@gmail.com',
            'estadoCivil'=>'Soltero',
            'telefono' => '+5473520399808',
            'seguroSocial'=>'10561414854',
            'departamento_id' => '1',
            'password'=>'$2y$10$cuf37o9lN0IkRFv73Q7IB.c5bDqCvog845XuTKHxSbMep/D04mknG' //password
        ]);    
        $admin->assignRole('admin');
        //Bimestres

        $primerBimestre=Bimestres::create([
            'nombre'=>'Primer Bimestre'
        ]);
        $segundoBimestre=Bimestres::create([
            'nombre'=>'Segundo Bimestre'
        ]);
        $tercerBimestre=Bimestres::create([
            'nombre'=>'Tercer Bimestre'
        ]);
        $cuartoBimestre=Bimestres::create([
            'nombre'=>'Cuarto Bimestre'
        ]);
        //Crear niveles
        $primaria=Niveles::create([
            'descripcion'=>'Primaria',
        ]);
        $secundaria=Niveles::create([
            'descripcion'=>'Secundaria',
        ]);

        //Cursos
        //Primaria
        $cursoComunicacion = Cursos::create([
            'nombre'=>'Comunicación',
            'nivel_id'=>$primaria->id
        ]);
        $cursoArte = Cursos::create([
            'nombre'=>'Arte y Cultura',
            'nivel_id'=>$primaria->id
        ]);
        $cursoMatematica = Cursos::create([
            'nombre'=>'Matemática',
            'nivel_id'=>$primaria->id
        ]);
        $cursoPersonalSocial = Cursos::create([
            'nombre'=>'Personal Social',
            'nivel_id'=>$primaria->id
        ]);
        $cursoEducacionFisica = Cursos::create([
            'nombre'=>'Educación Física',
            'nivel_id'=>$primaria->id
        ]);
        $cursoCiencia = Cursos::create([
            'nombre'=>'Ciencia y Tecnología',
            'nivel_id'=>$primaria->id
        ]);
        $cursoEducacionReligiosap = Cursos::create([
            'nombre'=>'Educación Religiosa',
            'nivel_id'=>$primaria->id
        ]);
        //Secundaria
        $cursoHistoria = Cursos::create([
            'nombre'=>'Historia',
            'nivel_id'=>$secundaria->id
        ]);
        $cursoEducacionReligiosa = Cursos::create([
            'nombre'=>'Educación Religiosa',
            'nivel_id'=>$secundaria->id
        ]);
        $cursoMatematicas = Cursos::create([
            'nombre'=>'Matemática',
            'nivel_id'=>$secundaria->id
        ]);
        $cursoDesarrollo = Cursos::create([
            'nombre'=>'Desarrollo Personal,Ciudadanía y Cívica',
            'nivel_id'=>$secundaria->id
        ]);
        $cursoCienciasSociales = Cursos::create([
            'nombre'=>'Ciencias Sociales',
            'nivel_id'=>$secundaria->id
        ]);
        $cursoEducacionFisicas = Cursos::create([
            'nombre'=>'Educación Física',
            'nivel_id'=>$secundaria->id
        ]);
        $cursoArtes = Cursos::create([
            'nombre'=>'Arte y Cultura',
            'nivel_id'=>$secundaria->id
        ]);
        $cursoComunicacions = Cursos::create([
            'nombre'=>'Comunicación',
            'nivel_id'=>$secundaria->id
        ]);
        $cursoCTA = Cursos::create([
            'nombre'=>'Ciencia y Tecnología',
            'nivel_id'=>$secundaria->id
        ]);
        $cursoEducacionPT = Cursos::create([
            'nombre'=>'Educación para el Trabajo',
            'nivel_id'=>$secundaria->id
        ]);
        //Docentes
        $docentes = factory(User::class,20)->create();
        foreach($docentes as $docente){
            $docente->assignRole('user');
         }
        //Grados
        //Primaria
        $primerGradoPrimaria = Grados::create([
            'descripcion'=>'Primero',
            'nivel_id'=>$primaria->id //Primaria
        ]);
        $segundoGradoPrimaria = Grados::create([
            'descripcion'=>'Segundo',
            'nivel_id'=>$primaria->id //Primaria
        ]);
        $terceroGradoPrimaria = Grados::create([
            'descripcion'=>'Tercero',
            'nivel_id'=>$primaria->id //Primaria
        ]);
        $cuartoGradoPrimaria = Grados::create([
            'descripcion'=>'Cuarto',
            'nivel_id'=>$primaria->id //Primaria
        ]);
        $quintoGradoPrimaria = Grados::create([
            'descripcion'=>'Quinto',
            'nivel_id'=>$primaria->id //Primaria
        ]);
        $sextoGradoPrimaria = Grados::create([
            'descripcion'=>'Sexto',
            'nivel_id'=>$primaria->id //Primaria
        ]);
        //Secundaria
        $primerGradoSecundaria = Grados::create([
            'descripcion'=>'Primero',
            'nivel_id'=>$secundaria->id //Secundaria
        ]);
        $segundoGradoSecundaria = Grados::create([
            'descripcion'=>'Segundo',
            'nivel_id'=>$secundaria->id //Secundaria
        ]);
        $terceroGradoSecundaria = Grados::create([
            'descripcion'=>'Tercero',
            'nivel_id'=>$secundaria->id //Secundaria
        ]);
        $cuartoGradoSecundaria = Grados::create([
            'descripcion'=>'Cuarto',
            'nivel_id'=>$secundaria->id //Secundaria
        ]);
        $quintoGradoSecundaria = Grados::create([
            'descripcion'=>'Quinto',
            'nivel_id'=>$secundaria->id //Secundaria
        ]);
        //Periodo 2021
        $periodo = Periodos::create([
            'nombre'=>'2021'
        ]);

        //Relacionar Curso-Grado
        $cursoComunicacionPrimerGradoPrimaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoComunicacion->id,         //Comunicación
            'grado_id'=>$primerGradoPrimaria->id        //primerGradoPrimaria
        ]);
        $cursoArtePrimerGradoPrimaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoArte->id,                 //Arte
            'grado_id'=>$primerGradoPrimaria->id        //primerGradoPrimaria
        ]);
        
        //Crear Secciones para los grados

        $primeroPrimariaSeccionA=Secciones::create([
            'periodo_id'=>$periodo->id,
            'letra'=>'A',
            'nrovacantes'=>'30',
            'grado_id'=>$primerGradoPrimaria->id        //primerGradoPrimaria
        ]);
        $primeroPrimariaSeccionB=Secciones::create([
            'periodo_id'=>$periodo->id,
            'letra'=>'B',
            'nrovacantes'=>'20',
            'grado_id'=>$primerGradoPrimaria->id        //primerGradoPrimaria
        ]);

        //Registrar Cátedras de docentes

        $catedraDocente1=Catedra::create([
            'periodo_id'=>$periodo->id,
            'docente_id'=>'1',                                                  //Del 1 al 20 (Hay 20 docentes)
            'curso_id'=>$cursoComunicacionPrimerGradoPrimaria->curso_id,        //Comunicación
            'grado_id'=>$cursoComunicacionPrimerGradoPrimaria->grado_id,        //primerGradoPrimaria
            'seccion_id'=>$primeroPrimariaSeccionA->id,                         //Seccion A
            'nrohoras'=>'3:00:00'
        ]);

        //Asignar Capacidades a CursoGrado

        $capacidad1CursoComunicacionPrimerGradoPrimaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoComunicacionPrimerGradoPrimaria->curso_id,        //Comunicación
            'grado_id'=>$cursoComunicacionPrimerGradoPrimaria->grado_id,        //primerGradoPrimaria
            'asignatura'=>'Infiere e interpreta información del texto oral',
            'abreviatura'=>'Inf. e Interp. texto oral',
            'orden'=>'1'
        ]);

        $capacidad2CursoComunicacionPrimerGradoPrimaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoComunicacionPrimerGradoPrimaria->curso_id,        //Comunicación
            'grado_id'=>$cursoComunicacionPrimerGradoPrimaria->grado_id,        //primerGradoPrimaria
            'asignatura'=>'Adecúa, organiza y desarrolla las ideas de forma coherente y cohesionada',
            'abreviatura'=>'Adec. org. y des. ideas',
            'orden'=>'2'
        ]);

        //Alumnos
        $alumnos = factory(Alumnos::class,20)->create()->each(function ($alumno){
            //Matrícula única inicial
            $matriculaInicialAlumno = MatriculaMaestro::create([
                'nromatricula'=> $alumno->dni.substr(date("Y"),-2),
                'alumno_id'=>$alumno->id,
            ]);
        });
        //Registrar Matrículas (Detalle)

        $matricula1Alumno1=Matriculas::create([
            'matricula_id'=>$alumnos[0]->matriculamaestro->id, //Alumno[0] es el primer alumno
            'periodo_id'=>$periodo->id,
            'seccion_id'=>$primeroPrimariaSeccionA->id,
            'observaciones'=>null,
        ]);
    }
}
