
<?php
include('../Modelo/ModeloCurso.php');

class ControladorCurso
{
    public function __construct()
    {
    }
    //Guardar Carrera
    public function insertData($carrera)
    {
        $cursoModel = new ModeloCurso();
        $cursoModel->insertar($carrera);
    }
    //Obtener Carrera
    public function getData()
    {
        $cursoModel = new ModeloCurso();
        $data = array();
        foreach ($cursoModel->listar() as $s) {
            $d = array(
                "Codigo_Curso" => $s->getCodigo_curso(),
                "Codigo_Carrera" => $s->getCodigo_carrera(),
                "No_Ciclo" => $s->getNo_ciclo(),
                "Nombre" => $s->getNombre(),
                "Creditos" => $s->getCreditos(),
                "Horas_Semanales" => $s->getHoras_semanales()
            );
            array_push($data, $d);
        }
        return $data;
    }

    public function updateData($curso)
    {
        $cursoModel = new ModeloCurso();
        $cursoModel->modificar($curso);
    }
    //Buscar por codigo de curso
    public function searchDataCode($id)
    {
        $cursoModel = new ModeloCurso();
        $data = $cursoModel->buscarPorCodigoCurso($id);
        return $data;
    }
    //Buscar por nombre
    public function searchDataName($nombreCurso)
    {
        $cursoModel = new ModeloCurso();
        $data = $cursoModel->buscarPorNombre($nombreCurso);
        return $data;
    }
    //Por nombre de carrera
    public function buscarPorNombreCarrera($nombre_carrera)
    {

        $cursoModel = new ModeloCurso();
        $data = $cursoModel->buscarPorNombreCarrera($nombre_carrera);

        return $data;
    }
    public function deleteData($id)
    {
        $cursoModel = new ModeloCurso();
        return $cursoModel->eliminar($id);
    }
    public function buscar_curso_codigoCarrera($codigoCarrera)
    {
        $cursoModel = new ModeloCurso();
        return $cursoModel->buscar_curso_codigoCarrera($codigoCarrera);
    }
}
