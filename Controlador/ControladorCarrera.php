
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
        return $carreraModel->insertar($carrera);
    }
    //Obtener Carrera
    public function getData()
    {
        $data = array();
        $carreraModel = new CarreraModelo();
        return $carreraModel->listar();
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
