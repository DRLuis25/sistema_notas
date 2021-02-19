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
        //Relacionar Curso-Grado - Primaria
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
        $cursoMatematicaPrimerGradoPrimaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoMatematica->id,                 // Matematica
            'grado_id'=>$primerGradoPrimaria->id        //primerGradoPrimaria
        ]);
        $cursoPersonalSocialPrimerGradoPrimaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoPersonalSocial->id,                 // Personal Social
            'grado_id'=>$primerGradoPrimaria->id        //primerGradoPrimaria
        ]);
        $cursoEducacionFisicaPrimerGradoPrimaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoEducacionFisica->id,                 // EducacionFisica
            'grado_id'=>$primerGradoPrimaria->id        //primerGradoPrimaria
        ]);
        $cursoCienciaPrimerGradoPrimaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoCiencia->id,                 // Ciencia y Tecnología
            'grado_id'=>$primerGradoPrimaria->id        //primerGradoPrimaria
        ]);
        $cursoComunicacionSegundoGradoPrimaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoComunicacion->id,         //Comunicación
            'grado_id'=>$segundoGradoPrimaria->id        //segundoGradoPrimaria
        ]);
        $cursoArteSegundoGradoPrimaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoArte->id,                 //Arte
            'grado_id'=>$segundoGradoPrimaria->id        //segundoGradoPrimaria
        ]);
        $cursoMatematicaSegundoGradoPrimaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoMatematica->id,                 // Matematica
            'grado_id'=>$segundoGradoPrimaria->id        //segundoGradoPrimaria
        ]);
        $cursoPersonalSocialSegundoGradoPrimaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoPersonalSocial->id,                 // Personal Social
            'grado_id'=>$segundoGradoPrimaria->id        //segundoGradoPrimaria
        ]);
        $cursoEducacionFisicaSegundoGradoPrimaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoEducacionFisica->id,                 // EducacionFisica
            'grado_id'=>$segundoGradoPrimaria->id        //segundoGradoPrimaria
        ]);
        $cursoComunicacionTerceroGradoPrimaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoComunicacion->id,         //Comunicación
            'grado_id'=>$segundoGradoPrimaria->id        //terceroGradoPrimaria
        ]);
        $cursoArteTerceroGradoPrimaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoArte->id,                 //Arte
            'grado_id'=>$segundoGradoPrimaria->id        //terceroGradoPrimaria
        ]);
        $cursoMatematicaTerceroGradoPrimaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoMatematica->id,                 // Matematica
            'grado_id'=>$segundoGradoPrimaria->id       //terceroGradoPrimaria
        ]);
        $cursoPersonalSocialTerceroGradoPrimaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoPersonalSocial->id,                 // Personal Social
            'grado_id'=>$segundoGradoPrimaria->id        //terceroGradoPrimaria
        ]);
        $cursoEducacionFisicaTerceroGradoPrimaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoEducacionFisica->id,                 // EducacionFisica
            'grado_id'=>$terceroGradoPrimaria->id        //terceroGradoPrimaria
        ]);
        
        
        //Relacionar Curso-Grado - Secundaria
        $cursoHistoriaPrimerGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoHistoria->id,                 //Historia
            'grado_id'=>$primerGradoSecundaria->id        //primerGradoSecundaria
        ]);
        $cursoEducacionReligiosaPrimerGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoEducacionReligiosa->id,                 //$cursoEducacionReligiosa
            'grado_id'=>$primerGradoSecundaria->id        //primerGradoSecundaria
        ]);
        $cursoMatematicasPrimerGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoMatematicas->id,                 //$cursoMatematicas
            'grado_id'=>$primerGradoSecundaria->id        //primerGradoSecundaria
        ]);
        $cursoDesarrolloPrimerGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoDesarrollo->id,                 // $cursoDesarrollo
            'grado_id'=>$primerGradoSecundaria->id        //primerGradoSecundaria
        ]);
        $cursoCienciasSocialesPrimerGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoCienciasSociales->id,                 //$cursoCienciasSociales
            'grado_id'=>$primerGradoSecundaria->id        //primerGradoSecundaria
        ]);
        $cursoEducacionFisicasPrimerGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoEducacionFisicas->id,                 //$cursoEducacionFisicas
            'grado_id'=>$primerGradoSecundaria->id        //primerGradoSecundaria
        ]);
        $cursoArtesPrimerGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoArtes->id,                 //$cursoArtes
            'grado_id'=>$primerGradoSecundaria->id        //primerGradoSecundaria
        ]);
        $cursoComunicacionsPrimerGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoComunicacions->id,                 //$cursoComunicacions
            'grado_id'=>$primerGradoSecundaria->id        //primerGradoSecundaria
        ]);
        $cursoCTAPrimerGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoCTA->id,                 //$cursoCTA
            'grado_id'=>$primerGradoSecundaria->id        //primerGradoSecundaria
        ]);
        $cursoEducacionPTPrimerGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoEducacionPT->id,                 //$cursoCTA
            'grado_id'=>$primerGradoSecundaria->id        //primerGradoSecundaria
        ]);
        $cursoHistoriaSegundoGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoHistoria->id,                 //Historia
            'grado_id'=>$segundoGradoSecundaria->id        //segundoGradoSecundaria
        ]);
        $cursoEducacionReligiosaSegundoGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoEducacionReligiosa->id,                 //$cursoEducacionReligiosa
            'grado_id'=>$segundoGradoSecundaria->id        //segundoGradoSecundaria
        ]);
        $cursoMatematicasSegundoGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoMatematicas->id,                 //$cursoMatematicas
            'grado_id'=>$segundoGradoSecundaria->id        //segundoGradoSecundaria
        ]);
        $cursoDesarrolloSegundoGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoDesarrollo->id,                 // $cursoDesarrollo
            'grado_id'=>$segundoGradoSecundaria->id        //segundoGradoSecundaria
        ]);
        $cursoCienciasSocialesSegundoGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoCienciasSociales->id,                 //$cursoCienciasSociales
            'grado_id'=>$segundoGradoSecundaria->id        //segundoGradoSecundaria
        ]);
        $cursoEducacionFisicasSegundoGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoEducacionFisicas->id,                 //$cursoEducacionFisicas
            'grado_id'=>$segundoGradoSecundaria->id        //segundoGradoSecundaria
        ]);
        $cursoArtesSegundoGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoArtes->id,                 //$cursoArtes
            'grado_id'=>$segundoGradoSecundaria->id        //segundoGradoSecundaria
        ]);
        $cursoComunicacionsSegundoGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoComunicacions->id,                 //$cursoComunicacions
            'grado_id'=>$segundoGradoSecundaria->id        //segundoGradoSecundaria
        ]);
        $cursoCTASegundoGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoCTA->id,                 //$cursoCTA
            'grado_id'=>$segundoGradoSecundaria->id        //segundoGradoSecundaria
        ]);
        $cursoEducacionPTSegundoGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoEducacionPT->id,                 //$cursoCTA
            'grado_id'=>$segundoGradoSecundaria->id        //segundoGradoSecundaria
        ]);
        $cursoHistoriaTercGradoSecundaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoHistoria->id,                 //Historia
            'grado_id'=>$terceroGradoSecundaria->id        //terceroGradoSecundaria
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

