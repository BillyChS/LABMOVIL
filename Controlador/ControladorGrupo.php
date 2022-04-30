
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
        return $grupoModel->listar_Grupos();
    }

    public function bucarGrupoPorNumero($Numero_grupo)
    {
        $grupoModel = new ModeloGrupo();
        return $grupoModel->buscarGrupoPorNumero($Numero_grupo);
    }
    public function bucarGrupoPorCodigoCurso($Codigo_Curso)
    {
        $grupoModel = new ModeloGrupo();
        return $grupoModel->buscarGrupoPorCodigoCurso($Codigo_Curso);
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
