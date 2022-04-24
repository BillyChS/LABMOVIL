
<?php
include('../Modelo/CarreraModelo.php');

class ControladorCarrera
{
    public function __construct()
    {
    }
    //Guardar Carrera
    public function insertData($carrera)
    {
        $carreraModel = new CarreraModelo();
        $carreraModel->insertar($carrera);
    }
    //Obtener Carrera
    public function getData()
    {
        $data = array();
        $carreraModel = new CarreraModelo();
        $data = array();
        foreach ($carreraModel->listar() as $s) {
            $d = array(
                "Codigo_Carrera" => $s->getCodigo_carrera(),
                "Nombre" => $s->getNombre(),
                "Titulo" => $s->getTitulo(),
                "Cursos" => $s->getCursos()
            );
            array_push($data, $d);
        }
        return $data;
    }

    public function updateData($carrera)
    {
        $carreraModel = new CarreraModelo();
        $carreraModel->modificar($carrera);
    }
    //Buscar por codigo de carrera
    public function searchDataId($id)
    {
        $carreraModel = new CarreraModelo();
        $data = $carreraModel->buscarPorCodigo($id);
        return $data;
    }
    //Buscar por nombre
    public function searchDataName($nombre)
    {
        $carreraModel = new CarreraModelo();
        $data = $carreraModel->buscarPorNombre($nombre);
        return $data;
    }
    //Por carrera
    public function searchData($id)
    {
        $carreraModel = new CarreraModelo();
        $data = $carreraModel->buscarPorCodigo($id);
        return $data;
    }
    public function deleteData($id)
    {
        $carreraModel = new CarreraModelo();
        return $carreraModel->eliminar($id);
    }
}