$segundoPrimariaSeccionA=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'A',
    'nrovacantes'=>'30',
    'grado_id'=>$segundoGradoPrimaria->id        //segundoGradoPrimaria
]);
$segundoPrimariaSeccionB=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'B',
    'nrovacantes'=>'20',
    'grado_id'=>$segundoGradoPrimaria->id        //segundoGradoPrimaria
]);

$terceroPrimariaSeccionA=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'A',
    'nrovacantes'=>'30',
    'grado_id'=>$primerGradoPrimaria->id        //terceroGradoPrimaria
]);
$terceroPrimariaSeccionB=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'B',
    'nrovacantes'=>'20',
    'grado_id'=>$primerGradoPrimaria->id        //terceroGradoPrimaria
]);

$cuartoPrimariaSeccionA=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'A',
    'nrovacantes'=>'30',
    'grado_id'=>$segundoGradoPrimaria->id        //cuartoGradoPrimaria
]);
$cuartoPrimariaSeccionB=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'B',
    'nrovacantes'=>'20',
    'grado_id'=>$segundoGradoPrimaria->id        //cuartoGradoPrimaria
]);

$quintoPrimariaSeccionA=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'A',
    'nrovacantes'=>'30',
    'grado_id'=>$segundoGradoPrimaria->id        //quintoGradoPrimaria
]);
$quintoPrimariaSeccionB=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'B',
    'nrovacantes'=>'20',
    'grado_id'=>$segundoGradoPrimaria->id        //quintoGradoPrimaria
]);
$sextoPrimariaSeccionA=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'A',
    'nrovacantes'=>'30',
    'grado_id'=>$segundoGradoPrimaria->id        //sextoGradoPrimaria
]);
$sextoPrimariaSeccionB=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'B',
    'nrovacantes'=>'20',
    'grado_id'=>$segundoGradoPrimaria->id        //sextoGradoPrimaria
]);

