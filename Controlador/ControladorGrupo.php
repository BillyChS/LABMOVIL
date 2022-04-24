
<?php
include('../Modelo/ModeloGrupo.php');

class ControladorGrupo
{
    public function __construct()
    {
    }
    //Guardar Carrera
    public function insertData($grupo)
    {
        $cursoModel = new ModeloGrupo();
        $cursoModel->insertar_grupo($grupo);
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

    public function updateData($carrera)
    {
        $cursoModel = new ModeloCurso();
        $cursoModel->modificar($carrera);
    }
    //Buscar por codigo de curso
    public function searchDataCode($id)
    {
        $cursoModel = new ModeloCurso();
        $data = $cursoModel->buscarPorCodigoCurso($id);
        return $data;
    }
}
