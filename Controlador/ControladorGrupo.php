
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
        $grupoModel = new ModeloGrupo();
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