$primeroSecundariaSeccionA=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'A',
    'nrovacantes'=>'30',
    'grado_id'=>$primerGradoSecundaria->id        //primerGradoPrimaria
]);
$primeroSecundariaSeccionB=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'B',
    'nrovacantes'=>'20',
    'grado_id'=>$primerGradoSecundaria->id        //primerGradoSecundaria
]);

$segundoSecundariaSeccionA=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'A',
    'nrovacantes'=>'30',
    'grado_id'=>$segundoGradoSecundaria->id        //primerGradoSecundaria
]);
$segundoSecundariaSeccionB=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'B',
    'nrovacantes'=>'20',
    'grado_id'=>$segundoGradoSecundaria->id        //segundoGradoSecundaria
]);

$terceroSecundariaSeccionA=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'A',
    'nrovacantes'=>'30',
    'grado_id'=>$primerGradoSecundaria->id        //terceroGradoSecundaria
]);
$terceroSecundariaSeccionB=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'B',
    'nrovacantes'=>'20',
    'grado_id'=>$primerGradoSecundaria->id        //terceroGradoSecundaria
]);

$cuartoSecundariaSeccionA=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'A',
    'nrovacantes'=>'30',
    'grado_id'=>$segundoGradoSecundaria->id        //cuartoGradoSecundaria
]);
$cuartoSecundariaSeccionB=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'B',
    'nrovacantes'=>'20',
    'grado_id'=>$segundoGradoSecundaria->id        //cuartoGradoSecundaria
]);

$quintoSecundariaSeccionA=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'A',
    'nrovacantes'=>'30',
    'grado_id'=>$segundoGradoPrimaria->id        //quintoGradoSecundaria
]);
$quintoSecundariaSeccionB=Secciones::create([
    'periodo_id'=>$periodo->id,
    'letra'=>'B',
    'nrovacantes'=>'20',
    'grado_id'=>$segundoGradoSecundaria->id        //quintoGradoSecundaria
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

        //Asignar Capacidades a CursoGrado -Primaria

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
         //Asignar Capacidades a CursoGrado

// 1er grado de primaria capacidades hasta educación fisica

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
$capacidad1CursoArteyCulturaPrimerGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoArtePrimerGradoPrimaria->curso_id,        //ArteyCultura
    'grado_id'=>$cursoArtePrimerGradoPrimaria->grado_id,        //primerGradoPrimaria
    'asignatura'=>'Desenvolvimiento corporal en danzas',
    'abreviatura'=>'Desenv. en danzas',
    'orden'=>'1'
]);

$capacidad2CursoArteyCulturaPrimerGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoArtePrimerGradoPrimaria->curso_id,        //ArteyCultura
    'grado_id'=>$cursoArtePrimerGradoPrimaria->grado_id,        //primerGradoPrimaria
    'asignatura'=>'Creatividad en pintura y dibujo',
    'abreviatura'=>'creatividad en pintura',
    'orden'=>'2'
]);

$capacidad1CursoMatematicaPrimerGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoMatematicaPrimerGradoPrimaria->curso_id,        //Matematica
    'grado_id'=>$cursoMatematicaPrimerGradoPrimaria->grado_id,        //primerGradoPrimaria
    'asignatura'=>'Aplica los temas en problemas reales',
    'abreviatura'=>'aplica temas en problemas reales',
    'orden'=>'1'
]);

$capacidad2CursoMatematicaPrimerGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoMatematicaPrimerGradoPrimaria->curso_id,        //Matematica
    'grado_id'=>$cursoMatematicaPrimerGradoPrimaria->grado_id,        //primerGradoPrimaria
    'asignatura'=>'Maneja diferentes tipos de variables en ecuaciones',
    'abreviatura'=>'manejo de variables',
    'orden'=>'2'
]);


$capacidad1CursoPersonalSocialPrimerGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoPersonalSocialPrimerGradoPrimaria->curso_id,        //PersonalSocial
    'grado_id'=>$cursoPersonalSocialPrimerGradoPrimaria->grado_id,        //primerGradoPrimaria
    'asignatura'=>'Uso de las relaciones intra y extra personales',
    'abreviatura'=>'Rel. Intra y Extra personales',
    'orden'=>'1'
]);

$capacidad2CursoPersonalSocialPrimerGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoPersonalSocialPrimerGradoPrimaria->curso_id,        //PersonalSocial
    'grado_id'=>$cursoPersonalSocialPrimerGradoPrimaria->grado_id,        //primerGradoPrimaria
    'asignatura'=>'Identifica derechos y deberes en la constitución',
    'abreviatura'=>'Ident. derechos y deberes',
    'orden'=>'2'
]);

$capacidad1CursoEducaciónFisicaPrimerGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoEducacionFisicaPrimerGradoPrimaria->curso_id,        //EducaciónFisica
    'grado_id'=>$cursoEducacionFisicaPrimerGradoPrimaria->grado_id,       //primerGradoPrimaria
    'asignatura'=>'Mantiene equilibrio en su cuerpo y en la mente',
    'abreviatura'=>'Equil. corporal y mental',
    'orden'=>'1'
]);

$capacidad2CursoEducaciónFisicaPrimerGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoEducacionFisicaPrimerGradoPrimaria->curso_id,        //EducaciónFisica
    'grado_id'=>$cursoEducacionFisicaPrimerGradoPrimaria->grado_id,        //primerGradoPrimaria
    'asignatura'=>'Domina los diferentes deportesl',
    'abreviatura'=>'Dominio de ',
    'orden'=>'2'
]);

// 2do grado de primaria capacidades hasta educación fisica


$capacidad1CursoComunicacionSegundoGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoComunicacionSegundoGradoPrimaria->curso_id,        //Comunicación
    'grado_id'=>$cursoComunicacionSegundoGradoPrimaria->grado_id,        //SegundoGradoPrimaria
    'asignatura'=>'Infiere e interpreta información del texto oral',
    'abreviatura'=>'Inf. e Interp. texto oral',
    'orden'=>'1'
]);

$capacidad2CursoComunicacionSegundoGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoComunicacionSegundoGradoPrimaria->curso_id,        //Comunicación
    'grado_id'=>$cursoComunicacionSegundoGradoPrimaria->grado_id,        //SegundoGradoPrimaria
    'asignatura'=>'Adecúa, organiza y desarrolla las ideas de forma coherente y cohesionada',
    'abreviatura'=>'Adec. org. y des. ideas',
    'orden'=>'2'
]);
$capacidad1CursoArteSegundoGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoArteSegundoGradoPrimaria->curso_id,        //ArteyCultura
    'grado_id'=>$cursoArteSegundoGradoPrimaria->grado_id,        //SegundoGradoPrimaria
    'asignatura'=>'Desenvolvimiento corporal en danzas',
    'abreviatura'=>'Desenv. en danzas',
    'orden'=>'1'
]);

$capacidad2CursoArteSegundoGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoArteSegundoGradoPrimaria->curso_id,        //ArteyCultura
    'grado_id'=>$cursoArteSegundoGradoPrimaria->grado_id,        //SegundoGradoPrimaria
    'asignatura'=>'Creatividad en pintura y dibujo',
    'abreviatura'=>'creatividad en pintura',
    'orden'=>'2'
]);

$capacidad1CursoMatematicaSegundoGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoMatematicaSegundoGradoPrimaria->curso_id,        //Matematica
    'grado_id'=>$cursoMatematicaSegundoGradoPrimaria->grado_id,        //SegundoGradoPrimaria
    'asignatura'=>'Aplica los temas en problemas reales',
    'abreviatura'=>'aplica temas en problemas reales',
    'orden'=>'1'
]);

$capacidad2CursoMatematicaSegundoGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoMatematicaSegundoGradoPrimaria->curso_id,        //Matematica
    'grado_id'=>$cursoMatematicaSegundoGradoPrimaria->grado_id,        //SegundoGradoPrimaria
    'asignatura'=>'Maneja diferentes tipos de variables en ecuaciones',
    'abreviatura'=>'manejo de variables',
    'orden'=>'2'
]);


$capacidad1CursoPersonalSocialSegundoGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoPersonalSocialSegundoGradoPrimaria->curso_id,        //PersonalSocial
    'grado_id'=>$cursoPersonalSocialSegundoGradoPrimaria->grado_id,        //SegundoGradoPrimaria
    'asignatura'=>'Infiere e interpreta información del texto oral',
    'abreviatura'=>'Inf. e Interp. texto oral',
    'orden'=>'1'
]);

$capacidad2CursoPersonalSocialSegundoGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoPersonalSocialSegundoGradoPrimaria->curso_id,        //PersonalSocial
    'grado_id'=>$cursoPersonalSocialSegundoGradoPrimaria->grado_id,        //SegundoGradoPrimaria
    'asignatura'=>'Identifica derechos y deberes en la constitución',
    'abreviatura'=>'Ident. derechos y deberes',
    'orden'=>'2'
]);

$capacidad1CursoEducaciónFisicaSegundoGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=> $cursoEducacionFisicaSegundoGradoPrimaria->curso_id,        //EducaciónFisica
    'grado_id'=> $cursoEducacionFisicaSegundoGradoPrimaria->grado_id,        //SegundoGradoPrimaria
    'asignatura'=>'Mantiene equilibrio en su cuerpo y en la mente',
    'abreviatura'=>'Equil. corporal y mental',
    'orden'=>'1'
]);

$capacidad2CursoEducaciónFisicaSegundoGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=> $cursoEducacionFisicaSegundoGradoPrimaria->curso_id,        //EducaciónFisica
    'grado_id'=> $cursoEducacionFisicaSegundoGradoPrimaria->grado_id,        //SegundoGradoPrimaria
    'asignatura'=>'Domina los diferentes deportesl',
    'abreviatura'=>'Dominio de ',
    'orden'=>'2'
]);


// 3er grado de primaria capacidades hasta educación fisica


$capacidad1CursoComunicacionTercerGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoComunicacionTerceroGradoPrimaria->curso_id,        //Comunicación
    'grado_id'=>$cursoComunicacionTerceroGradoPrimaria->grado_id,          //TercerGradoPrimaria
    'asignatura'=>'Infiere e interpreta información del texto oral',
    'abreviatura'=>'Inf. e Interp. texto oral',
    'orden'=>'1'
]);

$capacidad2CursoComunicacionTercerGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoComunicacionTerceroGradoPrimaria->curso_id,        //Comunicación
    'grado_id'=>$cursoComunicacionTerceroGradoPrimaria->grado_id,        //TercerGradoPrimaria
    'asignatura'=>'Adecúa, organiza y desarrolla las ideas de forma coherente y cohesionada',
    'abreviatura'=>'Adec. org. y des. ideas',
    'orden'=>'2'
]);
$capacidad1CursoArteTercerGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoArteTerceroGradoPrimaria->curso_id,        //ArteyCultura
    'grado_id'=>$cursoArteTerceroGradoPrimaria->grado_id,         //TercerGradoPrimaria
    'asignatura'=>'Desenvolvimiento corporal en danzas',
    'abreviatura'=>'Desenv. en danzas',
    'orden'=>'1'
]);

$capacidad2CursoArteTercerGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoArteTerceroGradoPrimaria->curso_id,        //ArteyCultura
    'grado_id'=>$cursoArteTerceroGradoPrimaria->grado_id,        //TercerGradoPrimaria
    'asignatura'=>'Creatividad en pintura y dibujo',
    'abreviatura'=>'creatividad en pintura',
    'orden'=>'2'
]);

$capacidad1CursoMatematicaTercerGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoMatematicaTerceroGradoPrimaria->curso_id,        //Matematica
    'grado_id'=>$cursoMatematicaTerceroGradoPrimaria->grado_id,       //TercerGradoPrimaria
    'asignatura'=>'Aplica los temas en problemas reales',
    'abreviatura'=>'aplica temas en problemas reales',
    'orden'=>'1'
]);

$capacidad2CursoMatematicaTercerGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoMatematicaTerceroGradoPrimaria->curso_id,        //Matematica
    'grado_id'=>$cursoMatematicaTerceroGradoPrimaria->grado_id,        //TercerGradoPrimaria
    'asignatura'=>'Maneja diferentes tipos de variables en ecuaciones',
    'abreviatura'=>'manejo de variables',
    'orden'=>'2'
]);


$capacidad1CursoPersonalSocialTercerGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoPersonalSocialTerceroGradoPrimaria->curso_id,        //PersonalSocial
    'grado_id'=>$cursoPersonalSocialTerceroGradoPrimaria->grado_id,       //TercerGradoPrimaria
    'asignatura'=>'Infiere e interpreta información del texto oral',
    'abreviatura'=>'Inf. e Interp. texto oral',
    'orden'=>'1'
]);

$capacidad2CursoPersonalSocialTercerGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoPersonalSocialTerceroGradoPrimaria->curso_id,        //PersonalSocial
    'grado_id'=>$cursoPersonalSocialTerceroGradoPrimaria->grado_id,        //TercerGradoPrimaria
    'asignatura'=>'Identifica derechos y deberes en la constitución',
    'abreviatura'=>'Ident. derechos y deberes',
    'orden'=>'2'
]);

$capacidad1CursoEducaciónFisicaTercerGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoEducacionFisicaTerceroGradoPrimaria->curso_id,        //EducaciónFisica
    'grado_id'=>$cursoEducacionFisicaTerceroGradoPrimaria->grado_id,        //TercerGradoPrimaria
    'asignatura'=>'Mantiene equilibrio en su cuerpo y en la mente',
    'abreviatura'=>'Equil. corporal y mental',
    'orden'=>'1'
]);

$capacidad2CursoEducaciónFisicaTercerGradoPrimaria=Capacidades::create([
    'periodo_id'=>$periodo->id,
    'curso_id'=>$cursoEducacionFisicaTerceroGradoPrimaria->curso_id,        //EducaciónFisica
    'grado_id'=>$cursoEducacionFisicaTerceroGradoPrimaria->grado_id,        //TercerGradoPrimaria
    'asignatura'=>'Domina los diferentes deportesl',
    'abreviatura'=>'Dominio de ',
    'orden'=>'2'
]);


        
        //Asignar Capacidades a CursoGrado Secundaria

        $capacidad1CursoHistoriaPrimerGradoSecundaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoHistoriaPrimerGradoSecundaria->curso_id,        //Historia
            'grado_id'=> $cursoHistoriaPrimerGradoSecundaria->grado_id,        //primerGradoSecundaria
            'asignatura'=>'Interpreta criticamente fuentes diversas',
            'abreviatura'=>'Int. e Crit. fuent diversas',
            'orden'=>'1'
        ]);

        $capacidad2CursoHistoriaPrimerGradoSecundaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoHistoriaPrimerGradoSecundaria->curso_id,        //Historia
            'grado_id'=> $cursoHistoriaPrimerGradoSecundaria->grado_id,      //primerGradoSecundaria
            'asignatura'=>'Comprende el tiempo historico y emplea categorias temporales',
            'abreviatura'=>'Comp. el tiemp. hist. y empl. cat. temp.',
            'orden'=>'2'
        ]);
        $capacidad1CursoEducacionReligiosaPrimerGradoSecundaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoEducacionReligiosaPrimerGradoSecundaria->curso_id,        //EduREligiosa
            'grado_id'=> $cursoEducacionReligiosaPrimerGradoSecundaria->grado_id,        //primerGradoSecundaria
            'asignatura'=>'Interpretacion en  las citas biblicas ',
            'abreviatura'=>'Int. citas bibl.',
            'orden'=>'1'
        ]);

        $capacidad2CursoEducacionReligiosaPrimerGradoSecundaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoEducacionReligiosaPrimerGradoSecundaria->curso_id,        //EduReligiosa
            'grado_id'=> $cursoEducacionReligiosaPrimerGradoSecundaria->grado_id,      //primerGradoSecundaria
            'asignatura'=>'Predica la palabra de Dios en el aula',
            'abreviatura'=>'Pred. la palabr. en el aul.',
            'orden'=>'2'
        ]);
        $capacidad1CursoMatematicasPrimerGradoSecundaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>  $cursoMatematicasPrimerGradoSecundaria->curso_id,        //Mate
            'grado_id'=>  $cursoMatematicasPrimerGradoSecundaria->grado_id,        //primerGradoSecundaria
            'asignatura'=>'Resuleve situaciones problematicas de contexto real ',
            'abreviatura'=>'Res. situa. problem. de contxt. real.',
            'orden'=>'1'
        ]);

        $capacidad2CursoMatematicasPrimerGradoSecundaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>  $cursoMatematicasPrimerGradoSecundaria->curso_id,        //Mate
            'grado_id'=>  $cursoMatematicasPrimerGradoSecundaria->grado_id,      //primerGradoSecundaria
            'asignatura'=>'Elabora estrategias para soluciones de problemas reales',
            'abreviatura'=>'Elab. estrtg. sol. real.',
            'orden'=>'2'
        ]);
        $capacidad1CursoDesarrolloPrimerGradoSecundaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>  $cursoDesarrolloPrimerGradoSecundaria->curso_id,        //Desarrollo
            'grado_id'=>  $cursoDesarrolloPrimerGradoSecundaria->grado_id,        //primerGradoSecundaria
            'asignatura'=>'Resuleve situaciones problematicas de contexto real ',
            'abreviatura'=>'Res. situa. problem. de contxt. real.',
            'orden'=>'1'
        ]);

        $capacidad2CursoDesarrolloPrimerGradoSecundaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>  $cursoDesarrolloPrimerGradoSecundaria->curso_id,        //Desarrollo
            'grado_id'=>  $cursoDesarrolloPrimerGradoSecundaria->grado_id,      //primerGradoSecundaria
            'asignatura'=>'Elabora estrategias para soluciones de problemas reales',
            'abreviatura'=>'Elab. estrtg. sol. real.',
            'orden'=>'2'
        ]);
        $capacidad1CursoHistoriaSegundoGradoSecundaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoHistoriaSegundoGradoSecundaria->curso_id,        //Historia
            'grado_id'=> $cursoHistoriaSegundoGradoSecundaria->grado_id,        //segundoGradoSecundaria
            'asignatura'=>'Interpreta criticamente fuentes diversas',
            'abreviatura'=>'Int. e Crit. fuent diversas',
            'orden'=>'1'
        ]);

        $capacidad2CursoHistoriaSegundoGradoSecundaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoHistoriaSegundoGradoSecundaria->curso_id,        //Historia
            'grado_id'=> $cursoHistoriaSegundoGradoSecundaria->grado_id,      //segundoGradoSecundaria
            'asignatura'=>'Comprende el tiempo historico y emplea categorias temporales',
            'abreviatura'=>'Comp. el tiemp. hist. y empl. cat. temp.',
            'orden'=>'2'
        ]);
        $capacidad1CursoEducacionReligiosaSegundoGradoSecundaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoEducacionReligiosaSegundoGradoSecundaria->curso_id,        //EduReligiosa
            'grado_id'=> $cursoEducacionReligiosaSegundoGradoSecundaria->grado_id,        //segundoGradoSecundaria
            'asignatura'=>'Interpretacion en  las citas biblicas ',
            'abreviatura'=>'Int. citas bibl.',
            'orden'=>'1'
        ]);

        $capacidad2CursoEducacionReligiosaSegundoGradoSecundaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=> $cursoEducacionReligiosaSegundoGradoSecundaria->curso_id,        //EduReligiosa
            'grado_id'=> $cursoEducacionReligiosaSegundoGradoSecundaria->grado_id,      //segundoGradoSecundaria
            'asignatura'=>'Predica la palabra de Dios en el aula',
            'abreviatura'=>'Pred. la palabr. en el aul.',
            'orden'=>'2'
        ]);
        $capacidad1CursoMatematicasSegundoGradoSecundaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>  $cursoMatematicasSegundoGradoSecundaria->curso_id,        //Mate
            'grado_id'=>   $cursoMatematicasSegundoGradoSecundaria->grado_id,//segundoGradoSecundaria
            'asignatura'=>'Resuleve situaciones problematicas de contexto real ',
            'abreviatura'=>'Res. situa. problem. de contxt. real.',
            'orden'=>'1'
        ]);

        $capacidad2CursoMatematicasPrimerGradoSecundaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>  $cursoMatematicasSegundoGradoSecundaria->curso_id,        //Mate
            'grado_id'=>   $cursoMatematicasSegundoGradoSecundaria->grado_id,      //segundoGradoSecundaria
            'asignatura'=>'Elabora estrategias para soluciones de problemas reales',
            'abreviatura'=>'Elab. estrtg. sol. real.',
            'orden'=>'2'
        ]);
        $capacidad1CursoDesarrolloPrimerGradoSecundaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>  $cursoDesarrolloSegundoGradoSecundaria->curso_id,        //Desarrollo
            'grado_id'=>  $cursoDesarrolloSegundoGradoSecundaria->grado_id,         //segundoGradoSecundaria
            'asignatura'=>'Resuleve situaciones problematicas de contexto real ',
            'abreviatura'=>'Res. situa. problem. de contxt. real.',
            'orden'=>'1'
        ]);

        $capacidad2CursoDesarrolloSegundoGradoSecundaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>  $cursoDesarrolloSegundoGradoSecundaria->curso_id,        //Desarrollo
            'grado_id'=>  $cursoDesarrolloSegundoGradoSecundaria->grado_id,      //segundoGradoSecundaria
            'asignatura'=>'Elabora estrategias para soluciones de problemas reales',
            'abreviatura'=>'Elab. estrtg. sol. real.',
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
